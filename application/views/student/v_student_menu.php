  <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url()?>images/profile/profile_resize_thumb/<?php echo $rsProfile->File_Name;?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $rsProfile->Username;?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="<?php echo site_url('users/home/'); ?>" >
                        <i class="icon-home"></i> Home
	   
                       
                    </a>                   
                </li>
             
               <li class="panel">
                    <a href="<?php echo site_url('student/kelas/'); ?>" >
                        <i class="icon-home"></i> Class
	   
                       
                    </a>                   
                </li>

				
				
				 <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#appoinment">
                        <i class="icon-bar-chart"></i> Appoinment
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="appoinment">
                        <li><a href="<?php echo site_url('student/kelas/appoinment'); ?>"><i class="icon-angle-right"></i>Set</a></li>
						 <li><a href="<?php echo site_url('student/kelas/appoinment_status'); ?>"><i class="icon-angle-right"></i>Status</a></li>
						 
                    </ul>
                </li>
				 <li class="panel">
                    <a href="<?php echo site_url('student/kelas/private_message'); ?>" >
                        <i class="icon-home"></i> Private Message
	   
                       
                    </a>                   
                </li>
              
            </ul>

        </div>
        <!--END MENU SECTION -->