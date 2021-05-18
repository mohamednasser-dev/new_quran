@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.nav_subjects')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('levels.index')}}" class="text-muted">{{trans('s_admin.nav_levels')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            </div>
            <div class="card-toolbar">
                <a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-light-primary px-6 font-weight-bold">{{trans('s_admin.add')}}</a>
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
                    <th title="Field #1">{{trans('s_admin.name')}}</th>
                    <th title="Field #2">{{trans('s_admin.amount_save')}}</th>
{{--                    <th title="Field #2">{{trans('s_admin.level')}}</th>--}}
                    <th title="Field #3">{{trans('s_admin.evaluation_info')}}</th>
                    <th title="Field #3">{{trans('s_admin.subject_levels')}}</th>
                    <th title="Field #7">{{trans('s_admin.chooses')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td> @if(app()->getLocale() == 'ar'){{$row->name_ar}} @else {{$row->name_en}} @endif </td>
                        <td> {{$row->amount_num}} </td>
{{--                        <td>{{$row->Level->name_ar}}</td>--}}
                        <td>
                            <a href="{{route('subject_evaluation.show',$row->id)}}" class="btn btn-info mr-2">{{trans('s_admin.the_evaluation')}}</a>
                        </td>
                        <td>
                            <a href="{{route('subject_levels.show',$row->id)}}" class="btn btn-dark mr-2">{{trans('s_admin.subject_levels')}}</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-light-primary font-weight-bold mr-2"
                                data-editid="{{$row->id}}" data-name_ar="{{$row->name_ar}}" data-name_en="{{$row->name_en}}" data-desc_ar="{{$row->desc_ar}}"  data-desc_en="{{$row->desc_en}}" data-amount-num="{{$row->amount_num}}" id="edit"
                                alt="default" data-toggle="modal" data-target="#edit_model">
                                <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                            </a>
                            <a href="{{route('subjectss.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_new_subject')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route' =>'subjects.store','method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                    <input type="hidden" required class="form-control"  name="level_id" value="{{$id}}">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.name_ar')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control"  name="name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.name_en')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control"  name="name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_lines')}}</label>
                            <div class="col-lg-7">
                                <input type="number" min="0" required class="form-control" name="amount_num">
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
    {{--    edit model--}}
    <div class="modal fade" id="edit_model" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="t*ue">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.edit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route' =>'subjects.update_new','method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                    <input type="hidden" required class="form-control" id="txt_id" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.name_ar')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control" id="txt_name_ar" name="name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.name_en')}}</label>
                            <div class="col-lg-7">
                                <input type="text" requi0red class="form-control" id="txt_name_en"  name="name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_lines')}}</label>
                            <div class="col-lg-7">
                                <input type="number" min="0" required class="form-control" id="txt_amount_num" name="amount_num">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary font-weight-bold">{{trans('s_admin.edit')}}</button>
                    </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var id;
        $(document).on('click', '#edit', function () {
            id = $(this).data('editid');
            name_ar = $(this).data('name_ar');
            name_en = $(this).data('name_en');
            amount_num = $(this).data('amount-num');
            $('#txt_id').val(id);
            $('#txt_name_ar').val(name_ar);
            $('#txt_name_en').val(name_en);
            $('#txt_amount_num').val(amount_num);
        });
    </script>
@endsection
