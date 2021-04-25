
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>add lab</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="container-fluid"  style="font-family: 'rubik', sans-serif;">
	
	
	<?php
//including the database connection file
include_once("config.php");

//adding values 

if(isset($_POST['Submit'])) 
{	
	$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$lincharge = mysqli_real_escape_string($mysqli, $_POST['lincharge']);
	$linvest = mysqli_real_escape_string($mysqli, $_POST['linvest']);
	$leths = mysqli_real_escape_string($mysqli, $_POST['leths']);
	$lfans = mysqli_real_escape_string($mysqli, $_POST['lfans']);
	$ltubes = mysqli_real_escape_string($mysqli, $_POST['ltubes']);
	$larea = mysqli_real_escape_string($mysqli, $_POST['larea']);

					// if the fields are not filled (empty) 

				if(empty($lname) || empty($lincharge)) 
	{
				echo "<h5 class='text-danger'> Important data missing..<h5> <hr>";
	}
	else
				// if all the fields are filled (not empty) 

	{
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO labs(LABNAME,LABINCHARGE,LABINVEST,LABETHS,LABFANS,LABTUBES,LABAREA) VALUES ('$lname','$lincharge','$linvest','$leths','$lfans','$ltubes','$larea')");
		
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
}
?>


        <form method="post" action="labplus.php" name="labplus" autocomplete="off">
                    <Br>
					<div class="form-row">		
						
                        <div class="col-md-6 col-lg-6 col-xl-6 ">
						<label>Lab Name : </label><input class="form-control form-control-sm  text-uppercase" type="text" name="lname" required="" title="">
                            <br>
                        </div>
						
                        <div class="col-md-6 col-lg-6 col-xl-6">
						<label>Lab In-charge : </label><input class="form-control form-control-sm text-uppercase" type="text" name="lincharge" required="" title="" >
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label>Lab investments ( In Lakhs <i class="fa fa-inr"></i> ) : </label>
						<input class="form-control form-control-sm" type="number" step="0.001" name="linvest" placeholder="Number Input like 1.500 -- upto 3 decimal places" min="0" required>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-capitalize">
						<label>No of ethernet switch : </label><input class="form-control form-control-sm" type="number" name="leths" min="0" max="5" required>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label>No of Fans : </label><input class="form-control form-control-sm" type="number" min="1" max="10" name="lfans" required>
                            <br>
                        </div>
						
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						<label>No of Tubes : </label><input class="form-control form-control-sm" type="number" name="ltubes" min="1" max="10" required>
                            <br>
                        </div>
						
                        <div class="col-md-6 col-lg-4 col-xl-4">
						<label>Lab Area : </label><input class="form-control form-control-sm" type="text" name="larea" title="Please mention correct units." required>
                            <br>
                        </div>
						
                    </div>
							
                <div class="card-footer">
                    <div class="form-row  ">
                        <div class="col-5 col-sm-4 col-md-4 col-lg-4 col-xl-4 offset-4 offset-sm-4">
						<button class="btn btn-success btn-sm float-left" type="submit" name="Submit" value="Submit">Add</button>
						<button class="btn btn-primary btn-sm float-right" type="reset">Clear</button>
						</div>
                    </div>
                </div>
			
        </form>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	
	
</body>

</html>