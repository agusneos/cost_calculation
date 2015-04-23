<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_rolling extends CI_Model
{    
    static $table = 'tools_rolling';
     
    public function __construct() {
        parent::__construct();
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'Id';
        $order  = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        
        $filterRules = isset($_POST['filterRules']) ? ($_POST['filterRules']) : '';
	$cond = '1=1';
	if (!empty($filterRules)){
            $filterRules = json_decode($filterRules);
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
       
        $this->db->select('a.Id AS Id, Category2, Diameter, Min_panjang, Max_panjang, Cost, Currency, Tgl_update, Active');
        $this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table.' a');
        $total  = $this->db->count_all_results();
        
	$this->db->select('a.Id AS Id, Category2, Diameter, Min_panjang, Max_panjang, Cost, Currency, Tgl_update, Active');
	$this->db->where($cond, NULL, FALSE);
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        $query  = $this->db->get(self::$table.' a');
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }

        $result = array();
	$result['total']    = $total;
	$result['rows']     = $data;
        
        return json_encode($result);          
    }
        
    function upload($Category2, $Diameter, $Min_panjang,
                    $Max_panjang, $Cost, $Currency, $Tgl_update)
    {
		date_default_timezone_set('Asia/Jakarta');
        $Tgl_update = date("Y-m-d",($Tgl_update - 25569)*86400);
		
		$this->db->where('Category2', $Category2)
				 ->where('Diameter', $Diameter)
				 ->where('Min_panjang', $Min_panjang)
				 ->where('Max_panjang', $Max_panjang)
				 ->where('Cost', $Cost)
				 ->where('Currency', $Currency)
				 ->where('Tgl_update', $Tgl_update);
       $resA = $this->db->get(self::$table);
		
            $this->db->where('Category2', $Category2)
				 ->where('Diameter', $Diameter)
				 ->where('Min_panjang', $Min_panjang)
				 ->where('Max_panjang', $Max_panjang)
				 ->where('Currency', $Currency);         
       $res = $this->db->get(self::$table);
		
		if($resA->num_rows == 0)
        {
                    if($res->num_rows == 0)
                    {
				
			return $this->db->insert(self::$table,array(
				'Category2'=>$Category2,
				'Diameter'=>$Diameter,
				'Min_panjang'=>$Min_panjang,
				'Max_panjang'=>$Max_panjang,
				'Cost'=>$Cost,
				'Currency'=>$Currency,
				'Tgl_update'=>$Tgl_update
			)); 
                    }
                     else
                    {
                        $this->db->where('Category2', $Category2)
				 ->where('Diameter', $Diameter)
				 ->where('Min_panjang', $Min_panjang)
				 ->where('Max_panjang', $Max_panjang)
				 ->where('Currency', $Currency);
                        $this->db->update(self::$table,array(
                            'Active'	=> 'NO'    
                         ));
                        return $this->db->insert(self::$table,array(
				'Category2'=>$Category2,
				'Diameter'=>$Diameter,
				'Min_panjang'=>$Min_panjang,
				'Max_panjang'=>$Max_panjang,
				'Cost'=>$Cost,
				'Currency'=>$Currency,
				'Tgl_update'=>$Tgl_update
			)); 
                    }
        }
        else
        {    
            return false;
        }
		
		       
    }
}

/* End of file m_rolling.php */
/* Location: ./application/models/master/tools/m_rolling.php */