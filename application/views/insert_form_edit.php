<?php

?>


<div class="form-group">
    <!-- <label for="exampleInputEmail1">ref_list_id</label> -->
    <input type="text" name="ref_list_id" class="form-control" id="ref_list_id" placeholder="no" readonly>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">แนบเอกสาร</label>
    <input type="file" name="userfile"  class="form-control p-1" id="exampleInputEmail1" placeholder="no">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">เริ่มต้น</label>
    <input type="date" name="start" class="form-control" id="exampleInputEmail1" placeholder="Select date">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">สิ้นสุด</label>
    <input type="date" name="end" class="form-control" id="exampleInputEmail1" placeholder="Select date">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">วันทำงานจริง</label>
    <input type="date" name="work_start" class="form-control" id="exampleInputEmail1" placeholder="Select date">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">วันเสร็จงาน</label>
    <input type="date" name="work_end" class="form-control" id="exampleInputEmail1" placeholder="Select date">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">สถานะ</label>
    <select class="form-control form-control-sm" name="status" placeholder="select status">
        <option>Active</option>
        <option>Inactive</option>
    </select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">รายการ</label>
    <select class="form-control form-control-sm" name="list">
        <option>Small select</option>
    </select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">จำนวนเงิน</label>
    <input type="number" name="amount" min="0" class="form-control" id="exampleInputEmail1" placeholder="Amount">
</div>

