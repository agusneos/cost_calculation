<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>

<!-- Data Grid -->
<table id="grid-master_typewire"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_typewire">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode Type Wire</th>
            <th data-options="field:'Type'"                 width="300" align="center" sortable="true">Nama Type Wire</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_typewire = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){mastertypewireCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){mastertypewireUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){mastertypewireHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_typewire').datagrid('reload');}
    }];
    
    $('#grid-master_typewire').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/typewire/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function mastertypewireCreate() {
        $('#dlg-master_typewire').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_typewire').form('clear');
        url = '<?php echo site_url('master/typewire/create'); ?>';
    }
    
    function mastertypewireUpdate() {
        var row = $('#grid-master_typewire').datagrid('getSelected');
        if(row){
            $('#dlg-master_typewire-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_typewire-edit').form('load',row);
            url = '<?php echo site_url('master/typewire/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function mastertypewireSave(){
        $('#fm-master_typewire').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_typewire').dialog('close');
                    $('#grid-master_typewire').datagrid('reload');
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
    
    function mastertypewireSaveEdit(){
        $('#fm-master_typewire-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_typewire-edit').dialog('close');
                    $('#grid-master_typewire').datagrid('reload');
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
    
    function mastertypewireHapus(){
        var row = $('#grid-master_typewire').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus typewire '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/typewire/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_typewire').datagrid('reload');
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
    #fm-master_typewire{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_typewire-edit{
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

<div id="dlg-master_typewire" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_typewire">
    <form id="fm-master_typewire" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama Type Wire</label>
            <input type="text" id="Type" name="Type" class="easyui-textbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_typewire">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastertypewireSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_typewire').dialog('close')">Batal</a>
</div>

<div id="dlg-master_typewire-edit" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_typewire-edit">
    <form id="fm-master_typewire-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama Type Wire</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
        
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_typewire-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastertypewireSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_typewire-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_typewire.php -->
<!-- Location: ./application/views/master/v_typewire.php -->