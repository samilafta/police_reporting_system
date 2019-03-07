@extends('layouts.dashboard')

{{-- page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- header styles--}}
@section('header_styles')

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



    </section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')



@stop
