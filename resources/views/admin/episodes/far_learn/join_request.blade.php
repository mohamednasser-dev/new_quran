@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.join_orders')}}</h5>
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
                    <th title="Field #1">{{trans('s_admin.student_name')}}</th>
                    <th title="Field #1">{{trans('s_admin.request_date')}}</th>
                    <th title="Field #1">{{trans('s_admin.request_status')}}</th>
                    <th title="Field #7">{{trans('s_admin.chooses')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>
                            @if(app()->getLocale() == 'ar')
                                {{$row->Episode->name_ar}}
                            @else
                                {{$row->Episode->name_en}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('student.details',['type' => 'far_learn' , 'id' => $row->student_id])}}" >
                                @if(app()->getLocale() == 'ar')
                                    {{$row->Student->first_name_ar}} {{$row->Student->mid_name_ar}} {{$row->Student->last_name_ar}}
                                @else
                                    {{$row->Student->first_name_en}} {{$row->Student->mid_name_en}} {{$row->Student->last_name_en}}
                                @endif
                            </a>
                        </td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="btn-group">
                                @if($row->status == 'new')
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.new')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('far_learn.change_status',['type'=>'accepted','id'=>$row->id])}}">{{trans('s_admin.accept')}}</a>
                                        <a class="dropdown-item" href="{{route('far_learn.change_status',['type'=>'rejected','id'=>$row->id])}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->status == 'accepted')
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.accepted')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('far_learn.change_status',['type'=>'rejected','id'=>$row->id])}}">{{trans('s_admin.reject')}}</a>
                                    </div>
                                @elseif($row->status == 'rejected')
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{trans('s_admin.rejected')}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('far_learn.change_status',['type'=>'accepted','id'=>$row->id])}}">{{trans('s_admin.accept')}}</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{route('episode.edit',$row->id)}}" class="btn btn-light-primary font-weight-bold mr-2">
                                 <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                             </a>
                             <a href="{{route('episode.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
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
    <!-- Modal-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_slider')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['url' => ['sliders'],'method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.title_ar')}}</label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control" placeholder="Enter full name" name="title_ar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.title_en')}}</label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control" placeholder="Enter full name" name="title_en">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.desc_ar')}}</label>
                                <div class="col-lg-8">
                                    <textarea name="desc_ar" required class="form-control" id="exampleTextarea" rows="3" placeholder="Please enter your message"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.desc_ar')}}</label>
                                <div class="col-lg-8">
                                    <textarea name="desc_en" required class="form-control" id="exampleTextarea" rows="3" placeholder="Please enter your message"></textarea>
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.image')}} &nbsp;715*1920 </label>
                                <div class="col-lg-8">
                                    <div class="uppy" id="kt_uppy_5">
                                        <div class="uppy-wrapper"><div class="uppy-Root uppy-FileInput-container"><input class="uppy-FileInput-input uppy-input-control" style="" type="file" name="image" multiple="" id="kt_uppy_5_input_control"><label class="uppy-input-label btn btn-light-primary btn-sm btn-bold" for="kt_uppy_5_input_control">{{trans('s_admin.choose_file')}}</label></div></div>
                                        <div class="uppy-list"></div>
                                        <div class="uppy-status"><div class="uppy-Root uppy-StatusBar is-waiting" aria-hidden="true"><div class="uppy-StatusBar-progress
                           " style="width: 0%;" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div><div class="uppy-StatusBar-actions"></div></div></div>
                                        <div class="uppy-informer uppy-informer-min"><div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"> </p></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{trans('s_admin.cancel')}}
                            </button>
                            <button type="submit" class="btn btn-primary font-weight-bold">{{trans('s_admin.save')}}</button>
                        </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
@endsection
