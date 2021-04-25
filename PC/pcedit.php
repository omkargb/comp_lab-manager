<!DOCTYPE html>

<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$pcid = mysqli_real_escape_string($mysqli, $_POST['pcid']);
	$pclname = mysqli_real_escape_string($mysqli, $_POST['pclname']);
	$pctype	 = mysqli_real_escape_string($mysqli, $_POST['pctype']);
	$pcbmod	 = mysqli_real_escape_string($mysqli, $_POST['pcbmod']);
	$pcserial	 = mysqli_real_escape_string($mysqli, $_POST['pcserial']);
	$pcindate  = mysqli_real_escape_string($mysqli, $_POST['pcindate']);
	$pcoutdate  = mysqli_real_escape_string($mysqli, $_POST['pcoutdate']);
	$pcproc	 = mysqli_real_escape_string($mysqli, $_POST['pcproc']);
	$pcramver  = mysqli_real_escape_string($mysqli, $_POST['pcramver']);
	$pcramsize  = mysqli_real_escape_string($mysqli, $_POST['pcramsize']);
	$pcmonitor  = mysqli_real_escape_string($mysqli, $_POST['pcmonitor']);
	$pchdd  = mysqli_real_escape_string($mysqli, $_POST['pchdd']);
	$pcmouse	 = mysqli_real_escape_string($mysqli, $_POST['pcmouse']);
	$pckbrd	 = mysqli_real_escape_string($mysqli, $_POST['pckbrd']);
	
	{	
		//updating the table
		$result = mysqli_query
		($mysqli, 
		"UPDATE pco SET PCOID='$pcid',
						PCOLNAME='$pclname' ,
						PCOTYPE='$pctype',
						PCOBMOD='$pcbmod',
						PCOSERIAL='$pcserial',
						PCOINDATE='$pcindate',
						PCOOUTDATE='$pcoutdate',
						PCOPROC='$pcproc',
						PCORAMVER='$pcramver',
						PCORAMSIZE='$pcramsize',
						PCOMONITOR='$pcmonitor',
						PCOHDD='$pchdd',
						PCOMOUSE='$pcmouse',
						PCOKBRD='$pckbrd'
						WHERE id=$id");
		
		//redirectig to the display page. 
		header("Location:PC.php");
	}
}
?>
	


