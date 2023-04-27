@extends('index')
@section('container')
<div style="margin-top: 150px;"></div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-1  text-uppercase mb-5 d-flex justify-content-center" >halaman Payment</h1>
<div class="row">
    @if ($data->count())
@foreach ($data as $pay)
<div class="card" style="width: 18rem;">
    <div class="position-absolute top-0 start-100 translate-middle">
        <button onclick="confirmDeletePay('{{ url('/deletepay', $pay->id) }}')" type="button" class="btn btn-danger bg-danger"><strong>X</strong></button>
    </div>
    <img src="bank/{{ $pay->bank }}.jpg" alt="{{ $pay->bank }}">
  <hr>
    <div class="card-body">
      <h5 class="card-title text-capitalize"><strong>{{ $pay->name }}</strong></h5>
      <p class="card-text">{{ $pay->phone }}</p>
      <p class="card-text">{{ $pay->address }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">foodname : {{ $pay->foodname }}</li>
      <li class="list-group-item text-capitalize">Bank : {{ $pay->bank }}</li>
      <li class="list-group-item">Price : Rp {{ $pay->price }}.000</li>
    </ul>
        <div class="card-body bg-primary btn btn-outline-primary">
          <a href="#" class="card-link text-light">Pay Now</a>
        </div>


  </div>
  @endforeach

  @else
  <p>anda belum melakukan pembelian</p>
  <div style="margin-bottom: 400px;">
  @endif
</div>
</div>


@endsection

<script>
    function confirmDeletePay(url) {
      if (confirm("Apakah Anda yakin ingin menghapus pembayaran ini?")) {
        window.location.href = url;
      }
    }
  </script>
