<!DOCTYPE html>
<html lang="en">

  <head>
<base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Restaurant Kampung Bunga</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{url ('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{url('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{url('assets/css/templatemo-klassy-cafe.css') }}">

    <link rel="stylesheet" href="{{url('assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{url('assets/css/lightbox.css') }}">

    <link rel="stylesheet" href="/assets/css/menu2.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"data-client-key="{{ config('app.client_key') }}"></script>


    </head>

    <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('navbar')
    <!-- ***** Header Area End ***** -->
    @yield('container')

      <!-- ***** Footer Start ***** -->
      <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="https://api.whatsapp.com/message/A2FUYFNJZFKGL1?autoload=1&app_absent=0"><i class="fa fa-phone"></i></a></li>
                                <li><a href="https://www.instagram.com/restokampungbunga.official/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo" style="width: 100px;">
                        <a href="/" class="d-flex"><img src="{{url('assets/images/white-logo.png') }}" width="100"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Resto Kampung bunga.

                        <br>By : ilham Ramadhan</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{url('assets/js/owl-carousel.js') }}"></script>
    <script src="{{url('assets/js/accordions.js') }}"></script>
    <script src="{{url('assets/js/datepicker.js') }}"></script>
    <script src="{{url('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{url('assets/js/waypoints.min.js') }}"></script>
    <script src="{{url('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{url('assets/js/imgfix.min.js') }}"></script>
    <script src="{{url('assets/js/slick.js') }}"></script>
    <script src="{{url('assets/js/lightbox.js') }}"></script>
    <script src="{{url('assets/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{url('assets/js/custom.js') }}"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
  </body>
</html>
