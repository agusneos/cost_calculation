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
<table id="grid-master_utility"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_utility">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                  width="100" align="center" sortable="true">Kode utility</th>
            <th data-options="field:'Name'"             width="100" halign="center" align="left" sortable="true">Nama</th>
            <th data-options="field:'Biaya_per_year'"       width="200" halign="center" formatter="price" align="left" sortable="true">Biaya per tahun</th>
            <th data-options="field:'Hasilprod_per_tahun'" width="200" align="center" formatter="price" sortable="true" >Hasil Produksi per tahun (kg)</th>     
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_utility = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterutilityCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterutilityUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterutilityHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_utility').datagrid('reload');}
    }];
    
    $('#grid-master_utility').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/process/utility/index'); ?>?grid=true'})
        .datagrid('enableFilter');
	
	function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 0, ",", ".");
    }
    
    function masterutilityCreate() {
        $('#dlg-master_utility').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_utility').form('clear');
        url = '<?php echo site_url('master/process/utility/create'); ?>';
    }
    
    function masterutilityUpdate() {
        var row = $('#grid-master_utility').datagrid('getSelected');
        if(row){
            $('#dlg-master_utility-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_utility-edit').form('load',row);
            url = '<?php echo site_url('master/process/utility/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterutilitySave(){
        $('#fm-master_utility').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_utility').dialog('close');
                    $('#grid-master_utility').datagrid('reload');
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
    
    function masterutilitySaveEdit(){
        $('#fm-master_utility-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_utility-edit').dialog('close');
                    $('#grid-master_utility').datagrid('reload');
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
    
    function masterutilityHapus(){
        var row = $('#grid-master_utility').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus utility '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/process/utility/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_utility').datagrid('reload');
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
    #fm-master_utility{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_utility-edit{
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

<div id="dlg-master_utility" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_utility">
    <form id="fm-master_utility" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Biaya per tahun</label>
           <input type="text" id="Biaya_per_year" name="Biaya_per_year" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Hasil produksi per tahun(kg)</label>
           <input type="text" id="Hasilprod_per_tahun" name="Hasilprod_per_tahun" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_utility">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterutilitySave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_utility').dialog('close')">Batal</a>
</div>

<div id="dlg-master_utility-edit" class="easyui-dialog" style="width:500px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_utility-edit">
    <form id="fm-master_utility-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Nama</label>
            <input type="text" id="Name" name="Name" class="easyui-textbox" required="true"/>
        </div>
         <div class="fitem">
            <label for="type">Biaya per tahun</label>
           <input type="text" id="Biaya_per_year" name="Biaya_per_year" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Hasil produksi per tahun</label>
           <input type="text" id="Hasilprod_per_tahun" name="Hasilprod_per_tahun" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_utility-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterutilitySaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_utility-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_utility.php -->
<!-- Location: ./application/views/master/process/v_utility.php -->