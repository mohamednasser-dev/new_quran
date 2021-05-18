<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
    @php $app = \App\Models\Web_setting::where('id',1)->first(); @endphp
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>{{$app->title_ar}}</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('metronic/assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('metronic/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('metronic/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('metronic/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('metronic/assets/media/logos/favicon.ico') }}"/>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <img src="{{url('/')}}/quran/assets/images/login_images/login.png" style="width: auto; height: 1050px;" >
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div
            class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <!--begin::Aside body-->
            <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                <a href="#" class="mb-15 text-center">
                    <img src="{{url('/')}}/quran/assets/images/logo_only.png" class="max-h-75px" alt="" />
                </a>
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <div class="text-center mb-10 mb-lg-20">
                        <h2 class="font-weight-bold">{{$app->title_ar}}</h2>
                        <p class="text-muted font-weight-bold">{{$app->title_en}}</p>
                    </div>
                @include('admin.layouts.errors')
                @include('admin.layouts.messages')
                    <!--begin::Form-->
                    {{ Form::open( ['route'  => ['login_both'],'method'=>'post' , 'class'=>'form'] ) }}
                    {{ csrf_field() }}
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">{{trans('admin.email')}}</label>
                            <input required class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="email" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{trans('admin.password')}}</label>
                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">{{trans('admin.forgot_Pass')}}</a>
                            </div>
                            <input required class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{trans('admin.login')}}</button>
                        </div>
                        <!--end::Action-->
                {{ Form::close() }}
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
                <!--begin::Signup-->
                <div class="login-form login-signup">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="">Sign Up</h3>
                        <p class="text-muted font-weight-bold">Enter your details to create your account</p>
                    </div>
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="kt_login_signup_form">
                        <div class="form-group py-3 m-0">
                            <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
                        </div>
                        <div class="form-group py-3 border-top m-0">
                            <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group py-3 border-top m-0">
                            <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Password" name="password" autocomplete="off" />
                        </div>
                        <div class="form-group py-3 border-top m-0">
                            <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
                        </div>
                        <div class="form-group mt-5">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline">
                                    <input type="checkbox" name="agree" />
                                    <span></span>I Agree the
                                    <a href="#" class="ml-1">terms and conditions</a>.</label>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center">
                            <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                            <button id="kt_login_signup_cancel" class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signup-->
                <!--begin::Forgot-->
                <div class="login-form login-forgot">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="">Forgotten Password ?</h3>
                        <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                    </div>
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                        <div class="form-group py-3 border-bottom mb-10">
                            <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center">
                            <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                            <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Forgot-->
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">2020©</span>
                    <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">URAM</a>
                </div>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('metronic/assets/js/pages/custom/login/login-general.js') }}"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
