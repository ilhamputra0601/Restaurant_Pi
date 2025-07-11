<x-Admin-Layout>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}

  </div>
@endif
<h1 class="fs-2 text-uppercase mb-5">Halaman Menu</h1>

<form method="post" action="{{url('/update',$data->id)}}" enctype="multipart/form-data">
    @csrf

    <div class="mx-5 my-5">
        <div class=" items-center p-4  bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="flex  gap-6 justify-evenly mt-5">

                <div class="flex-nowrap w-1/2">
                    <div class="mb-5 flex">
                        <label class=" text-white w-1/2" for="title">Title</label>
                        <input id="title" name="title" autofocus required value="{{ old('title',$data->title) }}"
                            class="w-1/2 placeholder:italic placeholder:text-slate-400  bg-white border border-slate-300 rounded-md  shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm @error('title')   border-pink-500 placeholder:text-pink-400 @enderror"
                            @if ($errors->has('title')) @error('title')placeholder="{{ $message }}" @enderror @else
                        placeholder=" Tulis Nama Makanan." @endif type="text"/>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-5 flex">
                        <label class=" text-white w-1/2" for="category">Category</label>
                        <select id="category" name="category_id"
                            class="w-1/2 text-xl italic rounded-md  border-2  h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @foreach ($categories as $category)
                            @if (old('category_id',$data->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5 flex">
                        <label class="w-1/2 text-white" for="price">Price</label>
                        <input required value="{{ old('price',$data->price) }}"
                        class="w-1/2 rounded-md  border-2 focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " type="number" id="price" name="price"
                            value="{{ old('price') }}" />
                        @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                      <!-- Message input -->
                      <div class="mb-5 flex">
                          <label class="w-1/2 text-white" for="description">Description</label>
                        <textarea
                            class="w-1/2 rounded-md  border-2 focus:border-sky-500 focus:ring-sky-500 focus:ring-1 form-control  text-dark bg-light @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4"
                            required>{{ old('description',$data->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>


                <div class=" w-1/2">
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
        </div>
        <div class="flex justify-center gap-4">
            <a href="/foodmenu" class="bg-blue-500 rounded-full text-white hover:bg-blue-700 ring ring-blue-800 hover:ring-blue-500"><span class="p-7 text-xl">back</span></a>
            <button type="submit" class="bg-green-500 rounded-full text-white hover:bg-green-700 ring ring-green-800 hover:ring-green-500"><span class="p-7 text-xl">Save</span></button>
        </div>

        </div>
    </div>

</form>



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
