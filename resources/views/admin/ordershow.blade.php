@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif

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
          <th scope="col">Paid</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->foodname }}</td>
              <td>Rp {{ $data->price }}.000</td>
              <td>{{ $data->quantity }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->address }}</td>
              <td>
                <form action="{{ url('/updatepay', $data->id) }}" method="POST">
                    @csrf

                    <label for="category" class="form-label">Select payment</label>
                    <select class="form-select" name="paid" required onchange="this.form.submit()">
                        <option style="display: none" value="{{ $data->paid }}" {{ $data->paid ? 'selected' : '' }}>
                            {{ $data->paid ? 'Paid' : 'Not Paid' }}
                        </option>
                        <option value="1">Paid</option>
                        <option value="0">Not Paid</option>
                    </select>
                </form>
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
        <p><strong>User:</strong>{{ $data->name }}</p>
        <p><strong>Phone:</strong> {{ $data->phone }}</p>
        <p><strong>Address:</strong> {{ $data->address }}</p>
        <p><strong>Total Quantity:</strong>{{ $quantity }}</p>
        <p><strong>Total Price:</strong> Rp {{ $total_price }}.000</p>
      </div>
    </div>
  </div>
</div>

<button onclick="location.href='/orders'" type="button" class="btn btn-primary bg-primary mt-3 absolute"><strong>Back</strong></button>

@endsection
