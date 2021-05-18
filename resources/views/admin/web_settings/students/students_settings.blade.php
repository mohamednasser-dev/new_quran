@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            @if(request()->segment(2) == 'far_learn')
                {{trans('s_admin.far_learn_students')}}
            @elseif(request()->segment(2) == 'mogmaa')
                {{trans('s_admin.mogmaa_students')}}
            @elseif(request()->segment(2) == 'dorr')
                {{trans('s_admin.dorr_students')}}
            @else
                {{trans('s_admin.nav_student_shoan_settings')}}
            @endif
        </h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_student_shoan_settings')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_settings_control_panel')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <div class="card-title">
                    <a data-toggle="modal" data-target="#add_new_student"
                       class="btn btn-light-primary px-6 font-weight-bold">{{trans('s_admin.add_new_student')}}</a>
                </div>
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
                                    <input type="text" class="form-control" placeholder="Search..."
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
                    <th title="Field #1" style="width: 5%">{{trans('s_admin.image')}}</th>
                    <th title="Field #2" style="width: 10%">{{trans('s_admin.name')}}</th>
                    <th title="Field #3" style="width: 10%">{{trans('s_admin.email')}}</th>
                    <th title="Field #4">{{trans('s_admin.join_orders')}}</th>
                    <th title="Field #5">{{trans('s_admin.activation')}}</th>
{{--                    @if(request()->segment(2) != 'far_learn')--}}
{{--                        <th title="Field #6">{{trans('s_admin.interview')}}</th>--}}
{{--                    @endif--}}
                    <th title="Field #6">{{trans('s_admin.date')}}</th>
                    <th title="Field #7">{{trans('s_admin.details_interview')}}</th>
                    <th title="Field #8">{{trans('s_admin.edit')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($data as $row)
                    <tr>
                        @if($row->image != null)
                            <td class="text-center" style="width: 5%">
                                <span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                            <img class="" src="{{url('/')}}/uploads/students/{{$row->image}}"
                                                 alt="photo">
                                        </div>
                                    </div>
                                </span>
                            </td>
                        @else
                            <td class="text-center" style="width: 5%">
                                <span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40 symbol-light-danger flex-shrink-0">
                                            <span class="symbol-label font-size-h4 font-weight-bold">
                                                @if(app()->getLocale() == 'ar')
                                                    {{$row->first_name_en[0]}}
                                                @else
                                                    {{$row->first_name_en[0]}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </span>
                            </td>
                        @endif
                        <td class="text-center" style="width: 10%">
                            @if(app()->getLocale() == 'ar')
                                {{$row->first_name_ar}} {{$row->mid_name_ar}}
                            @else
                                {{$row->first_name_en}} {{$row->mid_name_en}}
                            @endif
                        </td>
                        <td class="text-center" style="width: 10%">{{$row->email}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                @if($row->is_new == 'y')
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.new')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('student.accept',$row->id)}}">{{trans('s_admin.accept')}}</a>
                                        <a class="dropdown-item" href="{{route('student.reject',$row->id)}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->is_new == 'accepted')
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.accepted')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('student.reject',$row->id)}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->is_new == 'rejected')
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.rejected')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('student.accept',$row->id)}}">{{trans('s_admin.accept')}}</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            @if($row->status == 'active')
                                <a href="{{route('student.change_status',$row->id)}}"
                                   class="btn btn-light-success font-weight-bold mr-2">{{trans('s_admin.actived')}}</a>
                            @else
                                <a href="{{route('student.change_status',$row->id)}}"
                                   class="btn btn-light-danger font-weight-bold mr-2">{{trans('s_admin.unactived')}}</a>
                            @endif
                        </td>
{{--                        @if(request()->segment(2) != 'far_learn')--}}
{{--                            <td class="text-center">--}}
{{--                                @if($row->interview == 'n')--}}
{{--                                    <a data-student-id="{{$row->id}}" id="make_interview" alt="default" data-toggle="modal" data-target="#make_interview_model"  class="btn btn-light-info font-weight-bold mr-2">{{trans('s_admin.make_interview')}}</a>--}}
{{--                                @elseif($row->interview == 'y')--}}
{{--                                    <a href="{{route('edit.student_settings',['type' => request()->segment(2) , 'id' => $row->id])}}" class="btn btn-light-warning font-weight-bold mr-2">{{trans('s_admin.edit_subject')}}</a>--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        @endif--}}
                        <td class="text-center">
                            <div  class="font-weight-bolder text-primary mb-0">{{$row->created_at->format('Y-m-d')}}</div>
                        </td>
                        <td class="text-center">
                            <a href="{{route('student.details',['type' => request()->segment(2) , 'id' => $row->id])}}" class="btn btn-light-warning font-weight-bold mr-2">
                                <i class="icon-md fas fa-eye" aria-hidden='true'></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn btn-light-primary font-weight-bold mr-2">
                                <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
{{--    student create model --}}
    <div class="modal fade" id="add_new_student" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_new_student')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route'  => ['store_new_student'],'method'=>'post'] ) }}
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.first_name')}}</label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="first_name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.mid_name')}}</label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="mid_name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.last_name')}}</label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="last_name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.email')}}</label>
                            <div class="col-lg-8">
                                <input type="email" required class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.password')}}</label>
                            <div class="col-lg-8">
                                <input type="password" required class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-4 col-form-label text-lg-right">{{trans('admin.password_confirmation')}}</label>
                            <div class="col-lg-8">
                                <input type="password" required class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.gender')}}</label>
                            <div class="col-lg-8">
                                <select required name="gender" class="form-control form-control-lg" id="exampleSelectl">
                                    <option value="male">{{trans('admin.male')}}</option>
                                    <option value="female">{{trans('admin.female')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.country')}}</label>
                            <div class="col-lg-8">
                                @php $countries = \App\Models\Country::where('deleted','0')->get(); @endphp
                                <select id="txt_country" required class="form-control custom-select" name="country">
                                    @foreach($countries as $row)
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
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.qualification')}}</label>
                            <div class="col-lg-8">
                                @php $qualifications = \App\Models\Qualification::where('deleted','0')->get(); @endphp
                                <select id="txt_qualification" name="qualification" required class="form-control custom-select">
                                    @foreach($qualifications as $row)
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
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.nationality')}}</label>
                            <div class="col-lg-8">
                                @php $nationalities = \App\Models\Nationality::where('deleted','0')->get(); @endphp
                                <select id="txt_nationality" name="nationality" required class="form-control custom-select">
                                    @foreach($nationalities as $row)
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
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('admin.main_lang')}}</label>
                            <div class="col-lg-8">
                                <select id="txt_lang" class="form-control custom-select" required name="main_lang">
                                    <option value="id">Bahasa Indonesia - Indonesian</option>
                                    <option value="msa">Bahasa Melayu - Malay</option>
                                    <option value="ca">Català - Catalan</option>
                                    <option value="cs">Čeština - Czech</option>
                                    <option value="da">Dansk - Danish</option>
                                    <option value="de">Deutsch - German</option>
                                    <option value="en" selected="selected">English</option>
                                    <option value="en-gb">English UK - British English</option>
                                    <option value="es">Español - Spanish</option>
                                    <option value="eu">Euskara - Basque (beta)</option>
                                    <option value="fil">Filipino</option>
                                    <option value="fr">Français - French</option>
                                    <option value="ga">Gaeilge - Irish (beta)</option>
                                    <option value="gl">Galego - Galician (beta)</option>
                                    <option value="hr">Hrvatski - Croatian</option>
                                    <option value="it">Italiano - Italian</option>
                                    <option value="hu">Magyar - Hungarian</option>
                                    <option value="nl">Nederlands - Dutch</option>
                                    <option value="no">Norsk - Norwegian</option>
                                    <option value="pl">Polski - Polish</option>
                                    <option value="pt">Português - Portuguese</option>
                                    <option value="ro">Română - Romanian</option>
                                    <option value="sk">Slovenčina - Slovak</option>
                                    <option value="fi">Suomi - Finnish</option>
                                    <option value="sv">Svenska - Swedish</option>
                                    <option value="vi">Tiếng Việt - Vietnamese</option>
                                    <option value="tr">Türkçe - Turkish</option>
                                    <option value="el">Ελληνικά - Greek</option>
                                    <option value="bg">Български език - Bulgarian</option>
                                    <option value="ru">Русский - Russian</option>
                                    <option value="sr">Српски - Serbian</option>
                                    <option value="uk">Українська мова - Ukrainian</option>
                                    <option value="he">עִבְרִית - Hebrew</option>
                                    <option value="ur">اردو - Urdu (beta)</option>
                                    <option selected="true" value="ar">العربية - Arabic</option>
                                    <option value="fa">فارسی - Persian</option>
                                    <option value="mr">मराठी - Marathi</option>
                                    <option value="hi">हिन्दी - Hindi</option>
                                    <option value="bn">বাংলা - Bangla</option>
                                    <option value="gu">ગુજરાતી - Gujarati</option>
                                    <option value="ta">தமிழ் - Tamil</option>
                                    <option value="kn">ಕನ್ನಡ - Kannada</option>
                                    <option value="th">ภาษาไทย - Thai</option>
                                    <option value="ko">한국어 - Korean</option>
                                    <option value="ja">日本語 - Japanese</option>
                                    <option value="zh-cn">简体中文 - Simplified Chinese</option>
                                    <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                                </select>
                            </div>
                        </div>
                        @if(request()->segment(2) != 'far_learn')
                            <input required type="hidden" name="epo_type" value="mogmaa_dorr">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.level')}}</label>
                                <div class="col-lg-8">
                                    {{ Form::select('level_id',App\Models\Level::where('type','mogmaa_dorr')->where('deleted','0')->pluck('name_ar','id'),null
                                        ,["class"=>"form-control form-control-lg","placeholder"=>trans('s_admin.choose_level'), "required" ,"id"=>"cmb_levels" ]) }}
                                </div>
                            </div>
                            <div class="form-group row" id="subject_cont" style="display:none;">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.subject')}}</label>
                                <div class="col-lg-8">
                                    {{ Form::select('subject_id',App\Models\Subject::where('deleted','0')->pluck('name_ar','id'),null
                                        ,["class"=>"form-control form-control-lg", "required" ,"id"=>"cmb_subjects" ]) }}
                                </div>
                            </div>
                            <div class="form-group row" id="subject_level_cont" style="display:none;">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.subject_level')}}</label>
                                <div class="col-lg-8">
                                    {{ Form::select('subject_level_id',App\Models\Subject_level::where('deleted','0')->pluck('name_ar','id'),null
                                        ,["class"=>"form-control form-control-lg", "required" ,"id"=>"cmb_subject_levels" ]) }}
                                </div>
                            </div>
                        @else
                            <input required type="hidden" name="epo_type" value="far_learn">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.level')}}</label>
                                <div class="col-lg-8">
                                    {{ Form::select('level_id',App\Models\Level::where('type','far_learn')->where('deleted','0')->pluck('name_ar','id'),null
                                        ,["class"=>"form-control form-control-lg","placeholder"=>trans('s_admin.choose_level'), "required" ,"id"=>"cmb_levels" ]) }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">{{trans('s_admin.cancel')}}</button>
                        <button type="submit"
                                class="btn btn-primary font-weight-bold">{{trans('s_admin.save')}}</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="make_interview_model" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.place_student_to_subject')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route' =>'student.place.subject','method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                    <input type="hidden" required class="form-control" id="txt_student_id" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleSelectl">{{trans('s_admin.level')}}</label>
                            {{ Form::select('level_id',App\Models\Level::where('type','!=','far_learn')->where('deleted','0')->pluck('name_ar','id'),null
                                    ,["class"=>"form-control form-control-lg","placeholder"=>trans('s_admin.choose_level'), "required" ,"id"=>"cmb_levels" ]) }}
                        </div>
                        <div class="form-group row" style="display:none;" id="subject_cont">
                            <label for="exampleSelectl">{{trans('s_admin.subject')}}</label>
                            @php $subjects = App\Models\Subject::where('deleted','0')->get(); @endphp
                            <select required name="subject_id" class="form-control form-control-lg" id="cmb_subjects">
                                <option value="" selected>{{trans('s_admin.choose_subject')}}</option>
                                @foreach($subjects as $row)
                                    @if(app()->getLocale() == 'ar')
                                        <option value="{{$row->id}}">{{$row->name_ar}} &nbsp;&nbsp;&nbsp;{{$row->desc_ar}}</option>
                                    @else
                                        <option value="{{$row->id}}">{{$row->name_en}}&nbsp;&nbsp;&nbsp;{{$row->desc_en}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row" id="subject_level_cont" style="display:none;">
                            <label for="exampleSelectl">{{trans('s_admin.subject_level')}}</label>
                            {{ Form::select('subject_level_id',App\Models\Subject_level::where('deleted','0')->pluck('name_ar','id'),null
                                                            ,["class"=>"form-control form-control-lg", "required" ,"id"=>"cmb_subject_levels" ]) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary font-weight-bold">{{trans('s_admin.save')}}</button>
                    </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/create_episode_ajax.js') }}"></script>
    <script>
        var id;
        $(document).on('click', '#make_interview', function () {
            id = $(this).data('student-id');
            $('#txt_student_id').val(id);
        });
    </script>
    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = {
            "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
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
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('metronic/assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
    <!--end::Page Scripts-->
@endsection
