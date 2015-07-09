<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/easyui/datagrid-scrollview.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/easyui/datagrid-filter.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/accounting/accounting.js') ?>"></script>
<script type="text/javascript">
    $.extend($.fn.datebox.defaults, {
        formatter: function(date) {
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();
            return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
        },
        parser: function(s) {
            if (!s)
                return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0], 10);
            var m = parseInt(ss[1], 10);
            var d = parseInt(ss[2], 10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
                return new Date(y, m - 1, d);
            } else {
                return new Date();
            }
        }
    });
</script>

<table id="grid-transaksi_calculation"
       data-options="pageSize:50, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_transaksi_calculation">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                       width="100" align="center" sortable="true">Kode Calculation</th>
            <th data-options="field:'Tanggal'"                  width="100" align="center" sortable="true">Tanggal</th>
            <th data-options="field:'Customer'"                 width="100" align="center" sortable="true">Customer</th>
            <th data-options="field:'Customer_code'"            width="100" align="center" sortable="true">Customer Code</th>
            <th data-options="field:'Saga_code'"                width="100" align="center" sortable="true">Saga Code</th>
            <th data-options="field:'Type_screwOri'"            width="100" align="center" sortable="true">Type Screw</th>
            <th data-options="field:'Dia_nominal'"              width="100" align="center" sortable="true">Dia. Nominal</th>
            <th data-options="field:'Length_nominal'"           width="100" align="center" sortable="true">Length Nominal</th>
            <th data-options="field:'Quantity'"                 width="100" align="center" sortable="true" formatter="price">Quantity</th>
            <th data-options="field:'Dia_wire'"                 width="100" align="center" sortable="true">Diameter Wire</th>
            <th data-options="field:'Kode_wire'"                width="100" align="center" sortable="true">Kode Wire</th>
            <th data-options="field:'Net_weight'"               width="100" align="center" sortable="true">Net Weight</th>
            <th data-options="field:'Scrap'"                    width="100" align="center" sortable="true">Scrap</th>
            <th data-options="field:'Gross_weight'"             width="100" align="center" sortable="true">Gross Weight</th>
            <th data-options="field:'Price'"                    width="100" align="center" sortable="true">Price</th>
            <th data-options="field:'Currency'"                 width="100" align="center" sortable="true">Currency</th>
            <th data-options="field:'Exch_rate'"                width="100" align="center" sortable="true"formatter="price">Exch Rate</th>
            <th data-options="field:'Material_cost'"            width="100" align="center" sortable="true">Material cost</th>
            <th data-options="field:'Washer1'"                  width="100" align="center" sortable="true">Washer1</th>
            <th data-options="field:'Washer1_weight'"           width="100" align="center" sortable="true">Washer1 Weight</th>
            <th data-options="field:'Washer1_currency'"         width="100" align="center" sortable="true">Washer1 Currency</th>
            <th data-options="field:'Washer1_price'"            width="100" align="center" sortable="true">Washer1 Price</th>
            <th data-options="field:'Washer1_cost'"             width="100" align="center" sortable="true">Washer1 Cost</th>
            <th data-options="field:'Washer2'"                  width="100" align="center" sortable="true">Washer2</th>
            <th data-options="field:'Washer2_weight'"           width="100" align="center" sortable="true">Washer2 Weight</th>
            <th data-options="field:'Washer2_currency'"         width="100" align="center" sortable="true">Washer2 Currency</th>
            <th data-options="field:'Washer2_price'"            width="100" align="center" sortable="true">Washer2 Price</th>
            <th data-options="field:'Washer2_cost'"             width="100" align="center" sortable="true">Washer2 Cost</th>
            <th data-options="field:'Finish_weight'"            width="100" align="center" sortable="true">Finish Weight</th>
            <th data-options="field:'Washer_total_cost'"        width="100" align="center" sortable="true">Washer Total Cost</th>
            <th data-options="field:'Gol_mchn_head'"            width="100" align="center" sortable="true">Gol Msn Heading</th>
            <th data-options="field:'Kode_mchnhead'"            width="100" align="center" sortable="true">Kode Msn Heading</th>
            <th data-options="field:'Heading_depr_cost'"        width="100" align="center" sortable="true">Heading Depr Cost</th>
            <th data-options="field:'Gol_mchn_roll'"            width="100" align="center" sortable="true">Gol Msn Rolling</th>
            <th data-options="field:'Kode_mchnroll'"            width="100" align="center" sortable="true">Kode Msn Rolling</th>
            <th data-options="field:'Rolling_depr_cost'"        width="100" align="center" sortable="true">Rolling Depr Cost</th>
            <th data-options="field:'Freq_mchnroll'"            width="100" align="center" sortable="true">Frequency</th>
            <th data-options="field:'Rolling_depr_cost2'"       width="100" align="center" sortable="true">Rolling Depr Cost 2</th>
            <th data-options="field:'Mchn_cutting'"             width="100" align="center"  sortable="true">Mesin Cutting</th>
            <th data-options="field:'Kode_mchncutt'"            width="100" align="center" sortable="true">Kode Msn Cutting</th>
            <th data-options="field:'Cutting_depr_cost'"        width="100" align="center" sortable="true">Cutting Depr Cost</th>
            <th data-options="field:'Mchn_slotting'"            width="100" align="center"  sortable="true">Mesin Slotting</th>
            <th data-options="field:'Kode_mchnslott'"           width="100" align="center" sortable="true">Kode Msn Slotting</th>
            <th data-options="field:'Slotting_depr_cost'"       width="100" align="center" sortable="true">Slotting Depr Cost</th>
            <th data-options="field:'Mchn_trimming'"            width="100" align="center"  sortable="true">Mesin Trimming</th>
            <th data-options="field:'Kode_mchntrimm'"           width="100" align="center" sortable="true">Kode Msn Trimmting</th>
            <th data-options="field:'Trimming_depr_cost'"       width="100" align="center" sortable="true">Trimming Depr Cost</th>
            <th data-options="field:'Mchn_straightening'"       width="100" align="center"  sortable="true">Mesin Straightening</th>
            <th data-options="field:'Kode_mchnstraighten'"      width="100" align="center" sortable="true">Kode Msn Straightening</th>
            <th data-options="field:'Straightening_depr_cost'"  width="100" align="center" sortable="true">Straightening Depr Cost</th>
            <th data-options="field:'Mchn_pressing'"            width="100" align="center"  sortable="true">Mesin Pressing</th>
            <th data-options="field:'Kode_mchnpress'"           width="100" align="center" sortable="true">Kode Msn Pressing</th>
            <th data-options="field:'Pressing_depr_cost'"       width="100" align="center" sortable="true">Pressing Depr Cost</th>
            <th data-options="field:'Category'"                 width="100" align="center" sortable="true">Category Heading</th>
            <th data-options="field:'Heading_tool_cost'"        width="100" align="center" sortable="true">Heading Tool Cost</th>
            <th data-options="field:'Heading_currency'"         width="100" align="center" sortable="true">Currency</th>
            <th data-options="field:'Heading_tool_cost2'"       width="100" align="center" sortable="true">Heading Tool Cost(IDR)</th>
            <th data-options="field:'Category2'"                width="100" align="center" sortable="true">Category Rolling</th>
            <th data-options="field:'Rolling_tool_cost'"        width="100" align="center" sortable="true">Rolling Tool Cost</th>
            <th data-options="field:'Cutting_tool_cost'"        width="100" align="center" sortable="true">Cutting Tool Cost</th>
            <th data-options="field:'Slotting_tool_cost'"       width="100" align="center" sortable="true">Slottin Tool Cost</th>
            <th data-options="field:'Trimming_tool_cost'"       width="100" align="center" sortable="true">Trimming Tool Cost</th>
            <th data-options="field:'Gaji_per_sec'"             width="100" align="center" sortable="true">Gaji Heading/sec</th>
            <th data-options="field:'Labor_cost_heading'"       width="100" align="center" sortable="true">Heading Labor Cost</th>
            <th data-options="field:'Gaji_per_sec2'"            width="100" align="center" sortable="true">Gaji Rolling/sec</th>
            <th data-options="field:'Labor_cost_rolling'"       width="100" align="center" sortable="true">Rolling Labor Cost</th>
            <th data-options="field:'Gaji_per_sec3'"            width="100" align="center" sortable="true">Gaji Cutting/sec</th>
            <th data-options="field:'Labor_cost_cutting'"       width="100" align="center" sortable="true">Cutting Labor Cost</th>
            <th data-options="field:'Gaji_per_sec4'"            width="100" align="center" sortable="true">Gaji Slotting/sec</th>
            <th data-options="field:'Labor_cost_slotting'"      width="100" align="center" sortable="true">Slotting Labor Cost</th>
            <th data-options="field:'Gaji_per_sec5'"            width="100" align="center" sortable="true">Gaji Trimming/sec</th>
            <th data-options="field:'Labor_cost_trimming'"      width="100" align="center" sortable="true">Trimming Labor Cost</th>
            <th data-options="field:'Labor_cost_straightening'" width="100" align="center" sortable="true">Straightening Labor Cost</th>
            <th data-options="field:'Proses1'"                  width="100" align="center" sortable="true">Proses 1</th>
            <th data-options="field:'Jumlah_shot1'"             width="100" align="center" sortable="true">Jumlah Shot 1</th>
            <th data-options="field:'Biaya_labor1'"             width="100" align="center" sortable="true">Biaya Labor 1</th>
            <th data-options="field:'Proses2'"                  width="100" align="center" sortable="true">Proses 2</th>
            <th data-options="field:'Jumlah_shot2'"             width="100" align="center" sortable="true">Jumlah Shot 2</th>
            <th data-options="field:'Biaya_labor2'"             width="100" align="center" sortable="true">Biaya Labor 2</th>
            <th data-options="field:'Proses3'"                  width="100" align="center" sortable="true">Proses 3</th>
            <th data-options="field:'Jumlah_shot3'"             width="100" align="center" sortable="true">Jumlah Shot 3</th>
            <th data-options="field:'Biaya_labor3'"             width="100" align="center" sortable="true">Biaya Labor 3</th>
            <th data-options="field:'Proses4'"                  width="100" align="center" sortable="true">Proses 4</th>
            <th data-options="field:'Jumlah_shot4'"             width="100" align="center" sortable="true">Jumlah Shot 4</th>
            <th data-options="field:'Biaya_labor4'"             width="100" align="center" sortable="true">Biaya Labor 4</th>
            <th data-options="field:'Proses5'"                  width="100" align="center" sortable="true">Proses 5</th>
            <th data-options="field:'Jumlah_shot5'"             width="100" align="center" sortable="true">Jumlah Shot 5</th>
            <th data-options="field:'Biaya_labor5'"             width="100" align="center" sortable="true">Biaya Labor 5</th>
            <th data-options="field:'Kode_turret2'"             width="100" align="center" sortable="true">Kode Turret2</th>
            <th data-options="field:'Price_turret2'"            width="100" align="center" sortable="true">Price Turret2</th>
            <th data-options="field:'Currency_turret2'"         width="100" align="center" sortable="true">Currency Turret2</th>
            <th data-options="field:'Turret2_cost'"             width="100" align="center" sortable="true">Turret2 Cost</th>
            <th data-options="field:'Gaji_per_gram_fq'"         width="100" align="center" sortable="true">Gaji FQ/gr</th>
            <th data-options="field:'Labor_cost_fq'"            width="100" align="center" sortable="true">FQ Labor Cost</th>
            <th data-options="field:'Gaji_per_gram_packing'"    width="100" align="center" sortable="true">Gaji Packing/gr</th>
            <th data-options="field:'Labor_cost_packing'"       width="100" align="center" sortable="true">Packing Labor Cost</th>
            <th data-options="field:'Biaya_per_gram_elc'"       width="100" align="center" sortable="true">Biaya Listrik/gr</th>
            <th data-options="field:'Electricity_cost'"         width="100" align="center" sortable="true">Electricity Cost</th>
            <th data-options="field:'Biaya_per_gram_fexp'"      width="100" align="center" sortable="true">Biaya pabrik/gr</th>
            <th data-options="field:'Factory_cost'"             width="100" align="center" sortable="true">Factory Exp Cost</th>
            <th data-options="field:'Kode_furnace'"             width="100" align="center" sortable="true">Kode Furnace</th>
            <th data-options="field:'Price_furnace'"            width="100" align="center" sortable="true">Price Furnace</th>
            <th data-options="field:'Currency_furnace'"         width="100" align="center" sortable="true">Currency Fur</th>
            <th data-options="field:'Furnace_cost'"             width="100" align="center" sortable="true">Furnace Cost</th>
            <th data-options="field:'Kode_furnace2'"            width="100" align="center" sortable="true">Kode Furnace2</th>
            <th data-options="field:'Price_furnace2'"           width="100" align="center" sortable="true">Price Furnace2</th>
            <th data-options="field:'Currency_furnace2'"        width="100" align="center" sortable="true">Currency Fur2</th>
            <th data-options="field:'Furnace2_cost'"            width="100" align="center" sortable="true">Furnace2 Cost</th>
            <th data-options="field:'Kode_plating'"             width="100" align="center" sortable="true">Kode Plating</th>
            <th data-options="field:'Price_plating'"            width="100" align="center" sortable="true">Price Plating</th>
            <th data-options="field:'Currency_plating'"         width="100" align="center" sortable="true">Currency Plating</th>
            <th data-options="field:'Plating_cost'"             width="100" align="center" sortable="true">Plating Cost</th>
            <th data-options="field:'Baking'"                   width="100" align="center" sortable="true">Baking</th>
            <th data-options="field:'Baking_cost'"              width="100" align="center" sortable="true">Baking Cost</th>
            <th data-options="field:'Cuci'"                     width="100" align="center" sortable="true">Cuci</th>
            <th data-options="field:'Cuci_cost'"                width="100" align="center" sortable="true">Cuci Cost</th>
            <th data-options="field:'Assembly'"                 width="100" align="center" sortable="true">Assembly</th>
            <th data-options="field:'Kode_assembly'"            width="100" align="center" sortable="true">Kode Assy</th>
            <th data-options="field:'Assembly_cost'"            width="100" align="center" sortable="true">Assembly Cost</th>
            <th data-options="field:'Kode_coating'"             width="100" align="center" sortable="true">Kode Coating</th>
            <th data-options="field:'Price_coating'"            width="100" align="center" sortable="true">Price Coating</th>
            <th data-options="field:'Currency_coating'"         width="100" align="center" sortable="true">Currency Coating</th>
            <th data-options="field:'Coating_cost'"             width="100" align="center" sortable="true">Coating Cost</th>
            <th data-options="field:'Processing_cost_summary'"  width="100" align="center" sortable="true">Processing Cost</th>
            <th data-options="field:'Tooling_cost_summary'"     width="100" align="center" sortable="true">Tooling Cost</th>
            <th data-options="field:'Depreciation_cost_summary'" width="100" align="center" sortable="true">Depr. Cost</th>
            <th data-options="field:'Profit_rate_summary'"      width="100" align="center" sortable="true">Profit rate</th>
            <th data-options="field:'Profit_cost_summary'"      width="100" align="center" sortable="true">Profit cost</th>
            <th data-options="field:'Total_cost_summary'"       width="100" align="center" sortable="true">Total Price</th>
            <th data-options="field:'Price_per_kg'"             width="100" align="center" sortable="true">Price per kg</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_transaksi_calculation = [{
            text: 'New',
            iconCls: 'icon-new_file',
            handler: function() {
                transaksicalculationCreate();
            }
        }, {
            text: 'Edit',
            iconCls: 'icon-edit',
            handler: function() {
                transaksicalculationUpdate();
            }
        }, {
            text: 'Delete',
            iconCls: 'icon-cancel',
            handler: function() {
                transaksicalculationHapus();
            }
        }, {
            text: 'Refresh',
            iconCls: 'icon-reload',
            handler: function() {
                $('#grid-transaksi_calculation').datagrid('reload');
            }
        }, {
            text: 'Session Data',
            iconCls: 'icon-time',
            handler: function() {
                transaksicalculationSesData();
            }
        }];
    $('#grid-transaksi_calculation').datagrid({view: scrollview, remoteFilter: true,
        url: '<?php echo site_url('transaksi/calculation/index'); ?>?grid=true'})
            .datagrid('enableFilter');

    function price(value, row, index)
    {
        return accounting.formatMoney(value, "", 0, ",", ".");
    }

    function transaksicalculationCreate() {
        $('#dlg-transaksi_calculation').dialog({modal: true}).dialog('open').dialog('setTitle', 'Tambah Data');
        $('#fm-transaksi_calculation').form('clear');
        url = '<?php echo site_url('transaksi/calculation/create'); ?>';

        $('#Customer_code').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Saga_code').next().find('input').focus();
            }
        });

        $('#Saga_code').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Type_screwOri').next().find('input').focus();
            }
        });

        $('#Type_screwOri').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var tso = $('#Type_screwOri').textbox('getValue');
                $('#Dia_nominal').next().find('input').focus();
                $('#Type_screw').textbox('setValue', tso);
                $('#Type_screw2').textbox('setValue', tso);
            }
        });

        $('#Dia_nominal').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var dn = $('#Dia_nominal').numberbox('getValue');
                $('#Length_nominal').next().find('input').focus();
                $('#Dia_nominal2').numberbox('setValue', dn);
                $('#Dia_nominal3').numberbox('setValue', dn);
                $('#Dia_nominal4').numberbox('setValue', dn);
                $('#Dia_nominal5').numberbox('setValue', dn);
                $('#Dia_nominal6').numberbox('setValue', dn);
                $('#Dia_nominal7').numberbox('setValue', dn);
                $('#Dia_nominal8').numberbox('setValue', dn);
                $('#Dia_nominal9').numberbox('setValue', dn);
                $('#Dia_nominal10').numberbox('setValue', dn);
                $('#Dia_nominal11').numberbox('setValue', dn);
                $('#Dia_nominal12').numberbox('setValue', dn);
                $('#Dia_nominal13').numberbox('setValue', dn);
            }
        });


        $('#Length_nominal').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var ln = $('#Length_nominal').numberbox('getValue');
                $('#Length_nominal2').numberbox('setValue', ln);
                $('#Length_nominal3').numberbox('setValue', ln);
                $('#Length_nominal4').numberbox('setValue', ln);
                $('#Length_nominal5').numberbox('setValue', ln);
                $('#Length_nominal6').numberbox('setValue', ln);
                $('#Quantity').next().find('input').focus();
            }
        });

        $('#Quantity').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var qty = $('#Quantity').numberbox('getValue');
                $('#Quantity2').numberbox('setValue', qty);
                $('#Quantity3').numberbox('setValue', qty);
                $('#Quantity4').numberbox('setValue', qty);
                $('#Quantity5').numberbox('setValue', qty);
                $('#Quantity6').numberbox('setValue', qty);
                $('#Quantity7').numberbox('setValue', qty);
            }
        });

        $('#Dia_wire').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#bta').focus();
            }
        });

        $('#bta').keyup(function(e) {
            if (e.keyCode == 13) {
                diameter();
                $('#Kode_wire').next().find('input').focus();
            }
        });
        
         $.post('<?php echo site_url('transaksi/calculation/getSesData'); ?>', function(result) {
            $('#Exch_rate').numberbox('setValue', result.Exch_rate);
            $('#Exch_rate_turret2').numberbox('setValue',result.Exch_rate);
            $('#Exch_rate_furnace').numberbox('setValue',result.Exch_rate);
            $('#Exch_rate_furnace2').numberbox('setValue',result.Exch_rate);
            $('#Exch_rate_plating').numberbox('setValue',result.Exch_rate);
            $('#Exch_rate_coating').numberbox('setValue',result.Exch_rate);
            $('#Profit_rate_summary').numberbox('setValue', result.Profit_rate);
            $('#Scrap').numberbox('setValue', result.Scrap);
        }, 'json'); //ambil session data
 
        $('#Net_weight').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Gross_weight').next().find('input').focus();
                 var fw = $('#Net_weight').numberbox('getValue');
                      $('#Finish_weight').numberbox('setValue', fw);
            }           
        });
        
        $('#Gross_weight').numberbox('textbox').keyup(function(e) {
            if (e.keyCode == 13) {
                var nw = $('#Net_weight').numberbox('getValue');
                var sc = $('#Scrap').numberbox('getValue');
                var pctsc = eval(sc) / 100;
                var gw = (1 + eval(pctsc)) * eval(nw);
                $('#Gross_weight').numberbox('setValue', gw);

                var cur = $('#Currency').textbox('getValue');
                var prc = $('#Price').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                if (cur == 'USD')
                {
                    var mc = eval(gw) * eval(prc) * eval(exc) / 1000;
                }
                else
                {
                    var mc = eval(gw) * eval(prc) / 1000;
                }
                $('#Material_cost').numberbox('setValue', mc);
                $('#Material_cost_summary').numberbox('setValue', mc);
            }
        });

        $('#Washer2_weight').numberbox('setValue', '0');
        $('#Washer2_cost').numberbox('setValue', '0');
        
        
        $('#Finish_weight').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight').numberbox('getValue');
                      $('#Finish_weight2').numberbox('setValue', fw);
                      $('#Finish_weight3').numberbox('setValue', fw);
                      $('#Finish_weight4').numberbox('setValue', fw);
                      gaji_FQ();
                      gaji_packing();
                      $('#Finish_weight5').numberbox('setValue', fw);
                      biaya_listrik();
                      biaya_factory();
                      
                }
        });
        $('#Heading_depr_cost').numberbox('setValue', 0);
        $('#Rolling_depr_cost2').numberbox('setValue', 0);
        $('#Cutting_depr_cost').numberbox('setValue', 0);
        $('#Slotting_depr_cost').numberbox('setValue', 0);
        $('#Trimming_depr_cost').numberbox('setValue', 0);
        $('#Straightening_depr_cost').numberbox('setValue', 0);
        $('#Pressing_depr_cost').numberbox('setValue', 0);
        
        $('#Pressing_depr_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hdc = $('#Heading_depr_cost').numberbox('getValue');
                var rdc2 = $('#Rolling_depr_cost2').numberbox('getValue');
                var cdc = $('#Cutting_depr_cost').numberbox('getValue');
                var sdc = $('#Slotting_depr_cost').numberbox('getValue');
                var tdc = $('#Trimming_depr_cost').numberbox('getValue');
                var stdc = $('#Straightening_depr_cost').numberbox('getValue');
                var pdc = $('#Pressing_depr_cost').numberbox('getValue');
                var dcs = ((eval(hdc) + eval(rdc2) + eval(cdc)) + eval(sdc) + eval(tdc) + eval(stdc)+ eval(pdc));
                $('#Depreciation_cost_summary').numberbox('setValue', dcs);
            }
        });

        $('#Type_screw').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gol_mchn = $('#Gol_mchn_head2').textbox('getValue');
                if (gol_mchn == "Heading 1 die")
                {
                var cat = $('#Type_screw').textbox('getValue');
                var dia = $('#Dia_nominal9').numberbox('getValue');
                var length = $('#Length_nominal2').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getCategory'); ?>',
                        {typescr: cat, gol_mchn: gol_mchn, dia: dia, length: length}, function(result) {
                    $('#Category').textbox('setValue', result.Category1);
                    $('#Heading_tool_cost').numberbox('setValue', result.htc);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                else if(gol_mchn == "Heading 2 dies")
                {
                var item = $('#Type_screw').textbox('getValue');
                var dianom2 = $('#Dia_nominal9').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getHeading2'); ?>',
                        {typescrhead2: item, dianom2: dianom2}, function(result) {
                    $('#Heading_tool_cost').numberbox('setValue', result.htc2);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                else(gol_mchn == "Heading 4 dies")
                {
                var item4 = $('#Type_screw').textbox('getValue');
                var dianom4 = $('#Dia_nominal9').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getHeading4'); ?>',
                        {typescrhead4: item4, dianom4: dianom4}, function(result) {
                    $('#Heading_tool_cost').numberbox('setValue', result.htc4);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                
                var hcurr = $('#Heading_currency').textbox('getValue');
                var htc2 =  $('#Heading_tool_cost').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                
                if(hcurr == "IDR")
                {
                $('#Heading_tool_cost2').numberbox('setValue', htc2 );
                }
                else {
                $('#Heading_tool_cost2').numberbox('setValue', htc2*exc);
                }
            }
        });

        $('#Type_screw2').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var cat2 = $('#Type_screw2').textbox('getValue');
                var dia2 = $('#Dia_nominal10').numberbox('getValue');
                var length2 = $('#Length_nominal3').numberbox('getValue');
                var freq = $('#Freq_mchnroll').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getCategory2'); ?>',
                        {typescr2: cat2, dia2: dia2, length2: length2}, function(result) {
                    $('#Category2').textbox('setValue', result.Category2)
                    $('#Rolling_tool_cost').numberbox('setValue', (result.rtc)*freq);
                }, 'json');
                $('#Rolling_tool_cost').next().focus();
            }
        });
        
        $('#Heading_tool_cost2').numberbox('setValue', 0);
        $('#Rolling_tool_cost').numberbox('setValue', 0);
        $('#Cutting_tool_cost').numberbox('setValue', 0);
        $('#Slotting_tool_cost').numberbox('setValue', 0);
        $('#Trimming_tool_cost').numberbox('setValue', 0);
        
        $('#Trimming_tool_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var htc2 = $('#Heading_tool_cost2').numberbox('getValue');
                var rtc = $('#Rolling_tool_cost').numberbox('getValue');
                var ctc = $('#Cutting_tool_cost').numberbox('getValue');
                var stc = $('#Slotting_tool_cost').numberbox('getValue');
                var ttc = $('#Trimming_tool_cost').numberbox('getValue');
                var tcs = ((eval(htc2) + eval(rtc) + eval(ctc)) + eval(stc) + eval(ttc));
                $('#Tooling_cost_summary').numberbox('setValue', tcs);
            }
        });
        
        $('#Quantity2').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gps = $('#Gaji_per_sec').numberbox('getValue');
                var ct = $('#Cycle_time').numberbox('getValue');
                var dt = $('#Dandori_time').numberbox('getValue');
                var qpm = $('#Quantity2').numberbox('getValue');
                var lch = ((eval(ct) * eval(qpm) + eval(dt)) * eval(gps) / eval(qpm));
                $('#Labor_cost_heading').numberbox('setValue', lch);
            }
        });
        $('#Quantity3').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsr = $('#Gaji_per_sec2').numberbox('getValue');
                var ctr = $('#Cycle_time2').numberbox('getValue');
                var dtr = $('#Dandori_time2').numberbox('getValue');
                var qpmr = $('#Quantity3').numberbox('getValue');
                var lcr = ((eval(ctr) * eval(qpmr) + eval(dtr)) * eval(gpsr) / eval(qpmr));
                var freq = $('#Freq_mchnroll').numberbox('getValue');
                $('#Labor_cost_rolling').numberbox('setValue', lcr * freq);
            }
        });
        $('#Quantity4').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsc = $('#Gaji_per_sec3').numberbox('getValue');
                var ctc = $('#Cycle_time3').numberbox('getValue');
                var dtc = $('#Dandori_time3').numberbox('getValue');
                var qpmc = $('#Quantity4').numberbox('getValue');
                var lcc = ((eval(ctc) * eval(qpmc) + eval(dtc)) * eval(gpsc) / eval(qpmc));
                $('#Labor_cost_cutting').numberbox('setValue', lcc);
            }
        });
        $('#Quantity5').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpss = $('#Gaji_per_sec4').numberbox('getValue');
                var cts = $('#Cycle_time4').numberbox('getValue');
                var dts = $('#Dandori_time4').numberbox('getValue');
                var qpms = $('#Quantity5').numberbox('getValue');
                var lcs = ((eval(cts) * eval(qpms) + eval(dts)) * eval(gpss) / eval(qpms));
                $('#Labor_cost_slotting').numberbox('setValue', lcs);
            }
        });
        $('#Quantity6').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpst = $('#Gaji_per_sec5').numberbox('getValue');
                var ctt = $('#Cycle_time5').numberbox('getValue');
                var dtt = $('#Dandori_time5').numberbox('getValue');
                var qpmt = $('#Quantity6').numberbox('getValue');
                var lct = ((eval(ctt) * eval(qpmt) + eval(dtt)) * eval(gpst) / eval(qpmt));
                $('#Labor_cost_trimming').numberbox('setValue', lct);
            }
        });
        $('#Quantity7').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsst = $('#Gaji_per_sec6').numberbox('getValue');
                var ctst = $('#Cycle_time6').numberbox('getValue');
                var dtst = $('#Dandori_time6').numberbox('getValue');
                var qpmst = $('#Quantity7').numberbox('getValue');
                var lcst = ((eval(ctst) * eval(qpmst) + eval(dtst)) * eval(gpsst) / eval(qpmst));
                $('#Labor_cost_straightening').numberbox('setValue', lcst);
            }
        });
        $('#Jumlah_shot1').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot1').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor1').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses2').next().focus();  
            }
        });
        $('#Jumlah_shot2').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot2').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor2').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses3').next().focus();  
            }
        });
        $('#Jumlah_shot3').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot3').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor3').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses4').next().focus();  
            }
        });
        $('#Jumlah_shot4').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot4').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor4').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses5').next().focus();  
            }
        });
        $('#Jumlah_shot5').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot5').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor5').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');  
            }
        });
         $('#Gaji_per_gram_fq').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight4').numberbox('getValue');
                var gpg =$('#Gaji_per_gram_fq').numberbox('getValue'); 
            $('#Labor_cost_fq').numberbox('setValue', eval(gpg)*eval(fw));
            $('#Gaji_per_gram_packing').next().focus();   
            }
        });
        $('#Gaji_per_gram_packing').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight4').numberbox('getValue');
                var gpg =$('#Gaji_per_gram_packing').numberbox('getValue'); 
            $('#Labor_cost_packing').numberbox('setValue', eval(gpg)*eval(fw)); 
            }
        });
        $('#Biaya_per_gram_elc').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight5').numberbox('getValue');
                var bpg =$('#Biaya_per_gram_elc').numberbox('getValue'); 
            $('#Electricity_cost').numberbox('setValue', eval(bpg)*eval(fw));
            $('#Biaya_per_gram_fexp').next().focus();   
            }
        });
        $('#Biaya_per_gram_fexp').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight5').numberbox('getValue');
                var bpg =$('#Biaya_per_gram_fexp').numberbox('getValue'); 
            $('#Factory_cost').numberbox('setValue', eval(bpg)*eval(fw)); 
            }
        });
        
        $('#Labor_cost_heading').numberbox('setValue', 0);
        $('#Labor_cost_rolling').numberbox('setValue', 0);
        $('#Labor_cost_cutting').numberbox('setValue', 0);
        $('#Labor_cost_slotting').numberbox('setValue', 0);
        $('#Labor_cost_trimming').numberbox('setValue', 0);
        $('#Labor_cost_straightening').numberbox('setValue', 0);
        $('#Biaya_labor1').numberbox('setValue', 0);
        $('#Biaya_labor2').numberbox('setValue', 0);
        $('#Biaya_labor3').numberbox('setValue', 0);
        $('#Biaya_labor4').numberbox('setValue', 0);
        $('#Biaya_labor5').numberbox('setValue', 0);
        $('#Turret2_cost').numberbox('setValue', 0);
        $('#Labor_cost_fq').numberbox('setValue', 0);
        $('#Labor_cost_packing').numberbox('setValue', 0);
        $('#Electricity_cost').numberbox('setValue', 0);
        $('#Factory_cost').numberbox('setValue', 0);
        $('#Furnace_cost').numberbox('setValue', 0);
        $('#Furnace2_cost').numberbox('setValue', 0);
        $('#Plating_cost').numberbox('setValue', 0);
        $('#Baking_cost').numberbox('setValue', 0);
        $('#Cuci_cost').numberbox('setValue', 0);
        $('#Assembly_cost').numberbox('setValue', 0);
        $('#Coating_cost').numberbox('setValue', 0);
                
         $('#Coating_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hlc = $('#Labor_cost_heading').numberbox('getValue');
                var rlc =$('#Labor_cost_rolling').numberbox('getValue');
                var clc = $('#Labor_cost_cutting').numberbox('getValue');
                var slc =$('#Labor_cost_slotting').numberbox('getValue');
                var tlc = $('#Labor_cost_trimming').numberbox('getValue');
                var stlc =$('#Labor_cost_straightening').numberbox('getValue');
                var turlc1 = $('#Biaya_labor1').numberbox('getValue');
                var turlc2 =$('#Biaya_labor2').numberbox('getValue');
                var turlc3 = $('#Biaya_labor3').numberbox('getValue');
                var turlc4 =$('#Biaya_labor4').numberbox('getValue');
                var turlc5 = $('#Biaya_labor5').numberbox('getValue');
                var turc2 = $('#Turret2_cost').numberbox('getValue');
                var fqlc = $('#Labor_cost_fq').numberbox('getValue');
                var plc = $('#Labor_cost_packing').numberbox('getValue');
                var bl =$('#Electricity_cost').numberbox('getValue');
                var bf = $('#Factory_cost').numberbox('getValue');
                var fc=$('#Furnace_cost').numberbox('getValue');
                var fc2=$('#Furnace2_cost').numberbox('getValue');
                var pc = $('#Plating_cost').numberbox('getValue');
                var bc=$('#Baking_cost').numberbox('getValue');
                var ccc=$('#Cuci_cost').numberbox('getValue');
                var ac = $('#Assembly_cost').numberbox('getValue');
                var cc=$('#Coating_cost').numberbox('getValue');
                var pcsum=eval(hlc)+ eval(rlc)+ eval(clc)+eval(slc)+eval(tlc)+eval(stlc)+eval(turlc1)+eval(turlc2)+eval(turlc3)+eval(turlc4)+eval(turlc5)+eval(turc2)+eval(fqlc)+eval(plc)+eval(bl)+eval(bf)+eval(fc)+eval(fc2)+eval(pc)+eval(bc)+eval(ccc)+eval(ac)+eval(cc);    
           
            $('#Processing_cost_summary').numberbox('setValue', pcsum); 
            }
        });
        
        $('#Material_cost_summary').numberbox('setValue', 0);
        $('#Washer_total_cost_summary').numberbox('setValue', 0);
        $('#Processing_cost_summary').numberbox('setValue', 0);
        $('#Tooling_cost_summary').numberbox('setValue', 0);
        $('#Depreciation_cost_summary').numberbox('setValue', 0);
        $('#Profit_cost_summary').numberbox('setValue', 0);
        
        $('#Profit_rate_summary').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var mcs = $('#Material_cost_summary').numberbox('getValue');
                var wtcs =$('#Washer_total_cost_summary').numberbox('getValue');
                var pcs = $('#Processing_cost_summary').numberbox('getValue');
                var tcs =$('#Tooling_cost_summary').numberbox('getValue');
                var dcsum = $('#Depreciation_cost_summary').numberbox('getValue');
                var prs =$('#Profit_rate_summary').numberbox('getValue');
                var prcs = eval(prs/100)*(eval(mcs)+eval(wtcs)+eval(pcs)+eval(tcs));
                var tcsum =eval(prcs)+eval(mcs)+eval(wtcs)+eval(pcs)+eval(tcs)+eval(dcsum);
                var nw = $('#Net_weight').numberbox('getValue');
                var ppkg = eval(1000/eval(nw))*eval(tcsum);
            $('#Profit_cost_summary').numberbox('setValue', prcs);
            $('#Total_cost_summary').numberbox('setValue', tcsum);
            $('#Price_per_kg').numberbox('setValue', ppkg);
            }
        });
    }
    

    function transaksicalculationUpdate() {
        var row = $('#grid-transaksi_calculation').datagrid('getSelected');
        if (row) {
            $('#dlg-transaksi_calculation').dialog({modal: true}).dialog('open').dialog('setTitle', 'Edit Data');
            $('#fm-transaksi_calculation').form('load', row);
            url = '<?php echo site_url('transaksi/calculation/update'); ?>/' + row.Id;
         $('#Customer_code').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Saga_code').next().find('input').focus();
            }
        });

        $('#Saga_code').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Type_screwOri').next().find('input').focus();
            }
        });

        var tso = $('#Type_screwOri').textbox('getValue');
            $('#Type_screw').textbox('setValue', tso);
            $('#Type_screw2').textbox('setValue', tso);
            
        $('#Type_screwOri').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var tso = $('#Type_screwOri').textbox('getValue');
                $('#Dia_nominal').next().find('input').focus();
                $('#Type_screw').textbox('setValue', tso);
                $('#Type_screw2').textbox('setValue', tso);
            }
        });    

        var dn = $('#Dia_nominal').numberbox('getValue');
                $('#Dia_nominal2').numberbox('setValue', dn);
                $('#Dia_nominal3').numberbox('setValue', dn);
                $('#Dia_nominal4').numberbox('setValue', dn);
                $('#Dia_nominal5').numberbox('setValue', dn);
                $('#Dia_nominal6').numberbox('setValue', dn);
                $('#Dia_nominal7').numberbox('setValue', dn);
                $('#Dia_nominal8').numberbox('setValue', dn);
                $('#Dia_nominal9').numberbox('setValue', dn);
                $('#Dia_nominal10').numberbox('setValue', dn);
                $('#Dia_nominal11').numberbox('setValue', dn);
                $('#Dia_nominal12').numberbox('setValue', dn);
                $('#Dia_nominal13').numberbox('setValue', dn);
                
        $('#Dia_nominal').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var dn = $('#Dia_nominal').numberbox('getValue');
                $('#Length_nominal').next().find('input').focus();
                $('#Dia_nominal2').numberbox('setValue', dn);
                $('#Dia_nominal3').numberbox('setValue', dn);
                $('#Dia_nominal4').numberbox('setValue', dn);
                $('#Dia_nominal5').numberbox('setValue', dn);
                $('#Dia_nominal6').numberbox('setValue', dn);
                $('#Dia_nominal7').numberbox('setValue', dn);
                $('#Dia_nominal8').numberbox('setValue', dn);
                $('#Dia_nominal9').numberbox('setValue', dn);
                $('#Dia_nominal10').numberbox('setValue', dn);
                $('#Dia_nominal11').numberbox('setValue', dn);
                $('#Dia_nominal12').numberbox('setValue', dn);
                $('#Dia_nominal13').numberbox('setValue', dn);
            }
        });        
                
       var ln = $('#Length_nominal').numberbox('getValue');
                $('#Length_nominal2').numberbox('setValue', ln);
                $('#Length_nominal3').numberbox('setValue', ln);
                $('#Length_nominal4').numberbox('setValue', ln);
                $('#Length_nominal5').numberbox('setValue', ln);
                $('#Length_nominal6').numberbox('setValue', ln);
      
       $('#Length_nominal').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var ln = $('#Length_nominal').numberbox('getValue');
                $('#Length_nominal2').numberbox('setValue', ln);
                $('#Length_nominal3').numberbox('setValue', ln);
                $('#Length_nominal4').numberbox('setValue', ln);
                $('#Length_nominal5').numberbox('setValue', ln);
                $('#Length_nominal6').numberbox('setValue', ln);
                $('#Quantity').next().find('input').focus();
            }
        });         

       var qty = $('#Quantity').numberbox('getValue');
                $('#Quantity2').numberbox('setValue', qty);
                $('#Quantity3').numberbox('setValue', qty);
                $('#Quantity4').numberbox('setValue', qty);
                $('#Quantity5').numberbox('setValue', qty);
                $('#Quantity6').numberbox('setValue', qty);
                $('#Quantity7').numberbox('setValue', qty);
      
    $('#Quantity').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var qty = $('#Quantity').numberbox('getValue');
                $('#Quantity2').numberbox('setValue', qty);
                $('#Quantity3').numberbox('setValue', qty);
                $('#Quantity4').numberbox('setValue', qty);
                $('#Quantity5').numberbox('setValue', qty);
                $('#Quantity6').numberbox('setValue', qty);
                $('#Quantity7').numberbox('setValue', qty);
            }
        });

        $('#Dia_wire').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#bta').focus();
            }
        });

        $('#bta').keyup(function(e) {
            if (e.keyCode == 13) {
                diameter();
                $('#Kode_wire').next().find('input').focus();
            }
        });
        
         var exr = $('#Exch_rate').numberbox('getValue');
                $('#Exch_rate_turret2').numberbox('setValue',exr);
                $('#Exch_rate_furnace').numberbox('setValue',exr);
                $('#Exch_rate_furnace2').numberbox('setValue',exr);
                $('#Exch_rate_plating').numberbox('setValue',exr);
                $('#Exch_rate_coating').numberbox('setValue',exr);
        
         $('#Exch_rate').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
               var gw = $('#Gross_weight').numberbox('getValue');
               var cur = $('#Currency').textbox('getValue');
               var prc = $('#Price').numberbox('getValue');
               var exc = $('#Exch_rate').numberbox('getValue');
                if (cur == 'USD')
                {
                    var mc = eval(gw) * eval(prc) * eval(exc) / 1000;
                }
                else
                {
                    var mc = eval(gw) * eval(prc) / 1000;
                }
                $('#Material_cost').numberbox('setValue', mc);
                $('#Material_cost_summary').numberbox('setValue', mc);
                
               var curws1 = $('#Washer1_currency').textbox('getValue');
               var prcw1 = $('#Washer1_price').numberbox('getValue');
               var excw1 = $('#Exch_rate').numberbox('getValue');
                if (curws1 == 'USD')
                {
                    var ws1c = eval(prcw1) * eval(excw1);
                }
                else
                {
                    var ws1c = eval(prcw1);
                }
                $('#Washer1_cost').numberbox('setValue',ws1c);
               var curws2 = $('#Washer2_currency').textbox('getValue');
               var prcw2 = $('#Washer2_price').numberbox('getValue');
               var excw2 = $('#Exch_rate').numberbox('getValue');
                if (curws2 == 'USD')
                {
                    var ws2c = eval(prcw2) * eval(excw2);
                }
                else
                {
                    var ws2c = eval(prcw2);
                }
                $('#Washer2_cost').numberbox('setValue',ws2c);
                $('#Washer_total_cost').numberbox('setValue',ws1c+ws2c);
                
                $('#Exch_rate_turret2').numberbox('setValue',exc);
                var curtur2 = $('#Currency_turret2').textbox('getValue');
                var prctur2 = $('#Price_turret2').numberbox('getValue');
                var exctur2 = $('#Exch_rate_turret2').numberbox('getValue');
                if (curtur2 == 'USD')
                {
                    var tur2c = eval(prctur2) * eval(exctur2);
                }
                else
                {
                    var tur2c = eval(prctur2) ;
                }
                $('#Turret2_cost').numberbox('setValue',tur2c);
                
                $('#Exch_rate_furnace').numberbox('setValue',exc);
                var curfur = $('#Currency_furnace').textbox('getValue');
                var prcfur = $('#Price_furnace').numberbox('getValue');
                var excfur = $('#Exch_rate_furnace').numberbox('getValue');
                var fw2 =$('#Finish_weight2').numberbox('getValue');
                if (curfur == 'USD')
                {
                    var furc = eval(fw2) *eval(prcfur) * eval(excfur)/1000;
                }
                else
                {
                    var furc = eval(fw2) * eval(prcfur)/1000 ;
                }
                $('#Furnace_cost').numberbox('setValue',furc);
                
                $('#Exch_rate_furnace2').numberbox('setValue',exc);
                var curfur2 = $('#Currency_furnace2').textbox('getValue');
                var prcfur2 = $('#Price_furnace2').numberbox('getValue');
                var excfur2 = $('#Exch_rate_furnace2').numberbox('getValue');
                                
                if (curfur2 == 'USD')
                {
                    var fur2c =  eval(prcfur2) * eval(excfur2);
                }
                else
                {
                    var fur2c =  eval(prcfur2) ;
                }
                $('#Furnace2_cost').numberbox('setValue',fur2c);
                
                $('#Exch_rate_plating').numberbox('setValue',exc);
                var curpla = $('#Currency_plating').textbox('getValue');
                var prcpla = $('#Price_plating').numberbox('getValue');
                var excpla = $('#Exch_rate_plating').numberbox('getValue');
                var fw3 =$('#Finish_weight3').numberbox('getValue');
                if (curpla == 'USD')
                {
                    var plac = eval(fw3) *eval(prcpla) * eval(excpla)/1000;
                }
                else
                {
                    var plac = eval(fw3) * eval(prcpla)/1000 ;
                }
                $('#Plating_cost').numberbox('setValue',plac);
                 
            $('#Exch_rate_coating').numberbox('setValue',exc);
                var curcoat = $('#Currency_coating').textbox('getValue');
                var prccoat = $('#Price_coating').numberbox('getValue');
                var exccoat = $('#Exch_rate_coating').numberbox('getValue');
                if (curcoat == 'USD')
                {
                    var coatc = eval(prccoat) * eval(exccoat);
                }
                else
                {
                    var coatc =  eval(prccoat) ;
                }
                $('#Coating_cost').numberbox('setValue',coatc);
                
                var hcurr = $('#Heading_currency').textbox('getValue');
                var htc2 =  $('#Heading_tool_cost').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                
                if(hcurr == "IDR")
                {
                $('#Heading_tool_cost2').numberbox('setValue', htc2 );
                }
                else {
                $('#Heading_tool_cost2').numberbox('setValue', htc2*exc);
                }
            }           
        });
        
        $('#Net_weight').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#Gross_weight').next().find('input').focus();
                 var fw = $('#Net_weight').numberbox('getValue');
                      $('#Finish_weight').numberbox('setValue', fw);
            }           
        });
        
        $('#Gross_weight').numberbox('textbox').keyup(function(e) {
            if (e.keyCode == 13) {
                var nw = $('#Net_weight').numberbox('getValue');
                var sc = $('#Scrap').numberbox('getValue');
                var pctsc = eval(sc) / 100;
                var gw = (1 + eval(pctsc)) * eval(nw);
                $('#Gross_weight').numberbox('setValue', gw);

                var cur = $('#Currency').textbox('getValue');
                var prc = $('#Price').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                if (cur == 'USD')
                {
                    var mc = eval(gw) * eval(prc) * eval(exc) / 1000;
                }
                else
                {
                    var mc = eval(gw) * eval(prc) / 1000;
                }
                $('#Material_cost').numberbox('setValue', mc);
                $('#Material_cost_summary').numberbox('setValue', mc);
            }
        });

        var fw = $('#Finish_weight').numberbox('getValue');
                      $('#Finish_weight2').numberbox('setValue', fw);
                      $('#Finish_weight3').numberbox('setValue', fw);
                      $('#Finish_weight4').numberbox('setValue', fw);
                      $('#Finish_weight5').numberbox('setValue', fw);
        $('#Finish_weight').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight').numberbox('getValue');
                      $('#Finish_weight2').numberbox('setValue', fw);
                      $('#Finish_weight3').numberbox('setValue', fw);
                      $('#Finish_weight4').numberbox('setValue', fw);
                      gaji_FQ();
                      gaji_packing();
                      $('#Finish_weight5').numberbox('setValue', fw);
                      biaya_listrik();
                      biaya_factory();                    
                }
        });
                      
        $('#Pressing_depr_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hdc = $('#Heading_depr_cost').numberbox('getValue');
                var rdc2 = $('#Rolling_depr_cost2').numberbox('getValue');
                var cdc = $('#Cutting_depr_cost').numberbox('getValue');
                var sdc = $('#Slotting_depr_cost').numberbox('getValue');
                var tdc = $('#Trimming_depr_cost').numberbox('getValue');
                var stdc = $('#Straightening_depr_cost').numberbox('getValue');
                var pdc = $('#Pressing_depr_cost').numberbox('getValue');
                var dcs = ((eval(hdc) + eval(rdc2) + eval(cdc)) + eval(sdc) + eval(tdc) + eval(stdc)+ eval(pdc));
                $('#Depreciation_cost_summary').numberbox('setValue', dcs);
            }
        });    
        
        var gmh = $('#Gol_mchn_head').textbox('getValue');
                $('#Gol_mchn_head2').textbox('setValue', gmh);    
               
       $('#Type_screw').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gol_mchn = $('#Gol_mchn_head2').textbox('getValue');
                if (gol_mchn == "Heading 1 die")
                {
                var cat = $('#Type_screw').textbox('getValue');
                var dia = $('#Dia_nominal9').numberbox('getValue');
                var length = $('#Length_nominal2').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getCategory'); ?>',
                        {typescr: cat, gol_mchn: gol_mchn, dia: dia, length: length}, function(result) {
                    $('#Category').textbox('setValue', result.Category1);
                    $('#Heading_tool_cost').numberbox('setValue', result.htc);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                else if(gol_mchn == "Heading 2 dies")
                {
                var item = $('#Type_screw').textbox('getValue');
                var dianom2 = $('#Dia_nominal9').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getHeading2'); ?>',
                        {typescrhead2: item, dianom2: dianom2}, function(result) {
                    $('#Heading_tool_cost').numberbox('setValue', result.htc2);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                else(gol_mchn == "Heading 4 dies")
                {
                var item4 = $('#Type_screw').textbox('getValue');
                var dianom4 = $('#Dia_nominal9').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getHeading4'); ?>',
                        {typescrhead4: item4, dianom4: dianom4}, function(result) {
                    $('#Heading_tool_cost').numberbox('setValue', result.htc4);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                
                var hcurr = $('#Heading_currency').textbox('getValue');
                var htc2 =  $('#Heading_tool_cost').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                
                if(hcurr == "IDR")
                {
                $('#Heading_tool_cost2').numberbox('setValue', htc2 );
                }
                else {
                $('#Heading_tool_cost2').numberbox('setValue', htc2*exc);
                }
            }
        });                
      
       var gmr = $('#Gol_mchn_roll').textbox('getValue');
                $('#Gol_mchn_roll2').textbox('setValue', gmr); 
        
       $('#Type_screw2').textbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var cat2 = $('#Type_screw2').textbox('getValue');
                var dia2 = $('#Dia_nominal10').numberbox('getValue');
                var length2 = $('#Length_nominal3').numberbox('getValue');
                var freq = $('#Freq_mchnroll').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getCategory2'); ?>',
                        {typescr2: cat2, dia2: dia2, length2: length2}, function(result) {
                    $('#Category2').textbox('setValue', result.Category2)
                    $('#Rolling_tool_cost').numberbox('setValue', (result.rtc)*freq);
                }, 'json');
                $('#Rolling_tool_cost').next().focus();
            }
        });
        
        
        $('#Trimming_tool_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var htc2 = $('#Heading_tool_cost2').numberbox('getValue');
                var rtc = $('#Rolling_tool_cost').numberbox('getValue');
                var ctc = $('#Cutting_tool_cost').numberbox('getValue');
                var stc = $('#Slotting_tool_cost').numberbox('getValue');
                var ttc = $('#Trimming_tool_cost').numberbox('getValue');
                var tcs = ((eval(htc2) + eval(rtc) + eval(ctc)) + eval(stc) + eval(ttc));
                $('#Tooling_cost_summary').numberbox('setValue', tcs);
            }
        });
        
        var kmh = $('#Kode_mchnhead').textbox('getValue');
                $('#Heading_machine').textbox('setValue', kmh);
                       
        $.post('<?php echo site_url('transaksi/calculation/getDataHeading'); ?>',
                        {kode_mesin: kmh}, function(result) {
                    $('#Dandori_time').numberbox('setValue', result.Dandori);
                    $('#Cycle_time').numberbox('setValue', result.ct);
                    $('#Working_time').numberbox('setValue', result.wt);
                    $('#Working_time_sec').numberbox('setValue', result.wtsh);
         }, 'json');
       
        $('#Quantity2').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsh = $('#Gaji_per_sec').numberbox('getValue');
                var ct = $('#Cycle_time').numberbox('getValue');
                var dt = $('#Dandori_time').numberbox('getValue');
                var qpm = $('#Quantity2').numberbox('getValue');
                var lch = ((eval(ct) * eval(qpm) + eval(dt)) * eval(gps) / eval(qpm));
                $('#Labor_cost_heading').numberbox('setValue', lch);
            }
        });
        
        var kmr = $('#Kode_mchnroll').textbox('getValue');
                $('#Rolling_machine').textbox('setValue', kmr);
                       
        $.post('<?php echo site_url('transaksi/calculation/getDataRolling'); ?>',
                        {kode_mesin2: kmr}, function(result) {
                    $('#Dandori_time2').numberbox('setValue', result.Dandori2);
                    $('#Cycle_time2').numberbox('setValue', result.ct2);
                    $('#Working_time2').numberbox('setValue', result.wt2);
                    $('#Working_time_sec2').numberbox('setValue', result.wtsr);
         }, 'json');
         
        $('#Quantity3').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsr = $('#Gaji_per_sec2').numberbox('getValue');
                var ctr = $('#Cycle_time2').numberbox('getValue');
                var dtr = $('#Dandori_time2').numberbox('getValue');
                var qpmr = $('#Quantity3').numberbox('getValue');
                var lcr = ((eval(ctr) * eval(qpmr) + eval(dtr)) * eval(gpsr) / eval(qpmr));
                var freq = $('#Freq_mchnroll').numberbox('getValue');
                $('#Labor_cost_rolling').numberbox('setValue', lcr * freq);
            }
        });
        
        var kmc = $('#Kode_mchncutt').textbox('getValue');
                $('#Cutting_machine').textbox('setValue', kmc);
                       
        $.post('<?php echo site_url('transaksi/calculation/getDataCutting'); ?>',
                        {kode_mesin3: kmc}, function(result) {
                    $('#Dandori_time3').numberbox('setValue', result.Dandori3);
                    $('#Cycle_time3').numberbox('setValue', result.ct3);
                    $('#Working_time3').numberbox('setValue', result.wt3);
                    $('#Working_time_sec3').numberbox('setValue', result.wtsc);
         }, 'json');
        $('#Quantity4').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpsc = $('#Gaji_per_sec3').numberbox('getValue');
                var ctc = $('#Cycle_time3').numberbox('getValue');
                var dtc = $('#Dandori_time3').numberbox('getValue');
                var qpmc = $('#Quantity4').numberbox('getValue');
                var lcc = ((eval(ctc) * eval(qpmc) + eval(dtc)) * eval(gpsc) / eval(qpmc));
                $('#Labor_cost_cutting').numberbox('setValue', lcc);
            }
        });
        
        var kms = $('#Kode_mchnslott').textbox('getValue');
                $('#Slotting_machine').textbox('setValue', kms);
                       
        $.post('<?php echo site_url('transaksi/calculation/getDataSlotting'); ?>',
                        {kode_mesin4: kms}, function(result) {
                    $('#Dandori_time4').numberbox('setValue', result.Dandori4);
                    $('#Cycle_time4').numberbox('setValue', result.ct4);
                    $('#Working_time4').numberbox('setValue', result.wt4);
                    $('#Working_time_sec4').numberbox('setValue', result.wtss);
         }, 'json');
        $('#Quantity5').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpss = $('#Gaji_per_sec4').numberbox('getValue');
                var cts = $('#Cycle_time4').numberbox('getValue');
                var dts = $('#Dandori_time4').numberbox('getValue');
                var qpms = $('#Quantity5').numberbox('getValue');
                var lcs = ((eval(cts) * eval(qpms) + eval(dts)) * eval(gpss) / eval(qpms));
                $('#Labor_cost_slotting').numberbox('setValue', lcs);
            }
        });
        
        var kmt = $('#Kode_mchntrimm').textbox('getValue');
                $('#Trimming_machine').textbox('setValue', kmt);
                       
        $.post('<?php echo site_url('transaksi/calculation/getDataTrimming'); ?>',
                        {kode_mesin5: kmt}, function(result) {
                    $('#Dandori_time5').numberbox('setValue', result.Dandori5);
                    $('#Cycle_time5').numberbox('setValue', result.ct5);
                    $('#Working_time5').numberbox('setValue', result.wt5);
                    $('#Working_time_sec5').numberbox('setValue', result.wtst);
         }, 'json');
        $('#Quantity6').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var gpst = $('#Gaji_per_sec5').numberbox('getValue');
                var ctt = $('#Cycle_time5').numberbox('getValue');
                var dtt = $('#Dandori_time5').numberbox('getValue');
                var qpmt = $('#Quantity6').numberbox('getValue');
                var lct = ((eval(ctt) * eval(qpmt) + eval(dtt)) * eval(gpst) / eval(qpmt));
                $('#Labor_cost_trimming').numberbox('setValue', lct);
            }
        });
        
        
        $('#Jumlah_shot1').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot1').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor1').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses2').next().focus();  
            }
        });
        $('#Jumlah_shot2').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot2').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor2').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses3').next().focus();  
            }
        });
        $('#Jumlah_shot3').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot3').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor3').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses4').next().focus();  
            }
        });
        $('#Jumlah_shot4').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot4').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor4').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');
              $('#Proses5').next().focus();  
            }
        });
        $('#Jumlah_shot5').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var js1 = $('#Jumlah_shot5').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getGajiTurret'); ?>', function(result) {
                $('#Biaya_labor5').numberbox('setValue',result.gaji/(js1* result.estimasi*result.working_day*result.working_hour*60/100));
                }, 'json');  
            }
        });
         $('#Gaji_per_gram_fq').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight4').numberbox('getValue');
                var gpg =$('#Gaji_per_gram_fq').numberbox('getValue'); 
            $('#Labor_cost_fq').numberbox('setValue', eval(gpg)*eval(fw));
            $('#Gaji_per_gram_packing').next().focus();   
            }
        });
        $('#Gaji_per_gram_packing').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight4').numberbox('getValue');
                var gpg =$('#Gaji_per_gram_packing').numberbox('getValue'); 
            $('#Labor_cost_packing').numberbox('setValue', eval(gpg)*eval(fw)); 
            }
        });
        $('#Biaya_per_gram_elc').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight5').numberbox('getValue');
                var bpg =$('#Biaya_per_gram_elc').numberbox('getValue'); 
            $('#Electricity_cost').numberbox('setValue', eval(bpg)*eval(fw));
            $('#Biaya_per_gram_fexp').next().focus();   
            }
        });
        $('#Biaya_per_gram_fexp').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var fw = $('#Finish_weight5').numberbox('getValue');
                var bpg =$('#Biaya_per_gram_fexp').numberbox('getValue'); 
            $('#Factory_cost').numberbox('setValue', eval(bpg)*eval(fw)); 
            }
        });
                
         $('#Coating_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hlc = $('#Labor_cost_heading').numberbox('getValue');
                var rlc =$('#Labor_cost_rolling').numberbox('getValue');
                var clc = $('#Labor_cost_cutting').numberbox('getValue');
                var slc =$('#Labor_cost_slotting').numberbox('getValue');
                var tlc = $('#Labor_cost_trimming').numberbox('getValue');
                var stlc =$('#Labor_cost_straightening').numberbox('getValue');
                var turlc1 = $('#Biaya_labor1').numberbox('getValue');
                var turlc2 =$('#Biaya_labor2').numberbox('getValue');
                var turlc3 = $('#Biaya_labor3').numberbox('getValue');
                var turlc4 =$('#Biaya_labor4').numberbox('getValue');
                var turlc5 = $('#Biaya_labor5').numberbox('getValue');
                var turc2 = $('#Turret2_cost').numberbox('getValue');
                var fqlc = $('#Labor_cost_fq').numberbox('getValue');
                var plc = $('#Labor_cost_packing').numberbox('getValue');
                var bl =$('#Electricity_cost').numberbox('getValue');
                var bf = $('#Factory_cost').numberbox('getValue');
                var fc=$('#Furnace_cost').numberbox('getValue');
                var fc2=$('#Furnace2_cost').numberbox('getValue');
                var pc = $('#Plating_cost').numberbox('getValue');
                var bc=$('#Baking_cost').numberbox('getValue');
                var ccc=$('#Cuci_cost').numberbox('getValue');
                var ac = $('#Assembly_cost').numberbox('getValue');
                var cc=$('#Coating_cost').numberbox('getValue');
                var pcsum=eval(hlc)+ eval(rlc)+ eval(clc)+eval(slc)+eval(tlc)+eval(stlc)+eval(turlc1)+eval(turlc2)+eval(turlc3)+eval(turlc4)+eval(turlc5)+eval(turc2)+eval(fqlc)+eval(plc)+eval(bl)+eval(bf)+eval(fc)+eval(fc2)+eval(pc)+eval(bc)+eval(ccc)+eval(ac)+eval(cc);    
           
            $('#Processing_cost_summary').numberbox('setValue', pcsum); 
            }
        });
        
        var mc = $('#Material_cost').textbox('getValue');
                $('#Material_cost_summary').textbox('setValue', mc); 
        var wtc = $('#Washer_total_cost').textbox('getValue');
                $('#Washer_total_cost_summary').textbox('setValue', wtc);
                
        $('#Profit_rate_summary').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var mcs = $('#Material_cost_summary').numberbox('getValue');
                var wtcs =$('#Washer_total_cost_summary').numberbox('getValue');
                var pcs = $('#Processing_cost_summary').numberbox('getValue');
                var tcs =$('#Tooling_cost_summary').numberbox('getValue');
                var dcsum = $('#Depreciation_cost_summary').numberbox('getValue');
                var prs =$('#Profit_rate_summary').numberbox('getValue');
                var prcs = eval(prs/100)*(eval(mcs)+eval(wtcs)+eval(pcs)+eval(tcs));
                var tcsum =eval(prcs)+eval(mcs)+eval(wtcs)+eval(pcs)+eval(tcs)+eval(dcsum);
                var nw = $('#Net_weight').numberbox('getValue');
                var ppkg = eval(1000/eval(nw))*eval(tcsum);
            $('#Profit_cost_summary').numberbox('setValue', prcs);
            $('#Total_cost_summary').numberbox('setValue', tcsum);
            $('#Price_per_kg').numberbox('setValue', ppkg);
            }
        });   
        }              
        else
        {
            $.messager.alert('Info', 'Data belum dipilih !', 'info');
        }
    }
    function transaksicalculationSave() {
        $('#fm-transaksi_calculation').form('submit', {
            url: url,
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                var result = eval('(' + result + ')');
                if (result.success) {
                    $('#dlg-transaksi_calculation').dialog('close');
                    $('#grid-transaksi_calculation').datagrid('reload');
                    $.messager.show({
                        title: 'Info',
                        msg: 'Input Data Berhasil'
                    });
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: 'Input Data Gagal'
                    });
                }
            }
        });
    }

    function transaksicalculationHapus() {
        var row = $('#grid-transaksi_calculation').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Konfirmasi', 'Anda yakin ingin menghapus calculation ' + row.Name + ' ?', function(r) {
                if (r) {
                    $.post('<?php echo site_url('transaksi/calculation/delete'); ?>', {Id: row.Id}, function(result) {
                        if (result.success) {
                            $('#grid-transaksi_calculation').datagrid('reload');
                            $.messager.show({
                                title: 'Info',
                                msg: 'Hapus Data Berhasil'
                            });
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: 'Hapus Data Gagal'
                            });
                        }
                    }, 'json');
                }
            });
        }
        else
        {
            $.messager.alert('Info', 'Data belum dipilih !', 'info');
        }
    }

    function transaksicalculationSesData()
    {
        $('#dlg-transaksi_calculation_sesdata').dialog({modal: true}).dialog('open').dialog('setTitle', 'Ubah Session Data');
        $('#fm-transaksi_calculation_sesdata').form('clear');
        $.post('<?php echo site_url('transaksi/calculation/getSesData'); ?>', function(result) {
            $('#ScrapSesData').numberbox('setValue', result.Scrap);
            $('#Exch_rateSesData').numberbox('setValue', result.Exch_rate);
            $('#Profit_rateSesData').numberbox('setValue', result.Profit_rate);
        }, 'json');
    }

    function transaksicalculationSesDataSave()
    {
        var ScrapSesData = $('#ScrapSesData').numberbox('getValue');
        var Exch_rateSesData = $('#Exch_rateSesData').numberbox('getValue');
        var Profit_rateSesData = $('#Profit_rateSesData').numberbox('getValue');

        $.post('<?php echo site_url('transaksi/calculation/updateSesData'); ?>', {Scrap: ScrapSesData, Exch_rate: Exch_rateSesData, Profit_rate: Profit_rateSesData}, function(result) {
            if (result.success)
            {
                $('#dlg-transaksi_calculation_sesdata').dialog('close');
                $.messager.show({
                    title: 'Info',
                    msg: 'Ubah Data Berhasil'
                });
            }
            else
            {
                $.messager.show({
                    title: 'Error',
                    msg: 'Ubah Data Gagal'
                });
            }
        }, 'json');
    }

    function diameter()
    {
        var dia = $('#Dia_wire').textbox('getValue');

        $('#Kode_wire').combogrid({
            panelWidth: 300,
            idField: 'wId',
            textField: 'Grade',
            url: '<?php echo site_url('transaksi/calculation/getWireCode'); ?>/' + eval(dia),
            columns: [[
                    {field: 'wId', title: 'Id', width: 50},
                    {field: 'Kode_Supp', title: 'Kode Supplier', width: 75},
                    {field: 'Grade', title: 'Grade', width: 75},
                    {field: 'Type', title: 'Type', width: 75},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_wire').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
               
                $('#Price').numberbox('setValue', r.Price);
                $('#Currency').textbox('setValue', r.Currency);
                $('#Net_weight').next().find('input').focus();
            }
        });
    }
    function diameternom()
    {
        var golm = $('#Gol_mchn_head').textbox('getValue');
        var dnom = $('#Dia_nominal2').numberbox('getValue');
        var gd = golm + '-' + dnom;

        $('#Kode_mchnhead').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchnhead',
            textField: 'Mchn_heading',
            url: '<?php echo site_url('transaksi/calculation/getHeadMchncode'); ?>/' + gd,
            columns: [[
                    {field: 'Kode_mchnhead', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_heading', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchnhead').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row

                $('#Gol_mchn_head2').textbox('setValue', r.Gol_mchn_head);
                $('#Heading_depr_cost').numberbox('setValue', r.Heading_depr_cost);
                $('#Heading_machine').textbox('setValue', r.Mchn_heading);
                $('#Dandori_time').textbox('setValue', r.Dandori_time);
                $('#Cycle_time').textbox('setValue', r.Cycle_time);
                $('#Working_time').textbox('setValue', r.Working_time);
                $('#Working_time_sec').textbox('setValue', r.Working_time_sec);
                gaji_heading();
            }
        });
    }
    function diameternomroll()
    {
        var golm2 = $('#Gol_mchn_roll').textbox('getValue');
        var dnom2 = $('#Dia_nominal3').numberbox('getValue');
        var gd2 = golm2 + '-' + dnom2;

        $('#Kode_mchnroll').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchnroll',
            textField: 'Mchn_rolling',
            url: '<?php echo site_url('transaksi/calculation/getRollMchncode'); ?>/' + gd2,
            columns: [[
                    {field: 'Kode_mchnroll', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_rolling', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchnroll').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row

                $('#Gol_mchn_roll2').textbox('setValue', r.Gol_mchn_roll);
                $('#Rolling_depr_cost').numberbox('setValue', r.Rolling_depr_cost);
                $('#Rolling_machine').textbox('setValue', r.Mchn_rolling);
                $('#Dandori_time2').textbox('setValue', r.Dandori_time);
                $('#Cycle_time2').textbox('setValue', r.Cycle_time);
                $('#Working_time2').textbox('setValue', r.Working_time);
                $('#Working_time_sec2').textbox('setValue', r.Working_time_sec);
                gaji_rolling();
            }
        });
    }
    function diameternomcutt()
    {
        var dnom4 = $('#Dia_nominal4').numberbox('getValue');

        $('#Kode_mchncutt').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchncutt',
            textField: 'Mchn_cutting',
            url: '<?php echo site_url('transaksi/calculation/getCuttMchncode'); ?>/' + dnom4,
            columns: [[
                    {field: 'Kode_mchncutt', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_cutting', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchncutt').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Cutting_depr_cost').numberbox('setValue', r.Cutting_depr_cost);
                $('#Cutting_machine').textbox('setValue', r.Mchn_cutting);
                $('#Dandori_time3').textbox('setValue', r.Dandori_time);
                $('#Cycle_time3').textbox('setValue', r.Cycle_time);
                $('#Working_time3').textbox('setValue', r.Working_time);
                $('#Working_time_sec3').textbox('setValue', r.Working_time_sec);
                gaji_cutting();
            }
        });
    }
    function diameternomslott()
    {
        var dnom5 = $('#Dia_nominal5').numberbox('getValue');

        $('#Kode_mchnslott').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchnslott',
            textField: 'Mchn_slotting',
            url: '<?php echo site_url('transaksi/calculation/getSlottMchncode'); ?>/' + dnom5,
            columns: [[
                    {field: 'Kode_mchnslott', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_slotting', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchnslott').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Slotting_depr_cost').numberbox('setValue', r.Slotting_depr_cost);
                $('#Slotting_machine').textbox('setValue', r.Mchn_slotting);
                $('#Dandori_time4').textbox('setValue', r.Dandori_time);
                $('#Cycle_time4').textbox('setValue', r.Cycle_time);
                $('#Working_time4').textbox('setValue', r.Working_time);
                $('#Working_time_sec4').textbox('setValue', r.Working_time_sec);
                gaji_slotting();
            }
        });
    }
    function diameternomtrimm()
    {
        var dnom6 = $('#Dia_nominal6').numberbox('getValue');

        $('#Kode_mchntrimm').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchntrimm',
            textField: 'Mchn_trimming',
            url: '<?php echo site_url('transaksi/calculation/getTrimmMchncode'); ?>/' + dnom6,
            columns: [[
                    {field: 'Kode_mchntrimm', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_trimming', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchntrimm').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Trimming_depr_cost').numberbox('setValue', r.Trimming_depr_cost);
                $('#Trimming_machine').textbox('setValue', r.Mchn_trimming);
                $('#Dandori_time5').textbox('setValue', r.Dandori_time);
                $('#Cycle_time5').textbox('setValue', r.Cycle_time);
                $('#Working_time5').textbox('setValue', r.Working_time);
                $('#Working_time_sec5').textbox('setValue', r.Working_time_sec);
                gaji_trimming();
            }
        });
    }
    function diameternomstraighten()
    {
        var dnom7 = $('#Dia_nominal7').numberbox('getValue');

        $('#Kode_mchnstraighten').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchnstraighten',
            textField: 'Mchn_straightening',
            url: '<?php echo site_url('transaksi/calculation/getstraightenMchncode'); ?>/' + dnom7,
            columns: [[
                    {field: 'Kode_mchnstraighten', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_straightening', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchnstraighten').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Straightening_depr_cost').numberbox('setValue', r.Straightening_depr_cost);
                $('#Straightening_machine').textbox('setValue', r.Mchn_straightening);
                $('#Dandori_time6').textbox('setValue', r.Dandori_time);
                $('#Cycle_time6').textbox('setValue', r.Cycle_time);
                $('#Working_time6').textbox('setValue', r.Working_time);
                $('#Working_time_sec6').textbox('setValue', r.Working_time_sec);
                gaji_straightening();
            }
        });
    }
    function diameternompress()
    {
        var dnom8 = $('#Dia_nominal8').numberbox('getValue');

        $('#Kode_mchnpress').combogrid({
            panelWidth: 300,
            idField: 'Kode_mchnpress',
            textField: 'Mchn_pressing',
            url: '<?php echo site_url('transaksi/calculation/getPressMchncode'); ?>/' + dnom8,
            columns: [[
                    {field: 'Kode_mchnpress', title: 'Kode Mesin', width: 80},
                    {field: 'Length_range', title: 'Length Range', width: 80},
                    {field: 'Mchn_pressing', title: 'Nama Mesin', width: 80},
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_mchnpress').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Pressing_depr_cost').numberbox('setValue', r.Pressing_depr_cost);
            }
        });
    }

    function cutting_tools()
    {
        var dia3 = $('#Dia_nominal').numberbox('getValue');
        var length3 = $('#Length_nominal').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getCutting'); ?>',
                {dia3: dia3, length3: length3}, function(result) {
            $('#Cutting_tool_cost').numberbox('setValue', result.ctc);
        }, 'json');
    }
    function slotting_tools()
    {
        var dia4 = $('#Dia_nominal').numberbox('getValue');
        var length4 = $('#Length_nominal').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getSlotting'); ?>',
                {dia4: dia4, length4: length4}, function(result) {
            $('#Slotting_tool_cost').numberbox('setValue', result.stc);
        }, 'json');
    }
    function trimming_tools()
    {
        var dia5 = $('#Dia_nominal').numberbox('getValue');
        var length5 = $('#Length_nominal').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getTrimming'); ?>',
                {dia5: dia5, length5: length5}, function(result) {
            $('#Trimming_tool_cost').numberbox('setValue', result.ttc);
        }, 'json');
    }
    function gaji_heading()
    {
        var proses = 'Heading';
        var wtsh = $('#Working_time_sec').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec').numberbox('setValue', (result.gpy) / (wtsh * result.jl));
        }, 'json');
    }
    function gaji_rolling()
    {
        var proses = 'Rolling';
        var wtsr = $('#Working_time_sec2').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec2').numberbox('setValue', (result.gpy) / (wtsr * result.jl));
        }, 'json');
    }
    function gaji_cutting()
    {
        var proses = 'Cutting';
        var wtsc = $('#Working_time_sec3').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec3').numberbox('setValue', (result.gpy) / (wtsc * result.jl));
        }, 'json');
    }
    function gaji_slotting()
    {
        var proses = 'Slotting';
        var wtss = $('#Working_time_sec4').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec4').numberbox('setValue', (result.gpy) / (wtss * result.jl));
        }, 'json');
    }
    function gaji_trimming()
    {
        var proses = 'Trimming';
        var wtst = $('#Working_time_sec5').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec5').numberbox('setValue', (result.gpy) / (wtst * result.jl));
        }, 'json');
    }
    function gaji_straightening()
    {
        var proses = 'Straightening';
        var wtsst = $('#Working_time_sec6').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec6').numberbox('setValue', (result.gpy) / (wtsst*result.jl));
        }, 'json');
       
    }
    function gaji_FQ()
    {
        var proses = 'FQ';
        var fw = $('#Finish_weight4').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_gram_fq').numberbox('setValue', (result.gpy) / (result.hppy * 1000));
        }, 'json');
    }
    function gaji_packing()
    {
        var proses = 'Packing';
        var fw = $('#Finish_weight4').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_gram_packing').numberbox('setValue', (result.gpy) / (result.hppy * 1000));
        }, 'json');
    }
    function biaya_listrik()
    {
        var proses = 'Electricity';
        var fw = $('#Finish_weight5').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getBiaya'); ?>',
                {proses: proses}, function(result) {
            $('#Biaya_per_gram_elc').numberbox('setValue', (result.bpy) / (result.hppy * 1000));
        }, 'json');
    }
    function biaya_factory()
    {
        var proses = 'Factory Exp';
        var fw = $('#Finish_weight5').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getBiaya'); ?>',
                {proses: proses}, function(result) {
            $('#Biaya_per_gram_fexp').numberbox('setValue', (result.bpy) / (result.hppy * 1000));
        }, 'json');
    }
    function furnace_cost()
    {      
        var fw = $('#Finish_weight2').numberbox('getValue');
        var prc = $('#Price_furnace').numberbox('getValue');
        var cur = $('#Currency_furnace').textbox('getValue');
        var exr = $('#Exch_rate_furnace').numberbox('getValue');
        if( cur == 'USD'){
            $('#Furnace_cost').numberbox('setValue', (eval(fw)*eval(prc)*eval(exr)/1000));
        }
        else {
            $('#Furnace_cost').numberbox('setValue', (eval(fw)*eval(prc))/1000);
        }   
    }
    function plating_cost()
    {
        
        var fw = $('#Finish_weight3').numberbox('getValue');
        var prc = $('#Price_plating').numberbox('getValue');
        var cur = $('#Currency_plating').textbox('getValue');
        var exr = $('#Exch_rate_plating').numberbox('getValue');
        if( cur == 'USD'){
            $('#Plating_cost').numberbox('setValue', (eval(fw)*eval(prc)*eval(exr)/1000));
        }
        else {
            $('#Plating_cost').numberbox('setValue', (eval(fw)*eval(prc))/1000);
        }
        
    }
    function baking_cost()
    {
        var proses = 'Baking';
        var fw = $('#Finish_weight3').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getBaking'); ?>',
                {proses: proses}, function(result) {
            $('#Baking_cost').numberbox('setValue', (fw*result.Price) / 1000);
        }, 'json');    
    }
     function cuci_cost()
    {
        var proses = 'Cuci';
        var fw = $('#Finish_weight3').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getCuci'); ?>',
                {proses: proses}, function(result) {
            $('#Cuci_cost').numberbox('setValue', (fw*result.Price) / 1000);
        }, 'json');    
    }
    function kode_assembly()
    {
        $('#Kode_assembly').combogrid({
            panelWidth: 200,
            idField: 'Id',
            textField: 'Name',
            url: '<?php echo site_url('transaksi/calculation/getKode_assembly'); ?>/',
            columns: [[
                    {field: 'Id', title: 'Kode Assembly', width: 100},
                    {field: 'Name', title: 'Proses Assembly', width: 100}
                ]],
            onSelect: function(rowIndex, rowData) {
                var g = $('#Kode_assembly').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                $('#Assembly_cost').numberbox('setValue', r.Price);
            }       
        });
    }
    function coating_cost()
    {
        
        var prc = $('#Price_coating').numberbox('getValue');
        var cur = $('#Currency_coating').textbox('getValue');
        var exr = $('#Exch_rate_coating').numberbox('getValue');
        if( cur == 'USD'){
            $('#Coating_cost').numberbox('setValue', (eval(prc)*eval(exr)));
        }
        else {
            $('#Coating_cost').numberbox('setValue', (eval(prc)));
        }   
    }
     function furnace2_cost()
    {
        
        var prc = $('#Price_furnace2').numberbox('getValue');
        var cur = $('#Currency_furnace2').textbox('getValue');
        var exr = $('#Exch_rate_furnace2').numberbox('getValue');
        if( cur == 'USD'){
            $('#Furnace2_cost').numberbox('setValue', (eval(prc)*eval(exr)));
        }
        else {
            $('#Furnace2_cost').numberbox('setValue', (eval(prc)));
        }   
    }
    function turret2_cost()
    {
        
        var prc = $('#Price_turret2').numberbox('getValue');
        var cur = $('#Currency_turret2').textbox('getValue');
        var exr = $('#Exch_rate_turret2').numberbox('getValue');
        if( cur == 'USD'){
            $('#Turret2_cost').numberbox('setValue', (eval(prc)*eval(exr)));
        }
        else {
            $('#Turret2_cost').numberbox('setValue', (eval(prc)));
        }   
    }
