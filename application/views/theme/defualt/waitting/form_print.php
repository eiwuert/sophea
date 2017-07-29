<html>
    <head>
    	<link rel="stylesheet" href="<?php echo $resources;?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $resources;?>css/font.css">
    </head>
	<body>
		<div style="float:left;margin-left:40px;position: relative;top: -14px;"><img style="width:95px !important" src="<?php echo base_url("resources/theme/defualt/img/bc_logo.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">មន្ទីរពេទ្យសម្ភពសោភាហ្គោល<br>Sorphear maternity hospital<br><br>ប័ណ្ណអនុញ្ញាតពិនិត្យជំងឺ</center>
		<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
		<br/>
	    <table class="table">
	    	<?php foreach($svipd_info as $key=>$value):?>
		    	<?php
		    		$p_dob = date("Y", strtotime($value->patient_dob));
		    		$year_today = date('Y');
		    		$yearOld = ($year_today - $p_dob);
		    		if($value->patient_gender == 'f'){
		    			$showGender = "ស្រី";
		    		}else{
		    			$showGender = "ប្រុស";
		    		}
		    	?>
		  		<tr>
		  			<th>លេខរងចាំ</th>
		  			<td><?php echo $value->waitting_code?></td>
		  		</tr>
		  		<tr>
		  			<th>ពិនិត្យផ្នែក</th>
		  			<td><?php echo $value->wards_desc?></td>
		  		</tr>
		  		<tr>
		  			<th>លេខកូដអ្នកជំងឺ</th>
		  			<td><?php echo $value->patient_code?></td>
		  		</tr>
		  		<tr>
		  			<th>ឈ្មោះ</th>
		  			<td><?php echo $value->patient_kh_name?></td>
		  		</tr>
		  		<tr>
		  			<th>ភេទ</th>
		  			<td><?php echo $showGender?></td>
		  		</tr>
		  		<tr>
		  			<th>អាយុ</th>
		  			<td><?php echo $yearOld?></td>
		  		</tr>

		  		<tr>
		  			<th>ឈ្មោះគ្រូពេទ្យ</th>
		  			<td><?php echo $value->name?></td>
		  		</tr>

	    	<?php endforeach ?>
		  		<tr>
		  			<th style="text-align: right" colspan="2"></th>
		  		</tr>
	    </table>
	    <table class="table table-bordered table-hover dataTable">
	    	<tr>
	    		<td colspan="3"><div class="detailDoctor"><span><b>វេជ្ជបញ្ជា:</b></span></div></td>
	    	</tr>
	    	<!--<tr>
	    		<td><b>តំលៃសេវា:</b></td>
	    		<td width="150"><b>ចំនួន:</b></td>
	    	</tr>-->
	    	<tr>
	    		<td>- </td>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td>- </td>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td>- </td>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td>- </td>
	    		<td></td>
	    	</tr>
	    	<tr>
	    		<td><span class="pull-right">សរុប:</span></td>
	    		<td></td>
	    	</tr>
	    </table>
	</body>
  <div style="text-align: left">ណាត់ជួបថ្ងៃទី........ខែ.......  ឆ្នាំ ............ម៉ោង  …………ផ្នែក………………….</div<br>
	<div style="text-align: right">ថ្ងៃទី <?php echo date("j")?>​​ ខែ <?php echo date("F")?> ឆ្នាំ <?php echo date("Y")?></div>
	<style type="text/css">
	    .myCenter{
			text-align: center !important;
	    }
	    .h225{
		padding-left: 25% !important;
	    }
	    .detailDoctor{
	    	height:130px;
	    }
	    .detailDoctor span{
	    	text-decoration: underline;
	    }
	    table tr td{
	    	font-size: 16px !important;
    		padding: 4px !important;
	    }
	    table tr th {
    		padding: 4px !important;
    		font-size: 16px !important;
    	}

    	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		    border-top: 1px solid #424242 !important;
		}
		.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
		    border: 1px solid #424242 !important;
		}

	</style>
	<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript">
		 $(window).bind("load", function() {
		 	window.print();
		 	window.close();
		 });
	</script>

</html>
