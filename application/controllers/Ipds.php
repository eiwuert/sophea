<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Ipd
class Ipds extends Securities {

	// Define Index of Ipd Fucntion
	function index() {
	    // Check Session
	    $this->checkSession();
            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

						// $idOpd use for select all IPD
						$idIpd = array("2","36","37","38","51","52","53","54","55","56","57","58","39","40","41","42","43","44","45","46","47","48","49","50",
													"108","109");
						$this->VisitorModel->setId($idIpd);

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['totals'] = $this->VisitorModel->getCountVisitorIpd();
            $data['rediUrl'] = "";
            $data['rediTitle'] = $this->Lang('ipd');
            $data['jq_get_list'] = "get_ipd_list";
            $this->VisitorModel->setVisitorEnrol();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
  }

	// Set Visitor Leave
	function visitor_leave(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorLeave();
	    $this->VisitorModel->setVisitorLeaveDate($this->getCurrentDate());
	    $this->VisitorModel->update();
	}

	// ===================== JSON DATA ========================== //
	function get_ipd_list(){
	    // Check Session
	    $this->checkSession();

			// $idOpd use for select all IPD
			$idIpd = array("2","36","37","38","51","52","53","54","55","56","57","58","39","40","41","42","43","44","45","46","47","48","49",
										"50","108","109");
			$this->VisitorModel->setId($idIpd);

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    /*$this->VisitorModel->setStart($this->getPost('page_start'));
	    $this->VisitorModel->setLimit($this->getPost('page_limit'));*/
      $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorIpd();
      $this->restData($datas);
	}

	function get_ipd_info_by_id_json(){

	    // Check Session
	    $this->checkSession();

            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientById();
            $this->restData($datas);
	}

