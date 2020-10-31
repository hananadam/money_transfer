@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create currency',
    'activePage' => 'currency',
    'activeNav' => '',
])

@section('content')

    <div class="panel-header panel-header-sm">
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">{{ __('website.add_company') }}</div> -->

                <div class="panel-body">
                    <form class="form-horizontal" id="campusForm" method="POST" action="{{ route("currency.store") }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.name') }} </label>
                            <div class="col-md-6">
                                <input name="name" id="name" type="text" class="form-control" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="{{ __('website.submit') }}">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
