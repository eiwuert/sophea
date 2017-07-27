<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Neonatals
class Neonatals extends Securities {

    	// Define Index of Neonatals Fucntion
    	public function index() {

    	    // Check Session
    	    $this->checkSession();
            $data = array();
            // patient_neo_id from patient
            $data['pnid'] = $this->getUrlSegment3();
            // Menu Active
            $data['ac_neonatal'] = 'active';
            // Get Item Per Page
    	    $data['item_per_page'] = $this->getSysConfig();
    	    // Get Count All Neonatal
    	    $data['totals'] = $this->NeonatalModel->getCountNeonatal();
            // Define Gender Cambo
    	    $data['genderId'][0] = "Female";
    	    $data['genderId'][1] = "Male";
            // Get Translate Word to View
            $data = $this->getTranslate($data);

            // Load View
            $this->LoadView('template/header',$data);
            $this->LoadView('template/topmenu');
            $this->LoadView('template/sidebar');
            $this->LoadView('neonatal/list');
            $this->LoadView('template/footer');
        }
        function get_neonatal_list(){
    	    // Check Session
    	    $this->checkSession();
    		$this->NeonatalModel->setSearch($this->getPost('search_data'));
    		$datas = $this->NeonatalModel->getAllNeonatal();
            $this->restData($datas);
    	}
        function save_neonatal(){
            // redirect($this->getBaseUrl().'index.php/ipds');
            // $this->getBaseUrl('ipds');
            // Check Session
            $this->checkSession();
            $this->NeonatalModel->setId($this->getPost('neonatalId'));
            $this->NeonatalModel->setPatientId($this->getPost('neonatalPatientId'));
            $this->NeonatalModel->setPatientCode($this->getPost('neonatalPatientCode'));
            $this->NeonatalModel->setName($this->getPost('neonatalName'));
            $this->NeonatalModel->setSex($this->getPost('neonatalGender'));
            $this->NeonatalModel->setWeight($this->getPost('neonatalWeight'));
            $this->NeonatalModel->setDob(date('Y-m-d H:i:s',strtotime($this->getPost('neonatalDob'))));
            $this->NeonatalModel->setDateIn(date('Y-m-d',strtotime($this->getPost('neonatalDateIn'))));
            $ccode = $this->NeonatalModel->getNeoById();
            foreach ($ccode as $row){
                $getCheckCodeNeo = $row->neonatal_id;
            }
            $this->NeonatalModel->setCode($getCheckCodeNeo);
            $code_neo = $this->NeonatalModel->update();
            // do update service
            $this->VisitorModel->setCode($code_neo);
            $this->getInsertIntoVisitor($this->getPost('neonatalPatientId'),$this->getPost('neonatalId'), $code_neo);
           	// Write Log
            // $this->logs('3', 'Try to access application with user: '.$this->getPost('unit_name').' / '.$this->getPost('unit_desc'));
    	}
      function getInsertIntoVisitor($getPid,$getNid, $code_neo){

          $this->NeonatalModel->setNeoCode($code_neo);
          $this->VisitorModel->setPatientId($getPid);
          $this->VisitorModel->setNeoId($getNid);
          if($this->getPost('opd') == 1){
              $this->logs('3',$this->NeonatalModel->setVisitorEnrol());
              $this->VisitorModel->setVisitorEnrol();
              $this->VisitorModel->addNeo();
          }
          if($this->getPost('neoSimpleIcu') == 1){
              $this->logs('3',$this->NeonatalModel->getNeotaltalIdByCode());
              $this->VisitorModel->setP_chNeoSimpleIcu();
              $this->VisitorModel->addNeo();
          }
          if($this->getPost('neoComplicatedIcu') == 1){
              $this->logs('3',$this->NeonatalModel->getNeotaltalIdByCode());
              $this->VisitorModel->setP_chNeoComplicatedIcu();
              $this->VisitorModel->addNeo();
          }
      }
      // Delete Neonatal
      function delete_neonatal(){
          // Check Session
          $this->checkSession();
          $this->NeonatalModel->setCode($this->getPost('neonatal_code'));
          $this->NeonatalModel->setId($this->getUrlSegment3());
          $p = $this->NeonatalModel->delete();
          $this->logs('3','000--->'.$p);
          // Write Log in to log file
          $this->logs('3', 'Delete '.$this->getUrlSegment1().' Neonatal From List');
          $this->logs('4', 'Delete '.$this->getUrlSegment1().' Neonatal From List');
      }

  		function get_neonatal_info_by_id_json(){
  		    // Check Session
  		    $this->checkSession();
  	            $this->NeonatalModel->setId($this->getUrlSegment3());
  	            $datas = $this->NeonatalModel->getNeoById();
  	            $this->restData($datas);
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
          // $data['ac_viewall'] = 'active';

              // Define Gender Cambo
          // $data['genderCambo'][0] = "Female";
          // $data['genderCambo'][1] = "Male";

                // Define Status Cambo
          // $data['statusCambo'][0] = "Sigle";
          // $data['statusCambo'][1] = "Married";

          // $this->WorkstationModel->setStart(0);
          // $this->WorkstationModel->setLimit(0);
          // $query_workstation = $this->WorkstationModel->getAllWorkstation();
          // $data['drop_workshop'] = $this->queryDropDownMenu($query_workstation,$label_id='0',$label_name='-- --',$id='workstation_id',$value='workstation_name',$value2='');

          // Get Translate Word to View
          $data = $this->getTranslate($data);
          // waitting Form
          // $data['generate_num_waitting'] = $this->WaittingModel->genNumber();

          // $this->RoomModel->setStart(0);
          // $this->RoomModel->setLimit(0);
          // $query_room = $this->RoomModel->getAllRoom();
          // $data['drop_room'] = $this->queryDropDownMenu($query_room,$label_id='0',$label_name='-- --',$id='room_id',$value='room_name',$value2='');
          //
          // $this->WardModel->setStart(0);
          // $this->WardModel->setLimit(0);
          // $query_ward = $this->WardModel->getAllWard();
          // $data['drop_wards'] = $this->queryDropDownMenu($query_ward,$label_id='0',$label_name='-- --',$id='wards_id',$value='wards_desc',$value2='');
          //
          // $this->WardModel->setStart(0);
          // $this->WardModel->setLimit(0);
          // $query_user = $this->UserModel->getAllUser();
          // $data['drop_user'] = $this->queryDropDownMenu($query_user,$label_id='0',$label_name='-- --',$id='uid',$value='name',$value2='');



          // Load View
          $this->LoadView('template/header',$data);
          $this->LoadView('template/topmenu');
          $this->LoadView('template/sidebar');
          $this->LoadView('neonatal/list_visited');
          $this->LoadView('template/footer');
      }


      // #################### Translate ####################### //
      // Translate to View
      function getTranslate($data = null){
          // Define Default Language from Security to view
          @$data = $this->defTranslation($data);
          // Translate

          $data['list'] = $this->Lang('list');
          $data['create'] = $this->Lang('create');

          $data['edit'] = $this->Lang('update');
          $data['delete'] = $this->Lang('delete');
          $data['name'] = $this->Lang('name');
          $data['visitor'] = $this->Lang('visitor');
          $data['gender'] = $this->Lang('gender');
          $data['weight'] = $this->Lang('weight');
          $data['code'] = $this->Lang('code');
          $data['dob'] = $this->Lang('dob');
          $data['time'] = $this->Lang('time');
          $data['old'] = $this->Lang('old');
          $data['date_in'] = $this->Lang('date_in');
          $data['parents'] = $this->Lang('patient');
          return $data;
      }
}
?>
