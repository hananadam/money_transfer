@if (isset($urls['add']))
    <input type="button" class="btn btn-primary noPrint" style="float:right;" onclick="window.location.href='{{ $urls['add'] }}'" value="Add New Record">
@endif
@if (count($data) > 0)
<input type="button" class="btn btn-success noPrint" style="float:left;" onclick="printReport()" value="Print Table">
<table id="reportTable" class="table table-responsive table-striped table-bordered table-hover no-footer printArea">
    <thead>
        <tr>
            <th colspan="2">Researchers Bio Data</th>
            @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
                <th class="noPrint">Actions</th>
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
                @if(strpos($value, 'data:image') !== false || strpos($key, 'photo') !== false || strpos($key, 'Photo') !== false)
                    @if ($value == null)
                        <td style="vertical-align:middle"><img src="{{ url('/public/images/noimg.png') }}" style="display:block;margin:0 auto;height:70px;"></td>
                    @else
                        <td style="vertical-align:middle"><img src="{{ $value }}" style="display:block;margin:0 auto;height:70px;"></td>
                    @endif
                    <?php break; ?>
                @endif
            @endforeach
                <td>
                    <table class="clearTable">   
                    @foreach ($v as $key => $value)
                        @if(strpos($value, 'data:image') !== false || strpos($key, 'photo') !== false || strpos($key, 'Photo') !== false)
                            <?php continue; ?>
                        @endif
                        <tr>
                            @if($key == 'Document')
                                <th>{{ $key }}</th>
                                <td><a class="btn noPrint" href="{{ url('/storage/app/'.$value) }}" download>Download Document</a></td>
                            @else
                                @if($key != "Code" && $key != "Id")
                                    <th>{{ $key }}:</th><td style="padding-left:10px;">{{ $value }}</td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                    </table>
                </td>
            @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
                <td class="noPrint">
                    @if(isset($urls['show']))
                        <input type="button" class="btn btn-primary" value="Show" onclick="window.location.href='{{ $urls['show'] }}/{{ $currKey }}'">
                    @endif
                    @if(isset($urls['update']))
                        <input type="button" class="btn btn-primary" value="Update" onclick="window.location.href='{{ $urls['update'] }}/{{ $currKey }}'">
                    @endif
                    @if(isset($urls['delete']))
                        <input type="button" class="btn btn-primary" value="Delete" onclick="confirmDelete(() => { window.location.href='{{ $urls['delete'] }}/{{ $currKey }}' });">
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
<div>No Records Found</div>
@endif