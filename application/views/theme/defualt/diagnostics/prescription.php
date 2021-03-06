<?php
	$visitorId = '';
	$visitorName = '';
	$visitorCode = '';
	$visitorGender = '';
	$visitorDob = '';
	$leaveStatus = '';
	$visitDate = '';

	$dia = '';
	$dia1 = '';
	$dia2 = '';
	$dia_id = '';
	$dia_id1 = '';
	$dia_id2 = '';
	$patientId = '';

	$cured = '';
	$notCured = '';
	$referedOut = '';
	$died = '';

	$statuss = '';
	$getAge = '';
	$i = 0;
	foreach($visitor_info as $row){
		$patientId = $row->patient_id;
		$visitorId = $row->visitors_id;
		$visitorCode = $row->patient_code;
		$visitors_patient_code = $row->visitors_patient_code;
		$status = $row->visitors_status;
    $visitDate = date('d/m/Y', strtotime($row->visitors_in_date));
		if($row->vneonatal_id > 0){
					$visitorDob = $row->neonatal_dob;
					$visitorName = $row->neonatal_kh_name."(".$row->neonatal_en_name.")";
					if ($row->neonatal_gender == "1"){
						$visitorGender = "Male" ;
					}elseif($row->neonatal_gender == "0"){
						$visitorGender = "Female" ;
					}else{
						$visitorGender = "" ;
					}

					$datetime1 = new DateTime();
					$datetime2 = new DateTime($visitorDob);
					$interval = $datetime1->diff($datetime2);
					$dob_year = $interval->format('%y');
					$dob_month = $interval->format('%m');
					$dob_day = $interval->format('%a');
					$dob_hour = $interval->format('%h');
					$dob_min = $interval->format('%i');
					if($dob_year >0){
							$getAge.=$dob_year.' Year';
					}elseif($dob_month > 0){
							$getAge.= $dob_month.' Month';
					}elseif($dob_day > 0){
							$getAge.= $dob_day.' Day';
					}elseif($dob_hour > 0){
							$getAge.= $dob_hour.' Hour';
					}elseif($dob_min > 0){
							$getAge.= $dob_min.' Min';
					}
					$visitorAge = $getAge;
					$visitorDateIn = $row->neonatal_date_in;

		}else{
					$visitorDob = $row->patient_dob;
					$visitorName = $row->patient_kh_name."(".$row->patient_en_name.")";
					if ($row->patient_gender == "m"){
						$visitorGender = "Male" ;
					}elseif($row->patient_gender == "f"){
						$visitorGender = "Female" ;
					}else{
						$visitorGender = "" ;
					}
					$visitorAge = date("Y") - date("Y", strtotime($visitorDob)).' Year';
					$visitorDateIn = $row->patient_date_in;
		}

		if($row->visitors_leave_status == '1'){
		    $cured = 'checked';
		}else if($row->visitors_leave_status == '2'){
		    $notCured = 'checked';
		}else if($row->visitors_leave_status == '3'){
		    $referedOut = 'checked';
		}else if($row->visitors_leave_status == '4'){
		    $died = 'checked';
		}
	}

	// $visitorOutWard = $row->visitors_leave_out_ward;
	// $visitorOutDate = date('d-m-Y',strtotime($row->visitors_out_date));
	// $visitorAverage = $row->visitors_average;
	// $visitorPatientRoom = $row->visitors_patient_room;

	// if($row->visitors_chart_storage == '1'){
	//     $ch_chart = 'checked';
	// }

