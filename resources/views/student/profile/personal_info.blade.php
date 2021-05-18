<div class="flex-row-fluid ml-lg-8">
    {!! Form::model($data, ['route' => ['student.profile'] , 'method'=>'post' ,'files'=> true]) !!}
    {{ csrf_field() }}
    <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">{{trans('s_admin.personal_info')}}</h3>
                <span
                    class="text-muted font-weight-bold font-size-sm mt-1">{{trans('s_admin.update_personal_info')}}</span>
            </div>
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">{{trans('s_admin.save_changes')}}</button>
                <button type="reset" class="btn btn-secondary">{{trans('s_admin.cancel')}}</button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <!--begin::Body-->
        <div class="card-body">
            @if(auth::guard('student')->user()->complete_data == '0')
                <div class="alert alert-custom alert-outline-warning fade show mb-5" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">{{trans('s_admin.should_complete_data')}}</div>
                    <div class="alert-close">
                    </div>
                </div>
            @endif
            <div class="row">
                <label class="col-xl-3"></label>
                <div class="col-lg-9 col-xl-6">
                    <h5 class="font-weight-bold mb-6">{{trans('s_admin.info')}}</h5>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.personal_image')}}</label>
                <div class="col-lg-9 col-xl-6">
                    @if($data->image == null)
                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                             style="background-image: url(/uploads/users_images/blank.png)">
                            <div class="image-input-wrapper"
                                 style="background-image: url(/uploads/users_images/blank.png)"></div>
                            @else
                                <div class="image-input image-input-outline" id="kt_profile_avatar"
                                     style="background-image: url(/uploads/students/{{$data->image}})">
                                    <div class="image-input-wrapper"
                                         style="background-image: url(/uploads/students/{{$data->image}})"></div>
                                    @endif
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                                </div>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.first_name')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <input required class="form-control form-control-lg form-control-solid"
                               value="{{$data->first_name_ar}}" type="text" name="first_name_ar"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.mid_name')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <input required class="form-control form-control-lg form-control-solid"
                               value="{{$data->mid_name_ar}}" type="text" name="mid_name_ar"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.last_name')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <input required class="form-control form-control-lg form-control-solid"
                               value="{{$data->last_name_ar}}" type="text" name="last_name_ar"/>
                    </div>
                </div>
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mt-10 mb-6">{{trans('s_admin.contact_data')}}</h5>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.phone')}}</label>
                    <div class="col-lg-2 col-xl-1">
                        <input id="txt_country_code" class="form-control form-control-lg form-control-solid"
                               value="{{$data->country_code}}" type="text" name="country_code"/>
                    </div>
                    <div class="col-lg-7 col-xl-5">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input required type="text" value="{{$data->phone}}"
                                   class="form-control form-control-lg form-control-solid" name="phone"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.date_of_birth')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
{{--                            <input type="text" name="date_of_birth" value="{{$data->date_of_birth}}"--}}
{{--                                   class="form-control form-control-lg form-control-solid"/>--}}
                            <input id="txt_date" type="text" value="{{$data->date_of_birth}}" required  name="date_of_birth" class="form-control hijri-date-input">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.email')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input type="email" readonly value="{{$data->email}}"
                                   class="form-control form-control-lg form-control-solid"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin.lang')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control form-control-lg form-control-solid" value="{{$data->main_lang}}">
                            <option>Select Language...</option>
                            <option value="id">Bahasa Indonesia - Indonesian</option>
                            <option value="msa">Bahasa Melayu - Malay</option>
                            <option value="ca">Català - Catalan</option>
                            <option value="cs">Čeština - Czech</option>
                            <option value="da">Dansk - Danish</option>
                            <option value="de">Deutsch - German</option>
                            <option value="en" selected="selected">English</option>
                            <option value="en-gb">English UK - British English</option>
                            <option value="es">Español - Spanish</option>
                            <option value="eu">Euskara - Basque (beta)</option>
                            <option value="fil">Filipino</option>
                            <option value="fr">Français - French</option>
                            <option value="ga">Gaeilge - Irish (beta)</option>
                            <option value="gl">Galego - Galician (beta)</option>
                            <option value="hr">Hrvatski - Croatian</option>
                            <option value="it">Italiano - Italian</option>
                            <option value="hu">Magyar - Hungarian</option>
                            <option value="nl">Nederlands - Dutch</option>
                            <option value="no">Norsk - Norwegian</option>
                            <option value="pl">Polski - Polish</option>
                            <option value="pt">Português - Portuguese</option>
                            <option value="ro">Română - Romanian</option>
                            <option value="sk">Slovenčina - Slovak</option>
                            <option value="fi">Suomi - Finnish</option>
                            <option value="sv">Svenska - Swedish</option>
                            <option value="vi">Tiếng Việt - Vietnamese</option>
                            <option value="tr">Türkçe - Turkish</option>
                            <option value="el">Ελληνικά - Greek</option>
                            <option value="bg">Български език - Bulgarian</option>
                            <option value="ru">Русский - Russian</option>
                            <option value="sr">Српски - Serbian</option>
                            <option value="uk">Українська мова - Ukrainian</option>
                            <option value="he">עִבְרִית - Hebrew</option>
                            <option value="ur">اردو - Urdu (beta)</option>
                            <option value="ar">العربية - Arabic</option>
                            <option value="fa">فارسی - Persian</option>
                            <option value="mr">मराठी - Marathi</option>
                            <option value="hi">हिन्दी - Hindi</option>
                            <option value="bn">বাংলা - Bangla</option>
                            <option value="gu">ગુજરાતી - Gujarati</option>
                            <option value="ta">தமிழ் - Tamil</option>
                            <option value="kn">ಕನ್ನಡ - Kannada</option>
                            <option value="th">ภาษาไทย - Thai</option>
                            <option value="ko">한국어 - Korean</option>
                            <option value="ja">日本語 - Japanese</option>
                            <option value="zh-cn">简体中文 - Simplified Chinese</option>
                            <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.ident_num')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <input required type="text" value="{{$data->ident_num}}"
                                   class="form-control form-control-lg form-control-solid" name="ident_num"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.nationality')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        @php $nationalities = \App\Models\Nationality::where('deleted','0')->get(); @endphp
                        <select name="nationality" required class="form-control form-control-lg form-control-solid">
                            @foreach($nationalities as $row)
                                @if($data->nationality == $row->id)
                                    <option value="{{$row->id}}" selected>
                                        {{$row->name}}
                                    </option>
                                @else
                                    <option value="{{$row->id}}">
                                        {{$row->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.qualification')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        @php $qualifications = \App\Models\Qualification::where('deleted','0')->get(); @endphp
                        <select name="qualification" required class="form-control form-control-lg form-control-solid">
                            @foreach($qualifications as $row)
                                @if($data->qualification == $row->id)
                                    <option value="{{$row->id}}" selected>
                                        @if(app()->getLocale() == 'ar')
                                            {{$row->name_ar}}
                                        @else
                                            {{$row->name_en}}
                                        @endif
                                    </option>
                                @else
                                    <option value="{{$row->id}}">
                                        @if(app()->getLocale() == 'ar')
                                            {{$row->name_ar}}
                                        @else
                                            {{$row->name_en}}
                                        @endif
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.save_quran_num')}}</label>
                    <div class="col-lg-7 col-xl-6">
                        <input type="number" required min="0" max="30" value="{{$data->save_quran_num}}"
                               class="form-control form-control-lg form-control-solid" name="save_quran_num"/>
                    </div>
                    <label class="col-xl-2 col-lg-2 col-form-label">{{trans('s_admin.gzaa')}}</label>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.what_limit_save')}}</label>
                    <div class="col-lg-7 col-xl-6">
                        <input type="number" required value="{{$data->save_quran_limit}}"
                               class="form-control form-control-lg form-control-solid" name="save_quran_limit"/>
                    </div>
                    <label class="col-xl-2 col-lg-2 col-form-label">{{trans('s_admin.face')}}</label>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.district_S')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        @php $district = App\Models\District::where('deleted','0')->get(); @endphp
                        <select required name="district_id" class="form-control form-control-lg" id="cmb_levels">
                            <option value="" selected>{{trans('s_admin.choose_district')}}</option>
                            @foreach($district as $row)
                                @if($data->district_id == $row->id)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.level')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        @if($data->epo_type == 'far_learn')
                            @php
                                $epo_typ = 'far_learn';
                            @endphp
                        @else
                            @php
                                $epo_typ = 'mogmaa_dorr';
                            @endphp
                        @endif
                        @php $levels = App\Models\Level::where('type',$epo_typ)->where('deleted','0')->get(); @endphp
                        <select required name="level_id" class="form-control form-control-lg" id="cmb_levels">
                            <option value="" selected>{{trans('s_admin.choose_level')}}</option>
                            @foreach($levels as $row)
                                @if($data->level_id == $row->id)
                                    @if(app()->getLocale() == 'ar')
                                        <option value="{{$row->id}}" selected>{{$row->name_ar}}</option>
                                    @else
                                        <option value="{{$row->id}}" selected>{{$row->name_en}}</option>
                                    @endif
                                @else
                                    @if(app()->getLocale() == 'ar')
                                        <option value="{{$row->id}}">{{$row->name_ar}}</option>
                                    @else
                                        <option value="{{$row->id}}">{{$row->name_en}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($data->epo_type != 'far_learn')
                    <div class="form-group row" id="subject_cont"
                         @if($data->subject_id == null ) style="display:none;" @endif>
                        <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.subject')}}</label>
                        <div class="col-lg-9 col-xl-6">
                            @php $subjects = App\Models\Subject::where('level_id',$data->level_id)->where('deleted','0')->get(); @endphp
                            <select required name="subject_id" class="form-control form-control-lg"
                                    id="cmb_sign_up_subject">
                                <option value="" selected>{{trans('s_admin.choose_subject')}}</option>
                                @foreach($subjects as $row)
                                    @if($data->subject_id == $row->id)
                                        @if(app()->getLocale() == 'ar')
                                            <option value="{{$row->id}}" selected>{{$row->name_ar}}
                                                &nbsp;&nbsp;&nbsp;{{$row->desc_ar}}</option>
                                        @else
                                            <option value="{{$row->id}}" selected>{{$row->name_en}}
                                                &nbsp;&nbsp;&nbsp;{{$row->desc_en}}</option>
                                        @endif
                                    @else
                                        @if(app()->getLocale() == 'ar')
                                            <option value="{{$row->id}}">{{$row->name_ar}}
                                                &nbsp;&nbsp;&nbsp;{{$row->desc_ar}}</option>
                                        @else
                                            <option value="{{$row->id}}">{{$row->name_en}}
                                                &nbsp;&nbsp;&nbsp;{{$row->desc_en}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="subject_level_cont"
                         @if($data->subject_level_id == null ) style="display:none;" @endif>
                        <label class="col-xl-3 col-lg-3 col-form-label">{{trans('s_admin.subject_level')}}</label>
                        <div class="col-lg-9 col-xl-6">
                            {{ Form::select('subject_level_id',App\Models\Subject_level::where('subject_id',$data->subject_id)->where('deleted','0')->pluck('name_ar','id'),$data->subject_level_id
                                                            ,["class"=>"form-control form-control-lg", "required" ,"id"=>"cmb_subject_levels" ]) }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mr-2">{{trans('s_admin.save_changes')}}</button>
                <button type="reset" class="btn btn-secondary">{{trans('s_admin.cancel')}}</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
