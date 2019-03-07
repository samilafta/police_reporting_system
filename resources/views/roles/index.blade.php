@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Roles
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
        <h1>Roles</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Roles</a>
            </li>
        </ol>
    </section>
    <section class="content paddingleft_right15">
        <div class="row">
            <a href="{{ route('roles.create') }}" class="pull-right button button-3d button-success button-pill">
                <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                Add New Role
            </a>
        </div>
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Roles List
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
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($roles->count() > 0)

                            @foreach($roles as $role)

                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>

                                        @if(!empty($rolePermissions))

                                            @foreach($rolePermissions as $v)

                                                @if($v->role_id == $role->id)

                                                <label class="label label-success">{{ $v->name }},</label>

                                                @endif

                                            @endforeach

                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{ route('roles.show', ['role' => $role->id]) }}">
                                            <i class="livicon" data-name="info" data-size="24" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                        </a>

                                        @can('role-edit')
                                        <a href="{{ route('roles.edit', ['role' => $role->id]) }}">
                                            <i class="livicon" data-name="edit" data-size="24" data-c="#428BCA" data-hc="#428BCA" data-loop="true" title="edit user"></i>
                                        </a>
                                        @endcan

                                        @can('role-delete')
                                        <a href="#" data-toggle="modal" data-target="#delete_confirm{{ $role->id }}">
                                            <i class="livicon" data-name="trash" data-size="24" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                        </a>
                                        @endcan

                                    </td>
                                </tr>

                                <!-- Modal for showing delete confirmation -->
                                <div class="modal fade" id="delete_confirm{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="user_delete_confirm_title">
                                                    Delete User: {{ $role->name }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this user? This operation is irreversible.
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">

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

                            <tr>No Roles created yet</tr>

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
