<head>
        <title>QTM Healthtech -  @yield('head_title', 'Your title here')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="Green MKT Digital">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- description -->
        <meta name="description" content="QTM Healthtech">
        <!-- keywords -->
        <meta name="keywords" content="tecnologia, saúde, vide equilibrada, cromoterapia, barras de access, mapa védico, ventosaterapia">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('site/images/favicon-qtm-01.png') }}">
        <!-- animation -->
        <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="{{ asset('site/css/et-line-icons.css') }}" />
        <!-- font-awesome icon -->
        <script src="https://kit.fontawesome.com/4d7e730138.js" crossorigin="anonymous"></script>
        <!-- themify icon -->
        <link rel="stylesheet" href="{{ asset('site/css/themify-icons.css') }}">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">
        <!-- justified gallery -->
        <link rel="stylesheet" href="{{ asset('site/css/justified-gallery.min.css') }}">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('site/revolution/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('site/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/revolution/css/navigation.css') }}">
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ asset('site/css/bootsnav.css') }}">
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('site/css/style.css') }}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <style type="text/css">            
            #menu-fixo{
                width: 100%; 
                position: fixed; 
                background-color: #ffffff; 
                z-index: 99;
            }

            @media screen and (min-width: 800px) {
                #menu-fixo {
                    display:inline;
                }
            } 

            @media screen and (min-width: 1200px) {
                #menu-fixo {
                    display:none;
                }
            } 
        </style>
        
</head>