<input type="button" class="btn btn-success noPrint" style="float:left;" onclick="printReport()" value="{{__('global.Print Report')}}"></div>
<style>
    th {
        padding-left: 30px !important;
    }
    td {
        padding-right: 30px !important;
    }
</style>
<table id="reportTable" class="table table-responsive table-striped table-bordered no-footer printArea">
    <tr>
        <th></th>
    @foreach($schedulePeriods as $ind => $value)
        <th>{{$value}}</th>
    @endforeach
    </tr>
    @foreach($days as $dInd => $day)
        <tr>
            <th>{{ $day }}</th>
        @foreach($schedulePeriods as $pInd => $value)
            <?php $etd = true;?>
            @if(isset($data))   
                @foreach($data as $ind => $row)
                    @if($row['day'] != $day)
                        @continue
                    @endif
                    @if($row['period_start_time'] == $pInd)
                        <?php $etd = false;?>
                        <td colspan="{{$row['period_time_length']}}">    
                            @foreach($row as $key => $val)
                                @if(in_array($key, ['std_sched_code',
                                                    'meeting_number',
                                                    'day_code', 
                                                    'day',
                                                    'period_start_time', 
                                                    'period_end_time', 
                                                    'period_time_length', 
                                                    'status']))
                                    @continue
                                @endif
                                {{ $val }}<br>
                            @endforeach
                            @if($row['status'] == 2)
                                <input class="noPrint" type="button" style="color:red;" value=" X " onclick="deleteScheduleCourse(this, {{$row['std_sched_code']}})" />
                            @endif
                        </td>
                    @endif
                @endforeach
            @endif
            @if($etd == true)
                <td></td>
            @endif
        @endforeach
        </tr>
    @endforeach
</table>

<script>
function printReport() {
    window.print();
}

function deleteScheduleCourse(thisDiv, meeting_number) {
    $.get("{{url('/deleteStudentScheduleCourse')}}/"+meeting_number, function(response) {
        var res = JSON.parse(response);
        if (res['result'] == true)
            window.location.href = "{{url('/studentSchedule')}}";
        else 
            alert('Error removing course');
    });
}
</script>