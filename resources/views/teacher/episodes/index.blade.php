@extends('teacher.teacher_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_table_hlka')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    </div>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{trans('s_admin.searcht')}}"
                                           id="kt_datatable_search_query"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                <thead>
                <tr>
                    <th title="Field #1">{{trans('s_admin.episode_name')}}</th>
                    <th title="Field #2">{{trans('s_admin.type')}}</th>
                    <th title="Field #5">{{trans('s_admin.want_num')}}</th>
                    <th title="Field #6">{{trans('s_admin.student_number')}}</th>
                    <th title="Field #7">{{trans('s_admin.gender')}}</th>
                    <th title="Field #9" style="text-align: center">{{trans('s_admin.epo_view')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>

                        <td>{{$row->name_ar}}</td>
                        <td>
                            @if($row->type == 'mqraa')
                                {{trans('s_admin.mqraa')}}
                            @elseif($row->type == 'mogmaa')
                                {{trans('s_admin.mogmaa')}}
                            @elseif($row->type == 'dorr')
                                {{trans('s_admin.dorr')}}
                            @endif
                        </td>
                        <td style="text-align: center;">{{$row->student_number}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('teacher.epo.students',$row->id)}}">
                                <code style="font-size: larger;">{{count($row->Students)}}</code>
                            </a>
                        </td>
                        <td>
                            @if($row->gender == 'male')
                                {{trans('admin.male')}}
                            @elseif($row->gender == 'female')
                                {{trans('admin.female')}}
                            @endif
                        </td>
                        <td style="text-align: center">
                            @php
                                $mytime = \Carbon\Carbon::now();
                                $today = \Carbon\Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
                                $exist_epo = \App\Models\Episode::where('id',$row->id)->where('start_date','<',$today)->first();
                                $course_data = \App\Models\Episode_course_days::where('episode_id', $row->id)->where('date', $today)->first();
                            @endphp
                            @if($course_data != null)
                                    @php  $section_today = \App\Models\Episode_section::where('episode_id',$row->id)->where('epo_date',$today)->first();@endphp
                                    @if($section_today != null)
                                        @if($section_today->status == 'started')
                                            <a href="{{route('t_episodes.show',$row->id)}}" class="btn btn-success btn-circle">
                                                {{trans('s_admin.started')}}
                                            </a>
                                        @elseif($section_today->status == 'ended')
                                            <a id="end_btn" data-section="{{$section_today->id}}" data-toggle="modal" data-target="#restart_modal" class="btn btn-danger btn-circle">{{trans('s_admin.ended')}}</a>
                                        @endif
                                    @else
                                        <a href="{{route('t_episodes.show',$row->id)}}" class="btn btn-primary btn-circle">
                                            {{trans('s_admin.show')}}
                                        </a>
                                    @endif
                            @else
                                {{trans('s_admin.not_section_today')}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @if($additional_episodes != null)
                @foreach($additional_episodes as $row)
                    <tr>

                        <td>{{$row->Episode->name_ar}}</td>
                        <td>
                            @if($row->Episode->type == 'mqraa')
                                {{trans('s_admin.mqraa')}}
                            @elseif($row->Episode->type == 'mogmaa')
                                {{trans('s_admin.mogmaa')}}
                            @elseif($row->Episode->type == 'dorr')
                                {{trans('s_admin.dorr')}}
                            @endif
                        </td>
                        <td style="text-align: center;">{{$row->Episode->student_number}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('teacher.epo.students',$row->Episode->id)}}">
                                <code style="font-size: larger;">{{count($row->Episode->Students)}}</code>
                            </a>
                        </td>
                        <td>
                            @if($row->Episode->gender == 'male')
                                {{trans('admin.male')}}
                            @elseif($row->Episode->gender == 'female')
                                {{trans('admin.female')}}
                            @endif
                        </td>
                        <td style="text-align: center">
                            @php
                                $mytime = \Carbon\Carbon::now();
                                $today = \Carbon\Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
                                $exist_epo = \App\Models\Episode::where('id',$row->Episode->id)->where('start_date','<',$today)->first();
                                $course_data = \App\Models\Episode_course_days::where('episode_id', $row->Episode->id)->where('date', $today)->first();
                            @endphp
                            @if($course_data != null)
                                @php  $section_today = \App\Models\Episode_section::where('episode_id',$row->Episode->id)->where('epo_date',$today)->first();@endphp
                                @if($section_today != null)
                                    @if($section_today->status == 'started')
                                        <a href="{{route('t_episodes.show',$row->Episode->id)}}" class="btn btn-success btn-circle">
                                            {{trans('s_admin.started')}}
                                        </a>
                                    @elseif($section_today->status == 'ended')
                                        <a id="end_btn" data-section="{{$section_today->id}}" data-toggle="modal" data-target="#restart_modal" class="btn btn-danger btn-circle">{{trans('s_admin.ended')}}</a>
                                    @endif
                                @else
                                    <a href="{{route('t_episodes.show',$row->Episode->id)}}" class="btn btn-primary btn-circle">
                                        {{trans('s_admin.show')}}
                                    </a>
                                @endif
                            @else
                                {{trans('s_admin.not_section_today')}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

{{--    restart epo model--}}
    <div class="modal fade" id="restart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.restart_epo')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">{{trans('s_admin.restart_epo_ask')}}</div>
                <div class="modal-footer">
                    <form action="{{route('t_episode.epo.restart')}}" method="post">
                        @csrf
                        <input type="hidden" name="section_id" id="txt_section_id">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{trans('s_admin.cancel')}}</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">{{trans('s_admin.ok')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var section ;
            $(document).on('click', '#end_btn', function() {
                section = $(this).data('section');
                $("#txt_section_id").val(section);
            });
        });
    </script>
@endsection
