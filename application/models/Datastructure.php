<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Class DAO
require_once ('Dao.php');

class Datastructure extends Dao{
	// ################## Variable ##################################//
	// =============== Table Name ===================
	private $tbl_pre = "emedirec_";
	private $tbl_unit = "units";
	private $tbl_type = "product_types";
	private $tbl_category = "product_categories";
	private $tbl_product = "products";
	private $tbl_hospital = "hospital";
	private $tbl_user = "user";
	private $tbl_role = "user_roles";
	private $tbl_role_permission = "role_permissions";
	private $tbl_form = "forms";
	private $tbl_ward = "wards";
	private $tbl_icd10 = "icd10";
	private $tbl_patient = "patient";
	private $tbl_visitor = "visitors";
	private $tbl_visitorOpt = "visitors_opt";
	private $tbl_diagnostic = "diagnostics";
	private $tbl_service_item = "service_items";
	private $tbl_service_payment = "service_payments";
	private $tbl_district = "districts";
	private $tbl_province = "provinces";
	private $tbl_session = "sessions";
  private $tbl_clinical_notes = "clinical_notes";
  private $tbl_appoinment = "appoinments";
	private $tbl_workstation = "work_station";
	private $tbl_rooms = "rooms";
	private $tbl_waitting = "waitting";
	private $tbl_patient_room = "patient_room";
	private $tbl_ipd_virtual_sign = "ipd_virtual_sign";
	private $tbl_neonatal = "neonatal";
	private $tbl_protocols = "protocols";
	private $tbl_ipd_protocol = "ipd_protocol";
	// *************** View Name ********************
	// *************** Table Column *****************
	// =============== Unit =========================
	private $unitId = '';
	// =============== Type =========================
	private $typeId = '';
	// =============== categoryId =========================
	private $categoryId = '';
	// =============== Product =========================
	private $productId = '';
	private $productCode = '';
	private $productQty = '';
	private $productCost = '';
	private $productPrice = '';

	// =============== ward =========================
	private $wardId = '';
	private $wardCode = '';

	// =============== Icd10 =========================
	private $icd10Id = '';
	private $icd10Code = '';

	// =============== User =========================
	private $uId = '';
	private $username = '';
	private $passwd = '';
	private $sex = '';
	private $background = '';
	private $lang = '';
	private $status= '';
	private $workplace = '';
	private $startDate = '';
	private $stopDate = '';
	private $weight = '';
	private $dob = '';
	private $time = '';
	private $permissionSection = '';
	private $checkId = '';
	
	// ============= Hospital============
	private $hospitalId = '';
	private $hospitalCode = '';
	private $hospitalContact = '';
	private $itemPerPage = '';
	private $diagnosticNo = '';
	private $visitorNo = '';
	private $productNo = '';
	private $patientNo = '';
	private $autoNoDate = '';
	private $autoNo = '';
	private $amountUser = '';
	private $hospitalStatus = '';
	private $doctor = '';
	private $doctorId = '';

	// =============== Patient =========================
	private $patientId = '';
	private $roomId = '';
	private $bookingDate = '';
	private $bookingPorpose = '';
	private $bookingWaitId = '';
	private $patientCode = '';
	private $patientKhName = '';
	private $patientEnName = '';
	private $patientGender = '';
	private $emergencyPhone = '';
	private $patientDob = '';
	private $patientOccupation = '';
	private $isHeart = '0';
	private $isRespiratory = '0';
	private $isDiabetes = '0';
	private $isDigestive = '0';
	private $isKidney = '0';
	private $isEndocrine = '0';
	private $isNeuroSys = '0';
	private $isLung = '0';
	private $isAllergy = '0';
	private $idCard = '';
	private $assuranceCard = '';
	private $assuranceCompany = '';
	private $motorCard = '';
	private $carCard = '';
	private $bankCard1 = '';
	private $bankCard2 = '';
	private $bankCard3 = '';
	private $studentCard = '';
	private $patientStatus = '';
	private $registerDate = '';
	private $pregnancy = '';
	private $prePregnancy = '';
	private $breastFeeding = '';
	private $otherDisease = '';
	private $district = '';
	private $province = '';
	private $pulseRate = '';
	private $heartRate = '';
	private $bloodPressure = '';
	private $respiratoryRate = '';
	private $temperature = '';
	private $insurance = '0';
	private $idPoor = '0';
	private $ready = '0';
	private $keyIdPoor = '0';
	private $keyIdPoorCode = '0';
	private $keyCode = '';
	private $examination = '';
	private $waittingOpen = '';
	private $waittingId = '';
	private $checkOut = '';
	private $checkNeo = '';

	// =============== Visitor =========================
	private $visitorId = '';
	private $waitingCode = '';
	private $visitorInDate = '';
	private $visitorStayDate = '';
	private $visitorLeaveDate = '';
	private $visitorStatus = '';
        private $visitorStatusSearch = '';

	// =============== Diagnostic =========================
	private $diagnosticId = '';
	private $diagnosticDetail = '';
	private $keyAm = '';
	private $keyAf = '';
	private $keyPm = '';
	private $keyNt = '';
	private $discount = '';
	private $useTime = '';
	private $useDetail = '';
	private $dialevel = '';

	private $ward = '';
	private $outWard = '';
	private $outDate = '';
	private $average = '';

	private $fitzpatrik = '';
	private $fluence = '';
	private $pulseLength = '';
	private $frequency = '';
	private $mode = '';
	private $noOfTreal = '';
	private $lens = '';
	private $spotSize = '';
	private $cutOffFilter = '';
	private $pulseTrain = '';
	private $pauseLength = '';
	private $pulseWithUs = '';
	private $energyMj = '';

