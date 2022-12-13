<body>
<header>
    <div class="row">
        <div class="col-lg-5 d-flex">
            <a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('assets/img/logo2.png') ?>" alt="logo" class="img-fluid" style="width:10rem;"></a>
            <span>
                <p class="h4 mt-5">CCS <br> Class Record Management System</p>
            </span>
        </div>
        <div class="col-7 d-flex justify-content-end align-items-center">
                <a href="<?php echo base_url()?>" class="btn btn-light border border-2 me-5 fw-2 text-white" style="background-color: rgb(17, 11, 89);">
                    Logout
                    <i class="bi bi-arrow-right"></i>
                </a>   
        </div> 
    </div>
</header>
    <div class="container-fluid mt-5">
        <div class="row row-cols-2">
            <div class="col-md-2">
                <div class="nav nav-pills flex-column gap-5">
                    <a href="<?php echo base_url('dashboard')?>" class="btn btn-light border border-2">
                        Manage Class
                    </a>  
                    <a href="<?php echo base_url('uploadclass')?>" class="btn btn-light border border-2">
                        Upload New Class
                    </a>  
                    <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">
                    Settings
                    </a>
                    <a href="<?php echo base_url('dashboard') ?>" class="btn btn-light border border-2 text-white" style="background-color: rgb(17, 11, 89);">
                    Go back to your class list            <i class="bi bi-arrow-left fa-lg"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-10 px-5">
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <p class="text-white fs-5 p-1" style="background-color: rgb(17, 11, 89);">SUBJECT NAME, TIME AND SECTION</p>
                    </div>
                </div>
                <!-- NAV CONTENTS -->
                <div class="tab-contents">
                <div class="row table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Attendance</th>
                                <th>Quiz</th>
                                <th>Assignment</th>
                                <th>Prelim</th>
                                <th>Midterm</th>
                                <th>PreFinal</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Janna BONJOOUUUURR</td>
                                <td>ALWAYS ABSENT!</td>
                                <td>100(cheating)</td>
                                <td>100(cheating)</td>
                                <td>Tiktok</td>
                                <td>story</td>
                                <td>beach</td>
                                <td>Tent</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>