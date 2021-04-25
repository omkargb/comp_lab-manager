<?php
//including the database connection file
include_once("config.php");

//update values 
if(isset($_POST['update'])) 
{		
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

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
		$result = mysqli_query($mysqli, "UPDATE priscan SET 
		PSCTYPE='$pstype',
		PSCLNAME='$pslname',
		PSCBMOD='$psbmod',
		PSCSERIAL='$psserial',
		PSCFUN='$psfun',
		PSCINK='$psink',
		PSCINDATE='$psindate',
		PSCOUTDATE='$psoutdate',
		PSCPRICE='$psprice'	WHERE id=$id ");
	
			header("Location:PS.php");
}
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM priscan WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$pstype = $res['PSCTYPE'];
	$pslname = $res['PSCLNAME'];
	$psbmod = $res['PSCBMOD'];
	$psserial = $res['PSCSERIAL'];
	$psfun = $res['PSCFUN'];
	$psink = $res['PSCINK'];
	$psindate = $res['PSCINDATE'];
	$psoutdate = $res['PSCOUTDATE'];
	$psprice = $res['PSCPRICE'];

	//if device is printer disable scanner type
	//if device is scanner disable printer function, ink type
}
?>

<style>
	.shownone1{
		<?php
		if($pstype=="Printer")
		echo 'display:none;'; 
		?>
	}	
	
	.shownone2{
		<?php
		if($pstype=="Scanner")
		echo 'display:none;'; 
		?>
	}
</style>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Printer/scanner Edit</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body  class="bg-info" style="font-family: 'rubik', sans-serif;">
    <div class="container" >
	    <br>
    <form method="post" autocomplete="off" action="psedit.php">
        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Edit Printer / Scanner details</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
				
				<input name="id" value=<?php echo $_GET['id'];?> hidden>

                    <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
					<label>Device type :</label>
					<input class="form-control form-control-sm" value="<?php echo $pstype;?>" name="pstype"  readonly/> <br>
                    </div>		
					
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<label>BRAND &amp; MODEL :</label><input class="form-control form-control-sm" type="text" name="psbmod" required="" placeholder="Enter brand and model" minlength="2" value="<?php echo $psbmod;?>" />
                        <br>
                    </div>					
					
                    <div class="col-sm-6 col-md-6 col-lg- col-xl-3">
					<label>Lab name :</label>
					<select class="form-control form-control-sm" name="pslname" required="">
						<option value="<?php echo $pslname;?>" hidden> <?php echo $pslname;?> </option>
						<?php
							$list = mysqli_query($mysqli,"SELECT LABNAME FROM `labs` ");
							while ($ro = mysqli_fetch_assoc($list)) {
						?>
						<option value="<?php echo $ro['LABNAME'];?>" ><?php echo $ro['LABNAME'];?></option>
						<?php } ?>
					</select>
                        <br>
                    </div>   
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>Serial No. :</label>
					<input class="form-control form-control-sm" type="text" name="psserial" required="" placeholder="Enter serial number" value="<?php echo $psserial;?>"/>
                        <br>
                    </div>

                    <div class="shownone2 col-sm-6 col-md-6 col-lg-3 col-xl-3 " >
					<label class="text-success"> Printer Functions :</label>
					<select class="form-control form-control-sm" name="psfun" >
						<option value="<?php echo $psfun;?>" hidden> <?php echo $psfun;?> </option>
					<option value="Single function Inkjet">Single function Inkjet - print</option>
					<option value="Single function Laser">Single function Laser - print</option>
					<option value="Multi function Inkjet">Multi function Inkjet - Print, Scan/Xerox</option>
					<option value="Multi function Laser">Multi function Laser - Print, Scan/Xerox</option>
					</select>
                        <br>
                    </div>   
					
                    <div class="shownone2 col-sm-6 col-md-6 col-lg-3 col-xl-3" >
					<label class="text-success">Ink Type :</label>
					<select class="form-control form-control-sm" name="psink" >
						<option value="<?php echo $psink;?>" hidden> <?php echo $psink;?> </option>
					<option value="Black and white - Grayscale" >Black and white - Grayscale</option>
					<option value="Color" >Color</option>
					</select>
                        <br>
                    </div>
					
					<div class="shownone1 col-sm-6 col-md-6 col-lg-3 col-xl-3" >
					<label class="text-danger"> Scanner type :</label>
					<select class="form-control form-control-sm" name="psfun" >
						<option value="<?php echo $psfun;?>" hidden> <?php echo $psfun;?> </option>
					<option value="Flatbed">Flatbed scanner</option>
					<option value="Sheetfed">Sheetfed scanner</option>
					</select>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>Install Date :</label>
					<input class="form-control form-control-sm" type="date" name="psindate" required="" min="2005-01-01" id="datein1" max="" value="<?php echo $psindate;?>">
						<script>
						datein1.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>Scrap Date :</label><input class="form-control form-control-sm" type="date" name="psoutdate" min="2005-01-01" id="dateout1" max="" value="<?php echo $psoutdate;?>">
						<script>
						dateout1.max=new Date().toISOString().split("T")[0];
						</script>
                        <br>
                    </div>
					
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<label>Price <i class="fa fa-inr"></i> : </label>
					<input class="form-control form-control-sm" type="number" name="psprice" required="" placeholder="Numbers only" min="1" value="<?php echo $psprice;?>">
                        <br>
                    </div>
				</div>
				
            </div>
			
            <div class="card-footer">
                <div class="form-row visible">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 offset-3 offset-sm-4">
						<button class="btn btn-success btn-sm" type="submit" name="update" value="Update"> Update </button>
					</div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3"><button class="btn btn-primary btn-sm" type="reset">Clear</button></div>
                </div>
            </div>
        </div>
    </form>
    <br>

    </div>
	
	
	
	
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>