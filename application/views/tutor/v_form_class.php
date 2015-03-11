<?php $this->load->view('template/v_user_header');?>
  <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                 <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>Add Class</h5>
                   <div class="toolbar">
				    <a href="<? echo base_url()."users/home"?>" class="btn btn-default btn-sm btn-grad btn-rect">List Class</a>
                       
                    </div>
                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                   <form  action="<? echo base_url()."tutor/kelas/savekelas"?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="block-validate">
                                           <?php
				if(isset($msg))
				{ 
					if($msg=='Class successfully add')
					{
						print '<div class="alert alert-success alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
					else if($msg=='Invalid Matric No/ Staff No')
					{
						print '<div class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
				}
			?>
										
										<!--<div class="form-group">
                                            <label class="control-label col-lg-4">Profile Picture</label>
                                            <div class="col-lg-3">
                                                <input type="file"  name="userfile" required class="form-control" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-lg-4">Type</label>
                                            <div class="col-lg-2">
                                                <select name="type" id="sport" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                    <option value="student"  <?php if($rsProfile->state=='kelantan')echo "selected";?>>Student</option>
                                                    <option value="tutor" >Tutor</option>
                                                   
                                                </select>
                                            </div>
                                        </div>-->
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Course Code</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="course_code" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Course</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="course" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Group</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="group" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Start Time</label>
                                            <div class="col-lg-2">
                                                <input type="time"  name="stime" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">End Time</label>
                                            <div class="col-lg-2">
                                                <input type="time"  name="etime" required class="form-control" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:right;">
                                            <input type="submit" value="Submit" class="btn btn-primary btn-small " />
                                        </div>
										
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                    
                    
                    

                </div>
          <!--END PAGE CONTENT -->
<?php $this->load->view('template/v_user_footer');?>