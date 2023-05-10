@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Menu</h1>

<form method="post" class="" action="{{'/uploadfood'}}" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="title" name="title" class="form-control text-dark bg-light @error('title') is-invalid @enderror" autofocus required value="{{ old('title') }}" />
                <label class="form-label" for="title">Title</label>
                @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class=" mb-3">
            <label for="category" class="form-label ">Category</label>
            <select class="form-select " name="category_id">
              @foreach ($categories as $category)
              @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
              @endforeach
            </select>
           </div>
        <div class="col">
            <div class="form-outline">
                <input type="number" id="price" name="price" class="form-control text-dark bg-light @error('price') is-invalid @enderror" required value="{{ old('price') }}" />
                <label class="form-label" for="price">Price</label>
                @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="image" >input image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control text-dark bg-light @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" />
        @error('image')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Message input -->
    <div class="form-outline mb-4">
        <textarea class="form-control  text-dark bg-light @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        <label class="form-label" for="description">Description</label>
        @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
</form>

<table class="table table-success table-striped" style="max-width: 600px;">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Food Menu</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $menu)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $menu->title }}</td>
            <td>{{ $menu->price }}</td>
            <td>{{ $menu->description }}</td>
            <td><img src="{{ asset('storage/'. $menu->image) }}" alt="{{ $menu->title }}"></td>
            <td>
                <button onclick="location.href='{{ url('/viewmenu',$menu->id) }}'" type="button" class="btn btn-primary"><strong>⨇</strong></button>
            </td>
            <td>
                <button onclick="confirmDelete('{{ url('/deletemenu', $menu->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


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

<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus menu ini?")) {
        window.location.href = url;
      }
    }
  </script>


@endsection
