<?php $this->load->view('template/v_user_header');?>
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
			$.post("<?php echo site_url('users/profile/getpass');?>", { "items1": items1, "items2": items2 },
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
			$.post("<?php echo site_url('users/profile/getpass');?>", { "items1": items1, "items2": items2 },
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
  <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-key"></i></div>
                                    <h5>Change Password</h5>
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
                                   <form  action="<? echo base_url()."users/profile/updatepwd"?>" method="POST" class="form-horizontal" id="block-validate">
                                           <div class="col-sm-12" id="lbloldpass"></div>
										   <div class="col-sm-12" id="lblpass"></div>
										   <?php
				if(isset($msg))
				{ 
					if($msg=='Your password successfully updated')
					{
						print '<div class="alert alert-success alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
					else if($msg=='Old password not match')
					{
						print '<div class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>';
						echo $msg;
						print '</p></div>';
					}
					else if($msg=='Password not match')
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
                                            <label class="control-label col-lg-4">Old Password</label>
                                            <div class="col-lg-4">
                                                <input type="password"  name="old" required class="form-control" id="oldpass" />
												
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-lg-4">New Password</label>
                                            <div class="col-lg-4">
                                                <input type="password"  name="pwd" required class="form-control" id="pass1" />
												
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-lg-4">Confirm Password</label>
                                            <div class="col-lg-4">
                                                <input type="password"  name="pwd1" required class="form-control" id="pass2" />
                                            </div>
											
                                        </div>
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:right;">
                                            <input type="submit" value="Save Change" class="btn btn-primary btn-lg " />
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