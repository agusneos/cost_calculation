<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pressing_mchn extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/machine/m_pressing_mchn','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/machine/v_pressing_mchn');        
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
    
    function update($Kode_mchnpress=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->update($Kode_mchnpress))
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

        $Kode_mchnpress = addslashes($_POST['Kode_mchnpress']);
        if($this->record->delete($Kode_mchnpress))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    
}

/* End of file pressing_mchn.php */
/* Location: ./application/controlers/master/machine/pressing_mchn.php */