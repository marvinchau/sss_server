
<?php 

use Models\User_Model\UserModel;
use Utilities\SSSException;
require_once '../../../autoload.php';
$userMod = new UserModel();
$pageLoaded = true;
try{
	$observers = $userMod->getByType('O');
	$observees = $userMod->getByType('P');
// 	var_dump($observees);
}catch(SSSException $e){
	$pageLoaded = false;
}


?>

<?php if($pageLoaded){?>
<html>
<head>
	<script type="text/javascript" src="./js/observerGrp.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="./plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="./plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="./plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="./plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
<!--          folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
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
<!-- 								<th>Action</th> -->
							</tr>
						</thead>
						<tbody>
							<?php 
								
								foreach($observers as $observer)
								{
									$btnGrp = "";
									
									$tr = "<tr class='observee func-grp' userid='".$observer->getId()."' username='".$observer->getName()."'>";
									$tr .= "<td>";
									$tr .= $observer->getName();
									$tr .= "</td>";
									$tr .= "<td>";
									if($observer->getStatus() == "N"){
										$tr .= "Active";
// 										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-inactive'>In-Active</button></td>";
									}else{
										$tr .= "In-active";
// 										$btnGrp .= 	"<td><button type='button' class='btn btn-default func-observer-active'>Active</button></td>";
									}
									$tr .= "</td>";
									$tr .= "<td>";
									$tr .= $observer->getLastUpdate();
									$tr .= "</td>";
// 									echo $btnGrp;
// 									$tr .= $btnGrp;
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
	
	<section id="grpSection" class="content" style="display:none;">
<!--         <section class="content" > -->
	
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Observe Group</h3>
                </div>
                <div class="box-body">
                  <!-- Minimal style -->
                  <!-- checkbox -->
                  <div class="row observe-group">
                  <div class="col-lg-12 col-xs-12">
                  	<h4 id="groupOwner"></h4>
                  </div>
                  <div class="col-lg-12 col-xs-12">
                  	<h5>Please select group members :</h5>
                  </div>
                  	<?php 
                  		foreach($observees as $observee){
                  			
                  			$label ='<div class="form-group col-lg-3 col-xs-6">';
                  			$label .='<label>';
                  			$label .= '<input type="checkbox" class="minimal" userid="'.$observee->getId().'">';
                  			$label .= " ".$observee->getName();
                  			$label .='</label>';
                  			$label .='</div>';
                  			
                    		print $label;
                    
                  		}
                  	?>
                 </div>
                </div>
                
				<div class="box-footer">
					<button class="btn btn-primary" type="submit" id="submitObserverGrp">Submit</button>
				</div>
                </div>
	</section>
</body>
</html>
<?php }else{ echo "page not found";}?>