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
    <div class="container">
        <div class="head d-flex justify-content-between align-items-center">
            <h1>Welcome, <?php echo $this->session->userdata('username') ?></h1>
            <div class="right d-flex justify-content-start">
                <div class="row">
                    <div class="col">
                    <i class="fa-solid fa-bell fa-2xl mt-4" style="color: #fac400;"></i>
                    </div>
                    <div class="col">
                    <h2 id="clock" style="text-align: right;">00:00:00</h2>
                    </div>
                </div>
                
                

            </div>
        </div>

        <hr class="mb-5">

        

        <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/night-city2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/night-city2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/night-city2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>


        <h1>Vendor Name</h1>
        <hr>
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
        <!-- <h1>Lorem, ipsum dolor.</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex quasi et eum ut sequi in velit nam expedita aperiam minima aliquam eligendi reiciendis modi provident, repudiandae dolores architecto numquam quas?</p> -->
    </div>

    <?php $this->load->view('footer'); ?>
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
            } else {
                alert(password);



                // alert('กรุณากรอกรหัสผ่าน');
                <?php $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง'); ?>
            }
        }
    </script>
</body>

</html>