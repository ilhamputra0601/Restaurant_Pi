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
    <img src="bank/{{ $pay->bank->name }}.jpg" alt="{{ $pay->bank->name }}">
  <hr>
    <div class="card-body">
      <h5 class="card-title text-capitalize"><strong>{{ $pay->name }}</strong></h5>
      <p class="card-text">{{ $pay->phone }}</p>
      <p class="card-text">{{ $pay->address }}</p>
      <p class="card-text">{{ $pay->created_at->diffForHumans()}}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">foodname : {{ $pay->foodname }}</li>
      <li class="list-group-item text-capitalize">Bank : {{ $pay->bank->name }}</li>
      <li class="list-group-item">Price : Rp {{ $pay->price }}.000</li>
    </ul>
            <button type="button" class="text-light bg-primary btn btn-outline-primary btn-primary launch" data-toggle="modal" data-target="#exampleModal{{ $pay->id }}"></i> Pay Now
            </button>


  </div>

  <!-- Modal -->
  <div class="modal fade"  id="exampleModal{{ $pay->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img src="bank/{{ $pay->bank->name }}.png" alt="{{ $pay->bank->name }}">
        </div>
        <div class="modal-body">
            <h2>Or Bopy Below</h2>
        </div>
        <div class="modal-body">
            <h1>{{ $pay->bank->number }}</h1>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
@endforeach
  @else
  <p>anda belum melakukan pemesanan</p>
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
