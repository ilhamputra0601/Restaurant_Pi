@extends('index')
@section('container')
<div style="margin-top: 150px;"></div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-1  text-uppercase mb-5 d-flex justify-content-center" >halaman user</h1>

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
        <form action="{{ url('orderconfirm') }}" method="post">
        @csrf
          @foreach ($data as $cart)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>
                <input type="text" name="foodname[]" value="{{ $cart->food->title }}" hidden>
                {{ $cart->food->title  }}
            </td>
              <td>
                <input type="number" name="price[]" value="{{ $totalPrice}}" hidden>
                {{ $cart->food->price}} K
            </td>

            <td>
                <input style=" width:60px;" type="number" min="0" name="quantity[]" value="{{ $cart->quantity }}">

            </td>
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
                            @foreach ($data2 as $delete)
                        <td>
                            <button onclick="confirmDelete('{{ url('/deletecart', $delete->id) }}')" type="button" class="btn btn-danger bg-danger"><strong>X</strong></button>
                          </td>
                      </tr>
                          @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary bg-primary" id="order" style="margin-bottom:15px;" type="button">Order Now</button>
          </div>
                <div id="appear" style="display: none;" class=" container mt-3" >
              <div>
              <div>
              <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" style="display: none;" required>
            </div>
              <div>
              <label for="name">Total Price</label>
              <input type="text" class="form-control" name="totalprice" placeholder="name@example.com" value="Rp {{ $totalPrice }}.000" disabled required>
            </div>
              <!-- Example single danger button -->
              <div class="mb-3 mt-1">
                <label for="category" class="form-label ">select payment</label>
                <select class="form-select" name="bank" required>
                  <option selected value="bca">BCA</option>
                  <option value="mandiri">Mandiri</option>
                  <option value="dana">Dana</option>
                </select>
              </div>
              <div>
              <label for="phone">Phone</label>
              <input type="number" min="0" class="form-control" name="phone" id="phone" placeholder="Phone Number" required autofocus>
            </div>
              <div>
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Your Address" required>
            </div>
            <div class="mt-4">
              <button class="btn btn-success bg-success " type="submit">Checkout</button>
              <button id="close" class="btn btn-danger bg-danger " type="button">Close</button>
            </div>
             </div>
            </form>
            <div style="margin-bottom: 300px;">

            </div>



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
