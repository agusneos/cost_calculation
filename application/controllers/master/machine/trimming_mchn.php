<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trimming_mchn extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/machine/m_trimming_mchn','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/machine/v_trimming_mchn');        
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
    
    function update($Kode_mchntrimm=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->update($Kode_mchntrimm))
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

        $Kode_mchntrimm = addslashes($_POST['Kode_mchntrimm']);
        if($this->record->delete($Kode_mchntrimm))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    
}

/* End of file trimming_mchn.php */
/* Location: ./application/controller/master/machine/trimming_mchn.php */