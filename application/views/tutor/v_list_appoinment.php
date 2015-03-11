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
                    <h5>List Appoinment</h5>
                   <!--<div class="toolbar">
				    <a href="<? echo base_url()."tutor/kelas/form_announcement"?>" class="btn btn-default btn-sm btn-grad btn-rect">Add Announcement</a>
                       
                    </div>-->
                </header>
				
                        <div class="panel-body">
                            <div class="table-responsive">
							     
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											 <th width="10">No.</th>
                                           
                                           
                                            <th>Date</th>
                                            <th>Student Name</th>
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
		<td><?php $oDate = new DateTime($dg->Ap_Date); echo $sDate = $oDate->format("d/m/Y");?></td> 
		
		<td><?php echo $dg->Name; ?></td> 
		
		<td width="10">
		<a href="<?php echo site_url('tutor/kelas/details_appoinment/' .$dg->Id_Appoinment.'/'.$dg->Id_Student); ?>" class="glyphicon glyphicon-search" title="View">&nbsp;
		<a href="<?php echo site_url('tutor/kelas/delete_appoinment/' .$dg->Id_Appoinment); ?>" class="glyphicon glyphicon-remove" title="Remove">
		
				
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