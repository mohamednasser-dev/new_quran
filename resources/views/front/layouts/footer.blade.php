
@php $app = \App\Models\Web_setting::where('id',1)->first(); @endphp
@if(request()->segment(1) != 'times')
    <section>
        <div class="w-100 pt-90 pb-235 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute">
        </div>
    </section>
@endif

<footer>
    <div class="w-100 pt-110 black-layer pb-60 opc1 position-relative">
        <div class="fixed-bg" style="background-image: url(/quran/assets/images/course-bg2.png);"></div>
        <div class="container">
            <div class="footer-data v3 w-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="widget w-100">
                            <div class="logo">
                                <h1 class=" mb-0">
{{--                                    <div class="col-md-6">--}}
                                    <a href="{{url('/')}}" title="Home">
{{--                                        @if(app()->getLocale() == 'ar')--}}
{{--                                            <img style="width: 150px;" class="img-fluid" src="{{url('/')}}/quran\assets\images\login_images\footer_second.png" alt="Logo" srcset="{{url('/')}}/quran\assets\images\login_images\footer_second.png">--}}
{{--                                        @else--}}
{{--                                            <img style="width: 150px;" class="img-fluid" src="{{url('/')}}/quran\assets\images\login_images\footer_second.png" alt="Logo" srcset="{{url('/')}}/quran\assets\images\login_images\footer_second.png">--}}
{{--                                        @endif--}}
                                    </a>
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <a href="{{url('/')}}" title="Home">--}}
{{--                                            @if(app()->getLocale() == 'ar')--}}
{{--                                                <img style="width: 700px;height: 100px;" class="img-fluid" src="{{url('/')}}/uploads\logo\footer\logo_ar.png" alt="Logo" srcset="{{url('/')}}/uploads\logo\footer\logo_ar.png">--}}
{{--                                            @else--}}
{{--                                                <img style="width: 700px;height: 100px;" class="img-fluid" src="{{url('/')}}/uploads\logo\footer\logo_en.png" alt="Logo" srcset="{{url('/')}}/uploads\logo\footer\logo_en.png">--}}
{{--                                            @endif--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </h1>
                            </div>
                        </div>
                        <div class="widget w-100">
                            <h4 class="widget-title">{{trans('admin.connect_social')}}</h4>
                            <div class="social-links3 d-flex flex-wrap w-100">
                                <a href="{{$app->facebook}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i>facebook</a>
                                <a href="{{$app->twiter}}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i>twitter</a>
                                <a href="{{$app->linked_in}}" title="linkedin" target="_blank"><i class="fab fa-linkedin"></i>LinkedIn</a>
                                <a href="{{$app->youtube}}" title="Youtube" target="_blank"><i class="fab fa-youtube"></i>youtube</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="widget w-100">
                            <h4 class="widget-title"></h4>
                            <div class="newsletter-form w-100">
                                <i class="far fa-envelope thm-clr"></i>
                                <input type="email" placeholder="{{trans('admin.write_email_new')}}">
                                <button class="thm-btn thm-bg" type="submit">{{trans('admin.send')}}<span></span><span></span><span></span><span></span></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-lg-5">
                                <div class="widget w-100">
                                    <h4 class="widget-title"></h4>
                                    <ul class="mb-0 list-unstyled w-100">

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-6 col-lg-5">
                                <div class="widget w-100">
                                    <h4 class="widget-title">{{trans('admin.web_data')}}</h4>
                                    <ul class="mb-0 list-unstyled w-100">
                                        @if(session('lang')=='en')
                                            <li><a href="javascript:void(0);" title="">{{$app->address_en}}</a></li>
                                        @else
                                            <li><a href="javascript:void(0);" title="">{{$app->address_ar}}</a></li>
                                        @endif
                                        <li><a href="javascript:void(0);" title="">{{$app->email}}</a></li>
                                        <li><a href="javascript:void(0);" title="">{{$app->phone}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Footer Data -->
        </div>
    </div>
</footer><!-- Footer -->

<div class="bottom-bar3 dark-bg3 w-100">
    <div class="container">
        <div class="bottom-inner d-flex flex-wrap justify-content-between align-items-center w-100">
            <p class="mb-0"><a href="{{url('/')}}" title="Home">URAM</a> - {{trans('admin.all_reserve')}}</p>
        </div>
    </div>
</div>
        </main><!-- Main Wrapper -->
        <script src="{{url('/')}}/quran/assets/js/jquery.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/popper.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/wow.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/counterup.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/jquery.fancybox.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/perfect-scrollbar.min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/slick.min.js"></script>
        <!-- <script src="assets/js/particles.min.js"></script>
        <script src="assets/js/particle-int.js"></script> -->
        <script src="{{url('/')}}/quran/assets/js/musicplayer-min.js"></script>
        <script src="{{url('/')}}/quran/assets/js/custom-scripts.js"></script>
        <script src="{{url('/')}}/metronic/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
        @include('sweetalert::alert')
        @yield('scripts')
    </body>
</html>
