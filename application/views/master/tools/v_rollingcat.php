<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>

<!-- Data Grid -->
<table id="grid-master_rollingcat"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_rollingcat">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode Category</th>
            <th data-options="field:'Category2'"             width="300" halign="center" align="left" sortable="true">Category</th>
            <th data-options="field:'Type_screw'"           width="300" halign="center" align="left" sortable="true">Type Screw</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_rollingcat = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterrollingcatCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterrollingcatUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterrollingcatHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_rollingcat').datagrid('reload');}
    }];
    
    $('#grid-master_rollingcat').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/tools/rollingcat/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function masterrollingcatCreate() {
        $('#dlg-master_rollingcat').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_rollingcat').form('clear');
        url = '<?php echo site_url('master/tools/rollingcat/create'); ?>';
    }
    
    
    function masterrollingcatUpdate() {
        var row = $('#grid-master_rollingcat').datagrid('getSelected');
        if(row){
            $('#dlg-master_rollingcat-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_rollingcat-edit').form('load',row);
            url = '<?php echo site_url('master/tools/rollingcat/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterrollingcatSave(){
        $('#fm-master_rollingcat').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_rollingcat').dialog('close');
                    $('#grid-master_rollingcat').datagrid('reload');
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
    
    function masterrollingcatSaveEdit(){
        $('#fm-master_rollingcat-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_rollingcat-edit').dialog('close');
                    $('#grid-master_rollingcat').datagrid('reload');
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
    
    function masterrollingcatHapus(){
        var row = $('#grid-master_rollingcat').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus category '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/tools/rollingcat/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_rollingcat').datagrid('reload');
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
    #fm-master_rollingcat{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_rollingcat-edit{
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

<div id="dlg-master_rollingcat" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_rollingcat">
    <form id="fm-master_rollingcat" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Category</label>
            <input type="text" id="Category" name="Category" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Type Screw</label>
            <input type="text" id="Type_screw" name="Type_screw" class="easyui-textbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_rollingcat">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterrollingcatSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_rollingcat').dialog('close')">Batal</a>
</div>

<div id="dlg-master_rollingcat-edit" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_rollingcat-edit">
    <form id="fm-master_rollingcat-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Category</label>
            <input type="text" id="Category" name="Category" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Type Screw</label>
            <input type="text" id="Type_screw" name="Type_screw" class="easyui-textbox" required="true"/>
        </div>
        
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_rollingcat-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterrollingcatSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_rollingcat-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_rollingcat.php -->
<!-- Location: ./application/views/master/v_rollingcat.php -->