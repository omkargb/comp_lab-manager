<?php
//including the database connection file
include_once("config.php");

//update values 
if(isset($_POST['update'])) 
{		
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$soname1 = mysqli_real_escape_string($mysqli, $_POST['soname1']);
	$soname2 = mysqli_real_escape_string($mysqli, $_POST['soname2']);
	$sovers = mysqli_real_escape_string($mysqli, $_POST['sovers']);
	$sopcid = mysqli_real_escape_string($mysqli, $_POST['sopcid']);
	$souse =  mysqli_real_escape_string($mysqli, $_POST['souse']);
	
		echo "<hr>";
		//insert data to database	
		$result = mysqli_query($mysqli, "UPDATE softwares SET SOFNAMEOS='$soname1',
		SOFNAMEGEN='$soname2',
		SOFVERS='$sovers',
		SOFPCID='$sopcid',
		SOFUSE='$souse'		WHERE id=$id ");
	
			header("Location:SO.php");
}
?>


<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM softwares WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$soname1 = $res['SOFNAMEOS'];
	$soname2 = $res['SOFNAMEGEN'];
	$sovers = $res['SOFVERS'];
	$sopcid = $res['SOFPCID'];
	$souse = $res['SOFUSE'];
	
	$disabled  = (empty($soname1)) ? "disabled='disabled'" : ""; 
	$readonly  = (empty($soname2)) ? "readonly='readonly'" : ""; 
}
?>


<html> 

<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"> 
    <title> software details edit </title> 
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css"> 
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css"> 
 </head> 

<body class="container bg-info"  style="font-family: 'rubik', sans-serif;"> 
    <div  >  
	<BR>
		<form method="post" autocomplete="off" action="soedit.php" name="soedit"> 
				<div class="card"> 
					<div class="card-header"> 
						<h5> Add / Edit Software details </h5> 
					</div> 
					
					<div class="card-body"> 
							<div class="form-row"> 
									
									
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label>  Operating System :&nbsp; </label> 
                                          <select class="form-control form-control-sm" name="soname1" <?php echo $disabled;?>> 
											<option value="<?php echo $soname1;?>" hidden> <?php echo $soname1;?> </option>
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
										<label> Other Software Name :&nbsp; </label> 
										<input class="form-control form-control-sm" type="text" name="soname2" value="<?php echo $soname2;?>" <?php echo $readonly;?> >  
										</div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> Version :&nbsp; </label> <input class="form-control form-control-sm" type="text" name="sovers" value="<?php echo $sovers;?>" required>  </div> 
										
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2" > 
										<label> PC id :&nbsp; </label> 
										<select class="form-control form-control-sm" name="sopcid" required> 
											<option value="<?php echo $sopcid;?>" hidden> <?php echo $sopcid;?> </option>
												<?php
													$list = mysqli_query($mysqli,"SELECT PCOID,PCOTYPE FROM `pco` ");
													while ($ro = mysqli_fetch_assoc($list)) {
													?>
														<option value="<?php echo $ro['PCOID'];?>" ><?php echo $ro['PCOID']; echo' - ';echo $ro['PCOTYPE'];?></option>
												<?php } ?>
										</select> 
										 </div> 
										
										<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
											<label> Software details / uses :&nbsp; </label> 
											<input class="form-control form-control-sm" type="text" name="souse" value="<?php echo $souse;?>"/>   
										</div> 
										
									<input type="text" name="id" value=<?php echo $_GET['id'];?> hidden>

								</div> 
							    <br> 
						</div> 
							
                <div class="card-footer">
                    <div class="form-row  ">
                        <div class="col-5 col-sm-4 col-md-4 col-lg-4 col-xl-4 offset-4 offset-sm-4">
							<button class="btn btn-success btn-sm float-left" type="submit" name="update" value="Update"> Update </button>
							<button class="btn btn-danger btn-sm float-right" type="reset">Clear data</button>
						</div>
                    </div>
                </div>
				
                 </div> 
		</form> 
			
     </div> 
 </body> 	
	<script src="../assets/js/jquery.min.js">  </script> 
    <script src="../assets/bootstrap/js/bootstrap.min.js">  </script> 


 </html> 