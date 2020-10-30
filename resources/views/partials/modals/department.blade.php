
{{-- use this button and include this file in any place--}}
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#departmentModal">--}}
{{--    {{__('global.add_more')}} <i class="fa fa-plus"></i>--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('global.Add new')}} {{__('website.Department')}}</h4>
            </div>
            <form class="custom-form">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="faculty_code" class="col-md-4 control-label arabic-pull-right">Faculty</label>
                        <div class="col-md-6">
                            <select name="faculty_code" id="faculty_department" class="form-control d-inline-block check-val-department" required autofocus>
                                <option value="">Choose one</option>
                                @foreach(\App\Faculty::all() as $value)
                                    <option value="{{ $value['faculty_code'] }}">{{ $value['faculty_name_in_english'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="department_name_in_english" class="col-md-4 control-label arabic-pull-right">Department (En)</label>
                        <div class="col-md-6">
                            <input type="text" name="department_name_in_english" id="department_name_in_english" class="form-control check-val-department" required autofocus>
                            @if ($errors->has('department_name_in_english'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('department_name_in_english') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department_name_in_arabic" class="col-md-4 control-label arabic-pull-right">Department (Ar)</label>
                        <div class="col-md-6">
                            <input type="text" name="department_name_in_arabic" id="department_name_in_arabic" class="form-control check-val-department" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('global.back')}}</button>
                    <button type="submit" class="btn btn-primary arabic-pull-right" id="save-department" >{{__('global.submit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#save-department').click(function (e){
        e.preventDefault();
        let isValid = true;
        let message= "{{__('global.empty_message')}}"
        $('.check-val-department').each(function() {
            if(!$(this).val()){
                alert(message)
                isValid = false;
                return false;
            }
        });
        if (isValid){
            let department_name_in_arabic =  $('#department_name_in_arabic').val();
            let department_name_in_english =   $('#department_name_in_english').val() ;
            let faculty_code =   $('#faculty_department').val() ;

            $.ajax({
                url: `${urlExt}/api/addDepartment`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    department_name_in_arabic:department_name_in_arabic,
                    department_name_in_english:department_name_in_english,
                    faculty_code:faculty_code,
                },
                success: function(data) {
                    $("#department").append(new Option(data.department_name_in_english, data.department_code));
                    $('#departmentModal').trigger('click.dismiss.bs.modal');
                    $(".custom-form").trigger('reset');

                }
            });
        }
    });
</script>