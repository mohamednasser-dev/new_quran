@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.colleges')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    </div>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title">3 Columns Horizontal Form Layout</h3>
        </div>
        <!--begin::Form-->
        <form class="form">
            <div class="card-body">
                <div class="form-group row mt-3">
                    <label class="col-lg-1 col-form-label text-lg-right">{{trans('s_admin.colleges')}}</label>
                    <div class="col-lg-3">
                        <input type="email" class="form-control" placeholder="Full name">
                        <span class="form-text text-muted">Please enter your full name</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-lg-right">Email:</label>
                    <div class="col-lg-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="form-text text-muted">Please enter your email</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-lg-right">Username:</label>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-user"></i>
																	</span>
                            </div>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <span class="form-text text-muted">Please enter your username</span>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <div class="form-group row">
                    <label class="col-lg-1 col-form-label text-lg-right">Contact:</label>
                    <div class="col-lg-3">
                        <input type="email" class="form-control" placeholder="Enter contact number">
                        <span class="form-text text-muted">Please enter your contact</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-lg-right">Fax:</label>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Fax number">
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-info-circle"></i>
																	</span>
                            </div>
                        </div>
                        <span class="form-text text-muted">Please enter fax</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-lg-right">Address:</label>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your address">
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-map-marker"></i>
																	</span>
                            </div>
                        </div>
                        <span class="form-text text-muted">Please enter your address</span>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <div class="form-group row">
                    <label class="col-lg-1 col-form-label text-lg-right">Postcode:</label>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your postcode">
                            <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-bookmark-o"></i>
																	</span>
                            </div>
                        </div>
                        <span class="form-text text-muted">Please enter your postcode</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-lg-right">User Group:</label>
                    <div class="col-lg-3">
                        <div class="radio-inline">
                            <label class="radio radio-solid">
                                <input type="radio" name="example_2" checked="checked" value="2">
                                <span></span>Sales Person</label>
                            <label class="radio radio-solid">
                                <input type="radio" name="example_2" value="2">
                                <span></span>Customer</label>
                        </div>
                        <span class="form-text text-muted">Please select user group</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <div class="card card-custom">
        <div class="card-body">
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
            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                <thead>
                <tr>
                    <th title="Field #1">{{trans('s_admin.name_ar')}}</th>
                    <th title="Field #1">{{trans('s_admin.name_en')}}</th>
                    <th title="Field #1">{{trans('s_admin.creation_date')}}</th>
                    <th title="Field #7">{{trans('s_admin.episodes')}}</th>
                    <th title="Field #7">{{trans('s_admin.chooses')}}</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($data as $row)--}}
{{--                    <tr>--}}
{{--                        <td>{{$row->name_ar}}</td>--}}
{{--                        <td>{{$row->name_en}}</td>--}}
{{--                        <td>{{$row->created_at->format('Y-m-d')}}</td>--}}
{{--                        <td>--}}
{{--                            <a href="{{route('dorr.episodes',$row->id)}}" class="btn btn-dark mr-2">{{trans('s_admin.episodes')}}</a>--}}
{{--                        </td>--}}
{{--                        <td class="text-right">--}}
{{--                            <a href="{{route('dorr.show',$row->id)}}" class="btn btn-danger btn-circle">--}}
{{--                                <i class="fa fa-trash" aria-hidden='true'></i>--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_new_college')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route' => ['colleges.store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <input type="hidden" required value="college"  name="type">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.name_ar')}}</label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control"  name="name_ar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.name_en')}}</label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control"  name="name_en">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{trans('s_admin.cancel')}}</button>
                            <button type="submit" class="btn btn-primary font-weight-bold">{{trans('s_admin.add')}}</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
