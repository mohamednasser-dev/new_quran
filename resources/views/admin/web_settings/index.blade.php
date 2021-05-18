@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_basic')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_public_settings')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_settings_control_panel')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('styles')
    <link href="{{ asset('metronic/assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header card-header-tabs-line">
            <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" data-remember-tab="tab_id" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"
                       href="#kt_builder_themes">{{trans('s_admin.general')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_builder_page">{{trans('s_admin.social_media')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                       href="#kt_color_themes">{{trans('s_admin.admin_website_color')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                       href="#kt_logo_themes">{{trans('s_admin.admin_website_logo')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                       href="#kt_times_themes">{{trans('s_admin.admin_website_times')}}</a>
                </li>
            </ul>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
    {!! Form::model($data, ['route' => ['web_settings.update',1] , 'method'=>'put' ,'files'=> true]) !!}
    {{ csrf_field() }}
    <!--begin::Body-->
        <div class="card-body">
            <div class="tab-content pt-3">
                <!--begin::Tab Pane-->
                <div class="tab-pane active" id="kt_builder_themes">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.website_title')}}</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group input-group-solid">
                                <input type="text" required name="title_ar" placeholder="بالعربية"
                                       value="{{$data->title_ar}}" class="form-control form-control-solid"
                                       value="website_title">
                            </div>
                        </div>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group input-group-solid">
                                <input type="text" required name="title_en" value="{{$data->title_en}}"
                                       placeholder="English" class="form-control form-control-solid"
                                       value="website_title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.phone')}}</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group input-group-solid">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-phone"></i>
										</span>
                                </div>
                                <input type="text" required name="phone" value="{{$data->phone}}"
                                       class="form-control form-control-solid" value="+45678967456">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.email')}}</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group input-group-solid">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-at"></i>
										</span>
                                </div>
                                <input type="email" required name="email" value="{{$data->email}}"
                                       class="form-control form-control-solid" value="nick.watson@loop.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.address')}}</label>
                        <div class="col-lg-9 col-xl-4">
                            <input type="text" required name="address_ar" value="{{$data->address_ar}}"
                                   placeholder="بالعربية" class="form-control">
                        </div>
                        <div class="col-lg-9 col-xl-4">
                            <input type="text" required name="address_en" value="{{$data->address_en}}"
                                   placeholder="English" class="form-control">
                        </div>
                    </div>
                </div>
                <!--end::Tab Pane-->
                <!--begin::Tab Pane-->
                <div class="tab-pane" id="kt_builder_page">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">facebook :</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-chain"></i>
										</span>
                                </div>
                                <input type="url" required name="facebook" value="{{$data->facebook}}"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">twiter :</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-chain"></i>
										</span>
                                </div>
                                <input type="url" required name="twiter" value="{{$data->twiter}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">youtube :</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-chain"></i>
										</span>
                                </div>
                                <input type="url" required name="youtube" value="{{$data->youtube}}"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">instegram :</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-chain"></i>
										</span>
                                </div>
                                <input type="url" required name="insta" value="{{$data->insta}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">linked in :</label>
                        <div class="col-lg-9 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-chain"></i>
										</span>
                                </div>
                                <input type="url" required name="linked_in" value="{{$data->linked_in}}"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="kt_color_themes">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.head_color')}}</label>
                        <div class="col-lg-9 col-xl-4">
                            <input class="form-control" type="color" name="color" value="{{$data->color}}" id="example-color-input">
                        </div>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.sidebar_color')}}</label>--}}
{{--                        <div class="col-lg-9 col-xl-4">--}}
{{--                            <input class="form-control" type="color" name="color_side_bar" value="{{$data->color}}" id="example-color-input">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="tab-pane" id="kt_logo_themes">
                    <div class="form-group row">
                        <div class="col-lg-6 col-xl-4">
                            <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.arabic')}}</label>
                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                                 style="background-image: url(/uploads/logo/{{$data->logo_ar}})">
                                <div class="image-input-wrapper"></div>
                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="{{trans('s_admin.change_logo')}}">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="logo_ar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="cancel" data-toggle="tooltip" title=""
                                      data-original-title="{{trans('s_admin.cancel_logo')}}">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="remove" data-toggle="tooltip" title=""
                                      data-original-title="Remove avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <label class="col-lg-3 col-form-label text-lg-right">{{trans('s_admin.english')}}</label>
                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar_en"
                                 style="background-image: url(/uploads/logo/{{$data->logo_en}})">
                                <div class="image-input-wrapper"></div>
                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="{{trans('s_admin.change_logo')}}">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="logo_en" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="cancel" data-toggle="tooltip" title=""
                                      data-original-title="{{trans('s_admin.cancel_logo')}}">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="remove" data-toggle="tooltip" title=""
                                      data-original-title="Remove avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="kt_times_themes">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.sat')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="sat_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="sat_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{trans('s_admin.active')}}</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="select">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.sun')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="sun_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="sun_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="sun_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.mon')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="mon_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="mon_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="mon_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.tus')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="tus_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="tus_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="tus_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.wen')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="wen_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="wen_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="wen_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.ther')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="ther_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="ther_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="ther_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 500px;">
                                <label> &nbsp;</label>
                                <div class="input-group timepicker">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.fri')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.from')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="fri_from" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('s_admin.to')}}</label>
                                <div class="input-group timepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                    </div>
                                    <input class="form-control" name="fri_to" id="kt_timepicker_3" readonly="readonly" placeholder="Select time" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group timepicker">
                                    <span class="switch switch-outline switch-icon switch-primary">
                                        <label>
                                            <input type="checkbox" checked="checked" name="fri_status">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    <input type="hidden" id="tab_id" name="builder[tab][tab_id]">
                    <input type="hidden" id="tab_extra_id" name="builder[tab][tab_extra_id]">
                    <button type="submit" name="builder_submit" data-demo="demo1"
                            class="btn btn-primary font-weight-bold mr-2">{{trans('s_admin.save')}}</button>
                    <button type="button" name="builder_reset" data-demo="demo1"
                            class="btn btn-clean font-weight-bold">{{trans('s_admin.cancel')}}</button>
                </div>
            </div>
        </div>
        <!--end::Footer-->
    {{ Form::close() }}
    <!--end::Form-->
    </div>
@endsection
@section('scripts')
@endsection
