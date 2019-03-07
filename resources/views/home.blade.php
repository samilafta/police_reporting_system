@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />

@stop

{{-- page body--}}
@section('dashboard')

    <section class="content-header">
        <h1>WELCOME TO THE DASHBOARD</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="#">Pages</a>--}}
            {{--</li>--}}
            {{--<li class="active">Blank page</li>--}}
        </ol>
    </section>
    <section class="content">

        {{--total cases and users--}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <h5>Today's Cases</h5>
                                    <div class="number" id="myTargetElement2">{{ $todays_cases }}</div>
                                </div>
                                <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <h5>Today's Users</h5>
                                    <div class="number" id="myTargetElement3">{{ $todays_users }}</div>
                                </div>
                                <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <h5>Total Cases</h5>
                                    <div class="number" id="myTargetElement1">{{ $cases_count }}</div>
                                </div>
                                <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <h5>Registered Users</h5>
                                    <div class="number" id="myTargetElement4">{{ $users_count }}</div>
                                </div>
                                <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--case statuses--}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Opened Cases</span>
                                    <div class="number" id="myTargetElement2">{{ $opened_cases }}</div>
                                </div>
                                <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Cases Under Investigation</span>
                                    <div class="number" id="myTargetElement3">{{ $investigated_cases }}</div>
                                </div>
                                <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Closed Cases</span>
                                    <div class="number" id="myTargetElement1">{{ $closed_cases }}</div>
                                </div>
                                <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
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

    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>


@stop