  private $assignPer = '0';
  private $acceptPer = '0';
  private $assignUid = '';
  private $acceptUid = '';

  private $protocol_id = '';
  private $protocol_surgeon = '';
  private $protocol_anesthesia = '';
  private $protocol_surgeon_helper = '';
  private $protocol_neo_doctor = '';
  private $protocol_midwidfe = '';

  private $chartStorageRoom = '';
  private $patientRoom = '';

	// --------------- General Key ------------------
	private $keyId = '';
	private $keyName = '';
	private $keyEmail = '';
	private $keyPhone = '';
	private $keyDesc = '';
	private $keyDateIn = '';
	private $keyReferFrom = '';
	private $keyNssf = '';
	private $keyNssfCode = '';
	private $keyInsurance = '';
	private $keyInsuranceCode = '';
	private $keyWorkstation = '';
	private $keyTitle = '';
	private $keySubject = '';
	private $dataArray = '';
	private $dataArray2 = '';
	private $keyDeleted = '';
	private $keyActive = '';
	private $keyAddress = '';
	private $keySearch = '';
	private $keyDate = '';
	private $keyDate1 = '';
	private $keyDate2 = '';
	private $keyStart = '';
	private $keyLimit = '';
	private $keyGroup = '';
	private $printType = '0';
	private $amount = '0';
        private $key01 = '';
        private $key02 = '';
        private $key03 = '';
        private $key04 = '';

        private $neoId = '';
		private $neoCode = '';
	// --------------- Product Table ----------------
	// --------------- User Table -------------------
	private $userId = '';


	// ################## Function ##################################//
	// *************** Table Name *******************

