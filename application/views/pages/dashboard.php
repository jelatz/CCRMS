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
<!-- NAVIGATION TABS START -->
        <div class="row row-cols-2">
            <div class="col-md-2">
                <div class="nav nav-pills flex-column gap-5">
                  <a href="<?php echo base_url('dashboard')?>" class="btn btn-light border border-2 active">Manage Class</a>  
                  <a href="<?php echo base_url('uploadclass')?>" class="btn btn-light border border-2">Upload New Class</a>  
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">Settings</a>  
                  <a href="<?php echo base_url('') ?>" class="btn btn-light border border-2">Logout</a>  
                </div>
            </div>
            <div class="col-md-10 px-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white fs-5 p-1" style="background-color: rgb(17, 11, 89);">Hello Professor Juan!</p>
                    </div>
                </div>
<!-- NAVIGATION TABS END -->

                <!-- NAV CONTENTS -->
                <div class="tab-contents">
                <div class="row table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>MONDAY</th>
                                <th>TUESDAY</th>
                                <th>WEDNESDAY</th>
                                <th>THURSDAY</th>
                                <th>FRIDAY</th>
                                <th>SATURDAY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="justify-content-center text-center">
                                <td>
                                    <input type="text">
                                </td>
                                <!-- <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">English</a></td> -->
                                <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">Filipino</a></td>
                                <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">Capstone 1</a></td>
                                <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">Math</a></td>
                                <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">Quantitative</a></td>
                                <td><a href="<?php echo base_url('classrecord');?>" class="text-decoration-none text-dark">Information Assurance</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>