<?php $this->load->view('bt') ?>
<?php $this->load->view('navbar') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container border-bottom mb-5">
        <h1>Edit/Update Vendor</h1>
    </div>
    <!-- <?php $id = $project["id"]; ?> -->


    <div class="container mb-5 d-flex justify-content-start border p-3">

        <div class="container">
            <div class="row">
                <div class="col">
                    <form id="updateForm" action="<?php echo site_url('main/update/' . $project['id']); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $project['id']; ?>" />


                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Purchase Date</strong></label>
                            <input type="date" name="purchase_date" value="<?php echo $project['purchase_date'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Select date">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Vendor Name</label>
                            <select class="form-control form-control-sm" name="vendor_name">
                                <option selected> <?php echo $project['vendor_name'] ?></option>
                                <?php
                                foreach ($vendor as $row) {
                                    $vendor_id = $row["id"];
                                    $vendor_name = $row["vendor_name"];
                                    echo "<option value='$vendor_name'> $vendor_name </option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact name</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $project['contact_name'] ?>" id="exampleInputEmail1" name="contact_name" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Software</label>
                            <select class="form-control form-control-sm" name="software">
                                <option selected> <?php echo $project['software'] ?></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control form-control-sm" name="status">
                                <option selected> <?php echo $project['status'] ?></option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea type="text" class="form-control form-control-sm" value="" id="exampleInputEmail1" name="address"><?php echo $project['address'] ?> </textarea>
                        <!-- <input type="text" class="form-control form-control-sm" value="<?php echo $project['address'] ?>" id="exampleInputEmail1" name="address"> -->
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tel.</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $project['tel'] ?>" id="exampleInputEmail1" name="tel" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control form-control-sm" value="<?php echo $project['email'] ?>" id="exampleInputEmail1" name="email" />
                    </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">LineID</label>

                        <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" value="<?php echo $project['lineid'] ?>" name="lineid">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group text-right mt-3">
                        <button type='button' class='btn btn-primary' onclick="openPasswordModal()">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




    </div>

    <div class="container border-bottom mb-5">
        <h1>Details</h1>
    </div>

    <?php $this->load->view('modal_validate'); ?>
    <div class="container-fluid mb-5">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#modal_insert_form_edit">
        New
    </button> -->

        <div class="container">
            <?php echo "<button class='btn btn-success mb-3' onclick=\"openModal('$id')\" >New</button>" ?>

            <div class="table-scroll p-3 border rounded ">
                <div class="table-scrollable ">
                    <table class="table my-3 table-responsive table-bordered table-striped table-fixed" id="example">
                        <thead>
                            <tr>
                                <!-- <th scope="col">id</th> -->
                                <!-- <th scope="col">ref_id</th> -->

                                <th scope="col">เอกสารแนบ</th>
                                <th scope="col">รายการ</th>
                                <th scope="col">เริ่มต้น</th>
                                <th scope="col">สิ้นสุด</th>
                                <th scope="col">วันทำงานจริง</th>
                                <th scope="col">วันเสร็จงาน</th>
                                <th scope="col">Status</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Product</th>
                                <th scope="col">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($project_data_detail as $row) {
                                echo "<tr>";

                                // echo "<td>" . $row["id"] . "</td>";
                                // echo "<td>" . $row["ref_list_id"] . "</td>";
                                echo "<td><a href='" . base_url('uploads/' . $row['doc']) . "' download>'" . $row['doc'] . "'</a></td>";
                                echo "<td>" . $row["list"] . "</td>";
                                echo "<td>" . $row["start"] . "</td>";
                                echo "<td>" . $row["end"] . "</td>";
                                echo "<td>" . $row["work_start"] . "</td>";
                                echo "<td>" . $row["work_end"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["service_type"] . "</td>";
                                echo "<td>" . $row["product"] . "</td>";
                                echo "<td>" . $row["amount"] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                    </table>

                </div>

            </div>

        </div>


        <script>
            new DataTable('#example');
        </script>
        <script>
            function openModal(id) {
                document.getElementById("ref_list_id").value = id;
                // alert(id);
                $('#modal_insert_form_edit').modal('show');
            }
        </script>

        <script>
            // เปิด modal เพื่อให้กรอกรหัสผ่าน
            function openPasswordModal() {
                $('#passwordModal').modal('show');
            }

            // เมื่อกด submit modal ให้ส่งข้อมูลฟอร์มพร้อมรหัสผ่าน
            function submitForm() {
                var password = document.getElementById('password').value;

                if (password) {
                    // เพิ่มข้อมูลรหัสผ่านเข้าในฟอร์ม
                    var form = document.getElementById('updateForm');
                    var passwordInput = document.createElement('input');
                    passwordInput.type = 'hidden';
                    passwordInput.name = 'password';
                    passwordInput.value = password;
                    form.appendChild(passwordInput);


                    // ส่งฟอร์มไปที่ controller
                    form.submit();
                } else {
                    // alert('กรุณากรอกรหัสผ่าน');
                    <?php $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง'); ?>
                }
            }
        </script>


    </div>

</body>

</html>