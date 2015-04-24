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
<table id="grid-master_turret"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_turret">
    <thead>
        <tr>
            <th data-options="field:'Gaji'"                width="100" align="center" formatter="price" sortable="true">Gaji</th>
            <th data-options="field:'Estimasi'"            width="100" halign="center" align="left" sortable="true">Estimasi</th>
            <th data-options="field:'Working_day'"         width="200" halign="center" align="left" sortable="true">Working day</th>
            <th data-options="field:'Working_hour'"        width="200" align="center"  sortable="true" >Working hour</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_turret = [{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterturretUpdate();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_turret').datagrid('reload');}
    }];
    
    $('#grid-master_turret').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/process/turret/index'); ?>?grid=true'})
        .datagrid('enableFilter');
	
	function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 0, ",", ".");
    }
    
      
    function masterturretUpdate() {
        var row = $('#grid-master_turret').datagrid('getSelected');
        if(row){
            $('#dlg-master_turret-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_turret-edit').form('load',row);
            url = '<?php echo site_url('master/process/turret/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterturretSave(){
        $('#fm-master_turret').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_turret').dialog('close');
                    $('#grid-master_turret').datagrid('reload');
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
    
    function masterturretSaveEdit(){
        $('#fm-master_turret-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_turret-edit').dialog('close');
                    $('#grid-master_turret').datagrid('reload');
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
    
    function masterturretHapus(){
        var row = $('#grid-master_turret').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus turret '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/process/turret/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_turret').datagrid('reload');
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
    #fm-master_turret{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_turret-edit{
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

<div id="dlg-master_turret" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_turret">
    <form id="fm-master_turret" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Process</label>
            <input type="text" id="Process" name="Process" class="easyui-textbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Gaji per tahun</label>
           <input type="text" id="Gaji_per_year" name="Gaji_per_year" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Hasil produksi per tahun(kg)</label>
           <input type="text" id="Hasilprod_per_tahun" name="Hasilprod_per_tahun" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Jumlah turret</label>
           <input type="text" id="Jumlah_turret" name="Jumlah_turret" class="easyui-numberbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_turret">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterturretSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_turret').dialog('close')">Batal</a>
</div>

<div id="dlg-master_turret-edit" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_turret-edit">
    <form id="fm-master_turret-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Gaji</label>
            <input type="text" id="Gaji" name="Gaji" class="easyui-numberbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Estimasi</label>
           <input type="text" id="Estimasi" name="Estimasi" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Working day</label>
           <input type="text" id="Working_day" name="Working_day" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Working_hour</label>
           <input type="text" id="Working_hour" name="Working_hour" class="easyui-numberbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_turret-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterturretSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_turret-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_turret.php -->
<!-- Location: ./application/views/master/process/v_turret.php -->