$(document).ready(function () {
    $('#myTable').DataTable();

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

	$('#addForm').submit(function(e) {
        e.preventDefault();
        $('input+span>strong').text('');
        $('input').parent().parent().removeClass('has-error');
        var formData = new FormData(this);
        $.ajax({
            type:$(this).attr('method'),
            url: url+"/store",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#alert-add').removeClass('d-none');
                document.getElementById("addForm").reset(); 
            },
            error: function(error){
                $.each(error.responseJSON.errors, function (key, value) {
                    var input = '#addForm input[name=' + key + ']';
                    $(input + '+span>strong').text(value);
                    $(input).parent().parent().addClass('has-error');
                });
            }
        });
    });

    $('#updateForm').submit(function(e) {
        e.preventDefault();
        $('input+span>strong').text('');
        $('input').parent().parent().removeClass('has-error');
        var id = $('#recordId').val();
        var formData = new FormData(this);
        $.ajax({
            type:$(this).attr('method'),
            url: url+"/update-record/"+id,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#alert-update').removeClass('d-none');
                document.getElementById("updateForm").reset(); 
                setTimeout(function(){
                    window.location.reload();
                },5000);
            },
            error: function(error){
                $.each(error.responseJSON.errors, function (key, value) {
                    var input = '#updateForm input[name=' + key + ']';
                    $(input + '+span>strong').text(value);
                    $(input).parent().parent().addClass('has-error');
                });
            }
        });
    });

    $('.deleteRecord').on('click',function(){
        var recordId = $(this).attr('recordId');
        $.ajax({
            type:'GET',
            url: url+"/delete-record/"+recordId,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#alert-delete').removeClass('d-none');
                // $('#delete_modal_'+recordId).modal('hide');
                $('#cancel_'+recordId).click();
                $('#row_'+recordId).remove();
                setTimeout(function(){
                    $('#alert-delete').removeClass('d-none');
                },5000);
            },
            error: function(error){
                $.each(error.responseJSON.errors, function (key, value) {
                    var input = '#updateForm input[name=' + key + ']';
                    $(input + '+span>strong').text(value);
                    $(input).parent().parent().addClass('has-error');
                });
            }
        });
    });
});