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
            <a href="">Halaman Menu</a>
        </span>
    </div>
    <button onclick="location.href='/redirects'" type="button"class=" rounded-full text-white hover:text-blue-300 "><span> &leftarrow; Dashboard</span></button>
</div>

<form method="post" action="{{'/uploadfood'}}" enctype="multipart/form-data">
    @csrf

            <div class=" items-center p-4  bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="flex  justify-evenly mt-5">
                    <div class="flex-nowrap w-1/2">
                        <div class="mb-5 flex">
                            <label class=" text-white w-1/2" for="title">Title</label>
                            <input id="title" name="title"
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
                                @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 flex">
                            <label class="w-1/2 text-white" for="price">Price</label>
                            <input class="w-1/2 rounded-md  border-2 focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " type="number" id="price" name="price"
                                value="{{ old('price') }}" />
                            @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                          <!-- Message input -->
                          <div class="mb-5 flex">
                              <label class="w-1/2 text-white" for="description">Description</label>
                            <textarea
                                class="w-1/2 rounded-md  border-2 focus:border-sky-500 focus:ring-sky-500 focus:ring-1 form-control  text-dark bg-light @error('description') is-invalid @enderror"
                                id="description" name="description" rows="4"
                                required>{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>


                    <div class="flex-nowrap w-1/2">

                        <div id="upl2" class="my-4" style="display: none">
                            <input type="file"
                                class="text-black bg-white @error('image') text-red-600 @enderror" id="image"
                                name="image" onchange="previewImage()" />
                        </div>
                        <div class="bg-white-300 w-50 h-500" >
                        <img class="img-preview object-contain aspect-square">
                        </div>
                            <div id="upl" class="extraOutline ml-4 p-4 bg-white xl:w-max m-auto rounded-lg">
                                <div class="file_upload p-5 relative border-4 border-dotted border-gray-300 rounded-lg  xl:w-[450px]">
                                    <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                                    <div class="input_field flex flex-col w-max  mx-auto text-center">
                                        <label for="image">
                                            <input class="text-sm cursor-pointer w-36 hidden" type="file" id="image" name="image" onchange="previewImage()"/>
                                            <div class="text  bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">Select</div>
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


    <div class="mx-5">
        <x-Table.Table :headers="['No','Food Menu','Price','Categories','Description','Image','Action']">
            @foreach($data as $menu)
            <tr class="text-gray-700 dark:text-gray-400">
                <x-table.td>{{ $loop->iteration }}</x-table.td>
                <x-table.td>{{$menu->title}}</x-table.td>
                <x-table.td>{{$menu->price}}</x-table.td>
                <x-table.td>{{$menu->category->name}}</x-table.td>
                <x-table.td>{{$menu->description}}</x-table.td>
                <x-table.td><img class="w-20" src="{{ asset('storage/'. $menu->image) }}" alt="{{ $menu->title }}"></x-table.td>
                <x-table.td td="action">
                    <button type="button" onclick="location.href='{{ url('/viewmenu',$menu->id) }}'"
                        class="text-gray-400 hover:text-gray-100 mx-2">
                        <i class="material-icons-outlined text-base">edit</i>
                    </button>
                    <button class="text-gray-400 hover:text-gray-100 ml-2"
                        onclick="confirmDelete('{{ url('/deletemenu', $menu->id) }}')" type="button">
                        <i class="material-icons-round text-base">delete_outline</i>
                    </button>

                </x-table.td>
            </tr>
            @endforeach
        </x-Table.Table>
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
