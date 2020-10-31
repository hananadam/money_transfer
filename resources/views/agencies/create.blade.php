@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create Agency',
    'activePage' => 'agencies',
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
                    <form class="form-horizontal" id="campusForm" method="POST" action="{{ route("agencies.store") }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                            <label for="company_id" class="col-md-4 control-label">{{ __('website.company_name') }} </label>
                            <div class="col-md-6">
                                <select name="company_id" class="form-control" required="">
                                    <option value="" selected disabled>Select the Company..</option>
                                    @foreach(App\Models\Company::get() as $comp)
                                        <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('company_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">{{ __('website.address') }} </label>
                            <div class="col-md-6">
                                <input name="address" id="address" type="text" class="form-control" autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">{{ __('website.website') }} </label>
                            <div class="col-md-6">
                                <input name="website" id="website" type="text" class="form-control" autofocus>

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.email') }} </label>
                            <div class="col-md-6">
                                <input name="email" id="name" type="email" class="form-control" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
