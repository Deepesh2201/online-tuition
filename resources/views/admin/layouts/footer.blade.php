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
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by DGL Digital
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->


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
            console.log(response.notifications);
            // Loop through the notifications and append them to the appropriate tab
            $.each(response.notifications, function(index, notification) {
                let createdAt = new Date(notification.created_at);

                // Extracting hours, minutes, seconds, day, month, and year
                let hours = createdAt.getHours();
                let minutes = createdAt.getMinutes();
                let seconds = createdAt.getSeconds();
                let day = createdAt.getDate();
                let month = createdAt.getMonth() + 1; // Months are zero-indexed, so add 1
                let year = createdAt.getFullYear();

                // Padding single digits with leading zeros
                hours = ('0' + hours).slice(-2);
                minutes = ('0' + minutes).slice(-2);
                seconds = ('0' + seconds).slice(-2);
                day = ('0' + day).slice(-2);
                month = ('0' + month).slice(-2);
                let formattedDateTime = `${hours}:${minutes}:${seconds} ${day}/${month}/${year}`;
                var notificationItem = `
                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <div class="avatar-xs me-3 flex-shrink-0">
                                <span class="avatar-title bg-info-subtle  rounded-circle fs-16">
                                    <img src="/images/students/profilepics/${notification.initiator_pic}" class="">
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

                // <div style="float:right; margin-top:20px;">
                //             <p style="cursor:pointer" class="text-danger">Clear All</p>    
                //         </div>


                //<label class="form-check-label" for="notification-check-${index}"></label>
                // Append the notification to the appropriate tab based on its type
                // if (notification.type === 'message') {
                //     $('#messages-tab .pe-2').append(notificationItem);
                // } else if (notification.type === 'alert') {
                //     $('#alerts-tab').append(notificationItem);
                // }
                notificationList.append(notificationItem); // Append to All tab regardless of type
            });
        }
    });
}


// Fetch notifications and update count on page load

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
