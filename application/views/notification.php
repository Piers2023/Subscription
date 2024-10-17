<i class="fa-solid fa-bell fa-2xl mt-4 position-relative" type="button" data-toggle="collapse" data-target="#collapseExample" onclick="checkUpcomingEvents()" style="color: #fac400;">
<span id="newBadge" class="badge badge-secondary" style="display: none;">New</span>
</i>




<div class="collapse " style="z-index: 10; position: absolute;" id="collapseExample">

    <!-- รายการแจ้งเตือน -->
    <ul id="notiList" class="list-group mt-3">
        <!-- ข้อมูลแจ้งเตือนจะถูกแสดงที่นี่ -->
    </ul>
</div>




<!-- Modal
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="expiringModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งแตือนการหมดอายุ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="expiringModal-body p-3" id="expiringModal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
                    li.textContent = notification.title + ' ของ ' + notification.description + ' กำลังจะหมดอายุใน ' + notification.days_left + ' วัน ';
                    notiList.appendChild(li); // เพิ่ม li ลงใน notiList

                    // if (notification.days_left <= 15) {

                    //     var modalBody = document.getElementById('modal-body');
                    //     modalBody.textContent = 'Event "' + notification.title + '" is happening today!';
                    //     var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    //     eventModal.show();

                    // } else

                    if (notification.days_left == 0) {
                        // ลบรายการนี้ออกจาก notiList หลังจากแสดง modal
                        li.remove();
                    }

                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>