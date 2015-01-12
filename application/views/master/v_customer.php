<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>

<!-- Data Grid -->
<table id="grid-master_customer"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_customer">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode customer</th>
            <th data-options="field:'Name'"                 width="300" halign="center" align="left" sortable="true">Nama customer</th>
            <th data-options="field:'PayTerm'"              width="100" align="center" sortable="true" formatter="payterm">Payment Term</th>
            <th data-options="field:'CustGroup'"            width="100" align="center" sortable="true" >Grup</th>
           
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_customer = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){mastercustomerCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){mastercustomerUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){mastercustomerHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_customer').datagrid('reload');}
    }];
    
    $('#grid-master_customer').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/customer/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function mastercustomerCreate() {
        $('#dlg-master_customer').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_customer').form('clear');
        url = '<?php echo site_url('master/customer/create'); ?>';
    }
    
    function mastercustomerUpdate() {
        var row = $('#grid-master_customer').datagrid('getSelected');
        if(row){
            $('#dlg-master_customer-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_customer-edit').form('load',row);
            url = '<?php echo site_url('master/customer/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function mastercustomerSave(){
        $('#fm-master_customer').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_customer').dialog('close');
                    $('#grid-master_customer').datagrid('reload');
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
    
    function mastercustomerSaveEdit(){
        $('#fm-master_customer-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_customer-edit').dialog('close');
                    $('#grid-master_customer').datagrid('reload');
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
    
    function mastercustomerHapus(){
        var row = $('#grid-master_customer').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus customer '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/customer/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_customer').datagrid('reload');
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
    #fm-master_customer{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_customer-edit{
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

<div id="dlg-master_customer" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_customer">
    <form id="fm-master_customer" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Kode customer</label>
            <input type="text" id="Id" name="Id" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Nama customer</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Payment</label>
            <input type="text" id="PayTerm" name="PayTerm" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Group</label>
            <input id="CustGroup" name="CustGroup" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/customer/enumCustGroup'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_customer">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastercustomerSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_customer').dialog('close')">Batal</a>
</div>

<div id="dlg-master_customer-edit" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_customer-edit">
    <form id="fm-master_customer-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama customer</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Payment</label>
            <input type="text" id="PayTerm" name="PayTerm" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Group</label>
            <input id="CustGroup" name="CustGroup" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/customer/enumCustGroup'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_customer-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastercustomerSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_customer-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_customer.php -->
<!-- Location: ./application/views/master/v_customer.php -->