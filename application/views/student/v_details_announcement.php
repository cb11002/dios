<?php $this->load->view('template/v_user_header');?>
    <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-user"></i></div>
                                    <h5>Details Latest News</h5>
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
                                   <form  action="<? echo base_url()."tutor/kelas/savekelas"?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="block-validate">
                                        
                                       
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Title</label>
                                            <div class="col-lg-4">
                                                <input type="text"  readonly value="<?php echo $Title;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Content</label>
                                            <div class="col-lg-4">
                                               <textarea id="text10" readonly class="form-control"><?php echo $Content;?></textarea>
                                            </div>
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