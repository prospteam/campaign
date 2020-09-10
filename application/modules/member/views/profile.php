<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0">
							<div class="breadcomb-wp">
								<div class="breadcomb-ctn">
									<h2>MY PROFILE</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="dropdown-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="dropdown-list">
                    <form class="form_myprofile" action="" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<br><br>
								<div class="con_profile">
									<button class="btn waves-effect waves-light" id="view_remove_btn" type="button" style="color:red;float:right"><i class="fa fa-times"></i></button>
									<img name="view_profile" style="margin-bottom:10px;height:200px;width:200px;" alt="profile_image" src="<?php echo base_url('assets/profile_picture/' . (empty($profile_user->image) ? 'profile_image.png' : $profile_user->image)) ?>">
									<div id="view_upload-demo"></div>
									<input type="file" class="upload_image filestyle" data-classButton="btn btn-primary" data-buttonText="Choose profile picture" data-classIcon="fa fa-folder" data-input="false" name="view_upload_image" accept="image/*" id="view_upload_image" /><br><br>
									<span class="err"></span>
									<input type="hidden" id="view_imagebase64" name="view_imagebase64" />

									<input type="hidden" id="orig_photo" value="<?php echo $profile_user->image; ?>" name="orig_photo" />
								</div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="">First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="first_name" value="<?php echo $profile_user->firstname ?>" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="last_name">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="last_name" value="<?php echo $profile_user->lastname ?>" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="first_name">Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="address" value="<?php echo $profile_user->address ?>" placeholder="Address" required>
                                        </div>
                                        <span class="err"></span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <label for="first_name">Email Address</label>
                                        <div class="input-group">
                                            <input type="email" readonly class="form-control" name="email" value="<?php echo $profile_user->email ?>" placeholder="Eamil Address">
                                        </div>
                                        <span class="err"></span>
                                    </div>
                                </div><br>
                                <!-- <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="middle_name">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                        </div>
                                        <span class="err"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="last_name">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="confirm_password"  value="" placeholder="Confirm Password">
                                        </div>
										<input type="hidden" name="orig_email_address">
										<input type="hidden" name="orig_username">
                                        <span class="err"></span>
                                    </div>
                                </div><br> -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-download"></i> Save Changes</button>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
