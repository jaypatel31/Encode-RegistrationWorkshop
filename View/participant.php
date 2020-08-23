<?php 
session_start();
require('../Common/Const.php');
require('../Common/'.PDO);
?>
 <?php require('../Common/'.HEAD); ?>
  <style>
	
		.card {
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		  transition: 0.3s;
		  float:left;
		  width: 20%;
		}

		.card:hover {
		  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}

		.card_container {
		  padding: 2px 16px;
		}
		@media screen and (max-width:439px){
			.card{
				width:30%;
			}
		}
		
	</style>
</head>
<body>

	<?php require("../Common/".P_NAVBAR) ?>
    <div class="col-sm-8 text-left"> 
	<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>
      <div id="heading1">Your Profile</div>
      <hr>
		<?php
			if(isset($_SESSION['username'])){
			$sql = "SELECT user_master.user_id,user_master.image,user_master.lname,user_master.Type,user_master.name,user_master.roll,user_master.email,user_master.phone,branch.branch_name,semester.semester_name FROM user_master INNER JOIN semester JOIN branch ON user_master.Branch_id = branch.branch_id AND user_master.Sem_id = semester.semester_id WHERE user_master.roll='".$_SESSION['username']."'";
			$stmt = $pdo->query($sql);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$msg="";
				$name = $row['name']; 
			if($row['Type']==2){
				$msg = "<p class='text-primary'><span class='bold'>Status : </span>Pending</p>";
			}
			else if($row['Type']==1){
				$msg= "<p class='text-success'><span class='bold'>Status : </span>Accepted</p>";
			}
			else if($row['Type']==3){
				$msg= "<p class='text-danger'><span class='bold'>Status : </span>Rejected</p>";
			}
			echo "<div>";
			echo '<div class="card">
					<img src="'.$row['image'].'" alt="Avatar" style="width:100%">
						<div class="card_container">
							<h4><b>'.$name.'</b></h4>
							<p>'.$row['roll'].'</p>
						</div>
					</div>';
			}
			else{
				header('Location: ../index.php');
			}
?>
			<div class="lead" style="float:left;margin-left:20px;width:50%;">
			<?php 
				echo "<p><span class='bold'>Name : </span>".$row['name']." ".$row['lname']."<br/></p>";
				echo "<p><span class='bold'>Email : </span>".$row['email']."<br/></p>";
				echo "<p><span class='bold'>Mobile : </span>".$row['phone']."<br/></p>";
				echo "<p><span class='bold'>Branch : </span>".$row['branch_name']."<br/></p>";
				echo "<p><span class='bold'>Semester : </span>".$row['semester_name']."<br/></p>";
				echo $msg;
				echo "</div>";
			?>
			</div>
		<?php
			if($row['Type']==1){
					ob_start();
					require('../../fpdf/fpdf.php');
					$pdf = new FPDF('L','mm',array(250,150));
					$pdf->AddPage();
					$pdf->SetFont('Courier','B',40);
					$pdf->Cell(70);
					$pdf->SetTextColor(0,0,255);
					$pdf->Cell(100,40,'WORKSHOP IDENTITY CARD',0,2,"C");
					$pdf->Ln(3);
					$pdf->SetFontSize(14);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(150,13,'Name 	   : '.$row['name']." ".$row['lname'],0,2,"L");
					$pdf->Cell(150,13,'Roll No  : '.$row['roll'],0,2,"L");
					$pdf->Cell(150,13,'Branch   : '.$row['branch_name'],0,2,"L");
					$pdf->Cell(150,13,'Semester : '.$row['semester_name'],0,2,"L");
					$pdf->Cell(150,13,'EMAIL    : '.$row['email'],0,2,"L");
					$pdf->Ln(15);
					
					$pdf->SetDrawColor(5,150,0);
					$pdf->SetFillColor(100,150,0);
					$pdf->image($row['image'],205,55,40);
					$pdf->image('../image/logo.png',85,3,70,20);
					$pdf->Output('F','../save/'.$row['roll'].'.pdf');
					ob_end_flush();
		?>

		<?php
				  require ('../../vendor5/autoload.php');
				$barcode = new \Com\Tecnick\Barcode\Barcode();
				$examples = '<h3>Linear</h3>'."\n";
				$type='C128C';
				$code = '31082001';
				 $bobj = $barcode->getBarcodeObj($type, $code, -3, -30, 'black', array(0, 0, 0, 0));
				 $examples .= '<h4>[<span>'.$type.'</span>] '.$code.'</h4><p style="font-family:monospace;">'.$bobj->getHtmlDiv().'</p>'."\n";
				$bobj = $barcode->getBarcodeObj('QRCODE,H', 'https://encoderegistration.000webhostapp.com/save/'.$row['roll'].'.pdf', -4, -4, 'black', array(-2, -2, -2, -2))->setBackgroundColor('#f0f0f0');

				echo "
						<div style='clear:both' class='container'>
						<h3>Scan Code To Download Your IDENTITY Card</h3>
					   <h3 class='text-warning'>NOTE : Please Bring This Identity Card At Workshop.</h3>
						<p><img alt=\"Embedded Image\" src=\"data:image/png;base64,".base64_encode($bobj->getPngData())."\" /></p>
						</div>
					</body>
				</html>
				";  
					
			}
			else if($row['Type']==3){
				echo "<p style='clear:both;font-size:20px' class='lead text-danger'>Try Next Time:)</p>";
			}
		?>
  </div>
</div>
</body>
</html>
