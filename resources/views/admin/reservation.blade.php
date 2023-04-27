@extends('admin.adminhome')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

</div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Reservation</h1>

<div class="table-responsive" style="overflow-x:scroll;">
    <table class="table table-success table-striped max-">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Message</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->date }}</td>
              <td>{{ $data->time }}</td>
              <td>{{ $data->message }}</td>
              <td>
                  <button onclick="confirmDelete('{{ url('/deletereservation',$data->id) }}')" type="button" class="btn btn-danger bg-danger"><strong>X</strong></button>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>



  <script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
        window.location.href = url;
      }
    }
  </script>
@endsection
