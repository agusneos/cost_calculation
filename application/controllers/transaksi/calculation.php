<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calculation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/m_calculation','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('transaksi/v_calculation');
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
    
    function getCustomer()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->getCustomer();
    }
    function enumJenis()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Jenis');
    }
 	
    function enumCurrency()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Currency');
    }
	
    function getWireCode($dia=null)
    {
        $auth   = new Auth();
        $auth->restrict();

        if(!isset($_POST))	
        show_404();

        echo $this->record->getWireCode($dia);
    }
    
    function getSesData()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $query = $this->record->getSesData();        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Scrap'=>$data->Scrap,'Exch_rate'=>$data->Exch_rate));
        }
    }
    
    function updateSesData()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $Scrap      = addslashes($_POST['Scrap']);
        $Exch_rate  = addslashes($_POST['Exch_rate']);
        
        if($this->record->updateSesData($Scrap, $Exch_rate))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    
     function getWasher1()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->getWasher1();
    }
	
     function getWasher2()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->getWasher2();
    }
}
/* End of file calculation.php */
/* Location: ./application/controllers/transaksi/calculation.php */