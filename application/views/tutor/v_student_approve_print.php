<html>
<head>
<title>Demostrator Instructor Online System</title>
</head>
<body bgcolor="white" onload="window.print()">
<table>
<tr>
<td>Course Code</td>
<td>:</td>
<td><?php echo $Course_Code;?></td>
</tr>
<tr>
<td>Course</td>
<td>:</td>
<td><?php echo $Course;?></td>
</tr>
<tr>
<td>Group</td>
<td>:</td>
<td><?php echo $Group;?></td>
</tr>
<td>Time</td>
<td>:</td>
<td><?php echo $Stime;?></td>
</tr>
</table><br>
<table border="1" align="center">
	<tr>
		<th width="10">No.</th>
		<th width="300">Name</th>
		<th width="300">Matric No.</th>
	</tr>
	<tr>
		<?php 
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
		 ?> 
    </tr>
</table>
 <a class="btn btn-primary btn-small" href="<?php echo site_url('tutor/kelas/getstudentapprove/' .$Id_Class); ?>" title="Print">Back</a>
</body>
</html>
								