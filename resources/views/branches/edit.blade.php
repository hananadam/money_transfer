@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Branch',
    'activePage' => 'branches',
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
                        enctype="multipart/form-data" action="{{ route("branches.update", [$item->id]) }}">
                        {{ csrf_field() }}
                           
                          @csrf
                          @method('put')
                          @include('alerts.success')

                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}" readonly required>

                         <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.agency_name') }} </label>
                            <div class="col-md-6">
                                <select name="agency_id" class="form-control" required="">
                                    @foreach(App\Models\Agency::get() as $agency)
                                        <option value="{{ $agency->id }}"
                                                @if($item->agency_id == $agency->id) selected @endif>{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('agency_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agency_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.name') }} </label>
                            <div class="col-md-6">
                                <input name="name" id="name" type="text" class="form-control" value="{{ $item->name }}"
                                       autofocus>

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
                                <input name="address" id="address" type="text" class="form-control" value="{{ $item->address }}" autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <label for="longitude" class="col-md-4 control-label">{{ __('website.longitude') }} </label>
                            <div class="col-md-6">
                                <input name="longitude" id="longitude" type="text" class="form-control"  value="{{ $item->longitude}}" autofocus>

                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="latitude" class="col-md-4 control-label">{{ __('website.latitude') }} </label>
                            <div class="col-md-6">
                                <input name="latitude" id="latitude" type="text" class="form-control"  value="{{ $item->latitude}}" autofocus>

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
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