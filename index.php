<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SYSTEM MANAGER</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: 'Rubik', sans-serif;">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark navigation-clean-button">
            <div class="container-fluid"><a class="navbar-brand text-capitalize text-warning" href="">Computer Lab Manager</a><button class="navbar-toggler border rounded-0" data-toggle="collapse" data-target="#navcol-1"><i class="fa fa-navicon shadow-none"></i><span class="sr-only">Toggle navigation</span></button>
                <div
                    class="collapse navbar-collapse text-capitalize" id="navcol-1">
                    <ul class="nav navbar-nav text-capitalize d-sm-flex flex-row ml-auto align-items-xl-center" style="font-size: 14px;">
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="LAB\Lab.php"><i class="fas fa-store-alt"></i>&nbsp;Lab</a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="PC\PC.php"><i class="fas fa-laptop"></i><strong>&nbsp;</strong>Desktop / Laptop</a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="SO\SO.php"><i class="fas fa-code"></i>&nbsp;Softwares</a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="PS\PS.php"><i class="fas fa-print"></i>&nbsp;Printer / Scanner</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
	
<?php
//including the database connection file
include_once("config.php");

?>

	
    <div class="container">
                    <br>
                    <br>
                    <br>
					<h3 class="text-center bg-light"> Dashboard </h3>
					<hr>
					<div class="row">
                        <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-center " >
						<a class="card card-body text-dark btn btn-outline-light" href="LAB\LAB.php"><i class="h3 fas fa-store-alt text-danger"></i> Lab</a></div>
						
                        <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-center " >
						<a class="card card-body text-dark btn btn-outline-light"  href="PC\PC.php"><i class="h3 fas fa-laptop text-success"></i> Desktop / Laptop</a></div>
						
                        <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  text-center" >
						<a class="card card-body text-dark btn btn-outline-light"  href="SO\SO.php"><i class="h3 fas fa-code text-primary"></i> Softwares</a></div>
						
                        <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  text-center" >
						<a class="card card-body text-dark btn btn-outline-light" href="PS\PS.php"><i class="h3 fas fa-print"></i> Printer / Scanner</a></div>
                    </div>

					<hr>	
					
					<div class="row">
						<div class="col-6"> 
					<table class="table table-sm table-hover table-bordered text-capitalize">
						<tr class="table-warning">
						<th>Lab name</th>
						<th >No. of pcs</th>
						</tr>
						<?php
						$list1 = mysqli_query($mysqli," SELECT count(*),PCOLNAME FROM pco GROUP BY PCOLNAME");						
						while ($r1 = mysqli_fetch_assoc($list1)) {
						?>					
						<tr>
						<td><?php echo $r1['PCOLNAME'];?></td>
						<td><?php echo $r1['count(*)'] ?></td>
						</tr>
						<?php } ?>	
					</table>
					</div>
						
										
						
						<div class="col-6"> 
						<table class="table table-sm table-hover table-bordered">
						<tr class="table-primary">
							<th >Device Type</th>							<th >Count</th>
						</tr>	
							<?php
							$list2 = mysqli_query($mysqli," SELECT count(*),PCOTYPE FROM pco GROUP BY PCOTYPE");
							while ($r2 = mysqli_fetch_assoc($list2)) {
							?>					
							<tr>
							<td><?php echo $r2['PCOTYPE'];?></td>		<td><?php echo $r2['count(*)'] ?></td>
							</tr>
							<?php } ?>
							
							<?php
							$list3 = mysqli_query($mysqli," SELECT count(*),PSCTYPE FROM priscan GROUP BY PSCTYPE");
							while ($r3 = mysqli_fetch_assoc($list3)) {
							?>					
							<tr>
							<td><?php echo $r3['PSCTYPE'];?></td>		<td><?php echo $r3['count(*)'] ?></td>
							</tr>
							<?php } ?>
						</table>
						</div>
					</div>

					        <hr/>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>