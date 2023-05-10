 <!-- ***** Menu Area Starts ***** -->
 <section class="section" id="menu">
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}

          </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Pilihan Menu kami dengan rasa berkualitas</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach (  $foods as $food )
                <form action="{{ url('/addcart', $food->id) }}" method="post">
                    @csrf
                <div class="item">
                    <div style="background-image: url('/storage/{{ $food->image }}');" class='card card1'>
                    {{-- <div style="background-image: url('{{ $food->image }}');" class="card card{{ $loop->iteration }}"> --}}
                        <div class="price"><h6>{{ $food->price }} K</h6></div>
                        <div class='info'>
                            <h1 class='title'>{{ $food->title }}</h1>
                            <p class='description'>{{ $food->description }}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-2" style="width: 300px;">
                        <input type="number" min="1" value="1" id="quantity" name="quantity" class="form-control border border-primary rounded mr-1 ml-5"  placeholder="Quantity" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button class="btn btn-outline-primary rounded-r" type="submit" id="button-addon2">add cart</button>
                      </div>
                </div>
            </form>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->