	// Define Table Unit
	function getTblUnit(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_unit);
	}
	// Define Table Type
	function getTblType(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_type);
	}

	// Define Table workstation
	function getTblWorkstation(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_workstation);
	}
	// Define Table rooms
	function getTblRooms(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_rooms);
	}
	// Define Table Category
	function getTblCategory(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_category);
	}
	// Define Table Product
	function getTblProduct(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_product);
	}
	// Define Table Hospital
	function getTblHospital(){
		return $this->getTblPre($this->tbl_pre, $this->tbl_hospital);
	}
	// Define Table User
	function getTblUser(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_user);
	}
	// Define Table Role
	function getTblRole(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_role);
	}
        // Define Table Role Permission
	function getTblRolePermission(){
		return $this->getTblPre($this->tbl_pre, $this->tbl_role_permission);
	}
	// Define Table ward
	function getTblWard(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_ward);
	}

	// Define Table ICD10
	function getTblIcd10(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_icd10);
	}

	// Define Table Patient
	function getTblPatient(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_patient);
	}

	// Define Table Visitor
	function getTblVisitor(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_visitor);
	}

	// Define Table VisitorNeo
	function getTblVisitorOpt(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_visitorOpt);
	}

	// Define Table Diagnostic
	function getTblDiagnostic(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_diagnostic);
	}
		// Define Table Virtual Sign
	function getTblIpdVirtualSign(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_ipd_virtual_sign);
	}

	// Define Table Form
	function getTblForm(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_form);
	}

	// Define Table Diagnostic
	function getTblServiceItem(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_service_item);
	}

	// Define Table Payment
	function getTblServicePayment(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_service_payment);
	}

	// Define Table District
	function getTblDisctrict(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_district);
	}

	// Define Table Province
	function getTblProvince(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_province);
	}

	// Define Table Diagnostic
	function getTblSession(){
		return $this->getTblPre($this->tbl_pre, $this->tbl_session);
	}

        // Define Table Clinical Table
	function getTblClinicalNote(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_clinical_notes);
	}

        // Define Table Appoinment Table
	function getTblAppoinment(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_appoinment);
	}

        // Define Table Waitting Table
	function getTblWaitting(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_waitting);
	}
	        // Define Table patient_room Table
	function getTblPatientRoom(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_patient_room);
	}
	        // Define Table neonatal
	function getTblNeonatal(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_neonatal);
	}
			// Define Table protoocols
	function getTblProtocol(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_protocols);
	}		// Define Table protoocols
	function getTblIpdProtocol(){
		return $this->getTblPre($this->tbl_pre."1_", $this->tbl_ipd_protocol);
	}


	// =============== View Name ====================
	// =============== Table Column =================
	// --------------- General Key ------------------
	public function setId($value){
		$this->keyId = $value;
	}
	public function getId(){
		return $this->keyId;
	}

	public function setName($value){
		$this->keyName = $value;
	}
	public function getName(){
		return $this->keyName;
	}

	public function setEmail($value){
		$this->keyEmail = $value;
	}
	public function getEmail(){
		return $this->keyEmail;
	}

	public function setPhone($value){
		$this->keyPhone = $value;
	}
	public function getPhone(){
		return $this->keyPhone;
	}

	public function setDesc($value){
		$this->keyDesc = $value;
	}
	public function getDesc(){
		return $this->keyDesc;
	}

	public function setDateIn($value){
		$this->keyDateIn = $value;
	}
	public function getDateIn(){
		return $this->keyDateIn;
	}

	public function setReferFrom($value){
		$this->keyReferFrom = $value;
	}
	public function getReferFrom(){
		return $this->keyReferFrom;
	}
	public function setWorkstation($value){
		$this->keyWorkstation = $value;
	}
	public function getWorkstation(){
		return $this->keyWorkstation;
	}

	public function setNssf($value){
		$this->keyNssf = $value;
	}
	public function getNssf(){
		return $this->keyNssf;
	}

	public function setNssfCode($value){
		$this->keyNssfCode = $value;
	}
	public function getNssfCode(){
		return $this->keyNssfCode;
	}

	public function setTitle($value){
		$this->keyTitle = $value;
	}
	public function getTitle(){
		return $this->keyTitle;
	}

	public function setSubject($value){
		$this->keySubject = $value;
	}
	public function getSubject(){
		return $this->keySubject;
	}
	public function setDataArray($value){
		$this->dataArray = $value;
	}
	public function getDataArray(){
		return $this->dataArray;
	}
	public function setDataArray2($value){
		$this->dataArray2 = $value;
	}
	public function getDataArray2(){
		return $this->dataArray2;
	}

	public function setDeleted(){
		$this->keyDeleted = '1';
	}
	public function setUnDeleted(){
		$this->keyDeleted = '0';
	}
	public function getDelete(){
		return $this->keyDeleted;
	}

	public function setActive(){
		$this->keyActive = '1';
	}
	public function setInActive(){
		$this->keyActive = '0';
	}
	public function getActive(){
		return $this->keyActive;
	}

	public function setAddress($value){
		$this->keyAddress = $value;
	}
	public function getAddress(){
		return $this->keyAddress;
	}

	public function setSearch($value){
		$this->keySearch = $value;
	}
	public function getSearch(){
		return $this->keySearch;
	}

	public function setDate($value){
		$this->keyDate = $value;
	}
	public function getDate(){
		return $this->keyDate;
	}

	public function setDate1($value){
		$this->keyDate1 = $value;
	}
	public function getDate1(){
		return $this->keyDate1;
	}

	public function setDate2($value){
		$this->keyDate2 = $value;
	}
	public function getDate2(){
		return $this->keyDate2;
	}

	public function setStart($value){
		$this->keyStart = $value;
	}
	public function getStart(){
		return $this->keyStart;
	}

	public function setLimit($value){
		$this->keyLimit = $value;
	}
	public function getLimit(){
		return $this->keyLimit;
	}

	public function setGroup($value){
		$this->keyGroup = $value;
	}
	public function getGroup(){
		return $this->keyGroup;
	}

	public function setPrintType($value){
		$this->printType = $value;
	}
	public function getPrintType(){
		return $this->printType;
	}

	public function setAmount($value){
		$this->amount = $value;
	}
	public function getAmount(){
		return $this->amount;
	}

        public function setKey01($value){
		$this->key01 = $value;
	}
	public function getKey01(){
		return $this->key01;
	}

        public function setKey02($value){
		$this->key02 = $value;
	}
	public function getKey02(){
		return $this->key02;
	}

        public function setKey03($value){
		$this->key03 = $value;
	}
	public function getKey03(){
		return $this->key03;
	}

        public function setKey04($value){
		$this->key04 = $value;
	}
	public function getKey04(){
		return $this->key04;
	}

	//=========== Hospital=========
	public function setHospitalId($value){
		$this->hospitalId = $value;
	}
	public function getHospitalId(){
		return $this->hospitalId;
	}

	public function setPatientNo($value){
		$this->patientNo = $value;
	}
	public function getPatientNo(){
		return $this->patientNo;
	}

	public function setAutoNo($value){
		$this->autoNo = $value;
	}
	public function getAutoNo(){
		return $this->autoNo;
	}


	//========== Unit ===========

	// Unit Id
	public function setUnitId($value){
		$this->unitId = $value;
	}
	public function getUnitId(){
		return $this->unitId;
	}
	//========== Type ===========

	// Type Id
	public function setTypeId($value){
		$this->typeId = $value;
	}
	public function getTypeId(){
		return $this->typeId;
	}

	//========== Category ===========

	// Category Id
	public function setCategoryId($value){
		$this->categoryId = $value;
	}
	public function getCategoryId(){
		return $this->categoryId;
	}

	//========== Product ===========

	// product Id
	public function setProductId($value){
		$this->productId = $value;
	}
	public function getProductId(){
		return $this->productId;
	}
	// product Code
	public function setProductCode($value){
		$this->productCode = $value;
	}
	public function getProductCode(){
		return $this->productCode;
	}
	// product Qty
	public function setProductQty($value){
		$this->productQty = $value;
	}
	public function getProductQty(){
		return $this->productQty;
	}
	// product Cost
	public function setProductCost($value){
		$this->productCost = $value;
	}
	public function getProductCost(){
		return $this->productCost;
	}
	// product Price
	public function setProductPrice($value){
		$this->productPrice = $value;
	}
	public function getProductPrice(){
		return $this->productPrice;
	}

	//========== Ward ===========

	// ward Id
	public function setWardId($value){
		$this->wardId = $value;
	}
	public function getWardId(){
		return $this->wardId;
	}
	// ward code
	public function setWardCode($value){
		$this->wardCode = $value;
	}
	public function getWardCode(){
		return $this->wardCode;
	}

	// check id
	public function setCheckId($value){
		$this->checkId = $value;
	}
	public function getCheckId(){
		return $this->checkId;
	}

	//========== Icd 10 ===========

	// icd10 Id
	public function setIcd10Id($value){
		$this->icd10Id = $value;
	}
	public function getIcd10Id(){
		return $this->icd10Id;
	}
	// icd10 code
	public function setIcd10Code($value){
		$this->icd10Code = $value;
	}
	public function getIcd10Code(){
		return $this->icd10Code;
	}

	//========== Patient ===========

	// Patient Id
	public function setPatientId($value){
		$this->patientId = $value;
	}
	public function getPatientId(){
		return $this->patientId;
	}
	// Room Id
	public function setRoomId($value){
		$this->roomId = $value;
	}
	public function getRoomId(){
		return $this->roomId;
	}
	// Booking Date
	public function setBookingDate($value){
		$this->bookingDate = $value;
	}
	public function getBookingDate(){
		return $this->bookingDate;
	}
	// Booking Porpose
	public function setBookingPorpose($value){
		$this->bookingPorpose = $value;
	}
	public function getBookingPorpose(){
		return $this->bookingPorpose;
	}
	// Booking Wait
	public function set_wait_booking($value){
		$this->bookingWaitId = $value;
	}
	public function get_wait_booking(){
		return $this->bookingWaitId;
	}

	// Patient Code
	public function setPatientCode($value){
		$this->patientCode = $value;
	}
	public function getPatientCode(){
		return $this->patientCode;
	}

	// Patient Kh Code
	public function setPatientKhName($value){
		$this->patientKhName = $value;
	}
	public function getPatientKhName(){
		return $this->patientKhName;
	}

	// Patient En Code
	public function setPatientEnName($value){
		$this->patientEnName = $value;
	}
	public function getPatientEnName(){
		return $this->patientEnName;
	}

	// Patient Gender
	public function setPatientGender($value){
		$this->patientGender = $value;
	}
	public function getPatientGender(){
		return $this->patientGender;
	}

	// Patient Emergecy Phone
	public function setEmergencyPhone($value){
		$this->emergencyPhone = $value;
	}
	public function getEmergencyPhone(){
		return $this->emergencyPhone;
	}

	// Patient Dob
	public function setPatientDob($value){
		$this->patientDob = $value;
	}
	public function getPatientDob(){
		return $this->patientDob;
	}

	// Patient Occupation
	public function setPatientOccupation($value){
		$this->patientOccupation = $value;
	}
	public function getPatientOccupation(){
		return $this->patientOccupation;
	}

	// Patient Is Heart
	public function setIsHeart($value){
		$this->isHeart = $value;
	}
	public function getIsHeart(){
		return $this->isHeart;
	}

	// Patient Is Respiratory
	public function setIsRespiratory($value){
		$this->isRespiratory = $value;
	}
	public function getIsRespiratory(){
		return $this->isRespiratory;
	}

	// Patient Is Diabetes
	public function setIsDiabetes($value){
		$this->isDiabetes = $value;
	}
	public function getIsDiabetes(){
		return $this->isDiabetes;
	}

	// Patient Is Disgestive
	public function setIsDisgestive($value){
		$this->isDigestive = $value;
	}
	public function getIsDisgestive(){
		return $this->isDigestive;
	}

	// Patient Is Kidney
	public function setIsKidney($value){
		$this->isKidney = $value;
	}
	public function getIsKidney(){
		return $this->isKidney;
	}

	// Patient Is Endocrine
	public function setIsEndocrine($value){
		$this->isEndocrine = $value;
	}
	public function getIsEndocrine(){
		return $this->isEndocrine;
	}

	// Patient Is Neuro Sys
	public function setIsNeuroSys($value){
		$this->isNeuroSys = $value;
	}
	public function getIsNeuroSys(){
		return $this->isNeuroSys;
	}

	// Patient Is Lung
	public function setIsLung($value){
		$this->isLung = $value;
	}
	public function getIsLung(){
		return $this->isLung;
	}

	// Patient Is Allergy
	public function setIsAllergy($value){
		$this->isAllergy = $value;
	}
	public function getIsAllergy(){
		return $this->isAllergy;
	}

	// Patient Id Card
	public function setIdCard($value){
		$this->idCard = $value;
	}
	public function getIdCard(){
		return $this->idCard;
	}

	// Patient assurance Card
	public function setAssuranceCard($value){
		$this->assuranceCard = $value;
	}
	public function getAssuranceCard(){
		return $this->assuranceCard;
	}

	// Patient assurance Company
	public function setAssuranceCompany($value){
		$this->assuranceCompany = $value;
	}
	public function getAssuranceCompany(){
		return $this->assuranceCompany;
	}

	// Patient Band Card1
	public function setBankCard1($value){
		$this->bankCard1 = $value;
	}
	public function getBankCard1(){
		return $this->bankCard1;
	}

	// Patient Band Card2
	public function setBankCard2($value){
		$this->bankCard2 = $value;
	}
	public function getBankCard2(){
		return $this->bankCard2;
	}

	// Patient Band Card3
	public function setBankCard3($value){
		$this->bankCard3 = $value;
	}
	public function getBankCard3(){
		return $this->bankCard3;
	}

	// Patient Motor Card
	public function setMotorCard($value){
		$this->motorCard = $value;
	}
	public function getMotorCard(){
		return $this->motorCard;
	}

	// Patient Car Card
	public function setCarCard($value){
		$this->carCard = $value;
	}
	public function getCarCard(){
		return $this->carCard;
	}

	// Patient Student School
	public function setStudentSchool($value){
		$this->studentCard = $value;
	}
	public function getStudentSchool(){
		return $this->studentCard;
	}

	// Patient Status
	public function setPatientStatus($value){
		$this->patientStatus = $value;
	}
	public function getPatientStatus(){
		return $this->patientStatus;
	}

	// Register Date
	public function setRegisterDate($value){
		$this->registerDate = $value;
	}
	public function getRegisterDate(){
		return $this->registerDate;
	}

	// Pregnancy
	public function setPregnancy($value){
	    $this->pregnancy = $value;
	}
	public function getPregnancy(){
	    return $this->pregnancy;
	}

	// Pre Pregnancy
	public function setPrePregnancy($value){
	    $this->prePregnancy = $value;
	}
	public function getPrePregnancy(){
	    return $this->prePregnancy;
	}

	// Breast Feeding
	public function setBreastFeeding($value){
	    $this->breastFeeding = $value;
	}
	public function getBreastFeeding(){
	    return $this->breastFeeding;
	}

	// Other Disease
	public function setOtherDisease($value){
	    $this->otherDisease = $value;
	}
	public function getOtherDisease(){
	    return $this->otherDisease;
	}

	// District
	public function setDistrict($value){
	    $this->district = $value;
	}
	public function getDistrict(){
	    return $this->district;
	}

	// Province
	public function setProvince($value){
	    $this->province = $value;
	}
	public function getProvince(){
	    return $this->province;
	}

	// Pulse Rate
	public function setPulseRate($value){
	    $this->pulseRate = $value;
	}
	public function getPulseRate(){
	    return $this->pulseRate;
	}

	// Heart Rate
	public function setHeartRate($value){
	    $this->heartRate = $value;
	}
	public function getHeartRate(){
	    return $this->heartRate;
	}

	// Respiratory Rate
	public function setRespiratoryRate($value){
	    $this->respiratoryRate = $value;
	}
	public function getRespiratoryRate(){
	    return $this->respiratoryRate;
	}

	// Temperature
	public function setTemperature($value){
	    $this->temperature = $value;
	}
	public function getTemperature(){
	    return $this->temperature;
	}

	// Blood Pressure
	public function setBloodPressure($value){
	    $this->bloodPressure = $value;
	}
	public function getBloodPressure(){
	    return $this->bloodPressure;
	}

	// Insurance
	public function setInsurance($value){
	    $this->insurance = $value;
	}
	public function getInsurance(){
	    return $this->insurance;
	}
	// KeyInsurance
	// public function setInsurance($value){
	//     $this->keyInsurance = $value;
	// }
	// public function getInsurance(){
	//     return $this->keyInsurance;
	// }

	public function setInsuranceCode($value){
	    $this->keyInsuranceCode = $value;
	}
	public function getInsuranceCode(){
	    return $this->keyInsuranceCode;
	}

	// ID Poor
	public function setIdPoor($value){
	    $this->keyIdPoor = $value;
	}
	public function getIdPoor(){
	    return $this->keyIdPoor;
	}
	public function setIdPoorCode($value){
	    $this->keyIdPoorCode = $value;
	}
	public function getIdPoorCode(){
	    return $this->keyIdPoorCode;
	}

	// neo
	public function setNeoId($value){
	    $this->neoId = $value;
	}
	public function getNeoId(){
	    return $this->neoId;
	}
	// neo code
	public function setNeoCode($value){
	    $this->neoCode = $value;
	}
	public function getNeoCode(){
	    return $this->neoCode;
	}


	//========== Visitor ===========

	// Visitor Id
	public function setVisitorId($value){
		$this->visitorId = $value;
	}
	public function getVisitorId(){
		return $this->visitorId;
	}
	// Visitor Waitting Code
	public function setWaittingCode($value){
		$this->waitingCode = $value;
	}
	public function getWaittingCode(){
		return $this->waitingCode;
	}
	// Visitor In Date
	public function setVisitorInDate($value){
		$this->visitorInDate = $value;
	}
	public function getVisitorInDate(){
		return $this->visitorInDate;
	}
	// Visitor stay Date
	public function setVisitorStayDate($value){
		$this->visitorStayDate = $value;
	}
	public function getVisitorStayDate(){
		return $this->visitorStayDate;
	}
	// Visitor leave Date
	public function setVisitorLeaveDate($value){
		$this->visitorLeaveDate = $value;
	}
	public function getVisitorLeaveDate(){
		return $this->visitorLeaveDate;
	}
			// Visitor Status
			public function setVisitorEnrol(){
				$this->visitorStatus = '1';
			}
			public function setVisitorStay(){
				$this->visitorStatus = '2';
			}
			public function setVisitorLeave(){
				$this->visitorStatus = '3';
			}
		    public function setVisitorPharmacy(){
				$this->visitorStatus = '4';
			}
			// neo register
		    	public function setVisitorEco(){
					$this->visitorStatus = '5';
				}
		    	public function setVisitorVaccination(){
					$this->visitorStatus = '6';
				}
		    	public function setVisitorIcu(){
					$this->visitorStatus = '7';
				}

