<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Opd
class Diagnostics extends Securities {

	// Define Index of Ipd Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mDiagnostic');
            $this->checkPermission();

	    			$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

						// $idOpd use for select all OPD
						$idOpd = array("1","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30",
						            "69","70","71","72","73","74","75","76","77","78","79","80","81",
						          "82","83","84",
						        "104","105",
						      "86","87","88","89","90","91","92","93","94",
						    "96",
						  "98","99","100","101",
						"107");
						$this->VisitorModel->setId($idOpd);

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "";
            $data['rediTitle'] = $this->Lang('diagnostic');
            $data['jq_get_list'] = "get_opd_list";
            $this->VisitorModel->setVisitorEnrol();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);
            // Menu Active
            $data['ac_diagnostics'] = 'active';
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
  }

	public function add() {
			    // Check Session
			    $this->checkSession();
			    $this->permissionSection('mDiagnostic');
			    $this->checkPermission();
					$data = array();
					//Get visitor Info
          $this->VisitorModel->setId($this->getUrlSegment3());
			    $data['visitor_info'] = $this->VisitorModel->getVisitorInfo();
			    $data['dia_info'] = $this->VisitorModel->getDiaByVisitorId();
					$this->WardModel->setStart(0);
					$this->WardModel->setLimit(0);
					$query_ward = $this->WardModel->getAllWard();
					$data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='',$label_name='',$id='wards_id',$value='wards_desc',$value2='');

					$this->RoomModel->setStart(0);
					$this->RoomModel->setLimit(0);
					$query_room = $this->RoomModel->getAllRoom();
					$data['drop_rooms'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='',$id='room_id',$value='room_name',$value2='');

          // Get Translate Word to View
          $data = $this->getTranslate($data);
          // Load View
          $this->LoadView('diagnostics/prescription',$data);
  }

	public function view_pres() {

	    // Check Session
	    $this->checkSession();
            $this->permissionSection('mPrescription');
            $this->checkPermission();

            $data = array();

            //Get visitor Info
            $this->VisitorModel->setId($this->getUrlSegment3());
		    $data['visitor_info'] = $this->VisitorModel->getVisitorInfo();
		    $data['dia_info'] = $this->VisitorModel->getDiaByVisitorId();

	        $this->WardModel->setStart(0);
			$this->WardModel->setLimit(0);
			$query_ward = $this->WardModel->getAllWard();
			$data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='',$label_name='',$id='wards_id',$value='wards_desc',$value2='');

			// $this->RoomModel->setStart(0);
			// $this->RoomModel->setLimit(0);
			// $query_room = $this->RoomModel->getAllRoom();
			// $data['drop_rooms'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='',$id='room_id',$value='room_code',$value2='');

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('diagnostics/view_prescription',$data);
        }

        function add_note(){
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddClinicalNote');
            $this->checkPermission();

            $this->DiagnosticModel->setId($this->getUrlSegment3());
	    $this->DiagnosticModel->setDesc($this->getPost('clinical'));
	    $this->DiagnosticModel->save_note();
	}

	function get_protocol_list(){
	        // Check Session
		    $this->checkSession();
		    $this->DiagnosticModel->setId($this->getUrlSegment3());
		    $datas = $this->DiagnosticModel->getProtocolList();
		    $this->restData($datas);
	}
	function get_protocol_list_byid(){
		// Check Session
			$this->checkSession();
			$this->DiagnosticModel->setId($this->getUrlSegment3());
			$datas = $this->DiagnosticModel->getProtocolListById();
			$this->restData($datas);
	}

	public function add_protocol() {
			    // Check Session
			    $this->checkSession();
			    // $this->permissionSection('mAddProtocols');
			    // $this->checkPermission();
					$data = array();
          $this->DiagnosticModel->setId($this->getUrlSegment3());
					$this->DiagnosticModel->setVisitorId($this->getPost('visitorId'));
					$this->DiagnosticModel->setProtocolId($this->getPost('protocolId'));
					$this->DiagnosticModel->setDate(date('Y-m-d',strtotime($this->getPost('protocolDate'))));
					$this->DiagnosticModel->setProtocolSurgeon($this->getPost('protocolSurgeon'));
					$this->DiagnosticModel->setProtocolAnesthesia($this->getPost('protocolAnesthesia'));
					$this->DiagnosticModel->setProtocolHelper($this->getPost('protocolHelper'));
					$this->DiagnosticModel->setProtocolNeoDoctor($this->getPost('protocolNeoDoctor'));
					$this->DiagnosticModel->setProtocolMidult($this->getPost('protocolMidult'));

					if( $this->getUrlSegment3() == 0){
							$addd = $this->DiagnosticModel->addProtocol();
					}else{
							$accc = $this->DiagnosticModel->updateProtocol();
					}
  }

	function delete_protocol(){
				// Check Session
				$this->checkSession();
				$this->DiagnosticModel->setId($this->getUrlSegment3());
				$this->DiagnosticModel->deleteProtocol();
	}

	function saveVirtualSign(){
	        $this->DiagnosticModel->setId($this->getPost('virtual_id'));
	        $this->DiagnosticModel->setVisitorId($this->getPost('visitor_id'));
	        $this->DiagnosticModel->setPulseRate($this->getPost('pulse_rate'));
			$this->DiagnosticModel->setHeartRate($this->getPost('heart_rate'));
			$this->DiagnosticModel->setBloodPressure($this->getPost('blood_pressure'));
			$this->DiagnosticModel->setRespiratoryRate($this->getPost('respiratory_rate'));
			$this->DiagnosticModel->setTemperature($this->getPost('temperature'));
			if(!$this->getPost('virtual_id') == ''){
				$this->DiagnosticModel->updateIpdVirtualSign();
			}else{
				$this->DiagnosticModel->saveIpdVirtualSign();
			}
	    }
	    function get_vsipd_list(){

	    // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getVsipdList();

	    $this->restData($datas);
	}
	function get_vsipd_list_byid(){
		// Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getVsipdListById();

	    $this->restData($datas);
	}

	function add_medicine(){

            // Check Session
	    $this->checkSession();
      $this->permissionSection('mAddMedicine');
      $this->checkPermission();

	    $pInfo = explode('-', $this->getPost('medicines'));
	    $this->ProductModel->setProductCode($pInfo[0]);

	    $this->DiagnosticModel->setId($this->getPost('service_item_id'));
	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $this->DiagnosticModel->setProductQty($this->getPost('qty'));
	    $this->DiagnosticModel->setProductPrice($this->getPost('price'));
	    $this->DiagnosticModel->setProductId($this->ProductModel->getPruductIdByName());
	    $this->DiagnosticModel->setDiscount($this->checkIfNull($this->getPost('discount')));
	    $this->DiagnosticModel->setUserId($this->getSession('user_id'));

	    // Medicine
	    $this->DiagnosticModel->setUseTime($this->checkIfNull($this->getPost('usetime')));
	    $this->DiagnosticModel->setUseDetail($this->checkIfNull($this->getPost('usedetail')));
	    $this->DiagnosticModel->setAm($this->getPost('amm'));
	    $this->DiagnosticModel->setAf($this->getPost('afm'));
	    $this->DiagnosticModel->setPm($this->getPost('pmm'));
	    $this->DiagnosticModel->setNt($this->getPost('ntm'));

	    // Service
	    $this->DiagnosticModel->setFitzpatrik($this->checkIfNull($this->getPost('fitzpatrik')));
	    $this->DiagnosticModel->setFluence($this->checkIfNull($this->getPost('fluence')));
	    $this->DiagnosticModel->setPulseLength($this->checkIfNull($this->getPost('pulse_length')));
	    $this->DiagnosticModel->setFrequency($this->checkIfNull($this->getPost('frequency')));
	    $this->DiagnosticModel->setMode($this->checkIfNull($this->getPost('mode')));
	    $this->DiagnosticModel->setNoOfTreal($this->checkIfNull($this->getPost('no_of_treal')));
	    $this->DiagnosticModel->setLens($this->checkIfNull($this->getPost('lens')));
	    $this->DiagnosticModel->setSpotSize($this->checkIfNull($this->getPost('spot_size')));
	    $this->DiagnosticModel->setCutOffFilter($this->checkIfNull($this->getPost('cut_off_filter')));
	    $this->DiagnosticModel->setPulseTrain($this->checkIfNull($this->getPost('pulse_train')));
	    $this->DiagnosticModel->setPauseLength($this->checkIfNull($this->getPost('pause_length')));
	    $this->DiagnosticModel->setPulseWithUs($this->checkIfNull($this->getPost('pulse_with_us')));
	    $this->DiagnosticModel->setEnergyMj($this->checkIfNull($this->getPost('energy_mj')));

      //	ordernant_no
      $this->DiagnosticModel->setAmount($this->getPost('order_no'));

	    // Set Form
	    $this->DiagnosticModel->setName($this->getPost('frm'));

	    if($this->getPost('doctor') == "" && ($this->getSession('assign_to') == '' || $this->getSession('assign_to') == NULL)){
                    $this->DiagnosticModel->setUserId($this->getSession('user_id'));
                    $this->DiagnosticModel->setAssignUid($this->getSession('user_id'));
                    $this->setSession('assign_to', $this->getSession('user_id'));
	    }else{
                    if($this->getPost('doctor') <> ''){
                        $doc = explode('-', $this->getPost('doctor'));
                        $this->UserModel->setName($doc[0]);
                        $this->UserModel->setPhone($doc[1]);
                        $this->setSession('assign_to', $this->UserModel->getUserIdByNameAndPhone());
                        $this->DiagnosticModel->setAssignUid($this->UserModel->getUserIdByNameAndPhone());
                    }else{
                        $this->DiagnosticModel->setAssignUid($this->getSession('assign_to'));
                    }
                    //$this->DiagnosticModel->setUserId($this->UserModel->getUserIdByNameAndPhone());
	    }

            if($this->DiagnosticModel->getAm() > '0' || $this->DiagnosticModel->getAf() > '0' || $this->DiagnosticModel->getPm() > '0' || $this->DiagnosticModel->getNt() > '0'){
                // Add Accept Madicine next time
                $this->DiagnosticModel->setAssignPer($this->getMedicalPer());
                $this->DiagnosticModel->setAcceptUid($this->getSession('assign_to'));
                $this->DiagnosticModel->setDate1($this->getCurrentDatetime());
            }else{
                $this->DiagnosticModel->setAssignPer($this->getServiceAssignPer());
                $this->DiagnosticModel->setAcceptUid('0');
            }


	    if($this->getPost('service_item_id') <> "" || $this->getPost('service_item_id') <> NULL){
                    $this->DiagnosticModel->setUserId($this->getSession('user_id'));
                    $this->DiagnosticModel->updateProduct();
            }else{
                    $this->DiagnosticModel->saveProduct();
            }
	}

        function update_medicine(){
            // Check Session
	    $this->checkSession();
            $this->permissionSection('mAddMedicine');
            $this->checkPermission();

            $this->DiagnosticModel->setId($this->getPost('service_item_id'));
	    $this->DiagnosticModel->setProductQty($this->getPost('qty'));
	    $this->DiagnosticModel->setProductPrice($this->getPost('price'));
	    $this->DiagnosticModel->setDiscount($this->getPost('discount'));

            $this->DiagnosticModel->updateMedicine();
        }

        function accept_service(){
                $this->checkSession();

                $this->DiagnosticModel->setId($this->getUrlSegment3());
                $this->DiagnosticModel->setAcceptPer($this->getServiceAcceptPer());
                $this->DiagnosticModel->setAcceptUid($this->getSession('user_id'));
                $this->DiagnosticModel->setDate1($this->getCurrentDatetime());
                $this->DiagnosticModel->acceptService();
        }

        function cancel_medicine(){

                $this->checkSession();

                $this->DiagnosticModel->setId($this->getUrlSegment3());
                $this->DiagnosticModel->setAcceptUid('0');
                $this->DiagnosticModel->acceptService();
        }

        function add_dia(){

	    // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $this->DiagnosticModel->setUserId($this->getSession('user_id'));

	    $this->logs('3', 'VID#'.$this->getUrlSegment3().' Dia0: '.$this->getPost('dia').' Dia1:'.$this->getPost('dia1').' Dia2:'.$this->getPost('dia2'));
	    $this->logs('3', 'VID#'.$this->getUrlSegment3().'Dia0: '.$this->getPost('dia_de').' Dia1:'.$this->getPost('dia1_de').' Dia2:'.$this->getPost('dia2_de'));

	    // Diagnostic 0
	    if($this->getPost('dia_id') == '0'){
			if($this->getPost('dia') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia'))[1]);
				$dia = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia);
				$this->DiagnosticModel->setDesc($this->getPost('dia_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia_level'));
				$this->DiagnosticModel->setWard($this->getPost('dia_ward1'));
				$this->DiagnosticModel->setRoomId($this->getPost('dia_room1'));
				$this->DiagnosticModel->add();
			}

	    }else{
					$this->DiagnosticModel->setDiagnosticId($this->getPost('dia_id'));

					$this->Icd10Model->setDesc(explode('_',$this->getPost('dia'))[1]);
					$dia = $this->Icd10Model->getIcd10IdByName();
					$this->DiagnosticModel->setIcd10Id($dia);
					$this->DiagnosticModel->setDesc($this->getPost('dia_de'));
					$this->DiagnosticModel->setLevel($this->getPost('dia_level'));
					$this->DiagnosticModel->setWard($this->getPost('dia_ward1'));
					$this->DiagnosticModel->setRoomId($this->getPost('dia_room1'));
					$this->DiagnosticModel->update();
	    }

	    // Diagnostic 1
	    if($this->getPost('dia1_id') == '0'){
			if($this->getPost('dia1') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia1'))[1]);
				$dia1 = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia1);
				$this->DiagnosticModel->setDesc($this->getPost('dia1_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia1_level'));
				$this->DiagnosticModel->setWard($this->getPost('dia1_ward2'));
				$this->DiagnosticModel->setRoomId($this->getPost('dia_room2'));
				$this->DiagnosticModel->add();
			}
	    }else{
			$this->DiagnosticModel->setDiagnosticId($this->getPost('dia1_id'));

			$this->Icd10Model->setDesc(explode('_',$this->getPost('dia1'))[1]);
			$dia1 = $this->Icd10Model->getIcd10IdByName();
			$this->DiagnosticModel->setIcd10Id($dia1);
			$this->DiagnosticModel->setDesc($this->getPost('dia1_de'));
			$this->DiagnosticModel->setLevel($this->getPost('dia1_level'));
			$this->DiagnosticModel->setWard($this->getPost('dia1_ward2'));
			$this->DiagnosticModel->setRoomId($this->getPost('dia_room2'));
			$this->DiagnosticModel->update();
	    }

	    // Diagnostic 2
	    if($this->getPost('dia2_id') == '0'){
			if($this->getPost('dia2') != ''){
				$this->Icd10Model->setDesc(explode('_',$this->getPost('dia2'))[1]);
				$dia2 = $this->Icd10Model->getIcd10IdByName();
				$this->DiagnosticModel->setIcd10Id($dia2);
				$this->DiagnosticModel->setDesc($this->getPost('dia2_de'));
				$this->DiagnosticModel->setLevel($this->getPost('dia2_level'));
				$this->DiagnosticModel->setWard($this->getPost('dia2_ward3'));
				$this->DiagnosticModel->setRoomId($this->getPost('dia_room3'));
				$this->DiagnosticModel->add();
			}
	    }else{
			$this->DiagnosticModel->setDiagnosticId($this->getPost('dia2_id'));

			$this->Icd10Model->setDesc(explode('_',$this->getPost('dia2'))[1]);
			$dia2 = $this->Icd10Model->getIcd10IdByName();
			$this->DiagnosticModel->setIcd10Id($dia2);
			$this->DiagnosticModel->setDesc($this->getPost('dia2_de'));
			$this->DiagnosticModel->setLevel($this->getPost('dia2_level'));
			$this->DiagnosticModel->setWard($this->getPost('dia2_ward3'));
			$this->DiagnosticModel->setRoomId($this->getPost('dia_room3'));
			$this->DiagnosticModel->update();
	    }

	}

	// Delete Service Item
	function delete_service(){
            // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setDiagnosticId($this->getUrlSegment3());
	    $this->DiagnosticModel->deleteService();
	}

	// Delete Service Item
	function delete_service_pay(){
            // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setDiagnosticId($this->getUrlSegment3());
	    $this->DiagnosticModel->deleteServicePay();
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

        // Set Appoinment
        function setAppoinmentDate(){
            $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
            $this->AppoinmentModel->setUserId($this->getSession('user_id'));
            $this->AppoinmentModel->setDate1($this->getPost("dateTime"));
            $this->AppoinmentModel->setDoctorId($this->getPost("doctorId"));
            $this->AppoinmentModel->setWardId($this->getPost("wardId"));
            if($this->AppoinmentModel->getCountAppoiomentByVisitorId() > 0){
                $this->AppoinmentModel->updateAppoinmentTime();
            }else{
                $this->AppoinmentModel->setAppoinment();
            }

        }

        // Update Appoinment
        /*function updateAppoinment(){
            $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
            $this->AppoinmentModel->setDate1($this->getPost("dateTime"));

            $this->AppoinmentModel->updateAppoinmentTime();
        }*/

        // =================== REST DATA ========================= //
	// Get Visitor Info
	function visitor_info(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setId($this->getUrlSegment3());
	    $datas = $this->VisitorModel->getDiaByVisitorId();
	    $this->restData($datas);
	}

	function get_diagnostic_list(){
	    // Check Session
	    $this->checkSession();
	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getDiagnosticListByVisitorId();
	    $this->restData($datas);
	}

	function get_medicine_list(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('2');
	    $datas = $this->VisitorModel->getMedicinListByVisitorId();

	    $this->restData($datas);
	}

	function get_medicine_info_by_id(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('2');
	    $datas = $this->VisitorModel->getMedicinInfoByServiceId();

	    $this->restData($datas);
	}

        function get_service_info_by_id(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('4');
	    $datas = $this->VisitorModel->getMedicinInfoByServiceId();

	    $this->restData($datas);
	}

	function get_note_list(){

	    // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setVisitorId($this->getUrlSegment3());
	    $datas = $this->DiagnosticModel->getNoteByVisitorId();

	    $this->restData($datas);
	}

	function get_service_list(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setVisitorId($this->getUrlSegment3());
	    $this->VisitorModel->setTypeId('4');
	    $datas = $this->VisitorModel->getMedicinListByVisitorId();

	    $this->restData($datas);
	}
  function get_opd_list(){
	    // Check Session
	    $this->checkSession();
			// $idOpd use for select all OPD
			$idOpd = array("1","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30",
			            "69","70","71","72","73","74","75","76","77","78","79","80","81",
			          "82","83","84",
			        "104","105",
			      "86","87","88","89","90","91","92","93","94",
			    "96",
			  "98","99","100","101",
			"107");
			$this->VisitorModel->setId($idOpd);
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    /*$this->VisitorModel->setStart($this->getPost('page_start'));
	    $this->VisitorModel->setLimit($this->getPost('page_limit'));*/
	    $this->VisitorModel->setVisitorEnrol();
      $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
      $datas = $this->VisitorModel->getAllVisitorOpd();
      $this->restData($datas);
	}

	function get_ipd_info_by_id_json(){

	    // Check Session
	    $this->checkSession();

            $this->PatientModel->setId($this->getUrlSegment3());
            $datas = $this->PatientModel->getPatientById();
            $this->restData($datas);
	}

	// Auto Form
	function form_auto_complete(){
	    // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->DiagnosticModel->getFormByName();
            $this->restData($datas);
	}

	// Auto Doctor
	function doctor_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    $this->UserModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->UserModel->getUserInfoByName();
			$this->restData($datas);
	}
	// Auto Protocol
	function protocols_auto_complete(){
	    // Check Session
	    $this->checkSession();
	    $this->UserModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->ProtocolModel->getProtocolsInfoByName();
			$this->restData($datas);
	}

	function get_protocol_json(){
			// Check Session
			$this->checkSession();
			$this->ProtocolModel->setSearch(urldecode($this->getUrlSegment3()));
			$datas = $this->ProtocolModel->getProtocolsInfo();
			$this->restData($datas);
	}

  // Get Appoinment
  function getAppoinmentByVisitorId(){
      // Check Session
			$this->checkSession();
      $this->AppoinmentModel->setVisitorId($this->getUrlSegment3());
      $datas = $this->AppoinmentModel->getAppoinmentByVisitorId();
      $this->restData($datas);
  }

        // Get Appoinment
        function getAppoinmentAll(){
            // Check Session
	    	$this->checkSession();
            $datas = $this->AppoinmentModel->getAllAppoinment();
            $this->restData($datas);
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
	    $data['discount'] = $this->Lang('pro_discount');
	    $data['am'] = $this->Lang('pro_am');
	    $data['af'] = $this->Lang('pro_af');
	    $data['pm'] = $this->Lang('pro_pm');
	    $data['nt'] = $this->Lang('pro_nt');
	    $data['doctor'] = $this->Lang('doctor');
            $data['qty'] = $this->Lang('pro_qty');
            $data['code'] = $this->Lang('code');
            $data['cost'] = $this->Lang('pro_cost');
            $data['desc'] = $this->Lang('desc');
            $data['enrolDate'] = $this->Lang('enrol_date');
	    $data['leaveDate'] = $this->Lang('v_leave_date');
            $data['visitorStatus'] = $this->Lang('v_status');
            $data['c_total'] = $this->Lang('total');
            $data['leave'] = $this->Lang('b_leave');
            $data['view'] = $this->Lang('view');
            $data['date_in'] = $this->Lang('date_in');

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
            $data['medicine'] = $this->Lang('medicine');
            $data['service'] = $this->Lang('service');
            $data['age'] = $this->Lang('age');
	    $data['no'] = $this->Lang('c_no');
	    	$data['vital_sign'] = $this->Lang('vital_sign');
	    	$data['pulseRate'] = $this->Lang('pulse_rate');
		$data['bloodPressure'] = $this->Lang('blood_pressure');
		$data['heartRate'] = $this->Lang('heart_rate');
		$data['respiratoryRate'] = $this->Lang('respiratory_rate');
		$data['temperature'] = $this->Lang('temperature');

	    // Result Out
	    $data['cure'] = $this->Lang('cure');
	    $data['notCure'] = $this->Lang('not_cure');
	    $data['referOut'] = $this->Lang('refer_out');
	    $data['death'] = $this->Lang('death');

	    $data['no'] = $this->Lang('c_no');

            return $data;
        }
        function delete_vsipd_list_byid(){
            // Check Session
	    $this->checkSession();

	    $this->DiagnosticModel->setId($this->getUrlSegment3());
	    $this->DiagnosticModel->deleteVsipd();
        }

