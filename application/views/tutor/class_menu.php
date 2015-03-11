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
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#class">
                        <i class="icon-bar-chart"></i> Class
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="class">
                        <li><a href="<?php echo site_url('tutor/kelas/getstudentpending/' .$Id_Class); ?>"><i class="icon-angle-right"></i>List Student Pending </a></li>
						 <li><a href="<?php echo site_url('tutor/kelas/getstudentapprove/' .$Id_Class); ?>"><i class="icon-angle-right"></i>List Student Approve </a></li>
                    </ul>
                </li>
				  <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#attendance">
                        <i class="icon-bar-chart"></i> Attendance
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="attendance">
                       
						 <li><a href="<?php echo site_url('tutor/kelas/make_attendance/' .$Id_Class); ?>"><i class="icon-angle-right"></i>Make</a></li>
						 <li><a href="<?php echo site_url('tutor/kelas/report_attendance/' .$Id_Class); ?>"><i class="icon-angle-right"></i>Report</a></li>
                    </ul>
                </li>
				 <li class="panel">
                    <a href="<?php echo site_url('tutor/kelas/note/'.$Id_Class); ?>" >
                        <i class="icon-home"></i> Note
	   
                       
                    </a>                   
                </li>
				 <li class="panel">
                    <a href="<?php echo site_url('tutor/kelas/asignment/'.$Id_Class); ?>" >
                        <i class="icon-home"></i> Asignment
	   
                       
                    </a>                   
                </li>
              
            </ul>

        </div>
        <!--END MENU SECTION -->