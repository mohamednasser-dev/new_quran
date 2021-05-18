@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.edit')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{url('/users')}}" class="text-muted">{{trans('s_admin.view_users')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">{{trans('admin.user_info')}}</h4>
                  <hr>
                  {!! Form::model($user_data, ['route' => ['users.update',$user_data->id] , 'method'=>'put','files'=> true]) !!}
                  {{ csrf_field() }}
                  <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.name')}}</label>
                        <div class="col-md-10">
                          {{ Form::text('name',$user_data->name,["class"=>"form-control" ,"required"]) }}
                        </div>
                  </div>
                  <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.email')}}</label>
                        <div class="col-md-10">
                          {{ Form::email('email',$user_data->email,["class"=>"form-control" ,"required"]) }}
                        </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-password-input" class="col-md-2 col-form-label">{{trans('admin.password')}}</label>
                        <div class="col-md-10">
                          <input class="form-control" type="password" name="password"  id="example-password-input">
                        </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-password-input2" class="col-md-2 col-form-label">{{trans('admin.password_confirmation')}}</label>
                      <div class="col-md-10">
                          <input class="form-control" type="password" name="password_confirmation"  id="example-password-input2">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-password-input2" class="col-md-2 col-form-label">{{trans('admin.permission')}}</label>
                      <div class="col-md-10">
                        <select name="role_id" required class="form-control custom-select col-12">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @php if($user_data->role_id == $role->id) echo "selected"; @endphp >{{$role->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="center">
                    {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-info','style'=>'margin:10px']) }}
                  </div>
                   {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

