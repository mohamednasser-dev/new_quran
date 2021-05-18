<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
{{--    <a href="{{url('/teacher/home')}}">--}}
{{--        @if(session('lang')=='en')--}}
{{--            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/logo_en.png') }}"/>--}}
{{--        @else--}}
{{--            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/logo_ar.png') }}"/>--}}
{{--        @endif--}}
{{--    </a>--}}
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a href="{{url('/teacher/home')}}" class="brand-logo">
{{--                    @if(session('lang')=='en')--}}
{{--                        <img alt="Logo" style="width: 170px;"--}}
{{--                             src="{{ asset('metronic/assets/media/logos/logo_en.png') }}"/>--}}
{{--                    @else--}}
{{--                        <img alt="Logo" style="width: 170px;"--}}
{{--                             src="{{ asset('metronic/assets/media/logos/logo_ar.png') }}"/>--}}
{{--                    @endif--}}
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                            <span class="svg-icon svg-icon svg-icon-xl">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
                                        <path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->

                @include('teacher.layouts.admin_sidebar')
                <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed" style="background-color: #1e1e2d;">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <!--begin::Search-->
                        <div class="dropdown" id="kt_quick_search_toggle">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                    <!--begin:Form-->
                                    <form method="get" class="quick-search-form">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search..." />
                                            <div class="input-group-append">
														<span class="input-group-text">
															<i class="quick-search-close ki ki-close icon-sm text-muted"></i>
														</span>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                    <!--begin::Scroll-->
                                    <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
                                    <!--end::Scroll-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--begin::Notifications-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            @php
                                $notification_data = \App\Models\Notification::where('teacher_id',auth()->guard('teacher')->user()->id)->where('type','teacher')->where('readed','0')->orderBy('id','desc')->get();
                                $un_view_epos = \App\Models\Episode::where('teacher_id',auth()->guard('teacher')->user()->id)->where('teacher_view',0)->where('deleted', '0')->get()->count();
                                $total_new = $un_view_epos + count($notification_data);
                            @endphp
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                @if($total_new > 0)

                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-danger">
                                        <span style="color: red;font-weight: bold;font-size: 18px;">{{$total_new}}</span>
                                        <span class="svg-icon svg-icon-xl svg-icon-danger">

                                        @else
                                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
                                        @endif
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                    <span class="pulse-ring"></span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                        <form>
                                            <!--begin::Header-->
                                            <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(/metronic/assets/media/misc/bg-1.jpg)">
                                                <!--begin::Title-->
                                                <h4 class="d-flex flex-center rounded-top">
                                                    <span class="text-white">{{trans('s_admin.pop_notifications')}}</span>

                                                    <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{$total_new}} {{trans('s_admin.new')}}</span>
                                                </h4>
                                                <!--end::Title-->
                                                <!--begin::Tabs-->
                                                <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">{{trans('s_admin.alerts')}}</a>
                                                    </li>



                                                </ul>
                                                <!--end::Tabs-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Content-->
                                            <div class="tab-content">
                                                <!--begin::Tabpane-->
                                                <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                                                    <!--begin::Scroll-->
                                                    <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
                                                        <!--begin::Item-->
                                                        @if($un_view_epos > 0)
                                                            <div class="d-flex align-items-center mb-6">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                                    <span class="symbol-label">
                                                                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Text-->
                                                                <div class="d-flex flex-column font-weight-bold">
                                                                    <a href="{{route('teacher.new_epo')}}" class="text-dark text-hover-primary mb-1 font-size-lg">{{trans('s_admin.new_episod_Created')}}</a>
                                                                    <span class="text-muted">{{$un_view_epos}} {{trans('s_admin.new')}}</span>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if(count($notification_data) > 0)
                                                            @foreach($notification_data as $row)
                                                                <div class="d-flex align-items-center mb-6">
                                                                    <!--begin::Symbol-->
                                                                    <div
                                                                        class="symbol symbol-40 symbol-light-primary mr-5">
                                                                    <span class="symbol-label">
                                                                        <span
                                                                            class="svg-icon svg-icon-lg svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                          height="24"/>
                                                                                    <path
                                                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                        fill="#000000"/>
                                                                                    <rect fill="#000000" opacity="0.3"
                                                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                          x="16.3255682" y="2.94551858"
                                                                                          width="3" height="18" rx="1"/>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </span>
                                                                    </div>
                                                                    <!--end::Symbol-->
                                                                    <!--begin::Text-->
                                                                    <div class="d-flex flex-column font-weight-bold">
                                                                        @if(app()->getLocale() == 'ar')
                                                                            <a href="{{route('t_episodes.index')}}"  class="text-dark text-hover-primary mb-1 font-size-lg">
                                                                                {{$row->title_ar}}
                                                                            </a>
                                                                            <span class="text-muted"> {{$row->message_ar}}</span>
                                                                        @else
                                                                            <a href="{{route('t_episodes.index')}}" class="text-dark text-hover-primary mb-1 font-size-lg">
                                                                                {{$row->title_en}}
                                                                            </a>
                                                                            <span class="text-muted">  {{$row->message_en}} </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                <!--end::Tabpane-->
                                                <!--begin::Tabpane-->
                                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                    <!--begin::Nav-->
                                                    <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-line-chart text-success"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New report has been received</div>
                                                                    <div class="text-muted">23 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-paper-plane text-danger"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">Finance report has been generated</div>
                                                                    <div class="text-muted">25 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-user flaticon2-line- text-success"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New order has been received</div>
                                                                    <div class="text-muted">2 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-pin text-primary"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New customer is registered</div>
                                                                    <div class="text-muted">3 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-sms text-danger"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">Application has been approved</div>
                                                                    <div class="text-muted">3 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-pie-chart-3 text-warning"></i>
                                                                </div>
                                                                <div class="navinavinavi-text">
                                                                    <div class="font-weight-bold">New file has been uploaded</div>
                                                                    <div class="text-muted">5 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon-pie-chart-1 text-info"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New user feedback received</div>
                                                                    <div class="text-muted">8 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-settings text-success"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">System reboot has been successfully completed</div>
                                                                    <div class="text-muted">12 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon-safe-shield-protection text-primary"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New order has been placed</div>
                                                                    <div class="text-muted">15 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-notification text-primary"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">Company meeting canceled</div>
                                                                    <div class="text-muted">19 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-fax text-success"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New report has been received</div>
                                                                    <div class="text-muted">23 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon-download-1 text-danger"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">Finance report has been generated</div>
                                                                    <div class="text-muted">25 hrs ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon-security text-warning"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New customer comment recieved</div>
                                                                    <div class="text-muted">2 days ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <a href="javascript:void(0);" class="navi-item">
                                                            <div class="navi-link">
                                                                <div class="navi-icon mr-2">
                                                                    <i class="flaticon2-analytics-1 text-success"></i>
                                                                </div>
                                                                <div class="navi-text">
                                                                    <div class="font-weight-bold">New customer is registered</div>
                                                                    <div class="text-muted">3 days ago</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Nav-->
                                                </div>
                                                <!--end::Tabpane-->
                                                <!--begin::Tabpane-->
                                                <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                    <!--begin::Nav-->
                                                    <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                        <br />No new notifications.</div>
                                                    <!--end::Nav-->
                                                </div>
                                                <!--end::Tabpane-->
                                            </div>
                                            <!--end::Content-->
                                        </form>
                                    </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--begin::Languages-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                @if(session('lang')=='en')
                                    <!-- <i class="flag-icon flag-icon-gb"></i><span class="selected-language">English</span></a> -->
                                        <img class="h-20px w-20px rounded-sm"
                                             src="{{ asset('metronic/assets/media/svg/flags/226-united-states.svg') }}"
                                             alt=""/>
                                @else
                                    <!-- <i class="flag-icon flag-icon-kw"></i><span class="selected-language">العربيه</span></a> -->
                                        <img class="h-20px w-20px rounded-sm"
                                             src="{{ asset('metronic/assets/media/svg/flags/133-saudi-arabia.svg') }}"
                                             alt=""/>
                                    @endif
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    <li class="navi-item">
                                        <a href="{{url('lang/en')}}" class="navi-link">
                                                    <span class="symbol symbol-20 mr-3">
                                                        <img
                                                            src="{{ asset('metronic/assets/media/svg/flags/226-united-states.svg') }}"
                                                            alt=""/>
                                                    </span>
                                            <span class="navi-text">English</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="navi-item active">
                                        <a href="{{url('lang/ar')}}" class="navi-link">
                                                    <span class="symbol symbol-20 mr-3">
                                                        <img
                                                            src="{{ asset('metronic/assets/media/svg/flags/133-saudi-arabia.svg') }}"
                                                            alt=""/>
                                                    </span>
                                            <span class="navi-text">العربية</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div
                                class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{trans('s_admin.hi')}},</span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                                    @if(app()->getLocale() == 'ar')
                                        {{auth::guard('teacher')->user()->first_name_ar}}
                                    @else
                                        {{auth::guard('teacher')->user()->first_name_en}}
                                    @endif
                                </span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                            <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                                        </span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                    <div
                        class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                    @yield('title')
                    <!--end::Info-->
                    </div>
                </div>
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <div class="container">
@include('admin.layouts.messages')
@include('admin.layouts.errors')

