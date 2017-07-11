<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Neonatal Class
class Neonatal extends Datastructure{

	// Get All Neonatal
	function getAllNeonatal() {
            $select = '';
            $from = $this->getTblNeonatal()." as n";
            $from.= " LEFT JOIN ".$this->getTblPatient()." as p ON p.patient_id = n.neonatal_patient_id";
            $where = ' n.neonatal_deleted = 0';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND (n.neonatal_kh_name LIKE '%".$this->getSearch()."%' OR n.neonatal_en_name LIKE '%".$this->getSearch()."%' OR n.neonatal_code LIKE '%".$this->getSearch()."%')";
            }
            return $this->executeQuery($select, $from, $where);
	}
	// Get Count All Neonatal
	function getCountNeonatal() {
			return $this->getCountWhere($this->getTblNeonatal(), ' neonatal_deleted = 0');
	}
	// Get Count All Neonatal for code
	function getCountNeonatalCode() {
			return $this->getCountWhere($this->getTblNeonatal(), ' neonatal_deleted = 0 AND neonatal_code != "" ');
	}
	// New Patient Code
	function genNeonatalNo(){
        return $this->genRef('P','0',$this->getCountNeonatalCode());
	}
	function genRef($pre_char,$auto_no,$current_ref){

		// In Detail  H0000001P0000001 H0000001P0000002 H0000001P0000003

		if($pre_char == 'P'){
			$no = str_pad($current_ref+1, 8, "0", STR_PAD_LEFT);
			//$ref_no = $pre_char.$no.'-'.($auto_no+1);
			$ref_no = $pre_char.$no;
		}else{
			return 'nothing';
		}

		$this->setPatientNo($current_ref+1);
		$this->setAutoNo($auto_no+1);
		return @$ref_no;
	}

	// Get Neonatal Id
	function getNeotaltalIdByCode(){
	    $this->customQueryLog("Neonatal_code :".$this->getNeoCode());
            $select = '';
            $from = $this->getTblNeonatal();
            $where = " neonatal_code ='".$this->getNeoCode()."'";

	    $info = $this->executeQuery($select, $from, $where);
	    foreach ($info as $row){
		    //$this->customQueryLog("Data Return :".$row->patient_id);
		    return $row->neonatal_id;
	    }
	}

	// Add or Insert Neonatal
 	function add(){
 			$this->insertData($this->getTblNeonatal(),$this->getArrayDatas());
 	}
	// Update Neo
	function update(){
		if($this->getCode() !== NULL || $this->getCode() !== ""){
			$newCodeNeo = $this->genNeonatalNo();
			$this->setArrayData('neonatal_code',$newCodeNeo);
			$this->updateData($this->getTblNeonatal(),$this->getArrayDatas(), 'neonatal_id', $this->getId());
			return $newCodeNeo;
		}else{
			$this->updateData($this->getTblNeonatal(),$this->getArrayDatas(), 'neonatal_id', $this->getId());
		}
	}

	// Delete neonatal go to trash
	function delete(){
			if($this->getCode() == 'null'){
				$this->deleteDataWhere($this->getTblNeonatal(), 'neonatal_id='.$this->getId());
			}else{
				$this->setArrayData('neonatal_deleted', '1');
				$this->updateData($this->getTblNeonatal(), $this->getArrayData(), 'neonatal_id', $this->getId());
			}
	}
  // Get Patient Info by ID
	function getNeoById(){
	    $select = '';
      $from = $this->getTblNeonatal() ." AS n";
	    $from .= " JOIN ". $this->getTblPatient() ." AS p ON p.patient_id = n.neonatal_patient_id";
	    $where = ' n.neonatal_id = '.$this->getId().' AND neonatal_deleted = 0';
	    return $this->executeQuery($select, $from, $where);
	}
	// function updateRoomPatient(){
	// 	$this->setArrayData('patient_room',$this->getRoomId());
	// 	$this->updateDataWhere($this->getTblPatient(),$this->getArrayData(),' patient_id = '.$this->getId());
	// }

	//Array data for Insert and Update
    function getArrayDatas(){
    	$this->setArrayData('neonatal_patient_code',$this->getPatientCode());
	    $this->setArrayData('neonatal_patient_id',$this->getPatientId());
	    $this->setArrayData('neonatal_en_name',$this->getName());
	    $this->setArrayData('neonatal_gender',$this->getSex());
	    $this->setArrayData('neonatal_weight',$this->getWeight());
	    $this->setArrayData('neonatal_dob',$this->getDob());
	    $this->setArrayData('neonatal_time',$this->getTime());
	    return $this->getArrayData();
    }
}
?>