// adult opd
			public function setO_ob(){
				$this->visitorStatus = '10';
			}
			public function setO_gen_med(){
				$this->visitorStatus = '11';
			}
			public function setO_servical_cancer_screening(){
				$this->visitorStatus = '12';
			}
			public function setO_cardio(){
				$this->visitorStatus = '13';
			}
			public function setO_eye(){
				$this->visitorStatus = '14';
			}
			public function setO_pulmonaire(){
				$this->visitorStatus = '15';
			}
			public function setO_trauma(){
				$this->visitorStatus = '16';
			}
			public function setO_renal(){
				$this->visitorStatus = '17';
			}
			public function setO_maternity(){
				$this->visitorStatus = '18';
			}
			public function setO_medicine(){
				$this->visitorStatus = '19';
			}
			public function setO_gyn(){
				$this->visitorStatus = '20';
			}
			public function setO_surgery(){
				$this->visitorStatus = '21';
			}
			public function setO_infertility(){
				$this->visitorStatus = '22';
			}
			public function setO_orl(){
				$this->visitorStatus = '23';
			}
			public function setO_ent(){
				$this->visitorStatus = '24';
			}
			public function setO_dermatology(){
				$this->visitorStatus = '25';
			}
			public function setO_bone(){
				$this->visitorStatus = '26';
			}
			public function setO_digestive(){
				$this->visitorStatus = '27';
			}
			public function setO_cardiaque(){
				$this->visitorStatus = '28';
			}
			public function setO_opd_others(){
				$this->visitorStatus = '29';
			}
			public function setO_cancer(){
				$this->visitorStatus = '30';
			}

