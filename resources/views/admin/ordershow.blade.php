@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
{{-- <h1 class="fs-2 text-uppercase mb-5">Order By {{ $data->name }}</h1> --}}

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
                <button onclick="confirmDelete('{{ url('/deleteorder', $data->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>

  <h1 class="mt-5 mb-2">Order Summaries</h1>

<div class="row col-4">
  <div class="col-md-12">
    <div class="list-group">
      <a href="#" class="list-group-item active">Total</a>
      <div class="list-group-item">
        <p><strong>User:</strong> {{ $data->name }}</p>
        <p><strong>Email:</strong> {{ $data->phone }}</p>
        <p><strong>Address:</strong> {{ $data->address }}</p>
        <p><strong>Total Quantity:</strong>{{ $quantity }}</p>
        <p><strong>Total Price:</strong>{{ $total_price }} K</p>
      </div>
    </div>
  </div>
</div>

<button onclick="location.href='{{ url('/orders') }}'" type="button" class="btn btn-warning bg-warning mt-3"><strong>Back</strong></button>


<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus menu ini?")) {
        window.location.href = url;
      }
    }
  </script>


@endsection
