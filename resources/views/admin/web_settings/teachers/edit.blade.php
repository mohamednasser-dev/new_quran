@extends('admin_temp')
@section('title')
    <div class="d-flex align-items-center flex-wrap mr-2">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{trans('s_admin.edit')}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_teacher_shoan_settings')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="text-muted">{{trans('s_admin.nav_settings_control_panel')}}</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{trans('s_admin.edit_teacher')}}</h3>
        </div>
        <form class="form" action="{{route('teacher_settings.update',$data->id )}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.first_name')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" value="{{$data->first_name_ar}}" required class="form-control" name="first_name_ar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.mid_name')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" value="{{$data->mid_name_ar}}" required class="form-control" name="mid_name_ar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.last_name')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" value="{{$data->last_name_ar}}" required class="form-control" name="last_name_ar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.email')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" value="{{$data->email}}" required class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.password')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.password_confirmation')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12" style="padding-top: 40px;">{{trans('s_admin.bio')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <p class="form-control-plaintext text-muted">{{trans('s_admin.arabic')}}</p>
                        <textarea name="bio_ar" class="form-control" id="exampleTextarea" rows="3"> {{$data->bio_ar}} </textarea>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <p class="form-control-plaintext text-muted">{{trans('s_admin.english')}}</p>
                        <textarea name="bio_en" class="form-control" id="exampleTextarea" rows="3"> {{$data->bio_en}} </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.phone')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="tel" class="form-control" name="phone" value="{{$data->phone}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.i_pan')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="tel" class="form-control" name="i_pan" value="{{$data->i_pan}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.ident_num')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="tel" required class="form-control" name="ident_num" value="{{$data->ident_num}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.lang')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="main_lang" class="form-control form-control-lg form-control-solid" value="{{$data->main_lang}}">
                            <option>Select Language...</option>
                            <option value="id">Bahasa Indonesia - Indonesian</option>
                            <option value="msa">Bahasa Melayu - Malay</option>
                            <option value="ca">Catal?? - Catalan</option>
                            <option value="cs">??e??tina - Czech</option>
                            <option value="da">Dansk - Danish</option>
                            <option value="de">Deutsch - German</option>
                            <option value="en" selected="selected">English</option>
                            <option value="en-gb">English UK - British English</option>
                            <option value="es">Espa??ol - Spanish</option>
                            <option value="eu">Euskara - Basque (beta)</option>
                            <option value="fil">Filipino</option>
                            <option value="fr">Fran??ais - French</option>
                            <option value="ga">Gaeilge - Irish (beta)</option>
                            <option value="gl">Galego - Galician (beta)</option>
                            <option value="hr">Hrvatski - Croatian</option>
                            <option value="it">Italiano - Italian</option>
                            <option value="hu">Magyar - Hungarian</option>
                            <option value="nl">Nederlands - Dutch</option>
                            <option value="no">Norsk - Norwegian</option>
                            <option value="pl">Polski - Polish</option>
                            <option value="pt">Portugu??s - Portuguese</option>
                            <option value="ro">Rom??n?? - Romanian</option>
                            <option value="sk">Sloven??ina - Slovak</option>
                            <option value="fi">Suomi - Finnish</option>
                            <option value="sv">Svenska - Swedish</option>
                            <option value="vi">Ti???ng Vi???t - Vietnamese</option>
                            <option value="tr">T??rk??e - Turkish</option>
                            <option value="el">???????????????? - Greek</option>
                            <option value="bg">?????????????????? ???????? - Bulgarian</option>
                            <option value="ru">?????????????? - Russian</option>
                            <option value="sr">???????????? - Serbian</option>
                            <option value="uk">???????????????????? ???????? - Ukrainian</option>
                            <option value="he">???????????????? - Hebrew</option>
                            <option value="ur">???????? - Urdu (beta)</option>
                            <option value="ar">?????????????? - Arabic</option>
                            <option value="fa">?????????? - Persian</option>
                            <option value="mr">??????????????? - Marathi</option>
                            <option value="hi">?????????????????? - Hindi</option>
                            <option value="bn">??????????????? - Bangla</option>
                            <option value="gu">????????????????????? - Gujarati</option>
                            <option value="ta">??????????????? - Tamil</option>
                            <option value="kn">??????????????? - Kannada</option>
                            <option value="th">????????????????????? - Thai</option>
                            <option value="ko">????????? - Korean</option>
                            <option value="ja">????????? - Japanese</option>
                            <option value="zh-cn">???????????? - Simplified Chinese</option>
                            <option value="zh-tw">???????????? - Traditional Chinese</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.date_of_birth')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input id="txt_date" type="date" required  value="{{$data->date_of_birth}}" name="date_of_birth" class="form-control hijri-date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.gender')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select required name="gender" class="form-control form-control-lg" id="exampleSelectl">
                            @if($data->gender == 'male')
                                <option selected value="male">{{trans('admin.male')}}</option>
                            @else
                                <option value="male">{{trans('admin.male')}}</option>
                            @endif
                            @if($data->gender == 'female')
                                <option selected value="female">{{trans('admin.female')}}</option>
                            @else
                                <option value="female">{{trans('admin.female')}}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.epo_type')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select required name="epo_type" class="form-control form-control-lg"
                                id="exampleSelectl">
                            @if($data->epo_type == 'far_learn')
                                <option selected value="far_learn">{{trans('s_admin.far_learn')}}</option>
                            @else
                                <option value="far_learn">{{trans('s_admin.far_learn')}}</option>
                            @endif
                            @if($data->epo_type == 'mogmaa_dorr')
                                <option selected value="mogmaa_dorr">{{trans('s_admin.mogmaa_dorr')}}</option>
                            @else
                                <option value="mogmaa_dorr">{{trans('s_admin.mogmaa_dorr')}}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.country')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        @php $country = App\Models\Country::where('deleted','0')->get(); @endphp
                        <select id="country" name="country" required class="form-control custom-select">
                            <option >{{trans('s_admin.choose_country')}}</option>
                            @foreach($country as $row)
                                @if($data->country == $row->id)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.qualification')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        @php $qualification = App\Models\Qualification::where('deleted','0')->get(); @endphp
                        <select id="qualification" name="qualification" required class="form-control custom-select">
                            <option>{{trans('s_admin.choose_qualification')}}</option>
                            @foreach($qualification as $row)
                                @if($data->qualification == $row->id)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('s_admin.nationality')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        @php $nationality = App\Models\Nationality::where('deleted','0')->get(); @endphp
                        <select id="nationality" name="nationality" required class="form-control custom-select">
                            <option >{{trans('s_admin.choose_nationality')}}</option>
                            @foreach($nationality as $row)
                                @if($data->nationality == $row->id)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{trans('admin.job_name')}}</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        @php $job_names = \App\Models\Job_name::where('deleted','0')->get(); @endphp
                        <select id="job_name" name="job_name" required class="form-control custom-select">
                            <option >{{trans('s_admin.choose_Job_name')}}</option>
                            @foreach($job_names as $row)
                                @if($data->job_name == $row->id)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mr-2">{{trans('s_admin.edit')}}</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/create_episode_ajax.js') }}"></script>
@endsection

