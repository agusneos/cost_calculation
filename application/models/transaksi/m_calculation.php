<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_calculation extends CI_Model
{    
    static $table       = 'calculation';
    static $wire        = 'wire';
    static $typewire    = 'typewire';
    static $washer      = 'washer';
    static $sesdata     = 'sesdata';

     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $offset = ($page-1)*$rows;      
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'a.id';
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
        $this->db->select('a.Id AS Id, Tanggal, Customer, Customer_code, Saga_code, Quantity, Dia_wire, Kode_wire, Net_weight');
        $this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
	$this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table.' a');
        $total  = $this->db->count_all_results();
        
	$this->db->select('a.Id AS Id, Tanggal, Customer, Customer_code, Saga_code, Quantity, Dia_wire, Kode_wire, Net_weight');
        $this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
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
	$result["total"] = $total;
	$result['rows'] = $data;
        
        return json_encode($result);          
    }   
        
    function create()
    {
        return $this->db->insert(self::$table,array(
            'Id'=>$this->input->post('Id',true),
            'Tanggal'=>$this->input->post('Tanggal',true),
            'Customer'=>$this->input->post('Customer',true),
            'Customer_code'=>$this->input->post('Customer_code',true),
            'Saga_code'=>$this->input->post('Saga_code',true),
            'Quantity'=>$this->input->post('Quantity',true),
            'Dia_wire'=>$this->input->post('Dia_wire',true),
            'Kode_wire'=>$this->input->post('Kode_wire',true),
            'Net_weight'=>$this->input->post('Net_weight',true)
        ));
    }
    
    function update($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->update(self::$table,array(
            'Tanggal'=>$this->input->post('Tanggal',true),
            'Customer'=>$this->input->post('Customer',true),
            'Customer_code'=>$this->input->post('Customer_code',true),
            'Saga_code'=>$this->input->post('Saga_code',true),
            'Quantity'=>$this->input->post('Quantity',true),
            'Dia_wire'=>$this->input->post('Dia_wire',true),
            'Kode_wire'=>$this->input->post('Kode_wire',true),
            'Net_weight'=>$this->input->post('Net_weight',true)
        ));
    }
    
    function delete($Id)
    {
        return $this->db->delete(self::$table, array('Id' => $Id)); 
    }
    
    function getSupplier()
    {
        $this->db->select('Id, Name');        
        $this->db->order_by('Id', 'ASC');
        $query  = $this->db->get('supplier');
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);
    }
	
    function getCustomer()
    {
        $this->db->select('Id, Name');        
        $this->db->order_by('Id', 'ASC');
        $query  = $this->db->get('customer');
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);
    }
	
	
    function enumField($field)
    {
        $enums = field_enums(self::$table, $field);
        return json_encode($enums);
     
    }
	
    function getWireCode($dia)
    {
        $this->db->select('wire.Id as wId, Kode_Supp, Grade, Name, Price, Currency');
        $this->db->join(self::$typewire, self::$wire.'.Type = '.self::$typewire.'.Id','left');
        $this->db->where($dia.'>= Min_dia', NULL, FALSE)
                 ->where($dia.'<= Max_dia', NULL, FALSE)
                 ->where('Active != "NO"') ;
        $this->db->order_by('Kode_Supp', 'ASC')
                 ->order_by('Grade', 'ASC');
        $query  = $this->db->get(self::$wire);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    
    function getSesData()
    {        
        $this->db->select('Scrap, Exch_rate');
        return $this->db->get(self::$sesdata); 
    }
    
    function updateSesData($Scrap, $Exch_rate)
    {
        return $this->db->update(self::$sesdata,array(
            'Scrap'=>$Scrap,
            'Exch_rate'=>$Exch_rate
        ));
    }

    function getWasher1()
    {
        $this->db->select('Id, Name, Weight, Price, Currency');        
        $this->db->order_by('Id', 'ASC');
        $query  = $this->db->get(self::$washer);
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);
    }
}

/* End of file m_calculation.php */
/* Location: ./application/models/transaksi/m_calculation.php */