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
                    <a href="<?php echo site_url('student/kelas/coursemate/'.$Id_Class.'/'.$Id_Tutor); ?>" >
                        <i class="icon-home"></i> Coursemate
	   
                       
                    </a>                   
                </li>
				 
				 <li class="panel">
                    <a href="<?php echo site_url('student/kelas/note/'.$Id_Class.'/'.$Id_Tutor); ?>" >
                        <i class="icon-home"></i> Note
	   
                       
                    </a>                   
                </li>
				 <li class="panel">
                    <a href="<?php echo site_url('student/kelas/asignment/'.$Id_Class.'/'.$Id_Tutor); ?>" >
                        <i class="icon-home"></i> Asignment
	   
                       
                    </a>                   
                </li>
              
            </ul>

        </div>
        <!--END MENU SECTION -->