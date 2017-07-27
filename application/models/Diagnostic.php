<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
// Include DAO Class
include_once 'Datastructure.php';
// Define Diagnostic Class
class Diagnostic extends Datastructure{

	// Get Diagnostic By Visitor
	function getDiagnosticListByVisitorId(){
	    $select = "";
	    $from = $this->getTblDiagnostic() ." AS di";
			$from .= " JOIN ". $this->getTblIcd10() ." AS ic ON ic.icd10_id = di.icd10_id";
			$from .= " LEFT JOIN ". $this->getTblWard() ." AS wd ON wd.wards_id = di.diagnostics_ward";
	    $from .= " LEFT JOIN ". $this->getTblRooms() ." AS rm ON rm.room_id = di.diagnostics_room";
	    $where = " diagnostics_deleted = 0 AND visitors_id = ". $this->getVisitorId()." ORDER BY diagnostics_date";
	    return $this->executeQuery($select, $from, $where);
	}

	// Get Form Autor Complete
	function getFormByName(){

	    $select = " `forms_name` AS value";
	    $from = $this->getTblForm();
	    $where = " forms_name LIKE '%".$this->getName()."%' AND forms_delete = 0";

	    return $this->executeQuery($select, $from, $where);
	}

	// Get Note By visitor Id
	function getNoteByVisitorId(){
	    $select = "";
	    $from = $this->getTblClinicalNote()." AS cn";
	    $from .= " JOIN ". $this->getTblVisitor()." AS vi ON cn.visitors_id = vi.visitors_id";

	    $where = " cn.visitors_id = ".$this->getVisitorId();

	    return $this->executeQuery($select, $from, $where);
	 }

	// Get For Service Item
	function getFormPrint($numOrdernant =''){
	    $select = " si.service_items_id,pa.patient_id, patient_code, patient_kh_name, patient_en_name, patient_phone, patient_gender, patient_dob, products_name, products_desc, pr.categories_id, ca.types_id, DATE_FORMAT(items_modified,'%m/%d/%Y') AS items_modified, items_qty, items_discount, items_prices, items_time, items_detail, us1.name AS accept_by, us.name, us.phone, fitzpatrik, fluence, pulse_length, frequency, mode, no_of_treal, lens, spot_size, cut_off_filter, pulse_train, pause_length, pulse_with_us, energy_mj, medication, mediacines_am, mediacines_af, mediacines_pm, mediacines_nt, ordernant_no";
	    $from = $this->getTblServiceItem()." AS si";
	    $from .= " JOIN ". $this->getTblProduct() ." AS pr ON si.products_id = pr.products_id";
	    $from .= " JOIN ". $this->getTblCategory() ." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblType() ." AS ty ON ty.types_id = ca.types_id";
	    $from .= " JOIN ". $this->getTblUser() ." AS us ON us.uid = si.assign_to_uid";
            $from .= " JOIN ". $this->getTblUser() ." AS us1 ON us1.uid = si.accept_by_uid";
	    $from .= " JOIN ". $this->getTblVisitor() ." AS vs ON vs.visitors_id = si.visitors_id";
	    $from .= " JOIN ". $this->getTblPatient() ." AS pa ON pa.patient_id = vs.patient_id";
	    $where = " si.visitors_id = ".$this->getVisitorId()." ";
            //$where = " si.visitors_id = ".$this->getVisitorId()." AND accept_by_uid > 0";

	    if($numOrdernant !== ''){
	    $where .= " AND ordernant_no = ".$numOrdernant;
	    }

	    if($this->getDelete() == '0'){
		$where .= " AND items_deleted = 0";
	    }

	    if($this->getPrintType() != '0'){
		$where .= " AND items_form ='".$this->getPrintType()."' ORDER BY ordernant_no ASC";
	    }

	    return $this->executeQuery($select, $from, $where);
	}

	// Get Form Id By Name
	function getFormIdByName(){

	    $result = $this->executeQuery("forms_id", $this->getTblForm(), " forms_name ='".$this->getName()."'");
	    foreach ($result as $row) {
		return $row->forms_id;
	    }
	    return '';
	}