	// Delete Product
        function delete_product(){

	    // Check Session
	    $this->checkSession();

            $this->ProductModel->setId($this->getUrlSegment3());
            $this->ProductModel->delete();

            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Product From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Product From List');
        }

        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){

            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);

            // Translate
            $data['edit'] = $this->Lang('update');
            $data['delete'] = $this->Lang('delete');
            $data['disactive'] = $this->Lang('disactive');
            $data['title'] = $this->Lang('unit');
            $data['name'] = $this->Lang('name');
            $data['list'] = $this->Lang('list');
            $data['create'] = $this->Lang('create');
            $data['price'] = $this->Lang('pro_price');
            $data['qty'] = $this->Lang('pro_qty');
            $data['code'] = $this->Lang('code');
            $data['cost'] = $this->Lang('pro_cost');
            $data['desc'] = $this->Lang('desc');
            $data['enrolDate'] = $this->Lang('enrol_date');
            $data['visitorStatus'] = $this->Lang('v_status');
            $data['c_total'] = $this->Lang('total');
            $data['leave'] = $this->Lang('b_leave');
            $data['view'] = $this->Lang('view');

            $data['date'] = $this->Lang('date');
            $data['gender'] = $this->Lang('gender');
            $data['phone'] = $this->Lang('phone');
            $data['address'] = $this->Lang('address');
            $data['khName'] = $this->Lang('kh_name');
            $data['enName'] = $this->Lang('en_name');
            $data['dob'] = $this->Lang('dob');
            $data['contact'] = $this->Lang('contact');
            $data['emergencyPhone'] = $this->Lang('em_phone');
            $data['c_total'] = $this->Lang('total');
            $data['idCard'] = $this->Lang('id_card');
            $data['assuranceCard'] = $this->Lang('assurance_card');
            $data['assuranceCompany'] = $this->Lang('assurance_company');
            $data['motorCard'] = $this->Lang('motor_card');
            $data['carCard'] = $this->Lang('car_card');
            $data['bankCard1'] = $this->Lang('bank_card1');
            $data['bankCard2'] = $this->Lang('bank_card2');
            $data['studentCard'] = $this->Lang('student_card');
            $data['general'] = $this->Lang('general');
            $data['status'] = $this->Lang('status');
            $data['disease'] = $this->Lang('disease');
            $data['heart'] = $this->Lang('heart');
            $data['respiratory'] = $this->Lang('respiratory');
            $data['diabetes'] = $this->Lang('diabetes');
            $data['digestive'] = $this->Lang('digestive');
            $data['kidney'] = $this->Lang('kidney');
            $data['endocrine'] = $this->Lang('endocrine');
            $data['neuro_sys'] = $this->Lang('neuro_sys');
            $data['occupation'] = $this->Lang('occupation');
            $data['b_ipd'] = $this->Lang('b_ipd');
            $data['b_opd'] = $this->Lang('b_opd');
            $data['ipd'] = $this->Lang('ipd');
            $data['opd'] = $this->Lang('opd');


            // Menu Active
            $data['ac_ipds'] = 'active';

            return $data;
        }


      function i_delivery_normal() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_delivery_normal";
            $data['rediTitle'] = $this->Lang('i_delivery_normal');
            $data['jq_get_list'] = "get_i_delivery_normal_list";
            $this->VisitorModel->setI_delivery_normal();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_delivery_normal_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_delivery_normal();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_c_section() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_c_section";
            $data['rediTitle'] = $this->Lang('i_c_section');
            $data['jq_get_list'] = "get_i_c_section_list";
            $this->VisitorModel->setI_c_section();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_c_section_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_c_section();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_csection() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_c_section";
            $data['rediTitle'] = $this->Lang('i_c_section');
            $data['jq_get_list'] = "get_i_csection_list";
            $this->VisitorModel->setI_c_section();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_csection_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_c_section();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }
      function i_delivery_complication() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_delivery_complication";
            $data['rediTitle'] = $this->Lang('i_delivery_complication');
            $data['jq_get_list'] = "get_i_delivery_complication_list";
            $this->VisitorModel->setI_delivery_complication();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_delivery_complication_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_delivery_complication();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_maternity() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_maternity";
            $data['rediTitle'] = $this->Lang('i_maternity');
            $data['jq_get_list'] = "get_i_maternity_list";
            $this->VisitorModel->setI_maternity();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_maternity_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_maternity();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }


      function i_medicine() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_medicine";
            $data['rediTitle'] = $this->Lang('i_medicine');
            $data['jq_get_list'] = "get_i_medicine_list";
            $this->VisitorModel->setI_medicine();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_medicine_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_medicine();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_gyn() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_gyn";
            $data['rediTitle'] = $this->Lang('i_gyn');
            $data['jq_get_list'] = "get_i_gyn_list";
            $this->VisitorModel->setI_gyn();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_gyn_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_gyn();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }


      function i_surgery() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_surgery";
            $data['rediTitle'] = $this->Lang('i_surgery');
            $data['jq_get_list'] = "get_i_surgery_list";
            $this->VisitorModel->setI_surgery();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_surgery_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_surgery();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }


      function i_infertility() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_infertility";
            $data['rediTitle'] = $this->Lang('i_infertility');
            $data['jq_get_list'] = "get_i_infertility_list";
            $this->VisitorModel->setI_infertility();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_infertility_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_infertility();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_orl() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_orl";
            $data['rediTitle'] = $this->Lang('i_orl');
            $data['jq_get_list'] = "get_i_orl_list";
            $this->VisitorModel->setI_orl();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_orl_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_orl();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_ent() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_ent";
            $data['rediTitle'] = $this->Lang('i_ent');
            $data['jq_get_list'] = "get_i_ent_list";
            $this->VisitorModel->setI_ent();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_ent_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_ent();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }
      function i_dermatology() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_dermatology";
            $data['rediTitle'] = $this->Lang('i_dermatology');
            $data['jq_get_list'] = "get_i_dermatology_list";
            $this->VisitorModel->setI_dermatology();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_dermatology_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_dermatology();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }
      function i_bone() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_bone";
            $data['rediTitle'] = $this->Lang('i_bone');
            $data['jq_get_list'] = "get_i_bone_list";
            $this->VisitorModel->setI_bone();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_bone_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_bone();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_digestive() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_digestive";
            $data['rediTitle'] = $this->Lang('i_digestive');
            $data['jq_get_list'] = "get_i_digestive_list";
            $this->VisitorModel->setI_digestive();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_digestive_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_digestive();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

       function i_cardiaque() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_cardiaque";
            $data['rediTitle'] = $this->Lang('i_cardiaque');
            $data['jq_get_list'] = "get_i_cardiaque_list";
            $this->VisitorModel->setI_cardiaque();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_cardiaque_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_cardiaque();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

         function i_ipd_others() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_opd_others";
            $data['rediTitle'] = $this->Lang('i_opd_others');
            $data['jq_get_list'] = "get_i_opd_others_list";
            $this->VisitorModel->setI_ipd_others();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_ipd_others_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_ipd_others();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }


      function i_general_med() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_general_med";
            $data['rediTitle'] = $this->Lang('i_general_med');
            $data['jq_get_list'] = "get_i_general_med_list";
            $this->VisitorModel->setI_general_med();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_general_med_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_general_med();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }
      function i_general_surgery() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_general_surgery";
            $data['rediTitle'] = $this->Lang('i_general_surgery');
            $data['jq_get_list'] = "get_i_general_surgery_list";
            $this->VisitorModel->setI_general_surgery();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_general_surgery_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_general_surgery();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

       function i_eye() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_eye";
            $data['rediTitle'] = $this->Lang('i_eye');
            $data['jq_get_list'] = "get_i_eye_list";
            $this->VisitorModel->setI_eye();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_eye_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_eye();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }
       function i_trauma() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_trauma";
            $data['rediTitle'] = $this->Lang('i_trauma');
            $data['jq_get_list'] = "get_i_trauma_list";
            $this->VisitorModel->setI_trauma();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_trauma_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_trauma();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_pulmonaire() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_pulmonaire";
            $data['rediTitle'] = $this->Lang('i_pulmonaire');
            $data['jq_get_list'] = "get_i_pulmonaire_list";
            $this->VisitorModel->setI_pulmonaire();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_pulmonaire_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_pulmonaire();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_renal() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_renal";
            $data['rediTitle'] = $this->Lang('i_renal');
            $data['jq_get_list'] = "get_i_renal_list";
            $this->VisitorModel->setI_renal();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_renal_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_renal();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_icu() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_icu";
            $data['rediTitle'] = $this->Lang('i_icu');
            $data['jq_get_list'] = "get_i_icu_list";
            $this->VisitorModel->setI_icu();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_icu_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_icu();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

      function i_icu_ob() {
          // Check Session
          $this->checkSession();

            $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "i_icu_ob";
            $data['rediTitle'] = $this->Lang('i_icu_ob');
            $data['jq_get_list'] = "get_i_icu_ob_list";
            $this->VisitorModel->setI_icu_ob();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
      }

      function get_i_icu_ob_list(){
          // Check Session
          $this->checkSession();

          $this->VisitorModel->setSearch($this->getPost('search_data'));
          $this->VisitorModel->setI_icu_ob();
          $this->VisitorModel->setStart('0');
          $this->VisitorModel->setLimit('0');
          $datas = $this->VisitorModel->getAllVisitorOpd();
          $this->restData($datas);
      }

  // ##############
  // Neonatal Register
  // ##############
  function n_ipd() {
      // Check Session
      $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

        $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "n_ipd";
            $data['rediTitle'] = $this->Lang('n_ipd');
            $data['jq_get_list'] = "get_n_ipd_list";
            $this->VisitorModel->setVisitorEnrol();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
    }

  function get_n_ipd_list(){
      // Check Session
      $this->checkSession();

      $this->VisitorModel->setSearch($this->getPost('search_data'));
      $this->VisitorModel->setVisitorEnrol();
      $this->VisitorModel->setStart('0');
      $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
  }
	// ##############
	// Neonatal GOLD
	// ##############
	function n_chNeoSimpleIcu() {
      // Check Session
      $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

        $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
						$data['rediUrl'] = "p_chNeoSimpleIcu";
	          $data['rediTitle'] = $this->Lang('p_chNeoSimpleIcu');
	          $data['jq_get_list'] = "get_n_chNeoSimpleIcu_list";
            $this->VisitorModel->setP_chNeoSimpleIcu();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
    }

  function get_n_chNeoSimpleIcu_list(){
      // Check Session
      $this->checkSession();

      $this->VisitorModel->setSearch($this->getPost('search_data'));
      $this->VisitorModel->setP_chNeoSimpleIcu();
      $this->VisitorModel->setStart('0');
      $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
  }

	function n_chNeoComplicatedIcu() {
      // Check Session
      $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

        $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
						$data['rediUrl'] = "p_chNeoComplicatedIcu";
            $data['rediTitle'] = $this->Lang('p_chNeoComplicatedIcu');
            $data['jq_get_list'] = "get_n_chNeoComplicatedIcu_list";
            $this->VisitorModel->setP_chNeoComplicatedIcu();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
    }

  function get_n_chNeoComplicatedIcu_list(){
      // Check Session
      $this->checkSession();

      $this->VisitorModel->setSearch($this->getPost('search_data'));
      $this->VisitorModel->setP_chNeoComplicatedIcu();
      $this->VisitorModel->setStart('0');
      $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
  }

	// ##############
	// Neonatal transer
	// ##############
	function p_chNeoSimpleIcu() {
      // Check Session
      $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

        $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
						$data['rediUrl'] = "p_chNeoSimpleIcu";
            $data['rediTitle'] = $this->Lang('p_chNeoSimpleIcu');
            $data['jq_get_list'] = "get_p_chNeoSimpleIcu_list";
            $this->VisitorModel->setP_chNeoSimpleIcu();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
    }

  function get_p_chNeoSimpleIcu_list(){
      // Check Session
      $this->checkSession();

      $this->VisitorModel->setSearch($this->getPost('search_data'));
      $this->VisitorModel->setP_chNeoSimpleIcu();
      $this->VisitorModel->setStart('0');
      $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
  }

	function p_chNeoComplicatedIcu() {
      // Check Session
      $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

        $this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
						$data['rediUrl'] = "p_chNeoComplicatedIcu";
	          $data['rediTitle'] = $this->Lang('p_chNeoComplicatedIcu');
	          $data['jq_get_list'] = "get_p_chNeoComplicatedIcu_list";
	          $this->VisitorModel->setP_chNeoComplicatedIcu();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('ipds/list');
            $this->LoadView('template/footer');
    }

  function get_p_chNeoComplicatedIcu_list(){
      // Check Session
      $this->checkSession();

      $this->VisitorModel->setSearch($this->getPost('search_data'));
      $this->VisitorModel->setP_chNeoComplicatedIcu();
      $this->VisitorModel->setStart('0');
      $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
  }

}
?>
