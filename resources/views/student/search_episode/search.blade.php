@extends('student.student_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.search_cont_chanel')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
{{--    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>--}}
@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Inbox-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_inbox_aside">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card card-custom bg-success">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h3 class="card-label text-white">{{trans('s_admin.search_methods')}}</h3>
                                </div>
                            </div>
                        </div>
                        {{ Form::open( ['route'  => ['search.episodes'],'method'=>'post' , 'class'=>'form'] ) }}
                        {{ csrf_field() }}
                        <div class="card-body px-5">
                            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                <!--begin::Container-->
                                <div class="pb-5">
                            <!--begin::Compose-->
                            <div class="px-4 mt-4 mb-10">
                                <button type="submit" class="btn btn-block btn-primary py-4 px-6 text-center">
                                    {{trans('s_admin.search')}}
                                </button>
                            </div>
                            <!--end::Compose-->
                            <!--begin::Navigations-->
                            <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                                <div class="card-body pt-15">
                                <div class="form-group">
                                    <h4 style="font-weight: bold;">{{trans('s_admin.level')}}</h4>
                                    <div class="radio-list">
                                        @php $levels = \App\Models\Level::where('type','far_learn')->where('deleted','0')->get(); @endphp
                                        @foreach($levels as $row)
                                            <label class="radio">
                                                <input type="radio" value="{{$row->id}}" name="level_id">
                                                <span></span>
                                                @if(app()->getLocale() == 'ar')
                                                    {{$row->name_ar}}
                                                @else
                                                    {{$row->name_en}}
                                                @endif
                                            </label>
                                        @endforeach
                                        <label class="radio">
                                            <input type="radio" checked="checked" name="level_id">
                                            <span></span>{{trans('s_admin.all')}}</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 style="font-weight: bold;">{{trans('s_admin.gender')}}</h4>
                                    <div class="radio-list">
                                        <label class="radio">
                                            <input type="radio" value="male" name="gender">
                                            <span></span>{{trans('s_admin.male_only')}}</label>
                                        <label class="radio">
                                            <input type="radio" value="female" name="gender">
                                            <span></span>{{trans('s_admin.female_only')}}</label>
                                        <label class="radio">
                                            <input type="radio" value="children" name="gender">
                                            <span></span>{{trans('s_admin.children_only')}}</label>
                                        <label class="radio">
                                            <input type="radio" checked="checked" name="gender">
                                            <span></span>{{trans('s_admin.all')}}</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 style="font-weight: bold;">{{trans('s_admin.teacher_talk')}}</h4>
                                    <div class="radio-list">
                                        <label class="radio">
                                            <input type="radio" value="ar" checked name="language">
                                            <span></span>{{trans('s_admin.arabic')}}
                                        </label>
                                        <label class="radio">
                                            <input type="radio" value="en" name="language">
                                            <span></span>{{trans('s_admin.english')}}
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 style="font-weight: bold;">{{trans('s_admin.tall_line')}}</h4>
                                    <div class="radio-list">
                                        <label class="radio">
                                            <input type="radio" checked name="place">
                                            <span></span>   {{trans('s_admin.not_want_place')}}
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="place">
                                            <span></span>{{trans('s_admin.want_to_determind')}}
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 style="font-weight: bold;">{{trans('s_admin.study_cost')}}</h4>
                                    <div class="radio-list">
                                        <label class="radio">
                                            <input type="radio" value="free" checked name="cost">
                                            <span></span>{{trans('s_admin.free_epo')}}
                                        </label>
                                        <label class="radio">
                                            <input type="radio" value="cost" name="cost">
                                            <span></span>{{trans('s_admin.epo_with_cost')}}
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="cost">
                                            <span></span>{{trans('s_admin.all_epo')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!--end::Aside-->
                <!--begin::List-->
                <div class="flex-row-fluid ml-lg-8 d-block" id="kt_inbox_list">
                    {{--begin head teacher search--}}
                    <div class="card card-custom bg-primary">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-search-1 text-white"></i>
                                </span>
                                <h3 class="card-label text-white">{{trans('s_admin.search_result')}}</h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    @foreach($data as $row)
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="d-flex">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-7">
                                    <div class="symbol symbol-50 symbol-lg-120">
                                        @if($row->Teacher->image == null)
                                            <img alt="Pic" src="{{ asset('uploads/teachers/default_avatar.jpg') }}">
                                        @else
                                            <img alt="Pic" src="{{url($row->Teacher->image)}}">
                                        @endif
                                        <P style="width: 150px;">
                                            @if( app()->getLocale() == 'ar' )
                                                {{ str_limit($row->Teacher->bio_ar, $limit = 70) }}
                                            @else
                                                {{ str_limit($row->Teacher->bio_en, $limit = 70) }}
                                            @endif
                                        </P>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin: Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                        <!--begin::User-->
                                        <div class="mr-3">
                                            <!--begin::Name-->
                                            <a href="javascript:void(0);"
                                               class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                                {{trans('s_admin.teacher_name')}}/
                                                @if( app()->getLocale() == 'ar' )
                                                    {{$row->Teacher->first_name_ar}}  {{$row->Teacher->mid_name_ar}}
                                                @else
                                                    {{$row->Teacher->first_name_en}} {{$row->Teacher->mid_name_en}}
                                                @endif
                                                <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                            <!--end::Name-->
                                            <!--begin::Contacts-->
                                            <div class="d-flex flex-wrap my-2">

                                            </div>
                                            <!--end::Contacts-->
                                        </div>
                                        <!--begin::User-->
                                        <!--begin::Actions-->
                                        <div class="my-lg-0 my-1">
                                            <h4>{{trans('s_admin.teacher_eposide')}}</h4>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Content-->
{{--                                    @php $eposides = $search_query->where('teacher_id',$row->teacher_id)->get(); @endphp--}}

                                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                                        <table class="table mb-5">
                                            <thead class="bg-success">
                                            <tr>
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.episode_name')}}</th>
                                                @if($row->type == 'mogmaa' || $row->type == 'dorr')
                                                    <th scope="col" style="font-size: 12px;">{{trans('s_admin.mogmaa_name')}}</th>
                                                @endif
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.gender')}}</th>
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.want_num')}}</th>
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.student_number')}}</th>
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.monthly_cost')}}</th>
                                                <th scope="col" style="font-size: 12px;">{{trans('s_admin.details')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <th scope="row">
                                                        @if( app()->getLocale() == 'ar' )
                                                            {{$row->name_ar}}
                                                        @else
                                                            {{$row->name_en}}
                                                        @endif
                                                    </th>
                                                    @if($row->type == 'mogmaa' || $row->type == 'dorr')
                                                        <td>
                                                            @if( app()->getLocale() == 'ar' )
                                                                {{$row->Mogmaa->name_ar}}
                                                            @else
                                                                {{$row->Mogmaa->name_en}}
                                                            @endif
                                                        </td>
                                                    @endif
                                                    <td>
                                                        @if( $row->gender == 'female' )
                                                            {{trans('s_admin.female_only')}}
                                                        @elseif($row->gender == 'male')
                                                            {{trans('s_admin.male_only')}}
                                                        @else
                                                            {{trans('s_admin.children_only')}}
                                                        @endif
                                                    </td>
                                                    <td>{{$row->student_number}}</td>
                                                    <td>{{count($row->Students)}}</td>
                                                    <td>
                                                        @if($row->cost == 'free')
                                                            {{trans('s_admin.free')}}
                                                        @else
                                                            {{$row->cost}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('search.show',$row->id)}}" class="btn btn-dark mr-2" style="width: 90px;">
                                                            {{trans('s_admin.join_now')}}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Separator-->
                            <div class="separator separator-solid my-7"></div>
                            <!--end::Separator-->
                            <!--begin::Bottom-->
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-avatar icon-2x text-muted font-weight-bold"></i>
												</span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">{{trans('admin.gender')}}</span>
                                        <span class="text-dark-50 font-weight-bold">
                                            @if( $row->Teacher->gender == 'male' )
                                                {{trans('admin.male')}}
                                            @else
                                                {{trans('admin.female')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <hr>
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-medal icon-2x text-muted font-weight-bold"></i>
												</span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">{{trans('s_admin.rating')}}</span>
                                        <div class="symbol-group symbol-hover">
                                            <div class="symbol symbol-30" style="border: none;">
                                                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                    fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                            </div>
                                            <div class="symbol symbol-30" style="border: none;">
                                                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                    fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                            </div>
                                            <div class="symbol symbol-30" style="border: none;">
                                                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                    fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                            </div>
                                            <div class="symbol symbol-30" style="border: none;">
                                                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                    fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                            </div>
                                            <div class="symbol symbol-30" style="border: none;">
                                                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                    fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
{{--                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">--}}
{{--												--}}
{{--                                </div>--}}
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-technology-2 icon-2x text-muted font-weight-bold"></i>
												</span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <span class="text-dark-75 font-weight-bolder font-size-sm">{{trans('s_admin.his_episodes_number')}}</span>
                                        <span class="text-dark-50 font-weight-bold">{{count($row->Teacher->Episodes)}} {{trans('s_admin.epo')}} </span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon2-rhombus icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column">
                                        @if($row->level_id)
                                            <span class="text-dark-75 font-weight-bolder font-size-sm">{{trans('s_admin.subject_type')}}</span>
                                            <span class="text-dark-50 font-weight-bold">
                                                    @if(app()->getLocale() == 'ar')
                                                    {{$row->Level->name_ar}}
                                                @else
                                                    {{$row->Level->name_ar}}
                                                @endif
                                                </span>
                                        @else
                                            <span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{trans('s_admin.hight_line')}}</span>
                                            <span class="text-dark-50 font-weight-bold">N/A</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Bottom-->
                        </div>
                    </div>
                    @endforeach
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/nouislider.js') }}"></script>
@endsection
