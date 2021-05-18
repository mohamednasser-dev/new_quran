@extends('front.layouts.temp')
@section('styles')
{{--    <link rel="stylesheet" href="{{url('/')}}/build/css/intlTelInput.css">--}}
{{--    <link rel="stylesheet" href="{{url('/')}}/build/css/demo.css">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
{{--<link href="{{url('/')}}/hijri/css/bootstrap.css" rel="stylesheet" />--}}
<link href="{{url('/')}}/hijri/css/bootstrap-datetimepicker.css" rel="stylesheet" />
@endsection
@section('content')

{{--	<section style="height: 450px;">--}}
{{--	    <div class="w-100 pt-80  pb-70 opc65 position-relative">--}}
{{--            @if(app()->getLocale() == 'ar')--}}
{{--	            <div class="fixed-bg" style="background-image: url(/quran/assets/images/login_images/steps_ar.png);"></div>--}}
{{--            @else--}}
{{--                <div class="fixed-bg" style="background-image: url(/quran/assets/images/login_images/steps_en.png);"></div>--}}
{{--            @endif--}}
{{--	        <div class="container">--}}
{{--	            <div class="page-title-wrap text-center w-100">--}}
{{--	                <div class="page-title-inner d-inline-block">--}}
{{--	                </div>--}}
{{--	            </div>--}}
{{--	        </div>--}}
{{--	    </div>--}}
{{--	</section>--}}
    <br>
    <br>
    <br>
	<div class="container">
        <div class="sec-title text-center w-100">
            <div class="sec-title-inner d-inline-block">
                <h2 class="mb-0" style="color: green;">1 - {{trans('admin.register_data')}}</h2>
            </div>
        </div><!-- Sec Title -->
        <div class="prod-wrap overlap-150 prod-caro w-100 slick-initialized slick-slider">
            <div class="card">
                <div class="card-header" style="background-color: #bdd63d;">
                    <h4 class="m-b-0 text-white">{{trans('admin.make_sign_up')}}</h4>
                </div>
                <div class="card-body" style="background-color: beige;">
                    {{ Form::open( ['route'  => ['store.new',$types],'method'=>'post' , 'class'=>'form'] ) }}
                  		{{ csrf_field() }}
                        <div class="form-body">
                        	<div class="row p-t-20">
	                        	@include('admin.layouts.errors')
						        @include('admin.layouts.messages')
						    </div>
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.first_name')}}</label><span style="color: red;">*</span>
                                        <input id="txt_f_name" type="text" required name="first_name_ar" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">{{trans('admin.mid_name')}}</label><span style="color: red;">*</span>
                                        <input id="txt_m_name" type="text" required  name="mid_name_ar" class="form-control form-control-danger" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">{{trans('admin.last_name')}}</label><span style="color: red;">*</span>
                                        <input id="txt_l_name" type="text" required  name="last_name_ar" class="form-control form-control-danger" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">{{trans('admin.email')}}</label><span style="color: red;">*</span>
                                        <input id="txt_email" type="email" required name="email" class="form-control form-control-danger">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.password')}}</label><span style="color: red;">*</span>
                                        <input id="txt_pass" type="password" required minlength="8"  name="password" class="form-control" placeholder="">
                                        <span style="color: red; font-size: 10px;">{{trans('admin.password_limit')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">{{trans('admin.password_confirmation')}}</label><span style="color: red;">*</span>
                                        <input id="txt_con_pass" type="password" required minlength="8" name="password_confirmation" class="form-control form-control-danger" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.gender')}}</label><span style="color: red;">*</span>
                                        <select id="txt_gender" name="gender" required class="form-control custom-select">
                                            <option value="male">{{trans('admin.male')}}</option>
                                            <option value="female">{{trans('admin.female')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.date_of_birth')}}</label><span style="color: red;">*</span>
                                        <input id="txt_date" type="text" required  name="date_of_birth" class="form-control hijri-date-input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.phone')}}</label><span style="color: red;">*</span>
                                        <input id="txt_phone" type="number" required name="phone" class="form-control form-control-danger">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.country_code')}}</label><span style="color: red;">*</span>
                                        <input  id="txt_country_code" style="max-width: 30px;" value="+966" type="text" required name="country_code" class="form-control form-control-danger">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{{trans('admin.main_lang')}}</label><span style="color: red;">*</span>
                                        <select id="txt_lang" class="form-control custom-select" required name="main_lang">
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
                                            <option selected="true" value="ar">العربية - Arabic</option>
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
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        @php $qualifications = \App\Models\Qualification::where('deleted','0')->get(); @endphp
                                        <label class="control-label">{{trans('s_admin.qualification')}}</label><span style="color: red;">*</span>
                                        <select id="txt_qualification" name="qualification" required class="form-control custom-select">
                                            @foreach($qualifications as $row)
                                                <option value="{{$row->id}}">
                                                    @if(app()->getLocale() == 'ar')
                                                        {{$row->name_ar}}
                                                    @else
                                                        {{$row->name_en}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-danger">
                                        @php $countries = \App\Models\Country::where('deleted','0')->get(); @endphp
                                        <label class="control-label">{{trans('admin.country')}}</label><span style="color: red;">*</span>
                                        <select id="txt_country" required class="form-control custom-select" name="country">
                                            @foreach($countries as $row)
                                                <option value="{{$row->id}}">
                                                    @if(app()->getLocale() == 'ar')
                                                        {{$row->name_ar}}
                                                    @else
                                                        {{$row->name_en}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        @php $nationalities = \App\Models\Nationality::where('deleted','0')->get(); @endphp
                                        <label class="control-label">{{trans('s_admin.nationality')}}</label><span style="color: red;">*</span>
                                        <select id="txt_nationality" name="nationality" required class="form-control custom-select">
                                            @foreach($nationalities as $row)
                                                <option value="{{$row->id}}">
                                                    @if(app()->getLocale() == 'ar')
                                                        {{$row->name_ar}}
                                                    @else
                                                        {{$row->name_en}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if($types == 'teacher_far_learn' || $types == 'teacher_mogmaa_dorr')
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            @php $job_names = \App\Models\Job_name::where('deleted','0')->get(); @endphp
                                            <label class="control-label">{{trans('admin.job_name')}}</label><span style="color: red;">*</span>
                                            <select id="txt_job_names" name="job_name" required class="form-control custom-select">
                                                @foreach($job_names as $row)
                                                    <option value="{{$row->id}}">
                                                        @if(app()->getLocale() == 'ar')
                                                            {{$row->name_ar}}
                                                        @else
                                                            {{$row->name_en}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
{{--                                @if($types == 'far_learn')--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group has-danger">--}}
{{--                                            @php $levels = \App\Models\Level::where('deleted','0')->where('type','far_learn')->get(); @endphp--}}
{{--                                            <label class="control-label">{{trans('s_admin.level')}}</label><span style="color: red;">*</span>--}}
{{--                                            <select id="txt_country" required class="form-control custom-select" name="level_id">--}}
{{--                                                @foreach($levels as $row)--}}
{{--                                                    <option value="{{$row->id}}">--}}
{{--                                                        @if(app()->getLocale() == 'ar')--}}
{{--                                                            {{$row->name_ar}}--}}
{{--                                                        @else--}}
{{--                                                            {{$row->name_en}}--}}
{{--                                                        @endif--}}
{{--                                                    </option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                            </div>
	                        <div class="view-more d-inline-block text-center w-100">
			                    <button style="width: 122px;font-size: smaller;" class="thm-btn mini-btn thm-bg"  type="submit">{{trans('admin.sign')}}<span></span><span></span><span></span><span></span></button>
			                    <button class="thm-btn mini-btn thm-bg" id="btn_delete" style="background-color: brown;width: 122px;font-size: smaller;"  type="button">{{trans('admin.delete_2')}}<span></span><span></span><span></span><span></span></button>
			                 </div>
		                </div>
                    {{ Form::close() }}
	            </div>
	        </div>
        </div>
    </div>
	@endsection

@section('scripts')
{{--    //for hijri date--}}
    <script src="{{url('/')}}/hijri/js/jquery-3.3.1.js"></script>
    <script src="{{url('/')}}/hijri/js/bootstrap.js"></script>
    <script src="{{url('/')}}/hijri/js/momentjs.js"></script>
    <script src="{{url('/')}}/hijri/js/moment-with-locales.js"></script>
    <script src="{{url('/')}}/hijri/js/moment-hijri.js"></script>
    <script src="{{url('/')}}/hijri/js/bootstrap-hijri-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            initHijrDatePicker();
            $('.disable-date').hijriDatePicker({

                minDate:"2020-01-01",
                maxDate:"2021-01-01",
                viewMode:"years",
                hijri:true,
                debug:true
            });
        });
        function initHijrDatePicker() {
            $(".hijri-date-input").hijriDatePicker({
                locale: "ar-sa",
                format: "DD-MM-YYYY",
                hijriFormat:"iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: true,
                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: false,
                viewMode:'months',
                keepOpen: false,
                hijri: false,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true
            });
        }
        function initHijrDatePickerDefault() {
            $(".hijri-date-input").hijriDatePicker();
        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var code = "+966"; // Assigning value from model.
            $('#txt_country_code').val(code);
            $('#txt_country_code').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: false
            });
            console.log(code)
        });
    </script>
    <script>
        $(document).on('click', '#btn_delete', function () {
            $("#txt_name").val('');
            $("#txt_pass").val('');
            $("#txt_con_pass").val('');
            $("#txt_f_name").val('');
            $("#txt_m_name").val('');
            $("#txt_l_name").val('');
            $("#txt_date").val('');
            $("#txt_email").val('');
            $("#txt_country_code").val('');
            $("#txt_phone").val('');
        });
    </script>
@endsection

