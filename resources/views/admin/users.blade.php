<x-Admin-Layout>
    <x-slot name="top">
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">halaman user</h1>
<table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
        @if ($data->usertype=='0')
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>
                <button onclick="confirmDelete('{{ url('/deleteuser',$data->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
            </td>
        </tr>
        @else
        @endif
        @endforeach
    </tbody>
  </table>
</x-Admin-Layout>
  <script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
        window.location.href = url;
      }
    }
  </script>

