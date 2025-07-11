<x-Admin-Layout>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<div class="mx-5 my-5">
<div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
            </path>
        </svg>
        <span>
            <a href="">Halaman Update </a>
        </span>
    </div>
    <button onclick="location.href='/viewchef'" type="button"class=" rounded-full text-white hover:text-blue-300 "><span> &leftarrow; Back</span></button>
</div>

<form method="post" class="" action="{{url('/updatechef',$data->id)}}" enctype="multipart/form-data">
    @csrf

            <div class=" items-center p-4  bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="flex gap-6 justify-evenly mt-5">
                    <div class="flex-nowrap w-1/2">
                        <div class="mb-5 flex">
                            <label class=" text-white w-1/2" for="name">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-1/2 placeholder:italic placeholder:text-slate-400  bg-white border border-slate-300 rounded-md  shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm @error('name')   border-pink-500 placeholder:text-pink-400 @enderror"
                                @if ($errors->has('name')) @error('name')placeholder="{{ $message }}" @enderror @else
                            placeholder=" Tulis Nama Makanan." @endif type="text" autofocus  value="{{ old('name',$data->name) }}" />
                            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-5 flex">
                            <label class=" text-white w-1/2" for="category_id">Speciality</label>
                            <select id="category_id" name="category_id"
                                class="w-1/2 text-xl italic rounded-md  border-2  h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                @foreach ($categories as $category)
                                @if (old('category_id',$data->category_id) == $category->id)
                                <option value="{{ $category->id}}" selected>{{ $category->name}}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class=" w-1/2 ">
                        <div class="bg-white-300 " >
                        @if ($data->image)
                        <img src="{{ asset('storage/'. $data->image) }}" class="img-preview object-contain aspect-square block w-72">
                        @else
                        <img class="img-preview object-contain aspect-square">
                        @endif
                        </div>
                        <div  class="mt-4" >
                            <input type="file"
                                class="text-black bg-white @error('image') is-invalid @enderror" id="image"
                                name="image" onchange="previewImage()" />
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
</div>
</x-Admin-Layout>
  <script>
    //  img preview
function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
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

