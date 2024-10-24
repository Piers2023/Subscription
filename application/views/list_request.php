<html>

<head>
    <title>Back Office</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('bt'); ?>
    <?php $this->load->view('modal_validate'); ?>
</head>

<body>
    <?php $this->load->view('navbar') ?>
    <div class="container">
        <div class="container position-relative">
            <div class="head d-flex justify-content-between align-items-center">
                <h1>Welcome, <?php echo $this->session->userdata('username') ?></h1>
                <div class="right d-flex">
                    <div class="noti mx-4 pb-3">
                        <!-- <i class="fa-solid fa-bell fa-2xl mt-4" style="color: #fac400;"></i> -->
                        <?php $this->load->view('notification'); ?>
                    </div>
                    <div class="time">
                        <h2 id="clock" style="text-align: right;">00:00:00</h2>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-5">

    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success my-3" data-toggle="modal" data-target="#modal_insert">
        New
    </button>

    <div class="table-scroll p-3 border border-secondary mb-3 rounded">
        <div class="table-scrollable ">
            <table class="table table-responsive table-bordered my-3 table-striped table-fixed" id="example">

                <thead>
                    <tr>
                        <!-- <th scope="col">id</th> -->
                        <th scope="col">Date Create</th>
                        <th scope="col">Vender Name</th>
                        <th scope="col">Contact Name</th>

                        <th scope="col">Address</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Email</th>
                        <th scope="col">LineID</th>
                        <th scope="col">Software</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $row) {
                        echo "<tr>";
                        // echo "<td>" . $row["id"] . "</td>";
                        $creDate = new DateTime($row["create_date"]);
                        echo "<td>" . $creDate->format('d-m-Y') . "</td>";
                        echo "<td>" . $row["vendor_name"] . "</td>";
                        echo "<td>" . $row["contact_name"] . "</td>";

                        echo "<td>" . $row["address"] . '<div class="blinking-green"></div>' . "</td>";
                        echo "<td>" . $row["tel"] . '<div class="blinking-green"></div>' . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["lineid"] . '<div class="blinking-green"></div>' . "</td>";
                        echo "<td>" . $row["software"] . "</td>";
                        $purDate = new DateTime($row["purchase_date"]);
                        echo "<td>" . $purDate->format('d-m-Y') . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td><a href='" . site_url('main/edit/' . $row["id"]) . "' class='btn btn-secondary btn-sm'>Detail</a></td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>

    </div>

    <script>
        // ฟังก์ชันในการอัปเดตเวลา
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // เติมเลขศูนย์หน้าหากตัวเลขน้อยกว่าหนึ่งหลัก
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            // แสดงเวลาใน div ที่มี id = clock
            document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
        }

        // เรียกใช้ฟังก์ชัน updateClock ทุก ๆ 1 วินาที (1000 มิลลิวินาที)
        setInterval(updateClock, 1000);

        // เรียกใช้งานฟังก์ชัน updateClock ครั้งแรกเพื่อแสดงเวลาเริ่มต้นทันที
        updateClock();
    </script>

    <script>
        // เปิด modal เพื่อให้กรอกรหัสผ่าน
        function openVerifyModal() {
            $('#openVerifyModal').modal('show');
            $('#modal_insert').modal('hide');
        }
    </script>

    <script>
        submitForm = () => {
            var password = document.getElementById('password1').value;

            if (password) {
                // เพิ่มข้อมูลรหัสผ่านเข้าในฟอร์ม
                var form = document.getElementById('insertForm');
                var passwordInput = document.createElement('input');
                passwordInput.type = 'hidden';
                passwordInput.name = 'password';
                passwordInput.value = password;
                form.appendChild(passwordInput);

                // ส่งฟอร์มไปที่ controller
                form.submit();
            } else {
                alert(password);



                // alert('กรุณากรอกรหัสผ่าน');
                <?php $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง'); ?>
            }
        }
    </script>

    <script>
        window.onload = function() {
            // เช็คว่ามีค่าใน LocalStorage ที่ชื่อว่า 'modalShown' หรือไม่
            if (!localStorage.getItem('modalShown')) {
                // ถ้าไม่มีแสดงว่า Modal ยังไม่ถูกแสดง
                checkExpireDate();
            }
            // checkExpireDate();
        }

        function checkExpireDate() {
            fetch("<?php echo site_url('/main/check_upcoming'); ?>")
                .then(response => response.json())
                .then(notifications => {

                    var modalBody = document.getElementById('expiringModal-body');
                    if (modalBody) {
                        modalBody.innerHTML = ''; // ล้างข้อมูลเดิมใน ul

                        notifications.forEach(notification => {

                            // ตรวจสอบว่าเหลือวัน <= 15 หรือไม่
                            if (notification.days_left <= 15) {

                                var li = document.createElement('li');
                                li.textContent = 'Event "' + notification.title + '" ของ ' + notification.description + ' กำลังจะหมดอายุใน ' + notification.days_left + ' วัน';
                                modalBody.appendChild(li);

                            }

                            if (notification.days_left == 0) {
                                li.remove();
                            }
                        });



                        // ถ้ามีการแจ้งเตือน จึงจะแสดง modal
                        if (notifications.length > 0) {
                            var eventModal = new bootstrap.Modal(document.getElementById('expiringModal'));
                            eventModal.show()

                            // เมื่อแสดง Modal ให้บันทึกค่าใน LocalStorage ว่าแสดงแล้ว
                            localStorage.setItem('modalShown', 'true');
                        } else {
                            console.error('Modal body not found!');
                        }
                    };
                })
                .catch(error => console.error('Error fetching data:', error));


        }
    </script>




    <?php  ?>

    <div class="container-fluid mb-3">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#modal_insert_form_edit">
        New
    </button> -->
        <h1>Details</h1>
        <hr>
        <button type="button" class="btn btn-outline-success my-3 openSub" data-subid="new">
            New
        </button>

        <!-- <td>
            <div class='btn btn-info openmodal' data-document_no='new'>New</div>
        </td> -->

        <div class=" p-3 border rounded ">
            <table class="table my-3 table-responsive table-bordered table-striped table-fixed" id="example1">
                <thead>
                    <tr>

                        <th scope="col">myedit</th>
                        <!-- <th scope="col">edit</th> -->
                        <th scope="col">id</th>
                        <th scope="col">vendorCode</th>

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
                        <th scope="col">เอกสารแนบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($project_data_detail as $row) {
                        echo "<tr>";

                        $id = $row["id"];
                        echo "<td><div class='btn btn-info openSub' data-subid='$id' >Edit</div></td>";
                        // echo "<td><div class='btn btn-info openmodal' data-document_no='$id' >Edit</div></td>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["vendor_code"] . "</td>";
                        echo "<td>" . $row["pr_number"] . "</td>";
                        echo "<td> <a href='" . site_url('main/edit/' . $row['vendor_code']) . "'>" . $row["vendor_name"] . "</a></td>";
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
                        echo "<td><a href='" . base_url('uploads/' . $row['doc']) . "' download>'" . $row['doc'] . "'</a></td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
    </div>


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
        const home = () =>
    </script>

    <script>
        new DataTable('#example1');
    </script>

    <script>
        function newSubModalClick() {

            var userfile = document.getElementById('vendor_userfile').files[0];

            if (userfile) {
                var new_sub = document.getElementById('new_sub');
                new_sub.submit();
            } else {
                $('#errorModal').modal('show');
                $('#newSubModal').modal('hide');
                console.log('error');

            }

        }
    </script>

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


    // <script>
    //     $("body").on("click", ".openmodal", function(event) {

    //         // event.preventDefault(); 


    //         var document_no = $(this).data('documen_no');
    //         $.ajax({

    //             url: '<?php echo site_url("/main/listdd"); ?>',
    //             type: 'post',
    //             data: {
    //                 document_no: document_no
    //             },
    //             success: function(response) {

    //                 $('#body_detail').html(response);
                    
    //                 $('#myModal').modal('show');

    //             },
    //             error: function(XMLHttpRequest, textStatus, errorThrown) {

    //                 $('#body_detail').html(XMLHttpRequest.responseText);

    //                 $('#myModal').modal('show');
    //             }

    //         });
    //     });
    // </script>

    <script>
        $("body").on("click", ".openSub", function(event) {

            // event.preventDefault(); 


            var subId = $(this).data('subid');
            $.ajax({

                url: '<?php echo site_url("/main/newSub"); ?>',
                type: 'post',
                data: {
                    subId: subId
                },
                success: function(response) {

                    $('#sub_detail').html(response);
                    console.log(subId);
                    
                    $('#newSub').modal('show');

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                    $('#body_detail').html(XMLHttpRequest.responseText);

                    $('#newSub').modal('show');
                }

            });
        });
    </script>




</body>

</html>