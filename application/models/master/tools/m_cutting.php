<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_cutting extends CI_Model
{    
    static $table = 'tools_cutting';
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 30;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'Id';
        $order  = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        
        $filterRules = isset($_POST['filterRules']) ? ($_POST['filterRules']) : '';
	$cond = '1=1';
	if (!empty($filterRules)){
            $filterRules = json_decode($filterRules);
            //print_r ($filterRules);
            foreach($filterRules as $rule){
                $rule = get_object_vars($rule);
                $field = $rule['field'];
                $op = $rule['op'];
                $value = $rule['value'];
                if (!empty($value)){
                    if ($op == 'contains'){
                        $cond .= " and ($field like '%$value%')";
                    } else if ($op == 'beginwith'){
                        $cond .= " and ($field like '$value%')";
                    } else if ($op == 'endwith'){
                        $cond .= " and ($field like '%$value')";
                    } else if ($op == 'equal'){
                        $cond .= " and $field = $value";
                    } else if ($op == 'notequal'){
                        $cond .= " and $field != $value";
                    } else if ($op == 'less'){
                        $cond .= " and $field < $value";
                    } else if ($op == 'lessorequal'){
                        $cond .= " and $field <= $value";
                    } else if ($op == 'greater'){
                        $cond .= " and $field > $value";
                    } else if ($op == 'greaterorequal'){
                        $cond .= " and $field >= $value";
                    } 
                }
            }
	}
        
        $this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table);
        $total  = $this->db->count_all_results();
        
        $this->db->where($cond, NULL, FALSE);
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        $query  = $this->db->get(self::$table);
                   
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
      
    function enumField($field)
    {
        $enums = field_enums(self::$table, $field);
        return json_encode($enums);
    }
    
    function create()
    {
        $Diameter   = $this->input->post('Diameter',true);
        $Min_panjang = $this->input->post('Min_panjang',true);
        $Max_panjang = $this->input->post('Max_panjang',true);
        $Cost       = $this->input->post('Cost',true);
        $Currency   = $this->input->post('Currency',true);
        $Tgl_Update = $this->input->post('Tgl_Update',true);
        
       
        $this->db->where('Diameter', $Diameter)
                 ->where('Min_panjang', $Min_panjang)
                 ->where('Max_panjang', $Max_panjang)
                 ->where('Cost', $Cost)
                 ->where('Currency', $Currency)
                 ->where('Tgl_update', $Tgl_Update);
        $resA = $this->db->get(self::$table);
        
        $this->db->where('Diameter', $Diameter)
                 ->where('Min_panjang', $Min_panjang)
                 ->where('Max_panjang', $Max_panjang)
                 ->where('Currency', $Currency);
        $res = $this->db->get(self::$table);
        
         if($resA->num_rows == 0)
        {
            if($res->num_rows == 0)
            {			
                return $this->db->insert(self::$table,array(
                    'Diameter'	 => $Diameter,
                    'Min_panjang'=> $Min_panjang,
                    'Max_panjang'=> $Max_panjang,
                    'Currency'	 => $Currency,
                    'Cost'	 => $Cost,
                    'Tgl_Update' => $Tgl_Update      
                ));
            }
            else
            {
                $this->db->where('Diameter', $Diameter)
                        ->where('Min_panjang', $Min_panjang)
                        ->where('Max_panjang', $Max_panjang)
                        ->where('Currency', $Currency);
                $this->db->update(self::$table,array(
                        'Active'	=> 'NO'    
                ));

                return $this->db->insert(self::$table,array(
                    'Diameter'	 => $Diameter,
                    'Min_panjang'=> $Min_panjang,
                    'Max_panjang'=> $Max_panjang,
                    'Cost'	=> $Cost,
                    'Currency'	=> $Currency,
                    'Tgl_update'=> $Tgl_Update      
                ));
            }
        }
        else
        {
            return false;
        }
    }
    
    function update($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->update(self::$table,array(
            'Diameter'   =>$this->input->post('Diameter',true),
            'Min_panjang'=>$this->input->post('Min_panjang',true),
            'Max_panjang'=>$this->input->post('Max_panjang',true),
            'Cost'       =>$this->input->post('Cost',true),
            'Currency'   =>$this->input->post('Currency',true),
            'Tgl_Update' =>$this->input->post('Tgl_Update',true)        
        ));
    }
    
    function delete($Id)
    {
        return $this->db->delete(self::$table, array('Id' => $Id)); 
    }
    
    
    
}

/* End of file m_cutting.php */
/* Location: ./application/models/master/m_cutting.php */