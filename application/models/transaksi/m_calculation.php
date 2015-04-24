<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_calculation extends CI_Model
{    
    static $table       = 'calculation';
    static $wire        = 'wire';
    static $typewire    = 'typewire';
    static $washer      = 'washer';
    static $sesdata     = 'sesdata';
    static $machine_heading         = 'machine_heading';
    static $machine_rolling         = 'machine_rolling';
    static $machine_cutting         = 'machine_cutting';
    static $machine_slotting        = 'machine_slotting';
    static $machine_trimming        = 'machine_trimming';
    static $machine_straightening   = 'machine_straightening';
    static $machine_pressing        = 'machine_pressing';
    static $tools_headingcat        = 'tools_headingcat';
    static $tools_heading1          = 'tools_heading1';
    static $tools_rollingcat        = 'tools_rollingcat';
    static $tools_rolling           = 'tools_rolling';   
    static $tools_cutting           = 'tools_cutting';
    static $tools_slotting          = 'tools_slotting';   
    static $tools_trimming          = 'tools_trimming';
    static $labor                   = 'labor';
    
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
        $this->db->select('a.Id AS Id, a.*');
        //$this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
	$this->db->where($cond, NULL, FALSE);
        $this->db->from(self::$table.' a');
        $total  = $this->db->count_all_results();
        
	$this->db->select('a.Id AS Id, a.*');
        //$this->db->join(self::$wire, 'a.Kode_wire = '.self::$wire.'.Id','left');
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
            'Dia_nominal'=>$this->input->post('Dia_nominal',true),
            'Length_nominal'=>$this->input->post('Length_nominal',true),
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
            'Dia_nominal'=>$this->input->post('Dia_nominal',true),
            'Length_nominal'=>$this->input->post('Length_nominal',true),
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
	
    function enumFieldMachineHeading($field)
    {
        $enums = field_enums(self::$machine_heading, $field);
        return json_encode($enums);
    }
    
    function enumFieldMachineRolling($field)
    {
        $enums = field_enums(self::$machine_rolling, $field);
        return json_encode($enums);  
    }
    
    function getWireCode($dia)
    {       $this->db->select('wire.Id as wId, Kode_Supp, Grade, typewire.Type AS Type, Price, Currency');
        $this->db->join(self::$typewire, self::$wire.'.Type = '.self::$typewire.'.Id','left');
        $this->db->where($dia.'>= Min_dia', NULL, FALSE)
                 ->where($dia.'<= Max_dia', NULL, FALSE)
                 ->where('Active', 'YES');
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
        $this->db->where('Active', 'YES');
        $this->db->order_by('Name', 'ASC');
        $query  = $this->db->get(self::$washer);
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);
    }
    
    function getWasher2()
    {
        $this->db->select('Id, Name, Weight, Price, Currency');   
        $this->db->where('Active', 'YES');     
        $this->db->order_by('Name', 'ASC');
        $query  = $this->db->get(self::$washer);
                   
        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);
    }
    
    function getHeadMchncode($dnom, $golm)
    {
        $this->db->select('Kode_mchnhead, Gol_mchn_head, Dia_nominal, Length_range, Mchn_heading, Heading_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom)
                 ->where('Gol_mchn_head', $golm);
        $this->db->order_by('Kode_mchnhead', 'ASC');
        $query  = $this->db->get(self::$machine_heading);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    
    function getRollMchncode($dnom2, $golm2)
    {
        $this->db->select('Kode_mchnroll, Gol_mchn_roll, Dia_nominal, Length_range, Mchn_rolling, Rolling_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom2)
                 ->where('Gol_mchn_roll', $golm2);
        $this->db->order_by('Kode_mchnroll', 'ASC');
        $query  = $this->db->get(self::$machine_rolling);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    
    function getCuttMchncode($dnom4)
    {
        $this->db->select('Kode_mchncutt,  Dia_nominal, Length_range, Mchn_cutting, Cutting_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom4);                 
        $this->db->order_by('Kode_mchncutt', 'ASC');
        $query  = $this->db->get(self::$machine_cutting);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    function getSlottMchncode($dnom5)
    {
        $this->db->select('Kode_mchnslott,  Dia_nominal, Length_range, Mchn_slotting, Slotting_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom5);                 
        $this->db->order_by('Kode_mchnslott', 'ASC');
        $query  = $this->db->get(self::$machine_slotting);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    function getTrimmMchncode($dnom6)
    {
        $this->db->select('Kode_mchntrimm,  Dia_nominal, Length_range, Mchn_trimming, Trimming_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom6);                 
        $this->db->order_by('Kode_mchntrimm', 'ASC');
        $query  = $this->db->get(self::$machine_trimming);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    function getStraightenMchncode($dnom7)
    {
        $this->db->select('Kode_mchnstraighten,  Dia_nominal, Length_range, Mchn_straightening, Straightening_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom7);                 
        $this->db->order_by('Kode_mchnstraighten', 'ASC');
        $query  = $this->db->get(self::$machine_straightening);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    function getPressMchncode($dnom8)
    {
        $this->db->select('Kode_mchnpress,  Dia_nominal, Length_range, Mchn_pressing, Pressing_depr_cost, Dandori_time, Cycle_time, Working_time, Working_time_sec');
        $this->db->where('Dia_nominal', $dnom8);                 
        $this->db->order_by('Kode_mchnpress', 'ASC');
        $query  = $this->db->get(self::$machine_pressing);

        $data = array();
        foreach ( $query->result() as $row )
        {
            array_push($data, $row); 
        }       
        return json_encode($data);	
    }
    function getCategory($typescr, $gol_mchn, $dia, $length)
    {
        if ($gol_mchn == 'Heading 1 die')
        {
            $this->db->select('Category, Cost');
            $this->db->where('Category  = (SELECT Category FROM '.self::$tools_headingcat.
                                ' WHERE Type_screw = "'.$typescr.'")', NULL, FALSE)
                     ->where('Diameter', $dia)
                     ->where($length.'>= Min_panjang', NULL, FALSE)
                     ->where($length.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_heading1);
        }
        if (($gol_mchn == 'Bolt Former 2 dies'))
        {
            $this->db->select('Category');
            $this->db->where('Type_screw', $typescr);                 
            return $this->db->get(self::$tools_headingcat);
        }
        if (($gol_mchn == 'Rivet Former 2 dies'))
        {
            $this->db->select('Category');
            $this->db->where('Type_screw', $typescr);                 
            return $this->db->get(self::$tools_headingcat);
        }
        if (($gol_mchn == 'Bolt Former 4 dies'))
        {
            $this->db->select('Category');
            $this->db->where('Type_screw', $typescr);                 
            return $this->db->get(self::$tools_headingcat);
        }
    }
    function getCategory2($typescr2, $dia2, $length2)
    {
            $this->db->select('Category2, Cost');
            $this->db->where('Category2  = (SELECT Category2 FROM '.self::$tools_rollingcat.
                                ' WHERE Type_screw = "'.$typescr2.'")', NULL, FALSE)
                     ->where('Diameter', $dia2)
                     ->where($length2.'>= Min_panjang', NULL, FALSE)
                     ->where($length2.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_rolling);
        }
    function getCutting($dia3, $length3)
    {
            $this->db->select('Id, Cost');
            $this->db->where('Diameter', $dia3)
                     ->where($length3.'>= Min_panjang', NULL, FALSE)
                     ->where($length3.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_cutting);
        }
    function getSlotting($dia4, $length4)
    {
            $this->db->select('Id, Cost');
            $this->db->where('Diameter', $dia4)
                     ->where($length4.'>= Min_panjang', NULL, FALSE)
                     ->where($length4.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_slotting);
        }
     function getTrimming($dia5, $length5)
        {
            $this->db->select('Id, Cost');
            $this->db->where('Diameter', $dia5)
                     ->where($length5.'>= Min_panjang', NULL, FALSE)
                     ->where($length5.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_trimming);
        }
      function getGaji($proses)
        {
            $this->db->select('Id, Gaji_per_year, Jumlah_labor');
            $this->db->where('Process', $proses);
            return $this->db->get(self::$labor);
        }  
        
}
    

    
/* End of file m_calculation.php */
/* Location: ./application/models/transaksi/m_calculation.php */