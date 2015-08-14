<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_calculationPI extends CI_Model
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
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'a.Id';
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
                 ->where('Approval_Mkt_Mgr','OK');
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
    public function get_calculation_by_id($Id)
    {
        $this->db->select('a.*, customer.*, a.Tanggal as calc_date, a.Id as calc_id, customer.Name as calc_cust,a.Customer_code as calc_custcode, a.Saga_code as calc_sagacode,
                                a.Quantity as calc_qty, a.Exch_rate as calc_exc, a.Scrap as calc_ng, a.Profit_rate_summary as calc_profit,
                                wire.Grade as calc_wire, wire.Kode_Supp as calc_supp, a.Net_weight as calc_nw, a.Gross_weight as calc_gw,
                                a.Price as calc_wprc, a.Currency as calc_wcurr, a.Material_cost as calc_matcost,
                                a.Washer1 as calc_wsh1, a.Washer1_weight as calc_wsh1w, a.Washer1_cost as calc_wsh1c,
                                a.Washer2 as calc_wsh2, a.Washer2_weight as calc_wsh2w, a.Washer2_cost as calc_wsh2c,
                                a.Washer_total_cost as calc_totwsh,
                                machine_heading.Mchn_heading as calc_mchead, machine_heading.Mchn_price as calc_mcheadprc, machine_heading.Depr_per_month as calc_mcheaddcpm,
                                machine_heading.Prod_plan_month as calc_mcheadpppm, a.Heading_depr_cost as calc_mcheaddcpp,
                                machine_rolling.Mchn_rolling as calc_mcroll, machine_rolling.Mchn_price as calc_mcrollprc, machine_rolling.Depr_per_month as calc_mcrolldcpm,
                                machine_rolling.Prod_plan_month as calc_mcrollpppm, a.rolling_depr_cost as calc_mcrolldcpp,
                                machine_cutting.Mchn_cutting as calc_mccutt, machine_cutting.Mchn_price as calc_mccuttprc, machine_cutting.Depr_per_month as calc_mccuttdcpm,
                                machine_cutting.Prod_plan_month as calc_mccuttpppm, a.cutting_depr_cost as calc_mccuttdcpp,
                                machine_trimming.Mchn_trimming as calc_mctrimm, machine_trimming.Mchn_price as calc_mctrimmprc, machine_trimming.Depr_per_month as calc_mctrimmdcpm,
                                machine_trimming.Prod_plan_month as calc_mctrimmpppm, a.trimming_depr_cost as calc_mctrimmdcpp,
                                machine_slotting.Mchn_slotting as calc_mcslott, machine_slotting.Mchn_price as calc_mcslottprc, machine_slotting.Depr_per_month as calc_mcslottdcpm,
                                machine_slotting.Prod_plan_month as calc_mcslottpppm, a.slotting_depr_cost as calc_mcslottdcpp,
                                machine_straightening.Mchn_straightening as calc_mcstraighten, machine_straightening.Mchn_price as calc_mcstraightenprc, machine_straightening.Depr_per_month as calc_mcstraightendcpm,
                                machine_straightening.Prod_plan_month as calc_mcstraightenpppm, a.straightening_depr_cost as calc_mcstraightendcpp,
                                a.Depreciation_cost_summary as calc_totdeprcost,
                                a.Heading_tool_cost2 as calc_htc, a.Rolling_tool_cost as calc_rtc, a.Cutting_tool_cost as calc_ctc, a.Trimming_tool_cost as calc_ttc,
                                a.Slotting_tool_cost as calc_stc, a.Tooling_cost_summary as calc_tottoolcost,
                                a.Labor_cost_heading as calc_hlc, a.Labor_cost_rolling as calc_rlc, a.Labor_cost_cutting as calc_clc,
                                a.Labor_cost_slotting as calc_slc, a.Labor_cost_trimming as calc_tlc, a.Labor_cost_straightening as calc_stlc,
                                a.Proses1 as calc_pro1, a.Biaya_labor1 as calc_pro1lc, a.Proses2 as calc_pro2, a.Biaya_labor2 as calc_pro2lc,a.Proses3 as calc_pro3, a.Biaya_labor3 as calc_pro3lc,
                                a.Proses4 as calc_pro4, a.Biaya_labor4 as calc_pro4lc, a.Proses5 as calc_pro5, a.Biaya_labor5 as calc_pro5lc, a.Labor_cost_fq as calc_fqlc, a.Labor_cost_packing as calc_pclc,
                                a.Furnace_cost as calc_fu1, a.Furnace2_cost as calc_fu2, a.Plating_cost as calc_pl1, a.Plating2_cost as calc_pl2,
                                a.Baking_cost as calc_bkg, a.Cuci_cost as calc_cuci, a.Assembly_cost as calc_assy, a.Coating_cost as calc_coat,
                                a.Electricity_cost as calc_elc, Factory_cost as calc_fex, 
                                sum(a.Labor_cost_heading) as calc_sumlc,
                                sum(a.Furnace_cost) as calc_sumsub,
                                sum(a.Electricity_cost) as calc_sumoth, a.Processing_cost_summary as calc_totsum,
                                a.Profit_cost_summary as calc_admprofit, a.Total_cost_summary as calc_prcHMP');
                                
        $this->db->join('customer','customer.Id=a.Customer','left')
                 ->join('wire','wire.Id=a.Kode_wire','left')
                 ->join('machine_heading','machine_heading.Kode_mchnhead=a.Kode_mchnhead','left')
                 ->join('machine_rolling','machine_rolling.Kode_mchnroll=a.Kode_mchnroll','left')
                 ->join('machine_cutting','machine_cutting.Kode_mchncutt=a.Kode_mchncutt','left')
                 ->join('machine_trimming','machine_trimming.Kode_mchntrimm=a.Kode_mchntrimm','left')
                 ->join('machine_slotting','machine_slotting.Kode_mchnslott=a.Kode_mchnslott','left')
                 ->join('machine_straightening','machine_straightening.Kode_mchnstraighten=a.Kode_mchnstraighten','left');
        $this->db->where('a.Id',$Id);
        return $this->db->get('calculation a');
    }
}
    

    
/* End of file m_calculationPI.php */
/* Location: ./application/models/transaksi/m_calculationPI.php */