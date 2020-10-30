@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('website.roles') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="campusForm" method="POST"
                          action="{{ route('roles.update', [$item->id]) }}">
                        {{ csrf_field() }}

                        {{method_field('POST')}}
                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}" readonly required>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.name') }} </label>
                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control" value="{{ $item->name }}" required
                                       autofocus>

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
                                <input type="submit" class="btn btn-primary" value="{{ __('website.edit') }}">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection