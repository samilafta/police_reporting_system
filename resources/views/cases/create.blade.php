@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Open Case
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    {{--<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" type="text/css" rel="stylesheet">--}}
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"  type="text/css"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/wizard.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>OPEN NEW CASE</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
            <a href="{{ route('cases.index') }}">Cases</a>
            </li>
            <li class="active">New Case</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Open New Case
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form id="caseForm" method="post" action="{{ route('cases.store') }}">
                            @csrf

                            <div class="row">
                                <h4>Complainant Information</h4>
                                <hr>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="full_name" class="control-label">Full Name *</label>
                                            <input id="full_name" name="full_name" type="text" value="{!! old('full_name') !!}" class="form-control required">
                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="age" class="control-label">Age </label>
                                            <input id="age" name="age" type="text" value="{!! old('age') !!}" class="form-control">
                                            @if ($errors->has('age'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('age') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option>Select</option>
                                                <option value="m">MALE</option>
                                                <option value="f">FEMALE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation" class="control-label">Occupation </label>
                                            <input id="occupation" name="occupation" type="text" value="{!! old('occupation') !!}" class="form-control">
                                            @if ($errors->has('occupation'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('occupation') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="phone_number" class="control-label">Phone Number </label>
                                            <input id="phone_number" name="phone_number" type="text" value="{!! old('phone_number') !!}" class="form-control">
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email </label>
                                            <input id="email" name="email" type="text" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="home_address" class="control-label">Home Address </label>
                                            <input id="home_address" name="home_address" type="text" value="{!! old('home_address') !!}" class="form-control ">
                                            @if ($errors->has('home_address'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('home_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <h4>Complaint</h4>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="incident_date" class="control-label">Incident Date</label>
                                            <input id="incident_date" name="incident_date" type="text" value="{!! old('incident_date') !!}" class="form-control">
                                            @if ($errors->has('incident_date'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('incident_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="incident_time" class="control-label">Incident Time</label>
                                            <input id="incident_time" name="incident_time" type="text" value="{!! old('incident_time') !!}" data-format="hh:mm A" class="form-control">
                                            @if ($errors->has('incident_time'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('incident_time') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="incident_location" class="control-label">Incident Location</label>
                                            <input id="incident_location" name="incident_location" value="{!! old('incident_location') !!}" type="text" class="form-control">
                                            @if ($errors->has('incident_location'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('incident_location') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-bold">Fill the form below if there is a witness</h4>
                                            <div class="form-group">
                                                <label for="w_full_name" class="control-label">Witness Full Name </label>
                                                <input id="w_full_name" name="w_full_name" type="text" value="{!! old('w_full_name') !!}" class="form-control">
                                                @if ($errors->has('w_full_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('w_full_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="w_phone_number" class="control-label">Witness Phone Number </label>
                                                <input id="w_phone_number" name="w_phone_number" type="text" value="{!! old('w_phone_number') !!}" class="form-control">
                                                @if ($errors->has('w_phone_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('w_phone_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="w_home_address" class="control-label">Witness Home Address </label>--}}
                                                {{--<input id="w_home_address" name="w_home_address" type="text" value="{!! old('w_home_address') !!}" class="form-control">--}}
                                            {{--</div>--}}

                                        {{--<h4>Upload Evidence if available</h4>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="w_phone_number" class="control-label">Evidence Files </label>--}}
                                            {{--<input id="w_phone_number" name="w_phone_number" type="file" value="{!! old('w_phone_number') !!}" class="form-control" multiple />--}}
                                        {{--</div>--}}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="incident_desc" class="control-label">Incident Description</label> <br/>
                                            <textarea id="incident_desc" class="summernote" name="incident_desc" cols="60" rows="10">{!! old('incident_desc') !!}</textarea>
                                            @if ($errors->has('incident_desc'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('incident_desc') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <h4>Culprit Details</h4>
                                <hr>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="c_full_name" class="control-label">Full Name *</label>
                                            <input id="c_full_name" name="c_full_name" type="text" value="{!! old('c_full_name') !!}" class="form-control">
                                            @if ($errors->has('c_full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('c_full_name') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="c_age" class="control-label">Age </label>
                                            <input id="c_age" name="c_age" type="text" value="{!! old('c_age') !!}" class="form-control">
                                            @if ($errors->has('c_age'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('c_age') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="c_gender">Gender</label>
                                            <select class="form-control" name="c_gender" id="c_gender">
                                                <option>Select</option>
                                                <option value="m">MALE</option>
                                                <option value="f">FEMALE</option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="c_occupation" class="control-label">Occupation </label>
                                            <input id="c_occupation" name="c_occupation" type="text" value="{!! old('c_occupation') !!}" class="form-control">
                                            @if ($errors->has('c_occupation'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('c_occupation') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="c_address" class="control-label">Home Address </label>
                                            <input id="c_address" name="c_address" type="text" value="{!! old('c_address') !!}" class="form-control">
                                            @if ($errors->has('c_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $errors->first('c_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-offset-5">
                                    <button type="reset" class="btn btn-lg btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
{{--    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
{{--    <script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}" type="text/javascript"></script>





    <script type="application/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                fontNames: ['Lato', 'Arial', 'Courier New']
            });

        });

        function toggleCheckbox() {
            // Get the checkbox
            var checkBox = document.getElementById("witness");
            // Get the output text
            var form = document.getElementById("witness_form");

            // If the checkbox is checked, display the output text
            if (checkBox.checked === true){
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }


    </script>

    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--$('select[name="region"]').on('change', function() {--}}
                {{--var region_id = $(this).val();--}}
                {{--if(region_id) {--}}
                    {{--$.ajax({--}}
                        {{--url: '/city/get/'+region_id,--}}
                        {{--type: "GET",--}}
                        {{--dataType: "json",--}}
                        {{--success:function(data) {--}}

                            {{--$('select[name="city"]').empty();--}}
                            {{--$.each(data, function(key, value) {--}}
                                {{--$('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');--}}
                            {{--});--}}
                        {{--}--}}
                    {{--});--}}
                {{--}else{--}}
                    {{--$('select[name="city"]').empty();--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}


@stop

