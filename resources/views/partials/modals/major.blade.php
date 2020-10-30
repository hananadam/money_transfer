
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#majorModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="majorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Major')}}</h4>
            </div>
            <form class="custom-form">
                <br>
                <div class="form-group">
                    <label for="major_name_in_english" class="col-md-4 control-label arabic-pull-right">{{__('website.Major (En)')}}</label>
                    <div class="col-md-6">
                        <input name="major_name_in_english" id="major_name_in_english" type="text" class="form-control check-val-major"  autofocus>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="major_name_in_arabic" class="col-md-4 control-label">{{__('website.Major (Ar)')}}</label>
                    <div class="col-md-6">
                        <input name="major_name_in_arabic" id="major_name_in_arabic" type="text" class="form-control check-val-major"  autofocus>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-major" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-major').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-major').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let major_name_in_arabic =  $('#major_name_in_arabic').val();
            let major_name_in_english =  $('#major_name_in_english').val();

            $.ajax({
                url: `${urlExt}/api/addMajor`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    major_name_in_english:major_name_in_english,
                    major_name_in_arabic:major_name_in_arabic,
                },
                success: function(data) {
                    $("#major_code").append(new Option(data.major_name_in_english, data.major_code));
                    $('#majorModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>