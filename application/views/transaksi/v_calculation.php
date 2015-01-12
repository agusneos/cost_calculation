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
     
   <table id="grid-transaksi_calculation"
    data-options="pageSize:50, rownumbers:true, singleSelect:true, fit:true, fitColumns:false, toolbar:toolbar_transaksi_calculation">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true" ></th>
            <th data-options="field:'Id'"                   width="100" align="center" sortable="true">Kode Calculation</th>
            <th data-options="field:'Tanggal'"                 width="100" halign="center" sortable="true">Tanggal</th>
            <th data-options="field:'Customer'"              width="100" align="center" sortable="true">Customer</th>
            <th data-options="field:'Customer_code'"            width="100" align="center" sortable="true" >Customer Code
            <th data-options="field:'Saga_code'"                  width="100" align="center" sortable="true" >Saga Code</th>
            <th data-options="field:'Quantity'"                  width="100" align="center" sortable="true" >Quantity</th>
            <th data-options="field:'Dia_wire'"                  width="100" align="center" sortable="true" >Diameter Wire</th>
            <th data-options="field:'Kode_wire'"                  width="100" align="center" sortable="true" >Kode Wire</th>
            <th data-options="field:'Net_weight'"                  width="100" align="center" sortable="true" >Net Weight</th>
        </tr>
    </thead>
