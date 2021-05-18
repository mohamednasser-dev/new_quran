<!DOCTYPE html>
<html lang="en">
<head>
    @if(app()->getLocale() == 'ar')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="{{url('/')}}/quran/assets/images/favicon.png" sizes="35x35" type="image/png">
        <title>{{settings()->title_ar}}</title>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
        <style>
            body {
                font-family: 'Droid Arabic Kufi', serif !important;
                font-size: 48px;
                width:100%;
                height:100%;
                overflow-x:hidden;
                overflow-y:hidden;
            }
        </style>
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/all.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/flaticon.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/jquery.bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/slick.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/rtl.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/responsive.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/color.css">
    @elseif(app()->getLocale() == 'en')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="{{url('/')}}/quran/assets/images/favicon.png" sizes="35x35" type="image/png">
        <title>{{settings()->title_en}}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
        <style>
            body {
                font-family: 'Droid Arabic Kufi', serif !important;
                font-size: 48px;
                overflow-x:hidden;
                overflow-y:hidden;
            }
        </style>
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/all.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/flaticon.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/jquery.bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/slick.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/style.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/responsive.css">
        <link rel="stylesheet" href="{{url('/')}}/quran/assets/css/color.css">
    @endif
        @yield('styles')
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
</head>
<body>
<main>
    @if (Session::has('alert.config'))
    @else
        <div id="preloader">
            <div class="preloader-inner">
                <img src="{{url('/')}}/quran/assets/images/logo_only2.png" style="width: 70px">
            </div>
        </div>
@endif
