@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    View Case
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"  type="text/css"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/case-details.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>Case Details</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('cases.index') }}">Cases</a>
            </li>
            <li class="active">View Case</li>
            {{--<li>--}}
            {{--<a href="#">Pages</a>--}}
            {{--</li>--}}
            {{--<li class="active">Blank page</li>--}}
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Case Details
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>

                    <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">

                        {{--action buttons display--}}

                        <div class="action-buttons margin">

                            <div class="row">

                                <div class="col-md-4">
                                    @hasanyrole('super-admin|commander-officer')

                                    @if($case->case_status == 1)

                                        <a href="{{ route('cases.approve', ['id' => $case->id]) }}" class="btn btn-info">Approve</a>

                                    @endif
                                    @if($case->case_status == 0)

                                        <button class="btn btn-info" data-toggle="modal" data-target="#assign_case">
                                            Assign Investigator</button>

                                    @endif

                                    @endhasanyrole
                                </div>


                                <div class="col-md-4">
                                    <button class="brn btn-primary" id="printBtn"><i class="fa fa-print"></i> Print</button>
                                </div>


                                <div class="col-md-4">
                                    @hasanyrole('super-admin|investigator-officer')

                                    @if($case->investigator_id != null)

                                        @if(Auth::user()->id == $case->investigator_id)

                                            @if($case->case_status == 2)

                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#investigation_details"
                                                        data-backdrop="static" data-keyboard="false">
                                                    Add Investigation Details</button>

                                            @endif
                                        @endif

                                    @endif

                                    @endhasanyrole
                                </div>

                            </div>

                        </div>

                        {{--assign modal--}}
                        <div class="modal fade modal-fade-in-scale-up" id="assign_case" tabindex="-1" role="dialog"
                             aria-labelledby="assign_case" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="assign_case">
                                            Assign Case to Investigator
                                        </h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('cases.assign', ['case' => $case->id]) }}" method="post">
                                            @csrf
                                            {{--{{ @method_field('PUT') }}--}}

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="investigator">Investigators</label>
                                                            <select class="form-control" name="investigator" id="investigator">
                                                                {{--<option>Select</option>--}}
                                                                @foreach($users as $user)

                                                                    @if($user->profile->rank_id == 2)

                                                                        <option value="{{ $user->id }}">{{ $user->profile->full_name }}</option>

                                                                    @endif

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-success">Assign</button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                    {{--<div class="modal-footer">--}}
                                        {{--<div class="row">--}}
                                            {{--<form action="{{ route('cases.destroy', ['case' => $case->id]) }}" method="post">--}}

                                                {{--@csrf--}}
                                                {{--{{ @method_field('DELETE') }}--}}

                                                {{--<button type="submit" class="btn btn-danger">Delete</button>--}}

                                            {{--</form>--}}


                                        {{--</div>--}}

                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>

                        {{--Investigation Details Modal--}}
                        <div class="modal fade modal-fade-in-scale-up" id="investigation_details" tabindex="-1" role="dialog"
                             aria-labelledby="assign_case" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">[close]</button>
                                        <h4 class="modal-title" id="assign_case">
                                            Investigation Details
                                        </h4>
                                    </div>
                                    <div class="modal-body modal-lg">

                                        <form action="{{ route('cases.investigation', ['case' => $case->investigation->id]) }}" method="post">
                                            @csrf
                                            {{--{{ @method_field('PUT') }}--}}

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{--<label for="incident_desc" class="control-label">Incident Description</label> <br/>--}}
                                                        <textarea id="investigation_desc" class="summernote" name="investigation_desc" cols="200" rows="200" required>{!! old('incident_desc') !!}</textarea>
                                                        @if ($errors->has('investigation_desc'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="text-danger">{{ $errors->first('incident_desc') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-block btn-success">Add</button>
                                                </div>
                                                {{--<div class="col-md-3">--}}
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                                                {{--</div>--}}

                                            </div>

                                        </form>

                                    </div>
                                    {{--<div class="modal-footer">--}}
                                    {{--<div class="row">--}}
                                    {{--<form action="{{ route('cases.destroy', ['case' => $case->id]) }}" method="post">--}}

                                    {{--@csrf--}}
                                    {{--{{ @method_field('DELETE') }}--}}

                                    {{--<button type="submit" class="btn btn-danger">Delete</button>--}}

                                    {{--</form>--}}


                                    {{--</div>--}}

                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>

                        {{--case details--}}
                        <div class="case-details" id="case_details">

                            <div class="row">

                                <div class="col-md-offset-5">
                                    <img src="{{ asset('assets/images/custom/gps.png') }}" class="img-responsive logo_image" height="100px" width="100dp" />

                                </div>

                            </div>
                            <div class="row margin">

                                <div class="col-6 pull-left">
                                    <h4>Complainant Information</h4>
                                    <b>Full Name:</b>  {{ $case->complainant->c_full_name }} <br/>
                                    <b>Gender:</b>  {{ $case->complainant->c_gender }} <br/>
                                    <b>Age:</b>  {{ $case->complainant->c_age }} <br/>
                                    <b>Occupation:</b>  {{ $case->complainant->c_occupation }} <br/>
                                    <b>Phone Number:</b>  {{ $case->c_address->ca_phone_number }} <br/>
                                    <b>Email:</b>  {{ $case->c_address->ca_email }} <br/>
                                    <b>Home Address:</b>  {{ $case->c_address->ca_home_address }} <br/>
                                </div>
                                <div class="col-6 pull-right">

                                    <h4>Case Details</h4>
                                    <b>Case Number: </b> {{ $case->case_number }} <br/>
                                    <b>Date Opened: </b> {{ $case->created_at }} <br/>
                                    <b>Opened By: </b> {{ $case->user->profile->full_name }} <br/>

                                    @if($case->case_status == 1)

                                        <b>Assigned Investigator: </b> {{ $case->assigned_user->profile->full_name }} <br/>

                                    @endif
                                    {{--<b>Opened By: </b> {{ $case->filed_by->full_name }} <br/>--}}

                                </div>

                            </div>
                            <div class="incident_details">
                                <div class="row margin">
                                    <div class="col-6 pull-left">
                                        <h4>Incident Information</h4>
                                        <b>Incident Date:</b>  {{ $case->incident->incident_date }} <br/>
                                        <b>Incident Time:</b>  {{ $case->incident->incident_time }} <br/>
                                        <b>Incident Location:</b>  {{ $case->incident->incident_location }} <br/>
                                    </div>
                                    <div class="col-12 pull-left">
                                        <b>Incident Details:</b>
                                        <p>{!! $case->incident->incident_desc !!}</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="invsetigation-details">

                                <div class="row margin">
                                    <div class="col-12 pull-left">
                                        <h4>Investigation Details</h4>
                                        @if($case->investigation->investigation_desc !== null)
                                            <b>Investigation Date:</b>  {{ $case->investigation->created_at }} <br/>
                                            <b>Investigation Details:</b>
                                            <p>{!! $case->investigation->investigation_desc !!}</p> <br/>

                                            @else
                                            <h4>No investigation done yet</h4>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/printThis.js') }}"></script>

    <script type="application/javascript">

        $(document).ready(function() {
            $('.summernote').summernote({
                fontNames: ['Lato', 'Arial', 'Courier New']
            });

        });
        // print the case detail controller
        $('#printBtn').on("click", function () {
            $('#case_details').printThis({
                base: "https://jasonday.github.io/printThis/"
            });
        });

    </script>


@stop