	// Add or Insert Diagnostic
	function add(){
		$this->insertData($this->getTblDiagnostic(),$this->getArrayDatas());
	}

	// Add or Insert Note
	function save_note(){
		$this->insertData($this->getTblClinicalNote(),array('notes_detail' => $this->getDesc(), 'visitors_id' => $this->getId()));
	}

	// Update Unit
	function update(){
		$this->updateDataWhere($this->getTblDiagnostic(), $this->getArrayDatas(), " diagnostics_id = " . $this->getDiagnosticId());
	}

	// Get Unit Info by ID
	function getUnitById(){
		return $this->executeQuery('', $this->getTblUnit(), ' units_id = '.$this->getId().' AND units_deleted = 0');
	}

	// Delete Service
	function deleteService(){
		$this->deleteDataWhere($this->getTblServiceItem(), " service_items_id = ".$this->getDiagnosticId());
	}

	// Delete Service
	function deleteServicePay(){
		$this->setArrayData("items_deleted", "1");
		$this->updateDataWhere($this->getTblServiceItem(), $this->getArrayData()," service_items_id = ".$this->getDiagnosticId());
	}

	// Save Product
	function saveProduct(){
	    $this->insertData($this->getTblServiceItem(), $this->getArrayDataForUpdateServiceItem());
	}

	// update Service Item
	function updateProduct(){
            $this->updateDataWhere($this->getTblServiceItem(), $this->getArrayDataForUpdateServiceItem()," service_items_id = ".$this->getId());
	}

        // update Service Item
	function updateMedicine(){

	    $this->setArrayDataNothing();

            $this->setArrayData('items_qty', $this->getProductQty());
            $this->setArrayData('items_prices', $this->getProductPrice());
            $this->setArrayData('items_discount', $this->getDiscount());

            $this->updateDataWhere($this->getTblServiceItem(), $this->getArrayData()," service_items_id = ".$this->getId());
	}

        function acceptService(){

	    $this->setArrayDataNothing();

            $this->setArrayData('accept_by_uid', $this->getAcceptUid());
            $this->setArrayData('accept_percent', $this->getAcceptPer());
            $this->setArrayData('accepted_date', $this->getDate1());
            $this->updateDataWhere($this->getTblServiceItem(), $this->getArrayData()," service_items_id = ".$this->getId());
        }

	//Array data for Insert and Update
	function getArrayDatas(){

	    $this->setArrayDataNothing();

	    $this->setArrayData('visitors_id',$this->getVisitorId());
	    $this->setArrayData('uid',$this->getUserId());
	    $this->setArrayData('icd10_id',$this->getIcd10Id());
	    $this->setArrayData('diagnostics_level',$this->getLevel());
	    $this->setArrayData('diagnostics_detail',$this->getDesc());
      $this->setArrayData('diagnostics_ward',$this->getWard());
	    $this->setArrayData('diagnostics_room',$this->getRoomId());

	    return $this->getArrayData();
	}

