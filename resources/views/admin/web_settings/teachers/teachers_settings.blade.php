@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_teacher_shoan_settings')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
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
                <a data-toggle="modal" data-target="#add_new_teacher"
                   class="btn btn-light-primary px-6 font-weight-bold">{{trans('s_admin.add_new_teacher')}}</a>
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
                    <th title="Field #2">{{trans('s_admin.image')}}</th>
                    <th title="Field #2" style="width: 10%">{{trans('s_admin.name')}}</th>
                    <th title="Field #2" style="width: 10%">{{trans('s_admin.email')}}</th>
                    <th title="Field #6">{{trans('s_admin.phone')}}</th>
                    <th title="Field #6">{{trans('s_admin.join_orders')}}</th>
                    <th title="Field #6">{{trans('s_admin.activation')}}</th>
                    <th title="Field #6">{{trans('s_admin.date')}}</th>
                    <th title="Field #7">{{trans('s_admin.edit')}}</th>
                    <th title="Field #7">{{trans('admin.teacher_members')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($data as $row)
                    <tr>
                        @if($row->image != null)
                            <td class="text-center">
                                <span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                            <img class="" src="{{$row->image}}" alt="photo">
                                        </div>
                                    </div>
                                </span>
                            </td>
                        @else
                            <td class="text-center">
                                <span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40 symbol-light-danger flex-shrink-0">
                                            <span
                                                class="symbol-label font-size-h4 font-weight-bold">{{$row->first_name_en[0]}}</span>
                                        </div>
                                    </div>
                                </span>
                            </td>
                        @endif
                        <td class="text-center">
                            @if(app()->getLocale() == 'ar')
                                {{$row->first_name_ar}} {{$row->mid_name_ar}}
                            @else
                                {{$row->first_name_en}} {{$row->mid_name_en}}
                            @endif
                        </td>
                        <td class="text-center">{{$row->email}}</td>
                        <td class="text-center">{{$row->phone}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                @if($row->is_new == 'y')
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.new')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{route('teacher.accept',$row->id)}}">{{trans('s_admin.accept')}}</a>
                                        <a class="dropdown-item"
                                           href="{{route('teacher.reject',$row->id)}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->is_new == 'accepted')
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.accepted')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{route('teacher.reject',$row->id)}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->is_new == 'rejected')
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.rejected')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{route('teacher.accept',$row->id)}}">{{trans('s_admin.accept')}}</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            @if($row->status == 'active')
                                <a href="{{route('teacher.change_status',$row->id)}}"
                                   class="btn btn-light-success font-weight-bold mr-2">{{trans('s_admin.actived')}}</a>
                            @else
                                <a href="{{route('teacher.change_status',$row->id)}}"
                                   class="btn btn-light-danger font-weight-bold mr-2">{{trans('s_admin.unactived')}}</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <div
                                class="font-weight-bolder text-primary mb-0">{{$row->created_at->format('Y-m-d')}}</div>
                        </td>
                        <td class="text-center" nowrap="nowrap">
                            <a href="{{route('teacher_settings.edit',$row->id)}}" class="btn btn-light-primary font-weight-bold mr-2">
                                <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                            </a>
                        </td>
                        <td class="text-center" nowrap="nowrap">
                            @if($row->member == 0)
                                <a href="{{route('teacher_settings.make_member',$row->id)}}" class="btn btn-light-dark font-weight-bold mr-2">
                                    <i class="icon-md far fa-user" aria-hidden='true'></i>
                                </a>
                            @else
                                <a href="{{route('teacher_settings.make_member',$row->id)}}" class="btn btn-light-warning font-weight-bold mr-2">
                                    <i class="icon-md fas fa-user" aria-hidden='true'></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    {{--    teacher create new --}}
    <div class="modal fade" id="add_new_teacher" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_new_teacher')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route'  => ['store_new_teacher'],'method'=>'post'] ) }}
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
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.epo_type')}}</label>
                            <div class="col-lg-8">
                                <select required name="epo_type" class="form-control form-control-lg"
                                        id="exampleSelectl">
                                    <option value="far_learn">{{trans('s_admin.far_learn')}}</option>
                                    <option value="mogmaa_dorr">{{trans('s_admin.mogmaa_dorr')}}</option>
                                </select>
                            </div>
                        </div>
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
@endsection
@section('scripts')
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
