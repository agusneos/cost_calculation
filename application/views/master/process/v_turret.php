<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  
<script type="text/javascript">
    $.post('<?php echo site_url('master/process/turret/getTurret'); ?>',function(result){
            $('#Gaji').numberbox('setValue', result.Gaji);
            $('#Estimasi').numberbox('setValue', result.Estimasi);
            $('#Working_day').numberbox('setValue', result.Working_day);
            $('#Working_hour').numberbox('setValue', result.Working_hour);           
        },'json');        

 function masterturretSave(){
        var Gaji_turret = $('#Gaji').numberbox('getValue');
        var Estimasi_turret   = $('#Estimasi').numberbox('getValue');
        var Working_day_turret = $('#Working_day').numberbox('getValue');
        var Working_hour_turret= $('#Working_hour').numberbox('getValue');
        
        $.post('<?php echo site_url('master/process/turret/update'); ?>',{Gaji:Gaji_turret, Estimasi:Estimasi_turret,Working_day:Working_day_turret, Working_hour:Working_hour_turret},function(result){
            if(result.success)
            {
                $('#dlg').dialog('close');
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
      
</script>

<style type="text/css">
    #fm-master_turret{
        margin:0;
        padding:10px 30px;
    }
    .ftitle{
        font-size:14px;
        font-weight:bold;
        padding:5px 0;
        margin-bottom:100px;
        border-bottom:100px solid #ccc;
    }
    .fitem{
        margin-bottom:5px;
    }
    .fitem label{
        display:inline-block;
        width:80px;
    }
</style>

<form id="fm-master_turret" method="post" novalidate buttons="#fm-master_turret">        
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


<!-- Dialog Button -->
<div id="fm-master_turret">
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-ok" onclick="masterturretSave()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="width:75" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Batal</a>
</div>
<!-- End of file v_turret.php -->
<!-- Location: ./application/views/master/process/v_turret.php -->