</script>

<style type="text/css">
    .fitem{
        margin-bottom:5px;
    }
    .fitem label{
        display:inline-block;
        width:100px;
    }
    .fitem input{
        display:inline-block;
        width:150px;
    }
</style>

<!-- ----------- -->
<div id="dlg-transaksi_calculation" class="easyui-dialog" style="width:600px; height:550px;" closed="true" buttons="#dlg-buttons-transaksi_calculation">
    <form id="fm-transaksi_calculation" method="post" novalidate>        
        <div class="easyui-tabs" style="width:545px;height:510px">
            <div title="About" style="padding:10px">
                <div class="fitem">
                    <label for="type">Tanggal</label>
                    <input id="Tanggal" name="Tanggal" class="easyui-datebox"  required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Customer</label>
                    <input id="Customer" name="Customer" class="easyui-combobox"  data-options="
                           url:'<?php echo site_url('transaksi/calculation/getCustomer'); ?>',
                           method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
                </div>
                <div class="fitem">
                    <label for="type">Customer Code</label>
                    <input type="text" id="Customer_code" name="Customer_code" class="easyui-textbox" style="width:300px;" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Saga Code</label>
                    <input type="text" id="Saga_code" name="Saga_code" class="easyui-textbox" style="width:300px;" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Type Screw</label>
                    <input type="text" id="Type_screwOri" name="Type_screwOri" class="easyui-textbox" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Dia. Nominal</label>
                    <input type="text" id="Dia_nominal" name="Dia_nominal" class="easyui-numberbox" required="true"/>
                </div>   
                <div class="fitem">
                    <label for="type">Length  Nominal</label>
                    <input type="text" id="Length_nominal" name="Length_nominal" class="easyui-numberbox" required="true"/>
                </div>   
                <div class="fitem">
                    <label for="type">Quantity</label>
                    <input type="text" id="Quantity" name="Quantity" class="easyui-numberbox" required="true"/>
                </div>   
            </div>

            <div title="Material" style="padding:10px">
                <div class="fitem">
                    <label for="type">Diameter Wire</label>
                    <input type="text" id="Dia_wire" name="Dia_wire" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" required="true"/>
                    <a id="bta" href="javascript:diameter()" class="easyui-linkbutton" iconCls="icon-reload" plain="true" 
                       onclick=""></a>
                </div>                                
                <div class="fitem">
                    <label for="type">Kode Wire</label>
                    <input id="Kode_wire" name="Kode_wire" class="easyui-combogrid" required="true"/>                    
                </div>
                <div class="fitem">
                    <label for="type">Net Weight</label>
                    <input type="text" id="Net_weight" name="Net_weight" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Scrap</label>
                    <input type="text" id="Scrap" name="Scrap" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly:true "/>
                </div>
                <div class="fitem">
                    <label for="type">Gross Weight</label>
                    <input type="text" id="Gross_weight" name="Gross_weight" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Price</label>
                    <input type="text" id="Price" name="Price" class="easyui-numberbox" data-options="precision:3, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Currency</label>
                    <input type="text" id="Currency" name="Currency" class="easyui-textbox" data-options="readonly: true"/>
                </div> 
                <div class="fitem">
                    <label for="type">Exchange Rate</label>
                    <input type="text" id="Exch_rate" name="Exch_rate" class="easyui-numberbox"/>
                </div>                
                <div class="fitem">
                    <label for="type">Material Cost</label>
                    <input type="text" id="Material_cost" name="Material_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                </div>
            </div>


            <div title="Purchased" style="padding:10px">
                <div class="fitem">
                    <label for="type">Washer1</label>
                    <input id="Washer1" name="Washer1" class="easyui-combobox"  data-options="
                           url:'<?php echo site_url('transaksi/calculation/getWasher1'); ?>',
                           method:'get', valueField:'Id', textField:'Name', panelHeight:200,
                           onSelect: function(r){
                           $('#Washer1_weight').numberbox('setValue', r.Weight);
                           $('#Washer1_currency').textbox('setValue', r.Currency);
                           $('#Washer1_price').numberbox('setValue', r.Price);

                           var nw1 = $('#Net_weight').numberbox('getValue');
                           var ww2 = $('#Washer2_weight').numberbox('getValue');
                           var fw1 = eval(nw1) + eval(ww2) + eval(r.Weight);
                           $('#Finish_weight').numberbox('setValue', fw1);

                           var exc1 = $('#Exch_rate').numberbox('getValue');
                           if (r.Currency == 'USD')
                           {
                           var wc1 = eval(exc1) * eval(r.Price);
                           }
                           else
                           {
                           var wc1 = eval(r.Price);
                           }
                           $('#Washer1_cost').numberbox('setValue', wc1);
                           var wc2 = $('#Washer2_cost').numberbox('getValue');
                           var wtc = eval(wc1) + eval(wc2);
                           $('#Washer_total_cost').numberbox('setValue', wtc);
                           $('#Washer_total_cost_summary').numberbox('setValue', wtc);
                           }" style="width:300px;"/>    
                </div>
                <div class="fitem">
                    <label for="type">Washer1 Weight</label>
                    <input id="Washer1_weight" name="Washer1_weight" class="easyui-numberbox" data-options="precision:2, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Washer1 Curr. </label>
                    <input id="Washer1_currency" name="Washer1_currency" class="easyui-textbox" data-options="readonly: true"/>
                </div> 
                <div class="fitem">
                    <label for="type">Washer1 Price</label>
                    <input id="Washer1_price" name="Washer1_price" class="easyui-numberbox" data-options="precision:5, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Washer1 Cost</label>
                    <input id="Washer1_cost" name="Washer1_cost" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Washer2</label>
                    <input id="Washer2" name="Washer2" class="easyui-combobox"  data-options="
                           url:'<?php echo site_url('transaksi/calculation/getWasher2'); ?>',
                           method:'get', valueField:'Id', textField:'Name', panelHeight:200,
                           onSelect: function(r){
                           $('#Washer2_weight').numberbox('setValue', r.Weight);
                           $('#Washer2_currency').textbox('setValue', r.Currency);
                           $('#Washer2_price').numberbox('setValue', r.Price);

                           var nw1 = $('#Net_weight').numberbox('getValue');
                           var ww1 = $('#Washer1_weight').numberbox('getValue');
                           var fw2 = eval(nw1) + eval(ww1) + eval(r.Weight);
                           $('#Finish_weight').numberbox('setValue', fw2);

                           var exc2 = $('#Exch_rate').numberbox('getValue');
                           if (r.Currency == 'USD')
                           {
                           var wc2 = eval(exc2) * eval(r.Price);
                           }
                           else
                           {
                           var wc2 = eval(r.Price);
                           }
                           $('#Washer2_cost').numberbox('setValue', wc2);
                           var wc1 = $('#Washer1_cost').numberbox('getValue');
                           var wtc = eval(wc1) + eval(wc2);
                           $('#Washer_total_cost').numberbox('setValue', wtc);
                           $('#Washer_total_cost_summary').numberbox('setValue', wtc);
                           }" style="width:300px;"/> 
                </div>
                <div class="fitem">
                    <label for="type">Washer2 Weight</label>
                    <input id="Washer2_weight" name="Washer2_weight" class="easyui-numberbox" data-options="precision:2, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Washer2 Curr. </label>
                    <input id="Washer2_currency" name="Washer2_currency" class="easyui-textbox" data-options="readonly: true"/>
                </div> 
                <div class="fitem">
                    <label for="type">Washer2 Price</label>
                    <input id="Washer2_price" name="Washer2_price" class="easyui-numberbox" data-options="precision:5, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Washer2 Cost</label>
                    <input id="Washer2_cost" name="Washer2_cost" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Finish Weight</label>
                    <input id="Finish_weight" name="Finish_weight" class="easyui-numberbox" data-options="precision:2, groupSeparator:'.', decimalSeparator:','"/>
                </div>  
                <div class="fitem">
                    <label for="type">Washer Cost Total</label>
                    <input id="Washer_total_cost" name="Washer_total_cost" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>  
            </div>

            <div title="Depr. Cost" style="padding:10px">
                <div class="easyui-tabs" data-options="fit:true,plain:true">
                    <div title="Heading" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Golongan Mesin</label>
                            <input id="Gol_mchn_head" name="Gol_mchn_head" class="easyui-combobox" data-options=" 
                                   url:'<?php echo site_url('transaksi/calculation/enumGolmesinhead'); ?>',
                                   method:'get', valueField:'data', textField:'data', panelHeight:'auto', 
                                   onSelect: function(z1){
                                   diameternom();                               
                                   $('#Kode_mchnhead').next().find('input').focus();  
                                   }" style="width:160px;"/>  
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal2" name="Dia_nominal2" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Heading</label>
                            <input id="Kode_mchnhead" name="Kode_mchnhead"  class="easyui-combogrid" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Heading Depr. Cost</label>
                            <input type="text" id="Heading_depr_cost" name="Heading_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>  

                    <div title="Rolling" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Golongan Mesin</label>
                            <input id="Gol_mchn_roll" name="Gol_mchn_roll" class="easyui-combobox" data-options=" 
                                   url:'<?php echo site_url('transaksi/calculation/enumGolmesinroll'); ?>',
                                   method:'get', valueField:'data', textField:'data', panelHeight:'auto', 
                                   onSelect: function(z2){
                                   diameternomroll();
                                   $('#Kode_mchnroll').next().find('input').focus();  
                                   }" style="width:160px;"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal3" name="Dia_nominal3" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Rolling</label>
                            <input id="Kode_mchnroll" name="Kode_mchnroll" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Rolling Depr. Cost</label>
                            <input type="text" id="Rolling_depr_cost" name="Rolling_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Frequency</label>
                            <select id="Freq_mchnroll" class="easyui-combobox" name="Freq_mchnroll" data-options ="
                                 panelHeight:'50',
                                    onSelect: function(z12){
                                    var rdc = $('#Rolling_depr_cost').numberbox('getValue');
                                    var freq = $('#Freq_mchnroll').numberbox('getValue');
                                    $('#Rolling_depr_cost2').numberbox('setValue', rdc*freq);
                                    }" >   
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Rolling Depr. Cost 2</label>
                            <input type="text" id="Rolling_depr_cost2" name="Rolling_depr_cost2" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Cutting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Menggunakan Proses Cutting?</label>
                            <select id="Mchn_cutting" class="easyui-combobox" name="Mchn_cutting" style="width:50px;"  data-options="
                                    panelHeight:'50',
                                    onSelect: function(z4){
                                    if (z4.value == '1') {
                                    $('#Kode_mchncutt').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchncutt').next().find('input').focus();
                                    diameternomcutt();
                                    cutting_tools();
                                    }
                                    else {
                                    $('#Kode_mchncutt').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Cutting_depr_cost').numberbox('clear');
                                    $('#Cutting_tool_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal4" name="Dia_nominal4" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Cutting</label>
                            <input id="Kode_mchncutt" name="Kode_mchncutt" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cutting Depr. Cost</label>
                            <input type="text" id="Cutting_depr_cost" name="Cutting_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>

                    <div title="Slotting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Menggunakan Proses Slotting?</label>
                            <select id="Mchn_slotting" class="easyui-combobox" name="Mchn_slotting" style="width:50px;"  data-options="
                                    panelHeight:'50',
                                    onSelect: function(z5){
                                    if (z5.value == '1') {
                                    $('#Kode_mchnslott').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchnslott').next().find('input').focus();
                                    diameternomslott();
                                    slotting_tools();
                                    }
                                    else {
                                    $('#Kode_mchnslott').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Slotting_depr_cost').numberbox('clear');
                                    $('#Slotting_tool_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal5" name="Dia_nominal5" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Slotting</label>
                            <input id="Kode_mchnslott" name="Kode_mchnslott" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Slotting Depr. Cost</label>
                            <input type="text" id="Slotting_depr_cost" name="Slotting_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Trimming" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Menggunakan Proses Trimming?</label>
                            <select id="Mchn_trimming" class="easyui-combobox" name="Mchn_trimming" style="width:50px;"  data-options="
                                    panelHeight:'50',
                                    onSelect: function(z6){
                                    if (z6.value == '1') {
                                    $('#Kode_mchntrimm').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchntrimm').next().find('input').focus();
                                    diameternomtrimm();
                                    trimming_tools();
                                    }
                                    else {
                                    $('#Kode_mchntrimm').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Trimming_depr_cost').numberbox('clear');
                                    $('#Trimming_tool_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal6" name="Dia_nominal6" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Trimming</label>
                            <input id="Kode_mchntrimm" name="Kode_mchntrimm" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Trimming Depr. Cost</label>
                            <input type="text" id="Trimming_depr_cost" name="Trimming_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div> 
                    <div title="Straightening" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Menggunakan Proses Straightening?</label>
                            <select id="Mchn_straightening" class="easyui-combobox" name="Mchn_straightening" style="width:50px;"  data-options="
                                    panelHeight:'50',
                                    onSelect: function(z7){
                                    if (z7.value == '1') {
                                    $('#Kode_mchnstraighten').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchnstraighten').next().find('input').focus();
                                    diameternomstraighten();
                                    $.post('<?php echo site_url('transaksi/calculation/getGajiStraightening'); ?>', function(result) {
                                    $('#Labor_cost_straightening').numberbox('setValue',result.gaji/(result.estimasi*result.working_day*result.working_hour*60/100));
                                    }, 'json'); 
                                    }
                                    else {
                                    $('#Kode_mchnstraighten').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Straightening_depr_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal7" name="Dia_nominal7" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Straightening</label>
                            <input id="Kode_mchnstraighten" name="Kode_mchnstraighten" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Straightening Depr. Cost</label>
                            <input type="text" id="Straightening_depr_cost" name="Straightening_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Pressing" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Menggunakan Proses Pressing?</label>
                            <select id="Mchn_pressing" name="Mchn_pressing" class="easyui-combobox" style="width:50px;" data-options="
                                    panelHeight:'50',
                                    onSelect: function(z8){
                                    if (z8.value == '1') {
                                    $('#Kode_mchnpress').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchnpress').next().find('input').focus();
                                    diameternompress();   }
                                    else {
                                    $('#Kode_mchnpress').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Pressing_depr_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Dia. Nominal</label>
                            <input type="text" id="Dia_nominal8" name="Dia_nominal8" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Mchn Pressing</label>
                            <input id="Kode_mchnpress" name="Kode_mchnpress" class="easyui-combogrid" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Pressing Depr. Cost</label>
                            <input type="text" id="Pressing_depr_cost" name="Pressing_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','"/>
                        </div>
                    </div>
                </div>
            </div>

            <div title="Tooling Cost" style="padding:10px">
                <div class="easyui-tabs" data-options="fit:true,plain:true">
                    <div title="Heading" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Golongan Mesin</label>
                            <input id="Gol_mchn_head2" name="Gol_mchn_head2" class="easyui-textbox" readonly="true" />  
                        </div>
                        <div class="fitem">
                            <label for="type">Type Screw</label>
                            <input type="text" id="Type_screw" name="Type_screw" class="easyui-textbox"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Category Screw</label>
                            <input type="text" id="Category" name="Category" class="easyui-textbox" style="width:350px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Diameter Nominal</label>
                            <input id="Dia_nominal9" name="Dia_nominal9"  class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Length Nominal</label>
                            <input id="Length_nominal2" name="Length_nominal2" class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Heading Tool Cost</label>
                            <input type="text" id="Heading_tool_cost" name="Heading_tool_cost" class="easyui-numberbox" data-options="precision:6,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                         <div class="fitem">
                            <label for="type">Currency</label>
                            <input id="Heading_currency" name="Heading_currency" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Heading Tool Cost IDR</label>
                            <input type="text" id="Heading_tool_cost2" name="Heading_tool_cost2" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Rolling" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Golongan Mesin</label>
                            <input id="Gol_mchn_roll2" name="Gol_mchn_roll2" class="easyui-textbox" readonly="true" />  
                        </div>
                        <div class="fitem">
                            <label for="type">Type Screw</label>
                            <input type="text" id="Type_screw2" name="Type_screw2" class="easyui-textbox"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Category Screw</label>
                            <input type="text" id="Category2" name="Category2" class="easyui-textbox" style="width:300px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Diameter Nominal</label>
                            <input id="Dia_nominal10" name="Dia_nominal10"  class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Length Nominal</label>
                            <input id="Length_nominal3" name="Length_nominal3"  class="easyui-numberbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Rolling Tool Cost</label>
                            <input type="text" id="Rolling_tool_cost" name="Rolling_tool_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Cutting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Diameter Nominal</label>
                            <input id="Dia_nominal11" name="Dia_nominal11" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Length Nominal</label>
                            <input id="Length_nominal4" name="Length_nominal4" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cutting Tool Cost</label>
                            <input type="text" id="Cutting_tool_cost" name="Cutting_tool_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Slotting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Diameter Nominal</label>
                            <input id="Dia_nominal12" name="Dia_nominal12"  class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Length Nominal</label>
                            <input id="Length_nominal5" name="Length_nominal5"  class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Slotting Tool Cost</label>
                            <input type="text" id="Slotting_tool_cost" name="Slotting_tool_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                    </div>
                    <div title="Trimming" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Diameter Nominal</label>
                            <input id="Dia_nominal13" name="Dia_nominal13" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Length Nominal</label>
                            <input id="Length_nominal6" name="Length_nominal6" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Trimming Tool Cost</label>
                            <input type="text" id="Trimming_tool_cost" name="Trimming_tool_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','"/>
                        </div>
                    </div>
                </div>
            </div>

            <div title="Process Cost" style="padding:10px">
                <div class="easyui-tabs" data-options="fit:true,plain:true">
                    <div title="Heading" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Heading Machine</label>
                            <input id="Heading_machine" name="Heading_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time" name="Dandori_time" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time" name="Cycle_time" class="easyui-numberbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time" name="Working_time" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec" name="Working_time_sec" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec" name="Gaji_per_sec" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity2" name="Quantity2" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_heading" name="Labor_cost_heading" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                    </div>

                    <div title="Rolling" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Rolling Machine</label>
                            <input id="Rolling_machine" name="Rolling_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time2" name="Dandori_time2" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time2" name="Cycle_time2" class="easyui-numberbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time2" name="Working_time2" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec2" name="Working_time_sec2" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec2" name="Gaji_per_sec2" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity3" name="Quantity3" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_rolling" name="Labor_cost_rolling" class="easyui-numberbox" values ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>   
                    </div>
                    <div title="Cutting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Cutting Machine</label>
                            <input id="Cutting_machine" name="Cutting_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time3" name="Dandori_time3" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time3" name="Cycle_time3" class="easyui-numberbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time3" name="Working_time3" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec3" name="Working_time_sec3" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec3" name="Gaji_per_sec3" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity4" name="Quantity4" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_cutting" name="Labor_cost_cutting" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>     
                    </div>
                    <div title="Slotting" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Slotting Machine</label>
                            <input id="Slotting_machine" name="Slotting_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time4" name="Dandori_time4" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time4" name="Cycle_time4" class="easyui-numberbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time4" name="Working_time4" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec4" name="Working_time_sec4" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec4" name="Gaji_per_sec4" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity5" name="Quantity5" class="easyui-numberbox" data-options="precision:0" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_slotting" name="Labor_cost_slotting" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>     
                    </div>
                    <div title="Trimming" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Trimming Machine</label>
                            <input id="Trimming_machine" name="Trimming_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time5" name="Dandori_time5" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time5" name="Cycle_time5" class="easyui-numberbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time5" name="Working_time5" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec5" name="Working_time_sec5" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec5" name="Gaji_per_sec5" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity6" name="Quantity6" class="easyui-numberbox" data-options="precision:0" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_trimming" name="Labor_cost_trimming" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>     
                    </div>
                    <div title="Straightening" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_straightening" name="Labor_cost_straightening" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>     
                    </div>
                    <div title="Turret/Auto/Bor" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Proses 1</label>
                            <select id="Proses1" class="easyui-combobox" name="Proses1" style="width:160px;">
                                <option>Turret  </option>
                                <option>Turret 1</option>
                                <option>Turret 2</option>
                                <option>Turret 3</option>
                                <option>Bor</option>
                                <option>Champer</option>
                                <option>Welding</option>
                                <option>Autolathe</option>
                                <option> </option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Jumlah Shot/menit</label>
                            <input id="Jumlah_shot1" name="Jumlah_shot1" class="easyui-numberbox" style="width:160px"/>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya Labor</label>
                            <input id="Biaya_labor1" name="Biaya_labor1" class="easyui-numberbox"  style="width:160px" value ="0" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Proses 2</label>
                            <select id="Proses2" class="easyui-combobox" name="Proses2" style="width:160px;">
                                <option>Turret  </option>
                                <option>Turret 1</option>
                                <option>Turret 2</option>
                                <option>Turret 3</option>
                                <option>Bor</option>
                                <option>Champer</option>
                                <option>Welding</option>
                                <option>Autolathe</option>
                                <option> </option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Jumlah Shot/menit</label>
                            <input id="Jumlah_shot2" name="Jumlah_shot2" class="easyui-numberbox" style="width:160px"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya Labor</label>
                            <input id="Biaya_labor2" name="Biaya_labor2" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Proses 3</label>
                            <select id="Proses3" class="easyui-combobox" name="Proses3" style="width:160px;">
                                <option>Turret  </option>
                                <option>Turret 1</option>
                                <option>Turret 2</option>
                                <option>Turret 3</option>
                                <option>Bor</option>
                                <option>Champer</option>
                                <option>Welding</option>
                                <option>Autolathe</option>
                                <option> </option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Jumlah Shot/menit</label>
                            <input id="Jumlah_shot3" name="Jumlah_shot3" class="easyui-numberbox" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya Labor</label>
                            <input id="Biaya_labor3" name="Biaya_labor3" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Proses 4</label>
                            <select id="Proses4" class="easyui-combobox" name="Proses4" style="width:160px;">
                                <option>Turret  </option>
                                <option>Turret 1</option>
                                <option>Turret 2</option>
                                <option>Turret 3</option>
                                <option>Bor</option>
                                <option>Champer</option>
                                <option>Welding</option>
                                <option>Autolathe</option>
                                <option> </option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Jumlah Shot/menit</label>
                            <input id="Jumlah_shot4" name="Jumlah_shot4" class="easyui-numberbox" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya Labor</label>
                            <input id="Biaya_labor4" name="Biaya_labor4" class="easyui-numberbox" style="width:160px" value="0" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Proses 5</label>
                            <select id="Proses5" class="easyui-combobox" name="Proses5" style="width:160px;">
                                <option>Turret  </option>
                                <option>Turret 1</option>
                                <option>Turret 2</option>
                                <option>Turret 3</option>
                                <option>Bor</option>
                                <option>Champer</option>
                                <option>Welding</option>
                                <option>Autolathe</option>
                                <option> </option>
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Jumlah Shot/menit</label>
                            <input id="Jumlah_shot5" name="Jumlah_shot5" class="easyui-numberbox" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya Labor</label>
                            <input id="Biaya_labor5" name="Biaya_labor5" class="easyui-numberbox" style="width:160px" value ="0" data-options="precision:2" readonly="true"/>
                        </div>
                    </div>
                    <div title="Turret 2" style="padding:10px;">
                         <div class="fitem">
                            <label for="type">Kode Turret2</label>
                            <input id="Kode_turret2" name="Kode_turret2" class="easyui-combogrid" data-options="
                                panelWidth  : 250,
                                idField     : 'Id',
                                textField   : 'Name',
                                url         : '<?php echo site_url('transaksi/calculation/getTurret2'); ?>',
                                columns     : [[
                                    {field: 'Id',           title: 'Id',            width: 40},
                                    {field: 'Kode_Supp',    title: 'Kode Supp',     width: 70},
                                    {field: 'Name',         title: 'Jenis Turret 2', width: 120}
                                    ]],
                                onSelect: function(rowIndex, rowData) {
                                var g = $('#Kode_turret2').combogrid('grid');	// get datagrid object
                                var r = g.datagrid('getSelected');	// get the selected row
               
                                $('#Price_turret2').numberbox('setValue', r.Price);
                                $('#Currency_turret2').textbox('setValue', r.Currency);
                                turret2_cost();
                                }"  
                                />                  
                        </div>
                        <div class="fitem">
                            <label for="type">Price</label>
                            <input type="text" id="Price_turret2" name="Price_turret2" class="easyui-numberbox" data-options="precision:6, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Currency</label>
                            <input type="text" id="Currency_turret2" name="Currency_turret2" class="easyui-textbox" data-options="readonly: true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Exchange Rate</label>
                            <input type="text" id="Exch_rate_turret2" name="Exch_rate_turret2" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>                
                        <div class="fitem">
                            <label for="type">Turret 2 Cost</label>
                            <input type="text" id="Turret2_cost" name="Turret2_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:','"/>
                        </div> 
                    </div>
                    <div title="FQ & Packing" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Finish Weight</label>
                            <input id="Finish_weight4" name="Finish_weight4" class="easyui-numberbox" data-options="precision:2" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per gram FQ</label>
                            <input id="Gaji_per_gram_fq" name="Gaji_per_gram_fq" class="easyui-numberbox" data-options="precision:2" style="width:160px;" /> 
                        </div>                       
                        <div class="fitem">
                            <label for="type">Labor Cost FQ</label>
                            <input id="Labor_cost_fq" name="Labor_cost_fq" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                        
                        <div class="fitem">
                            <label for="type">Gaji per gram Packing</label>
                            <input id="Gaji_per_gram_packing" name="Gaji_per_gram_packing" class="easyui-numberbox" data-options="precision:2" style="width:160px;"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost Packing</label>
                            <input id="Labor_cost_packing" name="Labor_cost_packing" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                    </div>
                    <div title="Utility" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Finish Weight</label>
                            <input id="Finish_weight5" name="Finish_weight5" class="easyui-numberbox" data-options="precision:2" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Biaya per gram Electricity</label>
                            <input id="Biaya_per_gram_elc" name="Biaya_per_gram_elc" class="easyui-numberbox" data-options="precision:2" style="width:160px;" /> 
                        </div>                       
                        <div class="fitem">
                            <label for="type">Electricity Cost</label>
                            <input id="Electricity_cost" name="Electricity_cost" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                        
                        <div class="fitem">
                            <label for="type">Biaya per gram Factory Exp.</label>
                            <input id="Biaya_per_gram_fexp" name="Biaya_per_gram_fexp" class="easyui-numberbox" data-options="precision:2" style="width:160px;"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Factory Expense</label>
                            <input id="Factory_cost" name="Factory_cost" class="easyui-numberbox" value ="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>
                    </div>
                    <div title="Furnace" style="padding:10px;">
                         <div class="fitem">
                            <label for="type">Kode Furnace</label>
                            <input id="Kode_furnace" name="Kode_furnace" class="easyui-combogrid" data-options="
                                panelWidth  : 200,
                                idField     : 'Id',
                                textField   : 'Name',
                                url         : '<?php echo site_url('transaksi/calculation/getFurnace'); ?>',
                                columns     : [[
                                    {field: 'Id',           title: 'Id',            width: 40},
                                    {field: 'Kode_Supp',    title: 'Kode Supp',     width: 70},
                                    {field: 'Name',         title: 'Jenis Furnace', width: 80}
                                    ]],
                                onSelect: function(rowIndex, rowData) {
                                var g = $('#Kode_furnace').combogrid('grid');	// get datagrid object
                                var r = g.datagrid('getSelected');	// get the selected row
               
                                $('#Price_furnace').numberbox('setValue', r.Price);
                                $('#Currency_furnace').textbox('setValue', r.Currency);
                                furnace_cost();
                                }"  
                                />                  
                        </div>
                        <div class="fitem">
                            <label for="type">Finish Weight</label>
                            <input type="text" id="Finish_weight2" name="Finish_weight2" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Price</label>
                            <input type="text" id="Price_furnace" name="Price_furnace" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Currency</label>
                            <input type="text" id="Currency_furnace" name="Currency_furnace" class="easyui-textbox" data-options="readonly: true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Exchange Rate</label>
                            <input type="text" id="Exch_rate_furnace" name="Exch_rate_furnace" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>                
                        <div class="fitem">
                            <label for="type">Furnace Cost</label>
                            <input type="text" id="Furnace_cost" name="Furnace_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div> 
                    </div>
                    <div title="Furnace 2" style="padding:10px;">
                         <div class="fitem">
                            <label for="type">Kode Furnace2</label>
                            <input id="Kode_furnace2" name="Kode_furnace2" class="easyui-combogrid" data-options="
                                panelWidth  : 250,
                                idField     : 'Id',
                                textField   : 'Name',
                                url         : '<?php echo site_url('transaksi/calculation/getFurnace2'); ?>',
                                columns     : [[
                                    {field: 'Id',           title: 'Id',            width: 40},
                                    {field: 'Kode_Supp',    title: 'Kode Supp',     width: 70},
                                    {field: 'Name',         title: 'Jenis Furnace 2', width: 120}
                                    ]],
                                onSelect: function(rowIndex, rowData) {
                                var g = $('#Kode_furnace2').combogrid('grid');	// get datagrid object
                                var r = g.datagrid('getSelected');	// get the selected row
               
                                $('#Price_furnace2').numberbox('setValue', r.Price);
                                $('#Currency_furnace2').textbox('setValue', r.Currency);
                                furnace2_cost();
                                }"  
                                />                  
                        </div>
                        <div class="fitem">
                            <label for="type">Price</label>
                            <input type="text" id="Price_furnace2" name="Price_furnace2" class="easyui-numberbox" data-options="precision:6, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Currency</label>
                            <input type="text" id="Currency_furnace2" name="Currency_furnace2" class="easyui-textbox" data-options="readonly: true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Exchange Rate</label>
                            <input type="text" id="Exch_rate_furnace2" name="Exch_rate_furnace2" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>                
                        <div class="fitem">
                            <label for="type">Furnace 2 Cost</label>
                            <input type="text" id="Furnace2_cost" name="Furnace2_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:','"/>
                        </div> 
                    </div>
                     <div title="Plating" style="padding:10px;">
                         <div class="fitem">
                            <label for="type">Kode Plating</label>
                            <input id="Kode_plating" name="Kode_plating" class="easyui-combogrid" data-options="
                                panelWidth  : 220,
                                idField     : 'Id',
                                textField   : 'Name',
                                url         : '<?php echo site_url('transaksi/calculation/getPlating'); ?>',
                                columns     : [[
                                    {field: 'Id',           title: 'Id',            width: 40},
                                    {field: 'Kode_Supp',    title: 'Kode Supp',     width: 70},
                                    {field: 'Name',         title: 'Jenis Plating', width: 100}
                                    ]],
                                onSelect: function(rowIndex, rowData) {
                                var g = $('#Kode_plating').combogrid('grid');	// get datagrid object
                                var r = g.datagrid('getSelected');	// get the selected row
               
                                $('#Price_plating').numberbox('setValue', r.Price);
                                $('#Currency_plating').textbox('setValue', r.Currency);
                                plating_cost();
                                }"  
                                />                  
                        </div>
                        <div class="fitem">
                            <label for="type">Finish Weight</label>
                            <input type="text" id="Finish_weight3" name="Finish_weight3" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Price</label>
                            <input type="text" id="Price_plating" name="Price_plating" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Currency</label>
                            <input type="text" id="Currency_plating" name="Currency_plating" class="easyui-textbox" data-options="readonly: true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Exchange Rate</label>
                            <input type="text" id="Exch_rate_plating" name="Exch_rate_plating" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>                
                        <div class="fitem">
                            <label for="type">Plating Cost</label>
                            <input type="text" id="Plating_cost" name="Plating_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Menggunakan Baking?</label>
                            <select id="Baking" class="easyui-combobox" name="Baking" style="width:80px;" data-options ="
                                    panelHeight:'70',
                                    onSelect: function(w){
                                    if (w.value == '1') {
                                        baking_cost();
                                    }
                                    else {
                                        $('#Baking_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Baking Cost</label>
                            <input type="text" id="Baking_cost" name="Baking_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                         <div class="fitem">
                            <label for="type">Menggunakan Cuci?</label>
                            <select id="Cuci" class="easyui-combobox" name="Cuci" style="width:80px;" data-options ="
                                    panelHeight:'70',
                                    onSelect: function(w){
                                    if (w.value == '1') {
                                        cuci_cost();
                                    }
                                    else {
                                        $('#Cuci_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Cuci Cost</label>
                            <input type="text" id="Cuci_cost" name="Cuci_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Menggunakan Assembly?</label>
                            <select id="Assembly" class="easyui-combobox" name="Assembly" style="width:80px;" data-options ="
                                    panelHeight:'50',
                                    onSelect: function(a){
                                    if (a.value == '1') {
                                    $('#Kode_assembly').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    kode_assembly();
                                    }
                                    else {
                                    $('#Kode_assembly').combogrid({
                                    required:false,
                                    readonly:true
                                    });
                                    $('#Kode_assembly').textbox('clear');
                                    $('#Assembly_cost').numberbox('clear');
                                    }
                                    }" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>                                
                            </select>
                        </div>
                        <div class="fitem">
                            <label for="type">Type Assembly</label>
                            <input id="Kode_assembly" name="Kode_assembly" class="easyui-combogrid" style="width:160px"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Assembly Cost</label>
                            <input type="text" id="Assembly_cost" name="Assembly_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                        </div> 
                    </div>
                    <div title="Coating" style="padding:10px;">
                         <div class="fitem">
                            <label for="type">Kode Coating</label>
                            <input id="Kode_coating" name="Kode_coating" class="easyui-combogrid" data-options="
                                panelWidth  : 250,
                                idField     : 'Id',
                                textField   : 'Name',
                                url         : '<?php echo site_url('transaksi/calculation/getCoating'); ?>',
                                columns     : [[
                                    {field: 'Id',           title: 'Id',            width: 40},
                                    {field: 'Kode_Supp',    title: 'Kode Supp',     width: 70},
                                    {field: 'Name',         title: 'Jenis Coating', width: 120}
                                    ]],
                                onSelect: function(rowIndex, rowData) {
                                var g = $('#Kode_coating').combogrid('grid');	// get datagrid object
                                var r = g.datagrid('getSelected');	// get the selected row
               
                                $('#Price_coating').numberbox('setValue', r.Price);
                                $('#Currency_coating').textbox('setValue', r.Currency);
                                coating_cost();
                                }"  
                                />                  
                        </div>
                        <div class="fitem">
                            <label for="type">Price</label>
                            <input type="text" id="Price_coating" name="Price_coating" class="easyui-numberbox" data-options="precision:6, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Currency</label>
                            <input type="text" id="Currency_coating" name="Currency_coating" class="easyui-textbox" data-options="readonly: true"/>
                        </div> 
                        <div class="fitem">
                            <label for="type">Exchange Rate</label>
                            <input type="text" id="Exch_rate_coating" name="Exch_rate_coating" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                        </div>                
                        <div class="fitem">
                            <label for="type">Coating Cost</label>
                            <input type="text" id="Coating_cost" name="Coating_cost" class="easyui-numberbox" value="0" data-options="precision:2,groupSeparator:'.',decimalSeparator:','"/>
                        </div> 
                    </div>
                </div>      
            </div>
            <div title="Summary" style="padding:10px">
                <div class="fitem">
                       <label for="type">Material Cost</label>
                       <input type="text" id="Material_cost_summary" name="Material_cost_summary" class="easyui-numberbox" data-options="precision:2, groupSeparator:'.', decimalSeparator:',', readonly: true" />
                </div>                
                <div class="fitem">
                       <label for="type">Purchasing Cost</label>
                       <input type="text" id="Washer_total_cost_summary" name="Washer_total_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div>
                <div class="fitem">
                       <label for="type">Processing Cost</label>
                       <input type="text" id="Processing_cost_summary" name="Processing_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div> 
               <div class="fitem">
                       <label for="type">Tooling Cost</label>
                       <input type="text" id="Tooling_cost_summary" name="Tooling_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
               </div>
                <div class="fitem">
                       <label for="type">Depreciation Cost</label>
                       <input type="text" id="Depreciation_cost_summary" name="Depreciation_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div>
                <div class="fitem">
                       <label for="type">Adm and Profit Rate</label>
                       <input type="text" id="Profit_rate_summary" name="Profit_rate_summary" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:','"/>
                        </div>
                <div class="fitem">
                       <label for="type">Adm and Profit</label>
                       <input type="text" id="Profit_cost_summary" name="Profit_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div>
                <div class="fitem">
                       <label for="type"><b>Total Price</b></label>
                       <input type="text" id="Total_cost_summary" name="Total_cost_summary" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div>
                <div class="fitem">
                       <label for="type"><b>Price per kg wire</b></label>
                       <input type="text" id="Price_per_kg" name="Price_per_kg" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true" />
                </div>
            </div>
        </div>
    </form>
</div>



<!-- Dialog Button -->
<div id="dlg-buttons-transaksi_calculation">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="transaksicalculationSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-transaksi_calculation').dialog('close')">Batal</a>
</div>

<!-- Dialog Session Data -->`
<div id="dlg-transaksi_calculation_sesdata" class="easyui-dialog" style="width:400px; height:200px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-transaksi_calculation_sesdata">
    <form id="fm-transaksi_calculation_sesdata" method="post" novalidate>
        <div class="fitem">
            <label for="type">Scrap</label>
            <input id="ScrapSesData" name="ScrapSesData" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Exch. Rate</label>
            <input id="Exch_rateSesData" name="Exch_rateSesData" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Adm and Profit Rate</label>
            <input id="Profit_rateSesData" name="Profit_rateSesData" class="easyui-numberbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button Session Data -->
<div id="dlg-buttons-transaksi_calculation_sesdata">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="transaksicalculationSesDataSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-transaksi_calculation_sesdata').dialog('close')">Batal</a>
</div>

<!-- End of file v_calculation.php -->
<!-- Location: ./application/views/transaksi/v_calculation.php -->       

