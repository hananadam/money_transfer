@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Roles',
    'activePage' => 'roles',
    'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('website.roles') }}</div>

                @can('create Roles')
                    <input type="button" class="btn btn-primary noPrint" style="float:right; margin-top: 20px;"
                                           onclick="window.location.href='{{ route("roles.create") }}'"
                                           value="{{ __('website.add') }}">
                @endcan
            </div>
            <div class="panel-body">
                         
                <!-- <div class="ibox float-e-margins"> -->
                    <div id="tableCont">
                        <div class="ibox-content">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Result" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>{{ __('website.name') }}</th>
                                    <th>{{ __('website.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            @can('view Permissions To Role')
                                                <a class="btn btn-success btn-sm " href="{{ route('rolePermissions.edit', $item->id) }}">{{ __('website.permissions') }}</a>
                                            @endcan
                                            @can('edit Roles')
                                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $item->id) }}">{{ __('website.edit') }}</a>
                                            @endcan
                                            @can('delete Roles')
                                                <form action="{{ route('roles.destroy', $item->id) }}" method="POST"
                                                      onsubmit="return confirm('{{ trans('Are you sure') }}');"
                                                      style="">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn  btn-danger btn-sm" value="{{__('website.delete') }}">
                                                </form>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>    
    </div>
</div>        


@endsection
@section('script')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 5,
  });
  $('.datatable-Result:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection