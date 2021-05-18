<ul class="menu-nav">
    <li class="menu-item @if(request()->segment(1) == 'student' && request()->segment(2) == 'home' ) menu-item-active  @endif " aria-haspopup="true">
        <a href="{{url('/student/home')}}" class="menu-link">
            <span class="svg-icon menu-icon">
                <span class="svg-icon svg-icon-success svg-icon-2x">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path
                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                            fill="#000000" fill-rule="nonzero"/>
                        <path
                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                            fill="#000000" opacity="0.3"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
            </span>
            <span class="menu-text">{{trans('s_admin.nav_home')}}</span>
        </a>
    </li>
    <li class="menu-item @if(request()->segment(2) == 'my_episodes') menu-item-active  @endif" aria-haspopup="true">
        <a href="{{route('student.my_episodes')}}" class="menu-link">
            <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Book-open.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path
                            d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
                            fill="#000000"/>
                        <path
                            d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                            fill="#000000" opacity="0.3"/>
                    </g>
                </svg><!--end::Svg Icon-->
            </span>
            <span class="menu-text">{{trans('s_admin.my_episodes')}}</span>
        </a>
    </li>
    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
           <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Design\Magic.svg--><svg
                   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                   height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path
                                d="M1,12 L1,14 L6,14 L6,12 L1,12 Z M0,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,15 C21,15.5522847 20.5522847,16 20,16 L0,16 C-0.55228475,16 -1,15.5522847 -1,15 L-1,11 C-1,10.4477153 -0.55228475,10 0,10 Z"
                                fill="#000000" fill-rule="nonzero"
                                transform="translate(10.000000, 13.000000) rotate(-225.000000) translate(-10.000000, -13.000000) "/>
                            <path
                                d="M17.5,12 L18.5,12 C18.7761424,12 19,12.2238576 19,12.5 L19,13.5 C19,13.7761424 18.7761424,14 18.5,14 L17.5,14 C17.2238576,14 17,13.7761424 17,13.5 L17,12.5 C17,12.2238576 17.2238576,12 17.5,12 Z M20.5,9 L21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 L20.5,11 C20.2238576,11 20,10.7761424 20,10.5 L20,9.5 C20,9.22385763 20.2238576,9 20.5,9 Z M21.5,13 L22.5,13 C22.7761424,13 23,13.2238576 23,13.5 L23,14.5 C23,14.7761424 22.7761424,15 22.5,15 L21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,13.5 C21,13.2238576 21.2238576,13 21.5,13 Z"
                                fill="#000000" opacity="0.3"/>
                        </g>
                    </svg><!--end::Svg Icon-->
           </span>
            <span class="menu-text">{{trans('s_admin.nav_my_orders')}}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link">
                        <span class="menu-text">{{trans('s_admin.nav_my_orders')}}</span>
                    </span>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">{{trans('s_admin.my_requests')}}</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">{{trans('s_admin.nav_vac_order')}}</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">{{trans('s_admin.nav_order_permission')}}</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">{{trans('s_admin.show_come_out')}}</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text"> رفع شكوى وطلب</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">طلب تغير حلقة / معلم</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">تغير المعلم</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="javascript:void(0);" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">تقييم المقرأه الإلكترونية</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
