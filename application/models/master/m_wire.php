<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_wire extends CI_Model
{    
    static $table       = 'wire';
    static $typewire    = 'typewire';
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Digunakan untuk memunculkan data Enum
    }

    function index()
    {
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
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
                
        $this->db->select('a.*, b.Type AS Type');
        $this->db->join(self::$typewire.' b', 'a.Type = b.Id','left');
        $this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table.' a');
        $total  = $this->db->count_all_results();
        
        $this->db->select('a.*, b.Type AS Type');
        $this->db->join(self::$typewire.' b', 'a.Type = b.Id','left');
        $this->db->where($cond, NULL, FALSE);
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        
        $query  = $this->db->get(self::$table.' a');
        $total  = $this->db->count_all_results(self::$table.' a');
                   
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
        $Kode_Supp	= $this->input->post('Kode_Supp',true);
        $Grade 		= $this->input->post('Grade',true);
        $Min_dia 	= $this->input->post('Min_dia',true);
        $Max_dia 	= $this->input->post('Max_dia',true);
        $Type 		= $this->input->post('Type',true);
        $Jenis 		= $this->input->post('Jenis',true);
        $Currency 	= $this->input->post('Currency',true);
        $Price 		= $this->input->post('Price',true);
        $Tgl_update	= $this->input->post('Tgl_update',true);
		
        $this->db->where('Kode_Supp', $Kode_Supp)
                 ->where('Grade', $Grade)
                 ->where('Min_dia', $Min_dia)
                 ->where('Max_dia', $Max_dia)
                 ->where('Type', $Type)
                 ->where('Jenis', $Jenis)
                 ->where('Currency', $Currency)
                 ->where('Price', $Price)
                 ->where('Tgl_update', $Tgl_update);
        $resA = $this->db->get(self::$table);
		
        $this->db->where('Kode_Supp', $Kode_Supp)
                 ->where('Grade', $Grade)
                 ->where('Min_dia', $Min_dia)
                 ->where('Max_dia', $Max_dia)
                 ->where('Type', $Type)
                 ->where('Jenis', $Jenis)
                 ->where('Currency', $Currency);
        $res = $this->db->get(self::$table);
		
        if($resA->num_rows == 0)
        {
            if($res->num_rows == 0)
            {			
                return $this->db->insert(self::$table,array(
                    'Id'        => $this->input->post('Id',true),
                    'Kode_Supp'	=> $this->input->post('Kode_Supp',true),
                    'Grade'	=> $this->input->post('Grade',true),
                    'Min_dia'	=> $this->input->post('Min_dia',true),
                    'Max_dia'	=> $this->input->post('Max_dia',true),
                    'Type'	=> $this->input->post('Type',true),
                    'Jenis'	=> $this->input->post('Jenis',true),
                    'Price'	=> $this->input->post('Price',true),
                    'Currency'	=> $this->input->post('Currency',true),
                    'Tgl_update'=> $this->input->post('Tgl_update',true)       
                ));
            }
            else
            {
                $this->db->where('Kode_Supp', $Kode_Supp)
                         ->where('Grade', $Grade)
                         ->where('Min_dia', $Min_dia)
                         ->where('Max_dia', $Max_dia)
                         ->where('Type', $Type)
                         ->where('Jenis', $Jenis)
                         ->where('Currency', $Currency);
                $this->db->update(self::$table,array(
                        'Active'	=> 'NO'    
                ));

                return $this->db->insert(self::$table,array(
                        'Id'		=> $this->input->post('Id',true),
                        'Kode_Supp'	=> $this->input->post('Kode_Supp',true),
                        'Grade'		=> $this->input->post('Grade',true),
                        'Min_dia'	=> $this->input->post('Min_dia',true),
                        'Max_dia'	=> $this->input->post('Max_dia',true),
                        'Type'		=> $this->input->post('Type',true),
                        'Jenis'		=> $this->input->post('Jenis',true),
                        'Price'		=> $this->input->post('Price',true),
                        'Currency'	=> $this->input->post('Currency',true),
                        'Tgl_update'    => $this->input->post('Tgl_update',true)       
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
            'Kode_Supp' => $this->input->post('Kode_Supp',true),
            'Grade'     => $this->input->post('Grade',true),
            'Min_dia'   => $this->input->post('Min_dia',true),
            'Max_dia'   => $this->input->post('Max_dia',true),
            'Type'      => $this->input->post('Type',true),
            'Jenis'     => $this->input->post('Jenis',true),
            'Price'     => $this->input->post('Price',true),
            'Currency'  => $this->input->post('Currency',true),
            'Tgl_update'=> $this->input->post('Tgl_update',true)     
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
	
    function getTypeWire()
    {
        $this->db->select('Id, Type');        
        $this->db->order_by('Id', 'ASC');
        $query  = $this->db->get('typewire');
                   
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
	
    function upload($Kode_Supp, $Grade, $Min_dia,
                    $Max_dia, $Type, $Jenis, $Price, $Currency,$Tgl_update)
    {
		date_default_timezone_set('Asia/Jakarta');
        $Tgl_update = date("Y-m-d",($Tgl_update - 25569)*86400);
		
		$this->db->where('Kode_Supp', $Kode_Supp)
				 ->where('Grade', $Grade)
				 ->where('Min_dia', $Min_dia)
				 ->where('Max_dia', $Max_dia)
				 ->where('Type', $Type)
				 ->where('Jenis', $Jenis)
				 ->where('Price', $Price)
				 ->where('Currency', $Currency)
				 ->where('Tgl_update', $Tgl_update);
        $resA = $this->db->get(self::$table);
		
		$this->db->where('Kode_Supp', $Kode_Supp)
				 ->where('Grade', $Grade)
				 ->where('Min_dia', $Min_dia)
				 ->where('Max_dia', $Max_dia)
				 ->where('Type', $Type)
				 ->where('Jenis', $Jenis)
				 ->where('Currency', $Currency);
        $res = $this->db->get(self::$table);
		
		if($resA->num_rows == 0)
        {
			if($res->num_rows == 0)
			{
				return $this->db->insert(self::$table,array(
					'Kode_Supp'=>$Kode_Supp,
					'Grade'=>$Grade,
					'Min_dia'=>$Min_dia,
					'Max_dia'=>$Max_dia,
					'Type'=>$Type,
					'Jenis'=>$Jenis,
					'Price'=>$Price,
					'Currency'=>$Currency,
					'Tgl_update'=>$Tgl_update
				)); 
			}
			else
			{
				$this->db->where('Kode_Supp', $Kode_Supp)
						 ->where('Grade', $Grade)
						 ->where('Min_dia', $Min_dia)
						 ->where('Max_dia', $Max_dia)
						 ->where('Type', $Type)
						 ->where('Jenis', $Jenis)
						 ->where('Currency', $Currency);
				$this->db->update(self::$table,array(
					'Active'	=> 'NO'    
				));
				
				return $this->db->insert(self::$table,array(
					'Kode_Supp'=>$Kode_Supp,
					'Grade'=>$Grade,
					'Min_dia'=>$Min_dia,
					'Max_dia'=>$Max_dia,
					'Type'=>$Type,
					'Jenis'=>$Jenis,
					'Price'=>$Price,
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

/* End of file m_wire.php */
/* Location: ./application/models/master/m_wire.php */