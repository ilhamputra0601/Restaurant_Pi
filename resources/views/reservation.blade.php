<section class="section" id="reservation">
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}

          </div>
        @endif
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>di sini Anda Bisa Melakukan Reservasi Atau Langsung Datang Ke Restoran Kami</h2>
                    </div>
                    <p>jika ingin memberikan saran atau pujian silahkan hubungi kontak di bawah ini</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="https://api.whatsapp.com/message/A2FUYFNJZFKGL1?autoload=1&app_absent=0">+62 816-808-091</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Email</h4>
                                <span><a href="#">restokampungbunga@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contact" action="{{ url('/reservation') }}" method="post">
                        @csrf
                      <div class="row">
                        <div class="col-lg-12">
                            <h4>Table Reservation</h4>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                            @error('name') <label for="name" class="text-danger">{{ $message }}</label>@enderror
                            <input name="name" type="text" id="name" class="@error('name') is-invalid @enderror" placeholder="Your Name*" required value="{{ old('name') }}" >
                          </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                            @error('email') <label for="email" class="text-danger">{{ $message }}</label>@enderror
                          <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"  class="@error('email') is-invalid @enderror" placeholder="Your Email Address" required value="{{ old('email') }}">
                        </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                            @error('phone') <label for="phone" class="text-danger">{{ $message }}</label>@enderror
                            <input name="phone" type="text" id="phone"  class=" @error('phone') is-invalid @enderror" placeholder="Phone Number*" required value="{{ old('phone') }}">
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            @error('guest') <label for="guest" class="text-danger">{{ $message }}</label>@enderror
                          <input type="number" name="guest" id="guest" placeholder="Number of Guest" class="@error('guest') is-invalid @enderror" required value="{{ old('guest') }}">
                        </div>
                        <div class="col-lg-6">
                            <div id="filterDate2">
                              <div class="input-group date" data-date-format="dd/mm/yyyy">
                                @error('date') <label for="date" class="text-danger">{{ $message }}</label>@enderror
                                <input  name="date" id="date" type="text" class="form-control @error('date') is-invalid @enderror" placeholder="dd/mm/yyyy" required value="{{ old('date') }}">
                                <div class="input-group-addon" >
                                  <span class="glyphicon glyphicon-th"></span>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            @error('time') <label for="time" class="text-danger">{{ $message }}</label>@enderror
                          <input type="time" name="time" id="time" required value="{{ old('time') }}">
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            @error('message') <label for="message" class="text-danger">{{ $message }}</label>@enderror
                            <textarea  name="message" rows="6" id="message" class=" @error('message') is-invalid @enderror" placeholder="Message" required ">{{ old('message') }}</textarea>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
