@if (isset($urls['add']))
    @can('create faculty')

        <input type="button" class="btn btn-primary noPrint" style="float:right;" onclick="window.location.href='{{ $urls['add'] }}'" value="{{ __('global.add_new_record') }}">
    @endcan
@endif
@if (count($data) > 0)
<input type="button" class="btn btn-success noPrint" style="float:left;" onclick="printReport()" value="{{ __('global.print_table') }}">
<table id="reportTable" class="table table-responsive table-striped table-bordered table-hover no-footer printArea">
    <thead>
        <tr>
            @foreach ($data[0] as $key => $value)
                @if($key == "Document")
                    <th class="noPrint">{{ $key }}</th>
                @elseif($key != "Code" && $key != "Id")
                    <th>{{__('website.'.$key) }}</th>
                @endif
            @endforeach
            @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
                <th class="noPrint">{{ __('global.actions') }}</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $v)
            <?php 
                foreach ($v as $key => $value) {
                    $currKey = $value;
                    break;                    
                }
            ?>
            <tr>
            @foreach ($v as $key => $value)
                @if(!is_array($value) && strpos($value, 'data:image') !== false)
                    <td><img src="{{ $value }}" style="height:70px;"></td>
                @elseif($key == 'Document')
                    <td class="noPrint"><a class="btn" href="{{ url('/storage/app/'.$value) }}" download>{{ __('global.download_document') }}</a></td>
                @else
                    @if ($key != "Code" && $key != "Id" )
                        @if (is_array($value))
                            <td>
                                <ul>
                                @foreach($value as $subKey => $subValue)
                                    <li>{{ $subValue }}</li>
                                @endforeach
                                </ul>
                            </td>
                        @else
                            <td>{{ $value }}</td> 
                        @endif
                    @endif
                @endif
            @endforeach

            @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
                <td class="noPrint">
                    @if(isset($urls['show']))
                        <input type="button" class="btn btn-primary noPrint" value="{{ __('global.show') }}" onclick="window.location.href='{{ $urls['show'] }}/{{ $currKey }}'">
                    @endif
                    @if(isset($urls['update']))
                        @can('edit faculty')
                            <input type="button" class="btn btn-primary noPrint" value="{{ __('global.update') }}" onclick="window.location.href='{{ $urls['update'] }}/{{ $currKey }}'">
                        @endcan
                    @endif
                    @if(isset($urls['delete']))
                        @can('delete faculty')
                            <input type="button" class="btn btn-primary noPrint" value="{{ __('global.delete') }}" onclick="confirmDelete(() => { window.location.href='{{ $urls['delete'] }}/{{ $currKey }}' });">
                        @endif
                    @endif
                </td>
            @endif
            <tr>
                    
        @endforeach
    </tbody>
</table>
    
<script>
function printReport() {
    window.print();
}
</script>

@else
    <br>
    <br>
<div>{{ __('global.no_records_found') }}</div>
@endif