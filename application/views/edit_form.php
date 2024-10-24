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
    <div class="container border-bottom mb-4">
        <h1>Edit/Update Vendor <?php echo $get_vendor_name["id"]; ?></h1>
    </div>

    
    
    <!-- <?php $id = $project["id"]; ?> -->

    <div class="container mb-3">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" id="labelEdit" onclick="label()" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            แสดงหน้าแก้ไข
        </button>
    </div>

    <div class="collapse" id="collapseExample">
        <div class=" card-body">
            <div class="container mb-5 d-flex justify-content-start border rounded p-3">
                <div class=" card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form id="updateForm" action="<?php echo site_url('main/update/' . $project['id']); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $project['id']; ?>" />


                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><strong>Purchase Date</strong></label>
                                        <input type="date" name="purchase_date" value="<?php echo $project['purchase_date'] ?>" class="form-control" id="purchase_date" placeholder="Select date">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vendor Name</label>
                                        <select class="form-control form-control-sm" name="vendor_name" id="vendorName">
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
                                        <input type="text" class="form-control form-control-sm" value="<?php echo $project['contact_name'] ?>" id="contact_name" name="contact_name" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Software</label>
                                        <select class="form-control form-control-sm" name="software" id="software">
                                            <option selected> <?php echo $project['software'] ?></option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control form-control-sm" name="status" id="status">
                                            <option selected> <?php echo $project['status'] ?></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                            </div>

                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea type="text" class="form-control form-control-sm" value="" id="address" name="address"><?php echo $project['address'] ?> </textarea>
                                    <!-- <input type="text" class="form-control form-control-sm" value="<?php echo $project['address'] ?>" id="exampleInputEmail1" name="address"> -->
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tel.</label>
                                    <input type="text" class="form-control form-control-sm" value="<?php echo $project['tel'] ?>" id="tel" name="tel" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control form-control-sm" value="<?php echo $project['email'] ?>" id="email" name="email" />
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">LineID</label>

                                    <input type="text" class="form-control form-control-sm" id="lineid" value="<?php echo $project['lineid'] ?>" name="lineid">
                                </div>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">off/on Edit</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-right mt-3">
                                    <button type='button' id="updateButton" class='btn btn-primary' onclick="openPasswordModal()">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="container border-bottom mb-5">
        <h1>Details</h1>
    </div>

    <?php $this->load->view('modal_validate'); ?>
    <div class="container-fluid mb-5 ">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#modal_insert_form_edit">
        New
    </button> -->

        <!-- <div class="container"> -->
            <?php echo "<button class='btn btn-success mb-3' onclick=\"openModal('$id')\" >New</button>" ?>

            <div class=" p-3 border rounded ">

                    <table class="table my-3 table-responsive table-bordered table-striped table-fixed" id="example">
                        <thead>
                            <tr>
                                <!-- <th scope="col">id</th> -->
                                
                                <!-- <th scope="col">ref_id</th> -->
                                <th scope="col">เอกสารแนบ</th>
                                <th scope="col">P/R</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">รายการ</th>
                                <th scope="col">เริ่มต้น</th>
                                <th scope="col">สิ้นสุด</th>
                                <th scope="col">วันทำงานจริง</th>
                                <th scope="col">วันเสร็จงาน</th>
                                <th scope="col">Status</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Product</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">จำนวนเงิน</th>
                                <th scope="col">เงื่อนไขบริการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php



                            foreach ($project_data_detail as $row) {
                                echo "<tr>";

                                // echo "<td>" . $row["id"] . "</td>";
                                // echo "<td>" . $row["ref_list_id"] . "</td>";
                                echo "<td><a href='" . base_url('uploads/' . $row['doc']) . "' download>'" . $row['doc'] . "'</a></td>";
                                echo "<td>" . $row["pr_number"] . "</td>";
                                echo "<td>" . $row["vendor_name"] . "</td>";
                                echo "<td>" . $row["list"] . "</td>";
                                $srtDate = new DateTime($row["start"]);
                                echo "<td>" . $srtDate->format('d-m-Y') . "</td>";
                                $endDate = new DateTime($row["end"]);
                                echo "<td>" . $endDate->format('d-m-Y') . "</td>";
                                $workSrt = new DateTime($row["work_start"]);
                                echo "<td>" . $workSrt->format('d-m-Y') . "</td>";
                                $workEnd = new DateTime($row["work_end"]);
                                echo "<td>" . $workEnd->format('d-m-Y') . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["service_type"] . "</td>";
                                echo "<td>" . $row["product"] . "</td>";
                                echo "<td>" . $row["amount"] . "</td>";
                                echo "<td>" . $row["cost"] . "</td>";
                                echo "<td><button onclick=\"openNoteModal('" . $row['id'] . "')\"  class='btn btn-secondary btn-sm'>Detail</button></td>";
                                echo "</tr>";
                            }
                            ?>
                    </table>



            </div>

        </div>



        <script>
            function openNoteModal(id) {
                $.ajax({
                    url: '<?php echo site_url('main/note') ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);

                        if (data.status === 'success') {
                            // แสดงข้อมูลที่ดึงมา
                            document.getElementById("noteid").innerHTML = data.detail.id;
                            document.getElementById("letnote").innerHTML = data.detail.note;
                            $('#modalNote').modal('show'); // เปิด modal
                        } else {
                            alert(data.message); // แสดงข้อความเมื่อไม่มีข้อมูล
                            console.log(data);

                        }
                    },
                    error: function() {
                        alert('Error retrieving data.');
                    }
                });
            }
        </script>

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

            <script>
                function insertEdit() {

                    var userfile = document.getElementById('userfile').files[0];

                    if (userfile) {
                        var insertEditForm = document.getElementById('insert_form_edit');
                        insertEditForm.submit();
                    } else {
                        $('#errorModal').modal('show');
                        $('#modal_insert_form_edit').modal('hide');
                        console.log('error');
                        
                    }
                    
                }
            </script>

        <script>
            const label = () => {
              var press = document.getElementById('labelEdit');

              if(press.innerText === "แสดงหน้าแก้ไข") {
                press.innerText = "ซ่อน";
              } else {
                press.innerText = "แสดงหน้าแก้ไข"
              }
                
            }
        </script>

    </div>



    <script>
        function updateInputField() {
            var inputField = [
                document.getElementById('purchase_date'),
                document.getElementById('vendorName'),
                document.getElementById('contact_name'),
                document.getElementById('software'),
                document.getElementById('status'),
                document.getElementById('address'),
                document.getElementById('tel'),
                document.getElementById('email'),
                document.getElementById('lineid'),
                document.getElementById('updateButton'),
            ];

            var switchElement = document.getElementById('customSwitch1');

            // เมื่อ checkbox ถูก checked/unchecked
            if (this.checked) {
                // วนลูปเพื่อเปิดใช้งาน input แต่ละตัวใน array
                inputField.forEach(function(inputId) {
                    inputId.disabled = false;
                });
            } else {
                // วนลูปเพื่อปิดการใช้งาน input แต่ละตัวใน array
                inputField.forEach(function(inputId) {
                    inputId.disabled = true;
                });
            }
        };

        window.onload = function() {
            updateInputField(); // เรียกใช้ฟังก์ชันเพื่อตั้งค่า input ตอนโหลดหน้า

            // Event listener เพื่อเปลี่ยนสถานะ input เมื่อมีการกดปุ่มสวิตช์
            document.getElementById('customSwitch1').addEventListener('change', updateInputField);
        };
    </script>

</body>

</html>