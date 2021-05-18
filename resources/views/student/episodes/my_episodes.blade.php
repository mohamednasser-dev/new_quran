@extends('student.student_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.my_episodes')}}</h5>
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
                    <th title="Field #1">{{trans('s_admin.name_ar')}}</th>
                    <th title="Field #1">{{trans('s_admin.type')}}</th>
                    <th title="Field #7">{{trans('s_admin.started_at')}}</th>
{{--                    <th title="Field #7">{{trans('s_admin.ended_in')}}</th>--}}
                    <th title="Field #6">{{trans('s_admin.epo_degrees')}}</th>
                    <th title="Field #7" style="text-align: center">{{trans('s_admin.epo_view')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
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
                        <td>{{date('g:i a', strtotime($row->Episode->time_from))}}</td>
{{--                        <td>{{date('g:i a', strtotime($row->Episode->time_to))}}</td>--}}
                        <td>
                            <a href="{{route('student.my_episode.degree',$row->episode_id)}}" class="btn btn-info btn-circle">
                                {{trans('s_admin.my_degrees')}}
                            </a>
                        </td>
{{--                        <td style="text-align: center">--}}
{{--                            @php--}}
{{--                                $mytime = \Carbon\Carbon::now();--}}
{{--                                $today = \Carbon\Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');--}}
{{--                                $epo_section = \App\Models\Plan_episode_day::where('episode_id',$row->episode_id)->where('section_date',$today)->get();--}}
{{--                            @endphp--}}
{{--                            @if(count($epo_section) > 0)--}}
{{--                                @php $section_today = \App\Models\Episode_section::where('episode_id',$row->episode_id)->where('epo_date',$today)->first(); @endphp--}}
{{--                                @if($section_today != null)--}}
{{--                                    @if($section_today->status == 'started')--}}
{{--                                        <a href="{{route('student_episodes.show',$row->episode_id)}}" class="btn btn-success btn-circle">--}}
{{--                                            {{trans('s_admin.started')}}--}}
{{--                                        </a>--}}
{{--                                    @elseif($section_today->status == 'ended')--}}
{{--                                        <a  class="btn btn-danger btn-circle">{{trans('s_admin.ended')}}</a>--}}
{{--                                    @endif--}}
{{--                                @else--}}
{{--                                    <a class="btn btn-warning btn-circle">--}}
{{--                                        {{trans('s_admin.wait')}}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                {{trans('s_admin.not_section_today')}}--}}
{{--                            @endif--}}
{{--                        </td>--}}

                        <td style="text-align: center">
                            @php
                                $mytime = \Carbon\Carbon::now();
                                $today = \Carbon\Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
                                $exist_epo = \App\Models\Episode::where('id',$row->episode_id)->where('start_date','<',$today)->first();
                                $course_data = \App\Models\Episode_course_days::where('episode_id', $row->episode_id)->where('date', $today)->first();

                            @endphp
                            @if($course_data != null)
                                @php  $section_today = \App\Models\Episode_section::where('episode_id',$row->episode_id)->where('epo_date',$today)->first();@endphp
                                @if($section_today != null)
                                    @if($section_today->status == 'started')
                                        @if($row->Episode->type == 'mqraa' && \App\Models\Student_Questions_episode::where('episode_id', $row->episode_id)->where('student_id', Auth::guard('student')->id())->where('episode_course_id',$course_data->id)->first() == null)

                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-episode-id="{{$row->episode_id}}" data-course-date="{{$course_data->id}}">
                                                {{trans('s_admin.started')}}
                                            </button>
                                        @else
                                            <a href="{{route('student_episodes.show',$row->episode_id)}}" class="btn btn-success btn-circle">
                                                {{trans('s_admin.started')}}
                                            </a>
                                            @endif

                                    @elseif($section_today->status == 'ended')
                                        <a  class="btn btn-danger btn-circle">{{trans('s_admin.ended')}}</a>
                                    @endif
                                @else
                                    <a class="btn btn-warning btn-circle">
                                        {{trans('s_admin.wait')}}
                                    </a>
                                @endif
                            @else
                                {{trans('s_admin.not_section_today')}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.what_y_want')}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/student/Store_Student_Question_episode" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="episode_id" id="episode_id">
                        <input type="hidden" class="form-control" name="course_date_id" id="course_date_id">
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-body">
                                <h4>{{trans('s_admin.level')}}</h4>
                                <div class="form-group">
                                    <label for="exampleSelect1">
                                        @if(app()->getLocale() == 'ar')
                                            {{auth::guard('student')->user()->Level->name_ar}}
                                        @else
                                            {{auth::guard('student')->user()->Level->name_en}}
                                        @endif

                                    </label>
                                </div>
                                <h4>{{trans('s_admin.surah')}}</h4>
                                <div class="form-group">
                                    <label for="exampleSelect1">{{trans('s_admin.from')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="from_surah_id" required class="form-control " id="kt_select2_4">
                                        <option selected>{{trans('s_admin.choose_surah')}}</option>
                                        @inject('surah','App\Models\Plan\Plan_surah')
                                        @foreach($surah->all() as $row)
                                            <option value="{{$row->id}}">
                                                @if(app()->getLocale() == 'ar')
                                                    {{$row->name_ar}}
                                                @else
                                                    {{$row->name_en}}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-1" id="new_from_num_cont" style="display: none;">
                                    <label for="exampleTextarea">{{trans('s_admin.aya_number')}}
                                        <span class="text-danger">*</span></label>
                                    <select required name="from_num" class="form-control form-control-lg" id="cmb_new_from_num">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">{{trans('s_admin.to')}}
                                        <span class="text-danger">*</span></label>
                                    <select name="to_surah_id" required class="form-control " id="kt_select2_5">
                                        <option selected>{{trans('s_admin.choose_surah')}}</option>
                                        @foreach($surah->all() as $row)
                                            <option value="{{$row->id}}">
                                                @if(app()->getLocale() == 'ar')
                                                    {{$row->name_ar}}
                                                @else
                                                    {{$row->name_en}}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-1" id="new_to_num_cont" style="display: none;">
                                    <label for="exampleTextarea">{{trans('s_admin.aya_number')}}
                                        <span class="text-danger">*</span></label>
                                    <select required name="to_num" class="form-control form-control-lg" id="cmb_new_to_num">
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">{{trans('s_admin.add')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/create_subject_plan.js') }}"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('episode-id') // Extract info from data-* attributes
            var course_date = button.data('course-date') // Extract info from data-* attributes
            var modal = $(this)

            modal.find('.modal-body #episode_id').val(recipient)
            modal.find('.modal-body #course_date_id').val(course_date)
        })

    </script>


@endsection
