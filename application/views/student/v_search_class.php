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
						
                            </div>
                        </div>
                    </div>
  
                    </div>
                    
                    
                    

                </div>
				
          <!--END PAGE CONTENT -->
                     
<?php $this->load->view('template/v_user_footer');?>