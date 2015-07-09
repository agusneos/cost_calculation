<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>
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
<table id="grid-master_wire"
    data-options="pageSize:50, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_wire">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                 width="100" align="center" sortable="true">Kode Wire</th>
            <th data-options="field:'Kode_Supp'"          width="100" halign="center" align="left" sortable="true">Supplier</th>
            <th data-options="field:'Grade'"              width="100" align="center" sortable="true">Grade</th>
            <th data-options="field:'Min_dia'"            width="100" align="center" sortable="true" >Minimum Diameter</th>
            <th data-options="field:'Max_dia'"            width="100" align="center" sortable="true" >Maximum Diameter</th>
            <th data-options="field:'Type'"               width="100" align="center" sortable="true">Type</th>
            <th data-options="field:'Jenis'"              width="100" align="center" sortable="true" >Jenis</th>
            <th data-options="field:'Price'"              width="100" align="center" sortable="true" >Price</th>
            <th data-options="field:'Currency'"           width="100" align="center" sortable="true">Currency</th>
            <th data-options="field:'Tgl_update'"         width="100" align="center" sortable="true" >Tanggal Update </th>
            <th data-options="field:'Active'"             width="50" align="center" sortable="true" >Active</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_wire = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterwireCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterwireUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterwireHapus();}
    },{	
	text:'Upload',
        iconCls:'icon-upload',
        handler:function(){upload();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_wire').datagrid('reload');}
    }];
    
    $('#grid-master_wire').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/wire/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 3, ",", ".");
    }
    
    function price2(value,row,index)
    { 
        return accounting.formatMoney(value, "", 2, ",", ".");
    }
    
    function masterwireCreate() {
        $('#dlg-master_wire').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_wire').form('clear');
        url = '<?php echo site_url('master/wire/create'); ?>';
    }
    
    function masterwireUpdate() {
        var row = $('#grid-master_wire').datagrid('getSelected');
        if(row){
            $('#dlg-master_wire-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_wire-edit').form('load',row);
            url = '<?php echo site_url('master/wire/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterwireSave(){
        $('#fm-master_wire').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_wire').dialog('close');
                    $('#grid-master_wire').datagrid('reload');
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
    
    function masterwireSaveEdit(){
        $('#fm-master_wire-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_wire-edit').dialog('close');
                    $('#grid-master_wire').datagrid('reload');
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
    
    function masterwireHapus(){
        var row = $('#grid-master_wire').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus Wire '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/wire/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_wire').datagrid('reload');
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

    function upload()
    {
        $('#dlg-upload').dialog({modal: true}).dialog('open').dialog('setTitle','Upload File');
        $('#fm-upload').form('reset');
        urls = '<?php echo site_url('master/wire/upload'); ?>/';
    }
    
    function uploadSave()
    {
        $('#fm-upload').form('submit',{
            url: urls,
            onSubmit: function(){   
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success)
                {
                    
                    $('#dlg-upload').dialog('close');
                    $('#grid-master_wire').datagrid('reload');
                    $.messager.show({
                            title: 'Info',
                            msg: result.total + ' ' +result.ok + ' ' + result.ng
                            });
                } 
                else 
                {
                    $.messager.show({
                    title: 'Error',
                    msg: 'Upload Data Gagal'
                });
                }
            }
        });
    }	


</script>

<style type="text/css">
    #fm-master_wire{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_wire-edit{
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

<div id="dlg-master_wire" class="easyui-dialog" style="width:500px; height:380px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_wire">
    <form id="fm-master_wire" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Supplier</label>
            <input id="Kode_Supp" name="Kode_Supp" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/getSupplier'); ?>',
                method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Grade</label>
            <input type="text" id="Grade" name="Grade" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Min Diameter</label>
            <input type="text" id="Min_dia" name="Min_dia" class="easyui-numberbox" data-options="precision:2,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Max Diameter</label>
            <input type="text" id="Max_dia" name="Max_dia" class="easyui-numberbox" data-options="precision:2,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Type Wire</label>
            <input id="Type" name="Type" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/getTypeWire'); ?>',
                method:'get', valueField:'Id', textField:'Type', panelHeight:200" style="width:152px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Jenis</label>
            <input id="Jenis" name="Jenis" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/enumJenis'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Price</label>
            <input type="text" id="Price" name="Price" class="easyui-numberbox" data-options="precision:3,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Tgl Update</label>
            <input id="Tgl_update" name="Tgl_update" class="easyui-datebox"  required="true"/>
        </div>
      </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_wire">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterwireSave();">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_wire').dialog('close');">Batal</a>
</div>

<div id="dlg-master_wire-edit" class="easyui-dialog" style="width:500px; height:380px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_wire-edit">
    <form id="fm-master_wire-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Supplier</label>
            <input id="Kode_Supp" name="Kode_Supp" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/getSupplier'); ?>',
                method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Grade</label>
            <input type="text" id="Grade" name="Grade" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Min Diameter</label>
            <input type="text" id="Min_dia" name="Min_dia" class="easyui-numberbox" data-options="precision:2,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Max Diameter</label>
            <input type="text" id="Max_dia" name="Max_dia" class="easyui-numberbox" data-options="precision:2,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Type Wire</label>
            <input id="Type" name="Type" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/getTypeWire'); ?>',
                method:'get', valueField:'Id', textField:'Type', panelHeight:200" style="width:152px;" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Jenis</label>
            <input id="Jenis" name="Jenis" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/enumJenis'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Price</label>
            <input type="text" id="Price" name="Price" class="easyui-textbox" data-options="precision:3,groupSeparator:',',decimalSeparator:'.'" required="true"/> 
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox"  data-options="
                url:'<?php echo site_url('master/wire/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Tgl Update</label>
            <input id="Tgl_update" name="Tgl_update" class="easyui-datebox"  required="true"/>
        </div>
    </form>

<!-- Dialog Button -->
<div id="dlg-buttons-master_wire-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterwireSaveEdit();">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_wire-edit').dialog('close');">Batal</a>
</div>

<div id="dlg-upload" class="easyui-dialog" style="width:400px; height:150px; padding: 10px 20px" closed="true" buttons="#dlg_buttons-upload">
    <form id="fm-upload" method="post" enctype="multipart/form-data" novalidate>       
        <div class="fitem">
            <label for="type">File</label>
            <input id="file" name="file" class="easyui-filebox" required="true"/>
        </div> 
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg_buttons-upload">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="uploadSave();">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-upload').dialog('close');">Batal</a>
</div>
<!-- End of file v_wire.php -->
<!-- Location: ./application/views/master/v_wire.php -->