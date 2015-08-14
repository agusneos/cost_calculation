<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalculationPI extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/m_calculationPI','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('transaksi/v_calculationPI');
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
     
    function enumCalculationPI()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Approval_Mkt_Mgr');
    }
    function print_calculation()
    {
        $auth = new Auth();
        $auth->restrict();
       
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $Id = $this->uri->segment(4);
        $data['calculation'] = $this->record->get_calculation_by_id($Id);
        $this->load->view('transaksi/print_calculation.php',$data);
    }
}
/* End of file calculationPI.php */
/* Location: ./application/controllers/transaksi/calculationPI.php */