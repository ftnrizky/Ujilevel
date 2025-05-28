<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan form edit profil user.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('profile.edit', compact('user', 'profile'));
    }

    /**
     * Simpan/update informasi profil user.
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:Laki - Laki,Perempuan',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'username', 'phone', 'gender', 'province', 'city', 'district', 'postal_code'
        ]);

        $data['user_id'] = Auth::id();

        // Simpan gambar jika ada
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $path = $image->store('profile_images', 'public');
            $data['profile_image'] = $path;
        }

        // Simpan atau update data profil
        Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return Redirect::route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus akun user (dan profil jika perlu).
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Hapus profil user juga
        $profile = Profile::where('user_id', $user->id)->first();
        if ($profile) {
            // Hapus file gambar jika ada
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $profile->delete();
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
// End of ProfileController.php