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
</head>

<body>
    <?php $this->load->view('navbar'); ?>

    <div class="container ">
        <div id='calendar'></div>
    </div>

    <?php $this->load->view('footer') ?>
</body>



</html>