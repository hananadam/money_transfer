@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Users',
    'activePage' => 'users',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{route('users.create')}}">Add user</a>
            <h4 class="card-title">Users</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <!-- <th>Profile</th> -->
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.email') }}</th>
                  <th>{{ __('website.role') }}</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <!-- <th>Profile</th> -->
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.email') }}</th>
                  <th>{{ __('website.role') }}</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $item)

                  <tr>
                   <!--  <td>
                      <span class="avatar avatar-sm rounded-circle">
                        <img src="{{asset('assets')}}/img/default-avatar.png" alt="" style="max-width: 80px; border-radiu: 100px">
                      </span>
                    </td> -->
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role_id ? $item->Role->name : '-'}}</td>
                    <td>{{$item->created_at}}</td>

                    <td class="text-right">
                        @if($item->id != 1)
                            @can('edit Users')<a type="button" rel="tooltip" class="btn btn-success btn-sm" 
                            href="{{ route('users.edit', $item->id) }}">{{ __('website.edit') }}</a>
                            @endcan
                            @can('delete Users')
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('{{ trans('Are you sure') }}');"
                                      style="">
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" rel="tooltip" class="btn btn-sm btn-danger" value="{{ __('website.delete') }}">
                                </form>@endcan
                        @else - @endif
                    </td>

                   
                  </tr>
                @endforeach

              </tbody>

              

            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
  
    <!-- end row -->
  </div>
  
 @endsection