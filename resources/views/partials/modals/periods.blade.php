
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#periodModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="periodModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Period')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">
                    <div class="form-group{{ $errors->has('period_start_time') ? ' has-error' : '' }}">
                        <label for="period_start_time" class="col-md-4 control-label arabic-pull-right">{{ __('website.Period Start Time') }}</label>
                        <div class="col-md-6">
                            <input name="period_start_time" id="period_start_time" type="time" class="check-val-period form-control"  autofocus>

                            @if ($errors->has('period_start_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('period_start_time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('period_end_time') ? ' has-error' : '' }}">
                        <label for="period_end_time" class="col-md-4 control-label arabic-pull-right">{{ __('website.Period End Time') }}</label>
                        <div class="col-md-6">
                            <input name="period_end_time" id="period_end_time" type="time" class="check-val-period form-control"  autofocus>

                            @if ($errors->has('period_end_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('period_end_time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('period_time_length') ? ' has-error' : '' }}">
                        <label for="period_time_length" class="col-md-4 control-label arabic-pull-right">{{ __('website.Period Length') }}</label>
                        <div class="col-md-6">
                            <input name="period_time_length" id="period_time_length" type="number" class="check-val-period form-control" autofocus>
                            @if ($errors->has('period_time_length'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('period_time_length') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-period" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-period').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-period').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let period_start_time =  $('#period_start_time').val();
            let period_end_time =  $('#period_end_time').val();
            let period_time_length =  $('#period_time_length').val();

            $.ajax({
                url: `${urlExt}/api/addPeriod`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    period_start_time:period_start_time,
                    period_end_time:period_end_time,
                    period_time_length:period_time_length,
                },
                success: function(data) {
                    const option = `${data.period_start_time}:00 -- ${data.period_end_time}:00`
                    $("#period_code").append(new Option(option, data.period_code));
                    $('#periodModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>