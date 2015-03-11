<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>Demostrator Instructor Online System</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
	<script type="text/javascript" src="<? echo base_url()?>assets/js/jquery.js"></script>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<? echo base_url()."users/home"?>" class="navbar-brand">
                    <img src="<?php echo base_url();?>assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">



                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<? echo base_url()."users/profile"?>"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="<? echo base_url()."users/profile/cpwd"?>"><i class="icon-key"></i> Changes Password </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<? echo base_url()."users/home/logout"?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->
		 <?php $this->load->view('tutor/class_menu');?>

  <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-user"></i></div>
                                    <h5>Class Info</h5>
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
                                   <form  action="<? echo base_url()."tutor/kelas/save_attendance"?>" method="POST"  class="form-horizontal" id="block-validate">
                                           <?php
				if(isset($msg))
				{ 
					if($msg=='Class successfully add')
					{
						print '<div class="alert alert-success alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
					else if($msg=='Invalid Matric No/ Staff No')
					{
						print '<div class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
				}
			?>
										
										<!--<div class="form-group">
                                            <label class="control-label col-lg-4">Profile Picture</label>
                                            <div class="col-lg-3">
                                                <input type="file"  name="userfile" required class="form-control" />
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-lg-4">Type</label>
                                            <div class="col-lg-2">
                                                <select name="type" id="sport" class="form-control" required>
                                                    <option value="">-Choose-</option>
                                                    <option value="student"  <?php if($rsProfile->state=='kelantan')echo "selected";?>>Student</option>
                                                    <option value="tutor" >Tutor</option>
                                                   
                                                </select>
                                            </div>
                                        </div>-->
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Course Code</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="course_code" readonly value="<?php echo $Course_Code;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Course</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="course" readonly value="<?php echo $Course;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Group</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="group" readonly value="<?php echo $Group;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Start Time</label>
                                            <div class="col-lg-3">
                                                <input type="time"  name="stime" readonly value="<?php echo $Stime;?>" class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">End Time</label>
                                            <div class="col-lg-3">
                                                <input type="time"  name="etime" readonly value="<?php echo $Etime;?>" class="form-control" />
                                            </div>
                                        </div>
										
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                                <div class="row">
                <div class="col-lg-12">
                     <div class="box">
                <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>Report Attendance</h5>
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
                                            <th >Name</th>
                                            <th width="300">Matric No.</th>
                                           
                                            
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
		<td><?php echo $dg->Name; ?></td> 
		<td><?php echo $dg->Matric_No; ?></td>  
		
		
	</tr> 
 <?php 
 } 
 } 
 ?> 
                                       
                                      
                                    </tbody>
                                </table>
								 <div class="form-actions no-margin-bottom" style="text-align:right;">
								 <a class="btn btn-primary btn-small" href="<?php echo site_url('tutor/kelas/all_report_attendance_print/' .$Id_Class.'/'.$dg->Date); ?>" title="Print">Print</a>
								 </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                    
                    
                    

                </div>
				 </form>
          <!--END PAGE CONTENT -->
<?php $this->load->view('template/v_user_footer');?>