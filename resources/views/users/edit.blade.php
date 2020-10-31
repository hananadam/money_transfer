@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit User',
    'activePage' => 'users',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">{{ __('website.users') }}</div> -->

                <div class="panel-body">
                    <form class="form-horizontal" id="campusForm" method="POST"  autocomplete="off"
                        enctype="multipart/form-data" action="{{ route("users.update", [$item->id]) }}">
                        {{ csrf_field() }}
                           
                          @csrf
                          @method('put')
                          @include('alerts.success')

                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}" readonly required>


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


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.password') }} </label>
                            <div class="col-md-6">
                                <input name="password" id="name" type="password" class="form-control" autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('website.role') }} </label>
                            <div class="col-md-6">
                                <select name="role_id" class="form-control" required="">
                                    @foreach(\Spatie\Permission\Models\Role::where('id', '!=', 1)->get() as $role)
                                        <option value="{{ $role->id }}"
                                                @if($item->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
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