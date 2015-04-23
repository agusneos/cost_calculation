<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rolling_mchn extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/machine/m_rolling_mchn','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/machine/v_rolling_mchn');        
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
    
    function update($Kode_mchnroll=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->update($Kode_mchnroll))
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

        $Kode_mchnroll = addslashes($_POST['Kode_mchnroll']);
        if($this->record->delete($Kode_mchnroll))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    function enumGolmesin()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Gol_mchn_roll');
    }
}

/* End of file rolling_mchn.php */
/* Location: ./application/controllers/master/machine/rolling_mchn.php */