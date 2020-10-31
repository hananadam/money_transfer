@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Agencies',
    'activePage' => 'agencies',
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
            @can('create agency')
              <a class="btn btn-primary btn-round text-white pull-right" href="{{route('agencies.create')}}">
              {{ __('website.add_agency') }}</a>
            @endcan  
            <h4 class="card-title">{{ __('website.agencies') }}</h4>
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
                  <th>{{ __('website.company_name') }}</th>
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.address') }}</th>
                  <th>{{ __('website.website') }}</th>
                  <th>{{ __('website.email') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>{{ __('website.company_name') }}</th>
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.address') }}</th>
                  <th>{{ __('website.website') }}</th>
                  <th>{{ __('website.email') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $item)

                  <tr>
                    <td>{{$item->company->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->website}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>

                    <td class="text-right">
                            @can('edit agency')<a type="button" rel="tooltip" class="btn btn-success btn-sm" 
                            href="{{ route('agencies.edit', $item->id) }}">{{ __('website.edit') }}</a>
                            @endcan
                            @can('delete agency')
                                <form action="{{ route('agencies.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('{{ trans('Are you sure') }}');"
                                      style="">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" rel="tooltip" class="btn btn-sm btn-danger" value="{{ __('website.delete') }}">
                                </form>@endcan
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