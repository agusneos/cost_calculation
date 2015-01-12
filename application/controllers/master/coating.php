<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coating extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/m_coating','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/v_coating');        
    } 
    
    function create()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->create())
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }     
    
    function update($Id=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->update($Id))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
        
    function delete()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        $Id = addslashes($_POST['Id']);
        if($this->record->delete($Id))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    
	function getSupplier()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->getSupplier();
	}
	
    function enumCurrency()
	    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Currency');
    }
                
}

/* End of file coating.php */
/* Location: ./application/controllers/master/coating.php */