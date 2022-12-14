<body>
    <!-- container -->
    <div class="container-fluid">
        <!-- ROW FOR ALL DISPLAY -->
        <div class="row row-cols-1 row-cols-lg-2 justify-content-center" style="height: 100vh;">
            <!-- FIRST COLUMN FOR LOGO -->
            <div class="col d-flex flex-column align-items-center text-center align-self-center pb-0">
                <h1 class="align-items-center mb-0 mt-md-5"><strong> CCS<br> Class Record Managemenet <br> System</h1></strong>
                <img src="<?php echo base_url('assets/img/logo2.png')?>" class="img-fluid w-md-75" alt="LOGO">
            </div>

            <!-- SECOND COLUMN FOR LOGO -->
            <div class="col align-self-center my-auto p-5">
                <!-- LOGIN FORM -->
                <form action="<?php echo base_url('Signup/insert')?>" method="POST">
                    <label for="instructor ID" class="form-label fw-bold">
                        Instructor ID: 
                    </label>
                    <input type="text" class="form-control" style="background-color: yellow;" name="id">
                    <small><?php echo form_error('id'); ?></small>

					<label for="userName" class="form-label fw-bold">
                        First Name: 
                    </label>
                    <input type="text" class="form-control" style="background-color: yellow;" name="first_name">
                    <small><?php echo form_error('first_name'); ?></small>

					<label for="password" class="form-label fw-bold">
                        Middle Name: 
                    </label>
                    <input type="text" class="form-control" style="background-color: yellow;" name="middle_name">
                    <small><?php echo form_error('middle_name'); ?></small>
					
					<label for="confirmpassword" class="form-label fw-bold">
                        Last Name: 
                    </label>
                    <input type="text" class="form-control" style="background-color: yellow;" name="last_name">
					<small><?php echo form_error('last_name'); ?></small>

					<label for="confirmpassword" class="form-label fw-bold">
                        Password: 
                    </label>
                    <input type="password" class="form-control" style="background-color: yellow;" name="password">
                    <small><?php echo form_error('password'); ?></small>
					
					<label for="confirmpassword" class="form-label fw-bold">
                        Confirm Password: 
                    </label>
                    <input type="password" class="form-control" style="background-color: yellow;" name="confirm_password">
                    <small><?php echo form_error('password'); ?></small>

					<!-- ROW FOR BUTTON -->
                    <div class="row mt-5 text-center">
                        <!-- COLUMN FOR BUTTON -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-50" name="signup-btn">
                                Sign Up
                            </button>
                        </div>
                    </div>
                 
                    <div class="row text-center mt-5">
                        <div class="col">
                            <p class="mb-0">Don't have an account yet?</p>
                            <a href="<?php echo base_url()?>" class="link-dark">Log In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>