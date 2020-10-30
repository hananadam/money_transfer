@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="margin-top:10%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('website.Update Room Form') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="buildingForm" method="POST" action="{{url('updateRoom/'.$data['room_code'])}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('room_code') ? ' has-error' : '' }}">
                            <label for="room_code" class="col-md-4 control-label">{{ __('website.Code') }}</label>2
                            <div class="col-md-6">
                                <input type="text" name="room_code" class="form-control" value="{{$data['room_code']}}" readonly required>

                                @if ($errors->has('room_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('campus_code') ? ' has-error' : '' }}">
                            <label for="campus_code" class="col-md-4 control-label">{{ __('website.Campus') }}</label>
                            <div class="col-md-6">
                                <select name="campus_code" class="form-control" onchange="generalAjaxGenerator(this,'building','getCampusBuilding','building_code','building_name_in_english')" required autofocus>
                                    <option value="">{{ __('global.Choose one') }}</option>
                                    @foreach($campuses as $key => $value)
                                        <option value="{{ $value['campus_code'] }}"
                                        @if($data['campus_code'] == $value['campus_code'])
                                             selected 
                                        @endif
                                        >{{ $value['campus_name_in_english'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('campus_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campus_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('building_code') ? ' has-error' : '' }}">
                            <label for="campus_code" class="col-md-4 control-label"> {{__('website.Building')}}</label>
                            <div class="col-md-6">
                                <select name="building_code" id="building_code" class="form-control" required autofocus>
                                    <option value="">Choose one</option>
                                    @foreach($building as $key => $value)
                                        <option value="{{ $value['building_code'] }}"
                                        @if($data['building_code'] == $value['building_code'])
                                             selected 
                                        @endif
                                        >{{ $value['building_name_in_english'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('building_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('building_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room_type') ? ' has-error' : '' }}">
                            <label for="room_type" class="col-md-4 control-label">{{ __('website.Room Type') }}</label>
                            <div class="col-md-6">
                                <select name="room_type" class="form-control" required autofocus>
                                    <option value="">Choose one</option>
                                    @foreach($room_type as $key => $value)
                                        <option value="{{ $value['room_type_code'] }}"
                                        @if($data['room_type'] == $value['room_type_code'])
                                             selected 
                                        @endif
                                        >{{ $value['room_type_name'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('room_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room_name') ? ' has-error' : '' }}">
                            <label for="room_name" class="col-md-4 control-label">{{ __('website.Room Name') }} </label>
                            <div class="col-md-6">
                                <input name="room_name" type="text" class="form-control" value="{{ $data['room_name'] }}" required autofocus>

                                @if ($errors->has('room_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room_normal_maximum_capacity') ? ' has-error' : '' }}">
                            <label for="room_normal_maximum_capacity" class="col-md-4 control-label">{{ __('website.Normal Maximum Capacity') }}</label>
                            <div class="col-md-6">
                                <input name="room_normal_maximum_capacity" type="number" class="form-control" value="{{ $data['room_normal_maximum_capacity'] }}" required autofocus>

                                @if ($errors->has('room_normal_maximum_capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_normal_maximum_capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room_exam_maximum_capacity') ? ' has-error' : '' }}">
                            <label for="room_exam_maximum_capacity" class="col-md-4 control-label">{{ __('website.Exam Maximum Capacity') }}</label>
                            <div class="col-md-6">
                                <input name="room_exam_maximum_capacity" type="number" class="form-control" value="{{ $data['room_exam_maximum_capacity'] }}" required autofocus>

                                @if ($errors->has('room_exam_maximum_capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_exam_maximum_capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_of_sugested_procters') ? ' has-error' : '' }}">
                            <label for="number_of_sugested_procters" class="col-md-4 control-label">{{ __('website.Needed Proctors') }}</label>
                            <div class="col-md-6">
                                <input name="number_of_sugested_procters" type="number" class="form-control" value="{{ $data['number_of_sugested_procters'] }}" required autofocus>

                                @if ($errors->has('number_of_sugested_procters'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_sugested_procters') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('floor_number') ? ' has-error' : '' }}">
                            <label for="floor_number" class="col-md-4 control-label">{{ __('website.Floor') }}</label>
                            <div class="col-md-6">
                                <input name="floor_number" type="number" class="form-control" value="{{ $data['floor_number'] }}" required autofocus>

                                @if ($errors->has('floor_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('floor_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 custom-submit-ar">
                                <input type="submit" class="btn btn-primary" value="{{__('global.submit')}}">
                                <input type="button" class="btn btn-primary" onclick="confirmCancel(() => { window.location.href='{{ url('/room') }}' });" value="{{__('global.back')}}">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection