<body>
<header>
    <div class="row">
        <div class="col-lg-5 d-flex">
            <a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('assets/img/logo2.png') ?>" alt="logo" class="img-fluid" style="width:10rem;"></a>
            <span>
                <p class="h4 mt-5">CCS <br> Class Record Management System</p>
            </span>
        </div>
    </div>
</header>
    <div class="container-fluid mt-5">
        <div class="row row-cols-2">
            <div class="col-md-2">
                <div class="nav nav-pills flex-column gap-5">
                  <a href="<?php echo base_url('dashboard')?>" class="btn btn-light border border-2">Manage Class</a>  
                  <a href="<?php echo base_url('uploadclass')?>" class="btn btn-light border border-2">Upload New Class</a>
				  <a href="<?php echo base_url('uploadstudent')?>" class="btn btn-light border border-2">Upload New Student</a>  
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2 active">Settings</a>  
                  <a href="<?php echo base_url('logout') ?>" class="btn btn-light border border-2">Logout</a>    
                </div>
            </div>
            <div class="col-md-10 px-5">
                <!-- <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url('assets/CCRMS/Profile Picture_Accounts.png')?>" class="img-fluid" id="frame" title="" style="width: 8rem;">
                        <button type="file" class="position-relative rounded-pill fw-bold" style="top: 2rem; background-color: yellow;" onchange="preview()" accept="image/*" name="upload">
                            Update Photo
                        </button>
                    </div>
                </div> -->
				<span>
					<p class="h4">Profile </p>
				</span>
				<div class="row my-3">
					<label for="new_password" class="col-2 col-form-label">Instructor ID: </label>
					<div class="col-3">
						<h5 style="padding-top: 0.5rem"><?php echo $this->session->userdata('auth_user')->instructor_id; ?></h5>
					</div>
				</div>
				<div class="row my-3">
					<label for="new_password" class="col-2 col-form-label">Name: </label>
					<div class="col-3">
						<h5 style="padding-top: 0.5rem"><?php echo $this->session->userdata('auth_user')->last_name; ?>, <?php echo $this->session->userdata('auth_user')->first_name; ?> <?php echo $this->session->userdata('auth_user')->middle_name; ?> </h5>
					</div>
				</div>
				
				<form action="<?php echo base_url('changepassword')?>" method="POST">
					<div class="row my-3">
						<label for="new_password" class="col-2 col-form-label">New Password: </label>
						<div class="col-3">
							<input type="password" class="form-control mb-3" name="new_password">
							<small><?php echo form_error('new_password'); ?></small>
						</div>
					</div>

					<div class="row my-3">
						<label for="confirm_password" class="col-2 col-form-label">Confirm Password: </label>
						<div class="col-3">
							<input type="password" class="form-control" name="confirm_password">
							<small><?php echo form_error('confirm_password'); ?></small>
						</div>
					</div>
					
					<?php if ($this->session->flashdata('status')) : ?>
						<br>
						<div class="row my-3">
							<div class="col-5">
								<div class="alert alert-danger">
									<?= $this->session->flashdata('status'); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="row my-3">
						<div class="col-6">
							<button type="submit" class="btn btn-primary rounded-pill fw-bold btn-md mt-2 px-3" style="margin-left: 27rem" name="lgn-btn">Update Password</button>
						</div>
					</div>
                    
				</form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function preview(){
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
</body> 