// adult ipd
			public function setI_delivery_normal(){
				$this->visitorStatus = '36';
			}
			public function setI_c_section(){
				$this->visitorStatus = '37';
			}
			public function setI_delivery_complication(){
				$this->visitorStatus = '38';
			}
			public function setI_maternity(){
				$this->visitorStatus = '39';
			}
			// change medicine to cancer
			public function setI_medicine(){
				$this->visitorStatus = '40';
			}
			public function setI_gyn(){
				$this->visitorStatus = '41';
			}
			public function setI_surgery(){
				$this->visitorStatus = '42';
			}
			public function setI_infertility(){
				$this->visitorStatus = '43';
			}
			public function setI_orl(){
				$this->visitorStatus = '44';
			}
			public function setI_ent(){
				$this->visitorStatus = '45';
			}
			public function setI_dermatology(){
				$this->visitorStatus = '46';
			}
			public function setI_bone(){
				$this->visitorStatus = '47';
			}
			public function setI_digestive(){
				$this->visitorStatus = '48';
			}
			public function setI_cardiaque(){
				$this->visitorStatus = '49';
			}
			public function setI_ipd_others(){
				$this->visitorStatus = '50';
			}
			public function setI_general_med(){
				$this->visitorStatus = '51';
			}
			public function setI_general_surgery(){
				$this->visitorStatus = '52';
			}
			public function setI_eye(){
				$this->visitorStatus = '53';
			}
			public function setI_trauma(){
				$this->visitorStatus = '54';
			}
			public function setI_pulmonaire(){
				$this->visitorStatus = '55';
			}
			public function setI_renal(){
				$this->visitorStatus = '56';
			}
			public function setI_icu(){
				$this->visitorStatus = '57';
			}
			public function setI_icu_ob(){
				$this->visitorStatus = '58';
			}
			public function setI_img(){
				$this->visitorStatus = '59';
			}


