<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalculationAppAccMgr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/m_calculationAppAccMgr','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('transaksi/v_calculationAppAccMgr');
    }
    
    function approve($Id=null)
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();

        if($this->record->approve($Id))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
     
    function enumCalculationAppAccMgr()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Approval_Acc_Mgr');
    }
}
/* End of file calculationAppAccMgr.php */
/* Location: ./application/controllers/transaksi/calculationAppAccMgr.php */