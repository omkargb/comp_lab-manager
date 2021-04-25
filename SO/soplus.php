<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"> 
    <title>Add software </title> 
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css"> 
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../assets/css/styles.css"> 
 </head> 


<body class="container-fluid"   style="font-family: 'rubik', sans-serif;"> 


<?php
//including the database connection file
include_once("config.php");

//adding values 
if(isset($_POST['Submit'])) 
{	
	$soname1 = mysqli_real_escape_string($mysqli, $_POST['soname1']);
	$soname2 = mysqli_real_escape_string($mysqli, $_POST['soname2']);
	$sovers = mysqli_real_escape_string($mysqli, $_POST['sovers']);
	$sopcid = mysqli_real_escape_string($mysqli, $_POST['sopcid']);
	$souse =  mysqli_real_escape_string($mysqli, $_POST['souse']);
	
		echo "<hr>";
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO softwares (SOFNAMEOS,SOFNAMEGEN,SOFVERS,SOFPCID,SOFUSE) VALUES ('$soname1','$soname2','$sovers','$sopcid','$souse')");
	
		if (mysqli_query($mysqli, $result)) 
		{
		      echo "Error: " .$result. "<hr>" . mysqli_error($mysqli);	
		} 
		else 
		{
			echo "<h5 class='text-success'>New record created successfully.<hr></h5>";
			echo '<script>alert("Data added successfully... Refresh your webpage.")</script>';
		}
}
?>
	<br>
				<div class="">
					<ul class="nav nav-tabs nav-fill">
						<li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-1" class="nav-link active btn"><b>OS</b></a></li>
						<li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-2" class="nav-link btn "><b>Other</b></a></li>
					</ul>
				<hr>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade show active" id="tab-1">
						<form method="post" autocomplete="off" action="soplus.php" name="soplus1"> 
							<div class="form-row"> 									
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label>  Operating System :&nbsp; </label> 
                                          <select class="form-control form-control-sm" name="soname1" required> 
                                                <option value="" selected="" > - - </option> 
                                                <option value="Windows XP" > Windows XP </option> 
                                                <option value="Windows 7"> Windows 7 </option> 
                                                <option value="Windows 8/8.1"> Windows 8/8.1 </option> 
                                                <option value="Windows 10"> Windows 10 </option> 
                                                <option value="Windows Server"> Windows Server </option> 
                                                <option value="Red hat linux"> Red Hat Linux </option> 
                                                <option value="Ubuntu"> Ubuntu </option> 
                                          </select> 									
									</div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> Version :&nbsp; </label> <input class="form-control form-control-sm" type="text" name="sovers" value="" >  
										</div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> PCid :&nbsp; </label> 
										<select class="form-control form-control-sm" name="sopcid" required> 
											<option value="" readonly> - - </option>
												<?php
													$list = mysqli_query($mysqli,"SELECT PCOID,PCOTYPE FROM `pco` ");
													while ($ro = mysqli_fetch_assoc($list)) {
													?>
														<option value="<?php echo $ro['PCOID'];?>" ><?php echo $ro['PCOID']; echo' - ';echo $ro['PCOTYPE'];?></option>
												<?php } ?>
										</select> 
										</div> 
										
										<div class="col-12"> 
											<label> Software details / uses :&nbsp; </label> 
											<input class="form-control form-control-sm" type="text" name="souse" value=""/>   
										</div> 
									</div> 
									<br>
									<div class="bg-light text-center p-2">
										<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Submit">Submit</button> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;
										<button class="btn btn-primary btn-sm" type="reset">Clear</button>
									</div>
								<br>
						</form> 

					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab-2">
						<form method="post" autocomplete="off" action="soplus.php" name="soplus2"> 
							<div class="form-row"> 									
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> Software Name :&nbsp; </label> 
										<input class="form-control form-control-sm" type="text" name="soname2" value="" required>  
										</div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> Version :&nbsp; </label> <input class="form-control form-control-sm" type="text" name="sovers" value="" required>  
										</div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> PCid :&nbsp; </label> 
										<select class="form-control form-control-sm" name="sopcid" required> 
											<option value="" readonly> - - </option>
												<?php
													$list = mysqli_query($mysqli,"SELECT PCOID,PCOTYPE FROM `pco` ");
													while ($ro = mysqli_fetch_assoc($list)) {
													?>
														<option value="<?php echo $ro['PCOID'];?>" ><?php echo $ro['PCOID']; echo' - ';echo $ro['PCOTYPE'];?></option>
												<?php } ?>
										</select> 
										</div> 
										
										<div class="col-12"> 
											<label> Software details / uses :&nbsp; </label> 
											<input class="form-control form-control-sm" type="text" name="souse" value=""/>   
										</div> 
									</div> 
									<br>
									<div class="bg-light text-center p-2">
										<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Submit">Add Device</button> &nbsp; &nbsp;  &nbsp; &nbsp;
										<button class="btn btn-primary btn-sm" type="reset">Clear</button>
									</div>
								<br>
						</form> 

					</div>
				</div>
			</div>
			
			
	 </body> 
 
	
	<script src="../assets/js/jquery.min.js">  </script> 
    <script src="../assets/bootstrap/js/bootstrap.min.js">  </script> 

 </html> 
 