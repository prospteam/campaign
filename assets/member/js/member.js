! function(window, document, $) {
    "use strict";
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
}(window, document, jQuery);

var  base_url = $('input.base_url').val();
var  userid   = $('input.user_id').val();
var action    = '';

$('#toggle_Add').on('click',function(){
    $('input,textarea,select').attr('readonly',false);
    $('button[type="reset"],button[type="submit"]').removeClass('hide_');
    action = "add";
     $('#addcampaign').trigger('reset');
          $('.photowrapper img').attr('src', '');
    $('.ADD_CAMPAIGN').modal('show');
        $('.ADD_CAMPAIGN .modal-title').text('Add Campaign');
});

$('#editbutton_campaign').on('click',function(){
    $('input,textarea,select').attr('readonly',false);
    $('button[type="reset"],button[type="submit"]').removeClass('hide_');
});

$(document).on('click','#toggle_Edit',function(){
$('button[type="reset"],button[type="submit"]').addClass('hide_');

    $('input,textarea,select').attr('readonly',true);
        action = "Edit";
         $('#addcampaign').trigger('reset');
        var campaignid = $(this).data('id');
        $.ajax({
            url     : base_url+'member/get_one_campaign/'+campaignid,
            method  : 'get',
            dataType: 'json',
            success : function(res){
                console.log(res);
                if (res.length>0) {
                    var data  = res[0];
                    var photo_src='';
                    if (data.campaignstatus==0) {
                        $('#editbutton_campaign').removeClass('hide_');
                    }else {
                        $('#editbutton_campaign').addClass('hide_');
                    }
                    for (var i = 0; i < Object.keys(data).length; i++) {
                        if (Object.keys(data)[i]=="story") {
                            $('textarea[name="'+Object.keys(data)[i]+'"]').val(data[Object.keys(data)[i]]);
                        }else if (Object.keys(data)[i]=="currency") {
                                $("select[name="+Object.keys(data)[i]+"]").val(data[Object.keys(data)[i]]).find("option[value="+data[Object.keys(data)[i]] +"]").attr('selected', true);
                        }else if (Object.keys(data)[i]=="purpose") {
                                $("select[name="+Object.keys(data)[i]+"]").val(data[Object.keys(data)[i]]).find("option[value="+data[Object.keys(data)[i]] +"]").attr('selected', true);
                        }else if (Object.keys(data)[i]=="category") {
                             $("select[name="+Object.keys(data)[i]+"]").val(data[Object.keys(data)[i]]).find('option[value="'+data[Object.keys(data)[i]] +'"]').attr('selected', true);
                        }else if (Object.keys(data)[i]=="photo") {
                            var photo_ = base_url+'assets/files/'+data.fk_userid+'/'+data.date+'/'+data.photo;
                             $('.photowrapper img').attr('src', photo_);
                        }else {
                            $('input[name="'+Object.keys(data)[i]+'"]').val(data[Object.keys(data)[i]]);
                        }
                    }
                }

                $('.ADD_CAMPAIGN').modal('show');
                $('.ADD_CAMPAIGN .modal-title').text('Edit Campaign');
            }});
});

$(document).ready(function(){
    var url_;
    get_my_campaign();
    $(document).on('submit','#addcampaign',function(e){
        e.preventDefault();
        $('#save_form_now').text('Saving Now....');
        $('#save_form_now').attr('disabled',true);
        var formData = new FormData($("#addcampaign")[0]);
        if (action =="Edit") {
            url_ = base_url+'member/edit_campaigns';
        }else {
            url_ = base_url+'member/add_campaigns';
        }
        $.ajax({
            url     :  url_,
            type    : "post",
            data    : formData,
            processData: false,
            contentType: false,
            success:function(data){
                $('#save_form_now').text('Save Form');
                $('#save_form_now').attr('disabled',false);
                var obj = $.parseJSON(data);
                if(obj.response == 'success'){
                     $('#addcampaign').trigger('reset');
                    // swal('Success','Campaign added Successfully','success');
                    get_my_campaign();
                    $('.ADD_CAMPAIGN').modal('hide');
                    $('.center_loader').removeClass('hide_');
                    $('#campaign_wrapper').addClass('hide_');
                } else {
                    swal('Error','Error file', 'error');
                }
            }
        })
    });


});


function get_my_campaign(){
    $.ajax({
        url     : base_url+'member/get_my_campaign',
        method  : 'get',
        dataType: 'json',
        success : function(res){
            console.log(res);
            if (res.length>0) {
                var ctr = '';
                for (var i = 0; i < res.length; i++) {
                    var imgsrc = base_url+'assets/files/'+userid+'/'+res[i].date+'/'+res[i].photo ;
                    var status = (res[i].campaignstatus==0)? "For Review" :((res[i].campaignstatus==1)?"Active":'Expired');
                    var badge = (res[i].campaignstatus==0)? "badge-warning" :((res[i].campaignstatus==1)?"badge-success":'badge-danger');
                    ctr+='<div class="col-lg-3 col-md-6">';
                        ctr+='<div class="card">';
                            ctr+='<div class="el-card-item">';
                                ctr+='<div class="el-card-avatar el-overlay-1">';
                                    ctr+='<img class="campain_photo" src="'+imgsrc+'" alt="user" />';
                                    ctr+='<div class="el-overlay">';
                                        ctr+='<ul class="el-info">';
                                            ctr+='<li><a class="btn default btn-outline image-popup-vertical-fit" href="'+imgsrc+'"><i class="sl-icon-magnifier"></i></a></li>';
                                            ctr+='<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="sl-icon-link"></i></a></li>';
                                        ctr+='</ul>';
                                    ctr+='</div>';
                                ctr+='</div>';
                                ctr+='<div class="el-card-content">';
                                        ctr+='<h3 class="box-title">'+res[i].campaign_title+'</h3>';
                                        ctr+='<span class="badge '+badge+'">'+status+'</span>';
                                        ctr+='<br/>';
                                        ctr+='<br/>';
                                        ctr+='<button data-id="'+res[i].campaign_id+'"  id="toggle_Edit" style="width:95%;" class="btn btn-info btn-sm ">View Details</button>';
                                        ctr+='<button  style="width:95%;" class="btn btn-success btn-sm">Visit Funds</button>';

                                ctr+='</div>';
                            ctr+='</div>';
                        ctr+='</div>';
                    ctr+='</div>';

                }
                $('#campaign_wrapper').html(ctr);
                setTimeout(function(){
                    $('.center_loader').addClass('hide_');
                    $('#campaign_wrapper').removeClass('hide_');
                }, 1000);

            }else {

                $('#campaign_wrapper').html('<div class="alert alert-info">You have no campaigns added yet.</div>');
            }
        }
    });
}
