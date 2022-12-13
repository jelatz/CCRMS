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
				  <a href="<?php echo base_url('uploadstudent')?>" class="btn btn-light border border-2">Upload New Student</a>  
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-light border border-2">Settings</a>
                  <a href="<?php echo base_url('logout') ?>" class="btn btn-light border border-2">Logout</a>    
                </div>
            </div>
            <!-- END OF NAV TABS -->
            <!-- START OF CONTENT TAB -->
            <div class="col-10">
				
                <div class="container-fluid" style="background-color: rgb(17, 11, 89);">
					<p class="text-white text-start font-monospace pt-2">Kindly follow the sample to upload your new class in excel file or download class template <a href="<?php echo base_url('Uploader/SubjectTableFormatDownload') ?>"  style="color: yellow;">here</a>. Thank you!</p>
                    <div class="container-fluid text-end mb-3">
						<form action="<?php echo base_url('Uploader/uploadSubjects')?>" method="post" enctype="multipart/form-data" class="form-inline">
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
								<?php 
									if(count($subjects) > 0) : 
										echo
											"<tr>
												<th>Subject ID</th>
												<th>Subject</th>
												<th>Section</th>
												<th>Time</th>
												<th>Day</th>
												<th>Room</th>
												<th>Semester</th>
												<th>School Year</th>
											</tr>";
									else : 
										echo
											"<tr>
												<th>Subject Code</th>
												<th>Subject Description</th>
												<th>Section</th>
												<th>Time</th>
												<th>Day</th>
												<th>Room</th>
												<th>Semester</th>
												<th>School Year</th>
											</tr>";
									endif;
								?>
                            </thead>
                            <tbody>
								<?php 
									if(count($subjects) > 0) : 
										foreach ($subjects as $subject) : 
											echo
												"<tr>
													<td>".$subject->subject_id."</td>
													<td>".$subject->subject."</td>
													<td>".$subject->section."</td>
													<td>".$subject->class_time."</td>
													<td>".$subject->class_day."</td>
													<td>".$subject->room_location."</td>
													<td>".$subject->semester."</td>
													<td>".$subject->school_year."</td>
												</tr>";
										endforeach;
									else : 
										echo
											"<tr>
												<td>IT411</td>
												<td>Information Assurance and Security 2</td>
												<td>BSIT 4 - 4A</td>
												<td>7:00AM - 12:00PM</td>
												<td>Monday, Wednesday</td>
												<td>CCS Lab 1</td>
												<td>First</td>
												<td>2022-2023</td>
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