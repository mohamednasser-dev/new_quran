@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_contact_us')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_out_website_settings')}}</a>
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
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
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
                    <th title="Field #1">{{trans('admin.name')}}</th>
                    <th title="Field #2">{{trans('admin.email')}}</th>
                    <th title="Field #3">{{trans('admin.phone')}}</th>
                    <th title="Field #3">{{trans('admin.message')}}</th>
                    <th title="Field #4">{{trans('s_admin.date')}}</th>
                    <th title="Field #4">{{trans('s_admin.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $blog)
                    <tr>
                        <td>{{$blog->name}}</td>
                        <td>{{$blog->email}}</td>
                        <td>{{$blog->phone}}</td>
                        <td>{{$blog->message}}</td>
                        <td>{{$blog->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a class="btn btn-light-danger font-weight-bold mr-2"
                               href="{{route('delete.contact_us',$blog->id)}}">
                                <i class="icon-md fas fa-trash" aria-hidden='true'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->-
@endsection
