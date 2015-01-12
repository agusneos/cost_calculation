<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>

<!-- Data Grid -->
<table id="grid-master_supplier"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_supplier">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode Supplier</th>
            <th data-options="field:'Name'"                 width="300" halign="center" align="left" sortable="true">Nama supplier</th>
            <th data-options="field:'PayTerm'"              width="100" align="center" sortable="true" formatter="payterm">Payment Term</th>
            <th data-options="field:'SuppGroup'"            width="100" align="center" sortable="true" >Grup</th>
            
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_supplier = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterSupplierCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterSupplierUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterSupplierHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_supplier').datagrid('reload');}
    }];
    
    $('#grid-master_supplier').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/supplier/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function masterSupplierCreate() {
        $('#dlg-master_supplier').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_supplier').form('clear');
        url = '<?php echo site_url('master/supplier/create'); ?>';
    }
    
    
    function masterSupplierUpdate() {
        var row = $('#grid-master_supplier').datagrid('getSelected');
        if(row){
            $('#dlg-master_supplier-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_supplier-edit').form('load',row);
            url = '<?php echo site_url('master/supplier/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterSupplierSave(){
        $('#fm-master_supplier').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_supplier').dialog('close');
                    $('#grid-master_supplier').datagrid('reload');
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
    
    function masterSupplierSaveEdit(){
        $('#fm-master_supplier-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_supplier-edit').dialog('close');
                    $('#grid-master_supplier').datagrid('reload');
                    $.messager.show({
                        title: 'Info',
                        msg: 'Ubah Data Berhasil'
                    });
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: 'Ubah Data Gagal'
                    });
                }
            }
        });
    }
    
    function masterSupplierHapus(){
        var row = $('#grid-master_supplier').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus supplier '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/supplier/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_supplier').datagrid('reload');
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
    #fm-master_supplier{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_supplier-edit{
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

<div id="dlg-master_supplier" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_supplier">
    <form id="fm-master_supplier" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Kode supplier</label>
            <input type="text" id="Id" name="Id" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Nama supplier</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Payment</label>
            <input type="text" id="PayTerm" name="PayTerm" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Group</label>
            <input id="SuppGroup" name="SuppGroup" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/supplier/enumSuppGroup'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_supplier">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterSupplierSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_supplier').dialog('close')">Batal</a>
</div>

<div id="dlg-master_supplier-edit" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_supplier-edit">
    <form id="fm-master_supplier-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama Supplier</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Payment</label>
            <input type="text" id="PayTerm" name="PayTerm" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Group</label>
            <input id="SuppGroup" name="SuppGroup" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/supplier/enumSuppGroup'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_supplier-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterSupplierSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_supplier-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_supplier.php -->
<!-- Location: ./application/views/master/v_supplier.php -->