@extends('index')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-1  text-uppercase mb-5 d-flex justify-content-center" style="margin-top: 150px;">halaman user</h1>

<div class="d-flex justify-content-center container">
  <table class="table table-success table-striped">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Food Name</th>
          <th scope="col">Price</th>
          <th scope="col">quantity</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->title }}</td>
              <td>{{ $data->price }}</td>
              <td>{{ $data->quantity }}</td>
              @endforeach
            </tr>

            <table class="table table-success table-striped" style="width: 100px; ">
              <thead>
                  <tr>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                      <tr>
                            @foreach ($data2 as $data2)
                        <td>
                            <button onclick="confirmDelete('{{ url('/deletecart', $data2->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
                          </td>
                      </tr>
                          @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary bg-primary" id="order" style="margin-bottom:15px;" type="button">Order Now</button>
          </div>

            <form id="appear" action="" method="post" class="form-floating container mt-3" style="display: none;">
              <div>
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="name@example.com" value="{{ auth()->user()->name }}" required>
            </div>
              <div>
              <label for="phone">Phone</label>
              <input type="number" min="0" class="form-control" id="phone" placeholder="Phone Number" required autofocus>
            </div>
              <div>
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Your Address" required>
            </div>
            <div class="mt-4">
              <button class="btn btn-success bg-success " type="submit">Order Confirm</button>
              <button id="close" class="btn btn-danger bg-danger " type="button">Close</button>
            </div>
            </form>



  <script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus cart ini?")) {
        window.location.href = url;
      }
    }
  </script>

  <script>
    $("#order").click(
        function () {
            $("#appear").show();
        }
    );

    $("#close").click(
        function () {
            $("#appear").hide();
        }
    );

  </script>
@endsection
