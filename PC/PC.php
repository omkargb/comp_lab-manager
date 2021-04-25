<!DOCTYPE html>


<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$resultpco = mysqli_query($mysqli, "SELECT * FROM pco ORDER BY ID ASC"); // using mysqli_query instead
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PC Info</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
</head>

<body  style="font-family: 'rubik', sans-serif;">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark navigation-clean-button">
            <div class="container-fluid"><a class="navbar-brand text-capitalize text-warning" href="../index.php">Computer Lab Manager</a><button class="navbar-toggler border rounded-0" data-toggle="collapse" data-target="#navcol-1"><i class="fa fa-navicon shadow-none"></i><span class="sr-only">Toggle navigation</span></button>
                <divclass="collapse navbar-collapse text-capitalize" id="navcol-1">
                    <ul class="nav navbar-nav text-capitalize d-sm-flex flex-row ml-auto align-items-xl-center" style="font-size: 14px;">
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="../LAB/LAB.php"><i class="fas fa-store-alt"></i>&nbsp;Lab</a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link active border-bottom border-info mr-2" href="PC.php"><i class="fas fa-laptop"></i><strong>&nbsp;</strong>Desktop / Laptop </a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="../SO/SO.php"><i class="fas fa-code"></i>&nbsp;Softwares</a></li>
                        <li class="nav-item mr-3" role="presentation"><a class="nav-link text-white-50 mr-2" href="../PS/PS.php"><i class="fas fa-print"></i>&nbsp;Printer / Scanner</a></li>
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
                <h4 class="text-center p-1 bg-light">Computers</h4>


                            <hr>
					<?php 		$rowcount=mysqli_num_rows($resultpco);
						echo "<h6 class='float-left'>Total number of PCs : ",$rowcount;
						echo "</h6>";
					?>
                    
				<button class="btn btn-success btn-sm float-right mb-2" type="button" data-toggle="modal" data-target="#pcadd">
				<i class="fas fa-plus"></i>&nbsp;  Add Device </button>

                <div class="table-responsive table-bordered text-capitalize text-nowrap">
                    <table class="table table-hover table-sm">
                        <thead class="text-capitalize">
                            <tr class="table-warning text-capitalize text-center shadow-none">
                                <th>PC ID </th>
                                <th>Lab name </th>
                                <th>TYPE </th>
                                <th>MODEL </th>
                                <th>serial No. </th>
                                <th>Install date <br>(Y-M-D) </th>
                                <th>scrap date <br>(Y-M-D)</th>
                                <th>processor</th>
                                <th COLSPAN="2">RAM</th>
                                <th>MONITOR</th>
                                <th>Hard disk</th>
                                <th>Mouse</th>
                                <th>Keyboard</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">

						<?php
						while($res = mysqli_fetch_array($resultpco))
							{
							 echo "<tr class='text-left'>";
                                echo "<td>".$res['PCOID']."</td>";
                                echo "<td>".$res['PCOLNAME']."</td>";
                                echo "<td>".$res['PCOTYPE']."</td>";
                                echo "<td>".$res['PCOBMOD']."</td>";
                                echo "<td>".$res['PCOSERIAL']."</td>";
                                echo "<td>".$res['PCOINDATE']."</td>";
                                echo "<td>".$res['PCOOUTDATE']."</td>";
                                echo "<td>".$res['PCOPROC']."</td>";
                                echo "<td>".$res['PCORAMVER']."</td>";
                                echo "<td>".$res['PCORAMSIZE']."</td>";
                                echo "<td>".$res['PCOMONITOR']."</td>";
                                echo "<td>".$res['PCOHDD']."</td>";
                                echo "<td>".$res['PCOMOUSE']."</td>";
                                echo "<td>".$res['PCOKBRD']."</td>";
                                echo "<td class='text-center'>
									<a title='Edit data' class='btn btn-outline-primary btn-sm text-center border rounded-circle' type='button' href=\"pcedit.php?id=$res[ID]\">
									<i class='far fa-edit'></i> </a> &nbsp; &nbsp;

									<a title='Remove data' class='btn btn-outline-danger btn-sm text-center border rounded-circle'
                                        type='button' href=\"pcdelete.php?id=$res[ID]\" onClick=\"return confirm(' Are you sure you want to delete this entry? ')\">
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
        <hr>


	  <!-- ------------------------------------------------------------------------------------------------------------------------- -->

	<div class="modal fade" id="pcadd">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header bg-light">
					<h5 class="modal-title">Add Desktop / laptop</h5>
					<button type="button"  class="close" data-dismiss="modal"><i class="fas fa-close"></i></button>
				</div>

				<!-- Modal body -->
				<div>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="pcplus.php"></iframe>
					</div>
				</div>

				</div>
			</div>
      </div>


	  <!-- ------------------------------------------------------------------------------------------------------------------------- -->


    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
