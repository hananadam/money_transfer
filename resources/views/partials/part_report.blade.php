<input type="button" class="btn btn-success noPrint" style="float:left;" onclick="printReport()" value="{{__('global.Print Report')}}"></div>
<?php 
    foreach ($data as $key => $value) {    
        $currKey = $value;
        break;                    
    }
?>
<style>
    th {
        padding-left: 30px !important;
    }
    td {
        padding-right: 30px !important;
    }
</style>
<table id="reportTable" class="table table-responsive table-striped table-bordered no-footer printArea">
    @foreach($data as $key => $value)
            <tr>
                <th> {{__('website.'.$key)}} </th>
                <td>
                    @if(!is_array($value) && strpos($value, 'data:image') !== false)
                        <img src="{{ $value }}" style="height:70px;">
                    @elseif($key == 'Document')
                        <a class="noPrint btn" href="{{ url('/storage/app/'.$value) }}" download>{{__('global.Download Document')}}</a>
                    @else
                        @if (is_array($value))    
                            <ul>
                            @foreach($value as $subKey => $subValue)
                                <li>{{ $subValue }}</li>
                            @endforeach
                            </ul>
                        @else
                            {{ $value }}
                        @endif
                    @endif
                </td>
            </tr>
    @endforeach
</table>
<div class="ln_solid"></div>
@if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
    <div class="noPrint pull-right" style="padding-right: 10px; padding-bottom: 12px;">
        @if(isset($urls['update']))
            <input type="button" class="btn btn-primary noPrint" value="{{__('global.update')}}" onclick="window.location.href='{{ $urls['update'] }}/{{ $currKey }}'">
        @endif
        @if(isset($urls['delete']))
            <input type="button" class="btn btn-primary noPrint" value="{{__('global.delete')}}" onclick="confirmDelete(() => { window.location.href='{{ $urls['delete'] }}/{{ $currKey }}' });">
        @endif
        @if(isset($urls['back']))
        <input type="button" class="btn btn-primary" onclick="window.location.href='{{ $urls['back'] }}'" value="{{__('global.back')}}">
        @endif
    </div>
    <div class="clear"></div>
@endif

<script>
function printReport() {
    window.print();
}
</script>