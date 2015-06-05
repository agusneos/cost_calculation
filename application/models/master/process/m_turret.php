<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_turret extends CI_Model
{    
    static $table = 'turret';
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }
    
    function getTurret()
    {        
       $this->db->select('Gaji, Estimasi, Working_day, Working_hour');
        return $this->db->get(self::$table); 
    }
    
    function update($Gaji, $Estimasi, $Working_day, $Working_hour)
    {
        return $this->db->update(self::$table,array(
            'Gaji'=>$Gaji,
            'Estimasi'=>$Estimasi,
            'Working_day'=>$Working_day,
            'Working_hour'=>$Working_hour
        ));
    }
}

/* End of file m_turret.php */
/* Location: ./application/models/master/process/m_turret.php */