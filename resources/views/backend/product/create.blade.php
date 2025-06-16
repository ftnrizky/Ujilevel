@extends('backend.layouts.master')

@section('main-content')

<div class="card">
  <h5 class="card-header">Tambah Produk</h5>
  <div class="card-body">
    <form method="post" action="{{route('product.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Judul <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Masukan Judul" value="{{old('title')}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="summary" class="col-form-label">Ringkasan Produk <span class="text-danger">*</span></label>
        <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
        @error('summary')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="description" class="col-form-label">Deskripsi Produk</label>
        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>


      <div class="form-group">
        <label for="is_featured">Di Tampilkan</label><br>
        <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yaa
      </div>
      {{-- {{$categories}} --}}

      <div class="form-group">
        <label for="cat_id">Category <span class="text-danger">*</span></label>
        <select name="cat_id" id="cat_id" class="form-control">
          <option value="">--Select any category--</option>
          @foreach($categories as $key=>$cat_data)
          <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group d-none" id="child_cat_div">
        <label for="child_cat_id">Sub Category</label>
        <select name="child_cat_id" id="child_cat_id" class="form-control">
          <option value="">--Masukan Category--</option>
          {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
          @endforeach --}}
        </select>
      </div>

      <div class="form-group">
        <label for="price" class="col-form-label">Harga <span class="text-danger">*</span></label>
        <input id="price" type="number" name="price" placeholder="Masukan Harga" value="{{old('price')}}" class="form-control">
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="discount" class="col-form-label">Diskon(%)</label>
        <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Masukan Diskon" value="{{old('discount')}}" class="form-control">
        @error('discount')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="size">Ukuran</label>
        <select name="size[]" class="form-control selectpicker" multiple data-live-search="true">
          <option value="">--Masukan Ukuran nya--</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="32">32</option>
          <option value="34">34</option>
          <option value="36">36</option>
          <option value="40">40</option>
          <option value="42">42</option>
          <option value="45">45</option>
        </select>
      </div>

      <div class="form-group">
        <label for="brand_id">Brand</label>
        {{-- {{$brands}} --}}

        <select name="brand_id" class="form-control">
          <option value="">--Masukan Brand--</option>
          @foreach($brands as $brand)
          <option value="{{$brand->id}}">{{$brand->title}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="condition">Kondisi</label>
        <select name="condition" class="form-control">
          <option value="">--Masukan Kondisi Produk--</option>
          <option value="default">Default</option>
          <option value="new">Baru</option>
          <option value="hot">Hot</option>
        </select>
      </div>

      <div class="form-group">
        <label for="stock">Stok <span class="text-danger">*</span></label>
        <input id="quantity" type="number" name="stock" min="0" placeholder="Masukan Stok" value="{{old('stock')}}" class="form-control">
        @error('stock')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Masukan File
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        @error('photo')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
          <option value="active">Aktif</option>
          <option value="inactive">Tidak Aktif</option>
        </select>
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="is_preOrder">Pre-Order</label><br>
        <input type="checkbox" name='is_preOrder' id='is_preOrder' value='1'> Ya
      </div>

      <div class="form-group" id="estimatedDaysGroup" style="display: none;">
        <label for="estimated_days" class="col-form-label">Perkiraan Hari Pengiriman <span class="text-danger">*</span></label>
        <input id="estimated_days" type="number" name="estimated_days" min="1" placeholder="Masukan perkiraan hari pengiriman" class="form-control">
        @error('estimated_days')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button class="btn btn-success" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
  $('#lfm').filemanager('image');

  $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Tulis deskripsi singkat.....",
      tabsize: 2,
      height: 100
    });
  });

  $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Tulis deskripsi Detail......",
      tabsize: 2,
      height: 150
    });
  });
  // $('select').selectpicker();
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const preOrderCheckbox = document.getElementById('is_preOrder');
    const estimatedDaysGroup = document.getElementById('estimatedDaysGroup');

    // Initial state
    if (preOrderCheckbox.checked) {
      estimatedDaysGroup.style.display = 'block';
    }

    // Toggle on change
    preOrderCheckbox.addEventListener('change', function() {
      estimatedDaysGroup.style.display = this.checked ? 'block' : 'none';
    });
  });
</script>

<script>
  $('#cat_id').change(function() {
    var cat_id = $(this).val();
    // alert(cat_id);
    if (cat_id != null) {
      // Ajax call
      $.ajax({
        url: "/admin/category/" + cat_id + "/child",
        data: {
          _token: "{{csrf_token()}}",
          id: cat_id
        },
        type: "POST",
        success: function(response) {
          if (typeof(response) != 'object') {
            response = $.parseJSON(response)
          }
          // console.log(response);
          var html_option = "<option value=''>----Select sub category----</option>"
          if (response.status) {
            var data = response.data;
            // alert(data);
            if (response.data) {
              $('#child_cat_div').removeClass('d-none');
              $.each(data, function(id, title) {
                html_option += "<option value='" + id + "'>" + title + "</option>"
              });
            } else {}
          } else {
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    } else {}
  })
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const checkbox = document.getElementById('preOrder');
    const estimasiField = document.getElementById('estimasiField');

    function toggleEstimasi() {
      estimasiField.style.display = checkbox.checked ? 'block' : 'none';
    }

    checkbox.addEventListener('change', toggleEstimasi);
    toggleEstimasi();
  });
</script>
@endpush