


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
            <div class="col align-self-center my-auto p-md-5">
                <!-- LOGIN FORM -->
            
                <form action="<?php echo base_url('login')?>" method="POST">
                    <label for="id_number" class="form-label fw-bold">ID Number: </label>
                    <input type="text" class="form-control mb-3" style="background-color: yellow;" name="id_number">
					<small><?php echo form_error('id_number'); ?></small>

                    <label for="password" class="form-label fw-bold">Password: </label>
                    <input type="password" class="form-control" style="background-color: yellow;" name="password">
					<small><?php echo form_error('password'); ?></small>

					<?php if ($this->session->flashdata('status')) : ?>
						<br>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('status'); ?>
						</div>
					<?php endif; ?>

                    <!-- ROW FOR BUTTON -->
                    <div class="row mt-5 text-center">
                        <!-- COLUMN FOR BUTTON -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-50" name="lgn-btn">LOG IN</button>
                        </div>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col">
                            <p class="mb-0">Don't have an account yet?</p>
                            <a href="<?php echo base_url('signup')?>" class="link-primary">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>