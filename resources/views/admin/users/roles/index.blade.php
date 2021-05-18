@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_permissions')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="" class="text-muted">{{trans('s_admin.nav_employee_permission_srttings')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="text-muted">{{trans('s_admin.nav_settings_control_panel')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('roles/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_role')}}</a>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                </div>
                <div class="card-body">
                    <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                         <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>{{trans('admin.name')}}</th>
                                <th width="10%">{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{ ($key+1) + ($roles->currentPage() - 1)*$roles->perPage() }}</td>
                                    <td>{{ $role->name}}</td>
                                    <td class="text-lg-center">
                                        <a  class="btn btn-success btn-circle" id="edit" href="{{route( 'roles.edit' , $role->id )}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{$roles->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