<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM pco WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$pcid = $res['PCOID'];
	$pclname = $res['PCOLNAME'];
	$pctype	= $res['PCOTYPE'];
	$pcbmod	= $res['PCOBMOD'];
	$pcserial = $res['PCOSERIAL'];
	$pcindate = $res['PCOINDATE'];
	$pcoutdate = $res['PCOOUTDATE'];
	$pcproc	= $res['PCOPROC'];
	$pcramver = $res['PCORAMVER'];
	$pcramsize = $res['PCORAMSIZE'];
	$pcmonitor = $res['PCOMONITOR'];
	$pchdd = $res['PCOHDD'];
	$pcmouse = $res['PCOMOUSE'];
	$pckbrd	= $res['PCOKBRD'];
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit PC details</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="bg-info container-fluid" style="font-family:Rubik">
    <div ><br>
	
        <form method="post" autocomplete="off" action="pcedit.php">
            <div class="card visible">
               <div class="card-header d-lg-flex justify-content-lg-center align-items-lg-center">
                    <h5 class="text-capitalize text-center visible">EDIT Desktop/laptop details</h5>
					</div>
				
                <div class="card-body visible">
                    <div class="form-row">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
						<label  >PC ID : </label>
						<input class="form-control form-control-sm  text-capitalize" type="text" name="pcid" required="" placeholder="" value="<?php echo $pcid;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-4 col-lg-2 col-xl-2">
						<label  >Lab name :</label>
						<select class="form-control form-control-sm" name="pclname" required>
						<option value="<?php echo $pclname;?>" hidden> <?php echo $pclname;?> </option>
												<?php
							$list = mysqli_query($mysqli,"SELECT LABNAME FROM `labs` ");
							while ($ro = mysqli_fetch_assoc($list)) {
						?>
						<option value="<?php echo $ro['LABNAME']; ?>"><?php echo $ro['LABNAME']; ?></option>
						<?php } ?>
						</select>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-4 col-lg-2 col-xl-2">
						<label ">PC Type :</label>
						<select class="form-control form-control-sm" name="pctype" required>
						<option value="<?php echo $pctype;?>" hidden><?php echo $pctype;?></option>
						<option value="Desktop">Desktop</option>
						<option value="Mini PC">Mini PC</option>
						<option value="Laptop">Laptop</option>
						<option value="Server">Server</option>
						</select>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-7 col-lg-5 col-xl-5 text-capitalize">
						<label ">PC brand & model :</label>
						<input class="form-control form-control-sm" type="text" name="pcbmod" required="" placeholder="" value="<?php echo $pcbmod;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
						<label  >PC serial no. :</label>
						<input class="form-control form-control-sm" type="text" name="pcserial" required="" value="<?php echo $pcserial;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
						<label  >PC install date: </label>
						<input class="form-control form-control-sm" type="date" name="pcindate" required="" min="2000-01-01" id="datein" value="<?php echo $pcindate;?>">
						<script>
						datein.max=new Date().toISOString().split("T")[0];
						</script>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
						<label  >PC scrap date: </label>
						<input class="form-control form-control-sm" type="date" name="pcoutdate" min="2005-01-01" id="dateout" value="<?php echo $pcoutdate;?>">
						<script>
						dateout.max=new Date().toISOString().split("T")[0];
						</script>
                            <br>
                        </div>
                    </div>
					<hr>
					
                    <p class="text-danger lead">Hardware details :&nbsp;</p>
					<hr>
                    <div class="form-row d-xl-flex">
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
							<label class="d-flex"><i class="fas fa-microchip"></i>&nbsp;Processor : </label>
							<select class="form-control form-control-sm" required="" name="pcproc">
                            <option value="<?php echo $pcproc;?>" hidden > <?php echo $pcproc;?></option>
                            <option value="Intel Pentium 4">Intel Pentium 4</option>
                            <option value="Intel Core 2 Duo">Intel Core 2 Duo</option>
							<option value="Intel Dual Core">Intel Dual Core</option>
							<option value="Intel Core i3">Intel Core i3</option>
							<option value="Intel core i5">Intel core i5</option>
							<option value="Intel core i7">Intel core i7</option>
							<option value="Intel Xeon">Intel Xeon</option>
							<option value="AMD series">AMD series</option>
							</select>
                            <br>
						</div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						  <div class="row">
						  <div class="col-6"> 
						  <label> <i class="fas fa-memory"></i>&nbsp;RAM Version : </label>
						  <select class="form-control form-control-sm" required name="pcramver">
						   <option value="<?php echo $pcramver;?>" hidden><?php echo $pcramver;?></option>
                                <option value="DDR1">DDR1</option>
								<option value="DDR2">DDR2</option>
								<option value="DDR3">DDR3</option>
								<option value="DDR4">DDR4</option>

						</select>	
							</div>
							
							  <div class="col-6"> 
							  <label> <i class="fas fa-memory"></i>&nbsp;RAM Size : </label>
							  <select class="form-control form-control-sm" required name="pcramsize">
								<option value="<?php echo $pcramsize;?>" hidden> <?php echo $pcramsize;?> </option>
                                <option value="512 MB">512 MB</option>
								<option value="1 GB">1 GB</option>
								<option value="2 GB">2 GB</option>
								<option value="3 GB">3 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="5 GB">5 GB</option>
								<option value="6 GB">6 GB</option>
								<option value="7 GB">7 GB</option>
								<option value="8 GB">8 GB</option>
						</select>
						  </div>
						  </div>
                            <br>
                        </div>
											
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label class="d-flex"><i class="fas fa-hdd"></i>&nbsp;Hard disk size :</label>
						<select class="form-control form-control-sm" name="pchdd">
								<option value="<?php echo $pchdd;?>" hidden> <?php echo $pchdd;?> </option>
								<option value="160 GB">~160 GB</option>
								<option value="320 GB">~320 GB</option>
								<option value="500 GB">~500 GB</option>
								<option value="720 GB">~720 GB</option>                                                    
								<option value="1 TB">1 TB</option>
								<option value="1.5 TB">1.5 TB</option>
								<option value="2 TB">2 TB</option>
						</select>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label class="d-flex"><i class="fas fa-desktop"></i>&nbsp;Monitor :</label>
						<select class="form-control form-control-sm" name="pcmonitor">
                              <option value="<?php echo $pcmonitor;?>" hidden><?php echo $pcmonitor;?></option>
                              <option value="VGA">VGA</option>
                              <option value="LCD">LCD</option>
                              <option value="LED">LED</option>
						</select>
                            <br>
                        </div>

						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label class="d-flex"><i class="fas fa-mouse-pointer"></i>&nbsp;Mouse type:</label>
						<select class="form-control form-control-sm" name="pcmouse">
							<option value="<?php echo $pcmouse;?>" hidden selected><?php echo $pcmouse;?></option>
							<option value="PS2 - WIRED">PS2 - WIRED</option>
							<option value="USB - WIRED">USB - WIRED</option>
							<option value="USB - WIRELESS">USB - WIRELESS</option>
						</select>
						<br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label class="d-flex"><i class="fas fa-keyboard"></i>&nbsp;Keyboard type: </label>
						<select class="form-control form-control-sm" name="pckbrd">
							<option value="<?php echo $pckbrd;?>" hidden selected> <?php echo $pckbrd;?> </option>
							<option value="PS2 - WIRED">PS2 - WIRED</option>
							<option value="USB - WIRED">USB - WIRED</option>
                            <option value="USB - WIRELESS">USB - WIRELESS</option>
						</select>
                            <br/>
                        </div>
						
						<input type="text" name="id" value="<?php echo $_GET['id'];?>" Hidden />
											
                    </div>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>