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
<table id="grid-master_heading4"
    data-options="pageSize:30, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_master_heading4">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                  width="100" align="center" sortable="true">Kode</th>
            <th data-options="field:'Type_screw'"          width="100" align="center" align="left" sortable="true">Type screw</th>
            <th data-options="field:'Diameter_nominal'"    width="100" align="center" align="left" sortable="true">Diameter nominal</th>
            <th data-options="field:'HD_Price'"            width="100" align="center" formatter="price" sortable="true" >HD Price</th>
            <th data-options="field:'HD_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >HD Lifetime</th>
            <th data-options="field:'HDI_Price'"           width="100" align="center" formatter="price" sortable="true" >HDI Price</th>
            <th data-options="field:'HDI_Lifetime'"        width="100" align="center" formatter="price2" sortable="true" >HDI Lifetime</th>
            <th data-options="field:'HDP_Price'"           width="100" align="center" formatter="price" sortable="true" >HDP Price</th>
            <th data-options="field:'HDP_Lifetime'"        width="100" align="center" formatter="price2" sortable="true" >HDP Lifetime</th>
            <th data-options="field:'HDC_Price'"           width="100" align="center" formatter="price" sortable="true" >HDC Price</th>
            <th data-options="field:'HDC_Lifetime'"        width="100" align="center" formatter="price2" sortable="true" >HDC Lifetime</th>
            <th data-options="field:'HR_Price'"            width="100" align="center" formatter="price" sortable="true" >HR Price</th>
            <th data-options="field:'HR_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >HR Lifetime</th>
            <th data-options="field:'S_Price'"             width="100" align="center" formatter="price" sortable="true" >Snap Price</th>
            <th data-options="field:'S_Lifetime'"          width="100" align="center" formatter="price2" sortable="true" >Snap Lifetime</th>
            <th data-options="field:'SP_Price'"            width="100" align="center" formatter="price" sortable="true" >SP Price</th>
            <th data-options="field:'SP_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >SP Lifetime</th>
            <th data-options="field:'SC_Price'"            width="100" align="center" formatter="price" sortable="true" >SC Price</th>
            <th data-options="field:'SC_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >SC Lifetime</th>
            <th data-options="field:'SB_Price'"            width="100" align="center" formatter="price" sortable="true" >SB Price</th>
            <th data-options="field:'SB_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >SB Lifetime</th>
            <th data-options="field:'CD_Price'"            width="100" align="center" formatter="price" sortable="true" >CD Price</th>
            <th data-options="field:'CD_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >CD Lifetime</th>
            <th data-options="field:'CK_Price'"            width="100" align="center" formatter="price" sortable="true" >CK Price</th>
            <th data-options="field:'CK_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >CK Lifetime</th>
            <th data-options="field:'P_Price'"             width="100" align="center" formatter="price" sortable="true" >Punch Price</th>
            <th data-options="field:'P_Lifetime'"          width="100" align="center" formatter="price2" sortable="true" >Punch Lifetime</th>
            <th data-options="field:'SPu_Price'"           width="100" align="center" formatter="price" sortable="true" >SPu Price</th>
            <th data-options="field:'SPu_Lifetime'"        width="100" align="center" formatter="price2" sortable="true" >SPu Lifetime</th>
            <th data-options="field:'PP_Price'"            width="100" align="center" formatter="price" sortable="true" >PP Price</th>
            <th data-options="field:'PP_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >PP Lifetime</th>
            <th data-options="field:'PC_Price'"            width="100" align="center" formatter="price" sortable="true" >PC Price</th>
            <th data-options="field:'PC_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >PC Lifetime</th>
            <th data-options="field:'PB_Price'"            width="100" align="center" formatter="price" sortable="true" >PB Price</th>
            <th data-options="field:'PB_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >PB Lifetime</th>
            <th data-options="field:'TR_Price'"            width="100" align="center" formatter="price" sortable="true" >TR Price</th>
            <th data-options="field:'TR_Lifetime'"         width="100" align="center" formatter="price2" sortable="true" >TR Lifetime</th>
            <th data-options="field:'SSCoak_Price'"        width="100" align="center" formatter="price" sortable="true" >SS Coak Price</th>
            <th data-options="field:'SSCoak_Lifetime'"     width="100" align="center" formatter="price2" sortable="true" >SS Coak Lifetime</th>
            <th data-options="field:'SSNoCoak_Price'"      width="100" align="center" formatter="price" sortable="true" >SS No Coak Price</th>
            <th data-options="field:'SSNoCoak_Lifetime'"   width="100" align="center" formatter="price2" sortable="true" >SS No Coak Lifetime</th>
            <th data-options="field:'Price_pcs'"           width="100" align="center" formatter="price" sortable="true" >Price per pcs</th>
            <th data-options="field:'Currency'"            width="100" align="center" sortable="true">Currency</th>
            <th data-options="field:'Tgl_update'"          width="100" align="center" sortable="true" >Tanggal Update</th>
            <th data-options="field:'Active'"              width="50" align="center" sortable="true" >Active</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
    var toolbar_master_heading4 = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){masterheading4Create();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){masterheading4Update();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){masterheading4Hapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-master_heading4').datagrid('reload');}
    }];
    
    $('#grid-master_heading4').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('master/tools/heading4/index'); ?>?grid=true'})
        .datagrid('enableFilter');
	
	function price(value,row,index)
    { 
        return accounting.formatMoney(value, "", 6, ",", ".");
    }
        function price2(value,row,index)
    { 
        return accounting.formatMoney(value, "", 0, ",", ".");
    }
        
    function masterheading4Create() {
        $('#dlg-master_heading4').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-master_heading4').form('clear');
        url = '<?php echo site_url('master/tools/heading4/create'); ?>';
        
        $('#SSNoCoak_Lifetime').numberbox('textbox').keypress(function(e) {
            if (e.keyCode == 13) {
                var hdp = $('#HD_Price').numberbox('getValue');
                var hdl = $('#HD_Lifetime').numberbox('getValue');
                var hdip = $('#HDI_Price').numberbox('getValue');
                var hdil = $('#HDI_Lifetime').numberbox('getValue');
                var hdpp = $('#HDP_Price').numberbox('getValue');
                var hdpl = $('#HDP_Lifetime').numberbox('getValue');
                var hdcp = $('#HDC_Price').numberbox('getValue');
                var hdcl = $('#HDC_Lifetime').numberbox('getValue');
                var hrp = $('#HR_Price').numberbox('getValue');
                var hrl = $('#HR_Lifetime').numberbox('getValue');
                var sp = $('#S_Price').numberbox('getValue');
                var sl = $('#S_Lifetime').numberbox('getValue');
                var spp = $('#SP_Price').numberbox('getValue');
                var spl = $('#SP_Lifetime').numberbox('getValue');
                var scp = $('#SC_Price').numberbox('getValue');
                var scl = $('#SC_Lifetime').numberbox('getValue');
                var sbp = $('#SB_Price').numberbox('getValue');
                var sbl = $('#SB_Lifetime').numberbox('getValue');
                var cdp = $('#CD_Price').numberbox('getValue');
                var cdl = $('#CD_Lifetime').numberbox('getValue');
                var ckp = $('#CK_Price').numberbox('getValue');
                var ckl = $('#CK_Lifetime').numberbox('getValue');
                var pp = $('#P_Price').numberbox('getValue');
                var pl = $('#P_Lifetime').numberbox('getValue');
                var spup = $('#SPu_Price').numberbox('getValue');
                var spul = $('#SPu_Lifetime').numberbox('getValue');
                var ppp = $('#PP_Price').numberbox('getValue');
                var ppl = $('#PP_Lifetime').numberbox('getValue');
                var pcp = $('#PC_Price').numberbox('getValue');
                var pcl = $('#PC_Lifetime').numberbox('getValue');
                var pbp = $('#PB_Price').numberbox('getValue');
                var pbl = $('#PB_Lifetime').numberbox('getValue');
                var trp = $('#TR_Price').numberbox('getValue');
                var trl = $('#TR_Lifetime').numberbox('getValue');
                var sscp = $('#SSCoak_Price').numberbox('getValue');
                var sscl = $('#SSCoak_Lifetime').numberbox('getValue');
                var ssncp = $('#SSNoCoak_Price').numberbox('getValue');
                var ssncl = $('#SSNoCoak_Lifetime').numberbox('getValue');
                var ppcs = eval(hdp/hdl)+ eval(hdip/hdil)+ eval(hdpp/hdpl)+eval(hdcp/hdcl)+
                           eval(hrp/hrl)+eval(sp/sl)+eval(spp/spl)+eval(scp/scl)+
                           eval(sbp/sbl)+eval(cdp/cdl)+eval(ckp/ckl)+eval(pp/pl)+
                           eval(spup/spul)+eval(ppp/ppl)+eval(pcp/pcl)+
                           eval(pbp/pbl)+ eval(trp/trl)+eval(sscp/sscl)+eval(ssncp/ssncl);  
            $('#Price_pcs').numberbox('setValue', ppcs); 
            }
        });
    }
    
    function masterheading4Update() {
        var row = $('#grid-master_heading4').datagrid('getSelected');
        if(row){
            $('#dlg-master_heading4').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-master_heading4').form('load',row);
            url = '<?php echo site_url('master/tools/heading4/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function masterheading4Save(){
        $('#fm-master_heading4').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-master_heading4').dialog('close');
                    $('#grid-master_heading4').datagrid('reload');
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
    
    
    function masterheading4Hapus(){
        var row = $('#grid-master_heading4').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus heading4 '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('master/tools/heading4/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-master_heading4').datagrid('reload');
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
    #fm-master_heading4{
        margin:0;
        padding:10px 30px;
    }
     #fm-master_heading4-edit{
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

<div id="dlg-master_heading4" class="easyui-dialog" style="width:550px; height:550px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-master_heading4">
    <form id="fm-master_heading4" method="post" novalidate>        
        <div class="fitem">
            <label for="type">Type Screw</label>
            <input type="text" id="Type_screw" name="Type_screw" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Dia. Nominal</label>
            <input type="text" id="Diameter_nominal" name="Diameter_nominal" class="easyui-textbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Heading Dies</label>
            <input type="text" id="HD_Price" name="HD_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="HD_Lifetime" name="HD_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">HD Inner</label>
            <input type="text" id="HDI_Price" name="HDI_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="HDI_Lifetime" name="HDI_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Heading Die Pin</label>
            <input type="text" id="HDP_Price" name="HDP_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="HDP_Lifetime" name="HDP_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">HD Case</label>
            <input type="text" id="HDC_Price" name="HDC_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6"required="true" />
            <input type="text" id="HDC_Lifetime" name="HDC_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0"required="true" />
         </div>
        <div class="fitem">
            <label for="type">Head Ring</label>
            <input type="text" id="HR_Price" name="HR_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="HR_Lifetime" name="HR_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Snap</label>
            <input type="text" id="S_Price" name="S_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true" />
            <input type="text" id="S_Lifetime" name="S_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Snap Pin</label>
            <input type="text" id="SP_Price" name="SP_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6"required="true" />
            <input type="text" id="SP_Lifetime" name="SP_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">Snap Case</label>
            <input type="text" id="SC_Price" name="SC_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true" />
            <input type="text" id="SC_Lifetime" name="SC_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true" />
        </div>
        <div class="fitem">
            <label for="type">Snap Base</label>
            <input type="text" id="SB_Price" name="SB_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="SB_Lifetime" name="SB_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0"required="true" />
         </div>
        <div class="fitem">
            <label for="type">Cut Off Die</label>
            <input type="text" id="CD_Price" name="CD_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true" />
            <input type="text" id="CD_Lifetime" name="CD_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Cut Off Knife</label>
            <input type="text" id="CK_Price" name="CK_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="CK_Lifetime" name="CK_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">Punch</label>
            <input type="text" id="P_Price" name="P_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="P_Lifetime" name="P_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Second Punch</label>
            <input type="text" id="SPu_Price" name="SPu_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="SPu_Lifetime" name="SPu_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Punch Pin</label>
            <input type="text" id="PP_Price" name="PP_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="PP_Lifetime" name="PP_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Punch Case</label>
            <input type="text" id="PC_Price" name="PC_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="PC_Lifetime" name="PC_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">Punch Base</label>
            <input type="text" id="PB_Price" name="PB_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="PB_Lifetime" name="PB_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">Trimming</label>
            <input type="text" id="TR_Price" name="TR_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="TR_Lifetime" name="TR_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">SS Coak</label>
            <input type="text" id="SSCoak_Price" name="SSCoak_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="SSCoak_Lifetime" name="SSCoak_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">SS No Coak</label>
            <input type="text" id="SSNoCoak_Price" name="SSNoCoak_Price" class="easyui-numberbox" data-options="prompt:'Price', groupSeparator:',',decimalSeparator:'.', precision:6" required="true"/>
            <input type="text" id="SSNoCoak_Lifetime" name="SSNoCoak_Lifetime" class="easyui-numberbox" data-options="prompt:'Lifetime', groupSeparator:',',decimalSeparator:'.', precision:0" required="true"/>
         </div>
        <div class="fitem">
            <label for="type">Price per pcs</label>
            <input type="text" id="Price_pcs" name="Price_pcs" class="easyui-numberbox" data-options="groupSeparator:',',decimalSeparator:'.', precision:6" readonly="true"/>            
        </div>
        <div class="fitem">
            <label for="type">Currency</label>
            <input id="Currency" name="Currency" class="easyui-combobox" data-options=" 
            url:'<?php echo site_url('master/tools/heading4/enumCurrency'); ?>',
                method:'get', valueField:'data', textField:'data', panelHeight:'auto'" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Tgl Update</label>
            <input id="Tgl_update" name="Tgl_update" class="easyui-datebox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-master_heading4">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterheading4Save()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-master_heading4').dialog('close')">Batal</a>
</div>

<!-- End of file v_heading4.php -->
<!-- Location: ./application/views/master/tools/v_heading4.php -->