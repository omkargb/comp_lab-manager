
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$lincharge = mysqli_real_escape_string($mysqli, $_POST['lincharge']);
	$linvest = mysqli_real_escape_string($mysqli, $_POST['linvest']);
	$leths = mysqli_real_escape_string($mysqli, $_POST['leths']);
	$lfans = mysqli_real_escape_string($mysqli, $_POST['lfans']);
	$ltubes = mysqli_real_escape_string($mysqli, $_POST['ltubes']);
	$larea = mysqli_real_escape_string($mysqli, $_POST['larea']);
	
		//updating the table
		$result = mysqli_query
		($mysqli, 
		"UPDATE labs SET LABNAME='$lname',
						LABINCHARGE='$lincharge', 
						LABINVEST='$linvest',
						LABETHS='$leths',
						LABFANS='$lfans',
						LABTUBES='$ltubes',
						LABAREA='$larea'		
						WHERE id=$id");
		
		//redirecting to the display page. 
		header("Location:LAB.php");
}
?>



<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM labs WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$lname = $res['LABNAME'];
	$lincharge = $res['LABINCHARGE'];
	$linvest = $res['LABINVEST'];
	$leths = $res['LABETHS'];
	$lfans = $res['LABFANS'];
	$ltubes = $res['LABTUBES'];
	$larea = $res['LABAREA'];
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit/update lab details</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="container bg-info" style="font-family: 'rubik', sans-serif;">
        <br>

    <div>
        <form method="post" action="labedit.php" name="form1">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-capitalize "> Edit/Update lab details</h5>
                </div>
                <div class="card-body text-capitalize  ">
				
                    <div class="form-row">
						
                        <div class="col-md-6 col-lg-6 col-xl-6">
						<label>Lab Name : </label><input class="form-control form-control-sm  text-capitalize" type="text" name="lname" required="" title="" value="<?php echo $lname;?>">
                            <br>
                        </div>
						
                        <div class="col-md-6 col-lg-6 col-xl-6">
						<label>Lab In-charge : </label><input class="form-control form-control-sm text-capitalize" type="text" name="lincharge" required="" title="" value="<?php echo $lincharge;?>" >
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-capitalize">
						<label>Lab investment ( In Lakhs <i class="fa fa-inr"></i> ) : </label>
						<input class="form-control form-control-sm" type="number" step="0.001" inputmode="numeric" name="linvest" placeholder="Number Input like 1.500 : 3 decimal places" min="0" required value="<?php echo $linvest;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-capitalize">
						<label>No of ethernet switch : </label><input class="form-control form-control-sm" type="number" name="leths" min="0" max="5" required value="<?php echo $leths;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label>No of Fans : </label><input class="form-control form-control-sm" type="number" min="1" max="10" name="lfans" required value="<?php echo $lfans;?>">
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label>No of Tubes : </label><input class="form-control form-control-sm" type="number" name="ltubes" min="1" max="10" required value="<?php echo $ltubes;?>">
                            <br>
                        </div>
						
                        <div class="col-md-6 col-lg-4 col-xl-4">
						<label>Lab Area : </label><input class="form-control form-control-sm" type="text" name="larea" title="--> Please mention correct units." required value="<?php echo $larea;?>">
                            <br>
                        </div>
						
						<input type="text" name="id" value=<?php echo $_GET['id'];?> hidden>

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
