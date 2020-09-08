var base_url = $('input[name="base_url"]').val();
$(document).ready(function(){
    var tbl_member = $('.member').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "order": [[0, 'desc']], //Initial no order.
        "columns": [
            {
                "data": "user_id", "width":"5%", "render": function (data, type, row, meta) {
                    var str = '';
                        if (row.image == '') {
                            str += '<div class="text-center"><img src="'+base_url+'assets/profile_picture/profile_image.png" style="width:70%" alt="Profile Picture"></div>';
                        }else{
                            str += '<div class="text-center"><img src="'+base_url+'assets/profile_picture/'+row.profile_picture+'" style="width:60%" alt="Profile Picture"></div>';
                        }
                    return str;
                }
            },
            { "data": "firstname" },
            { "data": "lastname" },
            { "data": "email" },
            { "data": "address" },
            { "data": "date" },
            {
                "data": "user_id", "render": function (data, type, row, meta) {
                    var str = '';
                        if (row.status == 1) {
                            str += 'Enabled';
                        }else{
                            str += 'Disabled';
                        }
                    return str;
                }
            },
            {
                "data": "user_id","width":"15%", "render": function (data, type, row, meta) {
                    var str = '';
                        if (row.status == 1) {
                            str += '<button data-id="'+row.status+'" data-status="'+row.status+'" class="btn btn-sm btn-success status" title="Click to deactivate"><i class="fa fa-unlock"></i></button>&nbsp;';
                        }else{
                            str += '<button data-id="'+row.status+'" data-status="'+row.status+'" class="btn btn-sm btn-dark status" title="Click to activate"><i class="fa fa-lock"></i></button>&nbsp;';
                        }
                        str += '<button data-toggle="modal" data-target="#update_employee" data-id="'+row.status+'" data-type="'+row.status+'" class="btn btn-sm btn-warning edit_employee" title="Click to edit"><i class="fa fa-edit"></i></button>&nbsp;';
                        str += '<button data-toggle="modal" data-target="#view_employee" data-id="'+row.user_id+'" data-name="'+row.firstname+' '+row.lastname+'" class="btn btn-sm btn-primary view_employee" title="Click to view"><i class="fa fa-eye"></i></button>&nbsp;';
                        str += '<button data-id="'+row.status+'" data-type="'+row.status+'" class="btn btn-sm btn-danger remove_employee" title="Click to remove"><i class="fa fa-trash"></i></button>&nbsp;';
                    return str;
                }
            },
        ],
        "language": { "search": '', "searchPlaceholder": "Search keyword" },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "member/display_member",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [6,7], //first column / numbering column
                "orderable": false, //set not orderable

            },
        ],
    })
});
