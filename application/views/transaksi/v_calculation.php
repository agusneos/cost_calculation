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
            $('#Exch_rate_furnace').numberbox('setValue',result.Exch_rate);
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
        $('#Rolling_depr_cost').numberbox('setValue', 0);
        $('#Cutting_depr_cost').numberbox('setValue', 0);
        $('#Slotting_depr_cost').numberbox('setValue', 0);
        $('#Trimming_depr_cost').numberbox('setValue', 0);
        $('#Straightening_depr_cost').numberbox('setValue', 0);
        $('#Pressing_depr_cost').numberbox('setValue', 0);
        
        $('#Pressing_depr_cost').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hdc = $('#Heading_depr_cost').numberbox('getValue');
                var rdc = $('#Rolling_depr_cost').numberbox('getValue');
                var cdc = $('#Cutting_depr_cost').numberbox('getValue');
                var sdc = $('#Slotting_depr_cost').numberbox('getValue');
                var tdc = $('#Trimming_depr_cost').numberbox('getValue');
                var stdc = $('#Straightening_depr_cost').numberbox('getValue');
                var pdc = $('#Pressing_depr_cost').numberbox('getValue');
                var dcs = ((eval(hdc) + eval(rdc) + eval(cdc)) + eval(sdc) + eval(tdc) + eval(stdc)+ eval(pdc));
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
                    $('#Category').textbox('setValue', result.Category);
                    $('#Heading_tool_cost').numberbox('setValue', result.htc);
                    $('#Heading_currency').textbox('setValue', result.Currency);
                }, 'json');
                }
                else(gol_mchn == "Heading 2 dies")
                {
                var item = $('#Type_screw').textbox('getValue');
                var dianom2 = $('#Dia_nominal9').numberbox('getValue');
                $.post('<?php echo site_url('transaksi/calculation/getHeading2'); ?>',
                        {typescrhead2: item, dianom2: dianom2}, function(result) {
                    $('#Heading_tool_cost').numberbox('setValue', result.htc2);
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
                $.post('<?php echo site_url('transaksi/calculation/getCategory2'); ?>',
                        {typescr2: cat2, dia2: dia2, length2: length2}, function(result) {
                    $('#Category2').textbox('setValue', result.Category2);
                    $('#Rolling_tool_cost').numberbox('setValue', result.rtc);
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
                var htc = $('#Heading_tool_cost2').numberbox('getValue');
                var rtc = $('#Rolling_tool_cost').numberbox('getValue');
                var ctc = $('#Cutting_tool_cost').numberbox('getValue');
                var stc = $('#Slotting_tool_cost').numberbox('getValue');
                var ttc = $('#Trimming_tool_cost').numberbox('getValue');
                var tcs = ((eval(htc) + eval(rtc) + eval(ctc)) + eval(stc) + eval(ttc));
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
                $('#Labor_cost_rolling').numberbox('setValue', lcr);
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
        $('#Labor_cost_fq').numberbox('setValue', 0);
        $('#Labor_cost_packing').numberbox('setValue', 0);
        $('#Electricity_cost').numberbox('setValue', 0);
        $('#Factory_cost').numberbox('setValue', 0);
        $('#Furnace_cost').numberbox('setValue', 0);
        $('#Plating_cost').numberbox('setValue', 0);
        $('#Baking_cost').numberbox('setValue', 0);
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
                var fqlc =$('#Labor_cost_fq').numberbox('getValue');
                var plc = $('#Labor_cost_packing').numberbox('getValue');
                var bl =$('#Electricity_cost').numberbox('getValue');
                var bf = $('#Factory_cost').numberbox('getValue');
                var fc=$('#Furnace_cost').numberbox('getValue');
                var pc = $('#Plating_cost').numberbox('getValue');
                var bc=$('#Baking_cost').numberbox('getValue');
                var ac = $('#Assembly_cost').numberbox('getValue');
                var cc=$('#Coating_cost').numberbox('getValue');
                var pcsum=eval(hlc)+ eval(rlc)+ eval(clc)+eval(slc)+eval(tlc)+eval(stlc)+eval(turlc1)+eval(turlc2)+eval(turlc3)+eval(turlc4)+eval(turlc5)+eval(fqlc)+eval(plc)+eval(bl)+eval(bf)+eval(fc)+eval(pc)+eval(bc)+eval(ac)+eval(cc);    
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
            $('#Profit_cost_summary').numberbox('setValue', prcs);
            $('#Total_cost_summary').numberbox('setValue', tcsum); 
            }
        });
    }
    

    function transaksicalculationUpdate() {
        var row = $('#grid-transaksi_calculation').datagrid('getSelected');
        if (row) {
            $('#dlg-transaksi_calculation').dialog({modal: true}).dialog('open').dialog('setTitle', 'Edit Data');
            $('#fm-transaksi_calculation').form('load', row);
            url = '<?php echo site_url('transaksi/calculation/update'); ?>/' + row.Id;
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
        var wts = $('#Working_time_sec').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec').numberbox('setValue', (result.gpy) / (wts * result.jl));
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
        var wtst = $('#Working_time_sec6').numberbox('getValue');
        $.post('<?php echo site_url('transaksi/calculation/getGaji'); ?>',
                {proses: proses}, function(result) {
            $('#Gaji_per_sec6').numberbox('setValue', (result.gpy) / (wtst * result.jl));
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
                    <input type="text" id="Exch_rate" name="Exch_rate" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
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
                            <select id="mchn_straightening" class="easyui-combobox" name="mchn_straightening" style="width:50px;"  data-options="
                                    panelHeight:'50',
                                    onSelect: function(z7){
                                    if (z7.value == '1') {
                                    $('#Kode_mchnstraighten').combogrid({
                                    required:true,
                                    readonly:false
                                    });
                                    $('#Kode_mchnstraighten').next().find('input').focus();
                                    diameternomstraighten();                                   }
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
                            <select id="mchn_pressing" name="mchn_pressing" class="easyui-combobox" style="width:50px;" data-options="
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
                            <input id="Cycle_time" name="Cycle_time" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time" name="Working_time" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec" name="Working_time_sec" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
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
                            <input id="Cycle_time2" name="Cycle_time2" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time2" name="Working_time2" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec2" name="Working_time_sec2" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
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
                            <input id="Cycle_time3" name="Cycle_time3" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time3" name="Working_time3" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec3" name="Working_time_sec3" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
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
                            <input id="Cycle_time4" name="Cycle_time4" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time4" name="Working_time4" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec4" name="Working_time_sec4" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
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
                            <input id="Cycle_time5" name="Cycle_time5" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time5" name="Working_time5" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec5" name="Working_time_sec5" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
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
                            <label for="type">Straightening Machine</label>
                            <input id="Straightening_machine" name="Straightening_machine" class="easyui-textbox" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Dandori time</label>
                            <input id="Dandori_time6" name="Dandori_time6" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Cycle time</label>
                            <input id="Cycle_time6" name="Cycle_time6" class="easyui-textbox" data-options="precision:2" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Hari Kerja</label>
                            <input id="Working_time6" name="Working_time6" class="easyui-numberbox" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Working time(sec)</label>
                            <input id="Working_time_sec6" name="Working_time_sec6" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" style="width:160px" readonly="true"/>
                        </div>
                        <div class="fitem">
                            <label for="type">Gaji per sec</label>
                            <input id="Gaji_per_sec6" name="Gaji_per_sec6" class="easyui-numberbox" data-options="precision:2" style="width:160px;" readonly="true"/> 
                        </div>
                        <div class="fitem">
                            <label for="type">Quantity</label>
                            <input id="Quantity7" name="Quantity7" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
                        </div>
                        <div class="fitem">
                            <label for="type">Labor Cost</label>
                            <input id="Labor_cost_straightening" name="Labor_cost_straightening" class="easyui-numberbox" value="0" data-options="precision:2" style="width:160px" readonly="true"/>
                        </div>     
                    </div>
                    <div title="Turret/Auto/Bor" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Proses 1</label>
                            <select id="Proses1" class="easyui-combobox" name="Proses1" style="width:160px;">
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
                    <div title="FQ & Packing" style="padding:10px;">
                        <div class="fitem">
                            <label for="type">Finish Weight</label>
                            <input id="Finish_weight4" name="Finish_weight4" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
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
                            <input id="Finish_weight5" name="Finish_weight5" class="easyui-numberbox" data-options="precision:0" style="width:160px" />
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
                       <label for="type"><b>Total Cost</b></label>
                       <input type="text" id="Total_cost_summary" name="Total_cost_summary" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true" />
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

