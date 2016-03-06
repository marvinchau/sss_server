
<?php 

use Models\User_Model\UserModel;
use Utilities\SSSException;
require_once '../../../autoload.php';
$userMod = new UserModel();
$pageLoaded = true;
try{
	$observers = $userMod->getByType('O');
// 	var_dump($observees);
}catch(SSSException $e){
	$pageLoaded = false;
}


?>

<?php if($pageLoaded){?>
<html>
<head>
	<script type="text/javascript" src="./js/observerMgt.js"></script>
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Observer Management
<!--             <small>Optional description</small> -->
        </h1>
<!--         <ol class="breadcrumb"> -->
<!--         <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li> -->
<!--         <li class="active">Here</li> -->
<!--       </ol> -->
    </section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Observer Table</h3>
					</div>
					<div class="box-body">
						<table id="observerTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>User Name</th>
								<th>Status</th>
								<th>Last Update</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
								foreach($observers as $observer)
								{
									$btnGrp = "";
									
									$tr = "<tr class='observee' userid='".$observer->getId()."'>";
									$tr .= "<td>";
									$tr .= $observer->getName();
									$tr .= "</td>";
									$tr .= "<td>";
									if($observer->getStatus() == "N"){
										$tr .= "Active";
										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-inactive'>In-Active</button></td>";
									}else{
										$tr .= "In-active";
										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-active'>Active</button></td>";
									}
									$tr .= "</td>";
									$tr .= "<td>";
									$tr .= $observer->getLastUpdate();
									$tr .= "</td>";
// 									echo $btnGrp;
									$tr .= $btnGrp;
									$tr .= "</tr>";
									
									
									print $tr;
								}
							?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Observer Table</h3>
					</div>
					<div class="box-body">
						<table id="observerTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>User Name</th>
								<th>Status</th>
								<th>Last Update</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
								foreach($observers as $observer)
								{
									$btnGrp = "";
									
									$tr = "<tr class='observee' userid='".$observer->getId()."'>";
									$tr .= "<td>";
									$tr .= $observer->getName();
									$tr .= "</td>";
									$tr .= "<td>";
									if($observer->getStatus() == "N"){
										$tr .= "Active";
										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-inactive'>In-Active</button></td>";
									}else{
										$tr .= "In-active";
										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-active'>Active</button></td>";
									}
									$tr .= "</td>";
									$tr .= "<td>";
									$tr .= $observer->getLastUpdate();
									$tr .= "</td>";
// 									echo $btnGrp;
									$tr .= $btnGrp;
									$tr .= "</tr>";
									
									
									print $tr;
								}
							?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?php }else{ echo "page not found";}?>