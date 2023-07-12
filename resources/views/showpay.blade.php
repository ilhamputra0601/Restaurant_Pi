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
    {{-- <p class="container">{{ $data->snapToken }}</p> --}}
    @if ($data->count())
@foreach ($data as $pay)
<div class="card" style="width: 18rem;">
    <div class="position-absolute top-0 start-100 translate-middle">
        <button onclick="confirmDeletePay('{{ url('/deletepay', $pay->id) }}')" type="button" class="btn btn-danger bg-danger"><strong>X</strong></button>
    </div>
    {{-- <img src="bank/{{ $pay->bank->name }}.jpg" alt="{{ $pay->bank->name }}"> --}}
  <hr>
    <div class="card-body">
      <h5 class="card-title text-capitalize"><strong>{{ $pay->name }}</strong></h5>
      <p class="card-text">{{ $pay->phone }}</p>
      <p class="card-text">{{ $pay->snapToken }}</p>
      <p class="card-text">{{ $pay->address }}</p>
      <p class="card-text">{{ $pay->created_at->diffForHumans()}}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">foodname : {{ $pay->foodname }}</li>
      <li class="list-group-item">Price : Rp {{ $pay->price }}.000</li>
    </ul>
    @if ($pay->paid)
    <button type="button" class="text-light bg-success" disabled>Already Paid</button>
    @else
    <button type="button" class="text-light bg-primary btn btn-outline-primary btn-primary launch" id="pay-button{{ $pay->id }}">Pay Now</button>
    @endif
  </div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button{{ $pay->id }}');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $pay->snapToken }}',
    {
    onSuccess: function(result){
        /* You may add your own implementation here */
    alert("payment success!"); console.log(result);
    // location.href = '/';
    },
    onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
    },
    onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
    },
    onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    })
    });
</script>


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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

