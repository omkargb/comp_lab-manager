<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Printer/scanner add</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body  style="font-family: 'rubik', sans-serif;">

<?php
//including the database connection file
include_once("config.php");

//adding values 
if(isset($_POST['Submit'])) 
{	
	$pstype = mysqli_real_escape_string($mysqli, $_POST['pstype']);
	$pslname = mysqli_real_escape_string($mysqli, $_POST['pslname']);
	$psbmod = mysqli_real_escape_string($mysqli, $_POST['psbmod']);
	$psserial = mysqli_real_escape_string($mysqli, $_POST['psserial']);
	$psfun =  mysqli_real_escape_string($mysqli, $_POST['psfun']);
	$psink =  mysqli_real_escape_string($mysqli, $_POST['psink']);
	$psindate =  mysqli_real_escape_string($mysqli, $_POST['psindate']);
	$psoutdate =  mysqli_real_escape_string($mysqli, $_POST['psoutdate']);
	$psprice =  mysqli_real_escape_string($mysqli, $_POST['psprice']);

	
		echo "<hr>";
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO priscan (PSCTYPE,PSCLNAME,PSCBMOD,PSCSERIAL,PSCFUN,PSCINK,PSCINDATE,PSCOUTDATE,PSCPRICE) VALUES ('$pstype','$pslname','$psbmod','$psserial','$psfun','$psink','$psindate','$psoutdate','$psprice')");
	
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

 

 <div class="container-fluid  bg-light" >
	    
		<br>
    <ul class="nav nav-tabs nav-justified text-center border">
        <li class="nav-item bg-light"><b role="tab" data-toggle="tab" href="#tab-1" class="nav-link active text-center">Printer</b></li>
        <li class="nav-item bg-light"><b role="tab" data-toggle="tab" href="#tab-2" class="nav-link">Scanner</b></li>
    </ul>
    <div class="tab-content card card-body ">
	
       <div role="tabpanel" class="tab-pane fade show active" id="tab-1">
		<form method="post" autocomplete="off"  action="psplus.php" name="psplus1">
                <div class="form-row">
					<input value="Printer" name="pstype"  hidden />
					
                    <div class="col-sm-6 col-md-6 col-lg-7 col-xl-7">
					<label>BRAND &amp; MODEL :</label><input class="form-control form-control-sm" type="text" name="psbmod" required="" placeholder="Enter brand and model" minlength="2"/>
                        <br>
                    </div>					
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>LAB name :</label>
					<select class="form-control form-control-sm" name="pslname" required="">
							<option value="" readonly> - - </option>
						<?php
							$list = mysqli_query($mysqli,"SELECT LABNAME FROM `labs` ");
							while ($ro = mysqli_fetch_assoc($list)) {
						?>
						<option value="<?php echo $ro['LABNAME'];?>" ><?php echo $ro['LABNAME'];?></option>
						<?php } ?>
					</select>
                        <br>
                    </div>   
					
					
                    <div class="col-sm-6 col-md-6 col-lg-5 col-xl-5">
					<label>SERIAL NO. :</label>
					<input class="form-control form-control-sm" type="text" name="psserial" required="" placeholder="Enter serial number"/>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>INK TYPE :</label>
					<select class="form-control form-control-sm" name="psink" required="">
					<option value="" selected=""></option>
					<option value="Black and white - Grayscale" >Black and white - Grayscale</option>
					<option value="Color" >Color</option>
					</select>
                        <br>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label class="text-uppercase"> Printer Functions :</label>
					<select class="form-control form-control-sm" name="psfun" required>
					<option value="" selected=""></option>
					<option value="Single function Inkjet">Single function Inkjet - print</option>
					<option value="Single function Laser">Single function Laser - print</option>
					<option value="Multi function Inkjet">Multi function Inkjet - Print, Scan/Xerox</option>
					<option value="Multi function Laser">Multi function Laser - Print, Scan/Xerox</option>
					</select>
                        <br>
                    </div>   
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>INSTALL DATE :</label>
					<input class="form-control form-control-sm" type="date" name="psindate" required="" min="2005-01-01" id="datein1" max="">
						<script>
						datein1.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>SCRAP DATE :</label><input class="form-control form-control-sm" type="date" name="psoutdate" min="2005-01-01" id="dateout1" max="">
						<script>
						dateout1.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>PRICE <i class="fa fa-inr"></i> : </label>
					<input class="form-control form-control-sm" type="number" name="psprice" required="" placeholder="Numbers only" min="1">
                        <br>
                    </div>
					
                </div>
				
			
            <div class="card-footer">
                <div class="form-row visible">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 offset-3 offset-sm-4">
						<button class="btn btn-success btn-sm" name="Submit" type="submit" value="Submit">ADD </button></div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
						<button class="btn btn-primary btn-sm" type="reset">Clear</button></div>
				</div>
            </div>

		</form>
       </div>
		
        <div role="tabpanel" class="tab-pane fade" id="tab-2">
			<form method="post" autocomplete="off"  action="psplus.php" name="psplus2">

                <div class="form-row">
				
				<input value="Scanner" name="pstype" hidden />
					
                    <div class="col-sm-6 col-md-6 col-lg-7 col-xl-7">
					<label>BRAND &amp; MODEL :</label><input class="form-control form-control-sm" type="text" name="psbmod" required="" placeholder="Enter brand and model" minlength="2">
                        <br>
                    </div>
									
				
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>LAB name :</label>
					<select class="form-control form-control-sm" name="pslname" required="">
							<option value="" readonly> - - </option>
						<?php
							$list = mysqli_query($mysqli,"SELECT LABNAME FROM `labs` ");
							while ($ro = mysqli_fetch_assoc($list)) {
						?>
						<option value="<?php echo $ro['LABNAME'];?>" ><?php echo $ro['LABNAME'];?></option>
						<?php } ?>
					</select>
                        <br>
                    </div>       
					
					
                    <div class="col-sm-6 col-md-6 col-lg-5 col-xl-5">
					<label>SERIAL NO. :</label>
					<input class="form-control form-control-sm" type="text" name="psserial" required="" placeholder="Enter serial number">
                        <br>
                    </div>
					
					<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3"  id="div2">
					<label class="text-uppercase"> Scanner TYPE :</label>
					<select class="form-control form-control-sm" name="psfun" required>
					<option value="" selected="">- -</option>
					<option value="Flatbed">Flatbed scanner</option>
					<option value="Sheetfed">Sheetfed scanner</option>
					</select>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>INSTALL DATE :</label>
					<input class="form-control form-control-sm" type="date" name="psindate" required="" min="2005-01-01" id="datein2" max="">
						<script>
						datein2.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>SCRAP DATE :</label><input class="form-control form-control-sm" type="date" name="psoutdate" min="2005-01-01" id="dateout2" max="">
						<script>
						dateout2.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>PRICE <i class="fa fa-inr"></i> : </label>
					<input class="form-control form-control-sm" type="number" name="psprice" required="" placeholder="Numbers only" min="1">
                        <br>
                    </div>
					
                </div>
				
			
            <div class="card-footer">
                <div class="form-row visible">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 offset-3 offset-sm-4">
						<button class="btn btn-success btn-sm" name="Submit" type="submit" value="Submit">ADD </button></div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
						<button class="btn btn-primary btn-sm" type="reset">Clear</button></div>
				</div>
            </div>

    </form>
        </div>
		
    </div>
</div>
		
		
		
		
		
		

    <br>

    </div>
	
	
	
	
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>