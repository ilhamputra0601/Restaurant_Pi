<section class="section" id="offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>My Menu</h6>
                    <h2>Tersedia Menu dengan berbagai kategori</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <div class="heading-tabs">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <ul>
                                        @foreach ( $categories as $category )
                                      @auth
                                      <li onClick="location.href='/redirects?category={{ $category->name }}'" ><a href='#tabs-1'><img src="{{ $category->image }}" alt="">{{ $category->name }}</a></li>
                                      @else
                                      <li onClick="location.href='/?category={{ $category->name }}'" ><a href='#tabs-1'><img src="{{ $category->image }}" alt="">{{ $category->name }}</a></li>
                                      @endauth
                                        @endforeach
                                    </ul>
                                </div>
                                <div style="margin-top:50px;" class="container">
                                    <div class="row justify-content-md-center">
                                        @foreach ( $foods as $food )
                                        <div class=" mb-3 col col-lg-2 m-2">
                                            <form action="{{ url('/addcart', $food->id) }}" method="post">
                                                @csrf
                                            <div class="card-sl">
                                            <div class="card-image">
                                                <img src="/storage/{{ $food->image }}" />
                                            </div>
                                            @auth
                                            <a class="card-action" href="/redirects?category={{ $category->name }}"><img src="{{ $food->category->image }}"></a>
                                            @else
                                            <a class="card-action" href="/?category={{ $category->name }}"><img src="{{ $food->category->image }}"></a>
                                            @endauth
                                            <div class="card-heading">
                                                {{ $food->title }}
                                            </div>
                                            <div class="card-text">
                                                {{ $food->description }}
                                            </div>
                                            <div class="card-text">
                                                Rp {{ $food->price }}.000
                                            </div>
                                            <input  style="width: 75px;" type="number" min="1" value="1" id="quantity" name="quantity" class="form-control border border-primary rounded mr-1 ml-5"  placeholder="Quantity" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                            <button type="submit" class="btn btn-primary bg-primary text-light card-button">add cart</button>
                                            {{-- <a href="#" class="card-button"> Purchase</a> --}}
                                        </div>
                                    </form>
                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
