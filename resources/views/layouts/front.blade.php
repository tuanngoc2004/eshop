<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    {{-- <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    {{-- google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        a{
            text-decoration: none !important;
        }    
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}"> --}}
</head>
<body>
    
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>


    <div class="whatsapp-chat">
        <a href="https://wa.me/15551234567?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="{{ asset('assets/images/whatsapp.jpg') }}" alt="whatsapp" height="80px" width="80px">
        </a>
    </div>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    {{-- jquery 3.7.0 --}}
    <script src="{{ asset('frontend/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/custom.js') }}" ></script>
    <script src="{{ asset('frontend/js/checkout.js') }}" ></script>
    


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/64ca2abacc26a871b02cc669/1h6qrdqus';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    {{-- đây là jquery của code script search bên dưới --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        
        var availableTags = [];

        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response){
                // console.log(response);
                setAutoComplete(response);
            }
        })

        function setAutoComplete(availableTags){
            $( "#search_product" ).autocomplete({
                source: availableTags
            });
        }
        
        </script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
    @if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif

    @yield('scripts')
    
</body>
</html>
