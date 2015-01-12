<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-scrollview.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/easyui/datagrid-filter.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/accounting/accounting.js')?>"></script>

<!-- Data Grid -->
<table id="grid-master_heading1"
    data-options="pageSize:100, multiSort:true, remoteSort:false, rownumbers:true, singleSelect:true, 
                showFooter:false, fit:true, fitColumns:true, toolbar:toolbar_master_heading1">
    <thead>
        <tr>           
            <th data-options="field:'Id'"         width="80"  align="center" sortable="true">Id</th>
            <th data-options="field:'Category'"            width="150" align="center" sortable="true" >Category</th>            
            <th data-options="field:'Diameter'"          width="80"  align="center" sortable="true" >Diameter</th>
            <th data-options="field:'Min_panjang'"         width="80"  align="center" sortable="true"> Min Panjang</th>
            <th data-options="field:'Max_panjang'"         width="80"  align="center" sortable="true"> Max Panjang</th>  
            <th data-options="field:'Cost'"                width="80"  align="center" sortable="true" >Cost</th>   
       		<th data-options="field:'Currency'"                width="80"  align="center" sortable="true" >Currency</th>   
        	<th data-options="field:'Tgl_update'"            width="100" align="center" sortable="true" >Tanggal Update </th>
         </tr> 
    </thead>
</table>

<script type="text/javascript">
    
    var toolbar_master_heading1 = [{
        text:'Upload',
        iconCls:'icon-upload',
        handler:function(){upload();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_heading1').datagrid('reload');}
    }];
    
    $('#grid-master_heading1').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/tools/heading1/index'); ?>?grid=true'}).datagrid('enableFilter');
            
   function thousandSep(value,row,index)
    {
        if (value == 0)
        {
            return "";
        }
        else if (row.CurrencyCode == "IDR")
        {
            return accounting.formatMoney(value, "Rp. ", 0, ".", ",");
        }
        else
        {
            return accounting.formatMoney(value, "$ ", 2, ".", ",");
        }        
    }
    
    function thousandSepIDR(value,row,index)
    {
        if (value == 0)
        {
            return "";
        }        
        else
        {
            return accounting.formatMoney(value, "Rp. ", 0, ".", ",");
        }        
    }
    
    function payterm(value,row,index) {
        if (value == 0){
            return value;
        } else {
            return value +' Hari';
        }           
    }
    
    function timestamp(){
        var today   = new Date();
        var dd      = today.getDate();
        var mm      = today.getMonth()+1; //January is 0!
        var yyyy    = today.getFullYear();
        var hh      = today.getHours();
        var min     = today.getMinutes();
        var ss      = today.getSeconds();

        today = yyyy+'-'+mm+'-'+dd+' '+hh+':'+min+':'+ss;
        return today;
        
    }
    function upload()
    {
        $('#dlg-upload').dialog({modal: true}).dialog('open').dialog('setTitle','Upload File');
        $('#fm-upload').form('reset');
        urls = '<?php echo site_url('master/tools/heading1/upload'); ?>/';
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
                    $('#grid-master_heading1').datagrid('reload');
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


<!-- Dialog Form -->
<style type="text/css">
    #fm-upload{
        margin:0;
        padding:10px 30px;
    }
    #fm-updateRate{
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
        width:100px;
    }
</style>
    
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
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="uploadSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-upload').dialog('close')">Batal</a>
</div>
     
<!-- Toolbar -->


<!-- Dialog Form -->


<!-- Dialog Button -->

<!-- End of file v_heading1.php -->
<!-- Location: ./application/views/master/v_heading1.php -->