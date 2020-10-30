
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#roomsModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="roomsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Room')}}</h4>
            </div>
            <form class="custom-form">
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="campus_code" class="col-md-4 control-label arabic-pull-right">{{ __('website.Campus') }}</label>
                        <div class="col-md-6">
                            <select name="campus_code"  onchange="generalAjaxGenerator(this,'building','getCampusBuilding','building_code','building_name_in_english')" class="check-val-room form-control campus_code" required autofocus>
                                <option value="">{{ __('global.Choose one') }}</option>
                                @foreach(\App\Campus::all() as $value)
                                    <option value="{{ $value['campus_code'] }}">{{ $value['campus_name_in_english'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="building_code" class="col-md-4 control-label arabic-pull-right">{{__('website.Building')}}</label>
                        <div class="col-md-6">
                            <select name="building_code" id="building" class="check-val-room form-control" required autofocus>
    
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="room_name" class="col-md-4 control-label arabic-pull-right">{{ __('website.Room Name') }}</label>
                        <div class="col-md-6">
                            <input name="room_name" id="room_name" type="text" class="check-val-room form-control"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="room_type" class="col-md-4 control-label arabic-pull-right">{{ __('website.Room Type') }}</label>
                        <div class="col-md-6">
                            <select name="room_type" id="room_type"  class="check-val-room form-control" required autofocus>
                                <option value="">{{ __('global.Choose one') }}</option>
                                @foreach(\App\RoomType::all() as $value)
                                    <option value="{{ $value['room_type_code'] }}">{{ $value['room_type_name'] }}</option>
                                @endforeach
                            </select>
    
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="room_normal_maximum_capacity" class="col-md-4 control-label arabic-pull-right">{{ __('website.Normal Maximum Capacity') }} </label>
                        <div class="col-md-6">
                            <input name="room_normal_maximum_capacity" id="room_normal_maximum_capacity" type="number" class="check-val-room form-control"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="room_exam_maximum_capacity" class="col-md-4 control-label arabic-pull-right">{{ __('website.Exam Maximum Capacity') }} </label>
                        <div class="col-md-6">
                            <input name="room_exam_maximum_capacity" id="room_exam_maximum_capacity" type="number" class="check-val-room form-control"  autofocus>
                            
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="number_of_sugested_procters" class="col-md-4 control-label arabic-pull-right">{{ __('website.Needed Proctors') }}</label>
                        <div class="col-md-6">
                            <input name="number_of_sugested_procters" id="number_of_sugested_procters" type="number" class="check-val-room form-control"  autofocus>
                            
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="floor_number" class="col-md-4 control-label arabic-pull-right">{{ __('website.Floor') }} </label>
                        <div class="col-md-6">
                            <input name="floor_number" id="floor_number" type="number" class="check-val-room form-control "  autofocus>
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-room" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-room').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-room').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let campus_code =  $('.campus_code').val();
            let building_code =  $('#building').val();
            let room_name =  $('#room_name').val();
            let room_type =  $('#room_type').val();
            let room_normal_maximum_capacity =  $('#room_normal_maximum_capacity').val();
            let room_exam_maximum_capacity =  $('#room_exam_maximum_capacity').val();
            let number_of_sugested_procters =  $('#number_of_sugested_procters').val();
            let floor_number =  $('#floor_number').val();

            $.ajax({
                url: `${urlExt}/api/addRoom`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    campus_code:campus_code,
                    building_code:building_code,
                    room_name:room_name,
                    room_type:room_type,
                    room_normal_maximum_capacity:room_normal_maximum_capacity,
                    room_exam_maximum_capacity:room_exam_maximum_capacity,
                    number_of_sugested_procters:number_of_sugested_procters,
                    floor_number:floor_number,
                },
                success: function(data) {
                    $("#room_code").append(new Option(data.room_name, data.room_code));
                    $('#roomsModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>