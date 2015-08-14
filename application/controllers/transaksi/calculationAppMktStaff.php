<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalculationAppMktStaff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/m_calculationAppMktStaff','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('transaksi/v_calculationAppMktStaff');
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
            echo json_encode(array('Category1'=>$data->Category1, 'htc'=>$data->Cost, 'Currency'=>$data->Currency));
        }
    }
    function getHeading2()
    {
        $auth       = new Auth();
        $auth->restrict();        
        if(!isset($_POST))	
            show_404();
        $typescrhead2        = addslashes($_POST['typescrhead2']);
        $dianom2             = addslashes($_POST['dianom2']);               
        $query = $this->record->getHeading2($typescrhead2, $dianom2);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('htc2'=>$data->Price_pcs, 'Currency'=>$data->Currency));
        }
    }
    function getHeading4()
    {
        $auth       = new Auth();
        $auth->restrict();        
        if(!isset($_POST))	
            show_404();
        $typescrhead4        = addslashes($_POST['typescrhead4']);
        $dianom4             = addslashes($_POST['dianom4']);               
        $query = $this->record->getHeading4($typescrhead4, $dianom4);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('htc4'=>$data->Price_pcs, 'Currency'=>$data->Currency));
        }
    }
    function getDataHeading()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $kode_mesin      = addslashes($_POST['kode_mesin']);
        
        
        $query = $this->record->getDataHeading($kode_mesin);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Dandori'=>$data->Dandori_time, 'ct'=>$data->Cycle_time, 'wt'=>$data->Working_time, 'wtsh'=>$data->Working_time_sec));
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
    function getDataRolling()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $kode_mesin2      = addslashes($_POST['kode_mesin2']);
        
        
        $query = $this->record->getDataRolling($kode_mesin2);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Dandori2'=>$data->Dandori_time, 'ct2'=>$data->Cycle_time, 'wt2'=>$data->Working_time, 'wtsr'=>$data->Working_time_sec));
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
    function getDataCutting()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $kode_mesin3      = addslashes($_POST['kode_mesin3']);
        
        
        $query = $this->record->getDataRolling($kode_mesin3);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Dandori3'=>$data->Dandori_time, 'ct3'=>$data->Cycle_time, 'wt3'=>$data->Working_time, 'wtsc'=>$data->Working_time_sec));
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
    function getDataSlotting()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $kode_mesin4      = addslashes($_POST['kode_mesin4']);
        
        
        $query = $this->record->getDataSlotting($kode_mesin4);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Dandori4'=>$data->Dandori_time, 'ct4'=>$data->Cycle_time, 'wt4'=>$data->Working_time, 'wtss'=>$data->Working_time_sec));
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
    function getDataTrimming()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $kode_mesin5      = addslashes($_POST['kode_mesin5']);
        
        
        $query = $this->record->getDataTrimming($kode_mesin5);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Dandori5'=>$data->Dandori_time, 'ct5'=>$data->Cycle_time, 'wt5'=>$data->Working_time, 'wtst'=>$data->Working_time_sec));
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
            echo json_encode(array('Id'=>$data->Id,'gpy'=>$data->Gaji_per_year, 'hppy' =>$data->Hasilprod_per_tahun, 'jl'=>$data->Jumlah_labor));
        }
    }
    
    function getGajiTurret()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $query = $this->record->getGajiTurret();        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('gaji'=>$data->Gaji,'estimasi'=>$data->Estimasi,'working_day'=>$data->Working_day,'working_hour'=>$data->Working_hour));
        }
    }
    
    function getBiaya()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $proses            = addslashes($_POST['proses']);

        
        $query = $this->record->getBiaya($proses);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'bpy'=>$data->Biaya_per_year, 'hppy' =>$data->Hasilprod_per_tahun));
        }
    }
    function getFurnace()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getFurnace();
    
    }
    function getPlating()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getPlating();
    
    }
    function getBaking()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $proses            = addslashes($_POST['proses']);

        
        $query = $this->record->getBaking($proses);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'Kode_Supp'=>$data->Kode_Supp,'Name'=>$data->Name,'Price'=>$data->Price,'Currency'=>$data->Currency));
        }
    } 
    function getCuci()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
        
        $proses            = addslashes($_POST['proses']);

        
        $query = $this->record->getCuci($proses);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Id'=>$data->Id,'Kode_Supp'=>$data->Kode_Supp,'Name'=>$data->Name,'Price'=>$data->Price,'Currency'=>$data->Currency));
        }
    }
    function getKode_assembly()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getKode_assembly();
    
    }
    function getCoating()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getCoating();
    
    }
    function getFurnace2()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getFurnace2();
    
    }
    function getTurret2()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
          show_404();
                   
        echo $this->record->getTurret2();
    
    }
    function approve($Id=null)
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $query = $this->record->approve($Id);        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Approval_Mkt_Staff'=>$data->Approval_Mkt_Staff,'Note_Mkt_Staff'=>$data->Note_Mkt_Staff));
        }
    }
    
    function approveSave()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $User                   = $this->session->userdata('nama');
        $Id                     = $this->input->post('Id',true);
        $Approval_Mkt_Staff     = $this->input->post('Approval_Mkt_Staff',true);
        $Note_Mkt_Staff         = $this->input->post('Note_Mkt_Staff',true);
          
        if($this->record->approveSave($Id, $Approval_Mkt_Staff, $Note_Mkt_Staff, $User))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }
    function enumCalculationAppMktStaff()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->enumField('Approval_Mkt_Staff');
    }
}
/* End of file calculationAppMktStaff.php */
/* Location: ./application/controllers/transaksi/calculationAppMktStaff.php */