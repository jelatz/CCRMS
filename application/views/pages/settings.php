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
                  <a href="<?php echo base_url('') ?>" class="btn btn-light border border-2">Logout</a>    
                </div>
            </div>
            <div class="col-md-10 px-5">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url('assets/CCRMS/Profile Picture_Accounts.png')?>" class="img-fluid" id="frame" title="" style="width: 8rem;">
                        <button type="file" class="position-relative rounded-pill fw-bold" style="top: 2rem; background-color: yellow;" onchange="preview()" accept="image/*" name="upload">
                            Update Photo
                        </button>
                    </div>
                </div>
                <form action="#" class="mt-3">
                    <div class="row my-3">
                        <label for="firstName" class="col-2 col-form-label">First Name: </label>
                          <div class="col-5">
                            <input type="text" class="form-control" required>
                          </div>
                    </div>
                    <div class="row my-3">
                        <label for="firstName" class="col-2 col-form-label">Middle Name: </label>
                          <div class="col-5">
                            <input type="text" class="form-control" required>
                          </div>
                    </div>
                    <div class="row my-3">
                        <label for="firstName" class="col-2 col-form-label">Last Name: </label>
                          <div class="col-5">
                            <input type="text" class="form-control" required>
                          </div>
                    </div>
                    <div class="row my-3">
                        <label for="firstName" class="col-2 col-form-label">Email Address: </label>
                          <div class="col-5">
                            <input type="email" class="form-control" required>
                          </div>
                    </div>
                    <button type="submit" class="btn rounded-pill fw-bold btn-sm mt-2 px-2" style="background-color: yellow;">Update Password</button>
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