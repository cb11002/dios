<?php $this->load->view('template/v_user_header');?>
  <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
              <br>

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
											 <th width="10">No.</th>
                                            <th width="100">Date</th>
                                            <th  width="100">Time</th>
											
                                            <th  width="250">Tutor Name</th>
											<th>Content</th>
                                            <th  width="100">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
 
 if ($query== NULL) { 
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
		<td><?php echo $dg->Ap_Date; ?></td> 
		<td><?php echo $dg->Ap_Time; ?></td> 
		
		<td><?php echo $dg->Name; ?></td> 
		<td><?php echo $dg->Ap_Content; ?></td> 
		<td><?php if($dg->Ap_Status==0){echo 'Pending'; }else if($dg->Ap_Status==1){echo 'Approved'; }else if($dg->Ap_Status==3){echo 'Rejected'; } ?></td> 
		<td align="center" width="10">
		<a href="<?php echo site_url('student/kelas/delete_appoinment/' .$dg->Id_Appoinment); ?>" class="glyphicon glyphicon-remove" title="Remove">&nbsp;</a>
		
				
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