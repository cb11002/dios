<?php $this->load->view('template/v_user_header');?>
<style>
.textbox1 {color:blue }
</style>
  <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
              <br>


                <div class="row">
                <div class="col-lg-12">
                     <div class="box">
                <header>
                    <div class="icons"><i class="icon-th-list"></i></div>
                    <h5>Schedule</h5>
                   <!--<div class="toolbar">
				    <a href="<? echo base_url()."tutor/kelas/form_announcement"?>" class="btn btn-default btn-sm btn-grad btn-rect">Add Announcement</a>
                       
                    </div>-->
                </header>
				
                        <div class="panel-body">
                            <div class="table-responsive"></div>
			 <form  action="<? echo base_url()."tutor/kelas/save_schedule"?>" method="POST"  class="form-horizontal" id="block-validate">
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
    <td><input type="text" name="m8" size="5" value="<?php echo $m8;?>" class="textbox1"></td>
     <td><input type="text" name="m9" size="5" value="<?php echo $m9;?>" class="textbox1"></td>
    <td><input type="text" name="m10" size="5" value="<?php echo $m10;?>" class="textbox1"></td>
    <td><input type="text" name="m11" size="5" value="<?php echo $m11;?>" class="textbox1"></td>
    <td><input type="text" name="m12" size="5" value="<?php echo $m12;?>" class="textbox1"></td>
     <td><input type="text" name="m1" size="5" value="<?php echo $m1;?>" class="textbox1"></td>
    <td><input type="text" name="m2" size="5" value="<?php echo $m2;?>" class="textbox1"></td>
    <td><input type="text" name="m3" size="5" value="<?php echo $m3;?>" class="textbox1"></td>
    <td><input type="text" name="m4" size="5" value="<?php echo $m4;?>" class="textbox1"></td>
    <td><input type="text" name="m5" size="5" value="<?php echo $m5;?>" class="textbox1"></td>
  </tr>
  <tr>
   <td>Tuesday</td>
    <td><input type="text" name="t8" size="5" value="<?php echo $t8;?>" class="textbox1"></td>
     <td><input type="text" name="t9" size="5" value="<?php echo $t9;?>" class="textbox1"></td>
    <td><input type="text" name="t10" size="5" value="<?php echo $t10;?>" class="textbox1"></td>
    <td><input type="text" name="t11" size="5" value="<?php echo $t11;?>" class="textbox1"></td>
    <td><input type="text" name="t12" size="5" value="<?php echo $t12;?>" class="textbox1"></td>
     <td><input type="text" name="t1" size="5" value="<?php echo $t1;?>" class="textbox1"></td>
    <td><input type="text" name="t2" size="5" value="<?php echo $t2;?>" class="textbox1"></td>
    <td><input type="text" name="t3" size="5" value="<?php echo $t3;?>" class="textbox1"></td>
    <td><input type="text" name="t4" size="5" value="<?php echo $t4;?>" class="textbox1"></td>
    <td><input type="text" name="t5" size="5" value="<?php echo $t5;?>" class="textbox1"></td>
  </tr>
  <tr>
  <td>Wednesday</td>
    <td><input type="text" name="w8" size="5" value="<?php echo $w8;?>" class="textbox1"></td>
     <td><input type="text" name="w9" size="5" value="<?php echo $w9;?>" class="textbox1"></td>
    <td><input type="text" name="w10" size="5" value="<?php echo $w10;?>" class="textbox1"></td>
    <td><input type="text" name="w11" size="5" value="<?php echo $w11;?>" class="textbox1"></td>
    <td><input type="text" name="w12" size="5" value="<?php echo $w12;?>" class="textbox1"></td>
     <td><input type="text" name="w1" size="5" value="<?php echo $w1;?>" class="textbox1"></td>
    <td><input type="text" name="w2" size="5" value="<?php echo $w2;?>" class="textbox1"></td>
    <td><input type="text" name="w3" size="5" value="<?php echo $w3;?>" class="textbox1"></td>
    <td><input type="text" name="w4" size="5" value="<?php echo $w4;?>" class="textbox1"></td>
    <td><input type="text" name="w5" size="5" value="<?php echo $w5;?>" class="textbox1"></td>
  </tr>
  <tr>
    <td>Thursday</td>
     <td><input type="text" name="th8" size="5" value="<?php echo $th8;?>" class="textbox1"></td>
     <td><input type="text" name="th9" size="5" value="<?php echo $th9;?>" class="textbox1"></td>
    <td><input type="text" name="th10" size="5" value="<?php echo $th10;?>" class="textbox1"></td>
    <td><input type="text" name="th11" size="5" value="<?php echo $th11;?>" class="textbox1"></td>
    <td><input type="text" name="th12" size="5" value="<?php echo $th12;?>" class="textbox1"></td>
     <td><input type="text" name="th1" size="5" value="<?php echo $th1;?>" class="textbox1"></td>
    <td><input type="text" name="th2" size="5" value="<?php echo $th2;?>" class="textbox1"></td>
    <td><input type="text" name="th3" size="5" value="<?php echo $th3;?>" class="textbox1"></td>
    <td><input type="text" name="th4" size="5" value="<?php echo $th4;?>" class="textbox1"></td>
    <td><input type="text" name="th5" size="5" value="<?php echo $th5;?>" class="textbox1"></td>
  </tr>
  <tr>
    <td>Friday</td>
  <td><input type="text" name="f8" size="5" value="<?php echo $f8;?>" class="textbox1"></td>
     <td><input type="text" name="f9" size="5" value="<?php echo $f9;?>" class="textbox1"></td>
    <td><input type="text" name="f10" size="5" value="<?php echo $f10;?>" class="textbox1"></td>
    <td><input type="text" name="f11" size="5" value="<?php echo $f11;?>" class="textbox1"></td>
    <td><input type="text" name="f12" size="5" value="<?php echo $f12;?>" class="textbox1"></td>
     <td><input type="text" name="f1" size="5" value="<?php echo $f1;?>" class="textbox1"></td>
    <td><input type="text" name="f2" size="5" value="<?php echo $f2;?>" class="textbox1"></td>
    <td><input type="text" name="f3" size="5" value="<?php echo $f3;?>" class="textbox1"></td>
    <td><input type="text" name="f4" size="5" value="<?php echo $f4;?>" class="textbox1"></td>
    <td><input type="text" name="f5" size="5" value="<?php echo $f5;?>" class="textbox1"></td>
  </tr>
</table>

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