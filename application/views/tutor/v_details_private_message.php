<?php $this->load->view('template/v_user_header');?>
  <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-user"></i></div>
                                    <h5>Details Appoinment</h5>
                                    <div class="toolbar">
                                        <ul class="nav">
                                            <li>
                                                <div class="btn-group">
                                                    <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                        href="#collapseOne">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                   
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                   <form  action="<? echo base_url()."tutor/kelas/reply_message"?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="block-validate">
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
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-4">
                                                <input type="text"  name="course" readonly value="<?php echo $Name;?>" class="form-control" />
												 <input type="hidden"  name="id_private" readonly value="<?php echo $Id_Private_Message;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Matric No.</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="course" readonly value="<?php echo $Matric_No;?>" class="form-control" />
												
                                            </div>
                                        </div>
										 
										<div class="form-group">
										<label class="control-label col-lg-4">Message From Student</label>
										<div class="col-lg-5">
										<textarea id="text10" name="content" readonly class="form-control"><?php echo $Message;?></textarea>
										</div>
										</div>
										<div class="form-group">
										<label class="control-label col-lg-4">Reply Message</label>
										<div class="col-lg-5">
										<textarea id="text10" name="reply_ms" required class="form-control"></textarea>
										</div>
										</div>
										 <div class="form-actions no-margin-bottom" style="text-align:right;">
<input type="submit" name="go" value="Reply" class="btn btn-primary btn-small " />
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