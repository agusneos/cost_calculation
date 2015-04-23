<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rolling extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/tools/m_rolling','record');
    }
    
    function index()
    {
        $auth       = new Auth();
         // mencegah user yang belum login untuk mengakses halaman ini
        $auth->restrict();
        
        if (isset($_GET['grid'])) 
            echo $this->record->index();        
         else 
            $this->load->view('master/tools/v_rolling');        
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
        
        for ($i = 1; $i <= $baris; $i++)
        {
           $Category2       	= $data['cells'][$i][1];
           $Diameter	        = $data['cells'][$i][2];
           $Min_panjang         = $data['cells'][$i][3];
           $Max_panjang	        = $data['cells'][$i][4];
           $Cost		= $data['cells'][$i][5];
	   $Currency		= $data['cells'][$i][6];
           $Tgl_update          = $data['cells'][$i][7];
           $query = $this->record->upload($Category2, $Diameter, $Min_panjang,
                                        $Max_panjang, $Cost, $Currency, $Tgl_update);
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
        echo json_encode(array('success'=>true,
                                'total'=>'Total Data: '.($baris),
                                'ok'=>'Data OK: '.$ok,
                                'ng'=>'Data NG: '.$ng));
    }

}

/* End of file rolling.php */
/* Location: ./application/controllers/master/tools/rolling.php */