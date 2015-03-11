<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
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
    <!--END GLOBAL STYLES --> 

    <!-- PAGE LEVEL STYLES -->
    
 <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
   <script type="text/javascript" src="<? echo base_url()?>assets/js/jquery.js"></script>
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
	 <script language="javascript">
	function validate(){
		return false;
	}
	$(document).ready(function() {
		
		$("#oldpass").change(function(){
		 var items = $("#oldpass").val();
			$.post("<?php echo site_url('users/profile/getoldpass');?>", { "items": items },
			 function(data){
				// alert(data.somefield);
				 $("#lbloldpass").html(data.somefield);
				 //$("#hiddenusername").val(data.placementid);
			  // alert(data.name); // John
			   //console.log(data.time); //  2pm
			 }, "json");
		 });
		 
		$("#pass2").change(function(){
		 var items1 = $("#pass1").val();
		 var items2 = $("#pass2").val();
			$.post("<?php echo site_url('users/register_account/getpass');?>", { "items1": items1, "items2": items2 },
			 function(data){
				// alert(data.somefield);
				 $("#lblpass").html(data.somefield);
				// $("#lblsponsorName").val(data.placementid);
			  // alert(data.name); // John
			   //console.log(data.time); //  2pm
			 }, "json");
		 });
		 
		 $("#pass1").change(function(){
		 var items1 = $("#pass1").val();
		 var items2 = $("#pass2").val();
			$.post("<?php echo site_url('users/register_account/getpass');?>", { "items1": items1, "items2": items2 },
			 function(data){
				// alert(data.somefield);
				 $("#lblpass").html(data.somefield);
				// $("#lblsponsorName").val(data.placementid);
			  // alert(data.name); // John
			   //console.log(data.time); //  2pm
			 }, "json");
		 });
		 
		 
	});
</script>
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

                    <a href="index.html" class="navbar-brand">
                    <img src="<?php echo base_url();?>assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



      
       <!--PAGE CONTENT -->
       
           
                <div class="inners">
                  
                       

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Sign Up</h5>
                                  

                                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                    
									<form  action="<? echo base_url()."users/register_account/save"?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="block-validate">
                                           <?php
				if(isset($msg))
				{ 
					if($msg=='Password not match')
					{
						print '<div class="alert alert-danger alert-dismissable">
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
										
										<div class="form-group">
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
                                                    <option value="student">Student</option>
                                                    <option value="tutor">Tutor</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="name" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Matric ID/Staff ID</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="matric" required class="form-control" />
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">IC No.</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="ic" required class="form-control" maxlenght="1"/>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Program</label>
                                            <div class="col-lg-3">
                                                <input type="text"  name="program" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Semester</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="semester" required class="form-control" />
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Mobile Phone</label>
                                            <div class="col-lg-2">
                                                <input type="text"  name="phone" required class="form-control" />
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-lg-4">Email</label>
                                            <div class="col-lg-3">
                                                <input type="email"  name="email" required class="form-control" />
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>
                                            <div class="col-lg-2">
                                                <input type="password"  name="pwd" required class="form-control" id="pass1" />
												<span id="lblpass" ></span>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Confirm Password</label>
                                            <div class="col-lg-2">
                                                <input type="password"  name="pwd1" required class="form-control" id="pass2" />
                                            </div>
											
                                        </div>
										
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" value="Register Account" class="btn btn-primary btn-lg " />
                                        </div>
										 <div class="form-actions no-margin-bottom" style="text-align:right;">
                                          <p class="change_link">  
									Already a member ?
									<a href="<?php echo base_url()."users/login";?>" class="to_register"> Go and log in </a>
								</p>
                                        </div>
										
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    </div>
                    
                    
                    

                
          <!--END PAGE CONTENT -->

                </div>
        
    
       <!--END MAIN WRAPPER -->
 <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->

    <script src="<?php echo base_url();?>assets/js/notifications.js"></script>
  <script>
      $(function () { Notifications(); });
        </script>     
        <!--END PAGE LEVEL SCRIPTS -->
    
</body>
     <!-- END BODY -->
</html>
