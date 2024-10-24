<?php

foreach ($list_detail as $rs) extract($rs);
?>

<form id="insert_form_edit" action='<?php echo site_url('main/add_sub') ?>' method="post" enctype="multipart/form-data">

<input type="hidden" value="<?php echo $id ?>" id="id" name="id">
    <div class="border rounded m-2 p-2">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">P/R</label>
                    <input type="text" value="<?php echo $pr_number ?>" name="pr_number" class="form-control" id="pr_number" placeholder="P/R">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vendor Name</label>
                    <input class="form-control" list="vendor_name_list" value='<?php echo $vendor_name ?>' name="vendor_name" id="vendor_name" placeholder="Select Vendor">
                    <!-- Datalist สำหรับ Vendor Names -->
                    <datalist id="vendor_name_list">
                        <select class="form-control">
                            <?php
                            $vendors = $this->data_model->vendors();
                            foreach ($vendors as $row) {
                                $vendor_name = $row["vendor_name"];
                                $vendor_id = $row["vendor_id"];
                                echo "<option value='$vendor_name'>$vendor_name</option>";
                            }
                            ?>
                        </select>
                    </datalist>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">รายการ</label>
                    <select class="form-control form-control-sm" name="list">
                        <?php echo "<option value='$list' hidden selected>$list</option>" ?>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Maintenance</option>
                        <option>Machine</option>
                    </select>
                </div>

                <div class="form-group">

                    <label for="exampleInputEmail1">สินค้า</label>
                    <div class="input-group">
                        <input type="text" name="product" value="<?php echo $product ?>" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Product">
                        <input type="number" name="amount" min="1" value="<?php echo $amount ?>" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="จำนวน">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">สถานะ</label>
                    <select class="form-control form-control-sm" name="status" placeholder="select status">
                        <?php echo "<option value='$status' hidden>$status</option>" ?>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ประเภทการบริการ</label>
                    <select class="form-control form-control-sm" name="service_type">
                        <?php echo "<option value='$service_type' hidden>$service_type</option>" ?>
                        <option>เช่า</option>
                        <option>ซื้อ</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row border rounded m-2 p-2">
        ` <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">เริ่มต้น</label>
                <input type="date" name="start" value="<?php echo $start ?>" class="form-control" id="exampleInputEmail1" placeholder="Select date">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">สิ้นสุด</label>
                <input type="date" name="end" value="<?php echo $end ?>" class="form-control" id="exampleInputEmail1" placeholder="Select date">
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">วันทำงานจริง</label>
                <input type="date" name="work_start" value="<?php echo $work_start ?>" class="form-control" id="exampleInputEmail1" placeholder="Select date">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">วันเสร็จงาน</label>
                <input type="date" name="work_end" value="<?php echo $work_end ?>" class="form-control" id="exampleInputEmail1" placeholder="Select date">
            </div>
        </div>
    </div>

    <div class="border rounded m-2 p-2">
        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <label for="exampleInputEmail1">แนบเอกสาร</label>
                    <input type="file" name="userfile" class="form-control p-1" id="userfile" placeholder="no">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">จำนวนเงิน</label>
                    <input type="number" name="amount" value="<?php echo $cost ?>" min="0" class="form-control" id="exampleInputEmail1" placeholder="Amount">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">หมายเหตุ</label>
                    <textarea type="text" name="note" value="<?php echo $note ?>" class="form-control" id="exampleInputEmail1" placeholder="ป้อน"> </textarea>
                </div>
            </div>
        </div>
    </div>

</form>