               <!-- partial:partials/_footer.html -->
               <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                        All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                        with <i class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script>
    function pad2(n) {
        return (n < 10 ? "0" : "") + n;
    }
    var todaydate = new Date();
    var month = pad2(todaydate.getMonth() + 1); //months (0-11)
    var day = pad2(todaydate.getDate()); //day (1-31)
    var year = todaydate.getFullYear();

    var formattedMDate = "Today" + "(" + day + "-" + month + "-" + year + ")";

    window.addEventListener('load', () => {
        document.getElementById("today").innerHTML = formattedMDate;
    });
</script>

<!-- plugins:js -->
<script src="{{url('vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{url('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{url('vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{url('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{url('js/dataTables.select.min.js')}}"></script>
{{-- <script src="{{url('vendors/jquery/jquery.min.js')}}"></script> --}}


<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{url('js/off-canvas.js')}}"></script>
<script src="{{url('js/hoverable-collapse.js')}}"></script>
<script src="{{url('js/template.js')}}"></script>
<script src="{{url('js/settings.js')}}"></script>
<script src="{{url('js/todolist.js')}}"></script>

<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{url('js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{url('js/dashboard.js')}}"></script>
<script src="{{url('js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:40 GMT -->

</html>