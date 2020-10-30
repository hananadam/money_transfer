
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#jobTitleModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="jobTitleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Job Title')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="job_title_name" class="col-md-4 control-label arabic-pull-right">{{__('website.name')}}</label>
                        <div class="col-md-6">
                            <input name="job_title_name" id="job_title_name" type="text" class="form-control check-val-jobTitle"  autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-jobTitle" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-jobTitle').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-jobTitle').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let job_title_name =  $('#job_title_name').val();

            $.ajax({
                url: `${urlExt}/api/addJobTitle`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    job_title_name:job_title_name
                },
                success: function(data) {
                    $("#jobTitle").append(new Option(data.job_title_name, data.job_title_code));
                    $('#jobTitleModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>