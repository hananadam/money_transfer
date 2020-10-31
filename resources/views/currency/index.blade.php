@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Currency',
    'activePage' => 'currency',
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
            @can('create currency')
              <a class="btn btn-primary btn-round text-white pull-right" href="{{route('currency.create')}}">
              {{ __('website.add_currency') }}</a>
            @endcan  
            <h4 class="card-title">{{ __('website.currency') }}</h4>
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
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>{{ __('website.name') }}</th>
                  <th>{{ __('website.date') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $item)

                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>

                    <td class="text-right">
                        @can('edit currency')
                          <a type="button" rel="tooltip" class="btn btn-success btn-sm" 
                          href="{{ route('currency.edit', $item->id) }}">{{ __('website.edit') }}</a>
                        @endcan
                        @can('delete currency')
                            <form action="{{ route('currency.destroy', $item->id) }}" method="POST"
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