var base_url = $('input[name="base_url"]').val();
$(document).ready(function(){
    $(document).on('submit', '#signupForm', function (e) {
        e.preventDefault();

        var form_data = new FormData($('#signupForm')[0]);
        var sendAjaxVar = sendAjax({ url: base_url + 'login/addUser', data: form_data }, false);
        console.log(sendAjaxVar);
        if (sendAjaxVar) {
            console.log(sendAjaxVar);
            if (sendAjaxVar.type == "success") {
                Swal.fire(
                    'Success',
                    'Successfully Registered',
                    'success'
                ).then((result) => {
                    if (result.value) {
                        window.location.replace(base_url + "login");
                    }
                });
            } else {
                $.each(sendAjaxVar, function (key, value) {
                    $('input[name="' + key + '"]').parent().next('.err').html(value);
                })
            }
        }
    })

    function sendAjax(param = {},isReturn = true){
        if(isReturn === false){
            var return_response = null;
            $.ajax({
                url:param.url,
                type: 'post',
                data:param.data,
                async:false,
                processData: false,
                contentType: false,
                dataType:'json',
                beforeSend: function() {
                  $('.overlay').show();
                },
                success:function(response){
                    $('.overlay').hide();
                    console.log(response);
                    return_response = response;
                },error:function(e){
                    console.log(e);
                }
            });
            return return_response;
        } else {
            var return_data = null;
            $.ajax({
                url:param.url,
                type: 'post',
                data:param.data,
                async:false,
                dataType:'json',
                success:function(response){
                    return_data = response;
                },error:function(e){
                    console.log(e);
                }
            });

            if(isReturn){
                return return_data;
            }
        }
    }

    function confirm_swal(text,confirmBtnText){
    var isSuccess = false;
    return new Promise(function(resolve, reject) {
        Swal.fire({
            title: 'Are you sure?',
            text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmBtnText
        }).then((result) => {
            if (result.value) {
                resolve(true);
            } else {
                resolve(false);
            }
        });
   });
}

    function swal(content,response = 'success'){
    if(response == 'success'){
        Swal.fire("Success",content,response);
    }else{
        Swal.fire("Error",content,response);
    }
}
})
