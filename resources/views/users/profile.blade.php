@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    My Profile
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css" />

@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>My Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">User</a>
            </li>
            <li class="active">My Profile</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i> User Profile</a>
                    </li>

                </ul>
                <div class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            User Profile
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-file">
                                                        <img src="{{ asset($set->profile->avatar) }}" width="200" class="img-responsive" height="150" alt="riot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">
                                                        <tr>
                                                            <td>User Name</td>
                                                            <td>
                                                                {{ $set->username }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>E-mail</td>
                                                            <td>
                                                                {{ $set->email }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number</td>
                                                            <td>
                                                                {{ $set->profile->phone_number }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>
                                                                Admin
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rank</td>
                                                            <td>
                                                                Admin
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Badge Number</td>
                                                            <td>
                                                                {{ $set->profile->badge_number }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Created At</td>
                                                            <td>
                                                                {{ $set->created_at }}
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>

                                                <a href="{{ route('users.edit', ['user' => $set->id]) }}" class="btn btn-primary float-right">Edit Profile</a>

                                            </div>
                                        </div>
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

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jquery-mockjax/js/jquery.mockjax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/x-editable/js/bootstrap-editable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/user_profile.js') }}" type="text/javascript"></script>


@stop
