<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Online Tuition App.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Nexteck IT Services
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
<style>
    .notification-popup {
        display: none;
        /* Hide by default */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #333;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        text-align: center;
    }

    .notification-popup button {
        margin-top: 10px;
        padding: 5px 10px;
        background-color: #ff0000;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .notification-popup button:hover {
        background-color: #cc0000;
    }
</style>



<!-- end main content-->
<div id="notification-popup" class="notification-popup">
    <p id="notificationpopupdata"></p>
    <button onclick="closeNotification()">Close</button>
    <audio id="notification-sound" src="{{ url('sounds/notification.mp3') }}" preload="auto"></audio>
</div>

<script>
    function showNotification(count) {
        var popup = document.getElementById('notification-popup');
        var sound = document.getElementById('notification-sound');
        document.getElementById('notificationpopupdata').innerHTML = 'You have ' + count + ' unread notifications';

        popup.style.display = 'block';
        sound.play();
    }

    function closeNotification() {
        var popup = document.getElementById('notification-popup');
        popup.style.display = 'none';
    }

    // Call the function to show the notification
    // showNotification();
</script>

<!-- JAVASCRIPT -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="{{ url('new-styles/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('new-styles/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ url('new-styles/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ url('new-styles/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ url('new-styles/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ url('new-styles/assets/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ url('new-styles/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ url('new-styles/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ url('new-styles/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ url('new-styles/assets/js/pages/dashboard-analytics.init.js') }}"></script>

<!-- App js -->
<script src="{{ url('new-styles/assets/js/app.js') }}"></script>

<!-- plugins:js -->
<script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ url('js/dataTables.select.min.js') }}"></script>
{{-- <script src="{{url('vendors/jquery/jquery.min.js')}}"></script> --}}


<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('js/off-canvas.js') }}"></script>
<script src="{{ url('js/hoverable-collapse.js') }}"></script>
<script src="{{ url('js/template.js') }}"></script>
<script src="{{ url('js/settings.js') }}"></script>
<script src="{{ url('js/todolist.js') }}"></script>
<!-- <script src="{{ url('js/ckeditor.js') }}"></script> -->
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ url('js/dashboard.js') }}"></script>
<script src="{{ url('js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
<script>
    // Function to fetch notifications and update unread count
    function fetchNotificationsAndUpdateCount() {
    $.ajax({
        url: '/notifications', // Update this URL to your endpoint that fetches notifications
        type: 'GET',
        success: function(response) {
            var unreadCount = response.unread_count;
            
            // Check if the notification has been shown in this session
            if (unreadCount > 0 && !sessionStorage.getItem('notificationShown')) {
                showNotification(response.unread_count); // Show notification popup
                sessionStorage.setItem('notificationShown', true); // Set flag
            }

            $('#unreadNotificationCount').text(unreadCount);

            // Update the class of the badge to visually indicate unread count
            if (unreadCount > 0) {
                $('#unreadNotificationCount').removeClass('bg-danger').addClass('bg-primary');
            } else {
                $('#unreadNotificationCount').removeClass('bg-primary').addClass('bg-danger');
            }

            // Clear previous notifications
            var notificationList = $('#all-noti-tab .pe-2');
            notificationList.empty();

            // Loop through the notifications and append them to the appropriate tab
            $.each(response.notifications, function(index, notification) {
                let createdAt = new Date(notification.created_at);

                // Extract and format the date and time
                let hours = ('0' + createdAt.getHours()).slice(-2);
                let minutes = ('0' + createdAt.getMinutes()).slice(-2);
                let seconds = ('0' + createdAt.getSeconds()).slice(-2);
                let day = ('0' + createdAt.getDate()).slice(-2);
                let month = ('0' + (createdAt.getMonth() + 1)).slice(-2);
                let year = createdAt.getFullYear();

                let formattedDateTime = `${hours}:${minutes}:${seconds} ${day}/${month}/${year}`;
                
                var notificationItem = `
                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <div class="avatar-xs me-3 flex-shrink-0">
                                <span class="avatar-title bg-info-subtle rounded-circle fs-16">
                                    <img src="/images/tutors/profilepics/${notification.initiator_pic}" class="" height="36px">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <a onclick="markAsRead(${notification.id})" href="/checkNotificationDetails/${notification.id}" class="stretched-link">
                                    <h6 class="mt-0 mb-2 lh-base">${notification.notification}</h6>
                                </a>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> ${formattedDateTime} - ${notification.initiator_name} - (${notification.initiator_role})</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" title="Mark as read" onclick="markAsRead('${notification.id}')" type="radio" value="" id="notification-check-${index}">
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                notificationList.append(notificationItem);
            });
        }
    });
}



    // Fetch notifications and update count on page load

    // $(document).ready(function() {
    //     fetchNotificationsAndUpdateCount();
    // });
    $(document).ready(function() {
        // Call the function immediately once the document is ready
        fetchNotificationsAndUpdateCount();

        // Set an interval to call the function every 5 seconds (5000 milliseconds)
        setInterval(fetchNotificationsAndUpdateCount, 5000);
    });

    // Event listener for clicking on a notification (assuming you have one)
    // $(document).on('click', '.notification-item', function() {
    //     var notificationId = $(this).data('id');
    //     markAsRead(notificationId);
    // });

    // Function to mark notification as read (assuming you have one)
    function markAsRead(notificationId) {
        $.ajax({
            url: '/markAsRead/' + notificationId, // Endpoint to mark notification as read
            type: 'GET',
            success: function(response) {
                // Fetch notifications again after marking as read
                fetchNotificationsAndUpdateCount();
            }
        });
    }

    function checkNotificationDetails(notificationId) {
        $.ajax({
            url: '/checkNotificationDetails/' + notificationId, // Endpoint to mark notification as read
            type: 'GET',
            success: function(response) {
                // Fetch notifications again after marking as read
                fetchNotificationsAndUpdateCount();
            }
        });
    }
</script>


</html>
