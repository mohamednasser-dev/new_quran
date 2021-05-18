@extends('front.layouts.temp')
@section('styles')
    <style>
        .ifr {
            overflow: scroll;
            overflow-x: hidden;
        }

        .ifr::-webkit-scrollbar {
            display: none;
        }

        .new_style h2 {
            color: #61300e;
            padding: 15px;
            text-align: center;
            border-bottom: 3px solid #61300e;
            background: #f5ffbf;
        }

        .new_style .payment-method {
            padding: 1.125rem;
        }

        .new_style .payment-method ul {
            padding: 0px;
        }

        .new_style [type="radio"]:not(:checked) + label::before, [type="radio"]:checked + label::before {
            border: 2px solid #61300e;
        }

        .new_style [type="radio"]:not(:checked) + label:after, [type="radio"]:checked + label:after {
            top: 5px;
            right: -5px;
            font-size: 1.525rem;
        }

        .new_style .thm-btn {
            padding: .5375rem 2.75rem;
            margin: 15px;
        }

        .author-box-wrap.new_auther {
            margin-top: 0px;
        }

        .new_auther .heed {
            color: #61300e;
            padding: 12px;
            text-align: center;
            border-bottom: 3px solid #61300e;
            background: #bdd543;
        }

        .new_auther .thm-clr {
            color: #04a511;
        }

        .new_auther .thm-btn {
            padding: .5375rem;
            font-size: 14px;
            width: 90px;
            border-radius: 10px;
            background: #04a511;
        }

        .new_auther .author-box {
            padding: 1rem;
        }

        .new_auther .author-img + .author-info {
            padding: 0px 1.125rem;
        }

        .new_auther table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        .new_auther th, td {
            padding: 8px;
            font-size: 12px;
        }

        .new_auther .fst {
            background: #bdd543;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        .new_auther .sermons-btns2 a {
            color: #04a511;
        }

        .new_auther .sermons-btns2 a span {
            color: #252525;
        }

        .new_auther .rate i {
            border: none;
            width: 12px;
            margin: inherit;
            font-size: 10px;
            color: #ffbd01;
        }

        .new_auther .sermons-btns2:hover a i {
            color: #04a511;
            background: none;
        }

    </style>
