<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_rolling_mchn extends CI_Model
{    
    static $table = 'machine_rolling';
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 30;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'Kode_mchnroll';
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
        
    function create()
    {
        return $this->db->insert(self::$table,array(
            'Kode_mchnroll'=>$this->input->post('Kode_mchnroll',true),
            'Gol_mchn_roll'=>$this->input->post('Gol_mchn_roll',true),
            'Dia_nominal'=>$this->input->post('Dia_nominal',true),
            'Length_range'=>$this->input->post('Length_range',true),
            'Mchn_rolling'=>$this->input->post('Mchn_rolling',true),
            'Mchn_price'=>$this->input->post('Mchn_price',true),
            'Depr_per_month'=>$this->input->post('Depr_per_month',true),
            'Output_per_min'=>$this->input->post('Output_per_min',true),
            'Working_time'=>$this->input->post('Working_time',true),
            'Working_time_sec'=>$this->input->post('Working_time_sec',true),
            'Output_per_day'=>$this->input->post('Output_per_day',true),
            'Output_per_month'=>$this->input->post('Output_per_month',true),
            'Productivity_ratio'=>$this->input->post('Productivity_ratio',true),
            'Prod_plan_month'=>$this->input->post('Prod_plan_month',true),
            'Cycle_time'=>$this->input->post('Cycle_time',true),
            'Dandori_time'=>$this->input->post('Dandori_time',true),
            'Rolling_depr_cost'=>$this->input->post('Rolling_depr_cost',true)
        ));
    }
    
    function update($Kode_mchnroll)
    {
        $this->db->where('Kode_mchnroll', $Kode_mchnroll);
        return $this->db->update(self::$table,array(
            'Gol_mchn_roll'=>$this->input->post('Gol_mchn_roll',true),
            'Dia_nominal'=>$this->input->post('Dia_nominal',true),
            'Length_range'=>$this->input->post('Length_range',true),
            'Mchn_rolling'=>$this->input->post('Mchn_rolling',true),
            'Mchn_price'=>$this->input->post('Mchn_price',true),
            'Depr_per_month'=>$this->input->post('Depr_per_month',true),
            'Output_per_min'=>$this->input->post('Output_per_min',true),
            'Working_time'=>$this->input->post('Working_time',true),
            'Working_time_sec'=>$this->input->post('Working_time_sec',true),
            'Output_per_day'=>$this->input->post('Output_per_day',true),
            'Output_per_month'=>$this->input->post('Output_per_month',true),
            'Productivity_ratio'=>$this->input->post('Productivity_ratio',true),
            'Prod_plan_month'=>$this->input->post('Prod_plan_month',true),
            'Cycle_time'=>$this->input->post('Cycle_time',true),
            'Dandori_time'=>$this->input->post('Dandori_time',true),
            'Rolling_depr_cost'=>$this->input->post('Rolling_depr_cost',true)
        ));
    }
    
    function delete($Kode_mchnroll)
    {
        return $this->db->delete(self::$table, array('Kode_mchnroll' => $Kode_mchnroll)); 
    }
    
    function enumField($field)
    {
        $enums = field_enums(self::$table, $field);
        return json_encode($enums);
    }
    
}

/* End of file m_rolling_mchn.php */
/* Location: ./application/models/master/machine/m_rolling_mchn.php */