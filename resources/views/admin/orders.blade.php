@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Order</h1>
<form action="{{ url('/search') }}" method="get">
    @csrf
<div class="input-group mb-5">
    <div class="form-outline">
      <input type="text" name="search" id="form1" class="form-control bg-light" placeholder="search" />
    </div>
    <button type="submit" class="btn btn-primary bg-primary">
      Search
    </button>
  </div>
</form>

  <table class="table table-success table-striped">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Food Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->foodname }}</td>
              <td>{{ $data->price * $data->quantity}}</td>
              <td>{{ $data->quantity }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->address }}</td>
              <td>
                <button onclick="confirmDelete('{{ url('/deletemenu', $data->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>

<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus menu ini?")) {
        window.location.href = url;
      }
    }
  </script>


@endsection
