@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('website.Rooms') }}</div>
                <div class="panel-body">
                    <div id="tableCont">
                        @include('partials.part_table')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection