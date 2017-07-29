<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/neonatals">'.$h_neonatal.'</a>';?>
			<small id="title_name">/ <?php echo $list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	    <div class="row" id="msgs" style="display: none;">
			<div class="alert alert-success alert-dismissible">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			    <h4><i class="icon fa fa-check"></i> Save Sucessfull!</h4>
			</div>
	    </div>
		<div class="row" id="form_row" style="display: none;">
			<div class="col-md-6">
				<div class="box box-danger">

						<div class="box-header">
							<h3 class="box-title">General</h3>
						</div>

					<div class="box-body">

						<!--Neonatal Famaly-->
						<!-- <div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$parents;?>
								</div>
								<input type="text" id="neonatal_patient" style="text-align:center;padding: 0px !important;" class="form-control" placeholder="Family">

							</div>
						</div> -->
						<!--Neonatal Kh Name-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$name;?>
								</div>
								<input type="text" name="neonatal_name" id="neonatal_name" class="form-control">
								<input type="hidden" name="neonatal_patient_id" id="neonatal_patient_id">
								<input type="hidden" name="neonatal_patient_code" id="neonatal_patient_code">
								<input type="hidden" name="neonatal_id" id="neonatal_id">
							</div>
						</div>
						<!--Neonatal gender-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$gender;?>
								</div>
								<?php echo form_dropdown('neonatal_gender', @$genderId, @$gender_id,'class="form-control" id="neonatal_gender"');?>
							</div>
						</div>
						<!--Neonatal weight-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$weight;?>
								</div>
								<input type="text" name="neonatal_weight" id="neonatal_weight" class="form-control">
							</div>
						</div>
						<!--Neonatal DOB-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$dob;?>
								</div>
								<input type="text" name="neonatal_dob" id="neonatal_dob" class="form-control">
							</div>
						</div>
						<!--Neonatal Date IN-->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
								      <?php echo @$date_in;?>
								</div>
								<input type="text" name="neonatal_date_in" id="neonatal_date_in" class="form-control">
							</div>
						</div>
						<!-- Submit -->
					    <div class="form-group">
						  <div class="input-group">
						    <input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>">
						  </div>
					    </div>


			    	</div>
			   	</div>
			</div>




			<div class="col-md-6">
				<div class="box box-danger">

					<div class="box-header">
						<h3 class="box-title">General</h3>
					</div>

					<div class="box-body">
						<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chNeoOpd" value="1">
                            </span>
                            <input type="text" value="Neo OPD" class="form-control" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chNeoSimpleIcu" value="1">
                            </span>
                            <input type="text" value="Neo Simple ICU" class="form-control" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chNeoComplicatedIcu" value="1">
                            </span>
                            <input type="text" value="Neo Complicated ICU" class="form-control" disabled="disabled">
                        </div>
                    </div>

			    	</div>
			   	</div>
			</div>

		</div>

		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<div class="box-tools pull-right" style="float:right;">
						<div class="input-group" style="width: 150px;">
							<input name="search" class="form-control input-sm pull-right" id="p_search" onkeyup="getSearch();" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
						<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									<th><?php echo $visitor;?></th>
									<th><?php echo $code;?></th>
									<th><?php echo $name;?></th>
									<th><?php echo $gender;?></th>
									<th><?php echo $weight;?></th>
									<th><?php echo $dob;?></th>
									<th><?php echo $old;?></th>
									<th></th>
								</tr>
							</thead>
							<tbody id="neonatalList"></tbody>
						</table>
						<div class="pull-left"><strong><?php echo @$c_total.' : ';?><span id="total_record"></span></strong></div>
						<div class="pull-right"><strong><i class="fa fa-refresh" onclick="pagination();"></i></strong></div>
						<div id="wait" style="display:none;width:120px;height:120px;position:absolute;top:50%;left:50%;padding:0px;"><img src='<?php echo $resources?>img/demo_wait.gif' width="100" height="100" /><br><?php echo @$loading;?>... <br/></div>
					</div></div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
<style>
    table > tbody > tr > td{
	text-align: center !important;
    }
    table > thead > tr > th{
	text-align: center !important;
    }
    .textLeft{
        text-align: left !important;
    }
