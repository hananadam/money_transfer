@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create Transfer Rete',
    'activePage' => 'transfer_rates',
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
                    <form class="form-horizontal" id="form" method="POST" action="{{route("transfer_rates.store")}}">
                        {{ csrf_field() }}
                        <div class="d-flex justify-content-between" id="record">

                            <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                                <label for="agency_id" class="col-md-4 control-label">{{ __('website.agency_name') }} </label>
                                <div class="col-md-9">
                                    <select name="agency_id[]" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Agency..</option>
                                        @foreach(App\Models\Agency::get() as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
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
                                    <select name="currency_id[]" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Currency..</option>
                                        @foreach(App\Models\Currency::get() as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
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
                                    <select name="from_country[]" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Country..</option>
                                        @foreach(App\Models\Country::get() as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
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
                                    <select name="to_country[]" class="form-control" required="" style="width:150px;">
                                        <option value="" selected disabled>Select Country..</option>
                                        @foreach(App\Models\Country::get() as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
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
                                <div class="col-md-3" >
                                    <input name="start_range[]" id="start_range" type="number" class="form-control" autofocus style="width:100px;">

                                    @if ($errors->has('start_range'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_range') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_range') ? ' has-error' : '' }}">
                                <label for="start_range" class="col-md-4 control-label">{{ __('website.end_range') }} </label>
                                <div class="col-md-3" >
                                    <input name="end_range[]" id="end_range" type="number" class="form-control" autofocus style="width:100px;">

                                    @if ($errors->has('end_range'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_range') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('transfer_fee') ? ' has-error' : '' }}">
                                <label for="transfer_fee" class="col-md-4 control-label">{{ __('website.TransferFee') }} </label>
                                <div class="col-md-3" >
                                    <input name="transfer_fee[]" id="transfer_fee" type="number" class="form-control" autofocus style="width:100px;">

                                    @if ($errors->has('transfer_fee'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('transfer_fee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm" id="add_new" style="margin-top: 50px;">+</button>
                            </div>

                            <div class="form-group" >
                                <button type="button" class="btn btn-danger btn-sm" id="remove" style="margin-top: 50px;">-</button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
   
$(document).ready(function (){
    $('#add_new').click(function (){
    // alert('ddd'); 
        var ele = $(this).closest('#record').clone(true);
        $(this).closest('#record').after(ele);
    
    })

   
    $('#remove').click(function (){
        var last=$('#record').length;
        // if(last!=1){
            $(this).closest('#record').remove();
        // }
        // $(this).closest('#record').after(ele);
    
    })
  
  })




</script>

