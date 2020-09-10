<div class="row page-titles">
    <div class="col-md-5 align-self-center">
<<<<<<< HEAD
        <h3 class="text-themecolor">My Fund Raising Campaigns</h3>
=======
        <h3 class="text-themecolor">Member</h3>
>>>>>>> 0b6bbcc590c52912b853849902a3727fcebba708
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Member</li>
        </ol>
    </div>
<<<<<<< HEAD
    <div class="col-md-7 align-self-center text-right d-none d-md-block">
        <button type="button" id="toggle_Add" class="btn btn-info"><i class="fa fa-plus-circle"></i> Start new campaign</button>
    </div>
=======
    <!-- <div class="col-md-7 align-self-center text-right d-none d-md-block">
        <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</button>
    </div> -->
>>>>>>> 0b6bbcc590c52912b853849902a3727fcebba708
    <div class="">
        <button   class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<<<<<<< HEAD
<div class="col-md-12 center_loader hide_"  style="display: flex;
                                justify-content: center;">
    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
    </div>
</div>
<div class="row el-element-overlay" id="campaign_wrapper">

</div>



<!-- Modal -->

        <div class="modal ADD_CAMPAIGN" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel"> Enter your campaign here</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <h4 class="card-title">Your Goal</h4>
                                                <h6 class="card-subtitle"><code>All fields are required.</code></h6>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" id="editbutton_campaign" class="btn btn-info btn-circle"><i class="fa fa-edit"></i> </button>
                                              </div>
                                        </div>
                                        <form class=" m-t-40"  novalidate method="post" id="addcampaign" enctype="multipart/form-data">
                                            <input type="text" hidden name="campaign_id" value="">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group m-b-40">
                                                        <select name="currency"  id="currency"  class="form-control currencyCodes"> </select>
                                                        <span class="bar"></span>
                                                        <label for="currency">Choose Currency</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="amountgoal" name="amount">
                                                        <span class="bar"></span>
                                                        <label for="amountgoal">Your Goal</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="campaigntitle" name="campaign_title">
                                                        <span class="bar"></span>
                                                        <label for="campaigntitle">Campaign Title</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group m-b-40">
                                                        <select class="form-control  required p-0" id="benefactor" name="purpose">

                                                            <option value="Myself">Myself</option>
                                                            <option value="Charity">Charity</option>
                                                            <option value="Others">Others</option>
                                                        </select><span class="bar"></span>
                                                        <label for="benefactor">Benifactor of this campaign</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group m-b-40">
                                                            <select class="form-control  required p-0" id="category" name="category">

                                                                <option value="Accidents and Emergencies">Accidents and Emergencies</option>
                                                                <option value="Animals and Pets">Animals and Pets</option>
                                                                <option value="Babies, Children and Family">Babies, Children and Family</option>
                                                                <option value="Business and Entrepreneurs">Business and Entrepreneurs</option>
                                                                <option value="Celebrations and Events">Celebrations and Events</option>
                                                                <option value="Community and Neighbours">Community and Neighbours</option>
                                                                <option value="ompetitions and Pageants">Competitions and Pageants</option>
                                                                <option value="Creative Arts, Music and Film">Creative Arts, Music and Film</option>
                                                                <option value="Dreams, Hopes and Wishes">Dreams, Hopes and Wishes</option>
                                                                <option value="Education and Learning">Education and Learning</option>
                                                                <option value="Funerals and Memorials">Funerals and Memorials</option>
                                                                <option value="Medical, Illness and Healing">Medical, Illness and Healing</option>
                                                                <option value="Missions, Faith and Church">Missions, Faith and Church</option>
                                                                <option value="Sports, Teams and Clubs">Sports, Teams and Clubs</option>
                                                                <option value="Travel and Adventure">Travel and Adventure</option>
                                                                <option value="Volunteer and Service">Volunteer and Service</option>
                                                                <option value="Weddings and Honeymoons">Weddings and Honeymoons</option>
                                                            </select><span class="bar"></span>
                                                            <label for="category">Choose Category</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="street" name="streetaddress">
                                                        <span class="bar"></span>
                                                        <label for="street">Street Address</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="city" name="city">
                                                        <span class="bar"></span>
                                                        <label for="city">City</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="state" name="state">
                                                        <span class="bar"></span>
                                                        <label for="state">State</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="country" name="country">
                                                        <span class="bar"></span>
                                                        <label for="country">Country</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="zipcode" name="zip">
                                                        <span class="bar"></span>
                                                        <label for="zipcode">Zip Code</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                            </div>



                                            <h4 class="card-title">Tell us your story</h4><br>
                                            <div class="form-group m-b-5 ">
                                            <!-- <div class="form-group m-b-5 has-error has-danger"> -->
                                                <textarea class="form-control" required  rows="4" id="story" name="story"></textarea>
                                                <span class="bar"></span>
                                                <label for="story">Enter your story here</label>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="facebook" name="facebook">
                                                        <span class="bar"></span>
                                                        <label for="facebook">Facebook Page link (optional)</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group m-b-40">
                                                        <input type="text" class="form-control" required  id="video" name="video">
                                                        <span class="bar"></span>
                                                        <label for="video">Short Video Link (optional)</label>
                                                        <span class="help-block"><small></small></span>
                                                    </div>
                                                </div>

                                                <h4 class="card-title">Campaign photo </h4><br>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h4 class="card-title"></h4>
                                                                        <label for="input-file-now">Cover photo of your campaign</label>
                                                                        <input type="file" id="input-file-now" name="photo"  class="dropify" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="photowrapper">
                                                                            <img src="" alt="" style="max-height:230px;object-fit:cover;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <button id="save_form_now" type="submit" class="btn btn-info">Submit</button>
                                                <button type="reset" class="btn btn-inverse">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
=======

    <table class="table table-striped member">
        <thead>
            <tr>
				<th>Image</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email Address</th>
				<th>Address</th>
                <th>Date Registered</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
>>>>>>> 0b6bbcc590c52912b853849902a3727fcebba708