	//Array data for Insert and Update
	function getArrayDataForUpdateServiceItem(){

			$this->setArrayDataNothing();

	    $this->setArrayData('visitors_id', $this->getVisitorId());
	    $this->setArrayData('products_id', $this->getProductId());
	    $this->setArrayData('items_qty', $this->getProductQty());
	    $this->setArrayData('items_prices', $this->getProductPrice());
	    $this->setArrayData('items_discount', $this->getDiscount());
	    /*$this->setArrayData('items_discount', $this->getDiscount());*/
	    $this->setArrayData('uid', $this->getUserId());
	    $this->setArrayData('assign_to_uid', $this->getAssignUid());
	    $this->setArrayData('assign_percent', $this->getAssignPer());
	    $this->setArrayData('accept_by_uid', $this->getAcceptUid());
	    $this->setArrayData('accept_percent', $this->getAcceptPer());

	    // Form
	    $this->setArrayData('items_form', $this->getFormIdByName());

	    // Medicine
	    $this->setArrayData('items_time', $this->getUseTime());
	    $this->setArrayData('items_detail', $this->getUseDetail());
	    $this->setArrayData('mediacines_am', $this->getAm());
	    $this->setArrayData('mediacines_af', $this->getAf());
	    $this->setArrayData('mediacines_pm', $this->getPm());
	    $this->setArrayData('mediacines_nt', $this->getNt());

	    // Service
	    $this->setArrayData('fitzpatrik', $this->getFitzpatrik());
	    $this->setArrayData('fluence', $this->getFluence());
	    $this->setArrayData('pulse_length', $this->getPulseLength());
	    $this->setArrayData('frequency', $this->getFrequency());
	    $this->setArrayData('mode', $this->getMode());
	    $this->setArrayData('no_of_treal', $this->getNoOfTreal());
	    $this->setArrayData('lens', $this->getLens());
	    $this->setArrayData('spot_size', $this->getSpotSize());
	    $this->setArrayData('cut_off_filter', $this->getCutOffFilter());
	    $this->setArrayData('pulse_train', $this->getPulseTrain());
	    $this->setArrayData('pause_length', $this->getPauseLength());
	    $this->setArrayData('pulse_with_us', $this->getPulseWithUs());
	    $this->setArrayData('energy_mj', $this->getEnergyMj());

            $this->setArrayData('ordernant_no', $this->getAmount());

            return $this->getArrayData();
	}

	// Get Unit Combo
	function getUnitCombo(){
		$arr = array();
		$inifo = $this->allUnit();
		foreach ($inifo as $rows){
			$arr[$rows->units_id] = $rows->units_name;
		}

		return $arr;
	}

	function saveIpdVirtualSign(){
		$this->insertData($this->getTblIpdVirtualSign(),$this->getArrayDatasVirtualSign());
	}

