<?php $this->load->view('template/v_user_header');?>
  <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                   
                                <div class="row">
                <div class="col-lg-12">
                     <div class="box">
                <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>List Student Approve</h5>
                   <!--<div class="toolbar">
				    <a href="<? echo base_url()."tutor/kelas"?>" class="btn btn-default btn-sm btn-grad btn-rect">Add Class</a>
                       
                    </div>-->
                </header>
				
                        <div class="panel-body">
                            <div class="table-responsive">
							     
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											 <th width="10">No.</th>
                                            <th >Name</th>
                                            <th width="300">Staff No.</th>
											 <th width="300">IC No.</th>
											  <th width="300">Mobile Phone</th>
											 <th width="300">Email</th>
											  <th width="300">Program</th>
											 <th width="300">Semester</th>
                                            <!--<th  width="10">Action</th>-->
                                            
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
		<td><?php echo $dg->Name; ?></td> 
		<td><?php echo $dg->Staff_No; ?></td>  
		<td><?php echo $dg->IC_No; ?></td> 
		<td><?php echo $dg->Mobile_Phone; ?></td>  
		<td><?php echo $dg->Email; ?></td> 
		<td><?php echo $dg->Program; ?></td>  
		<td><?php echo $dg->Semester; ?></td>  
		<!--<td align="center" width="10">
		<a href="<?php echo site_url('tutor/kelas/admin_update_status_pending/' .$dg->Id_User); ?>" class="glyphicon glyphicon-ok" title="Approve">&nbsp;
		<a href="<?php echo site_url('tutor/kelas/admin_update_status_reject/' .$dg->Id_User); ?>" class="glyphicon glyphicon-remove" title="Reject">
		
				
		</td>-->
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