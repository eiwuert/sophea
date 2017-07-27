<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds protocol
class Protocols extends Securities {

		// Define Index of Unit Fucntion
		public function index() {
			    // Check Session
			    $this->checkSession();
		        // $this->permissionSection('mProtocol');
		        // $this->checkPermission();
		        $data = array();
		        // Get Item Per Page
			    $data['item_per_page'] = $this->getSysConfig();
			    // Get Count All Product
			    $data['totals'] = $this->ProtocolModel->getCountProtocol();
	            // Get Translate Word to View
	            $data = $this->getTranslate($data);

	            // Load View
	            $this->LoadView('template/header',$data);
	            $this->LoadView('template/topmenu');
	            $this->LoadView('template/sidebar');
	            $this->LoadView('protocols/list');
	            $this->LoadView('template/footer');
        }

		// ===================== JSON DATA ========================== //
	    function get_protocol_list(){

		    // Check Session
		    $this->checkSession();

		    $this->ProtocolModel->setSearch($this->getPost('search_data'));
		    $this->ProtocolModel->setStart($this->getPost('page_start'));
		    $this->ProtocolModel->setLimit($this->getPost('page_limit'));
		    $datas = $this->ProtocolModel->getAllProtocol();
		    $this->restData($datas);
		}
		function get_protocol_info_by_id_json(){
		    // Check Session
		    $this->checkSession();
		    $this->ProtocolModel->setId($this->getUrlSegment3());
		    $datas = $this->ProtocolModel->getProtocolById();
		    $this->restData($datas);
		}




        function save_protocols(){
		    // Check Session
		    $this->checkSession();

		    $this->ProtocolModel->setId($this->getPost('protocolsId'));
		    $this->ProtocolModel->setTitle($this->getPost('protocolsTitle'));
		    $this->ProtocolModel->setDesc($this->getPost('protocolsDesc'));

				if($this->getPost('protocolsId') == NULL || $this->getPost('protocolsId') == ""){
						$this->ProtocolModel->add();
		    }else{
			    	$this->ProtocolModel->update();
		    }
		}
		// Delete Product
        function delete_protocols(){
				    // Check Session
				    $this->checkSession();
            $this->ProtocolModel->setId($this->getUrlSegment3());
            $this->ProtocolModel->delete();

            // Write Log in to log file
            $this->logs('3', 'Delete '.$this->getUrlSegment1().' Product From List');
            $this->logs('4', 'Delete '.$this->getUrlSegment1().' Product From List');
        }

				function getEditDesc(){
						$this->checkSession();
						$this->ProtocolModel->setId($this->getUrlSegment3());
						$this->ProtocolModel->setDesc($this->getPost('desc'));
						$this->ProtocolModel->updateDesc();
				}








































	// Get Product Json Data By Name
        function get_count_all_product(){

	    // Check Session
	    $this->checkSession();
            $datas = $this->ProtocolModel->getCountProduct();
	    $this->restData($datas);
        }

	function get_count_product(){
	    $this->ProtocolModel->setTypeId('9');
	    $this->get_count_all_product();
	}

	function get_count_service(){
	    $this->ProtocolModel->setTypeId('7');
	    $this->get_count_all_product();
	}

	// Get Product Json Data By Name
        function get_product_by_name_json(){

	    // Check Session
	    $this->checkSession();

            $datas = $this->ProtocolModel->getProductInfoByName();
            $this->restData($datas);
        }

	function product_auto_complete(){

	    // Check Session
	    $this->checkSession();

	    $this->ProtocolModel->setName(urldecode($this->getUrlSegment3()));
	    $this->ProtocolModel->setTypeId('2');
	    $this->get_product_by_name_json();
	}

	function service_auto_complete(){

	    // Check Session
	    $this->checkSession();

	    $this->ProtocolModel->setName(urldecode($this->getUrlSegment3()));
	    $this->ProtocolModel->setTypeId('4');
	    $this->get_product_by_name_json();
	}

        // #################### Translate ####################### //
        // Translate to View
        function getTranslate($data = null){
            // Define Default Language from Security to view
            @$data = $this->defTranslation($data);
            // Translate
            $data['edit'] = $this->Lang('update');
            $data['delete'] = $this->Lang('delete');
            $data['c_no'] = $this->lang('c_no');
            $data['title'] = $this->Lang('title');
            $data['list'] = $this->Lang('list');
            $data['create'] = $this->Lang('create');
            $data['desc'] = $this->Lang('desc');
            $data['c_total'] = $this->Lang('total');

            // Menu Active
            $data['ac_protocol'] = 'active';
            return $data;
        }


}
?>