	function updateIpdVirtualSign(){
		$this->updateDataWhere($this->getTblIpdVirtualSign(), $this->getArrayDatasVirtualSign(), " vsipd_id = " . $this->getId());
	}
		//Array data for Insert and Update
	function getArrayDatasVirtualSign(){

	    $this->setArrayDataNothing();

	    $this->setArrayData('vsipd_visitor_id',$this->getVisitorId());
	    $this->setArrayData('vsipd_pulse',$this->getPulseRate());
	    $this->setArrayData('vsipd_blood_pressure',$this->getBloodPressure());
	    $this->setArrayData('vsipd_heart_rate',$this->getHeartRate());
	    $this->setArrayData('vsipd_respirateory_rate',$this->getRespiratoryRate());
	    $this->setArrayData('vsipd_temperature',$this->getTemperature());

	    return $this->getArrayData();
	}
	function getVsipdList(){
		$select = "";
	    $from = $this->getTblIpdVirtualSign();
	    $where = " vsipd_deleted = 0 AND vsipd_visitor_id = ". $this->getId();

	    return $this->executeQuery($select, $from, $where);
	}
	function getVsipdListById(){
			$select = "";
	    $from = $this->getTblIpdVirtualSign();
	    $where = " vsipd_id = ". $this->getId();
	    return $this->executeQuery($select, $from, $where);
	}
	// Delete Visp
	function deleteVsipd(){
		$this->setArrayData("vsipd_deleted", "1");
		$this->updateDataWhere($this->getTblIpdVirtualSign(), $this->getArrayData()," vsipd_id = ".$this->getId());
	}
	function getProtocolList(){
			$select = " ipdptc.vsipdpro_id, ipdptc.vsipdpro_visitor_id, ipdptc.vsipdpro_protocols_id, ipdptc.vsipdpro_date, ipdptc.vsipdpro_surgeon_doctor, ipdptc.vsipdpro_anesthesia_doctor, ipdptc.vsipdpro_surgeon_help_doctor, ipdptc.vsipdpro_neo_doctor, ipdptc.vsipdpro_midwife_doctor, u_surgeon.`name` as n_surgeon, u_anesthesia.`name` as n_anesthesia, u_surgeon_help.`name` as n_surgeon_help, u_neo.`name` as n_neo, u_midwife.`name` as n_midwife, ptc.protocols_title, ptc.protocols_desc";
			$from = $this->getTblIpdProtocol()." AS ipdptc";
			$from.= " LEFT JOIN ".$this->getTblProtocol()." AS ptc ON ptc.protocols_id = ipdptc.vsipdpro_protocols_id";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_surgeon ON u_surgeon.uid = ipdptc.vsipdpro_surgeon_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_anesthesia ON u_anesthesia.uid = ipdptc.vsipdpro_anesthesia_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_surgeon_help ON u_surgeon_help.uid = ipdptc.vsipdpro_surgeon_help_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_neo ON u_neo.uid = ipdptc.vsipdpro_neo_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_midwife ON u_midwife.uid = ipdptc.vsipdpro_midwife_doctor";
			$where = " ipdptc.vsipdpro_deleted = 0 AND ipdptc.vsipdpro_visitor_id = ". $this->getId();
			return $this->executeQuery($select, $from, $where);
	}
	function getProtocolListById(){
			$select = " ipdptc.vsipdpro_id, ipdptc.vsipdpro_visitor_id, ipdptc.vsipdpro_protocols_id, ipdptc.vsipdpro_date, ipdptc.vsipdpro_surgeon_doctor, ipdptc.vsipdpro_anesthesia_doctor, ipdptc.vsipdpro_surgeon_help_doctor, ipdptc.vsipdpro_neo_doctor, ipdptc.vsipdpro_midwife_doctor, u_surgeon.`name` as n_surgeon, u_anesthesia.`name` as n_anesthesia, u_surgeon_help.`name` as n_surgeon_help, u_neo.`name` as n_neo, u_midwife.`name` as n_midwife, ptc.protocols_title, ptc.protocols_desc";
			$from = $this->getTblIpdProtocol()." AS ipdptc";
			$from.= " LEFT JOIN ".$this->getTblProtocol()." AS ptc ON ptc.protocols_id = ipdptc.vsipdpro_protocols_id";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_surgeon ON u_surgeon.uid = ipdptc.vsipdpro_surgeon_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_anesthesia ON u_anesthesia.uid = ipdptc.vsipdpro_anesthesia_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_surgeon_help ON u_surgeon_help.uid = ipdptc.vsipdpro_surgeon_help_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_neo ON u_neo.uid = ipdptc.vsipdpro_neo_doctor";
			$from.= " LEFT JOIN ".$this->getTblUser()." AS u_midwife ON u_midwife.uid = ipdptc.vsipdpro_midwife_doctor";
			$where = " ipdptc.vsipdpro_id = ". $this->getId();
			return $this->executeQuery($select, $from, $where);
	}

	function addProtocol(){
			$this->insertData($this->getTblIpdProtocol(),$this->getProtocolArrayDatas());
			return $this->db->last_query();
	}
	function updateProtocol(){
			$this->updateDataWhere($this->getTblIpdProtocol(), $this->getProtocolArrayDatas(), " vsipdpro_id = " . $this->getId());
	}
	function deleteProtocol(){
			$this->deleteDataWhere($this->getTblIpdProtocol(), " vsipdpro_id = ".$this->getId());
	}
	//Array data for Insert and Update
	function getProtocolArrayDatas(){
			$this->setArrayData('vsipdpro_visitor_id',$this->getVisitorId());
	    $this->setArrayData('vsipdpro_protocols_id',$this->getProtocolId());
	    $this->setArrayData('vsipdpro_date',$this->getDate());
	    $this->setArrayData('vsipdpro_surgeon_doctor',$this->getProtocolSurgeon());
	    $this->setArrayData('vsipdpro_anesthesia_doctor',$this->getProtocolAnesthesia());
	    $this->setArrayData('vsipdpro_surgeon_help_doctor',$this->getProtocolHelper());
      $this->setArrayData('vsipdpro_neo_doctor',$this->getProtocolNeoDoctor());
	    $this->setArrayData('vsipdpro_midwife_doctor',$this->getProtocolMidult());

	    return $this->getArrayData();
	}
}
?>
