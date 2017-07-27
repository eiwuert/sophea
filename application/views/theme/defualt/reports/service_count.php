    <head>
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo $resources;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $resources;?>font-awesome/css/font-awesome.min.css">
        <!-- Custom -->
        <link rel="stylesheet" href="<?php echo $resources;?>css/custom.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $resources;?>dist/css/AdminLTE.min.css">
        <!-- Font Embed -->
        <link rel="stylesheet" href="<?php echo $resources;?>css/font.css"/>
    </head>
    <body>
	    <div style="width:100% !important; text-align: center; margin-bottom: 30px !important;">
		<h4 class="header textCenter"><br>
			   Service Count Reports
		</h4>
	    </div>
      <!--<h5 class="subHeader textCenter"></h5>-->
      <table class="table" style="width: 100% !important;">
      		<thead>
              <tr>
                    <th>List Service</th>
                    <th>Count Service</th>
              </tr>
      		</thead>
      		<tbody>
              <?php if(!empty($service_report_opd)):?>
              <tr>
                  <td colspan="2" style="background:#f2dede"><center>OPD Result</center></td>
              </tr>
              <?php foreach($service_report_opd as $key=>$val):?>
                      <tr>
                          <td><?php echo $key?></td>
                          <td><?php echo $val?>​​</td>
                      </tr>
              <?php endforeach ?>
              <?php endif ?>

              <?php if(!empty($service_report_ipd)):?>
              <tr>
                  <td colspan="2" style="background:#f2dede"><center>IPD Result</center></td>
              </tr>
              <?php foreach($service_report_ipd as $key=>$val):?>
                      <tr>
                          <td><?php echo $key?></td>
                          <td><?php echo $val?>​​</td>
                      </tr>
              <?php endforeach ?>
              <?php endif ?>
      		</tbody>
	    </table>

    </body>
    <footer>
        <style>
            .invBody{
                padding: 20px !important;
            }
            .textCenter{
                text-align: center !important;
            }
            .textRight{
                text-align: right !important;
            }
            .header{
                width:  100% !important;
                font-weight: bold !important;
                font-family: "Kantumruy" !important;
            }
            .subHeader{
                width:  100% !important;
                font-family: "Kantumruy" !important;
            }
            th{
                text-align: center !important;
                border: solid 1px #5C6A71 !important;
                font-size: 12px !important;
            }
            td{
                border: solid 1px #5C6A71 !important;
                font-size: 12px !important;
            }
            .headPrint{
                background: #5C6A71 !important;
                color: #FFF !important;
                text-align: center !important;
            }

            @media print{
                th{
                    border: solid 1px #5C6A71 !important;
                    background-color: #5C6A71;
                }
                td{
                    border: solid 1px #5C6A71 !important;
                }
                .headPrint{
                    background: #5C6A71 !important;
                    color: #FFF !important;
                    text-align: center !important;
                }
            }
        </style>
    </footer>
