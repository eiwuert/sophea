
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/css/custom.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/css/font.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="http://192.168.1.252/sorphea/resources/theme/defualt/css/jquery-ui.css">
    <script src="http://192.168.1.252/sorphea/resources/theme/defualt/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://192.168.1.252/sorphea/resources/theme/defualt/js/jquery-ui.min.js"></script>
    <!-- open group clock -->
    <script type="text/javascript">
		$(document).ready(function() {
		// Create two variable with the names of the months and days in an array
		// var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
		// var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		var monthNames = [ "មករា", "កុម្ភះ", "មីនា", "មេសា", "ឧសភា", "មិថុនា", "កក្កដា", "សីហា", "កញ្ញា", "តុលា", "វិច្ឆិការ", "ធ្នូ" ]; 
		var dayNames= ["ទិត្យ","ច័ន្ទ","អង្គារ","ពុធ","ព្រហស្បត៌","សុក្រ","សៅរ៍"]

		// Create a newDate() object
		var newDate = new Date();
		// Extract the current date from Date object
		newDate.setDate(newDate.getDate());
		// Output the day, date, month and year    
		$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

		setInterval( function() {
			// Create a newDate() object and extract the seconds of the current time on the visitor's
			var seconds = new Date().getSeconds();
			// Add a leading zero to seconds value
			$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
			},1000);
			
		setInterval( function() {
			// Create a newDate() object and extract the minutes of the current time on the visitor's
			var minutes = new Date().getMinutes();
			// Add a leading zero to the minutes value
			$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		    },1000);
			
		setInterval( function() {
			// Create a newDate() object and extract the hours of the current time on the visitor's
			var hours = new Date().getHours();
			// Add a leading zero to the hours value
			$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		    }, 1000);
			
		}); 
	</script>
	<!-- close group clock -->
    <style type="text/css">
    	/*open style clock*/

		a { 
			text-decoration:none; 
			color:#00c6ff;
		}

		h1 {
			font: 4em normal Arial, Helvetica, sans-serif;
			padding: 20px;	margin: 0;
			text-align:center;
		}

		h1 small{
			font: 0.2em normal  Arial, Helvetica, sans-serif;
			text-transform:uppercase; letter-spacing: 0.2em; line-height: 5em;
			display: block;
		}

		h2 {
		    font-weight:700;
		    color:#bbb;
		    font-size:20px;
		}

		h2, p {
			margin-bottom:10px;
		}

		@font-face {
		    font-family: 'BebasNeueRegular';
		    src: url('BebasNeue-webfont.eot');
		    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
		         url('BebasNeue-webfont.woff') format('woff'),
		         url('BebasNeue-webfont.ttf') format('truetype'),
		         url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
		    font-weight: normal;
		    font-style: normal;

		}

		.container {width: 960px; margin: 0 auto; overflow: hidden;}

		.clock {width:800px; margin:0 auto; padding:30px; border:1px solid #333; color:#fff; }

		#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:20px; }

		ul { width:800px; margin:0 auto; padding:0px; list-style:none;}
		ul li { display:inline; font-size:2em;font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif;}

		#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

		@-webkit-keyframes mymove 
		{
		0% {opacity:1.0;}
		50% {opacity:0; text-shadow:none; }
		100% {opacity:1.0; }	
		}


		@-moz-keyframes mymove 
		{
		0% {opacity:1.0;}
		50% {opacity:0; text-shadow:none; }
		100% {opacity:1.0; }	
		}
    	/*close style clock*/
    </style>

<div class="content-wrapper" style="margin-left:0px">
	<!-- Content Header (Page header) -->
	

	<!-- Main content -->
	<section class="content">	    
		<div class="row">
			<div class="col-xs-12" id="form_row" style="display: none;">
				<div class="box" style="padding: 10px !important;">
						
						<br/>
							<!--Unit Name-->
						  	<div class="form-group">
								<div class="input-group">
								  <div class="input-group-addon">
									<?php echo $code;?>
								  </div>
								  <input type="text" name="waitting_code" id="waitting_code" class="form-control">
								  <input type="text" name="waitting_id" id="waitting_id" style="display:none;">
								</div>
						  	</div>
						  
						  	<!-- Desc -->
							<div class="form-group">
								<div class="input-group">
								  <div class="input-group-addon">
									<?php echo $examination;?>
								  </div>
								  <input type="text" name="waitting_examination" id="waitting_examination" class="form-control">
								</div>
							</div>

							<div class="form-group has-error">
							    <div class="input-group">
								  	<div class="input-group-addon">
								      	<?php echo @$visitor.' ID';?>
									</div>
										<?php echo form_dropdown('patient_id', @$drop_patient,'','class="form-control" id="patient_id"');?>
							    </div>
							</div>
							<div class="form-group has-error">
							      <div class="input-group">
										<div class="input-group-addon">
										      <?php echo $date;?>
										</div>
								  		<input type="text" name="waitting_date" id="waitting_date" class="form-control">
							      </div>
							</div>
						  						  
						  	<!-- Submit -->
							<div class="form-group">
								<div class="input-group">
								  <input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>">
								</div>	
							</div>
			</div><!-- /.box -->			  	
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
						<div style="float:left;left: 10%;position: absolute;top: 0px;width:145px"/>
							<img style="width:100%" src="<?php echo base_url("resources/theme/defualt/img/bc_logo.png")?>"/>
						</div>
							<center style="color:#2F3290 !important;font-size: 33px;position: relative;left: -30px;line-height: 4;">តារាងរងចាំអនុញ្ញាតពិនិត្យជំងឺ</center>
						<div style="float:right;width: 310px;height: 122px;position: absolute;right: 0px;top: 0px;padding: 24px 20px;"/>
							<div style="font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;font-size: 20px;float:left">ថ្ងៃ&nbsp;&nbsp;</div><div id="Date">Monday 14 January 2013</div>
							<ul>	
								<li>ម៉ោង </li>
								<li id="hours">00</li>
							    <li id="point">:</li>
							    <li id="min">00</li>
							    <li id="point">:</li>
							    <li id="sec">00</li>
							</ul>
						</div>
						<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
						<br/>							
						<div class="box-body">
							<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>

										<div class="row">
											<div class="col-sm-12">
												<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
													<thead>
														<tr role="row">
															<th>លេខរងចាំ</th>
															<th>លេខកូដ អ្នកជំងឺ</th>
															<th>ឈ្មោះ</th>
															<th>ភេទ</th>
															<th>អាយុ</th>
															<th>ពិនិត្យផ្នែក</th>
															<th>ឈ្មោះ គ្រូពេទ្យ</th>
														</tr>
													</thead>
													<tbody id="typeList"></tbody>
												</table>
													
											</div>
										</div>
							</div>
						</div><!-- /.box-body -->
						<div style="float:left; width:100%; overflow:auto">
								<marquee behavior="scroll" style="padding-top:10px"><span class="marquee" style="font-size: 29px; color:red">សូមថ្លៃងអំណរគុណចំពោះការមកទទួលសេវាថែទាំព្យាបាល​ នៅមន្ទីរពេទ្យសម្ភពសោភា​ !</span></marquee>
						</div>
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>

<script>
	$(function(){
		setInterval(function(){getTypeList();}, 5000);
	});

   	function getTypeList(){
        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/waittings_list/get_waitting_screen_list",
			function(data,status){
            $.each(data, function(key,value) {    

            	var dob = new Date(value.patient_dob);
   				var year = dob.getFullYear();
   				var yearToday = <?php echo date("Y");?>;
   				var yearOld = (yearToday - year);

   				if(value.patient_gender == 'f'){
   					showGender = "ស្រី";
   				}else{
   					showGender = "ប្រុស";
   				}
   				if(value.wards_code !== null){
   					showWard = value.wards_code;
   				}else{
   					showWard = '';
   				}
   				if(value.name !== null){
   					showName = value.name;
   				}else{
   					showName = '';
   				}   				
				if(value.patient_kh_name !== null){
   					showPatientKhName = value.patient_kh_name;
   				}else{
   					showPatientKhName = '';
   				}   				
				if(value.patient_code !== null){
   					showPatientCode = value.patient_code;
   				}else{
   					showPatientCode = '';
   				} 
                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td style="text-align:right">' + value.waitting_code + '</td>';                   
                    htmlView += '<td>' + showPatientCode + '</td>';                   
                    htmlView += '<td>' + showPatientKhName + '</td>';                 
                    htmlView += '<td>' + showGender + '</td>';                  
                    htmlView += '<td>' + yearOld + '</td>';   
                    htmlView += '<td>' + showWard + '</td>';                
                    htmlView += '<td>' + showName + '</td>';                
                htmlView += '</tr>';
            });            
            $("#typeList").html(htmlView);
        });
    }
</script>