?>
<div class="col-sm-8">
    <div class="row">
	<div class=" box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default collapsed-box">
		<div class="box-header with-border bg-green align-center handOver" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		    <i class="fa fa-plus"></i>
		    <h3 class="align-center box-title">Print</h3>

		</div>
		  <div class="box-body">
                        <a href="#" id="p15" onclick="printFrm(9);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា </a><br/>
                        <a href="#" id="p15" onclick="printFrm(12);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា2 </a><br/>
                        <a href="#" id="p15" onclick="printFrm(13);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា3</a><br/>
                        <a href="#" id="p15" onclick="printFrm(14);"><i class="fa fa-print"></i> សេវា</a><br/>
                        <a href="#" id="p3" onclick="printFrm(4);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ខ្លាញ់ </a><br/>
                        <a href="#" id="p15" onclick="printFrm(7);"><i class="fa fa-print"></i> Facial Peeling </a><br/>
                        <a href="#" id="p5" onclick="printFrm(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម </a><br/>
                        <a href="#" id="p14" onclick="printFrm(8);"><i class="fa fa-print"></i> Anti Aging Treatment </a><br/>
                        <a href="#" id="p9" onclick="printFrm(3);"><i class="fa fa-print"></i> Q-Switch Laser </a><br/>
                        <a href="#" id="p8" onclick="printFrm(5);"><i class="fa fa-print"></i> CPL Laser </a><br/>
                        <a href="#" id="p10" onclick="printFrm(6);"><i class="fa fa-print"></i> Erbium Yag Laser </a><br/>
                        <a href="#" id="p7" onclick="printFrm(2);"><i class="fa fa-print"></i> Diode Laser </a><br/>

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li id="f1"><a href="#" id="p1" onclick="printRcp(2);"><i class="fa fa-print"></i> ប័ណ្ណ Laser </a></li>
			      <li id="f2"><a href="#" id="p2" onclick="printRcp(6);"><i class="fa fa-print"></i> ប័ណ្ណ Hydroimpact </a></li>
			      <li id="f3"><a href="#" id="p3" onclick="printRcp(5);"><i class="fa fa-print"></i> ប័ណ្ណបូមខ្លាញ់ </a></li>
			      <li id="f4"><a href="#" id="p4" onclick="printRcp(4);"><i class="fa fa-print"></i> ប័ណ្ណ Modern Facial </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f5"><a href="#" id="p5" onclick="printRcp(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ </a></li>
			      <li id="f6"><a href="#" id="p6" onclick="printRcp(3);"><i class="fa fa-print"></i> Skin Care </a></li>
			      <li id="f7"><a href="#" id="p7" onclick="printFrm(2);"><i class="fa fa-print"></i> Diode Laser </a></li>
			      <li id="f8"><a href="#" id="p8" onclick="printFrm(5);"><i class="fa fa-print"></i> CPL Laser </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f9"><a href="#" id="p9" onclick="printFrm(3);"><i class="fa fa-print"></i> Q-Switch Laser </a></li>
			      <li id="f10"><a href="#" id="p10" onclick="printFrm(6);"><i class="fa fa-print"></i> Erbium Yag Laser </a></li>
			      <li id="f11"><a href="#" id="p11" onclick="printFrm(7);"><i class="fa fa-print"></i> Facial Peeling </a></li>
			      <li><a href="#" id="p15" onclick="printFrm(9);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li><a href="#" id="p12" onclick="printFrm(4);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ខ្លាញ់ </a></li>
				<li><a href="#" id="p13" onclick="printFrm(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម</a></li>
				<li><a href="#" id="p14" onclick="printFrm(8);"><i class="fa fa-print"></i> Treatment </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->
		  </div>
	      </div>
	    </div>
	</div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Patient Information (<?php echo $visitDate;?>)
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		      <div class="col-sm-4">
			  <p> <?php echo @$name." : ".$visitorName;?><small class="label bg-red" id="visit_amount"></small></p>
		      </div>
		      <div class="col-sm-3">
			  <p> <?php echo @$code." : ".$visitors_patient_code;?></p>
		      </div>
		      <div class="col-sm-3">
			  <p> <?php echo @$gender." : ".$visitorGender;?></p>
		      </div>
		      <div class="col-sm-2">
			  <p> <?php echo @$age." : ".$visitorAge;?></p>
		      </div>

		      <div class="col-sm-4">
			  		<p> <?php echo @$date_in." : ".$visitorDateIn;?></p>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		    Diagnostic IN
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
                        <!--<div style="margin-bottom: 10px; font-size: 16px; font-weight: 600;" class="col-sm-12 alert alert-success alert-dismissible">
                                <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="Never show me this again!" style="color: rgb(255, 255, 255); font-size: 20px;">×</a>
                                        Save Sucessfull!
                                </a>
                        </div>-->
                        <table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
                            <thead>
                                <th>No</th>
                                <th>Diagnostic</th>
                                <th>Level</th>
																<th>Detail</th>
																<th>Ward</th>
                                <th>Room</th>
                            </thead>
                            <tbody id="diags"></tbody>
                        </table>

			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					Diagnostic
				    </div>
				    <input type="text" name="diagnostic" id="diagnostic" class="form-control">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic Level
				    </div>
				    <input type="text" name="diagnostic_level" id="diagnostic_level" class="form-control">
				</div>
			    </div>
			    <!-- Desc 0 -->
			    <div class="form-group">
				    <textarea name="desc_dia" id="desc_dia" class="form-control" rows="5"></textarea>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic1
				    </div>
				    <input type="text" name="diagnostic1" id="diagnostic1" class="form-control">
				</div>
			    </div>

			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic1 Level
				    </div>
				    <input type="text" name="diagnostic1_level" id="diagnostic1_level" class="form-control">
				</div>
			    </div>

			    <!-- Desc 1 -->
			    <div class="form-group">
				<textarea name="desc_dia1" id="desc_dia1" class="form-control" rows="5"></textarea>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic2
				    </div>
				    <input type="text" name="diagnostic2" id="diagnostic2" class="form-control">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic2 Level
				    </div>
				    <input type="text" name="diagnostic2_level" id="diagnostic2_level" class="form-control">
				</div>
			    </div>
			    <!-- Desc 2 -->
			    <div class="form-group">
				<textarea name="desc_dia2" id="desc_dia2" class="form-control" rows="5"></textarea>
			    </div>
			</div>

			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Ward 1
				    </div>
				    <?php echo form_dropdown('ward1', $drop_wards, '','class="form-control" id="ward1"');?>
				</div>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Ward 2
				    </div>
				    <?php echo form_dropdown('ward2', $drop_wards, '','class="form-control" id="ward2"');?>
				</div>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Ward 3
				    </div>
				    <?php echo form_dropdown('ward3', $drop_wards, '','class="form-control" id="ward3"');?>
			    </div>
			</div>
			</div>
			<!-- Room ward  -->
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Room 1
				    </div>
				    <?php echo form_dropdown('room1', $drop_rooms, '','class="form-control" id="room1"');?>
			    </div>
			</div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Room 2
				    </div>
				    <?php echo form_dropdown('room2', $drop_rooms, '','class="form-control" id="room2"');?>
			    </div>
			</div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  	Room 3
				    </div>
				    <?php echo form_dropdown('room3', $drop_rooms, '','class="form-control" id="room3"');?>
			    </div>
			</div>
			</div>

			<div class="col-sm-4">
			    <div class="input-group-btn">
				    <button class="btn btn-sm btn-default" id="btn_save" onclick="saveDianostic();" style="background:#3c8dbc;font-size:15px;color:white; margin-bottom: 5px;"><i class="fa fa-save"></i> Save</button>
			    </div>
			</div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Medicine
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">

			<div class="col-sm-12 box-tools pull-left" style="margin-bottom:5px;">
			    <div class="input-group-btn">
				    <button class="btn btn-sm btn-default" id="btn_create" onclick="addMedicine();"><i class="fa fa-plus-circle primary"></i> Add Medicine </button>
			    </div>
			</div>
			<div class="col-sm-12">
			    <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				    <thead>
					    <tr role="row">
						    <th style="width: 25%"><?php echo $date;?></th>
						    <th style="width: 15%;"><?php echo $medicine;?></th>
						    <th style="width: 14%;"><?php echo $qty;?></th>
						    <th style="width: 14%;"><?php echo $price;?></th>
						    <th style="width: 12%;"><?php echo $doctor;?></th>
						    <th style="width: 5%;"><?php echo $am;?></th>
						    <th style="width: 5%;"><?php echo $af;?></th>
						    <th style="width: 5%;"><?php echo $pm;?></th>
						    <th style="width: 5%;"><?php echo $nt;?></th>
						    <th style="width: 10%;"></th>
					    </tr>
				    </thead>
				    <tbody id="md_id"></tbody>
			    </table>
			</div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>


    <!-- Service-->
    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Service
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		    <div class="col-sm-12 box-tools pull-left" style="margin-bottom:5px;">
			<div class="input-group-btn">
				<button class="btn btn-sm btn-default" id="btn_create" onclick="addService();"><i class="fa fa-plus-circle primary"></i> Add Service </button>
			</div>
		    </div>
		    <div class="col-sm-12">
			<table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
			    <thead>
				<tr role="row">
					<th colspan="2"><?php echo $date;?></th>
					<th colspan="3" style="text-align:center;"><?php echo $service;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $qty;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $price;?></th>
          <th style="text-align:center;"><?php echo $discount;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $doctor;?></th>
					<th colspan="3"></th>
				</tr>
				<!--<tr role="row">
					<th>Fitzpatrik</th>
					<th>Fluence</th>
					<th>Pulse Length</th>
					<th>Frequency</th>
					<th>Mode</th>
					<th>No Of Treal</th>
					<th>Lens</th>
					<th>Spot Size</th>
					<th>Cut Off Filter</th>
					<th>Pulse Train</th>
					<th>Pause Length</th>
					<th>Pulse With Us</th>
					<th>Energy Mj</th>
				</tr>-->
			    </thead>
			    <tbody  id="se_id"></tbody>
			</table>
		    </div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>

    <?php
	// if($status == '2'){
	if ( in_array($status, array('2','109','108','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58'), true ) ) {
    ?>
    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">

		    		<div class="box-header with-border bg-green align-center">
							<h3 class="align-center box-title">
							    Surgery Protocol
							</h3>
						</div>
						<div class="panel-collapse collapse in">
						    <div class="box-body">

						    	<div class="col-sm-12">
						            <table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
						                <thead>
						                    <th>No</th>
						                    <th>Title</th>
						                    <th>Date</th>
						                    <th></th>
						                </thead>
						                <tbody id="surgeryProtocol">
														</tbody>
														<tfoot>
																<tr>
																			<td></td>
																			<td style="text-align:center;">
																					 <input type="text" id="protocol_title" style="text-align:center;" class="form-control cleanProt" placeholder="Protocol Title" onkeyup="autoProtocols();">
																					 <input type="text" name="protocol_id" id="protocol_id" class="form-control cleanProt" style="display:none">
																			</td>
																			<td style="text-align:center;">
																						<input class="form-control col-sm-12 cleanProt" type="text" placeholder="Date" id="protocol_date">
																						<input type="text" name="ipd_protocol_id" id="ipd_protocol_id" class="form-control" style="display:none">
																			</td>
																			<td rowspan="7" style="text-align:center; vertical-align: middle;">
																						<span class="handOver saveProtocolData" onclick="saveProtocolData();"><i class="fa fa-save action-btn primary"></i></span>
																			</td>
																</tr>
																<tr>
																			<td></td>
																			<td colspan="2" style="text-align:center;">
																				<div class="input-group col-sm-12 col-xs-12">
																						<div class="input-group-addon"> Surgeon Name</div>
																						<input type="text" name="surgeon" id="surgeonName" class="form-control cleanProt" onkeyup="autoSurgeonDoc();">
																						<input type="text" name="surgeon_id" id="surgeonId" class="form-control cleanProt getProtoId" style="display:none">
																				</div>
																			</td>
																</tr>
																<tr>
																			<td></td>
																			<td colspan="2" style="text-align:center;">
																				<div class="input-group col-sm-12 col-xs-12">
																						<div class="input-group-addon"> Anesthesia Name </div>
																						<input type="text" name="anesthesia" id="anesthesiaName" class="form-control cleanProt" onkeyup="autoAnesthesiaDoc();">
																						<input type="text" name="anesthesia_id" id="anesthesiaId" class="form-control cleanProt getProtoId" style="display:none">
																				</div>
																			</td>
																</tr>
																<tr>
																			<td></td>
																			<td colspan="2" style="text-align:center;">
																				<div class="input-group col-sm-12 col-xs-12">
																							<div class="input-group-addon"> Anesthesia Name </div>
																						<input type="text" name="surgeon_helper" id="surgeonHelperName" class="form-control cleanProt" onkeyup="autoSurgeonHelperDoc();">
																						<input type="text" name="surgeon_helper_id" id="surgeonHelperId" class="form-control cleanProt getProtoId" style="display:none">
																				</div>
																			</td>
																</tr>
																<tr>
																			<td></td>
																			<td colspan="2" style="text-align:center;">
																				<div class="input-group col-sm-12 col-xs-12">
																						<div class="input-group-addon"> Neo Doctor Name </div>
																						<input type="text" name="neo_doctor" id="neoDoctorName" class="form-control cleanProt" onkeyup="autoNeoDoc();">
																						<input type="text" name="neo_doctor_id" id="neoDoctorId" class="form-control cleanProt getProtoId" style="display:none">
																				</div>
																			</td>
																</tr>
																<tr>
																			<td></td>
																			<td colspan="2" style="text-align:center;">
																				<div class="input-group col-sm-12 col-xs-12">
																						<div class="input-group-addon"> Midwife Name </div>
																						<input type="text" name="midult" id="midultName" class="form-control cleanProt" onkeyup="autoMidultDoc();">
																						<input type="text" name="midwife_id" id="midwife" class="form-control cleanProt getProtoId" style="display:none">
																				</div>
																			</td>
																</tr>
														</tfoot>
						            </table>
						        </div>

						    </div>
						</div>
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Diagnostic OUT
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
                    <div class="box-body">

                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
                                <thead>
                                    <th>No</th>
                                    <th>Diagnostic</th>
                                    <th>Level</th>
                                    <th>Detail</th>
                                </thead>
                                <tbody id="diagOuts"></tbody>
                            </table>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic
                                    </div>
                                    <input type="text" name="out_dia" id="out_dia" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic Level
                                    </div>
                                    <input type="text" name="out_dia_level" id="out_dia_level" class="form-control">
                                </div>
                            </div>
                            <!-- Desc 0 -->
                            <div class="form-group">
                                    <textarea  name="out_dia_des" id="out_dia_des" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic1
                                    </div>
                                    <input type="text" name="out_dia1" id="out_dia1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic1 Level
                                    </div>
                                    <input type="text" name="out_dia1_level" id="out_dia1_level" class="form-control">
                                </div>
                            </div>
                            <!-- Desc 1 -->
                            <div class="form-group">
                                <textarea  name="out_dia1_des" id="out_dia1_des" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic2
                                    </div>
                                    <input type="text"  name="out_dia2" id="out_dia2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Diagnostic2 Level
                                    </div>
                                    <input type="text"  name="out_dia2_level" id="out_dia2_level" class="form-control">
                                </div>
                            </div>
                            <!-- Desc 2 -->
                            <div class="form-group">
                                <textarea  name="out_dia2_des" id="out_dia2_des" class="form-control" rows="5"></textarea>
                            </div>
		    </div>

		    <!-- Desc 2 -->
		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				    <input type="checkbox" id="cure" value="1" <?php echo $cured;?>>
				</span>
			    <input type="text" value="<?php echo @$cure;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="notCure" value="1" <?php echo $notCured;?>>
				</span>
			    <input type="text" value="<?php echo @$notCure;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="referOut" value="1" <?php echo $referedOut;?>>
				</span>
			    <input type="text" value="<?php echo @$referOut;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				    <input type="checkbox" id="death" value="1" <?php echo $died;?>>
				</span>
				<input type="text" value="<?php echo @$death;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-4">
			    <div class="input-group-btn">
				<button class="btn btn-sm btn-default" id="btn_out_save" onclick="saveOutDianostic();" style="background:#3c8dbc;font-size:15px;color:white; margin-bottom: 5px;"><i class="fa fa-save"></i> Save</button>
			    </div>
		    </div>
		  </div>

			<div class="box-header with-border bg-green align-center">
				<h3 class="align-center box-title">
				    <?php echo $vital_sign?>
				</h3>
			</div>
					<table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
                        <thead>
                            <th>No</th>
                            <th><?php echo @$pulseRate;?></th>
                            <th><?php echo @$bloodPressure;?></th>
                            <th><?php echo @$heartRate;?></th>
							<th><?php echo @$respiratoryRate;?></th>
							<th><?php echo @$temperature;?></th>
							<th></th>
                        </thead>
                        <tbody id="vsipd_table"></tbody>
                    </table>


					<!--Pulse Rate-->
					<div class="form-group">
					      <div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$pulseRate;?>
								</div>
								<input type="text" name="pulse_rate" id="pulse_rate" class="form-control">
								<input type="hidden" name="virtual_id" id="virtual_id" class="form-control">
					     </div>
					</div>

					<!--Blood Pressure-->
					<div class="form-group">
					      <div class="input-group">
						<div class="input-group-addon">
						      <?php echo @$bloodPressure;?>
						</div>
						<input type="text" name="blood_pressure" id="blood_pressure" class="form-control">
					      </div>
					</div>

					<!--Heart Rate-->
					<div class="form-group">
					      <div class="input-group">
						<div class="input-group-addon">
						      <?php echo @$heartRate;?>
		</div>
						<input type="text" name="heart_rate" id="heart_rate" class="form-control">
	      </div>
	    </div>

					<!--Respiratory Rate-->
					<div class="form-group">
					      <div class="input-group">
						<div class="input-group-addon">
						      <?php echo @$respiratoryRate;?>
	</div>
						<input type="text" name="respiratory_rate" id="respiratory_rate" class="form-control">
    </div>
					</div>
					<!--Temperature-->
					<div class="form-group">
					      <div class="input-group">
						<div class="input-group-addon">
						      <?php echo @$temperature;?>
						</div>
						<input type="text" name="temperature" id="temperature" class="form-control">
					      </div>
					</div>
			<!-- xxx -->
		    <div class="col-sm-4">
			    <div class="input-group-btn">
				<button class="btn btn-sm btn-default" id="btn_room_storage_save" onclick="saveVirtualSignDia();" style="background:#3c8dbc;font-size:15px;color:white; margin-bottom: 5px;"><i class="fa fa-save"></i> Save</button>
			    </div>
		    </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>
    <?php }?>
    <div class="row">
        <div class="box-body">
            <div class="box-group" id="accordion">
              <div class="panel box box-default">
                <div class="box-header with-border bg-green align-center">
                  <h3 class="align-center box-title">
                      Clincal Note
                  </h3>
                </div>
                <div class="panel-collapse collapse in">
                  <div class="box-body">

                            <div class="col-sm-12 box-tools pull-left" style="margin-bottom:5px;">
                                    <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default" id="btn_create" onclick="addNote();"><i class="fa fa-plus-circle primary"></i> Add Note </button>
                                    </div>
                            </div>

                        <div class="col-sm-12">
	                            <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                            <tr role="row">
                                                    <th style="width:20%;"><?php echo $date;?></th>
                                                    <th style="text-align:center;width:80%;"><?php echo @$desc;?></th>
                                            </tr>
                                    </thead>
                                    <tbody  id="clinic_id"></tbody>
                            </table>
                        </div>

                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box-body">
            <div class="box-group" id="accordion">
              <div class="panel box box-default">
                <div class="box-header with-border bg-green align-center">
                  <h3 class="align-center box-title">
                      Appoinment
                  </h3>
                </div>
                <div class="panel-collapse collapse in">
                  <div class="box-body">
                  			<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Appoinment Date
                                    </div>
                                    <input class="form-control col-sm-12" type="text" id="appment">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                          Appoinment Doctor
                                    </div>
                                    <input name="doctor_name" class="form-control input-sm pull-right" id="doctorName">
                            				<input type="hidden" name="doctor_id" id="doctorId" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
							      <div class="input-group">
								  <div class="input-group-addon">
								      	Ward
								</div>
								<?php echo form_dropdown('ward', @$drop_wards, @$ward_id,'class="form-control" id="wardId"');?>
							      </div>
							</div>
                        	<button class="col-sm-12 saveApp" onclick="saveAppoinment();">Save Appoinment</button>
                  </div>
                </div>
              </div>
            </div>

            Appointment Date: <span id="appd"></span><br>
            Appointment Doctor: <span id="appdoc"></span><br>
            Appointment Ward: <span id="appWard"></span><br>
        </div>
    </div>
