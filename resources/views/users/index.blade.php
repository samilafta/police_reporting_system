@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Users
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />

@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>Users</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">Users List</li>
        </ol>
    </section>
    <section class="content paddingleft_right15">
        <div class="row">
            <a href="{{ route('users.create') }}" class="pull-right button button-3d button-success button-pill">
                <i class="livicon" data-name="user-add" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                Add User
            </a>
        </div>
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Users List
                    </h4>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <br />
                <div class="panel-body">
                    <table class="table table-bordered " id="table">
                        <thead>
                        <tr class="filters">
                            <th>Full Name</th>
                            <th>Rank</th>
                            <th>Badge No.</th>
                            <th>
                                User E-mail
                            </th>
                            <th>Phone Number</th>
                            <th>Roles</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count() > 0)

                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $user->profile->full_name }}</td>
                                    <td>
                                        @foreach($ranks as $r)
                                            @if($user->profile->rank_id == $r->id)
                                                {{ $r->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $user->profile->badge_number }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile->phone_number }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                    <td>
                                        {{--<a href="{{ route('users.show', ['user' => $user->id]) }}">--}}
                                            {{--<i class="livicon" data-name="info" data-size="24" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>--}}
                                        {{--</a>--}}
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                            <i class="livicon" data-name="edit" data-size="24" data-c="#428BCA" data-hc="#428BCA" data-loop="true" title="edit user"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#delete_confirm{{ $user->id }}">
                                            <i class="livicon" data-name="user-remove" data-size="24" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal for showing delete confirmation -->
                                <div class="modal fade" id="delete_confirm{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="user_delete_confirm_title">
                                                    Delete User: {{ $user->username }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this user? This operation is irreversible.
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">

                                                        @csrf
                                                        {{ @method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger">Delete</button>

                                                    </form>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        @else

                            <tr>No Users created yet</tr>

                        @endif

                        </tbody>
                    </table>
                    </div>
            </div>
        </div>


    </section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/scrollto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/buttons.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        });
    </script>

@stop