// #############################
// sub diagnostic
// #############################
	public function o_ob() {
		    // Check Session
		    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();
  			$this->setSession('assign_to', $this->getSession('user_id'));
        $data = array();
        // Get Item Per Page
        $data['item_per_page'] = $this->getSysConfig();
        // Get Count All Visitor
        $data['rediUrl'] = "o_ob";
        $data['rediTitle'] = $this->Lang('o_ob');
        $data['jq_get_list'] = "get_o_ob_list";
				$this->VisitorModel->setO_ob();
        $data['totals'] = $this->VisitorModel->getCountVisitorOpd();
        // Get Translate Word to View
        $data = $this->getTranslate($data);
        // Load View
        $this->LoadView('template/header',$data);
        $this->LoadView('template/topmenu');
        $this->LoadView('template/sidebar');
        $this->LoadView('diagnostics/list');
        $this->LoadView('template/footer');
  }

	function get_o_ob_list(){
	    // Check Session
	    $this->checkSession();
			// $idOpd use for select all OPD
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_ob();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_gen_med() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page

            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_gen_med";
            $data['rediTitle'] = $this->Lang('o_gen_med');
            $data['jq_get_list'] = "get_o_gen_med_list";
            $this->VisitorModel->setO_gen_med();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_gen_med_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_gen_med();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_servical_cancer_screening() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_servical_cancer_screening";
            $data['rediTitle'] = $this->Lang('o_servical_cancer_screening');
            $data['jq_get_list'] = "get_o_servical_cancer_screening_list";
            $this->VisitorModel->setO_servical_cancer_screening();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_servical_cancer_screening_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_servical_cancer_screening();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_cardio() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_cardio";
            $data['rediTitle'] = $this->Lang('o_cardio');
            $data['jq_get_list'] = "get_o_cardio_list";
            $this->VisitorModel->setO_cardio();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_cardio_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_cardio();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_eye() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_eye";
            $data['rediTitle'] = $this->Lang('o_eye');
            $data['jq_get_list'] = "get_o_eye_list";
            $this->VisitorModel->setO_eye();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_eye_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_eye();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_pulmonaire() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_pulmonaire";
            $data['rediTitle'] = $this->Lang('o_pulmonaire');
            $data['jq_get_list'] = "get_o_pulmonaire_list";
            $this->VisitorModel->setO_pulmonaire();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_pulmonaire_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_pulmonaire();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_trauma() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_trauma";
            $data['rediTitle'] = $this->Lang('o_trauma');
            $data['jq_get_list'] = "get_o_trauma_list";
            $this->VisitorModel->setO_trauma();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_trauma_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_trauma();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_renal() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_renal";
            $data['rediTitle'] = $this->Lang('o_renal');
            $data['jq_get_list'] = "get_o_renal_list";
            $this->VisitorModel->setO_renal();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_renal_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_renal();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_maternity() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_maternity";
            $data['rediTitle'] = $this->Lang('o_maternity');
            $data['jq_get_list'] = "get_o_maternity_list";
            $this->VisitorModel->setO_maternity();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_maternity_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_maternity();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_medicine() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_medicine";
            $data['rediTitle'] = $this->Lang('o_medicine');
            $data['jq_get_list'] = "get_o_medicine_list";
            $this->VisitorModel->setO_medicine();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_medicine_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_medicine();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	public function o_gyn() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_gyn";
            $data['rediTitle'] = $this->Lang('o_gyn');
            $data['jq_get_list'] = "get_o_gyn_list";
            $this->VisitorModel->setO_gyn();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_gyn_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_gyn();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_surgery() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_surgery";
            $data['rediTitle'] = $this->Lang('o_surgery');
            $data['jq_get_list'] = "get_o_surgery_list";
            $this->VisitorModel->setO_surgery();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_surgery_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_surgery();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_infertility() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_infertility";
            $data['rediTitle'] = $this->Lang('o_infertility');
            $data['jq_get_list'] = "get_o_infertility_list";
            $this->VisitorModel->setO_infertility();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_infertility_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_infertility();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_orl() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_orl";
            $data['rediTitle'] = $this->Lang('o_orl');
            $data['jq_get_list'] = "get_o_orl_list";
            $this->VisitorModel->setO_orl();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_orl_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_orl();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_ent() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_ent";
            $data['rediTitle'] = $this->Lang('o_ent');
            $data['jq_get_list'] = "get_o_ent_list";
            $this->VisitorModel->setO_ent();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_ent_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_ent();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_dermatology() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_dermatology";
            $data['rediTitle'] = $this->Lang('o_dermatology');
            $data['jq_get_list'] = "get_o_dermatology_list";
            $this->VisitorModel->setO_dermatology();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_dermatology_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_dermatology();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_bone() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_bone";
            $data['rediTitle'] = $this->Lang('o_bone');
            $data['jq_get_list'] = "get_o_bone_list";
            $this->VisitorModel->setO_bone();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_bone_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_bone();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	public function o_digestive() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_digestive";
            $data['rediTitle'] = $this->Lang('o_digestive');
            $data['jq_get_list'] = "get_o_digestive_list";
            $this->VisitorModel->setO_digestive();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_digestive_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_digestive();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	public function o_cardiaque() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_cardiaque";
            $data['rediTitle'] = $this->Lang('o_cardiaque');
            $data['jq_get_list'] = "get_o_cardiaque_list";
            $this->VisitorModel->setO_cardiaque();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_cardiaque_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_cardiaque();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	public function o_opd_others() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_opd_others";
            $data['rediTitle'] = $this->Lang('o_opd_others');
            $data['jq_get_list'] = "get_o_opd_others_list";
            $this->VisitorModel->setO_opd_others();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_opd_others_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_opd_others();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	public function o_cancer() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "o_cancer";
            $data['rediTitle'] = $this->Lang('o_cancer');
            $data['jq_get_list'] = "get_o_cancer_list";
            $this->VisitorModel->setO_cancer();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_o_cancer_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setO_cancer();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
// adult
	function parmacy() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "parmacy";
            $data['rediTitle'] = $this->Lang('parmacy');
            $data['jq_get_list'] = "get_parmacy_list";
            $this->VisitorModel->setParmacy();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_parmacy_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setParmacy();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function echo_ovaries() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "echo_ovaries";
            $data['rediTitle'] = $this->Lang('echo_ovaries');
            $data['jq_get_list'] = "get_echo_ovaries_list";
            $this->VisitorModel->setEcho_ovaries();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_echo_ovaries_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEcho_ovaries();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function echoMaternity() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "echoMaternity";
            $data['rediTitle'] = $this->Lang('echoMaternity');
            $data['jq_get_list'] = "get_echoMaternity_list";
            $this->VisitorModel->setEchoMaternity();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_echoMaternity_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEchoMaternity();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function obExamine() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "obExamine";
            $data['rediTitle'] = $this->Lang('obExamine');
            $data['jq_get_list'] = "get_obExamine_list";
            $this->VisitorModel->setObExamine();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_obExamine_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setObExamine();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function echoOther() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "echoOther";
            $data['rediTitle'] = $this->Lang('echoOther');
            $data['jq_get_list'] = "get_echoOther_list";
            $this->VisitorModel->setEchoOther();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_echoOther_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEchoOther();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function anc() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "anc";
            $data['rediTitle'] = $this->Lang('anc');
            $data['jq_get_list'] = "get_anc_list";
            $this->VisitorModel->setAnc();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_anc_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setAnc();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function ivg() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "ivg";
            $data['rediTitle'] = $this->Lang('ivg');
            $data['jq_get_list'] = "get_ivg_list";
            $this->VisitorModel->setIvg();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_ivg_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setIvg();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function perine() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "perine";
            $data['rediTitle'] = $this->Lang('perine');
            $data['jq_get_list'] = "get_perine_list";
            $this->VisitorModel->setPerine();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_perine_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPerine();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
// ##############
// support service
// ##############
	function labo() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "labo";
            $data['rediTitle'] = $this->Lang('labo');
            $data['jq_get_list'] = "get_labo_list";
            $this->VisitorModel->setLabo();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_labo_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setLabo();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function xray() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "xray";
            $data['rediTitle'] = $this->Lang('xray');
            $data['jq_get_list'] = "get_xray_list";
            $this->VisitorModel->setXray();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_xray_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setXray();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function ctscan() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "ctscan";
            $data['rediTitle'] = $this->Lang('ctscan');
            $data['jq_get_list'] = "get_ctscan_list";
            $this->VisitorModel->setCtscan();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_ctscan_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setCtscan();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function anapat() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "anapat";
            $data['rediTitle'] = $this->Lang('anapat');
            $data['jq_get_list'] = "get_anapat_list";
            $this->VisitorModel->setAnapat();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_anapat_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setAnapat();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function hpv() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "hpv";
            $data['rediTitle'] = $this->Lang('hpv');
            $data['jq_get_list'] = "get_hpv_list";
            $this->VisitorModel->setHpv();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_hpv_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setHpv();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function colpo() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "colpo";
            $data['rediTitle'] = $this->Lang('colpo');
            $data['jq_get_list'] = "get_colpo_list";
            $this->VisitorModel->setColpo();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_colpo_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setColpo();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function thinprep() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "thinprep";
            $data['rediTitle'] = $this->Lang('thinprep');
            $data['jq_get_list'] = "get_thinprep_list";
            $this->VisitorModel->setThinprep();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_thinprep_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setThinprep();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}


	function papsmear() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "papsmear";
            $data['rediTitle'] = $this->Lang('papsmear');
            $data['jq_get_list'] = "get_papsmear_list";
            $this->VisitorModel->setPapsmear();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_papsmear_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPapsmear();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function x_ray_overay() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "x_ray_overay";
            $data['rediTitle'] = $this->Lang('x_ray_overay');
            $data['jq_get_list'] = "get_x_ray_overay_list";
            $this->VisitorModel->setX_ray_overay();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_x_ray_overay_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setX_ray_overay();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function dna() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "dna";
            $data['rediTitle'] = $this->Lang('dna');
            $data['jq_get_list'] = "get_dna_list";
            $this->VisitorModel->setDna();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_dna_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setDna();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function ecg() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "ecg";
            $data['rediTitle'] = $this->Lang('ecg');
            $data['jq_get_list'] = "get_ecg_list";
            $this->VisitorModel->setEcg();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_ecg_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEcg();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function gastro_endoscopy() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "gastro_endoscopy";
            $data['rediTitle'] = $this->Lang('gastro_endoscopy');
            $data['jq_get_list'] = "get_gastro_endoscopy_list";
            $this->VisitorModel->setGastro_endoscopy();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_gastro_endoscopy_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setGastro_endoscopy();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function other_support_service() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "other_support_service";
            $data['rediTitle'] = $this->Lang('other_support_service');
            $data['jq_get_list'] = "get_other_support_service_list";
            $this->VisitorModel->setOther_support_service();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_other_support_service_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setOther_support_service();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	// ##############
	// ECHO
	// ##############
	function echo_anc() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "echo_anc";
            $data['rediTitle'] = $this->Lang('echo_anc');
            $data['jq_get_list'] = "get_echo_anc_list";
            $this->VisitorModel->setEcho_anc();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_echo_anc_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEcho_anc();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function echo_neo_cardio() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "echo_neo_cardio";
            $data['rediTitle'] = $this->Lang('echo_neo_cardio');
            $data['jq_get_list'] = "get_echo_neo_cardio_list";
            $this->VisitorModel->setEcho_neo_cardio();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_echo_neo_cardio_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setEcho_neo_cardio();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function other_adult_echo() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "other_adult_echo";
            $data['rediTitle'] = $this->Lang('other_adult_echo');
            $data['jq_get_list'] = "get_other_adult_echo_list";
            $this->VisitorModel->setOther_adult_echo();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_other_adult_echo_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setOther_adult_echo();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	// ##############
	// SERVICE
	// ##############
	function s_examen() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_examen";
            $data['rediTitle'] = $this->Lang('s_examen');
            $data['jq_get_list'] = "get_s_examen_list";
            $this->VisitorModel->setS_examen();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_examen_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_examen();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function s_perine() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_perine";
            $data['rediTitle'] = $this->Lang('s_perine');
            $data['jq_get_list'] = "get_s_perine_list";
            $this->VisitorModel->setS_perine();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_perine_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_perine();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function s_ivg_igm() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_ivg_igm";
            $data['rediTitle'] = $this->Lang('s_ivg_igm');
            $data['jq_get_list'] = "get_s_ivg_igm_list";
            $this->VisitorModel->setS_ivg_igm();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_ivg_igm_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_ivg_igm();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function s_anc_cpn() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_anc_cpn";
            $data['rediTitle'] = $this->Lang('s_anc_cpn');
            $data['jq_get_list'] = "get_s_anc_cpn_list";
            $this->VisitorModel->setS_anc_cpn();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_anc_cpn_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_anc_cpn();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function s_miscarrage() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_miscarrage";
            $data['rediTitle'] = $this->Lang('s_miscarrage');
            $data['jq_get_list'] = "get_s_miscarrage_list";
            $this->VisitorModel->setS_miscarrage();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_miscarrage_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_miscarrage();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function s_medicine_abortion() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_medicine_abortion";
            $data['rediTitle'] = $this->Lang('s_medicine_abortion');
            $data['jq_get_list'] = "get_s_medicine_abortion_list";
            $this->VisitorModel->setS_medicine_abortion();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_medicine_abortion_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_medicine_abortion();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function s_vpi_vaccination() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_vpi_vaccination";
            $data['rediTitle'] = $this->Lang('s_vpi_vaccination');
            $data['jq_get_list'] = "get_s_vpi_vaccination_list";
            $this->VisitorModel->setS_vpi_vaccination();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_vpi_vaccination_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_vpi_vaccination();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function s_neo_labo() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_neo_labo";
            $data['rediTitle'] = $this->Lang('s_neo_labo');
            $data['jq_get_list'] = "get_s_neo_labo_list";
            $this->VisitorModel->setS_neo_labo();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_neo_labo_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_neo_labo();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	function s_bone_test() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "s_bone_test";
            $data['rediTitle'] = $this->Lang('s_bone_test');
            $data['jq_get_list'] = "get_s_bone_test_list";
            $this->VisitorModel->setS_bone_test();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_s_bone_test_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setS_bone_test();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	// ##############
	// Pharmacy
	// ##############
	function p_pharmacy() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "p_pharmacy";
            $data['rediTitle'] = $this->Lang('p_pharmacy');
            $data['jq_get_list'] = "get_p_pharmacy_list";
            $this->VisitorModel->setP_pharmacy();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_p_pharmacy_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setP_pharmacy();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	// ##############
	// Peditric
	// ##############
	function pe_opd_ped() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "pe_opd_ped";
            $data['rediTitle'] = $this->Lang('pe_opd_ped');
            $data['jq_get_list'] = "get_pe_opd_ped_list";
            $this->VisitorModel->setPe_opd_ped();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_pe_opd_ped_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPe_opd_ped();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function pe_ped_ipd() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "pe_ped_ipd";
            $data['rediTitle'] = $this->Lang('pe_ped_ipd');
            $data['jq_get_list'] = "get_pe_ped_ipd_list";
            $this->VisitorModel->setPe_ped_ipd();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_pe_ped_ipd_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPe_ped_ipd();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function pe_ped_frencectomy() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "pe_ped_frencectomy";
            $data['rediTitle'] = $this->Lang('pe_ped_frencectomy');
            $data['jq_get_list'] = "get_pe_ped_frencectomy_list";
            $this->VisitorModel->setPe_ped_frencectomy();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_pe_ped_frencectomy_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPe_ped_frencectomy();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function pe_ped_circumcision() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "pe_ped_circumcision";
            $data['rediTitle'] = $this->Lang('pe_ped_circumcision');
            $data['jq_get_list'] = "get_pe_ped_circumcision_list";
            $this->VisitorModel->setPe_ped_circumcision();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_pe_ped_circumcision_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setPe_ped_circumcision();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}



	// ##############
	// Neo
	// ##############
	function p_checkNeo() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "p_checkNeo";
            $data['rediTitle'] = $this->Lang('p_checkNeo');
            $data['jq_get_list'] = "get_p_checkNeo_list";
            $this->VisitorModel->setP_checkNeo();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_p_checkNeo_list(){
	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setP_checkNeo();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function p_chNeoOpd() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();
            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();
            // Get Count All Visitor
            $data['rediUrl'] = "p_chNeoOpd";
            $data['rediTitle'] = $this->Lang('p_chNeoOpd');
            $data['jq_get_list'] = "get_p_chNeoOpd_list";
            $this->VisitorModel->setP_chNeoOpd();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();
            // Get Translate Word to View
            $data = $this->getTranslate($data);
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_p_chNeoOpd_list(){
	    // Check Session
	    $this->checkSession();
			$neoOnly = 0;

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setP_chNeoOpd();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd($neoOnly);
	    $this->restData($datas);
	}

	// function p_chNeoEcho() {
	//     // Check Session
	//     $this->checkSession();
	//        // $this->permissionSection('mDiagnosticOb');
	//        // $this->checkPermission();

	//     	$this->setSession('assign_to', $this->getSession('user_id'));
	//            $data = array();

	//            // Get Item Per Page
	//            $data['item_per_page'] = $this->getSysConfig();

	//            // Get Count All Visitor
	//            $data['rediUrl'] = "p_chNeoEcho";
	//            $data['rediTitle'] = $this->Lang('p_chNeoEcho');
	//            $data['jq_get_list'] = "get_p_chNeoEcho_list";
	//            $this->VisitorModel->setP_chNeoEcho();
	//            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

	//            // Get Translate Word to View
	//            $data = $this->getTranslate($data);

	//            // Load View
	//            $this->LoadView('template/header',$data);
	//            $this->LoadView('template/topmenu');
	//            $this->LoadView('template/sidebar');
	//            $this->LoadView('diagnostics/list');
	//            $this->LoadView('template/footer');
	//    }

	// function get_p_chNeoEcho_list(){
	//     // Check Session
	//     $this->checkSession();

	//     $this->VisitorModel->setSearch($this->getPost('search_data'));
	//     $this->VisitorModel->setP_chNeoEcho();
	//     $this->VisitorModel->setStart('0');
	//     $this->VisitorModel->setLimit('0');
	//     $datas = $this->VisitorModel->getAllVisitorOpd();
	//     $this->restData($datas);
	// }
	// function p_chNeoLabo() {
	//     // Check Session
	//     $this->checkSession();
 //        // $this->permissionSection('mDiagnosticOb');
 //        // $this->checkPermission();

	//     	$this->setSession('assign_to', $this->getSession('user_id'));
 //            $data = array();

 //            // Get Item Per Page
 //            $data['item_per_page'] = $this->getSysConfig();

 //            // Get Count All Visitor
 //            $data['rediUrl'] = "p_chNeoLabo";
 //            $data['rediTitle'] = $this->Lang('p_chNeoLabo');
 //            $data['jq_get_list'] = "get_p_chNeoLabo_list";
 //            $this->VisitorModel->setP_chNeoLabo();
 //            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

 //            // Get Translate Word to View
 //            $data = $this->getTranslate($data);

 //            // Load View
 //            $this->LoadView('template/header',$data);
 //            $this->LoadView('template/topmenu');
 //            $this->LoadView('template/sidebar');
 //            $this->LoadView('diagnostics/list');
 //            $this->LoadView('template/footer');
 //    }

	// function get_p_chNeoLabo_list(){
	//     // Check Session
	//     $this->checkSession();

	//     $this->VisitorModel->setSearch($this->getPost('search_data'));
	//     $this->VisitorModel->setP_chNeoLabo();
	//     $this->VisitorModel->setStart('0');
	//     $this->VisitorModel->setLimit('0');
	//     $datas = $this->VisitorModel->getAllVisitorOpd();
	//     $this->restData($datas);
	// }

	// function p_pediaOPD() {
	//     // Check Session
	//     $this->checkSession();
 //        // $this->permissionSection('mDiagnosticOb');
 //        // $this->checkPermission();

	//     	$this->setSession('assign_to', $this->getSession('user_id'));
 //            $data = array();

 //            // Get Item Per Page
 //            $data['item_per_page'] = $this->getSysConfig();

 //            // Get Count All Visitor
 //            $data['rediUrl'] = "p_pediaOPD";
 //            $data['rediTitle'] = $this->Lang('p_pediaOPD');
 //            $data['jq_get_list'] = "get_p_pediaOPD_list";
 //            $this->VisitorModel->setP_pediaOPD();
 //            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

 //            // Get Translate Word to View
 //            $data = $this->getTranslate($data);

 //            // Load View
 //            $this->LoadView('template/header',$data);
 //            $this->LoadView('template/topmenu');
 //            $this->LoadView('template/sidebar');
 //            $this->LoadView('diagnostics/list');
 //            $this->LoadView('template/footer');
 //    }

	// function get_p_pediaOPD_list(){
	//     // Check Session
	//     $this->checkSession();

	//     $this->VisitorModel->setSearch($this->getPost('search_data'));
	//     $this->VisitorModel->setP_pediaOPD();
	//     $this->VisitorModel->setStart('0');
	//     $this->VisitorModel->setLimit('0');
	//     $datas = $this->VisitorModel->getAllVisitorOpd();
	//     $this->restData($datas);
	// }

	// function p_pediaIPD() {
	//     // Check Session
	//     $this->checkSession();
 //        // $this->permissionSection('mDiagnosticOb');
 //        // $this->checkPermission();

	//     	$this->setSession('assign_to', $this->getSession('user_id'));
 //            $data = array();

 //            // Get Item Per Page
 //            $data['item_per_page'] = $this->getSysConfig();

 //            // Get Count All Visitor
 //            $data['rediUrl'] = "p_pediaIPD";
 //            $data['rediTitle'] = $this->Lang('p_pediaIPD');
 //            $data['jq_get_list'] = "get_p_pediaIPD_list";
 //            $this->VisitorModel->setP_pediaIPD();
 //            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

 //            // Get Translate Word to View
 //            $data = $this->getTranslate($data);

 //            // Load View
 //            $this->LoadView('template/header',$data);
 //            $this->LoadView('template/topmenu');
 //            $this->LoadView('template/sidebar');
 //            $this->LoadView('diagnostics/list');
 //            $this->LoadView('template/footer');
 //    }

	// function get_p_pediaIPD_list(){
	//     // Check Session
	//     $this->checkSession();

	//     $this->VisitorModel->setSearch($this->getPost('search_data'));
	//     $this->VisitorModel->setP_pediaIPD();
	//     $this->VisitorModel->setStart('0');
	//     $this->VisitorModel->setLimit('0');
	//     $datas = $this->VisitorModel->getAllVisitorOpd();
	//     $this->restData($datas);
	// }

	// ##############
	// Neo
	// ##############
	function b_opd_booking() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "b_opd_booking";
            $data['rediTitle'] = $this->Lang('b_opd_booking');
            $data['jq_get_list'] = "get_b_opd_booking_list";
            $this->VisitorModel->setB_opd_booking();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_b_opd_booking_list(){
	    // Check Session
	    $this->checkSession();

			$this->VisitorModel->setCheckId('1');
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setB_opd_booking();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}
	function b_ipd_booking() {
	    // Check Session
	    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();

	    	$this->setSession('assign_to', $this->getSession('user_id'));
            $data = array();

            // Get Item Per Page
            $data['item_per_page'] = $this->getSysConfig();

            // Get Count All Visitor
            $data['rediUrl'] = "b_ipd_booking";
            $data['rediTitle'] = $this->Lang('b_ipd_booking');
            $data['jq_get_list'] = "get_b_ipd_booking_list";
            $this->VisitorModel->setB_ipd_booking();
            $data['totals'] = $this->VisitorModel->getCountVisitorOpd();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('diagnostics/list');
            $this->LoadView('template/footer');
    }

	function get_b_ipd_booking_list(){
	    // Check Session
	    $this->checkSession();
			$this->VisitorModel->setCheckId('1');
	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setB_ipd_booking();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd();
	    $this->restData($datas);
	}

	// ##############
	// Neonatal Gold
	// ##############
	function n_chNeoOpd() {
		    // Check Session
		    $this->checkSession();
        // $this->permissionSection('mDiagnosticOb');
        // $this->checkPermission();
	    	$this->setSession('assign_to', $this->getSession('user_id'));
        $data = array();
        // Get Item Per Page
        $data['item_per_page'] = $this->getSysConfig();
        // Get Count All Visitor
        $data['rediUrl'] = "n_chNeoOpd";
        $data['rediTitle'] = $this->Lang('p_chNeoOpd');
        $data['jq_get_list'] = "get_n_chNeoOpd_list";
        $this->VisitorModel->setVisitorEnrol();
        $neoOnly = '1';
        $data['totals'] = $this->VisitorModel->getCountVisitorOpd($neoOnly);

        // Get Translate Word to View
        $data = $this->getTranslate($data);

        // Load View
        $this->LoadView('template/header',$data);
        $this->LoadView('template/topmenu');
        $this->LoadView('template/sidebar');
        $this->LoadView('diagnostics/list');
        $this->LoadView('template/footer');
  }

	function get_n_chNeoOpd_list(){
	    // Check Session
	    $this->checkSession();
      $neoOnly = '1';

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
	    $this->VisitorModel->setVisitorEnrol();
	    $this->VisitorModel->setStart('0');
	    $this->VisitorModel->setLimit('0');
	    $datas = $this->VisitorModel->getAllVisitorOpd($neoOnly);
	    $this->restData($datas);
	}

}
?>
