<?php $this->load->view('template/v_user_header');?>
    <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>Private Message</h5>
                 
                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                   <form  action="<? echo base_url()."student/kelas/search_private_message"?>" method="POST"  class="form-horizontal" id="block-validate">
                                        
                                       
										  <div class="form-group">
                                            <label class="control-label col-lg-4">Tutor Name</label>
                                            <div class="col-lg-4">
                                                
												 <select class="form-control"  name="id" required>
                                                        <option value="">--choose subject--</option>
														
                                                        <?php foreach($query as $each){ ?>
                                                        <option value="<?php echo $each->Id_Tutor; ?>"><?php echo $each->Name; ?></option>
                                                        <?php } ?>
														
                                                    </select>
                                            </div> <input type="submit" value="Search" class="btn btn-primary btn-small " />
											
                                        </div>
										 
                                    </form>
                                </div>
								<div class="panel-body">
                            <div class="table-responsive">
							     
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											 <th width="10">No.</th>
                                            <th>Name</th>
                                            <th>Staff No.</th>
										
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
		<td><?php echo $dg->Name; ?></td> 
		<td><?php echo $dg->Staff_No; ?></td>  
		
		<td align="center" width="10">
		<a href="<?php echo site_url('student/kelas/search_private_message_form/' .$dg->Id_Tutor); ?>" class="glyphicon glyphicon-envelope" title="Message">&nbsp;
		
		
				
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