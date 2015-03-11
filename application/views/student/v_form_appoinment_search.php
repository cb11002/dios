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
                    <h5>Appoinment</h5>
                 
                </header>
                                <div id="collapseOne" class="accordion-body collapse in body">
                                   <form  action="<? echo base_url()."student/kelas/searchappoinment"?>" method="POST"  class="form-horizontal" id="block-validate">
                                        
                                       
										 <div class="form-group">
                                            <label class="control-label col-lg-4">Tutor Name</label>
                                            <div class="col-lg-3">
                                                
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
							 <div class="panel-body">
                            <div class="table-responsive"></div>
			 <form  action="<? echo base_url()."student/kelas/addappoinment"?>" method="POST"  class="form-horizontal" id="block-validate">
		   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
   <thead> <tr>
    <th>Date / Time</th>
    <th>8.00</th>
    <th>9.00</th>
    <th>10.00</th>
    <th>11.00</th>
	<th>12.00</th>
    <th>1.00</th>
	<th>2.00</th>
    <th>3.00</th>
	<th>4.00</th>
    <th>5.00</th>
    </thead></tr>
  <tr>
    <td>Monday</td>
    <td><label class="textbox1"><?php echo $m8;?><label>
     <td><label class="textbox1"><?php echo $m9;?></label>
    <td><label class="textbox1"><?php echo $m10;?></label>
    <td><label class="textbox1"><?php echo $m11;?></label>
    <td><label class="textbox1"><?php echo $m12;?></label>
     <td><label class="textbox1"><?php echo $m1;?></label>
    <td><label class="textbox1"><?php echo $m2;?></label>
    <td><label class="textbox1"><?php echo $m3;?></label>
    <td><label class="textbox1"><?php echo $m4;?></label>
    <td><label class="textbox1"><?php echo $m5;?></label>
  </tr>
  <tr>
   <td>Tuesday</td>
    <td><label class="textbox1"><?php echo $t8;?></label>
     <td><label class="textbox1"><?php echo $t9;?></label>
    <td><label class="textbox1"><?php echo $t10;?></label>
    <td><label class="textbox1"><?php echo $t11;?></label>
    <td><label class="textbox1"><?php echo $t12;?></label>
     <td><label class="textbox1"><?php echo $t1;?></label>
    <td><label class="textbox1"><?php echo $t2;?></label>
    <td><label class="textbox1"><?php echo $t3;?></label>
    <td><label class="textbox1"><?php echo $t4;?></label>
    <td><label class="textbox1"><?php echo $t5;?></label>
  </tr>
  <tr>
  <td>Wednesday</td>
    <td><label class="textbox1"><?php echo $w8;?></label>
     <td><label class="textbox1"><?php echo $w9;?></label>
    <td><label class="textbox1"><?php echo $w10;?></label>
    <td><label class="textbox1"><?php echo $w11;?></label>
    <td><label class="textbox1"><?php echo $w12;?></label>
     <td><label class="textbox1"><?php echo $w1;?></label>
    <td><label class="textbox1"><?php echo $w2;?></label>
    <td><label class="textbox1"><?php echo $w3;?></label>
    <td><label class="textbox1"><?php echo $w4;?></label>
    <td><label class="textbox1"><?php echo $w5;?></label>
  </tr>
  <tr>
    <td>Thursday</td>
     <td><label class="textbox1"><?php echo $th8;?></label>
     <td><label class="textbox1"><?php echo $th9;?></label>
    <td><label class="textbox1"><?php echo $th10;?></label>
    <td><label class="textbox1"><?php echo $th11;?></label>
    <td><label class="textbox1"><?php echo $th12;?></label>
     <td><label class="textbox1"><?php echo $th1;?></label>
    <td><label class="textbox1"><?php echo $th2;?></label>
    <td><label class="textbox1"><?php echo $th3;?></label>
    <td><label class="textbox1"><?php echo $th4;?></label>
    <td><label class="textbox1"><?php echo $th5;?></label>
  </tr>
  <tr>
    <td>Friday</td>
  <td><label class="textbox1"><?php echo $f8;?></label>
     <td><label class="textbox1"><?php echo $f9;?></label>
    <td><label class="textbox1"><?php echo $f10;?></label>
    <td><label class="textbox1"><?php echo $f11;?></label>
    <td><label class="textbox1"><?php echo $f12;?></label>
     <td><label class="textbox1"><?php echo $f1;?></label>
    <td><label class="textbox1"><?php echo $f2;?></label>
    <td><label class="textbox1"><?php echo $f3;?></label>
    <td><label class="textbox1"><?php echo $f4;?></label>
    <td><label class="textbox1"><?php echo $f5;?></label>
  </tr>
</table><hr>
<div class="form-group">
<label class="control-label col-lg-4"></label>
<div class="col-lg-5">
<label class="control-label col-lg-5">Set Appoinment</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Date</label>
<div class="col-lg-3">
<input type="date"  name="ap_date" required class="form-control" />
<input type="hidden"  name="id_tutor" value="<?php echo $id;?>" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Time</label>
<div class="col-lg-3">
<input type="time"  name="ap_time" required class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Content</label>
<div class="col-lg-3">
<textarea id="text10" name="content" required class="form-control"></textarea>
</div>
</div>
<div class="form-actions no-margin-bottom" style="text-align:right;">
<input type="submit" value="Submit" class="btn btn-primary btn-small " />
</div></form>
                       </div>
                            </div>
                        </div>
                    </div>
  
                    </div>
                    
                    
                    

                </div>
				
          <!--END PAGE CONTENT -->
                     
<?php $this->load->view('template/v_user_footer');?>