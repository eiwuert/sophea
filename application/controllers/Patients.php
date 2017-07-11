<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Patient
class Patients extends Securities {

	// Define Index of Patient Fucntion
	public function index() {
	    // Check Session
	    $this->checkSession();
		$data = array();
			// Menu Active
		$data['ac_patients'] = 'active';

        // Get Item Per Page
	    $data['item_per_page'] = $this->getSysConfig();

	    // Get Count All Product
	    $data['totals'] = $this->PatientModel->getCountPatient();

        // Define Gender Cambo
	    $data['genderCambo'][0] = "Female";
	    $data['genderCambo'][1] = "Male";
            // Define Status Cambo
	    $data['statusCambo'][0] = "Sigle";
	    $data['statusCambo'][1] = "Married";
    	$this->WorkstationModel->setStart(0);
    	$this->WorkstationModel->setLimit(0);
    	$query_workstation = $this->WorkstationModel->getAllWorkstation();
    	$data['drop_workshop'] = $this->queryDropDownMenu($query_workstation,$label_id='0',$label_name='-- --',$id='workstation_id',$value='workstation_name',$value2='');

    	// generate for code waitting
    	$data['generate_num_waitting'] = $this->WaittingModel->genNumber();
        // waitting Form
        $this->RoomModel->setStart(0);
        $this->RoomModel->setLimit(0);
        $query_room = $this->RoomModel->getAllRoom();
        $data['drop_room'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='-- --',$id='room_id',$value='room_name',$value2='');

        $this->WardModel->setStart(0);
        $this->WardModel->setLimit(0);
        $query_ward = $this->WardModel->getAllWard();
        $data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='0',$label_name='-- --',$id='wards_id',$value='wards_desc',$value2='');

        $this->WardModel->setStart(0);
        $this->WardModel->setLimit(0);
        $query_user = $this->UserModel->getAllUser();
        $data['drop_user'] = $this->queryDropDownMenu($query_user,$label_id='0',$label_name='-- --',$id='uid',$value='name',$value2='');

//        $data['born_on'] = array('y' => 'Year','m' => 'Month','d'=>'Day');

