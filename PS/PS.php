<!DOCTYPE html>

<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM priscan ORDER BY ID ASC"); // using mysqli_query instead
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Printer / scanners Info</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body  style="font-family: 'rubik', sans-serif;">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark navigation-clean-button">
            <div class="container-fluid"><a class="navbar-brand text-capitalize text-warning" href="../index.php">Computer Lab Manager</a><button class="navbar-toggler border rounded-0" data-toggle="collapse" data-target="#navcol-1"><i class="fa fa-navicon shadow-none"></i><span class="sr-only">Toggle navigation</span></button>
			
			<div class="collapse navbar-collapse text-capitalize" id="navcol-1">
                    <ul class="nav navbar-nav text-capitalize d-sm-flex flex-row ml-auto align-items-xl-center" style="font-size: 14px;">
                        <li class="nav-item mr-3" role="presentation">
						<a class="nav-link text-white-50 mr-2" href="..\LAB\LAB.php"><i class="fas fa-store-alt"></i>&nbsp;Lab</a></li>
                        <li class="nav-item mr-3" role="presentation">
						<a class="nav-link text-white-50 mr-2" href="..\PC\PC.php"><i class="fas fa-laptop"></i><strong>&nbsp;</strong>Desktop / Laptop</a></li>
                        <li class="nav-item mr-3" role="presentation">
						<a class="nav-link text-white-50 mr-2" href="..\SO\SO.php"><i class="fas fa-code"></i>&nbsp;Softwares</a></li>
                        <li class="nav-item mr-3" role="presentation">
						<a class="nav-link active border-bottom border-info mr-2" href="PS.php"><i class="fas fa-print"></i>&nbsp;Printer / Scanner</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
	
	
    <div class="container-fluid visible" style="font-size: 14px;">
        <br>
        <br>
        <br>
        <br>
		
        <div class="card">
            <div class="card-body">
                <h4 class="text-center p-1 bg-light">Printer / Scanners </h4>
				 <hr>
				 	<?php 	
						$rowcount=mysqli_num_rows($result);
						echo "<h6 class='p-1 float-left'>Total Devices : ",$rowcount;
						echo "</h6>";
					?>
				<button class="btn btn-success btn-sm float-right mb-2" type="button"  data-toggle="modal" data-target="#psadd">
				<i class="fas fa-plus"></i><strong>&nbsp; </strong>Add device</button>
							
                <div class="table-responsive table-bordered text-nowrap">
                    
					<table class="table table-hover table-sm">
                        <thead>
                            <tr class="table-warning text-capitalize text-center ">
								<th>Device type</th>		                                
								<th>Device Make model</th>
                                <th>Serial no.</th>								
                                <th colspan="2">Function/Work</th>
                                <th>Price <i class="fa fa-inr"></i></th>		
                                <th>Lab </th>																
                                <th>Install date<br>Y-M-D</th>
                                <th>Scrap date<br>Y-M-D</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
						
						<?php 
  
						while($res = mysqli_fetch_array($result)) 
							{ 		
  
							 echo "<tr class='text-left'>";
                                echo "<td class='text-capitalize'>".$res['PSCTYPE']."</td>";                                
								echo "<td class='text-capitalize text-right'>".$res['PSCBMOD']."</td>";							 
                                echo "<td class='text-right'>".$res['PSCSERIAL']."</td>";
                                echo "<td class='text-capitalize text-left'>".$res['PSCFUN']."</td>";								
                                echo "<td class='text-capitalize text-left'>".$res['PSCINK']."</td>";								
                                echo "<td class='text-right'>".$res['PSCPRICE']."</td>";
                                echo "<td class='text-capitalize'>".$res['PSCLNAME']."</td>";								
                                echo "<td class='text-right'>".$res['PSCINDATE']."</td>";
                                echo "<td class='text-right'>".$res['PSCOUTDATE']."</td>";
	
                                echo "<td class='text-center'>
									<a title='Edit data' class='btn btn-outline-primary btn-sm text-center border rounded-circle' type='button' href=\"psedit.php?id=$res[ID]\">
									<i class='far fa-edit'></i> </a> &nbsp; &nbsp;

									<a title='Remove data' class='btn btn-outline-danger btn-sm text-center border rounded-circle'
                                        type='button' href=\"psdelete.php?id=$res[ID]\" onClick=\"return confirm(' Are you sure you want to delete this entry? ')\">
									<i class='far fa-trash-alt'></i></a>
									</td>";
							 echo "</tr>";
							}
						?>	
                        </tbody>
                    </table>
                </div>
					
            </div>
        </div>
       
	   
	   		
	  <!-- ------------------------------------------------------------------------------------------------------------------------- -->

	<div class="modal fade" id="psadd">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header bg-white">
					<h5 class="modal-title">Add Printer / Scanner</h5>
					<button type="button" class="close" data-dismiss="modal"><i class="fas fa-close"></i></button>
				</div>
        
				<!-- Modal body -->
				<div>
					<div class="embed-responsive embed-responsive-16by9  bg-light">
						<iframe class="embed-responsive-item" src="psplus.php"></iframe>
					</div>
				</div>
        
						<!-- Modal footer -->
					<div class="modal-footer p-2">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> Close </button>
					</div>
        
				</div>
			</div>
      </div>
	  
			
	  <!-- ------------------------------------------------------------------------------------------------------------------------- -->

	  
        <hr>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>