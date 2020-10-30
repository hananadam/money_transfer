
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#buildingModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="buildingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Building')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="campus_code" class="col-md-4 control-label  arabic-pull-right">{{ __('website.Campus') }}</label>
                        <div class="col-md-6">
                            <select name="campus_code" id="campus_code" class="form-control" required autofocus>
                                <option value="">{{__('global.Choose one')}}</option>
                                @foreach(\App\Campus::all() as $value)
                                    <option value="{{ $value['campus_code'] }}">{{ $value['campus_name_in_english'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="building_name_in_english" class="col-md-4 control-label arabic-pull-right">{{ __('website.Building Name In English') }} </label>
                        <div class="col-md-6">
                            <input name="building_name_in_english" id="building_name_in_english" type="text" class="form-control check-val-building"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="building_name_in_arabic" class="col-md-4 control-label arabic-pull-right">{{ __('website.Building Name In Arabic') }}</label>
                        <div class="col-md-6">
                            <input name="building_name_in_arabic" id="building_name_in_arabic" type="text" class="form-control check-val-building"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="building_location_address" class="col-md-4 control-label">{{ __('website.Building Location Address') }} </label>
                        <div class="col-md-6">
                            <input name="building_location_address" id="building_location_address" type="text" class="form-control check-val-building"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="number_of_floors" class="col-md-4 control-label">{{ __('website.Number Of Floors') }}  </label>
                        <div class="col-md-6">
                            <input name="number_of_floors" id="number_of_floors" type="number" class="form-control check-val-building"  autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-building" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-building').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-building').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let campus_code =  $('#campus_code').val();
            let building_name_in_english =   $('#building_name_in_english').val() ;
            let building_name_in_arabic =   $('#building_name_in_arabic').val() ;
            let building_location_address =   $('#building_location_address').val() ;
            let number_of_floors =   $('#number_of_floors').val() ;

            $.ajax({
                url: `${urlExt}/api/addBuilding`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    campus_code:campus_code,
                    building_name_in_english:building_name_in_english,
                    building_name_in_arabic:building_name_in_arabic,
                    building_location_address:building_location_address,
                    number_of_floors:number_of_floors,
                },
                success: function(data) {
                    console.log(data)
                    $("#building_code").append(new Option(data.building_name_in_english, data.building_code));
                    $('#buildingModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>