            // Get Translate Word to View
            $data = $this->getTranslate($data);
            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/list');
            $this->LoadView('template/footer');
        }

        // Upload File
	public function photo() {

	    // Check Session
	    $this->checkSession();

            $data = array();

            if(is_dir($this->getBasePath().'/photos/'.$this->getUrlSegment3()) == FALSE){
                mkdir($this->getBasePath().'/photos/'.$this->getUrlSegment3(), 0777, true);
            }

            // Menu Active
            $data['ac_patients'] = 'active';
            $data['pid'] = $this->getUrlSegment3();
            $data['photoList'] = scandir($this->getBasePath().'/photos/'.$this->getUrlSegment3());
            $data['photoDir'] = $this->getResources().'/uploads/'.$this->getCompanyId().'/photos/'. $this->getUrlSegment3();

            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/upload');
            $this->LoadView('template/footer');
        }

        public function delphoto(){
            // Check Session
	    $this->checkSession();

            $imgs = explode('_', $this->getUrlSegment3());
            unlink($this->getBasePath().'/photos/'.$imgs[0].'/'.$imgs[1]);
            redirect('patients/photo/'.$imgs[0]);
        }
        // Upload File
	public function upload() {

	    // Check Session
	    $this->checkSession();
            $upload_path = $this->getBasePath().'photos/';

            move_uploaded_file($_FILES["userfile"]["tmp_name"], $upload_path.$this->getUrlSegment3().'/'.$this->getCurrentDatetimeString().'.png');

            redirect('patients/photo/'.$this->getUrlSegment3());

        }

	// Define Index of Unit Fucntion
	public function visited() {

	    // Check Session
	    $this->checkSession();

            $data = array();
	        // Get Item Per Page
		    $data['item_per_page'] = $this->getSysConfig();

		    // Get Count All Product
		    $data['totals'] = $this->PatientModel->getCountAllPatientView();


            // Menu Active
            $data['ac_viewall'] = 'active';

            // Define Gender Cambo
		    $data['genderCambo'][0] = "Female";
		    $data['genderCambo'][1] = "Male";

	            // Define Status Cambo
		    $data['statusCambo'][0] = "Sigle";
		    $data['statusCambo'][1] = "Married";

	    	$this->WorkstationModel->setStart(0);
	    	$this->WorkstationModel->setLimit(0);
	    	$query_workstation = $this->WorkstationModel->getAllWorkstation();
	    	$data['drop_workshop'] = $this->queryDropDownMenu($query_workstation,$label_id='0',$label_name='-- --',$id='workstation_id',$value='workstation_name',$value2='');

                // Get Translate Word to View
                $data = $this->getTranslate($data);
    		// waitting Form
    		$data['generate_num_waitting'] = $this->WaittingModel->genNumber();

	        $this->RoomModel->setStart(0);
	        $this->RoomModel->setLimit(0);
	        $query_room = $this->RoomModel->getAllRoom();
	        $data['drop_room'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='-- --',$id='room_id',$value='room_name',$value2='');

	        $this->WardModel->setStart(0);
	        $this->WardModel->setLimit(0);
	        $query_ward = $this->WardModel->getAllWard();
	        $data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='0',$label_name='-- --',$id='wards_id',$value='wards_desc',$value2='');

	        $this->WardModel->setStart(0);
	        $this->WardModel->setLimit(0);
	        $query_user = $this->UserModel->getAllUser();
	        $data['drop_user'] = $this->queryDropDownMenu($query_user,$label_id='0',$label_name='-- --',$id='uid',$value='name',$value2='');



            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('patients/list_visited');
            $this->LoadView('template/footer');
        }

        function save_patient(){
						// Check Session
						$this->checkSession();

		        $this->PatientModel->setId($this->getPost('patient_id'));
		        $this->PatientModel->setCheckNeo($this->getPost('checkNeo'));
						$this->PatientModel->setPatientKhName($this->getPost('patient_kh_name'));
						$this->PatientModel->setPatientEnName($this->getPost('patient_en_name'));
						$this->PatientModel->setPatientDob(date('Y-m-d',strtotime($this->getPost('patient_dob'))));
						$this->PatientModel->setPhone($this->getPost('patient_phone'));
						$this->PatientModel->setEmergencyPhone($this->getPost('emegency_phone'));
						$this->PatientModel->setPatientOccupation($this->getPost('patient_occupation'));
						$this->PatientModel->setAddress($this->getPost('patient_address'));
						$this->PatientModel->setIdCard($this->getPost('id_card'));
						$this->PatientModel->setAssuranceCard($this->getPost('assurance_card'));
						$this->PatientModel->setAssuranceCompany($this->getPost('assurance_company'));
						$this->PatientModel->setMotorCard($this->getPost('motor_card'));
						$this->PatientModel->setCarCard($this->getPost('car_card'));
						$this->PatientModel->setBankCard1($this->getPost('bank_card1'));
						$this->PatientModel->setBankCard2($this->getPost('bank_card2'));
						$this->PatientModel->setStudentSchool($this->getPost('student_card'));
						$this->PatientModel->setPatientStatus($this->getPost('status_id'));
						$this->PatientModel->setOtherDisease($this->getPost('other_disease'));
						$this->PatientModel->setDesc($this->getPost('history'));

						$this->PatientModel->setDateIn(date('Y-m-d',strtotime($this->getPost('patient_date_in'))));
						$this->PatientModel->setReferFrom($this->getPost('patient_refer_from'));
						$this->PatientModel->setNssf($this->getPost('nssf'));
						$this->PatientModel->setWorkstation($this->getPost('workstation_id'));

						$this->PatientModel->setNssfCode($this->getPost('nssf_code'));
						$this->PatientModel->setInsuranceCode($this->getPost('insurance_code'));
						$this->PatientModel->setIdPoorCode($this->getPost('id_poor_code'));

						$this->PatientModel->setDistrict($this->getPost('patient_district'));
						$this->PatientModel->setProvince($this->getPost('patient_province'));

						$this->PatientModel->setPulseRate($this->getPost('pulse'));
						$this->PatientModel->setHeartRate($this->getPost('heart'));
						$this->PatientModel->setBloodPressure($this->getPost('blood_pressure'));
						$this->PatientModel->setRespiratoryRate($this->getPost('respiratory'));
						$this->PatientModel->setTemperature($this->getPost('temperature'));

						$this->PatientModel->setPatientStatus($this->getPost('status_id'));
						// waitting
			   		$this->WaittingModel->setId($this->getPost('waitting_id'));
		     		$this->WaittingModel->setWaittingOpen($this->getPost('waitting_open'));
			    	$this->WaittingModel->setCode($this->getPost('waitting_code'));
		     		$this->WaittingModel->setExamination($this->getPost('waitting_examination'));
			    	$this->WaittingModel->setRoomId($this->getPost('room_id'));
		     		$this->WaittingModel->setDoctor($this->getPost('waitting_doctor'));

		if($this->getPost('pregnancy') == '1'){
			$this->PatientModel->setPregnancy('1');
		}

		if($this->getPost('pre_pregnancy') == '1'){
			$this->PatientModel->setPrePregnancy('1');
		}

		if($this->getPost('breast_feeding') == '1'){
			$this->PatientModel->setBreastFeeding('1');
		}

		if($this->getPost('gender_id') == '0'){
			$this->PatientModel->setPatientGender('f');
		}else{
			$this->PatientModel->setPatientGender('m');
		}

		if($this->getPost('is_heart') == '1'){
			$this->PatientModel->setIsHeart('1');
		}

		if($this->getPost('is_diabetes') == '1'){
			$this->PatientModel->setIsDiabetes('1');
		}

		if($this->getPost('is_respiratory') == '1'){
			$this->PatientModel->setIsRespiratory('1');
		}

		if($this->getPost('is_digestive') == '1'){
			$this->PatientModel->setIsDisgestive('1');
		}
		if($this->getPost('is_kidney') == '1'){
			$this->PatientModel->setIsKidney('1');
		}

		if($this->getPost('is_endocrine') == '1'){
			$this->PatientModel->setIsEndocrine('1');
		}

		if($this->getPost('is_neuro_sys') == '1'){
			$this->PatientModel->setIsNeuroSys('1');
		}

		if($this->getPost('is_lung') == '1'){
			$this->PatientModel->setIsLung('1');
		}
		if($this->getPost('is_aap') == '1'){
			$this->PatientModel->setIsAllergy('1');
		}

		if($this->getPost('insurance') == '1'){
			$this->PatientModel->setInsurance($this->getPost('insurance'));
		}

		if($this->getPost('id_poor') == '1'){
		    $this->PatientModel->setIdPoor($this->getPost('id_poor'));
		}

		if($this->getPost('patient_id') == NULL || $this->getPost('patient_id') == ""){
			$newPatientCode = $this->PatientModel->genPatientNo();
			$this->PatientModel->setPatientCode($newPatientCode);
			$this->PatientModel->add();

			// Update all Ref No
			$this->PatientModel->updateRef();
			$this->VisitorModel->setCode($newPatientCode);
			$this->getInsertIntoVisitor($this->PatientModel->getPatientIdByCode());
		}else{
			$this->PatientModel->update();
			$this->VisitorModel->setCode($this->getPost('patient_code'));
			$this->getInsertIntoVisitor($this->getPost('patient_id'));
		}

		if($this->getPost('waitting_id') == NULL || $this->getPost('waitting_id') == ""){
			if(!empty($this->PatientModel->getPatientIdByCode())){
				$wPatientId = $this->PatientModel->getPatientIdByCode();
			}else{
				$wPatientId = $this->getPost('patient_id');
			}
			$this->WaittingModel->setPatientId($wPatientId);
			$this->WaittingModel->setDate(date("Y-m-d"));
	    	$this->WaittingModel->add();
    	}else{
    		$this->WaittingModel->setPatientId($this->getPost('patient_id'));
	    	$this->WaittingModel->update();
    	}

		// Check If While Insert Duplicate Code
		/*if ($count_code > 0) {
			redirect ( 'patients/edit/' . $id );
		}*/
        // Write Log
        //$this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));

	}

	function getInsertIntoVisitor($getPid){
			$this->VisitorModel->setPatientId($getPid);
				// #######
				// Adult OPD IPD
				// #######

				if($this->getPost('opd') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setVisitorEnrol();
					$this->VisitorModel->add();
					// redirect('opds');
				}

						if($this->getPost('o_opd_ob') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_ob();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_opd_gen_med') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_gen_med();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_servical_cancer_screening') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_servical_cancer_screening();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_cardio') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_cardio();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_eye') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_eye();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_pulmonaire') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_pulmonaire();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_trauma') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_trauma();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_renal') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_renal();
							$this->VisitorModel->add();
							// redirect('opd');
						}
						if($this->getPost('o_maternity') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_maternity();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_medicine') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_medicine();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_gyn') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_gyn();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_surgery') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_surgery();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_infertility') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_infertility();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_orl') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_orl();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_ent') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_ent();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_dermatology') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_dermatology();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_bone') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_bone();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_digestive') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_digestive();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_cardiaque') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_cardiaque();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_opd_others') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_opd_others();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('o_icu') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setO_icu();
							$this->VisitorModel->add();
							// redirect('opds');
						}
				if($this->getPost('ipd') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setVisitorStay();
					$this->VisitorModel->add();
					//    redirect('ipds');
				}
						if($this->getPost('i_delivery_normal') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_delivery_normal();
							$this->VisitorModel->add();
							// redirect('opds');
						}

						if($this->getPost('i_c_section') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_c_section();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_delivery_complication') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_delivery_complication();
							$this->VisitorModel->add();
							// redirect('opds');
						}

						if($this->getPost('i_general_med') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_general_med();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_general_surgery') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_general_surgery();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_eye') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_eye();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_trauma') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_trauma();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_pulmonaire') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_pulmonaire();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_renal') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_renal();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_icu') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_icu();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_icu_ob') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_icu_ob();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_maternity') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_maternity();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_medicine') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_medicine();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_gyn') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_gyn();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_surgery') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_surgery();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_infertility') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_infertility();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_orl') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_orl();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_ent') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_ent();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_dermatology') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_dermatology();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_bone') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_bone();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_digestive') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_digestive();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_cardiaque') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_cardiaque();
							$this->VisitorModel->add();
							// redirect('opds');
						}
						if($this->getPost('i_ipd_others') == 1){
							$this->logs('3',$this->PatientModel->getPatientIdByCode());
							$this->VisitorModel->setI_ipd_others();
							$this->VisitorModel->add();
							// redirect('opds');
						}

				// #######
				// Support SERVICE
				// #######
				if($this->getPost('labo') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setLabo();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('xray') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setXray();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('ctscan') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setCtscan();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('anapat') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setAnapat();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('hpv') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setHpv();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('colpo') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setColpo();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('thinprep') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setThinprep();
					$this->VisitorModel->add();
					// redirect('opds');
				}
				if($this->getPost('papsmear') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setPapsmear();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('x_ray_overay') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setX_ray_overay();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('dna') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setDna();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('ecg') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setEcg();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('gastro_endoscopy') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setGastro_endoscopy();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('other_support_service') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setOther_support_service();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				// #######
				// ECHO
				// #######
				if($this->getPost('echo_anc') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setEcho_anc();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('echo_neo_cardio') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setEcho_neo_cardio();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				if($this->getPost('other_adult_echo') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setOther_adult_echo();
					$this->VisitorModel->add();
					// redirect('opds');
				}

				// #######
				// Service
				// #######
				if($this->getPost('s_examen') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_examen();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_perine') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_perine();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_ivg_igm') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_ivg_igm();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_anc_cpn') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_anc_cpn();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_miscarrage') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_miscarrage();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_medicine_abortion') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_medicine_abortion();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_vpi_vaccination') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_vpi_vaccination();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_neo_labo') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_neo_labo();
					$this->VisitorModel->add();
				}
				if($this->getPost('s_bone_test') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setS_bone_test();
					$this->VisitorModel->add();
				}

				// #######
				// Pharmacy
				// #######
				if($this->getPost('p_pharmacy') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setP_pharmacy();
					$this->VisitorModel->add();
				}

				// #######
				// Peditric
				// #######
				if($this->getPost('pe_opd_ped') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setPe_opd_ped();
					$this->VisitorModel->add();
				}
				if($this->getPost('pe_ped_ipd') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setPe_ped_ipd();
					$this->VisitorModel->add();
				}
				if($this->getPost('pe_ped_frencectomy') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setPe_ped_frencectomy();
					$this->VisitorModel->add();
				}
				if($this->getPost('pe_ped_circumcision') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setPe_ped_circumcision();
					$this->VisitorModel->add();
				}
				// #######
				// Booking
				// #######
				if($this->getPost('b_opd_booking') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setB_opd_booking();
					$this->VisitorModel->add();
				}
				if($this->getPost('b_ipd_booking') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setB_ipd_booking();
					$this->VisitorModel->add();
				}
				// #######
				// Neo
				// #######
				if($this->getPost('p_checkNeo') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setP_checkNeo();
					$this->VisitorModel->add();
				}
				if($this->getPost('p_chNeoOpd') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setP_chNeoOpd();
					$this->VisitorModel->add();
				}
				if($this->getPost('p_chNeoSimpleIcu') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setP_chNeoSimpleIcu();
					$this->VisitorModel->add();
				}
				if($this->getPost('p_chNeoComplicatedIcu') == 1){
					$this->logs('3',$this->PatientModel->getPatientIdByCode());
					$this->VisitorModel->setP_chNeoComplicatedIcu();
					$this->VisitorModel->add();
				}
				// if($this->getPost('p_chNeoEcho') == 1){
				// 	$this->logs('3',$this->PatientModel->getPatientIdByCode());
				// 	$this->VisitorModel->setP_chNeoEcho();
				// 	$this->VisitorModel->add();
				// }
				// if($this->getPost('p_chNeoLabo') == 1){
				// 	$this->logs('3',$this->PatientModel->getPatientIdByCode());
				// 	$this->VisitorModel->setP_chNeoLabo();
				// 	$this->VisitorModel->add();
				// }
				// if($this->getPost('p_pediaOPD') == 1){
				// 	$this->logs('3',$this->PatientModel->getPatientIdByCode());
				// 	$this->VisitorModel->setP_pediaOPD();
				// 	$this->VisitorModel->add();
				// }
				// if($this->getPost('p_pediaIPD') == 1){
				// 	$this->logs('3',$this->PatientModel->getPatientIdByCode());
				// 	$this->VisitorModel->setP_pediaIPD();
				// 	$this->VisitorModel->add();
				// }
	}
	// Set Neo
	function patient_neo(){
	    // Check Session
	    $this->checkSession();
	    $this->NeonatalModel->setPatientCode($this->getPost('patients_code'));
	    $this->NeonatalModel->setPatientId($this->getUrlSegment3());
	    $this->NeonatalModel->add();
	}
  // Set Visitor Opd
	function patient_pharm(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorPharmacy();
	    $this->VisitorModel->getVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->add();
	}
	// Set Visitor Opd
	function patient_opd(){
	    // Check Session
	    $this->checkSession();
	    // update patient opd checked
	 	// $this->PatientModel->setId($this->getUrlSegment3());
		// $this->PatientModel->updatePatientReady();

		$this->VisitorModel->setCode($this->getPost('patients_code'));
		$this->VisitorModel->setPatientId($this->getPost('patients_id'));
	    // $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorEnrol();
	    $this->VisitorModel->getVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->add();
	}

	// Set Visitor Ipd
	function patient_ipd(){

	    // Check Session
	    $this->checkSession();
	    // update patient ipd checked
	    // $this->PatientModel->setId($this->getUrlSegment3());
	    // $this->PatientModel->updatePatientReady();

	    $this->VisitorModel->setCode($this->getPost('patients_code'));
		$this->VisitorModel->setPatientId($this->getPost('patients_id'));
	    // $this->VisitorModel->setPatientId($this->getUrlSegment3());
	    $this->VisitorModel->setVisitorStayDate($this->getCurrentDatetime());
	    $this->VisitorModel->setVisitorStay();
	    $this->VisitorModel->add();
	}

    function get_patient_list(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch($this->getPost('search_data'));
	    /*$this->PatientModel->setStart($this->getPost('page_start'));
	    $this->PatientModel->setLimit($this->getPost('page_limit'));*/
        $datas = $this->PatientModel->getAllPatient();
        $this->restData($datas);
	}

	function get_patient_visited_list(){

	    // Check Session
	    $this->checkSession();

	    $this->VisitorModel->setSearch($this->getPost('search_data'));
            $this->VisitorModel->setVisitorStatusSearch($this->getPost('ipd').','.$this->getPost('opd').','.$this->getPost('pharm'));
            $datas = $this->VisitorModel->getAllVisited();
            $this->restData($datas);
	}

	// Delete Patients
        function delete_patient(){

	    // Check Session
	    $this->checkSession();

            $this->PatientModel->setId($this->getUrlSegment3());
            $this->PatientModel->delete();

            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Patient From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Patient From List');
        }

	// #################### JSON DATA ####################### //

	function get_count_patient(){
	    // Check Session
	    $this->checkSession();

	    $datas = $this->PatientModel->getCountAllPatient();
	    $this->restData($datas);
	}

	function get_count_patient_view(){
	    // Check Session
	    $this->checkSession();
	    $datas = $this->PatientModel->getCountAllPatientView();
	    $this->restData($datas);
	}

	function get_patient_info_by_id_json(){

	    // Check Session
	    $this->checkSession();
        $this->PatientModel->setId($this->getUrlSegment3());
        $datas = $this->PatientModel->getEditPatientById();
        $this->restData($datas);
	}

	function get_patient_visited(){
			$this->checkSession();
			$this->PatientModel->setId($this->getUrlSegment3());
			$data = $this->PatientModel->getPatientVisitedByPid();
			$this->restData($data);
	}

	function get_patient_watting_byid(){
	    // Check Session
	    $this->checkSession();
	    $this->PatientModel->setId($this->getUrlSegment3());
        $datas = $this->PatientModel->getWaittingPatientById();
        $this->restData($datas);
	}

	function get_patient_id_by_code(){

	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setPatientCode(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getPatientIdByCode();
            $this->restData($datas);
	}

	function occupation_auto_complete(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getSearchByName();
            $this->restData($datas);
	}

	function patient_auto_complete(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setName(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getPatientInfoByName();
            $this->restData($datas);
	}

	function get_patient_json(){
		// Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getPatientInfo();
            $this->restData($datas);
	}

	function district_auto_complete(){
	    // Check Session
	    $this->checkSession();

	    $arr = explode("_", urldecode($this->getUrlSegment3()));

	    $this->PatientModel->setSearch($arr[0]);
	    $this->PatientModel->setId($arr[1]);
	    $datas = $this->PatientModel->getSearchDistrict();
            $this->restData($datas);

	    $this->logs('3', 'Province ID '.$arr[1]);
	}

	function province_auto_complete(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getSearchProvince();
      $this->restData($datas);
	}

	function get_district_json(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getDistrictInfo();
            $this->restData($datas);
	}

	function get_province_json(){
	    // Check Session
	    $this->checkSession();

	    $this->PatientModel->setSearch(urldecode($this->getUrlSegment3()));
	    $datas = $this->PatientModel->getProvinceInfo();
            $this->restData($datas);
	}
	// update room to patient by waitting form
	function updateRoomPatient(){
	    $this->PatientModel->setRoomId($this->getPost('waitting_room'));
	    $this->PatientModel->setId($this->getPost('waitting_patient_id'));
	    $datas = $this->PatientModel->updateRoomPatient();
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
            $data['date'] = $this->Lang('date');
            $data['gender'] = $this->Lang('gender');
            $data['phone'] = $this->Lang('phone');
            $data['address'] = $this->Lang('address');
            $data['khName'] = $this->Lang('kh_name');
            $data['enName'] = $this->Lang('en_name');
            $data['dob'] = $this->Lang('dob');
            $data['date_in'] = $this->Lang('date_in');
            $data['refer_from'] = $this->Lang('refer_from');
            $data['workstation'] = $this->Lang('workstation');
            $data['contact'] = $this->Lang('contact');
            $data['emergencyPhone'] = $this->Lang('em_phone');
            $data['c_total'] = $this->Lang('total');
            $data['idCard'] = $this->Lang('id_card');
		$data['lang_nssf_code'] = $this->Lang('nssf_code');
		$data['lang_insurance_code'] = $this->Lang('insurance_code');
		$data['lang_id_poor_code'] = $this->Lang('id_poor_code');
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
	    $data['lung'] = $this->Lang('lung');
	    $data['allergyAndPenicillin'] = $this->Lang('allergy_and_penicillin');
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
	    $data['age'] = $this->Lang('age');
	    $data['province'] = $this->Lang('province');
	    $data['district'] = $this->Lang('district');
	    $data['commune'] = $this->Lang('commune');
	    $data['vitalSign'] = $this->Lang('vital_sign');
	    $data['pulseRate'] = $this->Lang('pulse_rate');
	    $data['bloodPressure'] = $this->Lang('blood_pressure');
	    $data['heartRate'] = $this->Lang('heart_rate');
	    $data['respiratoryRate'] = $this->Lang('respiratory_rate');
	    $data['temperature'] = $this->Lang('temperature');
	    // waitting
	    $data['watiitingForm'] = $this->Lang('waitting_form');
	    $data['h_waitting_number'] = $this->Lang('waitting_number');
	    $data['purpose'] = $this->Lang('purpose');
	    $data['doctor'] = $this->Lang('doctor');
	    $data['room'] = $this->Lang('room');
	    $data['neonatal'] = $this->Lang('neonatal');

            return $data;
        }

	// function family_auto_complete(){
	//     // Check Session
	//     $this->checkSession();
	//     $this->PatientModel->setName(urldecode($this->getUrlSegment3()));
	//     // $this->PatientModel->setId('4');
	//     $this->get_patient_by_name_json();
	// }
	// // Get Patient Json Data By Name
	// function get_patient_by_name_json(){
	//     // Check Session
	//     $this->checkSession();
	//     $datas = $this->PatientModel->getPatientInfoByName();
	//     $this->restData($datas);
	//    	}
}
?>
