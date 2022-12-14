<body>
<header>
    <div class="row">
        <div class="col-5 d-flex flex-row">
            <a href="<?php echo base_url('uploadstudent') ?>"><img src="<?php echo base_url('assets/img/logo2.png') ?>" alt="logo" class="img-fluid" style="width:10rem;"></a>
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
                  <a href="<?php echo base_url('uploadclass')?>" class="btn btn-light border border-2">Upload New Class</a>  
				  <a href="<?php echo base_url('uploadstudent')?>" class="btn btn-light border border-2 active">Upload New Student</a>  
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">Settings</a>
                  <a href="<?php echo base_url('logout') ?>" class="btn btn-light border border-2">Logout</a>    
                </div>
            </div>
            <!-- END OF NAV TABS -->
            <!-- START OF CONTENT TAB -->
            <div class="col-10">
                <div class="container-fluid" style="background-color: rgb(17, 11, 89);">
                    <p class="text-white text-start font-monospace pt-2">Kindly follow the sample to upload your new class in excel file or download student template <a href="<?php echo base_url('Uploader/StudentTableFormatDownload') ?>" style="color: yellow;">here</a>. Thank you!</p>
                    <div class="container-fluid text-end mb-3">
						<form action="<?php echo base_url('Uploader/uploadStudents')?>" method="post" enctype="multipart/form-data" class="form-inline">
							<div class="row g-0 align-items-center">
								<div class="col">
									<div class="position-relative">
										<input type="file" name="file" id="file" class="form-control" required accept=".xls, .xlsx">
									</div>
								</div>
								<div class="col-auto ps-xl-2">
									<input type="submit" name="submit" value="Upload" class="btn text-end text-dark fw-bold" style="background-color: yellow;">
								</div>
							</div>
						</form>
					</div>
					<div class="table-responsive px-5 py-4">
                        <table class="table table-bordered table-sm bg-white">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Email</th>
									<th>Course & Year</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php 
									if(count($students) > 1) : 
										foreach ($students as $student) : 
											echo
												"<tr>
													<td>".$student->student."</td>
													<td>".$student->email_address."</td>
													<td>".$student->course_year."</td>
													<td>".$student->subject."</td>
												</tr>";
										endforeach;
									else : 
										echo
											"<tr>
												<td>101101</td>
												<td>Mickey Mouse</td>
												<td>BSIT 1</td>
												<td>IT412 Event Driven Programming</td>
											</tr>";
									endif;
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END OF CONTENT TAB -->
        </div>
    </div>
</body>