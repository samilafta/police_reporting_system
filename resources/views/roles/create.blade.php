@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Add Role
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />


@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>ADD NEW ROLE</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Roles</a>
            </li>
            <li class="active">Add role</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Add New Role
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!-- errors -->
                        <!--main content-->
                        <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data" id="userForm" class="form-horizontal">
                            <!-- CSRF Token -->
                            @csrf

                            {{ method_field('POST') }}

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-3 control-label"> Name *</label>
                                        <div class="col-sm-8">
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control required" value="{!! old('name') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="permission" class="col-sm-3">Permission:</label>
                                        <div class="col-sm-8">
                                            @foreach($permission as $value)
                                                <div class="checkbox">

                                                    <input id="permission" type="checkbox" class="custom-checkbox" name="permission[]" value="{{ $value->id }}" />&nbsp;  {{ $value->name }}

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <button type="submit" class="button button-3d button-success button-pill">Add Role</button>
                                    </div>
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
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/scrollto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/buttons.js') }}"></script>


@stop
