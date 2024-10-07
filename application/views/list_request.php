<?php


?>

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
    <div class="container " style="height: 50%;">
        <div class="head d-flex justify-content-between align-items-center">
            <h1>Welcome, <?php echo $this->session->userdata('username') ?></h1>
            <div class="right">
                <h2 id="clock"  style="text-align: right;">00:00:00</h2>
                <p id="countdown" ></p>

            </div>
        </div>

        <hr>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#modal_insert">
            New
        </button>

        <div class="table-scroll p-3 border border-secondary mb-3 rounded">
            <div class="table-scrollable table-responsive">
                <table class="table table-bordered table-striped table-fixed" id="example">
                    <thead>
                        <tr>
                            <!-- <th scope="col">id</th> -->
                            <th scope="col">Vender Name</th>
                            <th scope="col">Purchase Date</th>
                            
                            <th scope="col">Address</th>
                            <th scope="col">Tel</th>
                            <th scope="col">LineID</th>
                            <th scope="col">Software</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $row) {
                            echo "<tr>";
                            // echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["vendor_name"] . "</td>";
                            echo "<td>" . $row["purchase_date"] . "</td>";
                            
                            echo "<td>" . $row["address"] . '<div class="blinking-green"></div>' . "</td>";
                            echo "<td>" . $row["tel"] . '<div class="blinking-green"></div>' . "</td>";
                            echo "<td>" . $row["lineid"] . '<div class="blinking-green"></div>' . "</td>";
                            echo "<td>" . $row["software"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td><a href='" . site_url('main/edit/' . $row["id"]) . "' class='btn btn-secondary btn-sm'>Detail</a></td>";
                            echo "</tr>";
                        }
                        ?>
                </table>
                <script>
                </script>
            </div>

        </div>
        <h1>Lorem, ipsum dolor.</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex quasi et eum ut sequi in velit nam expedita aperiam minima aliquam eligendi reiciendis modi provident, repudiandae dolores architecto numquam quas?</p>
    </div>
    <script>
        new DataTable('#example');
    </script>

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
                } 
                else {
                    alert(password);
                    
                    
                    
                    // alert('กรุณากรอกรหัสผ่าน');
                    <?php $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง'); ?>
                }
            }
    </script>
</body>

</html>