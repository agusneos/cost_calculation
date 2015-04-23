<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/accounting/accounting.js')?>"></script>

<script type="text/javascript">
    $.extend($.fn.datebox.defaults,{
        formatter:function(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        },
        parser:function(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
    });
	</script>
    
<!-- Data Grid -->
<table id="grid-master_assembly"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_assembly">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode assembly</th>
            <th data-options="field:'Kode_Supp'"                 width="100" halign="center" align="left" sortable="true">Supplier</th>
            <th data-options="field:'Name'"                 width="200" halign="center" align="left" sortable="true">Nama assembly</th>
            <th data-options="field:'Price'"            width="100" align="center" formatter="price" sortable="true" >Price</th>
            <th data-options="field:'Currency'"              width="100" align="center" sortable="true">Currency</th>
            <th data-options="field:'Tgl_update'"            width="100" align="center" sortable="true" >Tanggal Update </th>
            <th data-options="field:'Active'"              width="50" align="center" sortable="true" >Active</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_assembly = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterassemblyCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterassemblyUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterassemblyHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_assembly').datagrid('reload');}
    }];
    
    $('#grid-master_assembly').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/process/assembly/index'); ?>?grid=true'})
        .datagrid('enableFilter');
	
	function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 6, ",", ".");
    }
    
    function masterassemblyCreate() {
        $('#dlg-master_assembly').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_assembly').form('clear');
        url = '<?php echo site_url('master/process/assembly/create'); ?>';
    }
    
    function masterassemblyUpdate() {
        var row = $('#grid-master_assembly').datagrid('getSelected');
        if(row){
            $('#dlg-master_assembly-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_assembly-edit').form('load',row);
            url = '<?php echo site_url('master/process/assembly/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterassemblySave(){
        $('#fm-master_assembly').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_assembly').dialog('close');
                    $('#grid-master_assembly').datagrid('reload');
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
    
    function masterassemblySaveEdit(){
        $('#fm-master_assembly-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_assembly-edit').dialog('close');
                    $('#grid-master_assembly').datagrid('reload');
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
    
    function masterassemblyHapus(){
        var row = $('#grid-master_assembly').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus assembly '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/process/assembly/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_assembly').datagrid('reload');
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

</script>

<style type="text/css">
    #fm-master_assembly{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_assembly-edit{
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

<div id="dlg-master_assembly" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_assembly">
    <form id="fm-master_assembly" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Supplier</label>
            <input id="Kode_Supp" name="Kode_Supp" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/process/assembly/getSupplier'); ?>',
                method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Nama assembly</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Price</label>
           <input type="text" id="Price" name="Price" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox" data-options=" 
            url:'<?php echo site_url('master/process/assembly/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
           
        </div>
        <div class="fitem">
            <label for="type">Tgl Update</label>
            <input id="Tgl_update" name="Tgl_update" class="easyui-datebox"  required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_assembly">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterassemblySave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_assembly').dialog('close')">Batal</a>
</div>

<div id="dlg-master_assembly-edit" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_assembly-edit">
    <form id="fm-master_assembly-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Supplier</label>
            <input id="Kode_Supp" name="Kode_Supp" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/process/assembly/getSupplier'); ?>',
                method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Nama assembly</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Price</label>
            <input type="text" id="Price" name="Price" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox" data-options=" 
            url:'<?php echo site_url('master/process/assembly/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
           
        </div>
        <div class="fitem">
            <label for="type">Tgl Update</label>
            <input id="Tgl_update" name="Tgl_update" class="easyui-datebox"  required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_assembly-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterassemblySaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_assembly-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_assembly.php -->
<!-- Location: ./application/views/master/process/v_assembly.php -->