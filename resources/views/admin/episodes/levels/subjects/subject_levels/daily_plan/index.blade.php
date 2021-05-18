@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.daily_plan')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.subject_levels')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_method')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_levels')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{trans('s_admin.the_new')}}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a style="font-size: 25px;" href="{{route('subject_levels_daily_plan.create_new',$sub_level_id)}}" class="btn btn-light-primary px-6 font-weight-bold">{{trans('s_admin.nav_add_new_study_paln')}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th title="Field #1">{{trans('s_admin.week')}}</th>
                            <th title="Field #2">{{trans('s_admin.day')}}</th>
                            <th title="Field #4">{{trans('s_admin.surah')}}</th>
                            <th title="Field #5">{{trans('s_admin.from')}}</th>
                            <th title="Field #6">{{trans('s_admin.surah')}}</th>
                            <th title="Field #7">{{trans('s_admin.to')}}</th>
                            <th title="Field #7">{{trans('s_admin.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($new as $row)
                                <tr>
                                    <td>{{$row->Week->name_ar}}</td>
                                    <td>{{$row->Day->name_ar}}</td>
                                    <td>{{$row->From_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->from_num}}</td>
                                    <td>{{$row->To_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->to_num}}</td>
                                    <td>
                                        <a href="{{route('plan.edit',['id'=>$row->id,'type'=>'new'])}}" class="btn btn-light-primary font-weight-bold mr-2">
                                            <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                                        </a>
                                        <a href="{{route('plan.new.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
                                             <i class="icon-md fas fa-trash" aria-hidden='true'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$new->links()}}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{trans('s_admin.the_tracomy')}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th title="Field #1">{{trans('s_admin.week')}}</th>
                            <th title="Field #2">{{trans('s_admin.day')}}</th>
                            <th title="Field #4">{{trans('s_admin.surah')}}</th>
                            <th title="Field #5">{{trans('s_admin.from')}}</th>
                            <th title="Field #6">{{trans('s_admin.surah')}}</th>
                            <th title="Field #7">{{trans('s_admin.to')}}</th>
                            <th title="Field #7">{{trans('s_admin.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tracomy as $row)
                                <tr>
                                    <td>{{$row->Week->name_ar}}</td>
                                    <td>{{$row->Day->name_ar}}</td>
                                    <td>{{$row->From_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->from_num}}</td>
                                    <td>{{$row->To_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->to_num}}</td>
                                    <td>
                                        <a href="{{route('plan.edit',['id'=>$row->id,'type'=>'tracomy'])}}" class="btn btn-light-primary font-weight-bold mr-2">
                                            <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                                        </a>
                                        <a href="{{route('plan.tracomy.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
                                            <i class="icon-md fas fa-trash" aria-hidden='true'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$tracomy->links()}}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{trans('s_admin.revision')}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th title="Field #1">{{trans('s_admin.week')}}</th>
                            <th title="Field #2">{{trans('s_admin.day')}}</th>
                            <th title="Field #4">{{trans('s_admin.surah')}}</th>
                            <th title="Field #5">{{trans('s_admin.from')}}</th>
                            <th title="Field #6">{{trans('s_admin.surah')}}</th>
                            <th title="Field #7">{{trans('s_admin.to')}}</th>
                            <th title="Field #7">{{trans('s_admin.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($revision as $row)
                                <tr>
                                    <td>{{$row->Week->name_ar}}</td>
                                    <td>{{$row->Day->name_ar}}</td>
                                    <td>{{$row->From_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->from_num}}</td>
                                    <td>{{$row->To_Surah->name_ar}}</td>
                                    <td>{{trans('s_admin.aya_num')}}{{$row->to_num}}</td>
                                    <td>
                                        <a href="{{route('plan.edit',['id'=>$row->id,'type'=>'revision'])}}" class="btn btn-light-primary font-weight-bold mr-2">
                                            <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                                        </a>
                                        <a href="{{route('plan.revision.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
                                            <i class="icon-md fas fa-trash" aria-hidden='true'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{$revision->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/create_subject_plan.js') }}"></script>
@endsection


