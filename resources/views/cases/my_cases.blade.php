@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Cases
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
        <h1>Cases</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('cases.index') }}">Cases</a>
            </li>
            <li class="active">Cases List</li>
        </ol>
    </section>
    <section class="content paddingleft_right15">
        {{--<div class="row">--}}
            {{--<a href="{{ route('cases.create') }}" class="pull-right button button-3d button-success button-pill">--}}
                {{--<i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>--}}
                {{--Open New Case--}}
            {{--</a>--}}
        {{--</div>--}}
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Case List
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
                            <th>Case No.</th>
                            <th>Complainant Name</th>
                            <th>Assigned To</th>
                            <th>Filed By</th>
                            <th>Date Filed</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($cases->count() > 0)

                            @foreach($cases as $case)

                                <tr>
                                   <td>{{ $case->case_number }}</td>
                                   <td>{{ $case->complainant->c_full_name }}</td>
                                   <td>
                                       @if($case->investigator_id == null)

                                           <label class="label label-info">Not Assigned</label>

                                       @else

                                           {{ $case->assigned_user->profile->full_name }}

                                       @endif

                                   </td>
                                   <td>

                                        {{ $case->user->profile->full_name }}

                                   </td>
                                    <td>
                                        {{ $case->created_at }}
                                    </td>
                                    <td>
                                        {{--{{ $case->case_status }}--}}
                                        @if($case->case_status == 0)
                                            <label class="label label-primary">Case Opened</label>
                                        @elseif($case->case_status == 1)
                                            <label class="label label-warning">Under Investigation</label>
                                        @elseif($case->case_status == 2)
                                            <label class="label label-success">Case Closed</label>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('cases.show', ['case' => $case->id]) }}">
                                        <i class="livicon" data-name="info" data-size="24" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view case"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal for showing delete confirmation -->
                                <div class="modal fade" id="delete_confirm{{ $case->id }}" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">[close]</button>
                                                <h4 class="modal-title" id="user_delete_confirm_title">
                                                    Delete Case: {{ $case->case_number }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this Case? This operation is irreversible.
                                                <div class="row">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                                                    <form action="{{ route('cases.destroy', ['case' => $case->id]) }}" method="post">

                                                        @csrf
                                                        {{ @method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger pull-right">Delete</button>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        @else

                            <tr>No Cases yet</tr>

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