@endsection
@section('content')
    <section>
        <div class="w-100">
            @include('admin.layouts.errors')
            @include('admin.layouts.messages')
        </div>
    </section>

    <section>
        {{-- <iframe class="ifr" src="{{url('/')}}/show_mix/{{$type}}" style="height: 100vh;"></iframe> --}}
    </section>

    <section>
        <div class="w-100 pt-120 pb-260 position-relative">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <aside class="sidebar w-100">
                                <div class="widget2 w-100">
                                    {{ Form::open( ['route'  => ['times.search.episodes'],'method' =>'post','class' => 'checkout-form w-100 new_style' ] ) }}
                                    {{ csrf_field() }}
                                    <h2>{{trans('s_admin.search_methods')}}</h2>
                                    <div class="row mrg10">
                                        <button type="submit" class="thm-btn thm-bg"
                                                title="">{{trans('s_admin.search')}}
                                            <span></span><span></span><span></span><span></span></button>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <h5 class="mb-0">{{trans('s_admin.teacher_name')}}</h5>
                                            <input type="text" name="teacher_name" placeholder="{{trans('s_admin.teacher_name')}}">
                                        </div>
                                        @if($type == 'all')
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="payment-method">
                                                    <h4 class="mb-0">{{trans('s_admin.epo_type')}}</h4>
                                                    <ul class="method-list mb-0 list-unstyled w-100">
                                                        <li><input type="radio" value="mqraa" name="epo_type"
                                                                   id="radio1"> <label
                                                                for="radio1">{{trans('s_admin.episode_mqraa')}}</label>
                                                        </li>
                                                        <li><input type="radio" value="mogmaa" name="epo_type"
                                                                   id="radio2"> <label
                                                                for="radio2">{{trans('s_admin.mogmaa_epos')}}</label>
                                                        </li>
                                                        <li><input type="radio" value="dorr" name="epo_type"
                                                                   id="radio3"> <label
                                                                for="radio3">{{trans('s_admin.dorr_epos')}}</label></li>
                                                        <li><input type="radio" checked="checked" name="epo_type"
                                                                   id="radio4"> <label
                                                                for="radio4">{{trans('s_admin.all')}}</label></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="payment-method">
                                                <h4 class="mb-0">{{trans('s_admin.level')}}</h4>
                                                <ul class="method-list mb-0 list-unstyled w-100">
                                                    @php $levels = \App\Models\Level::where('type','far_learn')->where('deleted','0')->get(); @endphp
                                                    @foreach($levels as $row)
                                                        <li>
                                                            <input type="radio" value="{{$row->id}}" name="level_id"
                                                                   id="level{{$row->id}}"> <label
                                                                for="level{{$row->id}}">
                                                                @if(app()->getLocale() == 'ar')
                                                                    {{$row->name_ar}}
                                                                @else
                                                                    {{$row->name_en}}
                                                                @endif
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    <li><input type="radio" checked="checked" name="level_id"
                                                               id="radio5"> <label
                                                            for="radio5">{{trans('s_admin.all')}}</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="payment-method">
                                                <h4 class="mb-0">{{trans('s_admin.gender')}}</h4>
                                                <ul class="method-list mb-0 list-unstyled w-100">
                                                    <li><input type="radio" value="male" name="gender" id="radio6">
                                                        <label for="radio6">{{trans('s_admin.male_only')}}</label></li>
                                                    <li><input type="radio" value="female" name="gender" id="radio7">
                                                        <label for="radio7">{{trans('s_admin.female_only')}}</label>
                                                    </li>
                                                    <li><input type="radio" value="children" name="gender" id="radio8">
                                                        <label for="radio8">{{trans('s_admin.children_only')}}</label>
                                                    </li>
                                                    <li><input type="radio" checked="checked" name="gender" id="radio9">
                                                        <label for="radio9">{{trans('s_admin.all')}}</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="payment-method">
                                                <h4 class="mb-0">{{trans('s_admin.teacher_talk')}}</h4>
                                                <ul class="method-list mb-0 list-unstyled w-100">
                                                    <li><input type="radio" value="ar" checked name="language"
                                                               id="radio10"> <label
                                                            for="radio10">{{trans('s_admin.arabic')}}</label></li>
                                                    <li><input type="radio" value="en" name="language" id="radio16">
                                                        <label for="radio16">{{trans('s_admin.english')}}</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="payment-method">
                                                <h4 class="mb-0">{{trans('s_admin.tall_line')}}</h4>
                                                <ul class="method-list mb-0 list-unstyled w-100">
                                                    <li><input type="radio" value="ar" checked name="place"
                                                               id="radio11"> <label
                                                            for="radio11">{{trans('s_admin.not_want_place')}}</label>
                                                    </li>
                                                    <li><input type="radio" value="en" name="place" id="radio15"> <label
                                                            for="radio15">{{trans('s_admin.want_to_determind')}}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="payment-method">
                                                <h4 class="mb-0">{{trans('s_admin.study_cost')}}</h4>
                                                <ul class="method-list mb-0 list-unstyled w-100">
                                                    <li><input type="radio" value="free" name="cost" checked
                                                               id="radio12"> <label
                                                            for="radio12">{{trans('s_admin.free_epo')}}</label></li>
                                                    <li><input type="radio" value="cost" name="cost" id="radio13">
                                                        <label for="radio13">{{trans('s_admin.epo_with_cost')}}</label>
                                                    </li>
                                                    <li><input type="radio" name="cost" id="radio14"> <label
                                                            for="radio14">{{trans('s_admin.all')}}</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="thm-btn thm-bg"
                                                title="">{{trans('s_admin.search')}}
                                            <span></span><span></span><span></span><span></span></button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </aside><!-- Sidebar -->
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-9">
                            <div class="post-detail-inner w-100">

                                <div class="author-box-wrap w-100 new_auther">
                                    <h3 class="mb-0 heed">{{trans('s_admin.search_result')}}</h3>
                                    @foreach($data as $row)
                                        <div
                                            class="author-box d-flex flex-wrap pat-bg gray-layer opc8 position-relative back-blend-multiply gray-bg w-100"
                                            style="background-image: url({{asset('quran/assets/images/pattern-bg.jpg')}});">
                                            <div class="author-img">
                                                <a href="{{route('front.teacher_details',$row->teacher_id)}}">
                                                    @if($row->Teacher->image == null)
                                                        <img class="img-fluid w-100"
                                                             src="{{ asset('uploads/teachers/default_avatar.jpg') }}"
                                                             alt="Author Image">
                                                    @else
                                                        <img class="img-fluid w-100" src="{{url($row->Teacher->image)}}"
                                                             alt="Author Image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="author-info">
                                                <a href="{{route('front.teacher_details',$row->teacher_id)}}">
                                                    <h5 class="mb-2">
                                                        @if($row->Teacher->gender == 'male')
                                                            {{trans('s_admin.teacher_name')}}/
                                                        @else
                                                            {{trans('s_admin.teacher_name_her')}}/
                                                        @endif
                                                        @if( app()->getLocale() == 'ar' )
                                                            {{$row->Teacher->first_name_ar}}  {{$row->Teacher->mid_name_ar}}
                                                        @else
                                                            {{$row->Teacher->first_name_en}} {{$row->Teacher->mid_name_en}}
                                                        @endif
                                                    </h5> <small class="thm-clr">
                                                        @if( app()->getLocale() == 'ar' )
                                                            {{ str_limit($row->Teacher->bio_ar, $limit = 70) }}
                                                        @else
                                                            {{ str_limit($row->Teacher->bio_en, $limit = 70) }}
                                                        @endif
                                                    </small>
                                                </a>
                                                <br><br>
                                                <div style="overflow-x:auto;">
                                                    <table>
                                                        <tr class="fst">
                                                            <th>{{trans('s_admin.episode_name')}}</th>
                                                            @if($row->type == 'mogmaa')
                                                                <th>{{trans('s_admin.mogmaa_name')}}</th>
                                                            @elseif($row->type == 'dorr')
                                                                <th>{{trans('s_admin.dorrs_name')}}</th>
                                                            @endif
                                                            <th>{{trans('s_admin.gender')}}</th>
                                                            <th>{{trans('s_admin.want_num')}}</th>
                                                            <th>{{trans('s_admin.student_number')}}</th>
                                                            <th>{{trans('s_admin.monthly_cost')}}</th>
                                                            <th>{{trans('s_admin.details')}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                @if( app()->getLocale() == 'ar' )
                                                                    {{$row->name_ar}}
                                                                @else
                                                                    {{$row->name_en}}
                                                                @endif
                                                            </th>
                                                            @if($row->type == 'mogmaa' || $row->type == 'dorr')
                                                                @if($row->college_id != null)
                                                                    <td>
                                                                        @if( app()->getLocale() == 'ar' )
                                                                            {{$row->Mogmaa->name_ar}}
                                                                        @else
                                                                            {{$row->Mogmaa->name_en}}
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                            @endif
                                                            <td>
                                                                @if( $row->gender == 'female' )
                                                                    {{trans('s_admin.female_only')}}
                                                                @elseif($row->gender == 'male')
                                                                    {{trans('s_admin.male_only')}}
                                                                @else
                                                                    {{trans('admin.children_only')}}
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
                                                            <td><a data-toggle="modal" data-target="#check_login_modal"
                                                                   class="thm-btn thm-bg" href="javascript:void(0);"
                                                                   title="">{{trans('s_admin.join_now')}}
                                                                    <span></span><span></span><span></span><span></span></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <hr>
                                                <div style="overflow: hidden; overflow-x:auto;">
                                                    <div class="sermons-btns2 d-inline-flex">
                                                        <a href="" title="">{{trans('admin.gender')}} <br>
                                                            <span>
                                                                @if( $row->Teacher->gender == 'male' )
                                                                    {{trans('admin.male')}}
                                                                @else
                                                                    {{trans('admin.female')}}
                                                                @endif
                                                            </span>
                                                        </a>
                                                        <a style="width:90px;">{{trans('s_admin.rating')}}
                                                            <br>
                                                            <span>
                                                                <span class="rate thm-clr">
                                                                    <i class=" @if( $row->Teacher->rate == 5 || $row->Teacher->rate == 4 || $row->Teacher->rate == 3 || $row->Teacher->rate == 2 || $row->Teacher->rate == 1 ) fas @else far @endif fa-star"></i>
                                                                    <i class=" @if( $row->Teacher->rate == 5 || $row->Teacher->rate == 4 || $row->Teacher->rate == 3 || $row->Teacher->rate == 2) fas @else far @endif fa-star"></i>
                                                                    <i class=" @if( $row->Teacher->rate == 5 || $row->Teacher->rate == 4 || $row->Teacher->rate == 3) fas @else far @endif fa-star"></i>
                                                                    <i class=" @if( $row->Teacher->rate == 5 || $row->Teacher->rate == 4) fas @else far @endif fa-star"></i>
                                                                    <i class=" @if( $row->Teacher->rate == 5) fas @else far @endif fa-star"></i>
                                                                </span>
                                                            </span>
                                                        </a>
                                                        <a href="" title="">{{trans('s_admin.his_episodes_number')}}
                                                            <br>
                                                            <span>{{ count($row->Teacher->Episodes) + count($row->Teacher->Episode) }}  {{trans('s_admin.epo')}}</span></a>
                                                        @if($row->level_id)
                                                            <a href="" title="">{{trans('s_admin.subject_type')}}<br>
                                                                <span>
                                                                    @if(app()->getLocale() == 'ar')
                                                                        {{$row->Level->name_ar}}
                                                                    @else
                                                                        {{$row->Level->name_ar}}
                                                                    @endif
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="" title="">{{trans('s_admin.hight_line')}}<br>
                                                                <span>
                                                                    N/A
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><!-- Author Box Wrap -->

                                <div
                                    class="pagination-wrap mt-30 d-flex flex-wrap justify-content-center text-center w-100">
                                    {{$data->links()}}
                                </div><!-- Pagination Wrap -->
                            </div>
                        </div>

                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>
    {{--    begin models--}}
    <div id="check_login_modal" class="modal model_style fade" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="text-align: center; background-color: darkgoldenrod;">
                <div class="modal-header">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('s_admin.Login_Register')}}</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a data-toggle="modal" data-target="#login-modal" data-dismiss="modal"
                               class="thm-btn thm-bg"
                               style="background-color: yellowgreen;width: 100%;padding: 1rem;">
                                {{trans('admin.login')}}
                                <span></span><span></span><span></span><span></span> </a>
                        </div>
                        <div class="vertical d-none d-sm-block d-md-block" style="height: 65px;"></div>
                        <div class="col-md-6">
                            <a data-toggle="modal" data-target="#sign-modal" data-dismiss="modal" class="thm-btn thm-bg"
                               style="background-color: blueviolet;width: 100%;padding: 1rem;" href="" title="">
                                {{trans('admin.sign_up')}}
                                <span></span><span></span><span></span><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


