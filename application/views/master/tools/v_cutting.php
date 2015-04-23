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
<table id="grid-master_cutting"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_cutting">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"           width="100" align="center" sortable="true">Kode Cutting</th>
            <th data-options="field:'Diameter'"     width="80"  align="center" sortable="true" >Diameter</th>
            <th data-options="field:'Min_panjang'"  width="80"  align="center" sortable="true"> Min Panjang</th>
            <th data-options="field:'Max_panjang'"  width="80"  align="center" sortable="true"> Max Panjang</th>  
            <th data-options="field:'Cost'"         width="80"  align="center" sortable="true" >Cost</th>   
            <th data-options="field:'Currency'"     width="80"  align="center" sortable="true" >Currency</th>   
            <th data-options="field:'Tgl_Update'"   width="100" align="center" sortable="true" >Tanggal Update </th>
            <th data-options="field:'Active'"       width="50"  align="center" sortable="true" >Active</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_cutting = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){mastercuttingCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){mastercuttingUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){mastercuttingHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_cutting').datagrid('reload');}
    }];
    
    $('#grid-master_cutting').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/tools/cutting/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function mastercuttingCreate() {
        $('#dlg-master_cutting').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_cutting').form('clear');
        url = '<?php echo site_url('master/tools/cutting/create'); ?>';
    }
    
    
    function mastercuttingUpdate() {
        var row = $('#grid-master_cutting').datagrid('getSelected');
        if(row){
            $('#dlg-master_cutting-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_cutting-edit').form('load',row);
            url = '<?php echo site_url('master/tools/cutting/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function mastercuttingSave(){
        $('#fm-master_cutting').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_cutting').dialog('close');
                    $('#grid-master_cutting').datagrid('reload');
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
    
    function mastercuttingSaveEdit(){
        $('#fm-master_cutting-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_cutting-edit').dialog('close');
                    $('#grid-master_cutting').datagrid('reload');
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
    
    function mastercuttingHapus(){
        var row = $('#grid-master_cutting').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus category '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/tools/cutting/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_cutting').datagrid('reload');
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
    #fm-master_cutting{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_cutting-edit{
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

<div id="dlg-master_cutting" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_cutting">
    <form id="fm-master_cutting" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Diameter</label>
            <input type="text" id="Diameter" name="Diameter" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:1" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Panjang Min.</label>
            <input type="text" id="Min_panjang" name="Min_panjang" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Panjang Max.</label>
            <input type="text" id="Max_panjang" name="Max_panjang" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Cost</label>
            <input type="text" id="Cost" name="Cost" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:2" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox" data-options=" 
            url:'<?php echo site_url('master/tools/cutting/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>         
        </div>
        <div class="fitem">
             <label for="type">Tgl Update</label>
             <input id="Tgl_Update" name="Tgl_Update" class="easyui-datebox"  required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_cutting">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastercuttingSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_cutting').dialog('close')">Batal</a>
</div>

<div id="dlg-master_cutting-edit" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_cutting-edit">
    <form id="fm-master_cutting-edit" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Diameter</label>
            <input type="text" id="Diameter" name="Diameter" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Panjang Min.</label>
            <input type="text" id="Min_panjang" name="Min_panjang" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Panjang Max.</label>
            <input type="text" id="Min_panjang" name="Max_panjang" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Cost</label>
            <input type="text" id="Cost" name="Cost" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:2" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox" data-options=" 
            url:'<?php echo site_url('master/tools/cutting/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>         
        </div>
        <div class="fitem">
             <label for="type">Tgl Update</label>
             <input id="Tgl_Update" name="Tgl_Update" class="easyui-datebox"  required="true"/>
        </div>
        
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_cutting-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="mastercuttingSaveEdit()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_cutting-edit').dialog('close')">Batal</a>
</div>
<!-- End of file v_cutting.php -->
<!-- Location: ./application/views/master/tools/v_cutting.php -->