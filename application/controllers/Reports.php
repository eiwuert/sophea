<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Product
class Reports extends Securities {
    function index(){
  	    // Check Session
  	    $this->checkSession();

        $data = array();
        // Get Item Per Page
  	    $data['item_per_page'] = $this->getSysConfig();
  	    // Get Count All Product
  	    $data['totals'] = $this->ProductModel->getCountProduct();
        // Get Translate Word to View
        $data = $this->getTranslate($data);

        $data['dropServiceType'] = $this->getServiceOption();
        // Load View
        $this->LoadView('template/header',$data);
        $this->LoadView('template/topmenu');
        $this->LoadView('template/sidebar');
        $this->LoadView('reports/list');
        $this->LoadView('template/footer');
    }

    function service_doctor(){
  	    // Check Session
  	    $this->checkSession();

  	    $data = array();
  	    $data = $this->getTranslate($data);

  	    // Get Count All Product
  	    $this->VisitorModel->setName($this->getPost('doctor'));
  	    $this->VisitorModel->setDate1(date('Y-m-d',strtotime($this->getPost('date1'))));
  	    $this->VisitorModel->setDate2(date('Y-m-d',strtotime($this->getPost('date2'))));
  	    $data['product_report'] = $this->VisitorModel->getProductUsedReport();

        // Load View
        $this->LoadView('reports/service_doctor',$data);
    }

