<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/accounting/accounting.js')?>"></script>
<!-- Data Grid -->
<table id="grid-master_pressing_mchn"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_pressing_mchn">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Kode_mchnpress'"           width="100" align="center" sortable="true">Kode Mesin</th>
            <th data-options="field:'Dia_nominal'"             width="100" align="center" sortable="true">Dia. Nominal</th>
            <th data-options="field:'Length_range'"            width="100" align="center" sortable="true">Range Panjang</th>
            <th data-options="field:'Mchn_pressing'"            width="100" align="center" sortable="true">Mesin Pressing</th>
            <th data-options="field:'Mchn_price'"              width="100" align="center" formatter="price" sortable="true">Harga Mesin</th>
            <th data-options="field:'Dandori_time'"            width="100" align="center" sortable="true">Dandori time</th>
            <th data-options="field:'Depr_per_month'"          width="100" align="center" formatter="price" sortable="true">Depr./bulan</th>
            <th data-options="field:'Output_per_min'"          width="100" align="center" sortable="true">Output/menit</th>
            <th data-options="field:'Working_time'"            width="100" align="center" sortable="true">Hari Kerja</th>
            <th data-options="field:'Working_time_sec'"        width="100" align="center" formatter="price" sortable="true">Working time(sec)</th>
            <th data-options="field:'Output_per_day'"          width="100" align="center" formatter="price" sortable="true">Output/hari</th>
            <th data-options="field:'Output_per_month'"        width="100" align="center" formatter="price" sortable="true">Output/bulan</th>
            <th data-options="field:'Productivity_ratio'"      width="100" align="center" sortable="true">Ratio Prod.</th>
            <th data-options="field:'Prod_plan_month'"         width="100" align="center" formatter="price" sortable="true">Prod Plan/bln</th>
            <th data-options="field:'Cycle_time'"              width="100" align="center" sortable="true">Cycle time</th>
            <th data-options="field:'Pressing_depr_cost'"       width="100" align="center" sortable="true">Depr. Cost</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_pressing_mchn = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterpressing_mchnCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterpressing_mchnUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterpressing_mchnHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_pressing_mchn').datagrid('reload');}
    }];
    
    $('#grid-master_pressing_mchn').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/machine/pressing_mchn/index'); ?>?grid=true'})
        .datagrid('enableFilter');

        function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 0, ",", ".");
    }
    
    function masterpressing_mchnCreate() {
        $('#dlg-master_pressing_mchn').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_pressing_mchn').form('clear');
        url = '<?php echo site_url('master/machine/pressing_mchn/create'); ?>';
         
        
        $('#Dia_nominal').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Length_range').next().find('input').focus();
            }
        });
        $('#Length_range').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Mchn_pressing').next().find('input').focus();
            }
        });
        $('#Mchn_pressing').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Dandori_time').next().find('input').focus();
            }
        });
        
        $('#Dandori_time').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Mchn_price').next().find('input').focus();
            }
        });
        
        $('#Mchn_price').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                var prc = $('#Mchn_price').numberbox('getValue');
                var dpm = eval(prc)/(8*12);
                $('#Depr_per_month').numberbox('setValue', dpm);
                $('#Output_per_min').next().find('input').focus();
            }
        }); 
         $('#Output_per_min').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Working_time').next().find('input').focus();
            }
        });   
                
        $('#Working_time').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                var opmin = $('#Output_per_min').numberbox('getValue');
                var wt = $('#Working_time').numberbox('getValue');
                var opd = eval(opmin)*60*14;
                var opm = eval(opd)*eval(wt);
                var wts = eval(wt)*14*3600;
                $('#Working_time_sec').numberbox('setValue', wts);
                $('#Output_per_day').numberbox('setValue', opd);
                $('#Output_per_month').numberbox('setValue', opm);
                $('#Productivity_ratio').next().find('input').focus(); 
            }
        });
        
        $('#Productivity_ratio').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){
                $('#oksave').focus();
                var opm = $('#Output_per_month').numberbox('getValue');          
                var pr = $('#Productivity_ratio').numberbox('getValue');
                var opmin = $('#Output_per_min').numberbox('getValue');
                var dpm = $('#Depr_per_month').numberbox('getValue');
                var ppm = eval(opm)*eval(pr)/100;
                var ct = 60/eval(opmin);
                var dprc = eval(dpm)/eval(ppm);
                $('#Prod_plan_month').numberbox('setValue', ppm);
                $('#Cycle_time').numberbox('setValue', ct);
                $('#Pressing_depr_cost').numberbox('setValue', dprc);
            }
        });
    }
    
    
    function masterpressing_mchnUpdate() {
        var row = $('#grid-master_pressing_mchn').datagrid('getSelected');
        if(row){
            $('#dlg-master_pressing_mchn').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_pressing_mchn').form('load',row);
            url = '<?php echo site_url('master/machine/pressing_mchn/update'); ?>/' + row.Kode_mchnpress; 
        
            $('#Dia_nominal').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Length_range').next().find('input').focus();
            }
            });
            $('#Length_range').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Mchn_pressing').next().find('input').focus();
            }
             });
            $('#Mchn_pressing').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Dandori_time').next().find('input').focus();
            }
             });
        
            $('#Dandori_time').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Mchn_price').next().find('input').focus();
            }
            });
        
            $('#Mchn_price').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                var prc = $('#Mchn_price').numberbox('getValue');
                var dpm = eval(prc)/(8*12);
                $('#Depr_per_month').numberbox('setValue', dpm);
                $('#Output_per_min').next().find('input').focus();
            }
            }); 
            $('#Output_per_min').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Working_time').next().find('input').focus();
            }
            });   
           $('#Working_time').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                var opmin = $('#Output_per_min').numberbox('getValue');
                var wt = $('#Working_time').numberbox('getValue');
                var opd = eval(opmin)*60*14;
                var opm = eval(opd)*eval(wt);
                var wts = eval(wt)*14*3600*12;
                $('#Working_time_sec').numberbox('setValue', wts);
                $('#Output_per_day').numberbox('setValue', opd);
                $('#Output_per_month').numberbox('setValue', opm);
                $('#Productivity_ratio').next().find('input').focus();
            }
        });
        
        $('#Productivity_ratio').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){
                $('#oksave').focus();
                var opm = $('#Output_per_month').numberbox('getValue');          
                var pr = $('#Productivity_ratio').numberbox('getValue');
                var opmin = $('#Output_per_min').numberbox('getValue');
                var dpm = $('#Depr_per_month').numberbox('getValue');
                var ppm = eval(opm)*eval(pr)/100;
                var ct = 60/eval(opmin);
                var dprc = eval(dpm)/eval(ppm);
                $('#Prod_plan_month').numberbox('setValue', ppm);
                $('#Cycle_time').numberbox('setValue', ct);
                $('#Pressing_depr_cost').numberbox('setValue', dprc);
            }
        });
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterpressing_mchnSave(){
        $('#fm-master_pressing_mchn').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_pressing_mchn').dialog('close');
                    $('#grid-master_pressing_mchn').datagrid('reload');
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
    
    function masterpressing_mchnHapus(){
        var row = $('#grid-master_pressing_mchn').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus machine '+row.Kode_mchnpress+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/machine/pressing_mchn/delete'); ?>',{Kode_mchnpress:row.Kode_mchnpress},function(result){
                        if (result.success){
                            $('#grid-master_pressing_mchn').datagrid('reload');
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
                    },'json');
                }
            });
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }

    function payterm(value,row,index) {
        if (value == 0){
            return '';
        } else {
            return value +' Hari';
        }        
    }
    
