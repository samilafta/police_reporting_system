@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Reports
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    {{--<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />


@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>Reports</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            {{--<li>--}}
            {{--<a href="#">Reports</a>--}}
            {{--</li>--}}
            <li class="active">Reports</li>
        </ol>
    </section>
    <section class="content">

        {{--general reports--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="doc-landscape" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            General Reports
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>

                    <div class="panel-body">

                        <div class="general-reports">

                            <div class="text-left">

                                <ul class="list-inline">

                                    <li>
                                        <a href="{{ route('reports.general', ['id' => 1]) }}" class="button button-3d button-primary button-rounded">Today</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reports.general', ['id' => 2]) }}" class="button button-3d button-primary button-rounded">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reports.general', ['id' => 3]) }}" class="button button-3d button-primary button-rounded">Last Week</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reports.general', ['id' => 4]) }}" class="button button-3d button-primary button-rounded">Last Month</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reports.general', ['id' => 5]) }}" class="button button-3d button-primary button-rounded">Last Year</a>
                                    </li>


                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        {{--custom reports--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="doc-landscape" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Custom Reports
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <div class="custom-reports">

                            {{--<h4>Custom Reports</h4>--}}

                            <form id="reportForm" method="post" action="{{ route('reports.custom') }}">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="from_date" class="control-label">From</label>
                                                <input id="from_date" name="from_date" type="text" value="{!! old('from_date') !!}" class="form-control">
                                                @if ($errors->has('from_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger">{{ $errors->first('from_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="to_date" class="control-label">To</label>
                                                <input id="to_date" name="to_date" type="text" value="{!! old('to_date') !!}" class="form-control">
                                                @if ($errors->has('to_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger">{{ $errors->first('to_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Generate Report</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

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
    <script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>


@stop
