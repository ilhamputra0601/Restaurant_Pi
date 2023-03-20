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
@foreach ($data as $pay)
<div class="card" style="width: 18rem;">
    <img src="bank/{{ $pay->bank }}.jpg" alt="{{ $pay->bank }}">

    <div class="card-body">
      <h5 class="card-title text-capitalize"><strong>{{ $pay->name }}</strong></h5>
      <p class="card-text">{{ $pay->phone }}</p>
      <p class="card-text">{{ $pay->address }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Quantity : {{ $pay->quantity }}</li>
      <li class="list-group-item text-capitalize">Bank : {{ $pay->bank }}</li>
      <li class="list-group-item">Price : Rp {{ $pay->price }}.000</li>
    </ul>
    <div class="card-body bg-primary btn btn-outline-primary">
      <a href="#" class="card-link text-light">Pay Now</a>
    </div>
  </div>
  @endforeach
</div>

@endsection
