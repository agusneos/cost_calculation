<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_calculationAppMktMgr extends CI_Model
{    
    static $table       = 'calculation';
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'a.Approval_Mkt_Mgr';
        $order  = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        
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
        $this->db->select('a.Id AS Id, a.*');
        //$this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
	$this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table.' a');
        $total  = $this->db->count_all_results();
        
	$this->db->select('a.Id AS Id, a.*');
        //$this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
	$this->db->where($cond, NULL, FALSE)
                 ->where('Approval_Acc_Mgr', 'OK' )
                 ->where('Approval_Mkt_Staff', 'OK' )
                 ->where('Approval_Mkt_Mgr','');
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
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
    function approve($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->update(self::$table,array(
            'Approval_Mkt_Mgr'=>$this->input->post('Approval_Mkt_Mgr',true),
            'Note_Mkt_Mgr'=>$this->input->post('Note_Mkt_Mgr',true)
            
        ));
    }
    function enumField($field)
    {
        $enums = field_enums(self::$table, $field);
        return json_encode($enums);
    }    
}
    

    
/* End of file m_calculationAppMktMgr.php */
/* Location: ./application/models/transaksi/m_calculationAppMktMgr.php */