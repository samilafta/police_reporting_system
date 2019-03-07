@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Custom Report
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
        <h1>Custom Reports</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('reports.index') }}">Reports</a>
            </li>
            <li class="active">General Report</li>
        </ol>
    </section>
    <section class="content paddingleft_right15">
        <div class="row">
            <a href="{{ route('reports.index') }}" class="pull-left button button-3d button-danger button-pill">
                <i class="livicon" data-name="arrow-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                Go Back
            </a>
        </div>
        <div class="row">

            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="doc-landscape" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Report From {{ $from_date }} To {{ $to_date }}
                    </h4>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <br />
                <div class="panel-body">

                    @if($cases->count() > 0)

                        <div class="row text-center">
                            <a href="{{ route('reports.excelCustom', ['from' => $from_date, 'to' => $to_date]) }}" class="button button-pill button-success">
                                Excel
                            </a>
                            <button class="button button-pill button-info" id="genPdf">
                                Pdf
                            </button>

                        </div>

                        <table class="table table-bordered " id="table">
                            <thead>
                            <tr class="filters">
                                <th>Case No.</th>
                                <th>Complainant Name</th>
                                <th>Assigned To</th>
                                <th>Filed By</th>
                                <th>Date Filed</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

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

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    @else

                        <h4>No Cases as at this date.</h4>

                    @endif


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
    <script type="text/javascript" src="{{ asset('assets/js/pages/printThis.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#table').dataTable();

        });

        $('#genPdf').on("click", function () {
            $('#table').printThis({
                base: "https://jasonday.github.io/printThis/"
            });
        });

    </script>

@stop
