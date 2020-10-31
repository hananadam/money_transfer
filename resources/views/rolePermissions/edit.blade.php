@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Roles Permissions',
    'activePage' => 'roles',
    'activeNav' => '',
])

@section('content')

    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('website.roles permissions') }}</div>

                <div class="panel-body">
                    @foreach($data as $item)
                        <p class="col-md-2" style="background-color:#a7e8e4;padding:5px;margin:5px">{{$item->name}}</p>
                    @endforeach
                    <form class="form-horizontal" id="campusForm" method="POST"
                          action="{{ route('rolePermissions.update', [$id]) }}">
                        {{ csrf_field() }}

                        {{method_field('POST')}}
                        <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.permissions') }} </label>
                            <div class="col-md-6">
                                <select name="permissions[]" id="permissions" class="form-control selectpicker"
                                        data-live-search="true" data-actions-box="true" multiple>
                                    @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                                        <option value="{{ $permission->id }}"
                                                @if(in_array($permission->id, $data->pluck('id')->toArray())) selected @endif>{{ $permission->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('permission_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permission_id') }}</strong>
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