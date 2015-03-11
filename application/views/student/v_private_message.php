<?php $this->load->view('template/v_user_header');?>
<style>
.textbox1 {color:red }
</style>
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
						
                            </div>
                        </div>
                    </div>
  
                    </div>
                    
                    
                    

                </div>
				
          <!--END PAGE CONTENT -->
                     
<?php $this->load->view('template/v_user_footer');?>