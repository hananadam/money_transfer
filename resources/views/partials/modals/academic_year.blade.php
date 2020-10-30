
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#academicModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="academicModal" tabindex="-1" role="dialog" aria-labelledby="academicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="academicModal">{{__('global.Add new')}} {{__('website.academic_year')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="academic_year_description" class="col-md-4 control-label arabic-pull-right">{{ __('website.Description') }}</label>
                        <div class="col-md-6">
                            <input name="academic_year_description" id="academic_year_description" type="text" class="form-control check-val-academic" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="academic_year_start_date" class="col-md-4 control-label arabic-pull-right">{{ __('website.Academic Year Start') }} </label>
                        <div class="col-md-6">
                            <input name="academic_year_start_date" id="academic_year_start_date" type="date" class="form-control check-val-academic" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="academic_year_end_date" class="col-md-4 control-label arabic-pull-right">{{ __('website.Academic Year End') }}</label>
                        <div class="col-md-6">
                            <input name="academic_year_end_date" id="academic_year_end_date" type="date" class="form-control check-val-academic" autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-academic" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-academic').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-academic').each(function() {
            if(!$(this).val()){
                alert(message);
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let academic_year_description =  $('#academic_year_description').val();
            let academic_year_start_date =   $('#academic_year_start_date').val() ;
            let academic_year_end_date =   $('#academic_year_end_date').val();

            $.ajax({
                url: `${urlExt}/api/addAcademicYear`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    academic_year_description:academic_year_description,
                    academic_year_start_date:academic_year_start_date,
                    academic_year_end_date:academic_year_end_date
                },
                success: function(data) {
                    $("#academic_year_code").append(new Option(data.academic_year_description, data.academic_year_code));
                    $('#academicModal').trigger('click.dismiss.bs.modal')
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>