// adult
			// public function setParmacy(){
			// 	$this->visitorStatus = '61';
			// }
			// public function setEcho_ovaries(){
			// 	$this->visitorStatus = '62';
			// }
			// public function setEchoMaternity(){
			// 	$this->visitorStatus = '63';
			// }
			// public function setObExamine(){
			// 	$this->visitorStatus = '64';
			// }
			// public function setEchoOther(){
			// 	$this->visitorStatus = '65';
			// }
			// public function setAnc(){
			// 	$this->visitorStatus = '66';
			// }
			// public function setIvg(){
			// 	$this->visitorStatus = '67';
			// }
			// public function setPerine(){
			// 	$this->visitorStatus = '68';
			// }

// support service
			public function setLabo(){
				$this->visitorStatus = '69';
			}
			public function setXray(){
				$this->visitorStatus = '70';
			}
			public function setCtscan(){
				$this->visitorStatus = '71';
			}
			public function setAnapat(){
				$this->visitorStatus = '72';
			}
			public function setHpv(){
				$this->visitorStatus = '73';
			}
			public function setColpo(){
				$this->visitorStatus = '74';
			}
			public function setThinprep(){
				$this->visitorStatus = '75';
			}
			public function setPapsmear(){
				$this->visitorStatus = '76';
			}
			public function setX_ray_overay(){
				$this->visitorStatus = '77';
			}
			public function setDna(){
				$this->visitorStatus = '78';
			}
			public function setEcg(){
				$this->visitorStatus = '79';
			}
			public function setGastro_endoscopy(){
				$this->visitorStatus = '80';
			}
			public function setOther_support_service(){
				$this->visitorStatus = '81';
			}
// ECHO
			public function setEcho_anc(){
				$this->visitorStatus = '82';
			}
			public function setEcho_neo_cardio(){
				$this->visitorStatus = '83';
			}
			public function setOther_adult_echo(){
				$this->visitorStatus = '84';
			}
// SERVICE
			public function setS_examen(){
				$this->visitorStatus = '86';
			}
			public function setS_perine(){
				$this->visitorStatus = '87';
			}
			public function setS_ivg_igm(){
				$this->visitorStatus = '88';
			}
			public function setS_anc_cpn(){
				$this->visitorStatus = '89';
			}
			public function setS_miscarrage(){
				$this->visitorStatus = '90';
			}
			public function setS_medicine_abortion(){
				$this->visitorStatus = '91';
			}
			public function setS_vpi_vaccination(){
				$this->visitorStatus = '92';
			}
			public function setS_neo_labo(){
				$this->visitorStatus = '93';
			}
			public function setS_bone_test(){
				$this->visitorStatus = '94';
			}
