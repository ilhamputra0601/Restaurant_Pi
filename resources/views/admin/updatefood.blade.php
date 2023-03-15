@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Menu</h1>

<form method="post" action="{{url('/update',$data->id)}}" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" id="title" name="title" class="form-control text-dark bg-light @error('title')is-invalid @enderror"  autofocus required value="{{ old('title',$data->title) }}" />
          <label class="form-label" for="title">Title</label>
          @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="number" id="price" name="price" class="form-control text-dark bg-light @error('price')is-invalid @enderror" required value="{{ old('price',$data->price) }}" />
          <label class="form-label" for="price">Price</label>
          @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
    </div>

    <div class="form-outline mb-4">
        @if ($data->image)
        <label class="form-label" for="image" >update image</label>
        <img src="{{ asset('storage/'. $data->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <input type="file" class="form-control text-dark bg-light " id="image" name="image" onchange="previewImage()" />
        @error('image')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <!-- Message input -->
    <div class="form-outline mb-4">
      <textarea type="text" class="form-control text-dark bg-light mb-2 py-5" id="description" name="description" rows="4" @error('description')is-invalid @enderror required >{{ old('description',$data->description) }}</textarea>
      <label class="form-label" for="description">Description</label>
      @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Submit button -->
    <a href="/foodmenu" class="btn btn-primary btn-block mb-4 mr-5">Back</a>
    <button type="submit" class="btn btn-primary btn-block mb-4 ml-5">Save</button>
</form>


  <script>
    //  img preview
function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
  </script>
@endsection
