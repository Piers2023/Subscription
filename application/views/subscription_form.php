<?php 

foreach ($list_detail as $rs) extract ($rs);
?>
<fieldset>
<legend>Data Form:</legend>
<form name='data_form' method='post' autocomplete = off>
<table>
<tr>
<td>id</td>
<td><input type='text' name='id' value='<?php echo $id ?>' ></td>
</tr>
<tr>
<td>vendor_name</td>
<td><input type='text' name='vendor_name' value='<?php echo $vendor_name ?>' ></td>
</tr>
<tr>
<td>ref_list_id</td>
<td><input type='text' name='ref_list_id' value='<?php echo $ref_list_id ?>' ></td>
</tr>
<tr>
<td>start</td>
<td><input type='text' name='start' value='<?php echo $start ?>' ></td>
</tr>
<tr>
<td>end</td>
<td><input type='text' name='end' value='<?php echo $end ?>' ></td>
</tr>
<tr>
<td>doc</td>
<td><input type='text' name='doc' value='<?php echo $doc ?>' ></td>
</tr>
<tr>
<td>work_start</td>
<td><input type='text' name='work_start' value='<?php echo $work_start ?>' ></td>
</tr>
<tr>
<td>work_end</td>
<td><input type='text' name='work_end' value='<?php echo $work_end ?>' ></td>
</tr>
<tr>
<td>status</td>
<td><input type='text' name='status' value='<?php echo $status ?>' ></td>
</tr>
<tr>
<td>service_type</td>
<td><input type='text' name='service_type' value='<?php echo $service_type ?>' ></td>
</tr>
<tr>
<td>list</td>
<td><input type='text' name='list' value='<?php echo $list ?>' ></td>
</tr>
<tr>
<td>cost</td>
<td><input type='text' name='cost' value='<?php echo $cost ?>' ></td>
</tr>
<tr>
<td>product</td>
<td><input type='text' name='product' value='<?php echo $product ?>' ></td>
</tr>
<tr>
<td>amount</td>
<td><input type='text' name='amount' value='<?php echo $amount ?>' ></td>
</tr>
<tr>
<td>note</td>
<td><input type='text' name='note' value='<?php echo $note ?>' ></td>
</tr>
<tr>
<td>date_create</td>
<td><input type='text' name='date_create' value='<?php echo $date_create ?>' ></td>
</tr>
<tr>
<td>pr_number</td>
<td><input type='text' name='pr_number' value='<?php echo $pr_number ?>' ></td>
</tr>
<tr>
<td>vendor_code</td>
<td><input type='text' name='vendor_code' value='<?php echo $vendor_code ?>' ></td>
</tr>
</table>

<input class='btn btn-primary' name='submit' type='submit' value='submit'>

</form>
</fieldset>