// Pharmacy
			public function setP_pharmacy(){
				$this->visitorStatus = '96';
			}
// Peditric
			public function setPe_opd_ped(){
				$this->visitorStatus = '98';
			}
			public function setPe_ped_ipd(){
				$this->visitorStatus = '99';
			}
			public function setPe_ped_frencectomy(){
				$this->visitorStatus = '100';
			}
			public function setPe_ped_circumcision(){
				$this->visitorStatus = '101';
			}
// Booking
			public function setB_opd_booking(){
				$this->visitorStatus = '104';
			}
			public function setB_ipd_booking(){
				$this->visitorStatus = '105';
			}

// Neo
			public function setP_checkNeo(){
				$this->visitorStatus = '106';
			}
			public function setP_chNeoOpd(){
				$this->visitorStatus = '107';
			}
			public function setP_chNeoSimpleIcu(){
				$this->visitorStatus = '108';
			}
			public function setP_chNeoComplicatedIcu(){
				$this->visitorStatus = '109';
			}
			public function setP_chNeoEcho(){
				$this->visitorStatus = '110';
			}
			public function setP_chNeoLabo(){
				$this->visitorStatus = '111';
			}
			public function setP_pediaOPD(){
				$this->visitorStatus = '112';
			}
			public function setP_pediaIPD(){
				$this->visitorStatus = '113';
			}

			public function getVisitorStatus(){
				return $this->visitorStatus;
			}


        // Status Search
        public function setVisitorStatusSearch($value){
		$this->visitorStatusSearch = $value;
	}
        public function getVisitorStatusSearch(){
            return $this->visitorStatusSearch;
        }

	//========== Diagnostic ===========

	// Diagnostic Id
	public function setDiagnosticId($value){
		$this->diagnosticId = $value;
	}
	public function getDiagnosticId(){
		return $this->diagnosticId;
	}

	// Diagnostic Detail
	public function setDiagnosticDetail($value){
		$this->diagnosticDetail = $value;
	}
	public function getDiagnosticDetail(){
		return $this->diagnosticDetail;
	}

	// Use Time
	public function setUseTime($value){
	    $this->useTime = $value;
	}
	public function getUseTime(){
	    return $this->useTime;
	}

	// Use Time
	public function setUseDetail($value){
	    $this->useDetail = $value;
	}
	public function getUseDetail(){
	    return $this->useDetail;
	}

	// Use Level
	public function setLevel($value){
	    $this->dialevel = $value;
	}
	public function getLevel(){
	    return $this->dialevel;
	}

	// Use ward1
	public function setWard($value){
	    $this->ward = $value;
	}
	public function getWard(){
	    return $this->ward;
	}

	// Use out ward1
	public function setOutWard($value){
	    $this->outWard = $value;
	}
	public function getOutWard(){
	    return $this->outWard;
	}
	// Use average
	public function setAverage($value){
	    $this->average = $value;
	}
	public function getAverage(){
	    return $this->average;
	}

	// Use out date
	public function setOutDate($value){
	    $this->outDate = $value;
	}
	public function getOutDate(){
	    return $this->outDate;
	}

	// AM
	public function setAm($value){
	    $this->keyAm = $value;
	}
	public function getAm(){
	    return $this->keyAm;
	}

	// AF
	public function setAf($value){
	    $this->keyAf = $value;
	}
	public function getAf(){
	    return $this->keyAf;
	}

	// PM
	public function setPm($value){
	    $this->keyPm = $value;
	}
	public function getPm(){
	    return $this->keyPm;
	}

	// NT
	public function setNt($value){
	    $this->keyNt = $value;
	}
	public function getNt(){
	    return $this->keyNt;
	}

	// Discount
	public function setDiscount($value){
	    $this->discount = $value;
	}
	public function getDiscount(){
	    return $this->discount;
	}

	// fitzpatrik
	public function setFitzpatrik($value){
	    $this->fitzpatrik = $value;
	}
	public function getFitzpatrik(){
	    return $this->fitzpatrik;
	}

	// fluence
	public function setFluence($value){
	    $this->fluence = $value;
	}
	public function getFluence(){
	    return $this->fluence;
	}

	// fluence
	public function setPulseLength($value){
	    $this->pulseLength = $value;
	}
	public function getPulseLength(){
	    return $this->pulseLength;
	}

	// frequency
	public function setFrequency($value){
	    $this->frequency = $value;
	}
	public function getFrequency(){
	    return $this->frequency;
	}

	// Mode
	public function setMode($value){
	    $this->mode = $value;
	}
	public function getMode(){
	    return $this->mode;
	}

	// No Of Treat
	public function setNoOfTreal($value){
	    $this->noOfTreal = $value;
	}
	public function getNoOfTreal(){
	    return $this->noOfTreal;
	}

	// Lens
	public function setLens($value){
	    $this->lens = $value;
	}
	public function getLens(){
	    return $this->lens;
	}

	// Spot Size
	public function setSpotSize($value){
	    $this->spotSize = $value;
	}
	public function getSpotSize(){
	    return $this->spotSize;
	}

	// Cut Of Filter
	public function setCutOffFilter($value){
	    $this->cutOffFilter = $value;
	}
	public function getCutOffFilter(){
	    return $this->cutOffFilter;
	}

	// Pulse Train
	public function setPulseTrain($value){
	    $this->pulseTrain = $value;
	}
	public function getPulseTrain(){
	    return $this->pulseTrain;
	}

	// Pause Length
	public function setPauseLength($value){
	    $this->pauseLength = $value;
	}
	public function getPauseLength(){
	    return $this->pauseLength;
	}

	// Pulse With Us
	public function setPulseWithUs($value){
	    $this->pulseWithUs = $value;
	}
	public function getPulseWithUs(){
	    return $this->pulseWithUs;
	}

	// Energy Mj
	public function setEnergyMj($value){
	    $this->energyMj = $value;
	}
	public function getEnergyMj(){
	    return $this->energyMj;
	}

	// REFER
	// Cure
	public function setCured($value){
	    $this->energyMj = $value;
	}
	public function getCure(){
	    return $this->cur;
	}

        // Assign Percent
	public function setAssignPer($value){
	    $this->assignPer = $value;
	}
	public function getAssignPer(){
	    return $this->assignPer;
	}

        // Assign UID
	public function setAssignUid($value){
	    $this->assignUid = $value;
	}
	public function getAssignUid(){
	    return $this->assignUid;
	}

        // Accept Percent
	public function setAcceptPer($value){
	    $this->acceptPer = $value;
	}
	public function getAcceptPer(){
	    return $this->acceptPer;
	}

        // Accept UID
	public function setAcceptUid($value){
	    $this->acceptUid = $value;
	}
	public function getAcceptUid(){
	    return $this->acceptUid;
	}
	// ==========protocol=========
				// protocol id
	public function setProtocolId($value){
	    $this->protocol_id = $value;
	}
	public function getProtocolId(){
	    return $this->protocol_id;
	}
				// protocol surgeon
	public function setProtocolSurgeon($value){
	    $this->protocol_surgeon = $value;
	}
	public function getProtocolSurgeon(){
	    return $this->protocol_surgeon;
	}
				// protocol anesthesia
	public function setProtocolAnesthesia($value){
	    $this->protocol_anesthesia = $value;
	}
	public function getProtocolAnesthesia(){
	    return $this->protocol_anesthesia;
	}
				// protocol surgeon helper
	public function setProtocolHelper($value){
	    $this->protocol_surgeon_helper = $value;
	}
	public function getProtocolHelper(){
	    return $this->protocol_surgeon_helper;
	}
				// protocol Neo doctor
	public function setProtocolNeoDoctor($value){
	    $this->protocol_neo_doctor = $value;
	}
	public function getProtocolNeoDoctor(){
	    return $this->protocol_neo_doctor;
	}
				// protocol midwife
	public function setProtocolMidult($value){
	    $this->protocol_midwidfe = $value;
	}
	public function getProtocolMidult(){
	    return $this->protocol_midwidfe;
	}

	// =========== User =================
	public function setUserId($value){
	    $this->userId = $value;
	}
	public function getUserId(){
	    return $this->userId;
	}

        public function setUsername($value) {
            $this->username = $value;
        }
        public function getUsername(){
            return $this->username;
        }

        public function setPasswd($value){
            $this->passwd = $value;
        }
        public function getPasswd(){
            return $this->passwd;
        }

        public function setSex($value){
            $this->sex = $value;
        }
        public function getSex(){
            return $this->sex;
        }

        public function setTime($value){
            $this->time = $value;
        }
        public function getTime(){
            return $this->time;
        }

        public function setDob($value){
            $this->dob = $value;
        }
        public function getDob(){
            return $this->dob;
        }

        public function setWeight($value){
            $this->weight = $value;
        }
        public function getWeight(){
            return $this->weight;
        }

        public function setBackground($value) {
            $this->background = $value;
        }
        public function getBackground(){
            return $this->background;
        }

        public function setStatus($value) {
            $this->status = $value;
        }
        public function getStatus() {
            return $this->status;
        }

        public function setWorkplace($value) {
            $this->workplace = $value;
        }
        public function getWorkplace() {
            return $this->workplace;
        }

        public function setPermissionSection($value) {
            $this->permissionSection = $value;
        }
        public function getPermissionSection() {
            return $this->permissionSection;
        }

        public function setCode($value) {
            $this->keyCode = $value;
        }
        public function getCode() {
            return $this->keyCode;
        }


        public function setChartStorageRoom($value) {
            $this->chartStorageRoom = $value;
        }
        public function getChartStorageRoom() {
            return $this->chartStorageRoom;
        }

        public function setPatientRoom($value) {
            $this->patientRoom = $value;
        }
        public function getPatientRoom() {
            return $this->patientRoom;
        }

	public function setExamination($value) {
            $this->examination = $value;
        }
        public function getExamination() {
            return $this->examination;
        }

	public function setWaittingOpen($value) {
            $this->waittingOpen = $value;
        }
        public function getWaittingOpen() {
            return $this->waittingOpen;
        }

        public function setWaittingId($value) {
            $this->waittingId = $value;
        }
        public function getWaittingId() {
            return $this->waittingId;
        }

        public function setReady($value) {
            $this->ready = $value;
        }
        public function getReady() {
            return $this->ready;
        }

	public function setDoctor($value) {
            $this->doctor = $value;
        }
        public function getDoctor() {
            return $this->doctor;
        }
		public function setCheckOut($value) {
            $this->checkOut = $value;
        }
        public function getCheckOut() {
            return $this->checkOut;
        }
		public function setCheckNeo($value) {
            $this->checkNeo = $value;
        }
        public function getCheckNeo() {
            return $this->checkNeo;
        }

	public function setDoctorId($value) {
            $this->doctorId = $value;
        }
        public function getDoctorId() {
            return $this->doctorId;
        }


}
?>
