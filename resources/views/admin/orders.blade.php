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
<div class="d-flex justify-content-center container">
  <table class="table table-success table-striped">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Total Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Show</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->user->name  }}</td>
              <td>{{ $data->quantity }}</td>
            <td>Rp{{ $data->price  }}.000</td>
            <td>
                <button onclick="location.href='{{ url('/ordershow', $data->user_id) }}'" type="button" class="btn btn-primary bg-primary"><strong>show</strong></button>
              </td>
              <td>
                <button onclick="confirmDelete('{{ url('/deleteorder', $data->user_id) }}')" type="button" class="btn btn-danger bg-danger"><strong>X</strong></button>
              </td>
              @endforeach
          </tr>

      </tbody>
  </table>
  </div>

<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
        window.location.href = url;
      }
    }
  </script>


@endsection
