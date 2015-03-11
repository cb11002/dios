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
                 
                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                   <form  action="<? echo base_url()."student/kelas/searchclass"?>" method="POST"  class="form-horizontal" id="block-validate">
                                        
                                       
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Code Course</label>
                                            <div class="col-lg-4">
                                                <input type="text" required name="code_course" class="form-control" />
                                            </div>
											 <input type="submit" value="Search" class="btn btn-primary btn-small " />
                                        </div>
										 
                                    </form>
                                </div>
								<div class="panel-body">
                            <div class="table-responsive">
							     
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											 <th>No.</th>
                                            <th>Course Code</th>
                                            <th>Course</th>
											<th>Tutor Name</th>
                                            <th>Group</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
 
 if ($query == NULL) { 
 ?> 
 <div class="alert alert-error"> 
 <button type="button" class="close" data-dismiss="alert"></button> 
<h4>No Data !</h4>  
 </div> 
 <?php 
 } else { 
 $no = 1;
 foreach ($query as $dg) { 
?> 
	<tr> 
		<td><?php echo $no++; ?></td>
		<td><?php echo $dg->Course_Code; ?></td> 
		<td><?php echo $dg->Course; ?></td>  
		<td><?php echo $dg->Name; ?></td> 
		<td><?php echo $dg->Group; ?></td> 
		<td><?php echo $dg->Stime; ?>-<?php echo $dg->Etime; ?></td> 
		<td align="center" width="10">
		<a href="<?php echo site_url('student/kelas/joinclass/' .$dg->Id_Class.'/'.$dg->Id_Tutor); ?>" class="glyphicon glyphicon-ok" title="Join">&nbsp;
		
		
				
		</td>
	</tr> 
 <?php 
 } 
 } 
 ?> 
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                            </div>
                        </div>
                    </div>
  
                    </div>
                    
                    
                    

                </div>
				
          <!--END PAGE CONTENT -->
                     
<?php $this->load->view('template/v_user_footer');?>