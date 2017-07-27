<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include DAO Class
include_once 'Datastructure.php';

// Define Protocol Class
class Protocol extends Datastructure{

	// Get All Protocol
	function getAllProtocol() {
            $select = '';
            $from = $this->getTblProtocol();
            $where = ' protocols_deleted = 0';
            if($this->getSearch() <> '' || $this->getSearch() != ''){
                $where .= " AND (protocols_title LIKE '%".$this->getSearch()."%') ";
            }
            $where .= " ORDER BY protocols_title ASC";
            return $this->executeQuery($select, $from, $where);
	}
	// Get Count All Protocol
	function getCountProtocol() {
		$where = " protocols_deleted = 0";
		return $this->getCountWhere($this->getTblProtocol(), $where);
	}
	// Get protocol Info by ID
	function getProtocolById(){
		return $this->executeQuery('', $this->getTblProtocol(), ' protocols_id = '.$this->getId().' AND protocols_deleted = 0');
	}

	// Add or Insert Protocols
	function add(){
		$this->insertData($this->getTblProtocol(),$this->getArrayDatas());
	}

	// Update Protocls
	function update(){
		$this->updateData($this->getTblProtocol(),$this->getArrayDatas(), 'protocols_id', $this->getId());
	}

	// Update Protocls
	function updateDesc(){
		$this->updateData($this->getTblProtocol(),array('protocols_desc' => $this->getDesc()), 'protocols_id', $this->getId());
	}

	//Array data for Insert and Update
    function getArrayDatas(){
		$this->setArrayData('protocols_id',$this->getId());
		$this->setArrayData('protocols_title',$this->getTitle());
		$this->setArrayData('protocols_desc',$this->getDesc());
		return $this->getArrayData();
    }
    // Delete Product go to trash
	function delete(){
		$this->updateData($this->getTblProtocol(), array('protocols_deleted' => "1"), 'protocols_id', $this->getId());
	}























	// Get All Protocol REST Data By Name
	function getProductInfoByName() {
            $select = " CONCAT( `products_name` , '-', `products_code`, '-', `units_name`,'-', `products_price`,'-', `products_desc` ) AS value";
            $from = $this->getTblProtocol()." AS pr";
	    $from .= " JOIN ". $this->getTblCategory() ." AS ca ON ca.categories_id = pr.categories_id";
	    $from .= " JOIN ". $this->getTblUnit() ." AS un ON un.units_id = pr.units_id";
	    $from .= " JOIN ". $this->getTblType() ." AS ty ON ty.types_id = ca.types_id";
            $where = " products_deleted = 0 ";
            if($this->getName() <> '' || $this->getName() != ''){
                $where .= " AND (products_name LIKE '%".$this->getName()."%' OR products_code LIKE '%".$this->getName()."%') AND ty.types_id = ".$this->getTypeId();
            }

            return $this->executeQuery($select, $from, $where);
	}
	function getPruductIdByName(){
	    $result = $this->executeQuery(' products_id', $this->getTblProtocol()," products_name = '".$this->getProductCode()."'");
	    foreach ($result as $row){
		return $row->products_id;
	    }
	}
	// Get User Autor Complete
	function getProtocolsInfoByName(){
			$select = " protocols_title AS value, protocols_id AS protocols_id";
			$from = $this->getTblProtocol();
			$where = " protocols_deleted = 0 AND ( protocols_title LIKE '".$this->getName()."%' COLLATE utf8_bin )";
			return $this->executeQuery($select, $from, $where);
	}
	function getProtocolsInfo(){
			$select = '';
			$from = $this->getTblProtocol();
			$where = " protocols_title ='".$this->getSearch()."'";
			return $this->executeQuery($select, $from, $where);
	}

}
?>
