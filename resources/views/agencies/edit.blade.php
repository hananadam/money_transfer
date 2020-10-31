@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Agency',
    'activePage' => 'agencies',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">{{ __('website.agencies') }}</div> -->

                <div class="panel-body">
                    <form class="form-horizontal" id="campusForm" method="POST"  autocomplete="off"
                        enctype="multipart/form-data" action="{{ route("agencies.update", [$item->id]) }}">
                        {{ csrf_field() }}
                           
                          @csrf
                          @method('put')
                          @include('alerts.success')

                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}" readonly required>

                         <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.company_name') }} </label>
                            <div class="col-md-6">
                                <select name="company_id" class="form-control" required="">
                                    @foreach(App\Models\Company::get() as $comp)
                                        <option value="{{ $comp->id }}"
                                                @if($item->company_id == $comp->id) selected @endif>{{ $comp->name }}</option>
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

                         <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">{{ __('website.website') }} </label>
                            <div class="col-md-6">
                                <input name="website" id="website" type="text" class="form-control"  value="{{ $item->website}}" autofocus>

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
                                <input name="email" id="name" type="email" class="form-control"
                                       value="{{ $item->email }}" autofocus>

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
                                <input type="submit" class="btn btn-primary" value="{{ __('website.edit') }}">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection