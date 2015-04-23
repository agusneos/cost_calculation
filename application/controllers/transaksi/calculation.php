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
    
    function enumGolmesinhead()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumFieldMachineHeading('Gol_mchn_head');
    }
    
    function getHeadMchncode($gd=null)
    {
        $auth   = new Auth();
        $auth->restrict();

        $pecah  = explode('-', urldecode($gd));
        $golm   = $pecah[0];
        $dnom   = $pecah[1];
        
        if(!isset($_POST))	
        show_404();

        echo $this->record->getHeadMchncode($dnom,$golm);
    }
    function enumGolmesinroll()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumFieldMachineRolling('Gol_mchn_roll');
    }
    
    function getRollMchncode($gd2=null)
    {
        $auth   = new Auth();
        $auth->restrict();

        $pecah2  = explode('-', urldecode($gd2));
        $golm2   = $pecah2[0];
        $dnom2   = $pecah2[1];
        
        if(!isset($_POST))	
        show_404();

        echo $this->record->getRollMchncode($dnom2,$golm2);
    }
    
    function getCuttMchncode($dnom4=null)
    {
        $auth   = new Auth();
        $auth->restrict();

             
        if(!isset($_POST))	
        show_404();

        echo $this->record->getCuttMchncode($dnom4);
    }
    
    function getSlottMchncode($dnom5=null)
    {
        $auth   = new Auth();
        $auth->restrict();

             
        if(!isset($_POST))	
        show_404();

        echo $this->record->getSlottMchncode($dnom5);
    }
    
    function getTrimmMchncode($dnom6=null)
    {
        $auth   = new Auth();
        $auth->restrict();

             
        if(!isset($_POST))	
        show_404();

        echo $this->record->getTrimmMchncode($dnom6);
    }
    
    function getStraightenMchncode($dnom7=null)
    {
        $auth   = new Auth();
        $auth->restrict();

             
        if(!isset($_POST))	
        show_404();

        echo $this->record->getStraightenMchncode($dnom7);
    }
    
    function getPressMchncode($dnom8=null)
    {
        $auth   = new Auth();
        $auth->restrict();

             
        if(!isset($_POST))	
        show_404();

        echo $this->record->getPressMchncode($dnom8);
    }
    
    function getCategory()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $typescr        = addslashes($_POST['typescr']);
        $gol_mchn       = addslashes($_POST['gol_mchn']);
        $dia            = addslashes($_POST['dia']);
        $length         = addslashes($_POST['length']);
        
        $query = $this->record->getCategory($typescr, $gol_mchn, $dia, $length);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Category'=>$data->Category, 'htc'=>$data->Cost));
        }
    }
    
    function getCategory2()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $typescr2        = addslashes($_POST['typescr2']);
        $dia2            = addslashes($_POST['dia2']);
        $length2         = addslashes($_POST['length2']);
        
        $query = $this->record->getCategory2($typescr2, $dia2, $length2);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Category2'=>$data->Category2, 'rtc'=>$data->Cost));
        }
    }
    function getCutting()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $dia3            = addslashes($_POST['dia3']);
        $length3         = addslashes($_POST['length3']);
        
        $query = $this->record->getCutting($dia3, $length3);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'ctc'=>$data->Cost));
        }
    }
    function getSlotting()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $dia4            = addslashes($_POST['dia4']);
        $length4         = addslashes($_POST['length4']);
        
        $query = $this->record->getSlotting($dia4, $length4);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'stc'=>$data->Cost));
        }
    }
    function getTrimming()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $dia5            = addslashes($_POST['dia5']);
        $length5         = addslashes($_POST['length5']);
        
        $query = $this->record->getTrimming($dia5, $length5);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'ttc'=>$data->Cost));
        }
    }
    
   function getGaji()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $proses            = addslashes($_POST['proses']);

        
        $query = $this->record->getGaji($proses);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'gpy'=>$data->Gaji_per_year,'jl'=>$data->Jumlah_labor));
        }
    }
    
}
/* End of file calculation.php */
/* Location: ./application/controllers/transaksi/calculation.php */