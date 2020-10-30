
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#programModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Program')}}</h4>
            </div>
            <form class="custom-form">
                <br>
                <div class="form-group">
                    <label for="program_name_in_english" class="col-md-4 control-label arabic-pull-right">{{__('website.Program (En)')}}</label>
                    <div class="col-md-6">
                        <input name="program_name_in_english" id="program_name_in_english" type="text" class="form-control check-val-program"  autofocus>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="program_name_in_arabic" class="col-md-4 control-label arabic-pull-right">{{__('website.Program (Ar)')}}</label>
                    <div class="col-md-6">
                        <input name="program_name_in_arabic" id="program_name_in_arabic" type="text" class="form-control check-val-program"  autofocus>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-program" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-program').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-program').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let program_name_in_english =  $('#program_name_in_english').val();
            let program_name_in_arabic =  $('#program_name_in_arabic').val();

            $.ajax({
                url: `${urlExt}/api/addProgram`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    program_name_in_arabic:program_name_in_arabic,
                    program_name_in_english:program_name_in_english,
                },
                success: function(data) {
                    $("#program_code").append(new Option(data.program_name_in_english, data.program_code));
                    $('#programModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>