
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#facultyModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('website.Add new faculty')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">

                    <div class="form-group{{ $errors->has('faculty_name_in_english') ? ' has-error' : '' }}">
                        <label for="faculty_name_in_english" class="col-md-4 control-label arabic-pull-right">{{ __('website.Faculty (En)') }}</label>
                        <div class="col-md-6">
                            <input name="faculty_name_in_english" id="faculty_name_in_english" type="text" class="form-control check-val"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('faculty_name_in_arabic') ? ' has-error' : '' }}">
                        <label for="faculty_name_in_arabic" class="col-md-4 control-label arabic-pull-right">{{ __('website.Faculty (Ar)') }}</label>
                        <div class="col-md-6">
                            <input name="faculty_name_in_arabic" id="faculty_name_in_arabic" type="text" class="form-control check-val"  autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('university_code') ? ' has-error' : '' }}">
                        <label for="university_code" class="col-md-4 control-label arabic-pull-right">{{ __('website.University') }}</label>
                        <div class="col-md-6">
                            <select name="university_code" id="university" class="form-control check-val" required autofocus>
                                <option value="">{{ __('global.Choose one') }}</option>
                                @foreach(\App\University::all() as  $value)
                                    <option value="{{ $value['university_code'] }}">{{ $value['university_name_in_english'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close-model" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-faculty" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-faculty').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val').each(function() {
            if(!$(this).val()){
                alert(message);
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let faculty_name_in_english =  $('#faculty_name_in_english').val();
            let faculty_name_in_arabic =   $('#faculty_name_in_arabic').val() ;
            let university =   $('#university').val();

            $.ajax({
                url: `${urlExt}/api/addFaculty`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    university_code:university,
                    faculty_name_in_arabic:faculty_name_in_arabic,
                    faculty_name_in_english:faculty_name_in_english
                },
                success: function(data) {
                    $("#faculty_code").append(new Option(data.faculty_name_in_english, data.faculty_code));
//<<<<<<< HEAD
                    //$('#facultyModal').modal('toggle')
                    $('#facultyModal').trigger('click.dismiss.bs.modal');
//=======
                    $('#facultyModal').modal('toggle');
                    // $('#modal').modal().hide();

//>>>>>>> 0e7f1399c31ca58951e98c0d4ef82c32edc6632a
                    $(".custom-form").trigger('reset');
                }
            });
        }
    });
</script>