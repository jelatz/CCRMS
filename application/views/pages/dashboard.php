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
				  <a href="<?php echo base_url('uploadstudent')?>" class="btn btn-light border border-2">Upload New Student</a>
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">Settings</a>  
                  <a href="<?php echo base_url('logout') ?>" class="btn btn-light border border-2">Logout</a>  
                </div>
            </div>
            <div class="col-md-10 px-5">
				<?php //echo $this->session->userdata('auth_user')->instructor_id; ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white fs-5 p-1" style="background-color: rgb(17, 11, 89);">Hello Professor <?php echo $this->session->userdata('auth_user')->first_name; ?>!</p>
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
                               <?php 
                                    if(count($monday) > 0) :
                                        foreach($monday as $mon) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$mon->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                                    if(count($tues) > 0) :
                                        foreach($tues as $tue) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$tue->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                                    if(count($wed) > 0) :
                                        foreach($wed as $wed) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$wed->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                                    if(count($thur) > 0) :
                                        foreach($thur as $thu) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$thu->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                                    if(count($fri) > 0) :
                                        foreach($fri as $fri) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$fri->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                                    if(count($sat) > 0) :
                                        foreach($sat as $sat) :
                                            echo "<td><a href=".base_url('classrecord')." class='text-decoration-none text-dark'>$sat->subject</a></td>";
                                        endforeach;
                                    else :
                                        echo "<td></td>";
                                    endif;
                               ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>