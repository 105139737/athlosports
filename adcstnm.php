<?
$reqlevel = 3;
include("membersonly.inc.php");
$typ=$_REQUEST[typ];
?>
<script>
//
function gstinn()
{
var gstin=document.getElementById('gstin').value;
$.get('gst_pan.php?gstin='+gstin, function(data) {

var str= data;
var stra = str.split("@")
var pan = stra.shift()
var st = stra.shift()
if(gstin!='')
{
$('#pan').val(pan);
$('#fst3').val(st);
}
else
{
$('#pan').val('');
$('#fst3').val('1');
}
//$("#myselect").val(3);
}); 
}
//
   $(document).ready(function()
{

   var jQueryDatePicker2Opts =
   {
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: false,
      showAnim: 'show'
   };
    $("#gstdt").datepicker(jQueryDatePicker2Opts);
	$("#gstdt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
   });
</script>
<div class="box box-success" >
<table width="1860px" class="table table-hover table-striped table-bordered">
<tr>
<td style="text-align:right; padding-top:15px;">Customer Name:</td>
<td>
<input type="text" id="cnm3" name="cnm3" value="" class="form-control" placeholder="Please Enter Customer Name">
</td>

<td style="text-align:right; padding-top:15px;">Mobile No. :</td>
<td>
<input type="text" class="form-control" id="mob3" name="mob3" value="" placeholder="Please Enter Mobile No.">
</td>
</tr>
<tr>
<td style="text-align:right; padding-top:15px;">E-Mail ID :</td>
<td>
<input type="text" class="form-control" id="email3" name="email3" value="" placeholder="Please Enter E-Mail">
</td>

<td style="text-align:right; padding-top:15px;">GSTIN :</td>
<td>
<input type="text" class="form-control" id="gstin" name="gstin" value="" onblur="gstinn()" placeholder="Please Enter GSTIN">
</td>
</tr>
<tr>
<td style="text-align:right; padding-top:15px;">PAN No :</td>
<td>
<input type="text" class="form-control" id="pan" name="pan" value="" placeholder="Please Enter PAN No">
</td>
<td align="right" style="padding-top:15px">STATE :</td>
<td>
<select id="fst3"  name="fst3" class="form-control" >
	<?
	$sql="SELECT * FROM main_state WHERE sl>0 ORDER BY sn";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_array($result))
	{
	?>
    <option value="<?=$row['sl'];?>"<?if($row['sl']=='1'){echo 'selected';}?>><?=$row['sn'];?> - <?=$row['cd'];?></option>
  <?}?>
</select>
</td>
</tr>

<tr>
<td align="right">
GSTIN Applicable Date :
</td>
<td>
<input type="text" class="form-control" id="gstdt" name="gstdt" placeholder="Enter GSTIN Applicable Date">
</td>
<td style="text-align:right; padding-top:15px;">Address:</td>
<td colspan="3">
<input type="text" class="form-control" id="addr3" name="addr3" value="" placeholder="Please Enter Address">
</td>
</tr>
<tr>
<td colspan="4" style="text-align:center; padding-right:8px;">
<input type="button" class="btn btn-primary" id="Button1" name="Button1" value="ADD" onclick="addspnm();">
</td>
</tr>
</table>
</div>
