
<?php 

use Models\User_Model\UserModel;
use Utilities\SSSException;
require_once '../../../autoload.php';
$userMod = new UserModel();
$pageLoaded = true;
try{
	$observees = $userMod->getByType('P');
// 	var_dump($observees);
}catch(SSSException $e){
	$pageLoaded = false;
}


?>

<?php if($pageLoaded){?>
<html>
<head>
	<script type="text/javascript" src="./js/observeeMgt.js"></script>
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Observee Management
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
						<h3 class="box-title">Observee Table</h3>
					</div>
					<div class="box-body">
						<table id="observeeTable" class="table table-bordered table-hover">
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
								
								foreach($observees as $observee)
								{
									$btnGrp = "";
									
									$tr = "<tr class='observee' userid='".$observee->getId()."' username='".$observee->getName()."'>";
									$tr .= "<td>";
									$tr .= $observee->getName();
									$tr .= "</td>";
									$tr .= "<td>";
									if($observee->getStatus() == "N"){
										$tr .= "Active";
										$btnGrp .= 	"<td>";
										$btnGrp .= 	"<button type='button' class='btn btn-default func-observee-location'>Location</button>";
										$btnGrp .= 	"<button type='button' class='btn btn-default func-observee-inactive'>In-Active</button>";
										$btnGrp .= 	"</td>";
									}else{
										$tr .= "In-active";
										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observee-active'>Active</button></td>";
									}
									$tr .= "</td>";
									$tr .= "<td>";
									$tr .= $observee->getLastUpdate();
									$tr .= "</td>";
// 									echo $btnGrp;
									$tr .= $btnGrp;
									$tr .= "</tr>";
									
									
									print $tr;
								}
							?>
						</tbody>
<!-- 						<tfoot> -->
<!-- 							<tr> -->
<!-- 								<th>User Name</th> -->
<!-- 								<th>Status</th> -->
<!-- 								<th>Last Update</th> -->
<!-- 							</tr> -->
<!-- 						</tfoot> -->
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?php }else{ echo "page not found";}?>