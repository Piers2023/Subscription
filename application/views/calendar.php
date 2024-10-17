<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'multiMonthYear,dayGridMonth'
                },

                dateClick: function(info) {
                    alert('clicked ' + info.dateStr);
                },

                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '<?php echo site_url('main/fetch_events'); ?>', // URL ไปยังฟังก์ชัน fetch_events ใน Controller
                        type: 'GET',

                        success: function(data) {
                            var events = JSON.parse(data);
                            console.log(events);

                            successCallback(events);
                        },
                        error: function() {
                            failureCallback();
                        }
                    });
                },

                eventContent: function(arg) {
                    // สร้างเนื้อหาที่จะแสดงในเหตุการณ์
                    let customHtml = `
                <div>
                    <strong>${arg.event.title}</strong>
                    <p>expired: ${arg.event.extendedProps.product}</p> <!-- แสดง description -->
                </div>
            `;
                    return {
                        html: customHtml
                    }; // คืนค่าที่สร้างขึ้น
                }
            });

            calendar.render();
        });
    </script>
    <?php $this->load->view('bt'); ?>


    <style>
        .sticky-bottom {
            position: sticky;
            bottom: 0;
            /* ติดที่ด้านล่าง */
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php $this->load->view('navbar'); ?>

    
    
    <div class="container ">

    <div class="container position-relative">
            <div class="head d-flex justify-content-between align-items-center">
                <h1>Calendar</h1>


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

        <div id='calendar'></div>
    </div>



    <?php $this->load->view('footer') ?>
</body>



</html>