</div>

<div class="col-sm-4">
      <a href="<?php echo $base_url;?>index.php/patients/photo/<?php echo $patientId;?>" target="_blank"> <button class="btn btn-sm btn-default col-sm-12">View Patient Photo</button> </a><br/>
      <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <tbody  id="v_id"></tbody>
      </table>
</div>

<style>
    .bordered{
	border: solid 1px #d2d6de !important;
    }
    .borderBottom{
	border-bottom: 1px solid #d2d6de;
	padding-bottom: 15px !important;
	color: #007fff !important;
    }
    .myExample > thead > tr > th{
	text-align: center !important;
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
    }
    .bloom-row > td{
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
	color: red;
    }
    .bloom-row-2 > td{
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
	color: green;
    }
    .myExample > tbody > tr > td{
	text-align: center !important;
    }
    .myExample > tbody > tr:hover{
	background: #FFF !important;
    }
    .handOver {
	cursor: pointer;
	cursor: hand;
    }
    #visit_amount{
	margin-left: 2px !important;
    }
    .textLeft{
        text-align: left !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $resources;?>plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo $resources;?>plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script>
	var vid = <?php echo $visitorId;?>;
	getViewSvipdList();
	var dia = 0;
	var dia1 = 0;
	var dia2 = 0;
	var out_dia = 0;
	var out_dia1 = 0;
	var out_dia2 = 0;
	var pid = <?php echo $patientId;?>;
	var vs_pcode = "<?php echo $visitors_patient_code;?>";
	var came = 1;
	$(document).ready(function(){
			$( "#appment" ).datepicker({dateFormat: "dd-mm-yy",changeYear:true,changeMonth:true,yearRange: "1965:2030"});
			$('#protocol_date').datetimepicker({format:'Y-m-d H:i:s'});
			if($('#doctorId').val() == ''){
				// $('.saveApp').prop( "disabled", true );
			}
			$("#surgeryProtocol").on('click','#updateDescProt',function(){
						id = $(this).data('id');
						desc = $(this).parent().parent().find("#descProtocol").val();
						$.post("<?php echo $base_url;?>index.php/protocols/getEditDesc/"+id,{
								desc: desc
						},function(data, status) {
								getProtocol();
						});
			});
			$( '#doctorName' ).keypress(function(e){
				    var dinput = this.value;
				    var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
				    var soc = String(url+dinput);
				    $( '#doctorName' ).autocomplete({source: soc});

				    if(event.keyCode == 13){
					    $.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
							$.each(data, function(key,value) {
								idDoctor = value.uid;
					    		$( '#doctorId' ).val(value.uid);
							});
							$('.saveApp').prop( "disabled", false );
					    });
						}
	    });

	    $( '#diagnostic').keyup(function(e){
			    var dinput = this.value;
			    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
			    var soc = String(url+dinput);
			    $( '#diagnostic' ).autocomplete({source: soc});
	    });
	    $( '#diagnostic1' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#diagnostic1' ).autocomplete({source: soc});
	    });
	    $( '#diagnostic2' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#diagnostic2' ).autocomplete({source: soc});
	    });
	    $( '#out_dia' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia' ).autocomplete({source: soc});
	    });
	    $( '#out_dia1' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia1' ).autocomplete({source: soc});
	    });
	    $( '#out_dia2' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia2' ).autocomplete({source: soc});
	    });

			getProtocol();
	    getDia(vid);
	    getMedicine(vid);
	    getService(vid);
	    getVisitTime(vs_pcode);
	    getNote(vid);
	    getAppoinment();
	});

	function autoForm(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/form_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});

	    if(event.keyCode == 13){
		checkService();
	    }

	}

        function autoFormMedicine(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/form_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});

	    if(event.keyCode == 13){
		checkMedicine();
	    }

	}


	function autoMedicine(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/products/product_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val().split("-");
	    if(event.keyCode == 13){
					$( '#mQty' ).val('1');
					$( '#mPrice' ).val(res[3]);
	        $( '#mTime' ).val(res[4]);
	    }
	}
	function autoDoctor(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/doctor_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'inpput:focus' ).val();
	}
	function autoSurgeonDoc(){
			var dinput = $( 'input:focus' ).val();
			var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
			var soc = String(url+dinput);
			$( 'input:focus' ).autocomplete({source: soc});
			// var res = $( 'inpput:focus' ).val();
			if(event.keyCode == 13){
					$.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
							$.each(data, function(key,value) {
								idDoctor = value.uid;
									$( '#surgeonId' ).val(value.uid);
							});
					});
			}
	}
	// Surgeon Protocol DN
	function autoAnesthesiaDoc(){
			var dinput = $( 'input:focus' ).val();
			var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
			var soc = String(url+dinput);
			$( 'input:focus' ).autocomplete({source: soc});
			// var res = $( 'inpput:focus' ).val();
			if(event.keyCode == 13){
					$.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
							$.each(data, function(key,value) {
								idDoctor = value.uid;
									$( '#anesthesiaId' ).val(value.uid);
							});
					});
			}
	}
	function autoSurgeonHelperDoc(){
			var dinput = $( 'input:focus' ).val();
			var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
			var soc = String(url+dinput);
			$( 'input:focus' ).autocomplete({source: soc});
			// var res = $( 'inpput:focus' ).val();
			if(event.keyCode == 13){
					$.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
							$.each(data, function(key,value) {
								idDoctor = value.uid;
									$( '#surgeonHelperId' ).val(value.uid);
							});
					});
			}
	}
	function autoNeoDoc(){
		var dinput = $( 'input:focus' ).val();
		var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
		var soc = String(url+dinput);
		$( 'input:focus' ).autocomplete({source: soc});
		// var res = $( 'inpput:focus' ).val();
		if(event.keyCode == 13){
				$.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
						$.each(data, function(key,value) {
							idDoctor = value.uid;
								$( '#neoDoctorId' ).val(value.uid);
						});
				});
		}
	}
	function autoMidultDoc(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/users/get_doctor_by_name_json/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    // var res = $( 'inpput:focus' ).val();
			if(event.keyCode == 13){
					$.post("<?php echo $base_url;?>index.php/users/get_doctor_json/"+dinput,function(data){
							$.each(data, function(key,value) {
								idDoctor = value.uid;
									$( '#midwife' ).val(value.uid);
							});
					});
			}
	}
	function autoProtocols(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/protocols_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});

			// var res = $( 'inpput:focus' ).val();
			if(event.keyCode == 13){
				$.post("<?php echo $base_url;?>index.php/diagnostics/get_protocol_json/"+dinput,function(data){
					$.each(data, function(key,value) {
						idProtocol = value.protocols_id;
							$( '#protocol_id' ).val(value.protocols_id);
					});
				});
			}
	}

	function autoService(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/products/service_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val().split("-");
	    if(event.keyCode == 13){
				$( '#sQty' ).val('1');
				$( '#sPrice' ).val(res[3]);
	    }
	}

	function saveDianostic(){
		var visitorId = vid;
		var dianostic = $('#diagnostic').val();
		var dianostic_level = $('#diagnostic_level').val();
		var dianostic_de = $('#desc_dia').val();
		var dianostic_ward1 = $('#ward1 option:selected').val();
		var dianostic_room1 = $('#room1 option:selected').val();

		var dianostic1 = $('#diagnostic1').val();
		var dianostic1_level = $('#diagnostic1_level').val();
		var dianostic1_de = $('#desc_dia1').val();
		var dianostic1_ward2 = $('#ward2 option:selected').val();
		var dianostic_room2 = $('#room2 option:selected').val();

		var dianostic2 = $('#diagnostic2').val();
		var dianostic2_level = $('#diagnostic2_level').val();
		var dianostic2_de = $('#desc_dia2').val();
		var dianostic2_ward3 = $('#ward3 option:selected').val();
		var dianostic_room3 = $('#room3 option:selected').val();

		$.post("<?php echo $base_url;?>index.php/diagnostics/add_dia/"+visitorId,{
			dia: dianostic,
			dia_id: dia,
			dia_de: dianostic_de,
			dia_level: dianostic_level,
			dia_ward1: dianostic_ward1,
			dia_room1: dianostic_room1,

			dia1: dianostic1,
			dia1_id: dia1,
			dia1_de: dianostic1_de,
			dia1_level: dianostic1_level,
			dia1_ward2: dianostic1_ward2,
			dia_room2: dianostic_room2,

			dia2_id: dia2,
			dia2: dianostic2,
			dia2_de: dianostic2_de,
			dia2_level: dianostic2_level,
			dia2_ward3: dianostic2_ward3,
			dia_room3: dianostic_room3
		},function(){
			getDia(vid);
			getDia(vid);
			getDia(vid);
    	getVisitTime(vs_pcode);
		});
	}

	function saveOutDianostic(){
		var visitorId = vid;
		var out_ward = $('#out_ward').val();
		var out_date = $('#out_date').val();
		var average = $('#average').val();

		var myStatus = '';
		if(checkBoxSave($('#cure:checked').val()) == '0'){
		    myStatus = '1';
		}
		if(checkBoxSave($('#notCure:checked').val()) == '0'){
		    myStatus = '2';
		}
		if(checkBoxSave($('#referOut:checked').val()) == '0'){
		    myStatus = '3';
		}
		if(checkBoxSave($('#death:checked').val()) == '0'){
		    myStatus = '4';
		}

		$.post("<?php echo $base_url;?>index.php/visitors/visitor_leave_status/"+myStatus+"_"+visitorId,{
				out_ward:out_ward,
				out_date:out_date,
				average:average
		},function (){});

		var dianostic = $('#out_dia').val();
		var dianostic_level = $('#out_dia_level').val();
		var dianostic_de = $('#out_dia_des').val();
		var dianostic1 = $('#out_dia1').val();
		var dianostic1_level = $('#out_dia1_level').val();
		var dianostic1_de = $('#out_dia1_des').val();
		var dianostic2 = $('#out_dia2').val();
		var dianostic2_level = $('#out_dia2_level').val();
		var dianostic2_de = $('#out_dia2_des').val();

				$.post("<?php echo $base_url;?>index.php/diagnostics/add_dia/"+visitorId,{
					dia: out_ward,
					dia: out_date,
					dia: dianostic,
					dia_id: out_dia,
					dia_de: dianostic_de,
					dia_level: dianostic_level,
					dia1: dianostic1,
					dia1_id: out_dia1,
					dia1_de: dianostic1_de,
					dia1_level: dianostic1_level,
					dia2_id: out_dia2,
					dia2: dianostic2,
					dia2_de: dianostic2_de,
					dia2_level: dianostic2_level
				},function(){
                    getDia(vid);
                    getDia(vid);
                    getDia(vid);
                    getVisitTime(vs_pcode);
                });
		}

	function saveVirtualSignDia(){
			var visitor_id = vid;
			var virtual_id = $('#virtual_id').val();
			var pulse_rate = $('#pulse_rate').val();
			var blood_pressure = $('#blood_pressure').val();
			var heart_rate = $('#heart_rate').val();
			var respiratory_rate = $('#respiratory_rate').val();
			var temperature = $('#temperature').val();
			$.post("<?php echo $base_url;?>index.php/diagnostics/saveVirtualSign",{
					visitor_id:visitor_id,
					virtual_id:virtual_id,
					pulse_rate:pulse_rate,
					blood_pressure:blood_pressure,
					heart_rate:heart_rate,
					respiratory_rate:respiratory_rate,
					temperature:temperature
			},function (data, status){
				$('#virtual_id').val('');
				getViewSvipdList();
			});
	}

	function getViewSvipdList(){
		var i = 0;
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_vsipd_list/"+vid,function (data,status){
			$.each(data, function(key,value) {
			    i = i + 1;
                htmlView += '<tr class="bloom-row-2">';
                    htmlView += '<td style="text-align:center;">'+i+'</td>';
                    htmlView += '<td style="text-align:center;">'+value.vsipd_pulse+'</td>';
                    htmlView += '<td style="text-align:center;">'+value.vsipd_blood_pressure+'</td>';
                    htmlView += '<td style="text-align:center;">'+value.vsipd_heart_rate+'</td>';
                    htmlView += '<td style="text-align:center;">'+value.vsipd_respirateory_rate+'</td>';
                    htmlView += '<td style="text-align:center;">'+value.vsipd_temperature+'</td>';
                    htmlView += '<td style="text-align:center;">';
	                    htmlView += '<span class="handOver" onclick="editVsipd('+value.vsipd_id+');"><i class="fa fa-edit action-btn primary"></i></span>';
	                    htmlView += '<span class="handOver" onclick="deleteVsipd('+value.vsipd_id+');"><i class="fa fa-trash-o action-btn danger"></i></span>';
                    htmlView += '</td>';
                htmlView += '</tr>';
			});
			$('#vsipd_table').html(htmlView);
	    });
	}
	function editVsipd(vsipd_id){
		 $.post("<?php echo $base_url;?>index.php/diagnostics/get_vsipd_list_byid/"+vsipd_id,
		 function(data,status){
			$.each(data, function(key,value) {
				$('#virtual_id').val(value.vsipd_id);
				$('#pulse_rate').val(value.vsipd_pulse);
				$('#blood_pressure').val(value.vsipd_blood_pressure);
				$('#heart_rate').val(value.vsipd_heart_rate);
				$('#respiratory_rate').val(value.vsipd_respirateory_rate);
				$('#temperature').val(value.vsipd_temperature);
			});
		 });
	}
	function deleteVsipd(vsipd_id){
		$.post("<?php echo $base_url;?>index.php/diagnostics/delete_vsipd_list_byid/"+vsipd_id,function() {
		    getViewSvipdList(vid);
		});
	}
	function getVisitTime(vs_pcode){
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/visitors/get_visitor_list_by_patient_id/"+vs_pcode,function (data,status){
				var vid = 0;
				var vs_pcode = '';
				var vdate = '';
				var htmlView = '';
				var sr = '';
		    var pr = '';
				var din = '';
        var icd10Code = '';
        var icd10Desc = '';
        var detail = '';
        var diaLevel = '';
        var dis = 0;
        var amount = 0;
        var vsid = 0;
        $('#v_id').html('');

				$.each(data, function(key,value) {
		    		vid = parseInt(value.visitors_id);
				    if(din == ''){
								i = i + 1;
			          vsid = value.visitors_id;
								din = value.visitors_in_date;
			          dis = parseFloat(value.items_discount);
			          amount = parseFloat(value.items_qty) * parseFloat(value.items_prices);
			          if(value.icd10_code != '' && value.icd10_desc != ''){
			              icd10Code =  '(' + value.icd10_code + ')-';
			              icd10Desc =  value.icd10_desc;
			              detail = ' [' + value.diagnostics_detail + ']';
			              diaLevel = '{' + value.diagnostics_level + '}';
			          }
								if(value.types_id == '4'){
		                sr = value.products_name;
		            }else{
		                pr = value.products_name;
		            }
				    }else if(din != value.visitors_in_date){
		              htmlView = '<tr class="bloom-row"><td colspan="2" class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vsid+');">' + $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td></tr>';
		              htmlView += '<tr><td class="handOver"> D ' + diaLevel + ' </td>';
		              htmlView += '<td>' + icd10Code + icd10Desc + detail + '</td></tr>';
		              htmlView += '<tr><td class="handOver"> M </td>';
		              htmlView += '<td>'+ pr +'</td></tr>';
		              htmlView += '<tr><td class="handOver"> S </td>';
		              htmlView += '<td>'+ sr +'</td></tr>';
		              htmlView += '<tr><td class="handOver"> Dis </td>';
		              htmlView += '<td>' + dis + '$ </td></tr>';
		              htmlView += '<tr><td class="handOver"> Total </td>';
		              htmlView += '<td>' + (parseFloat(amount)-parseFloat(dis)) + '$ </td></tr>';
		              $('#v_id').append(htmlView);

		              /*htmlView += '<span class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vid+');"><i class="fa fa-search action-btn primary"></i></span>&nbsp;&nbsp;';*/
		              /*startTrTd();
		                  setTd(1);
		                  setTd($.datepicker.formatDate('dd-mm-yy', new Date(value.visitors_in_date)));
		                  setTd(sr);
		                  setTd(htmlView);
		              stopTrTd();*/

		              htmlView = '';
		              i = i + 1;
		              vid = parseInt(value.visitors_id);
		              dis = parseFloat(value.items_discount);
		              amount = parseFloat(value.items_qty) * parseFloat(value.items_prices);
		              if(value.icd10_code != '' && value.icd10_desc != ''){
		                  icd10Code =  '(' + value.icd10_code + ')-';
		                  icd10Desc =  value.icd10_desc;
		                  detail = ' [' + value.diagnostics_detail + ']';
		                  diaLevel = '{' + value.diagnostics_level + '}';
		              }

		              if(value.types_id == '4'){
		                  sr = value.products_name;
		              }else{
		                  pr = value.products_name;
		              }
		              din = value.visitors_in_date;

		        }else{
		              if(value.types_id == '4'){
		                  if(sr == ''){
		                      sr = value.products_name;
		                  }else{
		                      sr = sr + "," + value.products_name;
		                  }
		              }else{
		                  if(pr == ""){
		                      pr = value.products_name;
		                  }else{
		                      pr = pr + "," + value.products_name;
		                  }
		              }
		              dis = parseFloat(dis) + parseFloat(value.items_discount);
		              amount = parseFloat(amount) + (parseFloat(value.items_qty) * parseFloat(value.items_prices));
		        }
		});

		htmlView = '<tr class="bloom-row"><td colspan="2" class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vsid+');">' + $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td></tr>';
                htmlView += '<tr><td class="handOver"> D ' + diaLevel + ' </td>';
                htmlView += '<td>' + icd10Code + icd10Desc + detail + '</td></tr>';
                htmlView += '<tr><td class="handOver"> M </td>';
                htmlView += '<td>'+ pr +'</td></tr>';
                htmlView += '<tr><td class="handOver"> S</td>';
                htmlView += '<td>'+ sr +'</td></tr>';
                htmlView += '<tr><td class="handOver"> Dis </td>';
                htmlView += '<td>' + dis + '$ </td></tr>';
                htmlView += '<tr><td class="handOver"> Total </td>';
                htmlView += '<td>' + (parseFloat(amount)-parseFloat(dis)) + '$ </td></tr>';


		$('#v_id').append(htmlView);

		came = parseInt(came) + i;
		$("#visit_amount").text(" "+ i.toString());
	    });
	}

	function getMedicine(ids){
	    var i = 0;
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_list/"+ids,function (data,status){
		$.each(data, function(key,value) {

		    i = i + 1;

                    htmlView += '<tr class="bloom-row-2">';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign By</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_from+'</td>';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign To</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_to+'</td>';
                    htmlView += '</tr>';

		    htmlView += '<tr>';
			htmlView += '<td  style="text-align:center !important;">'+$.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified))+'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')</td>';
			}else{
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')-['+value.forms_name+']</td>';
			}

			htmlView += '<td  style="text-align:center !important;">'+value.items_qty+' '+ value.units_name+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_prices+'</td>';
			/*htmlView += '<td  style="text-align:center !important;">$'+value.items_discount+'</td>';*/
			htmlView += '<td  style="text-align:center !important;">'+value.accept_by+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_am+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_af+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_pm+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_nt+'</td>';
			htmlView += '<td  style="text-align:center !important;">';
			    htmlView += '<span class="handOver" title="<?php echo @$edit;?>" onclick="updateMedicine('+ value.service_items_id +');"><i class="fa fa-edit action-btn primary"></i></span>&nbsp;&nbsp;';
			    htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="deleteMedicine('+ value.service_items_id +');"><i class="fa fa-trash-o action-btn danger"></i></span>';
			htmlView += '</td>';
		    htmlView += '</tr>';

		    if(value.items_time != '' || value.items_detail != ''){
			htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
			    htmlView += '<td  colspan="8" style="text-align:center;">'+value.items_time+'</td>';
			htmlView += '</tr>';
                        htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
			    htmlView += '<td  colspan="8" style="text-align:center;">'+value.items_detail+'</td>';
			htmlView += '</tr>';
		    }

                    if(value.forms_name == 'Erbium Yag Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="5">Pulse With Us</td>';
			    htmlView += '<td colspan="5">Energy mj</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="5">' + value.pulse_with_us + '</td>';
			    htmlView += '<td colspan="5">' + value.energy_mj + '</td>';
			htmlView += "</tr>";

		    }

		});

		$('#md_id').html(htmlView);
		addMedicine();
	    });
	}

	function getService(ids){
            $('#se_id').html('');
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_list/"+ids,function (data,status){
		$.each(data, function(key,value) {

		    i = i + 1;

		    var htmlView = '';
		    var hts = '';
                    if(value.accept_by == ''){
                        htmlView += '<span class="handOver" title="<?php echo @$edit;?>" onclick="acceptService('+ value.service_items_id +');"><i class="fa fa-check action-btn primary"></i></span>&nbsp;&nbsp;';
                    }
		    htmlView += '<span class="handOver" title="<?php echo @$edit;?>" onclick="updateService('+ value.service_items_id +');"><i class="fa fa-edit action-btn primary"></i></span>&nbsp;&nbsp;';
		    htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="deleteService('+ value.service_items_id +');"><i class="fa fa-trash-o action-btn danger"></i></span>';

		    hts += '<tr class="bloom-row-2">';
                        hts += '<td  colspan="3" style="text-align:center !important;">Assign By</td>';
                        hts += '<td  colspan="4" style="text-align:center;">'+value.assign_from+'</td>';
                        hts += '<td  colspan="3" style="text-align:center !important;">Assign To</td>';
                        hts += '<td  colspan="4" style="text-align:center;">'+value.assign_to+'</td>';
                    hts += '</tr>';

		    hts += "<tr>";
			hts += '<td colspan="2">'+ $.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified)) +'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    hts += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ') </td>';
			}else{
			    hts += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ')-[' + value.forms_name + '] </td>';
			}
			hts += '<td colspan="2">'+ value.units_name + ' </td>';
			hts += '<td colspan="2">$'+ value.items_prices +' </td>';
			hts += '<td>$'+ value.items_discount +'</td>';
			hts += '<td colspan="2">'+ value.accept_by +'</td>';
			hts += '<td colspan="2">'+ htmlView +' </td>';
		    hts += "</tr>";

		    hts += "<tr><td colspan='5'>Descrition</td><td colspan='9'>"+ value.items_detail +"</td></tr>";
		    /*$('#se_id').append(hts);*/

		    if(value.forms_name == 'Q-Switch Laser'){
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Lens</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Spot Size</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.lens + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.spot_size + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'CPL Laser'){
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Cut Off Filter</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Pulse Train</td>';
			    hts += '<td colspan="2">Pause Length</td>';
			    hts += '<td colspan="2">Pulse Length</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="1">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.cut_off_filter + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.pulse_train + '</td>';
			    hts += '<td colspan="2">' + value.pause_length + '</td>';
			    hts += '<td colspan="2">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="1">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'Diode Laser'){
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Fitzpatrik</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Mode</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.mode + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'Anti Aging Treatment'){
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Fitzpartrik</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Mode</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.mode + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }

		    $('#se_id').append(hts);

		    /*if(value.fitzpatrik != '' || value.fluence != '' || value.pulse_length != '' || value.frequency != '' || value.mode != '' || value.no_of_treal != '' || value.lens != '' || value.spot_size != '' || value.cut_off_filter != '' || value.pulse_train != '' || value.pause_length != '' || value.pulse_with_us != '' || value.energy_mj != ''){
			hts = "<tr class='bloom-row'>";
			    hts += '<td>' + value.fitzpatrik + '</td>';
			    hts += '<td>' + value.fluence + '</td>';
			    hts += '<td>' + value.pulse_length + '</td>';
			    hts += '<td>' + value.frequency + '</td>';
			    hts += '<td>' + value.mode + '</td>';
			    hts += '<td>' + value.no_of_treal + '</td>';
			    hts += '<td>' + value.lens + '</td>';
			    hts += '<td>' + value.spot_size + '</td>';
			    hts += '<td>' + value.cut_off_filter + '</td>';
			    hts += '<td>' + value.pulse_train + '</td>';
			    hts += '<td>' + value.pause_length + '</td>';
			    hts += '<td>' + value.pulse_with_us + '</td>';
			    hts += '<td>' + value.energy_mj + '</td>';
			hts += "</tr>";

			$('#se_id').append(hts);
		    }*/
		});

		addService();
		/*viewRows('se_id');*/
	    });
	}
	// start protocols
	function getProtocol(){
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_protocol_list/"+vid,function (data,status){
					var i = 0;
			    var htmlView = '';
					$.each(data, function(key,value) {
					    i = i + 1;
							dateProtocol = $.datepicker.formatDate('dd-mm-yy', new Date(value.vsipdpro_date));
		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td rowspan="6" style="text-align:center;">'+i+'</td>';
		                    htmlView += '<td style="text-align:center;">'+value.protocols_title	+'</td>';
		                    htmlView += '<td style="text-align:center;">'+dateProtocol+'</td>';
		                    htmlView += '<td style="text-align:center;">';
			                    htmlView += '<span class="handOver" onclick="editProtocol('+value.vsipdpro_id+');"><i class="fa fa-edit action-btn primary"></i></span>';
			                    htmlView += '<span class="handOver" onclick="deleteProtocol('+value.vsipdpro_id+');"><i class="fa fa-trash-o action-btn danger"></i></span>';
		                    htmlView += '</td>';
		                htmlView += '</tr>';

		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td colspan="2">Surgeon Name: </td>';
		                    htmlView += '<td style="text-align:center;">'+value.n_surgeon+'</td>';
		                htmlView += '</tr>';
		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td colspan="2">Anesthesia Name: </td>';
		                    htmlView += '<td style="text-align:center;">'+value.n_anesthesia+'</td>';
		                htmlView += '</tr>';
		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td colspan="2">Surgeon Helper Name: </td>';
		                    htmlView += '<td style="text-align:center;">'+value.n_surgeon_help+'</td>';
		                htmlView += '</tr>';
		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td colspan="2">Neo Doctor Name: </td>';
		                    htmlView += '<td style="text-align:center;">'+value.n_neo+'</td>';
		                htmlView += '</tr>';
		                htmlView += '<tr class="bloom-row-2">';
		                    htmlView += '<td colspan="2">Midult Name: </td>';
		                    htmlView += '<td style="text-align:center;">'+value.n_midwife+'</td>';
		                htmlView += '</tr>';

		                htmlView += '<tr class="bloom-row-2">';
												htmlView += '<td colspan="3" style="text-align:center;"><textarea id="descProtocol" style="width:100%" >'+value.protocols_desc+'</textarea></td>';
		                    htmlView += '<td style="text-align:center;"><span data-id="'+value.vsipdpro_protocols_id+'" class="handOver" id="updateDescProt"><i class="fa fa-edit action-btn primary"></i></span></td>';
		                htmlView += '</tr>';

					});
					$('#surgeryProtocol').html(htmlView);
	    });
	}

	function editProtocol(vsipdpro_id){
		 $.post("<?php echo $base_url;?>index.php/diagnostics/get_protocol_list_byid/"+vsipdpro_id,
		 function(data,status){
			$.each(data, function(key,value) {
				dateProtocol = $.datepicker.formatDate('dd-mm-yy', new Date(value.vsipdpro_date+'T00:00:00'));
					$('#protocol_title').val(value.protocols_title);
					$('#protocol_id').val(value.vsipdpro_protocols_id);
					$('#protocol_date').val(dateProtocol);
					$('#ipd_protocol_id').val(vsipdpro_id);

					$('#surgeonName').val(value.n_surgeon);
					$('#surgeonId').val(value.vsipdpro_surgeon_doctor);

					$('#anesthesiaName').val(value.n_anesthesia);
					$('#anesthesiaId').val(value.vsipdpro_anesthesia_doctor);

					$('#surgeonHelperName').val(value.n_surgeon_help);
					$('#surgeonHelperId').val(value.vsipdpro_surgeon_help_doctor);

					$('#neoDoctorName').val(value.n_neo);
					$('#neoDoctorId').val(value.vsipdpro_neo_doctor);

					$('#midultName').val(value.n_midwife);
					$('#midwife').val(value.vsipdpro_midwife_doctor);
			});
		 });
	}
	function deleteProtocol(vsipdpro_id){
				$.post("<?php echo $base_url;?>index.php/diagnostics/delete_protocol/"+vsipdpro_id,function() {
						getProtocol();
				});
	}

	function saveProtocolData(){
			var protocolTitle = $('#protocol_title').val();
	   	var protocolId = $('#protocol_id').val();
			var protocolDate = $('#protocol_date').val();
			var ipdProtocolId = $('#ipd_protocol_id').val();
			if(ipdProtocolId == ''){
					ipdProtocolId = 0;
			}
			var protocolSurgeon = $('#surgeonId').val();
			var protocolAnesthesia = $('#anesthesiaId').val();
			var protocolHelper = $('#surgeonHelperId').val();
			var protocolNeoDoctor = $('#neoDoctorId').val();
			var protocolMidult = $('#midwife').val();

			if($('#getProtoId').val() !== "" || $('#getProtoId').val() > 0){
					$.post("<?php echo $base_url;?>index.php/diagnostics/add_protocol/"+ipdProtocolId,{
							visitorId: vid,
							ipdProtocolId: ipdProtocolId,
							protocolId: protocolId,
							protocolDate: protocolDate,
							protocolSurgeon: protocolSurgeon,
							protocolAnesthesia: protocolAnesthesia,
							protocolHelper: protocolHelper,
							protocolNeoDoctor: protocolNeoDoctor,
							protocolMidult: protocolMidult
					},function(data, status) {
							$('#surgeryProtocol').html('');
							getProtocol();
							$('.cleanProt').val('');
					});
			}
	}

	// start diagnostic OUT
	function getDia(ids){
	    var i = 0;
			var htms = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_diagnostic_list/"+ids,function (data,status){
					$.each(data, function(key,value) {
					    i = i + 1;

					    if(i == 1){
										$("#diagnostic").val(value.icd10_code + '_' + value.icd10_desc);
										$("#diagnostic_level").val(value.diagnostics_level);
										$("#desc_dia").val(value.diagnostics_detail);
										$("#ward1").val(value.diagnostics_ward);
										$("#room1").val(value.diagnostics_room);
										dia = value.diagnostics_id;

			              htms += '<tr>';
			                  htms += '<td class="textLeft">1</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
												htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
												htms += '<td class="textLeft">'+value.wards_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.room_name+'</td>';
			              htms += '</tr>';
					    }
					    if(i == 2){
										$("#diagnostic1").val(value.icd10_code + '_' + value.icd10_desc);
										$("#diagnostic1_level").val(value.diagnostics_level);
										$("#desc_dia1").val(value.diagnostics_detail);
										$("#ward2").val(value.diagnostics_ward);
										$("#room2").val(value.diagnostics_room);
										dia1 = value.diagnostics_id;

			              htms += '<tr>';
			                  htms += '<td class="textLeft">2</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
												htms += '<td class="textLeft">'+value.wards_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.room_name+'</td>';
			              htms += '</tr>';
					    }
					    if(i == 3){
										$("#diagnostic2").val(value.icd10_code + '_' + value.icd10_desc);
										$("#diagnostic2_level").val(value.diagnostics_level);
										$("#desc_dia2").val(value.diagnostics_detail);
										$("#ward3").val(value.diagnostics_ward);
										$("#room3").val(value.diagnostics_room);
										dia2 = value.diagnostics_id;

			              htms += '<tr>';
			                  htms += '<td class="textLeft">3</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
												htms += '<td class="textLeft">'+value.wards_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.room_name+'</td>';
			              htms += '</tr>';
					    }
			  			$('#diags').html(htms);
					    if(i == 4){
										$("#out_dia").val(value.icd10_code + '_' + value.icd10_desc);
										$("#out_dia_level").val(value.diagnostics_level);
										$("#out_dia_des").val(value.diagnostics_detail);
										out_dia = value.diagnostics_id;

			              htms += '<tr>';
			                  htms = '<td class="textLeft">1</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
			              htms += '</tr>';
					    }
					    if(i == 5){
										$("#out_dia1").val(value.icd10_code + '_' + value.icd10_desc);
										$("#out_dia1_level").val(value.diagnostics_level);
										$("#out_dia1_des").val(value.diagnostics_detail);
										out_dia1 = value.diagnostics_id;

			              htms += '<tr>';
			                  htms += '<td class="textLeft">2</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
			              htms += '</tr>';
					    }
					    if(i == 6){
										$("#out_dia2").val(value.icd10_code + '_' + value.icd10_desc);
										$("#out_dia2_level").val(value.diagnostics_level);
										$("#out_dia2_des").val(value.diagnostics_detail);
										out_dia2 = value.diagnostics_id;

			              htms += '<tr>';
			                  htms += '<td class="textLeft">3</td>';
			                  htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
			                  htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
			              htms += '</tr>';
					    }
							$('#diagOuts').html(htms);

					});
	    });
	}

	function addService(){
		var htmlView = '<tr>';
		    htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="s_form" style="text-align:center;" class="form-control" placeholder="Form" onkeyup="autoForm();"><input type="text" id="sOrder" style="display: none !important;" value="1"></td>';
		    htmlView += '<td  colspan="4" style="text-align:center;"><input type="text" id="m_service" style="text-align:center;" class="form-control" placeholder="Service" onkeyup="autoService();"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sQty" value=""  style="text-align:center;" placeholder="Qty" class="form-control"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sPrice" value=""  style="text-align:center;" placeholder="Price" class="form-control"></td>';
		    htmlView += '<td  style="text-align:center;"><input type="text" id="sDiscount" value="0"  style="text-align:center;" placeholder="Discount" class="form-control"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sDoctor" style="text-align:center;" class="form-control" placeholder="Doctor" onkeyup="autoDoctor();"></td>';
		    htmlView += '<td  colspan="2" id="s_action" style="text-align:center;">';
			    htmlView += '<span class="handOver" onclick="saveService();"><i class="fa fa-save action-btn primary"></i></span>';
                    htmlView += '</td></tr>';
                    htmlView += '<tr><td colspan="14"><input type="text" id="se_desc" value="" placeholder="Descrition" style="text-align:left;" class="form-control"></td></tr>';

		$('#se_id').append(htmlView);
	}

        function checkMedicine(){
            var htmlView = '';
            if($('#m_form').val() == 'Erbium Yag Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="4"><input type="text" id="spulse_with_us" value="" placeholder="Pulse With Us" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="6"><input type="text" id="senergy_mj" value="" placeholder="Energy mj"  style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }

            $('#md_id').append(htmlView);
        }

	function checkService(){
	    var htmlView = '';
	    if($('#s_form').val() == 'Q-Switch Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="slens" value="" placeholder="Lens" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sspot_size" value="" placeholder="Spot Size" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }else if($('#s_form').val() == 'CPL Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="scut_off_filter" value="" placeholder="Cut Off Filter" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spulse_train" value="" placeholder="Pulse Train" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spause_length" value="" placeholder="Pulse Delay" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";

	    }else if($('#s_form').val() == 'Anti Aging Treatment'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="slens" value="" placeholder="Lens" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sspot_size" value="" placeholder="Spot Size" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:center;" class="form-control"></td>';
		htmlView +=  "</tr>";

	    }else if($('#s_form').val() == 'Diode Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="sfitzpatrik" value="" placeholder="Fitzpartrik" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="smode" value="" placeholder="Mode" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }

	    $('#se_id').append(htmlView);
	}

	function addMedicine(){
		var htmlView = '<tr>';
			htmlView += '<td style="text-align:center;"><input type="text" id="m_form" style="text-align:center;padding: 0px !important;" class="form-control" placeholder="Form" onkeyup="autoFormMedicine();"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="m_medicine" style="text-align:center;padding: 0px !important;" class="form-control" placeholder="Medicine" onkeyup="autoMedicine();"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mQty" value=""  style="text-align:center;padding: 0px !important;"  placeholder="Qty" class="form-control"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mPrice" value=""  style="text-align:center;padding: 0px !important;" placeholder="Price" class="form-control"></td>';
			/*htmlView += '<td style="text-align:center;"><input type="text" id="mDiscount" value="0"  style="text-align:center;" placeholder="Discount" class="form-control"></td>';*/
			htmlView += '<td style="text-align:center;"><input type="text" style="text-align:center;"  class="form-control" id="mDoctor" style="text-align:center;" class="form-control" placeholder="Doctor" onkeyup="autoDoctor();"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" style="text-align:center;padding: 0px !important;"  placeholder="0" class="form-control" id="mAm" value="0"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" style="text-align:center;padding: 0px !important;"  placeholder="0" class="form-control" id="mAf" value="0"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" style="text-align:center;padding: 0px !important;"  placeholder="0" class="form-control" id="mPm" value="0"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" style="text-align:center;padding: 0px !important;" placeholder="0" class="form-control" id="mNt" value="0"></td>';
			htmlView += '<td style="text-align:center;">';
			htmlView += '<span class="handOver" onclick="saveData();"><i class="fa fa-save action-btn primary"></i></span>';
		    htmlView += '</td></tr>';

                    htmlView += '<tr>';
                        htmlView += '<td  colspan="1" style="text-align:center !important;">លេខរៀង៖</td>';
                        htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="mOrder" value="1"  style="text-align:center;" class="form-control"></td>';
                        htmlView += '<td  colspan="1" style="text-align:center !important;">ពេល៖</td>';
                        htmlView += '<td  colspan="8" style="text-align:center;"><input type="text" id="mTime" value=""  style="text-align:center;" class="form-control"></td>';
                    htmlView += '</tr>';
                    htmlView += '<tr>';
                        htmlView += '<td  colspan="1" style="text-align:center !important;">បរិយាយ៖</td>';
                        htmlView += '<td  colspan="10" style="text-align:center;"><input type="text" id="mDetail" value=""  style="text-align:center;" class="form-control"></td>';
                    htmlView += '</tr>';

		$('#md_id').append(htmlView);
	}

        function updateService(ids){

                $('#se_id').html('');
                addService();

                $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_info_by_id/"+ids,function (data,status){
                    $.each(data, function(key,value) {

                        $("#s_form").val(value.forms_name);
                        $("#m_service").val(value.products_name);
                        $("#sQty").val(value.items_qty);
                        $("#sPrice").val(value.items_prices);
                        $("#sDiscount").val(value.items_discount);
                        /*$("#sDiscount").val("0");*/
                        $("#sDoctor").val(value.accept_by + '-' + value.accept_by_phone);
                        $("#se_desc").val(value.items_detail);
                        checkService();

                        if(value.forms_name == 'Erbium Yag Laser'){
                            $('#spulse_with_us').val(value.pulse_with_us);
                            $('#senergy_mj').val(value.energy_mj);
                        }else if(value.forms_name == 'Q-Switch Laser'){
                            $('#slens').val(value.lens);
                            $('#sfluence').val(value.fluence);
                            $('#spulse_length').val(value.pulse_length);
                            $('#sfrequency').val(value.frequency);
                            $('#sspot_size').val(value.spot_size);
                            $('#sno_of_treal').val(value.no_of_treal);
                        }else if(value.forms_name == 'CPL Laser'){
                            $('#scut_off_filter').val(value.cut_off_filter);
                            $('#slens').val(value.lens);
                            $('#sfrequency').val(value.frequency);
                            $('#spulse_train').val(value.pulse_train);
                            $('#spause_length').val(value.pause_length);
                            $('#spulse_length').val(value.pulse_length);
                            $('#sfluence').val(value.fluence);
                            $('#sno_of_treal').val(value.no_of_treal);
                        }else if(value.forms_name == 'Anti Aging Treatment'){
                            $('#slens').val(value.lens);
                            $('#sfluence').val(value.fluence);
                            $('#spulse_length').val(value.pulse_length);
                            $('#sfrequency').val(value.frequency);
                            $('#sspot_size').val(value.spot_size);
                            $('#sno_of_treal').val(value.no_of_treal);
                        }else if(value.forms_name == 'Diode Laser'){
                            $('#sfitzpatrik').val(value.fitzpatrik);
                            $('#sfluence').val(value.fluence);
                            $('#spulse_length').val(value.pulse_length);
                            $('#sfrequency').val(value.frequency);
                            $('#smode').val(value.mode);
                            $('#sno_of_treal').val(value.no_of_treal);
                        }

                        var htmlView = '<span class="handOver" title="<?php echo @$edit;?>" onclick="saveService('+ value.service_items_id +');"><i class="fa fa-save action-btn primary"></i></span>&nbsp;&nbsp;';
                            htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="getService('+ vid +');"><i class="fa fa-trash-o action-btn danger"></i></span>';
                            htmlView += '<input id="s_service_id" value="'+ value.service_items_id +'" style="display: none;"/>';

                        $("#s_action").html(htmlView);


                    });
                });

	}

        function updateMedicine(ids){
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_info_by_id/"+ids,function (data,status){
		$.each(data, function(key,value) {

		    htmlView += '<tr>';
			htmlView += '<td  style="text-align:center !important;"><input type="text" id="m_medicine_id" style="text-align:center;display:none;" class="form-control" value="'+ value.service_items_id +'"><input type="text" id="m_form" style="text-align:center;" class="form-control" onkeyup="autoForm();" value="'+ value.forms_name +'"></td>';
			htmlView += '<td  style="text-align:center !important;"><input type="text" id="m_medicine" style="padding: 0px !important; text-align: center;" class="form-control" onkeyup="autoMedicine();" value="'+ value.products_name +'"></td>';
			htmlView += '<td  style="text-align:center !important;"><input type="text" id="mQty" value="'+ value.items_qty +'" style="padding: 0px !important; text-align: center;" class="form-control"></td>';
			htmlView += '<td  style="text-align:center !important;"><input type="text" id="mPrice" value="'+ value.items_prices +'" style="padding: 0px !important; text-align: center;" class="form-control"></td>';
			htmlView += '<td  style="text-align:center !important;"><input type="text" id="mDoctor" style="padding: 0px !important; text-align: center;" class="form-control" onkeyup="autoDoctor();" value="'+ value.assign_from +'"></td>';
			/*if(value.mediacines_am == '0'){
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mAm" value="1" checked></td>';
			}else{
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mAm" value="1"></td>';
			}

			if(value.mediacines_af == '0'){
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mAf" value="1" checked></td>';
			}else{
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mAf" value="1"></td>';
			}
			if(value.mediacines_pm == '0'){
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mPm" value="1" checked></td>';
			}else{
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mPm" value="1"></td>';
			}
			if(value.mediacines_nt == '0'){
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mNt" value="1" checked></td>';
			}else{
				htmlView += '<td  style="text-align:center !important;"><input type="checkbox" id="mNt" value="1"></td>';
			}*/

                        htmlView += '<td  style="text-align:center !important;"><input type="text" style="padding: 0px !important; text-align: center;" class="form-control" id="mAm" value="'+value.mediacines_am+'"></td>';
                        htmlView += '<td  style="text-align:center !important;"><input type="text" style="padding: 0px !important; text-align: center;" class="form-control" id="mAf" value="'+value.mediacines_af+'"></td>';
                        htmlView += '<td  style="text-align:center !important;"><input type="text" style="padding: 0px !important; text-align: center;" class="form-control" id="mPm" value="'+value.mediacines_pm+'"></td>';
                        htmlView += '<td  style="text-align:center !important;"><input type="text" style="padding: 0px !important; text-align: center;" class="form-control" id="mNt" value="'+value.mediacines_nt+'"></td>';

			htmlView += '<td  style="text-align:center !important;">';
			    htmlView += '<span class="handOver" onclick="saveData();"><i class="fa fa-save action-btn primary"></i></span>';
			    htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="getMedicine('+ vid +');"><i class="fa fa-trash-o action-btn danger"></i></span>';
			htmlView += '</td>';
		    htmlView += '</tr>';

                    htmlView += '<tr>';
                        htmlView += '<td  colspan="1" style="text-align:center !important;">លេខ៖</td>';
                        htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="mOrder" style="text-align:center;" value="'+ value.ordernant_no +'" class="form-control"></td>';
                        htmlView += '<td  colspan="1" style="text-align:center !important;">ពេល៖</td>';
                        htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="mTime" style="text-align:center;" value="'+ value.items_time +'" class="form-control"></td>';
                        htmlView += '<td  colspan="3" style="text-align:center !important;">បរិយាយ៖</td>';
                        htmlView += '<td  colspan="6" style="text-align:center;"><input type="text" id="mDetail" style="text-align:center;" value="'+ value.items_detail +'" class="form-control"></td>';
                    htmlView += '</tr>';

                    if(value.forms_name == 'Erbium Yag Laser'){
                        htmlView += "<tr>";
                            htmlView +=  '<td colspan="4"><input type="text" id="spulse_with_us" value="'+ value.pulse_with_us +'" placeholder="Pulse With Us" style="text-align:left;" class="form-control"></td>';
                            htmlView +=  '<td colspan="6"><input type="text" id="senergy_mj" value="'+ value.energy_mj +'" placeholder="Energy mj"  style="text-align:left;" class="form-control"></td>';
                        htmlView +=  "</tr>";
                    }

		});

		$('#md_id').html(htmlView);
	    });
	}
	function saveData(){
					var m_id = $('#m_medicine_id').val();
					var v1 = $('#m_medicine').val();
					var v2 = $('#mQty').val();
					var v3 = $('#mPrice').val();
					/*var dic = $('#mDiscount').val();*/
					var dic = "0";
					var doc = $('#mDoctor').val();
					var frm = $('#m_form').val();
					var usetime = $('#mTime').val();
					var usedetail = $('#mDetail').val();
					var ams = $('#mAm').val();
					var afs = $('#mAf').val();
					var pms = $('#mPm').val();
					var nts = $('#mNt').val();
				$.post("<?php echo $base_url;?>index.php/diagnostics/add_medicine/"+vid,{
						service_item_id: m_id,
				    medicines: v1,
				    qty: v2,
				    price: v3,
				    discount: dic,
				    doctor: doc,
				    usetime: usetime,
				    usedetail: usedetail,
				    frm: frm,
				    amm: ams,
				    afm: afs,
				    pmm: pms,
				    ntm: nts,
            order_no: $('#mOrder').val(),
            pulse_with_us: $('#spulse_with_us').val(),
				    energy_mj: $('#senergy_mj').val()
				},function(data, status) {
				    $('#md_id').html('');
				    getMedicine(vid);
		                    getVisitTime(vs_pcode);
				});

	}

	function saveService(){
				var m_id = $('#s_service_id').val();
				var v1 = $('#m_service').val();
				var v2 = $('#sQty').val();
				var v3 = $('#sPrice').val();
				var desc = $('#se_desc').val();
				var frm = $('#s_form').val();
				var doc = $('#sDoctor').val();
				var dis = $('#sDiscount').val();
                /*var dis = "0";*/

		$.post("<?php echo $base_url;?>index.php/diagnostics/add_medicine/"+vid,{
                    service_item_id: m_id,
		    medicines: v1,
		    qty: v2,
		    price: v3,
		    frm: frm,
		    doctor: doc,
		    discount: dis,
		    usedetail: desc,
                    order_no: $('#sOrder').val(),
		    fitzpatrik: $('#sfitzpatrik').val(),
		    fluence: $('#sfluence').val(),
		    pulse_length: $('#spulse_length').val(),
		    frequency: $('#sfrequency').val(),
		    mode: $('#smode').val(),
		    no_of_treal: $('#sno_of_treal').val(),
		    lens: $('#slens').val(),
		    spot_size: $('#sspot_size').val(),
		    cut_off_filter: $('#scut_off_filter').val(),
		    pulse_train: $('#spulse_train').val(),
		    pause_length: $('#spause_length').val(),
                    amm: '0',
                    afm: '0',
                    pmm: '0',
                    ntm: '0'
		},function() {
		    $('#se_id').html('');
		    getService(vid);
                    getVisitTime(vs_pcode);
		});

	}

        function acceptService(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/accept_service/"+ids,function() {
		    $('#se_id').html('');
		    getService(vid);
		});
	}

	function deleteService(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/delete_service/"+ids,function() {
		    $('#se_id').html('');
		    getService(vid);
                    getVisitTime(vs_pcode);
		});
	}

	function deleteMedicine(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/delete_service/"+ids,function() {
		    $('#se_id').html('');
		    getMedicine(vid);
                    getVisitTime(vs_pcode);
		});
	}

	function printFrm(ids){
	    $.post("<?php echo $base_url;?>index.php/prescriptions/view_form/"+ids+"_"+vid,function (data,status){
		viewWindow(data);
	    });
	}

	function printRcp(ids){
	    $.post("<?php echo $base_url;?>index.php/prescriptions/receipt_form/"+ids+"_"+vid,function (data,status){
		viewWindow(data);
	    });
	}

	function viewOldPrescription(ids){
	    $("#old_diagnostic_form").css('display','block');
	    $.post("<?php echo $base_url;?>index.php/diagnostics/view_pres/"+ids,function(data,status){
		$("#old_dia_form").html(data);
	    });
	    $("#diagnostic_form").css('display','none');
	}

	function viewWindow(htms){
            var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
            myWindow.document.open("text/html", "replace");
            myWindow.document.write(htms);
            myWindow.document.close();
	}

	/*function checkForm(formId = ''){

	}*/

	function checkBox(values){
	    if(values != 1){
		return "checked";
	    }else{
		return "";
	    }
	}

	function checkBoxSave(values){
	    if(parseInt(values) != 1){
		return "1";
	    }else{
		return "0";
	    }
	}

	function checkChecked(values){
	    var str = checkBox(values);
	    if(str == "checked"){
		return "<i class='fa fa-check primary'></i>";
	    }else{
		return "<i class='fa fa-times danger'></i>";
	    }
	}

        function getAppoinment(){

            $.post("<?php echo $base_url;?>index.php/diagnostics/getAppoinmentByVisitorId/"+vid,function (data,status){
				$.each(data, function(key,value) {
		                    $('#appment').val(value.appoitments_time);
		                    $('#appd').text(value.appoitments_time);
		                    $('#doctorName').val(value.name);
		                    $('#doctorId').val(value.uid);
		                    $('#appdoc').text(value.name);
		                    $('#appWard').text(value.wards_desc);
		                    $('#wardId').val(value.appoitments_ward_id);

		               		// $('.saveApp').prop( "disabled", false );

				});
	    	});
        }

        function saveAppoinment(){
            $.post("<?php echo $base_url;?>index.php/diagnostics/setAppoinmentDate/"+vid,
            {
                dateTime: $('#appment').val(),
                doctorId: $('#doctorId').val(),
                wardId: $('#wardId').val()
            },function (data,status){
                getAppoinment();
            });
        }

        function getNote(ids){
	    var i = 0;
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_note_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    htmlView += '<tr>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_date+'</td>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_detail+'</td>';
		    htmlView += '</tr>';
		});
		$('#clinic_id').html(htmlView);
	    });
	}

	function addNote(){
		var htmlView = '<tr>';
			htmlView += '<td style="text-align:center;width:20%;">';
				htmlView += '<span class="handOver" onclick="saveNote();"><i class="fa fa-save action-btn primary"></i></span>';
		    htmlView += '</td>';
			htmlView += '<td style="text-align:center;width:80%;"><input type="text" id="clinical_note" value=""  style="text-align:center;" class="form-control"></td>';
			htmlView += '</tr>';
		$('#clinic_id').append(htmlView);
	}

	function saveNote(){
	    var c1 = $('#clinical_note').val();
			$.post("<?php echo $base_url;?>index.php/diagnostics/add_note/"+vid,
			{clinical: c1},function(data, status) {
			    $('#clinic_id').html('');
			    getNote(vid);
			});
	}

</script>
