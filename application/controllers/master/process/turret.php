<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turret extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/process/m_turret','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        $this->load->view('master/process/v_turret');        
    } 
    
    
    function getTurret()
    {
        $auth       = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $query = $this->record->getTurret();        
        foreach ($query->result() as $data)
        {
            echo json_encode(array('Gaji'=>$data->Gaji,'Estimasi'=>$data->Estimasi,'Working_day'=>$data->Working_day,'Working_hour'=>$data->Working_hour));
        }
    }
    function update()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        if(!isset($_POST))	
            show_404();
        
        $Gaji      = addslashes($_POST['Gaji']);
        $Estimasi  = addslashes($_POST['Estimasi']);
        $Working_day = addslashes($_POST['Working_day']);
        $Working_hour = addslashes($_POST['Working_hour']);
        
        if($this->record->update($Gaji,$Estimasi,$Working_day,$Working_hour))
        {
            echo json_encode(array('success'=>true));
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }    
                    
}

/* End of file turret.php */
/* Location: ./application/controllers/master/process/turret.php */