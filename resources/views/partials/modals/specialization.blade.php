
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#specializationModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="specializationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Specialization')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="specialization_name_in_english" class="col-md-4 control-label arabic-pull-right">{{__('website.Specialization (En)')}}</label>
                        <div class="col-md-6">
                            <input name="specialization_name_in_english" id="specialization_name_in_english" type="text" class="form-control check-val-specialization"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="specialization_name_in_arabic" class="col-md-4 control-label arabic-pull-right">{{__('website.Specialization (Ar)')}}</label>
                        <div class="col-md-6">
                            <input name="specialization_name_in_arabic" id="specialization_name_in_arabic" type="text" class="form-control check-val-specialization"  autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-specialization" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-specialization').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-specialization').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let specialization_name_in_english =  $('#specialization_name_in_english').val();
            let specialization_name_in_arabic =   $('#specialization_name_in_arabic').val() ;

            $.ajax({
                url: `${urlExt}/api/addSpecialization`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    specialization_name_in_arabic:specialization_name_in_arabic,
                    specialization_name_in_english:specialization_name_in_english
                },
                success: function(data) {
                    $("#specialization").append(new Option(data.specialization_name_in_english, data.specialization_code));
                    $('#specializationModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>