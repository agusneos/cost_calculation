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

<table id="grid-transaksi_calculationAppAccMgr"
       data-options="pageSize:50, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_transaksi_calculationAppAccMgr, 
                 rowStyler: function(index,row){
                    if (row.Approval_Acc_Mgr == ''){
                        return 'background-color:#6293BB;color:black;font-weight:bold;';
                    }
                    else if (row.Approval_Acc_Mgr == 'NG'){
                        return 'background-color:orange;color:black;font-weight:bold;';
                    }
                }">
    <thead data-options="frozen:true">
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                       width="100" align="center" sortable="true">Kode calculation</th>
            <th data-options="field:'Tanggal'"                  width="100" align="center" sortable="true">Tanggal</th>
            <th data-options="field:'Customer'"                 width="100" align="center" sortable="true">Customer</th>
            <th data-options="field:'Customer_code'"            width="100" align="center" sortable="true">Customer Code</th>
            <th data-options="field:'Saga_code'"                width="100" align="center" sortable="true">Saga Code</th>
        </tr>
        </thead>
        <thead>
            <tr>    
            <th data-options="field:'Type_screwOri'"            width="100" align="center" sortable="true">Type Screw</th>
            <th data-options="field:'Dia_nominal'"              width="100" align="center" sortable="true">Dia. Nominal</th>
            <th data-options="field:'Length_nominal'"           width="100" align="center" sortable="true">Length Nominal</th>
            <th data-options="field:'Quantity'"                 width="100" align="center" sortable="true" formatter="price">Quantity</th>
            <th data-options="field:'Scrap'"                    width="100" align="center" sortable="true">Scrap</th>
            <th data-options="field:'Exch_rate'"                width="100" align="center" sortable="true"formatter="price">Exch Rate</th>
            <th data-options="field:'Material_cost'"            width="100" align="center" sortable="true">Material cost</th>
            <th data-options="field:'Finish_weight'"            width="100" align="center" sortable="true">Finish Weight</th>
            <th data-options="field:'Washer_total_cost'"        width="100" align="center" sortable="true">Washer Total Cost</th>
            <th data-options="field:'Processing_cost_summary'"  width="100" align="center" sortable="true">Processing Cost</th>
            <th data-options="field:'Tooling_cost_summary'"     width="100" align="center" sortable="true">Tooling Cost</th>
            <th data-options="field:'Depreciation_cost_summary'" width="100" align="center" sortable="true">Depr. Cost</th>
            <th data-options="field:'Profit_rate_summary'"      width="100" align="center" sortable="true">Profit rate</th>
            <th data-options="field:'Profit_cost_summary'"      width="100" align="center" sortable="true">Profit cost</th>
            <th data-options="field:'Total_cost_summary'"       width="100" align="center" sortable="true">Total Price</th>
            <th data-options="field:'Price_per_kg'"             width="100" align="center" sortable="true">Price per kg</th>
            <th data-options="field:'Note_Acc_Staff'"           width="200" align="center" sortable="true">Message Staff</th>
            <th data-options="field:'Approval_Acc_Mgr'"         width="100" align="center" sortable="true">Approval</th>
            <th data-options="field:'Note_Acc_Mgr'"             width="200" align="center" sortable="true">Message</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_transaksi_calculationAppAccMgr = [{
            text: 'Approve',
            iconCls: 'icon-new_file',
            handler: function() {
                transaksicalculationAppAccMgrApprove();
            }
            }, {
            text: 'Refresh',
            iconCls: 'icon-reload',
            handler: function() {
                $('#grid-transaksi_calculationAppAccMgr').datagrid('reload');
            }
    }]        
    $('#grid-transaksi_calculationAppAccMgr').datagrid({view: scrollview, remoteFilter: true,
        url: '<?php echo site_url('transaksi/calculationAppAccMgr/index'); ?>?grid=true'})
            .datagrid('enableFilter');

    function price(value, row, index)
    {
        return accounting.formatMoney(value, "", 0, ",", ".");
    }

    function transaksicalculationAppAccMgrApprove() {
        var row = $('#grid-transaksi_calculationAppAccMgr').datagrid('getSelected');
        if (row) {
        $('#dlg-transaksi_calculationAppAccMgr').dialog({modal: true}).dialog('open').dialog('setTitle', 'Approve Calculation');
        $('#fm-transaksi_calculationAppAccMgr').form('load', row);
            url = '<?php echo site_url('transaksi/calculationAppAccMgr/approve'); ?>/' + row.Id;
        }              
        else
        {
            $.messager.alert('Info', 'Data belum dipilih !', 'info');
        }  
    }
    

    function transaksicalculationAppAccMgrSave() {
        $('#fm-transaksi_calculationAppAccMgr').form('submit', {
            url: url,
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                var result = eval('(' + result + ')');
                if (result.success) {
                    $('#dlg-transaksi_calculationAppAccMgr').dialog('close');
                    $('#grid-transaksi_calculationAppAccMgr').datagrid('reload');
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
<div id="dlg-transaksi_calculationAppAccMgr" class="easyui-dialog" style="width:350px; height:250px;" closed="true" buttons="#dlg-buttons-transaksi_calculationAppAccMgr">
    <form id="fm-transaksi_calculationAppAccMgr" method="post" novalidate>        
     <div class="fitem">
             <label for="type">Approval?</label>
             <input id="Approval_Acc_Mgr" name="Approval_Acc_Mgr" class="easyui-combobox" data-options=" 
                                   url:'<?php echo site_url('transaksi/calculationAppAccMgr/enumCalculationAppAccMgr'); ?>',
                                   method:'get', valueField:'data', textField:'data', panelHeight:'auto', 
                                   onSelect: function(z){                                                  
                                   $('#Note_Mkt_Mgr').next().find('input').focus();  
                                   }" style="width:160px;"/>  
     </div>
             
     <div class="fitem">
             <label for="type">Message </label>
             <input type="text" id="Note_Acc_Mgr" name="Note_Acc_Mgr" class="easyui-textbox" data-options="multiline:true" style="width:300px;height:100px" />
     </div> 
    </form>
</div>



<!-- Dialog Button -->
<div id="dlg-buttons-transaksi_calculationAppAccMgr">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="transaksicalculationAppAccMgrSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-transaksi_calculationAppAccMgr').dialog('close')">Batal</a>
</div>

<!-- End of file v_calculationAppAccMgr.php -->
<!-- Location: ./application/views/transaksi/v_calculationAppAccMgr.php -->       

