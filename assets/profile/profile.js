var base_url = $('input[name="base_url"]').val();
var ctr = 0;
$(document).ready(function(){
    var $uploadCrop, $uploadCrop2;
    $('#view_upload-demo').hide();
    $('#view_remove_btn').hide();
    $('input[name="view_upload_image"]').on('click', function () {
        $('#view_upload-demo').show();
        $('img[name="view_profile"]').hide();
        $('#view_remove_btn').show();
    });
    $('#view_remove_btn').on('click', function () {
        $('#view_upload-demo').hide();
        $('#view_upload_image').val('');
        $('img[name="view_profile"]').show();
        $('#view_remove_btn').hide();
        ctr = 0;
    });
    function readFile(input, layout) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if (layout == 'view_upload-demo') {
                    $uploadCrop2.croppie('bind', {
                        url: e.target.result
                    });
                } else {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    });
                }
                $(layout).addClass('ready');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop2 = $('#view_upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 220,
            height: 222
        }
    });

    $('#view_upload_image').on('change', function () { readFile(this, 'view_upload-demo'); });

    $('.upload_image').change(function () {
        var error_images = '';
        var files = $('.upload_image')[0].files;
        if (files.length > 1) {
            error_images += 'You can not select more than 1 image';
        }
        else {
            for (var i = 0; i < files.length; i++) {
                var name = $(this)[0].files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['png', 'jpg', 'jpeg','jfif']) == -1) {
                    error_images += '<p>Invalid File Type</p>';
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL($(this)[0].files[i]);
                var f = $(this)[0].files[i];
                var fsize = f.size || f.fileSize;
                console.log(fsize);
                if (fsize > 25000000) {
                    error_images += '<p> File Size is very big </p>';
                }
            }
        }
        if (error_images != "") {
            ctr += 1;
            $('.upload_image').val('');
            $('.upload_image').next('.err').html(error_images);
            return false;
        } else {
            ctr = 0;
            $('.upload_image').next('.err').html("");
        }

    });

    $(document).on('submit', '.form_myprofile', function (e) {
        e.preventDefault();
        $uploadCrop2.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (resp) {
            $('#view_imagebase64').val(resp);
        });
        setTimeout(function () {
            var form_data = new FormData($('.form_myprofile')[0]);
            console.log(ctr);
                if (ctr == 0) {//check if there is no error in uploading file
                    var sendAjaxVar = sendAjax({ url: base_url + 'member/update_profile', data: form_data }, false);
                    console.log(sendAjaxVar);
                    if (sendAjaxVar) {
                        console.log(sendAjaxVar);
                        clearError();
                        if (sendAjaxVar.type == "success") {
                            Swal.fire({
                                text: sendAjaxVar.msg,
                                type: sendAjaxVar.type,
                                showCancelButton: false,
                                confirmButtonColor: '#254392',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            $.each(sendAjaxVar, function (key, value) {
                                $('input[name="' + key + '"]').parent().next('.err').html(value);
                            });
                        }
                    }
                } else {
                    swal("Please upload the correct file size and file type (png, jpg, jpeg, jfif).", "Error");
                }
            }, 1000);
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
});
