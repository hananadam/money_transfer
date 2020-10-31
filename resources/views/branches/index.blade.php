@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Branches',
    'activePage' => 'branches',
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
            @can('create branch')
              <a class="btn btn-primary btn-round text-white pull-right" href="{{route('branches.create')}}">
              {{ __('website.add_branch') }}</a>
            @endcan
            <h4 class="card-title">{{ __('website.branches') }}</h4>
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
                  <th>{{ __('website.agency_name') }}</th>
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.address') }}</th>
                  <th>{{ __('website.location') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>{{ __('website.agency_name') }}</th>
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.address') }}</th>
                  <th>{{ __('website.location') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $item)

                  <tr>
                    <td>{{$item->agency->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>[{{$item->longitude}},{{$item->latitude}}]</td>
                    <td>{{$item->created_at}}</td>

                    <td class="text-right">
                            @can('edit branch')
                              <a type="button" rel="tooltip" class="btn btn-success btn-sm" 
                              href="{{ route('branches.edit', $item->id) }}">{{ __('website.edit') }}</a>
                            @endcan
                            @can('delete branch')
                                <form action="{{ route('branches.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('{{ trans('Are you sure') }}');"
                                      style="">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" rel="tooltip" class="btn btn-sm btn-danger" value="{{ __('website.delete') }}">
                                </form>
                            @endcan
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