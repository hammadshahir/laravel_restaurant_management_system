<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public" />

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <title>Klassy Cafe - Cart</title>
        <!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

        <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css" />

        <link rel="stylesheet" href="assets/css/owl-carousel.css" />

        <link rel="stylesheet" href="assets/css/lightbox.css" />
    </head>

    <body>
        <main>
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
            <header class="header-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ***** Logo Start ***** -->
                                <a href="/" class="logo">
                                    <img src="assets/images/klassy-logo.png" align="klassy cafe" />
                                </a>
                                <!-- ***** Logo End ***** -->
                                <!-- ***** Menu Start ***** -->
                                <ul class="nav">
                                    <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                                    <li class="scroll-to-section"><a href="/">About</a></li>
                                    <li class="scroll-to-section"><a href="/">Menu</a></li>
                                    <li class="scroll-to-section"><a href="/">Chefs</a></li>
                                    <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                                    <li class="scroll-to-section"><a href="/">Contact Us</a></li>
                                    <li class="scroll-to-section">
                                        @auth
                                        <a href="{{url('/showcart', Auth::user()->id)}}"> </a>
                                        @endauth @guest Cart[0] @endguest
                                    </li>
                                    <li class="dropdown-menu">
                                        @if (Route::has('login'))
                                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                            @auth
                                            <li>
                                                <x-app-layout> </x-app-layout>
                                            </li>
                                            @else
                                            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                            @endif @endauth
                                        </div>
                                        @endif
                                    </li>
                                </ul>
                                <!-- ***** Menu End ***** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ***** Header Area End ***** -->
            <div id="top">
                <div class="container">
                    <h1 align="center">CART ITEMS</h1>
                    <table align="center">
                        <tr>
                            <th style="padding: 30px;">Food</th>
                            <th style="padding: 30px;">Price</th>
                            <th style="padding: 30px;">Quantity</th>
                            <th style="padding: 30px;">Action</th>
                        </tr>
                <form action="{{url('confirmorder')}}" method="POST">
                    @csrf
                        @foreach($data as $data)
                        <tr align="center">
                            <td>
                                <input type="text" name="foodname[]" value="{{$data->title}}" hidden="">
                                {{$data->title}}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden="">    
                                {{$data->price}}€

                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{$data->price}}" hidden="">
                                {{$data->quantity}}
                            </td>
                        </tr>
                        @endforeach
                        <tr style="position: relative; top: -60px; right: -360px;">
                            @foreach($cartItem as $cart_item)
                                <td><a href="{{url('/remove', $cart_item->id)}}" class="btn btn-warning btn-sm">Remove</a></td>
                            @endforeach
                        </tr>
                    </table>

                    <div align="center" style="padding: 10px;">
                        <button type="button" class="btn btn-primary" id="order">Order Now</button>
                    </div>
                   
                        <div id="appear" align="center" style="padding: 10px; display: none;">
                            <div style="padding: 10px;">
                                <label>Name:</label>
                                <input type="text" name="username" placeholder="Full Name" />
                            </div>
                            <div style="padding: 10px;">
                                <label>Address:</label>
                                <input type="text" name="address" placeholder="Address" />
                            </div>
                            <div style="padding: 10px;">
                                <label>Phone:</label>
                                <input type="text" name="phone" placeholder="Phone Number" />
                            </div>

                            <div style="padding: 10px;" align="center">
                                <input class="btn btn-success btn-sm" type="submit" value="Confirm Order" />
                                <button type="button" id="close" class="btn btn-danger btn-sm">Close</button>
                            </div>
                        </div>
                </form>
                </div>
                <!-- ***** Footer Start ***** -->
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <div class="right-text-content">
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/images/white-logo.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="left-text-content">
                                    <p>
                                        © Copyright Klassy Cafe Co.

                                        <br />
                                        Design: TemplateMo
                                    </p>
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
                <script src="assets/js/owl-carousel.js"></script>
                <script src="assets/js/accordions.js"></script>
                <script src="assets/js/datepicker.js"></script>
                <script src="assets/js/scrollreveal.min.js"></script>
                <script src="assets/js/waypoints.min.js"></script>
                <script src="assets/js/jquery.counterup.min.js"></script>
                <script src="assets/js/imgfix.min.js"></script>
                <script src="assets/js/slick.js"></script>
                <script src="assets/js/lightbox.js"></script>
                <script src="assets/js/isotope.js"></script>

                <!-- Global Init -->
                <script src="assets/js/custom.js"></script>
                <script>
                    $(function () {
                        var selectedClass = "";
                        $("p").click(function () {
                            selectedClass = $(this).attr("data-rel");
                            $("#portfolio").fadeTo(50, 0.1);
                            $("#portfolio div")
                                .not("." + selectedClass)
                                .fadeOut();
                            setTimeout(function () {
                                $("." + selectedClass).fadeIn();
                                $("#portfolio").fadeTo(50, 1);
                            }, 500);
                        });
                    });
                </script>

                <script type="text/javascript">
                    $("#order").click(function () {
                        $("#appear").show();
                    });
                    $("#close").click(function () {
                        $("#appear").hide();
                    });
                </script>
            </div>
        </main>
    </body>
</html>
