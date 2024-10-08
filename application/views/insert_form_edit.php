<?php

?>


<div class="form-group">
    <!-- <label for="exampleInputEmail1">ref_list_id</label> -->
    <input type="hidden" name="ref_list_id" class="form-control" id="ref_list_id" placeholder="no" readonly>
</div>



<div class="row border rounded m-2 p-2">
    ` <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">เริ่มต้น</label>
            <input type="date" name="start" class="form-control" id="exampleInputEmail1" placeholder="Select date">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">สิ้นสุด</label>
            <input type="date" name="end" class="form-control" id="exampleInputEmail1" placeholder="Select date">
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">วันทำงานจริง</label>
            <input type="date" name="work_start" class="form-control" id="exampleInputEmail1" placeholder="Select date">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">วันเสร็จงาน</label>
            <input type="date" name="work_end" class="form-control" id="exampleInputEmail1" placeholder="Select date">
        </div>
    </div>
</div>

<div class="row border rounded m-2 p-2">
    <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">รายการ</label>
            <select class="form-control form-control-sm" name="list">
                <option value="" hidden>Please select....</option>
                <option>Hardware</option>
                <option>Software</option>
                <option>Maintenance</option>
                <option>Machine</option>
            </select>
        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">สินค้า</label>
            <div class="input-group">
            <input type="text" name="product" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Product">
            <input type="number" name="amount" min="1" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="จำนวน">
            </div>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">สถานะ</label>
            <select class="form-control form-control-sm" name="status" placeholder="select status">
                <option value="" hidden>Please select....</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">ประเภทการบริการ</label>
            <select class="form-control form-control-sm" name="service_type">
                <option value="" hidden>Please select....</option>
                <option>เช่า</option>
                <option>ซื้อ</option>
                <option>PM</option>
            </select>
        </div>
    </div>
</div>




<div class="row border rounded m-2 p-2">
    <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">แนบเอกสาร</label>
            <input type="file" name="userfile" class="form-control p-1" id="userfile" placeholder="no">
            
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="exampleInputEmail1">จำนวนเงิน</label>
            <input type="number" name="amount" min="0" class="form-control" id="exampleInputEmail1" placeholder="Amount">
        </div>
    </div>
</div>

