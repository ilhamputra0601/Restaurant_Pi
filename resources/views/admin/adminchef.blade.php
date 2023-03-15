@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Menu</h1>

<form method="post" class="" action="{{'/createchef'}}" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="name" name="name" class="form-control text-dark bg-light @error('name') is-invalid @enderror" autofocus required value="{{ old('name') }}" />
                <label class="form-label" for="name">Name</label>
                @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="speciality" name="speciality" class="form-control text-dark bg-light @error('speciality') is-invalid @enderror" required value="{{ old('speciality') }}" />
                <label class="form-label" for="speciality">Speciality</label>
                @error('speciality')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="image" >input image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control text-dark bg-light @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" />
        @error('image')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
</form>

  <table class="table table-success table-striped">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Speciality</th>
          <th scope="col">Image</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->name }}</td>
              <td>{{ $data->speciality }}</td>
              <td><img src="{{ asset('storage/'. $data->image)  }}" alt="{{ $data->name }}"></td>
              <td>
                  <button onclick="location.href='{{ url('/showchef',$data->id) }}'" type="button" class="btn btn-primary"><strong>⨇</strong></button>
              </td>
              <td>
                <button onclick="confirmDelete('{{ url('/deletechef', $data->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
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
