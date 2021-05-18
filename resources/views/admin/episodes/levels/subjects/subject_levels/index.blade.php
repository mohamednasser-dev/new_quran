@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.subject_levels')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                @php $subject = \App\Models\Subject::find($subject_id); @endphp
                <a href="{{route('subjects.show',$subject->level_id)}}" class="text-muted">{{trans('s_admin.subject')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_method')}}</a>
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
                    <th title="Field #2">{{trans('s_admin.creation_date')}}</th>
                    <th title="Field #7">{{trans('s_admin.daily_plan')}}</th>
                    <th title="Field #7">{{trans('s_admin.chooses')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>@if(app()->getLocale() == 'ar'){{$row->name_ar}} @else {{$row->name_en}} @endif</td>
                        <td> @if(app()->getLocale() == 'ar'){{$row->desc_ar}} @else {{$row->desc_en}} @endif </td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a href="{{route('subject_levels_daily_plan.show',$row->id)}}" class="btn btn-dark mr-2">{{trans('s_admin.daily_plan')}}</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-light-primary font-weight-bold mr-2"
                               data-editid="{{$row->id}}" data-name_ar="{{$row->name_ar}}" data-name_en="{{$row->name_en}}"
                               data-desc_ar="{{$row->desc_ar}}" data-desc_en="{{$row->desc_en}}" data-num_lines="{{$row->num_lines}}"
                               data-num_ayat="{{$row->num_ayat}}"  data-num_faces="{{$row->num_faces}}"
                               id="edit" alt="default" data-toggle="modal" data-target="#edit_model">
                                <i class="icon-md fas fa-pencil-alt" aria-hidden='true'></i>
                            </a>
                            <a href="{{route('subjects_levels.delete',$row->id)}}" class="btn btn-light-danger font-weight-bold mr-2">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('s_admin.add_new_subject_level')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open( ['route' =>'subject_levels.store','method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
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
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_ar')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control"  name="desc_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_en')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control"  name="desc_en">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_ayat')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control"  name="num_ayat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_lines')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control"  name="num_lines">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_faces')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control"  name="num_faces">
                            </div>
                        </div>

                        <input type="hidden" name="subject_id" value="{{$subject_id}}">
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
                    {{ Form::open( ['route' =>'subject_levels.update_new','method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                    <input type="hidden" required class="form-control" id="txt_id" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.name_ar')}}</label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" id="txt_name_ar" name="name_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">{{trans('s_admin.name_en')}}</label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" id="txt_name_en" name="name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_ar')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control" id="txt_desc_ar" name="desc_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_save_en')}}</label>
                            <div class="col-lg-7">
                                <input type="text" required class="form-control" id="txt_desc_en" name="desc_en">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_ayat')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control" id="txt_num_ayat" name="num_ayat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_lines')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control" id="txt_num_lines" name="num_lines">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label text-lg-right">{{trans('s_admin.amount_with_faces')}}</label>
                            <div class="col-lg-7">
                                <input type="number" required class="form-control" id="txt_num_faces" name="num_faces">
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
        $(document).on('click', '#edit', function () {
            var id = $(this).data('editid');
            var name_ar = $(this).data('name_ar');
            var name_en = $(this).data('name_en');
            var desc_ar = $(this).data('desc_ar');
            var desc_en = $(this).data('desc_en');
            var num_lines = $(this).data('num_lines');
            var num_ayat = $(this).data('num_ayat');
            var num_faces = $(this).data('num_faces');
            $('#txt_id').val(id);
            $('#txt_name_ar').val(name_ar);
            $('#txt_name_en').val(name_en);
            $('#txt_desc_ar').val(desc_ar);
            $('#txt_desc_en').val(desc_en);
            $('#txt_num_ayat').val(num_lines);
            $('#txt_num_lines').val(num_ayat);
            $('#txt_num_faces').val(num_faces);
        });
    </script>
@endsection