</style>
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo $resources;?>plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo $resources;?>plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script>
    var pageStartTop = '0';
    var baseUrl = <?php echo '"'.$base_url.'index.php/"';?>;
    $(document).ready(function(){
		    pagination();
				$('#neonatal_dob').datetimepicker({format:'Y-m-d H:i:s'});
				$( "#neonatal_date_in" ).datepicker({dateFormat: "dd-mm-yy",changeYear:true,changeMonth:true,yearRange: "1965:2030"});
		});

    function getSearch(){
        var e = event.keyCode;
        if(e == 13){
	    			var ids = "";
	    			$('#msgs').css('display','none');
            pagination(ids);
        }
    }
  	function getNeoListVisited(mySearch,pageStart,pageLimit){
		    $(document).ajaxStart(function(){
		        $("#wait").css("display", "block");
		    });
				var totalRecord = <?php echo @$totals;?>;
        var htmlView = '';
        var i = 0;
        $.post("<?php echo $base_url;?>index.php/neonatals/getNeoListVisited",{ search_data: mySearch/*,page_start: pageStart,page_limit: pageLimit*/},
						function(data){
            	$.each(data, function(key,value) {
		            		viewGender = "";

										// var dob = value.neonatal_dob;
										// var today = new Date();
										// var age = Math.round((today-dob)/ (365.25 * 24 * 60 * 60 * 1000));
										var age = '';

		            		if(value.neonatal_gender == '1'){
		            			viewGender = "Male";
		            		}else if(value.neonatal_gender == '0'){
		            			viewGender = "Female";
		            		}
                		htmlView += '<tr>';
                    htmlView += '<td>' + value.patient_kh_name + '</td>';
                    htmlView += '<td>' + value.neonatal_code + '</td>';
                    htmlView += '<td>' + value.neonatal_en_name + '</td>';
                    htmlView += '<td>' + viewGender + '</td>';
                    htmlView += '<td>' + value.neonatal_weight + '</td>';
                    htmlView += '<td>' + $.datepicker.formatDate('dd-mm-yy', new Date(value.neonatal_dob)) + '</td>';
                    htmlView += '<td>' + age + '</td>';
                    htmlView += '<td>';
                    	// htmlView +='<a title="ICU" href="#" title="<?php echo @$icu;?>" onclick="neoIcu(' + value.neonatal_id + ');">ICU</a>&nbsp;&nbsp; ';
                    	// htmlView +='<a title="Vaccination" href="#" title="<?php echo @$vaccination;?>" onclick="neoVaccination(' + value.neonatal_id + ');">Vacc</a>&nbsp;&nbsp; ';
                    	// htmlView +='<a title="ECO" href="#" title="<?php echo @$eco;?>" onclick="neoEco(' + value.neonatal_id + ');">ECO</a>&nbsp;&nbsp; ';
                    	// htmlView +='<a title="OPD" href="#" title="<?php echo @$opd;?>" onclick="neoOpd(' + value.neonatal_id + ');">O</a>&nbsp;&nbsp; ';
                   		// htmlView +=' <a title="IPD" href="#" title="<?php echo @$ipd;?>" onclick="neoIpd(' + value.neonatal_id + ');">I</a>&nbsp;&nbsp; ';
                    	htmlView +=' <span title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editNeonatal(' + value.neonatal_id + ');"></i></span>&nbsp;&nbsp; ';
                    htmlView += '</td>';
                	htmlView += '</tr>';

            });

            	$("#neonatalList").html(htmlView);
            	$("#total_record").html(totalRecord);
            	$(document).ajaxComplete(function(){
	                $("#wait").css("display", "none");
	            });
        });
  }
  /* Jquery Pagination */
	function pagination(){
		/*  Post 3 parameter [ strSearch, Start, Limit]*/
		var totalRecord = <?php echo @$totals;?>;
		var pageLimit = <?php echo @$item_per_page;?>;
		var mySearch = $(':focus').val();;

		$('#total_record').html(totalRecord);

		pageStartTop = parseInt(pageStartTop) + 1;
		var pageStart = pageStartTop;

		getNeoListVisited(mySearch,pageStart,pageLimit);
	}

	// view edit
    function editNeonatal(ids){
		 $('#msgs').css('display','none');
		 $('#form_row').css('display','block');
		 $('#form_table').css('display','none');
		 $('#submit_edit').val('Update');
		 $('#title_name').html('/ Edit');
		 $.post("<?php echo $base_url;?>index.php/neonatals/get_neonatal_info_by_id_json/"+ids,function(data,status){
				$.each(data, function(key,value) {
						$('#neonatal_name').val(value.neonatal_en_name);
						$('#neonatal_patient_id').val(value.neonatal_patient_id);
						$('#neonatal_patient_code').val(value.neonatal_patient_code);
						$('#neonatal_id').val(value.neonatal_id);
						if(value.neonatal_gender == "1"){
								$('#neonatal_gender').val('1');
						}else{
								$('#neonatal_gender').val('0');
						}
						$('#neonatal_weight').val(value.neonatal_weight);
						$('#neonatal_dob').val(value.neonatal_dob);
						$('#neonatal_date_in').val($.datepicker.formatDate('dd-mm-yy', new Date(value.neonatal_date_in+'T00:00:00')));
				});
		 });
    }
		//insert Data
    $("#submit_edit").click(function(){
	    saveEdit();
    });
    function saveEdit(){
				var baseUrl = <?php echo "'".$base_url."'"?>;
				var redirects = "";
		    var red = '';
				var neonatalId = $('#neonatal_id').val();
				var neonatalPatientCode = $('#neonatal_patient_code').val();
				var neonatalPatientId = $('#neonatal_patient_id').val();
				var neonatalName = $('#neonatal_name').val();
				var neonatalGender = $('#neonatal_gender').val();
				var neonatalWeight = $('#neonatal_weight').val();
				var neonatalDob = $('#neonatal_dob').val();
				var neonatalDateIn = $('#neonatal_date_in').val();

				var opd = $('#chNeoOpd:checked').val();
				var neoSimpleIcu = $('#chNeoSimpleIcu:checked').val();
				var neoComplicatedIcu = $('#chNeoComplicatedIcu:checked').val();

				$.post("<?php echo $base_url;?>index.php/neonatals/save_neonatal",{
				    neonatalId: neonatalId,
				    neonatalPatientId: neonatalPatientId,
				    neonatalPatientCode: neonatalPatientCode,
				    neonatalName: neonatalName,
				    neonatalGender: neonatalGender,
				    neonatalWeight: neonatalWeight,
				    neonatalDob: neonatalDob,
						neonatalDateIn: neonatalDateIn,

				    opd: opd,
						neoSimpleIcu: neoSimpleIcu,
						neoComplicatedIcu: neoComplicatedIcu,

				},function(data){

					$('#neonatal_patient_id').val('');
				    $("#neonatalList").html('');
				    pageStartTop = '0';
				    $('#msgs').css('display','block');
				    /*pagination();*/
				});
				$('#form_row').css('display','none');
				$('#form_table').css('display','block');
        window.location = red;
	}
</script>
