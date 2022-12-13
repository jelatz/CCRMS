<body>
    <!-- container -->
    <div class="container-fluid">
        <!-- ROW FOR ALL DISPLAY -->
        <div class="row row-cols-1 row-cols-lg-2 justify-content-center" style="height: 100vh;">
            <!-- FIRST COLUMN FOR LOGO -->
            <div class="col d-flex flex-column align-items-center text-center align-self-center pb-0">
                <h1 class="align-items-center mb-0 mt-md-5"><strong> CCS<br> Class Record Managemenet <br> System</h1></strong>
                <img src="<?php echo base_url('assets/img/logo2.png')?>" class="img-fluid w-md-75" alt="LOGO" onclick="window.open(<?php echo base_url('');?>)">
            </div>

            <!-- SECOND COLUMN FOR LOGO -->
            <div class="col align-self-center my-auto p-md-5">
                <!-- LOGIN FORM -->
                <form action="<?php echo base_url('dashboard')?>">
                    <label for="userName" class="form-label fw-bold">ID number: </label>
                    <input type="text" class="form-control mb-3" style="background-color: yellow;" accept="int">
                    <label for="password" class="form-label fw-bold">Password: </label>
                    <input type="password" class="form-control mb-3" style="background-color: yellow;">
                    <label for="confirmpassword" class="form-label fw-bold">Confirm Password: </label>
                    <input type="password" class="form-control" style="background-color: yellow;">
                    <!-- ROW FOR BUTTON -->
                    <div class="row mt-5 text-center">
                        <!-- COLUMN FOR BUTTON -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-50" name="lgn-btn">Change Password</button>
                        </div>
                    </div>
                 
                    <div class="row text-center mt-5">
                        <div class="col">
                            <p class="mb-0">Don't have an account yet?</p>
                            <a href="<?php echo base_url('signup')?>" class="link-dark">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>