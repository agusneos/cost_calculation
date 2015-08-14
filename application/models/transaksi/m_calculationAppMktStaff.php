<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_calculationAppMktStaff extends CI_Model
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
    static $tools_heading2          = 'tools_heading2';
    static $tools_heading4          = 'tools_heading4';
    static $tools_rollingcat        = 'tools_rollingcat';
    static $tools_rolling           = 'tools_rolling';   
    static $tools_cutting           = 'tools_cutting';
    static $tools_slotting          = 'tools_slotting';   
    static $tools_trimming          = 'tools_trimming';
    static $labor                   = 'labor';
    static $turret                  = 'turret';
    static $straightening           = 'straightening';
    static $turret2                  ='turret2';
    static $furnace                 = 'furnace';
    static $furnace2                = 'furnace2';
    static $plating                 = 'plating';
    static $assembly                = 'assembly';
    static $coating                 = 'coating';
    static $utility                 = 'utility';
    
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
                 ->where('Approval_Acc_Mgr', 'OK' );                 
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
       
    function update($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->update(self::$table,array(
            'Tanggal'=>$this->input->post('Tanggal',true),
            'Customer'=>$this->input->post('Customer',true),
            'Customer_code'=>$this->input->post('Customer_code',true),
            'Saga_code'=>$this->input->post('Saga_code',true),
            'Type_screwOri'=>$this->input->post('Type_screwOri',true),
            'Dia_nominal'=>$this->input->post('Dia_nominal',true),
            'Length_nominal'=>$this->input->post('Length_nominal',true),
            'Quantity'=>$this->input->post('Quantity',true),
            'Dia_wire'=>$this->input->post('Dia_wire',true),
            'Kode_wire'=>$this->input->post('Kode_wire',true),
            'Net_weight'=>$this->input->post('Net_weight',true),
            'Scrap'=>$this->input->post('Scrap',true),
            'Gross_weight'=>$this->input->post('Gross_weight',true),
            'Price'=>$this->input->post('Price',true),
            'Currency'=>$this->input->post('Currency',true),
            'Exch_rate'=>$this->input->post('Exch_rate',true),
            'Material_cost'=>$this->input->post('Material_cost',true),
            'Washer1'=>$this->input->post('Washer1',true),
            'Washer1_weight'=>$this->input->post('Washer1_weight',true),
            'Washer1_currency'=>$this->input->post('Washer1_currency',true),
            'Washer1_price'=>$this->input->post('Washer1_price',true),
            'Washer1_cost'=>$this->input->post('Washer1_cost',true),
            'Washer2'=>$this->input->post('Washer2',true),
            'Washer2_weight'=>$this->input->post('Washer2_weight',true),
            'Washer2_currency'=>$this->input->post('Washer2_currency',true),
            'Washer2_price'=>$this->input->post('Washer2_price',true),
            'Washer2_cost'=>$this->input->post('Washer2_cost',true),
            'Finish_weight'=>$this->input->post('Finish_weight',true),
            'Washer_total_cost'=>$this->input->post('Washer_total_cost',true),
            'Gol_mchn_head'=>$this->input->post('Gol_mchn_head',true),
            'Kode_mchnhead'=>$this->input->post('Kode_mchnhead',true),
            'Heading_depr_cost'=>$this->input->post('Heading_depr_cost',true),
            'Gol_mchn_roll'=>$this->input->post('Gol_mchn_roll',true),
            'Kode_mchnroll'=>$this->input->post('Kode_mchnroll',true),
            'Rolling_depr_cost'=>$this->input->post('Rolling_depr_cost',true),
            'Freq_mchnroll'=>$this->input->post('Freq_mchnroll',true),
            'Rolling_depr_cost2'=>$this->input->post('Rolling_depr_cost2',true),
            'Mchn_cutting'=>$this->input->post('Mchn_cutting',true),
            'Kode_mchncutt'=>$this->input->post('Kode_mchncutt',true),
            'Cutting_depr_cost'=>$this->input->post('Cutting_depr_cost',true),
            'Mchn_slotting'=>$this->input->post('Mchn_slotting',true),
            'Kode_mchnslott'=>$this->input->post('Kode_mchnslott',true),
            'Slotting_depr_cost'=>$this->input->post('Slotting_depr_cost',true),
            'Mchn_trimming'=>$this->input->post('Mchn_trimming',true),
            'Kode_mchntrimm'=>$this->input->post('Kode_mchntrimm',true),
            'Trimming_depr_cost'=>$this->input->post('Trimming_depr_cost',true),
            'Mchn_straightening'=>$this->input->post('Mchn_straightening',true),
            'Kode_mchnstraighten'=>$this->input->post('Kode_mchnstraighten',true),
            'Straightening_depr_cost'=>$this->input->post('Straightening_depr_cost',true),
            'Mchn_pressing'=>$this->input->post('Mchn_pressing',true),
            'Kode_mchnpress'=>$this->input->post('Kode_mchnpress',true),
            'Pressing_depr_cost'=>$this->input->post('Pressing_depr_cost',true),
            'Category'=>$this->input->post('Category',true),
            'Heading_tool_cost'=>$this->input->post('Heading_tool_cost',true),
            'Heading_currency'=>$this->input->post('Heading_currency',true),
            'Heading_tool_cost2'=>$this->input->post('Heading_tool_cost2',true),
            'Category2'=>$this->input->post('Category2',true),
            'Rolling_tool_cost'=>$this->input->post('Rolling_tool_cost',true),
            'Cutting_tool_cost'=>$this->input->post('Cutting_tool_cost',true),
            'Slotting_tool_cost'=>$this->input->post('Slotting_tool_cost',true),
            'Trimming_tool_cost'=>$this->input->post('Trimming_tool_cost',true),
            'Gaji_per_sec'=>$this->input->post('Gaji_per_sec',true),
            'Labor_cost_heading'=>$this->input->post('Labor_cost_heading',true),
            'Gaji_per_sec2'=>$this->input->post('Gaji_per_sec2',true),
            'Labor_cost_rolling'=>$this->input->post('Labor_cost_rolling',true),
            'Gaji_per_sec3'=>$this->input->post('Gaji_per_sec3',true),
            'Labor_cost_cutting'=>$this->input->post('Labor_cost_cutting',true),
            'Gaji_per_sec4'=>$this->input->post('Gaji_per_sec4',true),
            'Labor_cost_slotting'=>$this->input->post('Labor_cost_slotting',true),
            'Gaji_per_sec5'=>$this->input->post('Gaji_per_sec5',true),
            'Labor_cost_trimming'=>$this->input->post('Labor_cost_trimming',true),
            'Labor_cost_straightening'=>$this->input->post('Labor_cost_straightening',true),
            'Proses1'=>$this->input->post('Proses1',true),
            'Jumlah_shot1'=>$this->input->post('Jumlah_shot1',true),
            'Biaya_labor1'=>$this->input->post('Biaya_labor1',true),
            'Proses2'=>$this->input->post('Proses2',true),
            'Jumlah_shot2'=>$this->input->post('Jumlah_shot2',true),
            'Biaya_labor2'=>$this->input->post('Biaya_labor2',true),
            'Proses3'=>$this->input->post('Proses3',true),
            'Jumlah_shot3'=>$this->input->post('Jumlah_shot3',true),
            'Biaya_labor3'=>$this->input->post('Biaya_labor3',true),
            'Proses4'=>$this->input->post('Proses4',true),
            'Jumlah_shot4'=>$this->input->post('Jumlah_shot4',true),
            'Biaya_labor4'=>$this->input->post('Biaya_labor4',true),
            'Proses5'=>$this->input->post('Proses5',true),
            'Jumlah_shot5'=>$this->input->post('Jumlah_shot5',true),
            'Biaya_labor5'=>$this->input->post('Biaya_labor5',true),
            'Kode_turret2'=>$this->input->post('Kode_turret2',true),
            'Price_turret2'=>$this->input->post('Price_turret2',true),
            'Currency_turret2'=>$this->input->post('Currency_turret2',true),
            'Turret2_cost'=>$this->input->post('Turret2_cost',true),
            'Gaji_per_gram_fq'=>$this->input->post('Gaji_per_gram_fq',true),
            'Labor_cost_fq'=>$this->input->post('Labor_cost_fq',true),
            'Gaji_per_gram_packing'=>$this->input->post('Gaji_per_gram_packing',true),
            'Labor_cost_packing'=>$this->input->post('Labor_cost_packing',true),
            'Biaya_per_gram_elc'=>$this->input->post('Biaya_per_gram_elc',true),
            'Electricity_cost'=>$this->input->post('Electricity_cost',true),
            'Biaya_per_gram_fexp'=>$this->input->post('Biaya_per_gram_fexp',true),
            'Factory_cost'=>$this->input->post('Factory_cost',true),
            'Kode_furnace'=>$this->input->post('Kode_furnace',true),
            'Price_furnace'=>$this->input->post('Price_furnace',true),
            'Currency_furnace'=>$this->input->post('Currency_furnace',true),
            'Furnace_cost'=>$this->input->post('Furnace_cost',true),
            'Kode_furnace2'=>$this->input->post('Kode_furnace2',true),
            'Price_furnace2'=>$this->input->post('Price_furnace2',true),
            'Currency_furnace2'=>$this->input->post('Currency_furnace2',true),
            'Furnace2_cost'=>$this->input->post('Furnace2_cost',true),
            'Kode_plating'=>$this->input->post('Kode_plating',true),
            'Price_plating'=>$this->input->post('Price_plating',true),
            'Currency_plating'=>$this->input->post('Currency_plating',true),
            'Plating_cost'=>$this->input->post('Plating_cost',true),
            'Baking'=>$this->input->post('Baking',true),
            'Baking_cost'=>$this->input->post('Baking_cost',true),
            'Cuci'=>$this->input->post('Cuci',true),
            'Cuci_cost'=>$this->input->post('Cuci_cost',true),
            'Assembly'=>$this->input->post('Assembly',true),
            'Kode_assembly'=>$this->input->post('Kode_assembly',true),
            'Assembly_cost'=>$this->input->post('Assembly_cost',true),
            'Kode_coating'=>$this->input->post('Kode_coating',true),
            'Price_coating'=>$this->input->post('Price_coating',true),
            'Currency_coating'=>$this->input->post('Currency_coating',true),
            'Coating_cost'=>$this->input->post('Coating_cost',true),
            'Processing_cost_summary'=>$this->input->post('Processing_cost_summary',true),
            'Tooling_cost_summary'=>$this->input->post('Tooling_cost_summary',true),
            'Depreciation_cost_summary'=>$this->input->post('Depreciation_cost_summary',true),
            'Profit_rate_summary'=>$this->input->post('Profit_rate_summary',true),
            'Profit_cost_summary'=>$this->input->post('Profit_cost_summary',true),
            'Total_cost_summary'=>$this->input->post('Total_cost_summary',true),
            'Price_per_kg'=>$this->input->post('Price_per_kg',true)
        ));
    }
    function approve($Id)
    {                
        $this->db->select('Approval_Mkt_Staff, Note_Mkt_Staff');         
        return $this->db->get(self::$table); 
    }
    function approveSave($Id, $Approval_Mkt_Staff, $Note_Mkt_Staff, $User)
    {
        $this->db->where('Id', $Id);
        return $this->db->update(self::$table,array(
            'Approval_Mkt_Staff'    => $Approval_Mkt_Staff,
            'Note_Mkt_Staff'        => $Note_Mkt_Staff,
            'Id_Mkt_Staff'          => $User,
            'Approval_Mkt_Mgr'      => ''
        ));
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
        $this->db->select('Scrap, Exch_rate, Profit_rate');
        return $this->db->get(self::$sesdata); 
    }
    
    
    function updateSesData($Scrap, $Exch_rate, $Profit_rate)
    {
        return $this->db->update(self::$sesdata,array(
            'Scrap'=>$Scrap,
            'Exch_rate'=>$Exch_rate,
            'Profit_rate'=>$Profit_rate   
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
            $this->db->select('Category1, Cost, Currency');
            $this->db->where('Category1  = (SELECT Category1 FROM '.self::$tools_headingcat.
                                ' WHERE Type_screw = "'.$typescr.'")', NULL, FALSE)
                     ->where('Diameter', $dia)
                     ->where($length.'>= Min_panjang', NULL, FALSE)
                     ->where($length.'<= Max_panjang', NULL, FALSE)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_heading1);
        
    }
    function getHeading2($typescrhead2, $dianom2)
        {
            $this->db->select('Price_pcs, Currency');
            $this->db->where('Type_screw', $typescrhead2)
                     ->where('Diameter_nominal', $dianom2)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_heading2);
        }
    
    function getHeading4($typescrhead4, $dianom4)
        {
            $this->db->select('Price_pcs, Currency');
            $this->db->where('Type_screw', $typescrhead4)
                     ->where('Diameter_nominal', $dianom4)
                     ->where('Active', 'YES');
            return $this->db->get(self::$tools_heading4);
        }
     function getDataHeading($kode_mesin)
        {
            $this->db->select('Dandori_time, Cycle_time, Working_time, Working_time_sec');
            $this->db->where('Kode_mchnhead', $kode_mesin);                    
            return $this->db->get(self::$machine_heading);
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
    function getDataRolling($kode_mesin2)
        {
            $this->db->select('Dandori_time, Cycle_time, Working_time, Working_time_sec');
            $this->db->where('Kode_mchnroll', $kode_mesin2);                    
            return $this->db->get(self::$machine_rolling);
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
    function getDataCutting($kode_mesin3)
        {
            $this->db->select('Dandori_time, Cycle_time, Working_time, Working_time_sec');
            $this->db->where('Kode_mchncutt', $kode_mesin3);                    
            return $this->db->get(self::$machine_cutting);
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
      function getDataSlotting($kode_mesin4)
        {
            $this->db->select('Dandori_time, Cycle_time, Working_time, Working_time_sec');
            $this->db->where('Kode_mchnslott', $kode_mesin4);                    
            return $this->db->get(self::$machine_slotting);
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
    function getDataTrimming($kode_mesin5)
        {
            $this->db->select('Dandori_time, Cycle_time, Working_time, Working_time_sec');
            $this->db->where('Kode_mchntrimm', $kode_mesin5);                    
            return $this->db->get(self::$machine_trimming);
        }
    function getGaji($proses)
        {
            $this->db->select('Id, Gaji_per_year, Hasilprod_per_tahun, Jumlah_labor');
            $this->db->where('Process', $proses);
            return $this->db->get(self::$labor);
        }
     function getGajiTurret()
        {
            $this->db->select('Gaji, Estimasi, Working_day, Working_hour');
            return $this->db->get(self::$turret);
        }
     function getBiaya($proses)
        {
            $this->db->select('Id, Biaya_per_year, Hasilprod_per_tahun');
            $this->db->where('Name', $proses);
            return $this->db->get(self::$utility);
        } 
     function getFurnace()
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$furnace);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
       function getPlating()
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$plating);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
        function getBaking($proses)
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Name', $proses)
                     ->where('Active', 'YES');
            return $this->db->get(self::$plating);
        } 
        function getCuci($proses)
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Name', $proses)
                     ->where('Active', 'YES');
            return $this->db->get(self::$plating);
        } 
        function getKode_assembly()
        {
            $this->db->select('Id, Name, Price');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$assembly);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
        function getCoating()
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$coating);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
        function getFurnace2()
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$furnace2);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
        function getTurret2()
        {
            $this->db->select('Id, Kode_Supp, Name, Price, Currency');
            $this->db->where('Active', 'YES');
            
            $query  = $this->db->get(self::$turret2);
                   
            $data = array();
            foreach ( $query->result() as $row )
            {
               array_push($data, $row); 
            }       
            return json_encode($data);
        }
}
    

    
/* End of file m_calculationAppMktStaff.php */
/* Location: ./application/models/transaksi/m_calculationAppMktStaff.php */