    function income_report(){
  	    // Check Session
  	    $this->checkSession();
        $this->permissionSection('mIncome');
        $this->checkPermission();
  	    $data = array();
  	    $data = $this->getTranslate($data);
	      // Get All
        $this->VisitorModel->setDate1($this->getPost('date1'));
        $this->VisitorModel->setDate2($this->getPost('date2'));
        $data['income_report'] = $this->VisitorModel->getIncomeData();
        // Load View
        $this->LoadView('reports/income_list',$data);
    }
    // xxxxxxxxxxxxxxxxxxxxxxxx
    function serviceCount(){
  	    //Check Session
        $this->checkSession();
        // $this->permissionSection('mIncome');
        // $this->checkPermission();
        $data = array();
        $data = $this->getTranslate($data);

        $this->VisitorModel->setDate1($this->getPost('date1'));
        $this->VisitorModel->setDate2($this->getPost('date2'));
        $this->VisitorModel->setId($this->getPost('serviceOpt'));

        $queryOpd = '';
        $queryIpd = '';

        $titleOpd = array();
        $titleIpd = array();

        $idOpd = array();
        $idIpd = array();


        if($this->getPost('serviceOpt') == 0){
              $this->VisitorModel->setId(0);
              $titleOpd = array("1"=>"OPD", "10"=>"OPD OB", "11"=>"OPD Gen Med", "12"=>"Servical Cancer Screening", "13"=>"OPD Cardio", "14"=>"OPD EYE", "15"=>"OPD Pulmonaire", "16"=>"OPD Trauma", "17"=>"OPD Renal", "18"=>"Maternity", "19"=>"Medicine",
                          "12"=>"GYN", "21"=>"Surgery", "22"=>"Infertility", "23"=>"ORL", "24"=>"ENT", "25"=>"Dermatology", "26"=>"Bone", "27"=>"Digestive", "28"=>"Cardiaque", "29"=>"OPD others", "30"=>"Cancer",
                        "69"=>"Labo","70"=>"X-ray","71"=>"CT Scan","72"=>"Anapat","73"=>"HPV","74"=>"Colpo","75"=>"Thinprep","76"=>"Papsmear","77"=>"X-Ray Overay","78"=>"DNA","79"=>"ECG","80"=>"Gastro Endoscopy","81"=>"Other Support Service",
                      "82"=>"ECHO ANC","83"=>"Echo Neo Cardio","84"=>"Other Adult Echo",
                    "104"=>"OPD Booking","105"=>"IPD Booking",
                  "86"=>"Examen","87"=>"Perine","88"=>"IVG","89"=>"ANC/CPN","90"=>"Miscarrage","91"=>"Other Service","92"=>"VPI-Vaccination","93"=>"Neo Labo","94"=>"Bone Test",
                "96"=>"Pharmacy",
              "98"=>"OPD Ped","99"=>"Ped IPD","100"=>"Ped Frencectomy","101"=>"Ped Circumcision",
            "107"=>"Neo OPD");
              $idOpd = array("1","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30",
                        "69","70","71","72","73","74","75","76","77","78","79","80","81",
                      "82","83","84",
                    "104","105",
                  "86","87","88","89","90","91","92","93","94",
                "96",
              "98","99","100","101",
            "107");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();

              $this->VisitorModel->setId(0);
              $titleIpd = array("2"=>"IPD","36"=>"Deivery Normal","37"=>"C section","38"=>"Delivery-Complication","51"=>"General Med IPD","52"=>"General Surgery","53"=>"EYE-IPD","54"=>"Trauma IPD","55"=>"Pulmonaire IPD","56"=>"Renal IPD","57"=>"ICU IPD",
                        "58"=>"ICU OB","39"=>"Maternity","40"=>"Cancer","41"=>"GYN","42"=>"OBGYN Surgery","43"=>"Infertility","44"=>"ORL","45"=>"ENT","46"=>"Dermatology","47"=>"Bone","48"=>"Digestive","49"=>"Cardiaque",
                        "50"=>"IPD others",
                      "108"=>"Neo Simple ICU","109"=>"Neo Complicated ICU");
              $idIpd = array("2","36","37","38","51","52","53","54","55","56","57","58","39","40","41","42","43","44","45","46","47","48","49","50","59",
                      "108","109");
              $this->VisitorModel->setDataArray2($idIpd);
              $queryIpd = $this->VisitorModel->getCountByArrayIdIPD();
        }elseif($this->getPost('serviceOpt') == 1){
              $this->VisitorModel->setId(0);
              $titleOpd = array("1"=>"OPD", "10"=>"OPD OB", "11"=>"OPD Gen Med", "12"=>"Servical Cancer Screening", "13"=>"OPD Cardio", "14"=>"OPD EYE", "15"=>"OPD Pulmonaire", "16"=>"OPD Trauma", "17"=>"OPD Renal", "18"=>"Maternity", "19"=>"Medicine",
                          "20"=>"GYN", "21"=>"Surgery", "22"=>"Infertility", "23"=>"ORL", "24"=>"ENT", "25"=>"Dermatology", "26"=>"Bone", "27"=>"Digestive", "28"=>"Cardiaque", "29"=>"OPD others", "30"=>"Cancer");
              $idOpd = array("1","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 2){
              $this->VisitorModel->setId(0);
              $titleIpd = array("2"=>"IPD","36"=>"Deivery Normal","37"=>"C section","38"=>"Delivery-Complication","51"=>"General Med IPD","52"=>"General Surgery","53"=>"EYE-IPD","54"=>"Trauma IPD","55"=>"Pulmonaire IPD","56"=>"Renal IPD","57"=>"ICU IPD",
                        "58"=>"ICU OB","39"=>"Maternity","40"=>"Cancer","41"=>"GYN","42"=>"OBGYN Surgery","43"=>"Infertility","44"=>"ORL","45"=>"ENT","46"=>"Dermatology","47"=>"Bone","48"=>"Digestive","49"=>"Cardiaque",
                        "50"=>"IPD others","59"=>"IMG");
              $idIpd = array("2","36","37","38","51","52","53","54","55","56","57","58","39","40","41","42","43","44","45","46","47","48","49","50","59");
              $this->VisitorModel->setDataArray2($idIpd);
              $queryIpd = $this->VisitorModel->getCountByArrayIdIPD();
        }elseif($this->getPost('serviceOpt') == 3){
              $this->VisitorModel->setId(0);
              $titleOpd = array("69"=>"Labo","70"=>"X-ray","71"=>"CT Scan","72"=>"Anapat","73"=>"HPV","74"=>"Colpo","75"=>"Thinprep","76"=>"Papsmear","77"=>"X-Ray Overay","78"=>"DNA","79"=>"ECG","80"=>"Gastro Endoscopy","81"=>"Other Support Service");
              $idOpd = array("69","70","71","72","73","74","75","76","77","78","79","80","81");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 4){
              $this->VisitorModel->setId(0);
              $titleOpd = array("82"=>"ECHO ANC","83"=>"Echo Neo Cardio","84"=>"Other Adult Echo");
              $idOpd = array("82","83","84");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 5){
              $this->VisitorModel->setId(0);
              $titleOpd = array("104"=>"OPD Booking","105"=>"IPD Booking");
              $idOpd = array("104","105");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 6){
              $this->VisitorModel->setId(0);
              $titleOpd = array("86"=>"Examen","87"=>"Perine","88"=>"IVG","89"=>"ANC/CPN","90"=>"Miscarrage","91"=>"Other Service","92"=>"VPI-Vaccination","93"=>"Neo Labo","94"=>"Bone Test");
              $idOpd = array("86","87","88","89","90","91","92","93","94");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 7){
              $this->VisitorModel->setId(0);
              $titleOpd = array("96"=>"Pharmacy");
              $idOpd = array("96");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 8){
              $this->VisitorModel->setId(0);
              $titleOpd = array("98"=>"OPD Ped","99"=>"Ped IPD","100"=>"Ped Frencectomy","101"=>"Ped Circumcision");
              $idOpd = array("98","99","100","101");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();
        }elseif($this->getPost('serviceOpt') == 9){
              $this->VisitorModel->setId(0);
              $titleOpd = array("107"=>"Neo OPD");
              $idOpd = array("107");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();

              $titleIpd = array("108"=>"Neo Simple ICU","109"=>"Neo Complicated ICU");
              $idIpd = array("108","109");
              $this->VisitorModel->setDataArray2($idIpd);
              $queryIpd = $this->VisitorModel->getCountByArrayIdIPD();
        }elseif($this->getPost('serviceOpt') == 10){
              $this->VisitorModel->setId(1);
              $titleOpd = array("107"=>"Neo OPD");
              $idOpd = array("107");
              $this->VisitorModel->setDataArray($idOpd);
              $queryOpd = $this->VisitorModel->getCountByArrayId();

              $titleIpd = array("108"=>"Neo Simple ICU","109"=>"Neo Complicated ICU");
              $idIpd = array("108","109");
              $this->VisitorModel->setDataArray2($idIpd);
              $queryIpd = $this->VisitorModel->getCountByArrayIdIPD();
        }
        // ----
              if($queryOpd){
                  $resultOpd = array();
                  foreach ($queryOpd as $key => $value) {
                      $resultOpd[$value->visitors_status_history] = $value->count;
                  }
              }else{ $resultOpd = array(); }
              if($queryIpd){
                  $resultIpd = array();
                  foreach ($queryIpd as $key => $value) {
                      $resultIpd[$value->visitors_status_history] = $value->count;
                  }
              }else{ $resultIpd = array(); }

        // get count and replace each titile
        $data['service_report_opd'] = $this->arrResultByKey($titleOpd, $resultOpd);
        $data['service_report_ipd'] = $this->arrResultByKey($titleIpd, $resultIpd);

        // Load View
        $this->LoadView('reports/service_count',$data);
    }

    function dr_report(){
        // Check Session
        $this->checkSession();
        // $this->permissionSection('mDrugReport');
        // $this->checkPermission();

        $data = array();
        $data = $this->getTranslate($data);

        // Get All
        $this->VisitorModel->setDate1($this->getPost('date1'));
        $this->VisitorModel->setDate2($this->getPost('date2'));

        $data['dr_report'] = $this->VisitorModel->getDrugReport();;

        // Load View
        $this->LoadView('reports/dr_list',$data);
    }

    function ipd_opd_report(){
	    // Check Session
	    $this->checkSession();

	    $data = array();
	    $data = $this->getTranslate($data);

	    // Get Count All Product
	    $this->VisitorModel->setName($this->getPost('doctor'));
	    $ps = explode('_', $this->getPost('visit_status'));

            if($ps[0] != ''){
                $this->VisitorModel->setKey01($ps[0]);
            }

            if($ps[1] != ''){
                $this->VisitorModel->setKey02($ps[1]);
            }

            if($ps[2] != ''){
                $this->VisitorModel->setKey03($ps[2]);
            }

	    $data['patient_report'] = $this->VisitorModel->getPatientVisitReport();
            //$data['patient_report'] =  $this->getPost('visit_status');

            // Load View
            $this->LoadView('reports/patient_status',$data);
    }

    function comission_report(){
	    // Check Session
	    $this->checkSession();

	    $data = array();
	    $data = $this->getTranslate($data);

	    // Get Count All Product
	    //$this->VisitorModel->setName($this->getPost('doctor'));

            $this->VisitorModel->setUserId($this->getSession('user_id'));
            $this->VisitorModel->setKey01($this->getSession('user_id'));

            $this->VisitorModel->setDate1($this->getPost('date1'));
            $this->VisitorModel->setDate2($this->getPost('date2'));

	    $data['commission_report'] = $this->VisitorModel->getDoctorComission();
            //$data['patient_report'] =  $this->getPost('visit_status');

            //$this->restData($data['patient_report']);

            // Load View
            $this->LoadView('reports/comission_list',$data);
    }

    // #################### Translate ####################### //
    // Translate to View
    function getTranslate($data = null){
        	// Define Default Language from Security to view
        	@$data = $this->defTranslation($data);
        	// Translate
        	//$data['edit'] = $this->Lang('update');
        	// Menu Active
        	$data['ac_reports'] = 'active';
	        return $data;
    }
}
