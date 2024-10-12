<i class="fa-solid fa-bell fa-2xl mt-4 " type="button" data-toggle="collapse" data-target="#collapseExample" onclick="checkUpcomingEvents()" style="color: #fac400;"></i>



        <div class="collapse" id="collapseExample">

            <!-- รายการแจ้งเตือน -->
            <ul id="notiList" class="list-group mt-3">
                <!-- ข้อมูลแจ้งเตือนจะถูกแสดงที่นี่ -->
            </ul>
        </div>

        <!-- JavaScript สำหรับเรียกใช้ Fetch API -->
    <script>
        function checkUpcomingEvents() {
            fetch("<?php echo site_url('/main/check_upcoming'); ?>")
                .then(response => response.json())
                .then(notifications => {
                    var notiList = document.getElementById('notiList');
                    notiList.innerHTML = ''; // ล้างรายการเก่าก่อน
                    notifications.forEach(notification => {
                        var li = document.createElement('li'); // สร้าง li element ใหม่
                        li.classList.add('list-group-item'); // เพิ่มคลาส Bootstrap
                        li.textContent = 'Event "' + notification.title + '" is coming in ' + notification.days_left + ' days.';
                        notiList.appendChild(li); // เพิ่ม li ลงใน notiList
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    </script>