</table>

 <script type="text/javascript">
    var toolbar_transaksi_calculation = [{
        text:'New',
        iconCls:'icon-new_file',
        handler:function(){transaksicalculationCreate();}
    },{
        text:'Edit',
        iconCls:'icon-edit',
        handler:function(){transaksicalculationUpdate();}
    },{
        text:'Delete',
        iconCls:'icon-cancel',
        handler:function(){transaksicalculationHapus();}
    },{
        text:'Refresh',
        iconCls:'icon-reload',
        handler:function(){$('#grid-transaksi_calculation').datagrid('reload');}
    },{
        text:'Session Data',
        iconCls:'icon-time',
        handler:function(){transaksicalculationSesData();}
    }];
	$('#grid-transaksi_calculation').datagrid({view:scrollview,remoteFilter:true,
        url:'<?php echo site_url('transaksi/calculation/index'); ?>?grid=true'})
        .datagrid('enableFilter');
    
    function transaksicalculationCreate() {		
        $('#dlg-transaksi_calculation').dialog({modal: true}).dialog('open').dialog('setTitle','Tambah Data');
        $('#fm-transaksi_calculation').form('clear');
        url = '<?php echo site_url('transaksi/calculation/create'); ?>';
        
        $('#Dia_wire').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                //$('#Kode_wire').next().find('input').focus();
                $('#bta').focus();
            }
        });
        
        $('#bta').keyup(function(e){
            if (e.keyCode == 13){                
                diameter();
                $('#Kode_wire').next().find('input').focus();                
            }
        });
        
        $.post('<?php echo site_url('transaksi/calculation/getSesData'); ?>',function(result){
            $('#Exch_rate').numberbox('setValue', result.Exch_rate);
            $('#Scrap').numberbox('setValue', result.Scrap);
        },'json'); //ambil session data        

        $('#Net_weight').numberbox('textbox').keypress(function(e){
            if (e.keyCode == 13){                
                $('#Gross_weight').next().find('input').focus();
                //var nw = $('#Net_weight').numberbox('getValue');
                //alert(nw);
            }
        });
        $('#Gross_weight').numberbox('textbox').keyup(function(e){
            if (e.keyCode == 13){                
                //$('#Net_weight').next().find('input').focus();
                var nw = $('#Net_weight').numberbox('getValue');
                var sc = $('#Scrap').numberbox('getValue');
                var pctsc = eval(sc) / 100;
                var gw  = (1 + eval(pctsc)) * eval(nw);
                $('#Gross_weight').numberbox('setValue', gw);
                
                var cur = $('#Currency').textbox('getValue');
                var prc = $('#Price').numberbox('getValue');
                var exc = $('#Exch_rate').numberbox('getValue');
                if (cur == 'USD')
                {
                    var mc = eval(gw) * eval(prc) * eval(exc) / 1000;
                }
                else
                {
                    var mc = eval(gw) * eval(prc) / 1000;
                }
                $('#Material_cost').numberbox('setValue', mc);
            }
        });
        
    }
    
    function transaksicalculationUpdate() {
        var row = $('#grid-transaksi_calculation').datagrid('getSelected');
        if(row){
            $('#dlg-transaksi_calculation-edit').dialog({modal: true}).dialog('open').dialog('setTitle','Edit Data');
            $('#fm-transaksi_calculation-edit').form('load',row);
            url = '<?php echo site_url('transaksi/calculation/update'); ?>/' + row.Id;            
        }
        else
        {
             $.messager.alert('Info','Data belum dipilih !','info');
        }
    }
    
    function transaksicalculationSave(){
        $('#fm-transaksi_calculation').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-transaksi_calculation').dialog('close');
                    $('#grid-transaksi_calculation').datagrid('reload');
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
    
    function transaksicalculationSaveEdit(){
        $('#fm-transaksi_calculation-edit').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if(result.success){
                    $('#dlg-transaksi_calculation-edit').dialog('close');
                    $('#grid-transaksi_calculation').datagrid('reload');
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
    
    function transaksicalculationHapus(){
        var row = $('#grid-transaksi_calculation').datagrid('getSelected');
        if (row){
            $.messager.confirm('Konfirmasi','Anda yakin ingin menghapus calculation '+row.Name+' ?',function(r){
                if (r){
                    $.post('<?php echo site_url('transaksi/calculation/delete'); ?>',{Id:row.Id},function(result){
                        if (result.success){
                            $('#grid-transaksi_calculation').datagrid('reload');
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
    
    function transaksicalculationSesData()
    {
        $('#dlg-transaksi_calculation_sesdata').dialog({modal: true}).dialog('open').dialog('setTitle','Ubah Session Data');
        $('#fm-transaksi_calculation_sesdata').form('clear');
        $.post('<?php echo site_url('transaksi/calculation/getSesData'); ?>',function(result){
            $('#ScrapSesData').numberbox('setValue', result.Scrap);
            $('#Exch_rateSesData').numberbox('setValue', result.Exch_rate);
            },'json');
    }
    
    function transaksicalculationSesDataSave()
    {
        var ScrapSesData        = $('#ScrapSesData').numberbox('getValue');
        var Exch_rateSesData    = $('#Exch_rateSesData').numberbox('getValue');
        
        $.post('<?php echo site_url('transaksi/calculation/updateSesData'); ?>',{Scrap:ScrapSesData, Exch_rate:Exch_rateSesData},function(result){
            if(result.success)
            {
                $('#dlg-transaksi_calculation_sesdata').dialog('close');
                $.messager.show({
                    title: 'Info',
                    msg: 'Ubah Data Berhasil'
                });
            }
            else
            {
                $.messager.show({
                    title: 'Error',
                    msg: 'Ubah Data Gagal'
                });
            }
        },'json');
    }
    
    function diameter()
    {
        var dia = $('#Dia_wire').textbox('getValue');
           
        $('#Kode_wire').combogrid({
            panelWidth:300,
            idField:'wId',
            textField:'Grade',
            url:'<?php echo site_url('transaksi/calculation/getWireCode'); ?>/' + eval(dia),
            columns:[[
                {field:'wId',title:'Id',width:50},
                {field:'Kode_Supp',title:'Kode Supplier',width:75},
                {field:'Grade',title:'Grade',width:75},
                {field:'Name',title:'Type',width:75},
            ]],
            onSelect: function (rowIndex, rowData) {
                var g = $('#Kode_wire').combogrid('grid');	// get datagrid object
                var r = g.datagrid('getSelected');	// get the selected row
                //alert(r.Price);
                $('#Price').numberbox('setValue', r.Price);
                $('#Currency').textbox('setValue', r.Currency);
                $('#Net_weight').next().find('input').focus();
            }
        });        
    }
	
 </script>



<!-- ----------- -->
<div id="dlg-transaksi_calculation" class="easyui-dialog" style="width:500px; height:400px;" closed="true" buttons="#dlg-buttons-transaksi_calculation">
    <form id="fm-transaksi_calculation" method="post" novalidate>        
        <div class="easyui-tabs" style="width:485px;height:325px">
            <div title="About" style="padding:10px">
                <div class="fitem">
                    <label for="type">Tanggal</label>
                    <input id="Tanggal" name="Tanggal" class="easyui-datebox"  required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Customer</label>
                    <input id="Customer" name="Customer" class="easyui-combobox"  data-options="
                        url:'<?php echo site_url('transaksi/calculation/getCustomer'); ?>',
                        method:'get', valueField:'Id', textField:'Name', panelHeight:200" style="width:300px;" required="true"/> 
                </div>
                <div class="fitem">
                    <label for="type">Customer Code</label>
                    <input type="text" id="Customer_code" name="Customer_code" class="easyui-textbox" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Saga Code</label>
                    <input type="text" id="Saga_code" name="Saga_code" class="easyui-textbox" required="true"/>
                </div>   
                <div class="fitem">
                    <label for="type">Quantity</label>
                    <input type="text" id="Quantity" name="Quantity" class="easyui-numberbox" required="true"/>
                </div>   
            </div>
            
            
            <div title="Material" style="padding:10px">
                <div class="fitem">
                    <label for="type">Diameter Wire</label>
                    <input type="text" id="Dia_wire" name="Dia_wire" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" required="true"/>
                    <a id="bta" href="javascript:diameter()" class="easyui-linkbutton" iconCls="icon-reload" plain="true" 
                        onclick=""></a>
                </div>                                
                <div class="fitem">
                    <label for="type">Kode Wire</label>
                    <input id="Kode_wire" name="Kode_wire" class="easyui-combogrid" />                    
                </div>
                <div class="fitem">
                    <label for="type">Net Weight</label>
                    <input type="text" id="Net_weight" name="Net_weight" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:','" required="true"/>
                </div>
                <div class="fitem">
                    <label for="type">Scrap</label>
                    <input type="text" id="Scrap" name="Scrap" class="easyui-numberbox" data-options="precision:0,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Gross Weight</label>
                    <input type="text" id="Gross_weight" name="Gross_weight" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Price</label>
                    <input type="text" id="Price" name="Price" class="easyui-numberbox" data-options="precision:3, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>
                <div class="fitem">
                    <label for="type">Currency</label>
                    <input type="text" id="Currency" name="Currency" class="easyui-textbox" data-options="readonly: true"/>
                </div> 
                <div class="fitem">
                    <label for="type">Exchange Rate</label>
                    <input type="text" id="Exch_rate" name="Exch_rate" class="easyui-numberbox" data-options="precision:0, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
                </div>                
                <div class="fitem">
                    <label for="type">Material Cost</label>
                    <input type="text" id="Material_cost" name="Material_cost" class="easyui-numberbox" data-options="precision:2,groupSeparator:'.',decimalSeparator:',', readonly: true"/>
                </div>
            </div>
            
            
           <div title="Purchased" style="padding:10px">
             <div class="fitem">
                    <label for="type">Washer1</label>
                    <input id="Washer1" name="Washer1" class="easyui-combobox"  data-options="
                        url:'<?php echo site_url('transaksi/calculation/getWasher1'); ?>',
                        method:'get', valueField:'Id', textField:'Name', panelHeight:200,
                        onSelect: function(r){
                            $('#Washer1_weight').numberbox('setValue', r.Weight);
                            $('#Washer1_currency').textbox('setValue', r.Currency);
                            $('#Washer1_price').numberbox('setValue', r.Price);
                        }" style="width:300px;"/> 
             </div>
             <div class="fitem">
                    <label for="type">Washer1 Weight</label>
                    <input id="Washer1_weight" name="Washer1_weight" class="easyui-numberbox" data-options="precision:2, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
             </div>
              <div class="fitem">
                    <label for="type">Washer1 Curr. </label>
                    <input id="Washer1_currency" name="Washer1_currency" class="easyui-textbox" data-options="readonly: true"/>
             </div> 
              <div class="fitem">
                    <label for="type">Washer1 Price</label>
                    <input id="Washer1_price" name="Washer1_price" class="easyui-numberbox" data-options="precision:5, groupSeparator:'.', decimalSeparator:',', readonly: true"/>
             </div>
            </div>
            <div title="Processing" style="padding:10px">
                   
            </div>
        </div>
    </form>
</div>

<!-- Dialog Button -->
<div id="dlg-buttons-transaksi_calculation">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="transaksicalculationSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-transaksi_calculation').dialog('close')">Batal</a>
</div>

<!-- Dialog Session Data -->
<div id="dlg-transaksi_calculation_sesdata" class="easyui-dialog" style="width:400px; height:200px; padding: 10px 20px" closed="true" buttons="#dlg-buttons-transaksi_calculation_sesdata">
    <form id="fm-transaksi_calculation_sesdata" method="post" novalidate>
        <div class="fitem">
            <label for="type">Scrap</label>
            <input id="ScrapSesData" name="ScrapSesData" class="easyui-numberbox" required="true"/>
        </div>
        <div class="fitem">
            <label for="type">Exch. Rate</label>
            <input id="Exch_rateSesData" name="Exch_rateSesData" class="easyui-numberbox" required="true"/>
        </div>
    </form>
</div>

<!-- Dialog Button Session Data -->
<div id="dlg-buttons-transaksi_calculation_sesdata">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="transaksicalculationSesDataSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg-transaksi_calculation_sesdata').dialog('close')">Batal</a>
</div>

<!-- End of file v_calculation.php -->
<!-- Location: ./application/views/transaksi/v_calculation.php -->       
 
    