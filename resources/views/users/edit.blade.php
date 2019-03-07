@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Edit User
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


@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>UPDATE USER</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">Update User</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Update User: {{ $user->username }}
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <!-- errors -->
                        @if(count($errors) > 0)

                            <ul class="list-group">

                                @foreach($errors->all() as $error)

                                    <li class="list-group-item text-danger">
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>
                            <br>

                    @endif
                        <!--main content-->
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data" id="userForm" class="form-horizontal">
                            <!-- CSRF Token -->
                            @csrf
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-lg-6">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-4 control-label">Full Name *</label>
                                        <div class="col-sm-8">
                                            <input id="full_name" name="full_name" type="text" placeholder="Full Name" class="form-control required" value="{{ $user->profile->full_name }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-4 control-label">Username *</label>
                                        <div class="col-sm-8">
                                            <input id="username" name="username" type="text" placeholder="Username" value="{{ $user->username }}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">Email *</label>
                                        <div class="col-sm-8">
                                            <input id="email" name="email" placeholder="E-mail" type="text" value="{{ $user->email }}" class="form-control required email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number" class="col-sm-4 control-label">Phone Number *</label>
                                        <div class="col-sm-8">
                                            <input id="phone_number" name="phone_number" type="text" placeholder="Phone Number" value="{{ $user->profile->phone_number }}" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-4 control-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input id="password" name="new_password" type="password" placeholder="Password" value="" class="form-control " />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="role" class="col-sm-4 control-label">Role *</label>
                                        <div class="col-sm-8">
                                            <select class="form-control required" name="roles[]" id="role" multiple>
                                                <option value="">Choose role</option>

                                                @foreach($roles as $role)

                                                    <option value="{{ $role->id }}"

                                                            @foreach($userRole as $t)
                                                                @if($role->name == $t)
                                                                 selected
                                                                @endif
                                                            @endforeach

                                                    >{{  $role->name }}</option>

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

                                                    <option value="{{ $rank->id }}"
                                                            @if($user->profile->rank_id == $rank->id)
                                                            selected
                                                            @endif
                                                            >{{ $rank->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="badge" class="col-sm-4 control-label">Badge Number *</label>
                                        <div class="col-sm-8">
                                            <input id="badge" name="badge" type="text" placeholder="Badge Number" value="{{ $user->profile->badge_number }}" class="form-control required" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic" class="col-sm-4 control-label">Profile picture</label>
                                        <div class="col-sm-8">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="{{ asset($user->profile->avatar) }}" alt="profile pic">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                            <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="pic" name="avatar" type="file" class="form-control" />
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
                                        <button type="submit" class="button button-3d button-success button-pill">Update User</button>
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