</script>

<style type="text/css">
    #fm-master_pressing_mchn{
        margin:0;
        padding:10px 30px;
    }
    .ftitle{
        font-size:14px;
        font-weight:bold;
        padding:5px 0;
        margin-bottom:10px;
        border-bottom:1px solid #ccc;
    }
    .fitem{
        margin-bottom:5px;
    }
    .fitem label{
        display:inline-block;
        width:80px;
    }
</style>
   
<div id="dlg-master_pressing_mchn" class="easyui-dialog" style="width:400px; height:500px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_pressing_mchn">
    <form id="fm-master_pressing_mchn" method="post" novalidate>   
        <div class="fitem">
            <label for="type">Dia. Nominal</label>
            <input type="text" id="Dia_nominal" name="Dia_nominal" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Range Panjang</label>
            <input type="text" id="Length_range" name="Length_range" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Mesin pressing</label>
            <input type="text" id="Mchn_pressing" name="Mchn_pressing" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Dandori Time</label>
            <input type="text" id="Dandori_time" name="Dandori_time" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Harga Mesin</label>
            <input type="text" id="Mchn_price" name="Mchn_price" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:','" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Depr./bulan</label>
            <input type="text" id="Depr_per_month" name="Depr_per_month" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
        <div class="fitem">
            <label for="type">Output/menit</label>
            <input type="text" id="Output_per_min" name="Output_per_min" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:','" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Hari Kerja</label>
            <input type="text" id="Working_time" name="Working_time" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:','" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Working time(sec)</label>
            <input type="text" id="Working_time_sec" name="Working_time_sec" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:','" readonly="true"/>
        </div>
        <div class="fitem">
            <label for="type">Output/hari</label>
            <input type="text" id="Output_per_day" name="Output_per_day" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
        <div class="fitem">
            <label for="type">Output/bulan</label>
            <input type="text" id="Output_per_month" name="Output_per_month" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
        <div class="fitem">
            <label for="type">Ratio Prod.</label>
            <input type="text" id="Productivity_ratio" name="Productivity_ratio" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:','" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Prod Plan/bln</label>
            <input type="text" id="Prod_plan_month" name="Prod_plan_month" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
        <div class="fitem">
            <label for="type">Cycle Time</label>
            <input type="text" id="Cycle_time" name="Cycle_time" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
        <div class="fitem">
            <label for="type">Depr. Cost</label>
            <input type="text" id="Pressing_depr_cost" name="Pressing_depr_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_pressing_mchn">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" id="oksave" iconCls="icon-ok" onclick="masterpressing_mchnSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_pressing_mchn').dialog('close')">Batal</a>
</div>

<!-- End of file v_pressing_mchn.php -->
<!-- Location: ./application/views/master/machine/v_pressing_mchn.php -->