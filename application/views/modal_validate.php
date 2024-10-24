<!-- Insert -->
<div class="modal fade" id="modal_insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insertForm" action='<?php echo site_url('main/insert') ?>' method="post">


          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Vendor Name</label>
                <select class="form-control" name="vendor_name" placeholder="Select Vendor">
                  <?php
                  foreach ($vendor as $row) {
                    $vendor_name = $row["vendor_name"];
                    echo "<option value='$vendor_name'> $vendor_name </option>";
                  }

                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Contact name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="contact_name">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control" id="exampleInputEmail1" min="<?= date('Y-m-d'); ?>" placeholder="Select date">
              </div>



              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="address">
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Software</label>
                <select class="form-control" name="software">
                  <option>Small select</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" name="status">
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">LineID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="lineid">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="tel">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="openVerifyModal()">New</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Insert edit_form -->
<div class="modal fade" id="modal_insert_form_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button form="insert_form_edit" type="button" onclick="insertEdit()" class="btn btn-success">New</button>
      </div>
    </div>
  </div>
</div>

<!-- Insert edit_form -->
<div class="modal fade" id="newSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="sub_detail">

        </div>

      </div>
      <div class="modal-footer">
        <button form="insert_form_edit" type="button" onclick="insertEdit()" class="btn btn-success">New</button>
      </div>
    </div>
  </div>
</div>

<!-- NEW_SUB_MODAL -->
<div class="modal fade" id="newSubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Sub</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="new_sub" action='<?php echo site_url('main/add_sub') ?>' method="post" enctype="multipart/form-data">
          <div class="border rounded m-2 p-2">
            <div class="row">
              <div class="col">

                <div class="form-group">
                  <label for="exampleInputEmail1">P/R</label>
                  <input type="text" name="pr_number" class="form-control" id="pr_number" placeholder="P/R">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="exampleInputEmail1">Vendor Name</label>
                  <input class="form-control" list="vendor_name_list" name="vendor_name" id="vendor_name" placeholder="Select Vendor">
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
          <div class="border rounded m-2 p-2">
            <div class="row">
              <div class="col">
                <div class="form-group ">
                  <label for="exampleInputEmail1">แนบเอกสาร</label>
                  <input type="file" name="vendor_userfile" class="form-control p-1" id="vendor_userfile" placeholder="no">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputEmail1">ราคา</label>
                  <input type="number" name="cost" min="0" class="form-control" id="exampleInputEmail1" placeholder="cost">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputEmail1">หมายเหตุ</label>
                  <textarea type="text" name="note" class="form-control" id="exampleInputEmail1" placeholder="ป้อน"> </textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="new_sub" type="button" onclick="newSubModalClick()" class="btn btn-success">New</button>
      </div>
    </div>
  </div>
</div>

<!-- Insert edit_form -->
<div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='<?php echo site_url('main/insert_add_data') ?>' method="post">
          <div class="form-group">

            <input type="hidden" name="no" class="form-control" id="exampleInputEmail1" placeholder="no">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Vendor Name</label>
            <input type="text" name="vendor_name" class="form-control" id="exampleInputEmail1" placeholder="Vendor name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">New</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Insert edit_form -->
<div class="modal fade" id="add_data_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='<?php echo site_url('main/update_add_data'); ?>' method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="number" name="vendor_id" id="vendor_id" value="" class="form-control" id="exampleInputEmail1" placeholder="no" readonly>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Vendor Name</label>
            <input type="text" name="vendor_name" id="vendor_name" value="" class="form-control" id="exampleInputEmail1" placeholder="Vendor name">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal สำหรับกรอกรหัสผ่าน -->
<!-- Insert edit_form -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" id="exampleInputEmail1" placeholder="no" readonly>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter your password">
            <?php if ($this->session->flashdata('failed_update')): ?>
              <small style="color: red;"><?php echo $this->session->flashdata('failed_update'); ?></small><br>
            <?php endif; ?>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Verify Insert From -->
<div class="modal fade" id="openVerifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" placeholder="no" readonly>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="password" id="password1" value="" class="form-control" placeholder="Enter your password">

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_logout" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger" onclick="logout()">Logout</button>
      </div>
    </div>
  </div>
</div>

<script>
  const logout = () => {

    // ลบค่า 'modalShown' ออกจาก LocalStorage
    localStorage.removeItem('modalShown');

    window.location.href = "<?php echo site_url('login/logout') ?>";
  }
</script>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- จะแสดงข้อความที่ได้จาก PHP -->
        Please select a file before uploading.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เงื่อนไขบริการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <input type="hidden" name="noteid" class="form-control" value="" id="noteid" placeholder="no" readonly>
        <p id="letnote" name="letnote"> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>