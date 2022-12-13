<body>
<header>
    <div class="row">
        <div class="col-5 d-flex flex-row">
            <a href="<?php echo base_url('uploadclass') ?>"><img src="<?php echo base_url('assets/img/logo2.png') ?>" alt="logo" class="img-fluid" style="width:10rem;"></a>
            <p class="h4 mt-5">CCS <br> Class Record Management System</p>
        </div>
    </div>
</header>
    <div class="container-fluid mt-5">
        <div class="row row-cols-2">
            <!-- START OF NAV TABS -->
            <div class="col-2">
                <div class="nav nav-pills flex-column gap-5">
                  <a href="<?php echo base_url('dashboard')?>" class="btn btn-light border border-2">Manage Class</a>  
                  <a href="<?php echo base_url('uploadclass')?>" class="btn btn-light border border-2 active">Upload New Class</a>  
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">Settings</a>
                  <a href="<?php echo base_url('') ?>" class="btn btn-light border border-2">Logout</a>    
                </div>
            </div>
            <!-- END OF NAV TABS -->
            <!-- START OF CONTENT TAB -->
            <div class="col-10">
                <div class="container-fluid" style="background-color: rgb(17, 11, 89);">
                    <p class="text-white text-start font-monospace pt-2">Kindly follow the sample to upload your new class in excel file. Thank you!</p>
                    <div class="table-responsive px-5 py-4">
                        <table class="table table-bordered table-sm bg-white">
                            <thead>
                                <tr>
                                    <th>Student_ID</th>
                                    <th>Student Last_Name</th>
                                    <th>Student First_Name</th>
                                    <th>Student Middle_Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1011111</td>
                                    <td>Mouse</td>
                                    <td>Mickey</td>
                                    <td>Disney</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container-fluid text-end mt-3">
                    <button type="file" class="btn text-end text-dark fw-bold" style="background-color: yellow;">
                        Upload File
                    </button>
                </div>
            </div>
            <!-- END OF CONTENT TAB -->
        </div>
    </div>
</body>