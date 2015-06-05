<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_heading2 extends CI_Model
{    
    static $table = 'tools_heading2';
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 30;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
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
        $Type_screw  = $this->input->post('Type_screw',true);
        $Diameter_nominal = $this->input->post('Diameter_nominal',true);
        $HD_Price  = $this->input->post('HD_Price',true);
        $HD_Lifetime = $this->input->post('HD_Lifetime',true);
        $HDI_Price  = $this->input->post('HDI_Price',true);
        $HDI_Lifetime = $this->input->post('HDI_Lifetime',true);
        $HDP_Price  = $this->input->post('HDP_Price',true);
        $HDP_Lifetime = $this->input->post('HDP_Lifetime',true);
        $HDC_Price  = $this->input->post('HDC_Price',true);
        $HDC_Lifetime = $this->input->post('HDC_Lifetime',true);
        $HR_Price  = $this->input->post('HR_Price',true);
        $HR_Lifetime = $this->input->post('HR_Lifetime',true);
        $S_Price  = $this->input->post('S_Price',true);
        $S_Lifetime = $this->input->post('S_Lifetime',true);
        $SP_Price  = $this->input->post('SP_Price',true);
        $SP_Lifetime = $this->input->post('SP_Lifetime',true);
        $SC_Price  = $this->input->post('SC_Price',true);
        $SC_Lifetime = $this->input->post('SC_Lifetime',true);
        $SB_Price  = $this->input->post('SB_Price',true);
        $SB_Lifetime = $this->input->post('SB_Lifetime',true);
        $CD_Price = $this->input->post('CD_Price',true);
        $CD_Lifetime = $this->input->post('CD_Lifetime',true);
        $CK_Price  = $this->input->post('CK_Price',true);
        $CK_Lifetime = $this->input->post('CK_Lifetime',true);
        $P_Price  = $this->input->post('P_Price',true);
        $P_Lifetime = $this->input->post('P_Lifetime',true);
        $SPu_Price  = $this->input->post('SPu_Price',true);
        $SPu_Lifetime = $this->input->post('SPu_Lifetime',true);
        $PP_Price  = $this->input->post('PP_Price',true);
        $PP_Lifetime = $this->input->post('PP_Lifetime',true);
        $PC_Price  = $this->input->post('PC_Price',true);
        $PC_Lifetime = $this->input->post('PC_Lifetime',true);
        $Price_pcs  = $this->input->post('Price_pcs',true);
        $Currency   = $this->input->post('Currency',true);
        $Tgl_update = $this->input->post('Tgl_update',true);
       
        $this->db->where('Type_screw', $Type_screw)
                 ->where('Diameter_nominal', $Diameter_nominal)
                 ->where('Currency', $Currency)
                 ->where('Tgl_update', $Tgl_update);
        $resA = $this->db->get(self::$table);
        
        $this->db->where('Type_screw', $Type_screw)
                 ->where('Diameter_nominal', $Diameter_nominal)
                 ->where('Currency', $Currency);
        $res = $this->db->get(self::$table);
        
        if($resA->num_rows == 0)
        {
            if($res->num_rows == 0)
            {			
                return $this->db->insert(self::$table,array(
                    'Type_screw' => $Type_screw,
                    'Diameter_nominal'	=> $Diameter_nominal,
                    'HD_Price' => $HD_Price,
                    'HD_Lifetime' => $HD_Lifetime,
                    'HDI_Price' => $HDI_Price,
                    'HDI_Lifetime' => $HDI_Lifetime,
                    'HDP_Price' => $HDP_Price,
                    'HDP_Lifetime' => $HDP_Lifetime,
                    'HDC_Price' => $HDC_Price,
                    'HDC_Lifetime' => $HDC_Lifetime,
                    'HR_Price' => $HR_Price,
                    'HR_Lifetime' => $HR_Lifetime,
                    'S_Price' => $S_Price,
                    'S_Lifetime' => $S_Lifetime,
                    'SP_Price' => $SP_Price,
                    'SP_Lifetime' => $SP_Lifetime,
                    'SC_Price' => $SC_Price,
                    'SC_Lifetime' => $SC_Lifetime,
                    'SB_Price' => $SB_Price,
                    'SB_Lifetime' => $SB_Lifetime,
                    'CD_Price' => $CD_Price,
                    'CD_Lifetime' => $CD_Lifetime,
                    'CK_Price' => $CK_Price,
                    'CK_Lifetime' => $CK_Lifetime,
                    'P_Price' => $P_Price,
                    'P_Lifetime' => $P_Lifetime,
                    'SPu_Price' => $SPu_Price,
                    'SPu_Lifetime' => $SPu_Lifetime,
                    'PP_Price' => $PP_Price,
                    'PP_Lifetime' => $PP_Lifetime,
                    'PC_Price' => $PC_Price,
                    'PC_Lifetime' => $PC_Lifetime,
                    'Price_pcs'	=> $Price_pcs,
                    'Currency'	=> $Currency,
                    'Tgl_update'=> $Tgl_update      
                ));
            }
            else
            {
                $this->db->where('Type_screw', $Type_screw)
                         ->where('Diameter_nominal', $Diameter_nominal)
                         ->where('Currency', $Currency);
                $this->db->update(self::$table,array(
                        'Active'	=> 'NO'    
                ));

                return $this->db->insert(self::$table,array(
                    'Type_screw' => $Type_screw,
                    'Diameter_nominal' => $Diameter_nominal,
                    'HD_Price' => $HD_Price,
                    'HD_Lifetime' => $HD_Lifetime,
                    'HDI_Price' => $HDI_Price,
                    'HDI_Lifetime' => $HDI_Lifetime,
                    'HDP_Price' => $HDP_Price,
                    'HDP_Lifetime' => $HDP_Lifetime,
                    'HDC_Price' => $HDC_Price,
                    'HDC_Lifetime' => $HDC_Lifetime,
                    'HR_Price' => $HR_Price,
                    'HR_Lifetime' => $HR_Lifetime,
                    'S_Price' => $S_Price,
                    'S_Lifetime' => $S_Lifetime,
                    'SP_Price' => $SP_Price,
                    'SP_Lifetime' => $SP_Lifetime,
                    'SC_Price' => $SC_Price,
                    'SC_Lifetime' => $SC_Lifetime,
                    'SB_Price' => $SB_Price,
                    'SB_Lifetime' => $SB_Lifetime,
                    'CD_Price' => $CD_Price,
                    'CD_Lifetime' => $CD_Lifetime,
                    'CK_Price' => $CK_Price,
                    'CK_Lifetime' => $CK_Lifetime,
                    'P_Price' => $P_Price,
                    'P_Lifetime' => $P_Lifetime,
                    'SPu_Price' => $SPu_Price,
                    'SPu_Lifetime' => $SPu_Lifetime,
                    'PP_Price' => $PP_Price,
                    'PP_Lifetime' => $PP_Lifetime,
                    'PC_Price' => $PC_Price,
                    'PC_Lifetime' => $PC_Lifetime,
                    'Price_pcs'	=> $Price_pcs,
                    'Currency'	=> $Currency,
                    'Tgl_update'=> $Tgl_update      
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
	    'Type_screw' =>$this->input->post('Type_screw',true),
            'Diameter_nominal' =>$this->input->post('Diameter_nominal',true),
	    'HD_Price' =>$this->input->post('HD_Price',true),
            'HD_Lifetime' =>$this->input->post('HD_Lifetime',true),
            'HDI_Price' =>$this->input->post('HDI_Price',true),
            'HDI_Lifetime' =>$this->input->post('HDI_Lifetime',true),
            'HDP_Price' =>$this->input->post('HDP_Price',true),
            'HDP_Lifetime' =>$this->input->post('HDP_Lifetime',true),
            'HDC_Price' =>$this->input->post('HDC_Price',true),
            'HDC_Lifetime' =>$this->input->post('HDC_Lifetime',true),
            'HR_Price' =>$this->input->post('HR_Price',true),
            'HR_Lifetime' =>$this->input->post('HR_Lifetime',true),
            'S_Price' =>$this->input->post('S_Price',true),
            'S_Lifetime' =>$this->input->post('S_Lifetime',true),
            'SP_Price' =>$this->input->post('SP_Price',true),
            'SP_Lifetime' =>$this->input->post('SP_Lifetime',true),
            'SC_Price' =>$this->input->post('SC_Price',true),
            'SC_Lifetime' =>$this->input->post('SC_Lifetime',true),
            'SB_Price' =>$this->input->post('SB_Price',true),
            'SB_Lifetime' =>$this->input->post('SB_Lifetime',true),
            'CD_Price' =>$this->input->post('CD_Price',true),
            'CD_Lifetime' =>$this->input->post('CD_Lifetime',true),
            'CK_Price' =>$this->input->post('CK_Price',true),
            'CK_Lifetime' =>$this->input->post('CK_Lifetime',true),
            'P_Price' =>$this->input->post('P_Price',true),
            'P_Lifetime' =>$this->input->post('P_Lifetime',true),
            'SPu_Price' =>$this->input->post('SPu_Price',true),
            'SPu_Lifetime' =>$this->input->post('SPu_Lifetime',true),
            'PP_Price' =>$this->input->post('PP_Price',true),
            'PP_Lifetime' =>$this->input->post('PP_Lifetime',true),
            'PC_Price' =>$this->input->post('PC_Price',true),
            'PC_Lifetime' =>$this->input->post('PC_Lifetime',true),
            'Price_pcs' =>$this->input->post('Price_pcs',true),
            'Currency'  =>$this->input->post('Currency',true),
            'Tgl_update'=>$this->input->post('Tgl_update',true)
        ));
    }
    
    function delete($Id)
    {
        return $this->db->delete(self::$table, array('Id' => $Id)); 
    }
    
    function enumField($field)
    {
        $enums = field_enums(self::$table, $field);
        return json_encode($enums);
    }
    
}

/* End of file m_heading2.php */
/* Location: ./application/models/master/tools/m_heading2.php */