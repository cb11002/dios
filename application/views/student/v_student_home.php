<?php $this->load->view('template/v_user_header');?>
  <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
              <br>

    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Latest News
                        </div>
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
	
                                <div class="list-group">
								 <a href="<?php echo site_url('student/kelas/details_announcement/' .$dg->Id_Announcement); ?>" class="list-group-item">
                                        <i class=" icon-info-sign"></i> <?php echo $dg->Title; ?>
                                   
                                  
                                    </a>
								
								
	</div>
	
	 
 <?php 
 } 
 } 
 ?> 
                    
               
                
            </div>
        <div class="row">
                <div class="col-lg-12">
                     <div class="box">
                <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>List Class</h5>
                   <!--<div class="toolbar">
				    <a href="<? echo base_url()."tutor/kelas"?>" class="btn btn-default btn-sm btn-grad btn-rect">Add Class</a>
                       
                    </div>-->
                </header>
				
                        <div class="panel-body">
                            <div class="table-responsive">
							     
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											 <th>No.</th>
                                            <th>Course Code</th>
                                            <th>Course</th>
                                            <th>Group</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
 
 if ($query2 == NULL) { 
 ?> 
 <div class="alert alert-error"> 
 <button type="button" class="close" data-dismiss="alert"></button> 
<h4>No Data !</h4>  
 </div> 
 <?php 
 } else { 
 $no = 1;
 foreach ($query2 as $dg) { 
?> 
	<tr> 
		<td><?php echo $no++; ?></td>
		<td><?php echo $dg->Course_Code; ?></td> 
		<td><?php echo $dg->Course; ?></td>  
		<td><?php echo $dg->Group; ?></td> 
		<td><?php echo $dg->Stime; ?>-<?php echo $dg->Etime; ?></td> 
		<td align="center" width="10">
		<a href="<?php echo site_url('student/kelas/details_kelas/' .$dg->Id_Class.'/'.$dg->Id_Tutor); ?>" class="glyphicon glyphicon-search" title="View">&nbsp;</a>
		
				
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