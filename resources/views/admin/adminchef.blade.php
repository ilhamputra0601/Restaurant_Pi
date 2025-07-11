<x-Admin-Layout>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<div class="mx-5 my-5">
<h1 class="fs-2 text-uppercase mb-5">Halaman Menu</h1>


<form method="post" action="{{'/createchef'}}" enctype="multipart/form-data">
    @csrf

            <div class=" items-center p-4  bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="flex  justify-evenly mt-5">
                    <div class="flex-nowrap w-1/2">
                        <div class="mb-5 flex">
                            <label class=" text-white w-1/2" for="name">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-1/2 placeholder:italic placeholder:text-slate-400  bg-white border border-slate-300 rounded-md  shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm @error('name')   border-pink-500 placeholder:text-pink-400 @enderror"
                                @if ($errors->has('name')) @error('name')placeholder="{{ $message }}" @enderror @else
                            placeholder=" Tulis Nama Makanan." @endif type="text"/>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-5 flex">
                            <label class=" text-white w-1/2" for="category_id">Speciality</label>
                            <select id="category_id" name="category_id"
                                class="w-1/2 text-xl italic rounded-md  border-2  h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                @foreach ($categories as $category)
                                @if (old('speciality') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>


                    </div>


                    <div class="flex-nowrap w-1/2">

                        <div id="upl2" class="my-4" style="display: none">
                            {{-- <input type="file" id="image" name="image" class="text-black bg-white @error('image') text-red-600 @enderror"  onchange="previewImage()" /> --}}

                            <img class="img-preview object-contain aspect-square">
                        </div>
                        <div class="bg-white-300 w-50 h-500" >
                        </div>
                            <div id="upl" class="extraOutline p-4 bg-white ml-4 xl:w-max bg-whtie m-auto rounded-lg">
                                <div class="file_upload p-5 relative border-4 border-dotted border-gray-300 rounded-lg xl:w-[450px]" >
                                    <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                                    <div class="input_field flex flex-col w-max mx-auto text-center">
                                        <label for="image">
                                            <input class="text-sm cursor-pointer w-36 hidden" type="file" id="image" name="image" onchange="previewImage()"/>
                                            <div class="text bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">Select</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('image')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit button -->
                <button type="submit" class="bg-green-500 rounded-full text-white hover:bg-green-700 ring ring-green-800 hover:ring-green-500"><span class="p-7 text-xl">Save</span></button>
            </div>
        </div>
    </form>


{{-- <form method="post"  action="{{'/createchef'}}" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="name" name="name" class="form-control text-dark bg-light @error('name') is-invalid @enderror" autofocus required value="{{ old('name') }}" />
                <label class="form-label" for="name">Name</label>
                @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="speciality" name="speciality" class="form-control text-dark bg-light @error('speciality') is-invalid @enderror" required value="{{ old('speciality') }}" />
                <label class="form-label" for="speciality">Speciality</label>
                @error('speciality')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="image" >input image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control text-dark bg-light @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" />
        @error('image')<div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
</form> --}}



<div class="mx-5">
    <x-Table.Table :headers="['No','Name','Speciality','Image','Action']">
        @foreach($data as $chef)
        <tr class="text-gray-700 dark:text-gray-400">
            <x-table.td>{{ $loop->iteration }}</x-table.td>
            <x-table.td>{{$chef->name}}</x-table.td>
            <x-table.td>{{$chef->category->name}}</x-table.td>
            <x-table.td><img class="w-20" src="{{ asset('storage/'. $chef->image) }}" alt="{{ $chef->name }}"></x-table.td>
            <x-table.td td="action">
                <button type="button" onclick="location.href='{{ url('/showchef',$chef->id) }}'"
                    class="text-gray-400 hover:text-gray-100 mx-2">
                    <i class="material-icons-outlined text-base">edit</i>
                </button>
                <button class="text-gray-400 hover:text-gray-100 ml-2"
                    onclick="confirmDelete('{{ url('/deletechef', $chef->id) }}')" type="button">
                    <i class="material-icons-round text-base">delete_outline</i>
                </button>

            </x-table.td>
        </tr>
        @endforeach
    </x-Table.Table>
</div>

  {{-- <table class="table table-success table-striped" style="max-width: 600px;">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Speciality</th>
          <th scope="col">Image</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $data)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->name }}</td>
              <td>{{ $data->speciality }}</td>
              <td><img src="{{ asset('storage/'. $data->image)  }}" alt="{{ $data->name }}"></td>
              <td>
                  <button onclick="location.href='{{ url('/showchef',$data->id) }}'" type="button" class="btn btn-primary"><strong>⨇</strong></button>
              </td>
              <td>
                <button onclick="confirmDelete('{{ url('/deletechef', $data->id) }}')" type="button" class="btn btn-danger"><strong>X</strong></button>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table> --}}
</div>
</x-Admin-Layout>
  <script>
    //  img preview
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        const upl = document.querySelector('#upl');
        const upl2 = document.querySelector('#upl2');

        imgPreview.style.display = 'block';
        upl.style.display = 'none';
        upl2.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
  </script>

<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus menu ini?")) {
        window.location.href = url;
      }
    }
  </script>



