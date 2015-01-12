<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_home extends CI_Model
{
    static $home        = 'home';
    
    public function __construct() {
        parent::__construct();
    }
 
    function index()
    {
	
        $this->db->select(self::$table.' a');
        $total  = $this->db->count_all_results();
        
	$this->db->select();
        $query  = $this->db->get(self::$table.' a');
		
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }
 
        $result = array();
	$result["total"] = $total;
	$result['rows'] = $data;
        
        return json_encode($result);          
    }      
          
}       
       
/* End of file m_home.php */
/* Location: ./application/models/m_home.php */