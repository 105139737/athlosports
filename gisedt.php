<?php
$sl=$_REQUEST['sl'];
$fn=$_REQUEST['fn'];
$fv=rawurldecode($_REQUEST['fv']);
$div=$_REQUEST['div'];
$tblnm=$_REQUEST['tblnm'];

?>
<input type="text"  value="<? echo $fv;?>"  id="tb" name="tb" onblur="edt1('<?=$sl;?>','<?=$fn;?>',this.value,'<?=$div;?>','<?=$tblnm;?>')" style="color:red" class="form-control">
<script>
document.getElementById('tb').focus();
</script>