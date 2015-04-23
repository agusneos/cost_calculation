<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cutting_mchn extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/machine/m_cutting_mchn','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/machine/v_cutting_mchn');        
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
    
    function update($Kode_mchncutt=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->update($Kode_mchncutt))
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

        $Kode_mchncutt = addslashes($_POST['Kode_mchncutt']);
        if($this->record->delete($Kode_mchncutt))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    
}

/* End of file cutting_mchn.php */
/* Location: ./application/contcutters/master/machine/cutting_mchn.php */