@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Add User
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/wizard.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" type="text/css">


@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>ADD NEW USER</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">Add User</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Add New User
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!-- errors -->
                        <!--main content-->
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" id="userForm" class="form-horizontal">
                            <!-- CSRF Token -->
                            @csrf
                            {{method_field('POST')}}

                            <div class="row">
                                <div class="col-lg-6">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-4 control-label">Full Name *</label>
                                        <div class="col-sm-8">
                                            <input id="full_name" name="full_name" type="text" placeholder="Full Name" class="form-control required" value="{!! old('full_name') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-4 control-label">Username *</label>
                                        <div class="col-sm-8">
                                            <input id="username" name="username" type="text" placeholder="Username" value="{!! old('username') !!}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">Email *</label>
                                        <div class="col-sm-8">
                                            <input id="email" name="email" placeholder="E-mail" type="text" value="{!! old('email') !!}" class="form-control required email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number" class="col-sm-4 control-label">Phone Number *</label>
                                        <div class="col-sm-8">
                                            <input id="phone_number" name="phone_number" type="text" placeholder="Phone Number" value="{!! old('phone_number') !!}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-4 control-label">Password *</label>
                                        <div class="col-sm-8">
                                            <input id="password" name="password" type="password" placeholder="Password" value="{!! old('password') !!}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirm" class="col-sm-4 control-label">Confirm Password *</label>
                                        <div class="col-sm-8">
                                            <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password" value="{!! old('password_confirm') !!}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="role" class="col-sm-4 control-label">Role *</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="roles[]" id="role" multiple>
                                                <option value="">Choose role</option>

                                                @foreach($roles as $role)

                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group required">
                                        <label for="role" class="col-sm-4 control-label">Rank *</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="rank" id="role">
                                                <option value="">Choose rank</option>

                                                @foreach($ranks as $rank)

                                                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="badge" class="col-sm-4 control-label">Badge Number *</label>
                                        <div class="col-sm-8">
                                            <input id="badge" name="badge" type="text" placeholder="Badge Number" value="{!! old('badge') !!}" class="form-control required" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic" class="col-sm-4 control-label">Profile picture</label>
                                        <div class="col-sm-8">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="http://placehold.it/200x200" alt="profile pic">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                            <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="pic" name="avatar" type="file" class="form-control" value="{!! old('avatar') !!}" required/>
                                                            </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <button type="submit" class="button button-3d button-success button-pill">Add User</button>
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
    <script src="{{ asset('assets/js/pages/custom_elements.js') }}" type="text/javascript"></script>

    <script type="application/javascript">
        $("#role").select2({
            theme:"bootstrap",
            placeholder:"",
            width: '100%'
        });
    </script>

@stop
