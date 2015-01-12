<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wire extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/m_wire','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/v_wire');
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
    
	function getTypeWire()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        echo $this->record->getTypeWire();
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
	
	function upload()
    {
        $auth   = new Auth();
        $auth->restrict();
        
        move_uploaded_file($_FILES["file"]["tmp_name"],
                "assets/temp_upload/" . $_FILES["file"]["name"]);
        $this->load->library('excel_reader');
        $this->excel_reader->setOutputEncoding('CP1251');
        $this->excel_reader->read('assets/temp_upload/' . $_FILES["file"]["name"]);
        error_reporting(E_ALL ^ E_NOTICE);
        
        // Get the contents of the first worksheet
        $data = $this->excel_reader->sheets[0];
        
        // jumlah baris
        $baris  = $data['numRows'];
        $ok = 0;
        $ng = 0;
        
        for ($i = 2; $i <= $baris; $i++)
        {
           $Kode_Supp	        = $data['cells'][$i][1];
           $Grade		= $data['cells'][$i][2];
           $Min_dia             = $data['cells'][$i][3];
           $Max_dia		= $data['cells'][$i][4];
           $Type		= $data['cells'][$i][5];
           $Jenis               = $data['cells'][$i][6];
           $Price		= $data['cells'][$i][7];
           $Currency	        = $data['cells'][$i][8];
           $Tgl_update		= $data['cells'][$i][9];
           $query = $this->record->upload($Kode_Supp, $Grade, $Min_dia,$Max_dia,
                                           $Type, $Jenis, $Price, $Currency,$Tgl_update);
           if ($query)
           {
               $ok++;
           }
           else
           {
               $ng++;
           }
        }
        unlink('assets/temp_upload/' . $_FILES["file"]["name"]);
        echo json_encode(array('success'=> true,
                                'total' => 'Total Data: '.($baris-1),
                                'ok'    => 'Data OK: '.$ok,
                                'ng'    => 'Data NG: '.$ng));
    }
}
/* End of file wire.php */
/* Location: ./application/controllers/master/wire.php */