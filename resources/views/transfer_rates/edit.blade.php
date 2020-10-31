@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Transfer Rates',
    'activePage' => 'transfer_rates',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">{{ __('website.branches') }}</div> -->

                <div class="panel-body">
                    <form class="form-horizontal" id="campusForm" method="POST"  autocomplete="off"
                        enctype="multipart/form-data" action="{{ route("transfer_rates.update", [$item->id]) }}">
                        {{ csrf_field() }}
                           
                          @csrf
                          @method('put')
                          @include('alerts.success')

                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}" readonly required>

                        <div class="d-flex justify-content-between">

                            <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                                <label for="agency_id" class="col-md-4 control-label">{{ __('website.agency_name') }} </label>
                                <div class="col-md-9">
                                    <select name="agency_id" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Agency..</option>
                                        @foreach(App\Models\Agency::get() as $agency)
                                            <option value="{{ $agency->id }}"
                                                @if($item->agency_id == $agency->id) selected @endif>{{ $agency->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('agency_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agency_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                                <label for="currency_id" class="col-md-4 control-label">{{ __('website.currency_name') }} </label>
                                <div class="col-md-6">
                                    <select name="currency_id" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Currency..</option>
                                        @foreach(App\Models\Currency::get() as $currency)
                                            <option value="{{ $currency->id }}"
                                                @if($item->currency_id == $currency->id) selected @endif>{{ $currency->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('currency_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('currency_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('from_country') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{{ __('website.from_country') }} </label>
                                <div class="col-md-6">
                                    <select name="from_country" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Country..</option>
                                        @foreach(App\Models\Country::get() as $country)
                                            <option value="{{ $country->id }}"
                                                @if($item->from_country == $country->id) selected @endif>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('from_country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('from_country') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('to_country') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{{ __('website.to_country') }} </label>
                                <div class="col-md-6">
                                    <select name="to_country" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Country..</option>
                                        @foreach(App\Models\Country::get() as $country)
                                            <option value="{{ $country->id }}"
                                                @if($item->to_country == $country->id) selected @endif>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('to_country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('to_country') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start_range') ? ' has-error' : '' }}">
                                <label for="start_range" class="col-md-4 control-label">{{ __('website.start_range') }} </label>
                                <div class="col-md-6" >
                                    <input name="start_range" id="start_range" type="number" class="form-control" autofocus style="width:100px;" value="{{$item->amount_start_range}}">

                                    @if ($errors->has('start_range'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_range') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_range') ? ' has-error' : '' }}">
                                <label for="end_range" class="col-md-4 control-label">{{ __('website.end_range') }} </label>
                                <div class="col-md-6" >
                                    <input name="end_range" id="end_range" type="number" class="form-control" autofocus style="width:100px;" value="{{$item->amount_end_range}}">

                                    @if ($errors->has('end_range'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_range') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('transfer_fee') ? ' has-error' : '' }}">
                                <label for="transfer_fee" class="col-md-4 control-label">{{ __('website.TransferFee') }} </label>
                                <div class="col-md-6" >
                                    <input name="transfer_fee" id="transfer_fee" type="number" class="form-control" autofocus style="width:100px;" value="{{$item->transfer_fee}}">

                                    @if ($errors->has('transfer_fee'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('transfer_fee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                  

                      
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="{{ __('website.edit') }}">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection