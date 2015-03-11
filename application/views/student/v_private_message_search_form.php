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
                                   <form  action="<? echo base_url()."student/kelas/add_private_message"?>" method="POST"  class="form-horizontal" id="block-validate">
                                        
                                       
										  <div class="form-group">
<label class="control-label col-lg-1">Message</label>
<div class="col-lg-12">
<textarea id="text10" name="message" required class="form-control"></textarea>
<input type="hidden" name="id_tutor" value="<?php echo $id; ?>"/>
</div>
</div> <div class="form-actions no-margin-bottom" style="text-align:right;">
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