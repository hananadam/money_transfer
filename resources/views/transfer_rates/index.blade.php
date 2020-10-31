@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Transfer Rates',
    'activePage' => 'transfer_rates',
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
            @can('create transfer_rates')
              <a class="btn btn-primary btn-round text-white pull-right" href="{{route('transfer_rates.create')}}">
              {{ __('website.add') }}</a>
            @endcan
            <h4 class="card-title">{{ __('website.TransferFee') }}</h4>
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
                  <th>{{ __('website.currency') }}</th>
                  <th>{{ __('website.from_country') }}</th>
                  <th>{{ __('website.to_country') }}</th>
                  <th>{{ __('website.start_range') }}</th>
                  <th>{{ __('website.end_range') }}</th>
                  <th>{{ __('website.TransferFee') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>{{ __('website.agency_name') }}</th>
                  <th>{{ __('website.currency') }}</th>
                  <th>{{ __('website.from_country') }}</th>
                  <th>{{ __('website.to_country') }}</th>
                  <th>{{ __('website.start_range') }}</th>
                  <th>{{ __('website.end_range') }}</th>
                  <th>{{ __('website.TransferFee') }}</th>
                  <th class="disabled-sorting text-right">{{ __('website.actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $item)

                  <tr>
                    <td>{{$item->agency->name}}</td>
                    <td>{{$item->currency->name}}</td>
                    <td>{{$item->from_country}}</td>
                    <td>{{$item->to_country}}</td>
                    <td>{{$item->amount_start_range}}</td>
                    <td>{{$item->amount_end_range}}</td>
                    <td>{{$item->transfer_fee}}</td>

                    <td class="text-right">
                            @can('edit transfer_rates')
                              <a type="button" rel="tooltip" class="btn btn-success btn-sm" 
                              href="{{ route('transfer_rates.edit', $item->id) }}">{{ __('website.edit') }}</a>
                            @endcan
                            @can('delete transfer_rates')
                                <form action="{{ route('transfer_rates.destroy', $item->id) }}" method="POST"
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