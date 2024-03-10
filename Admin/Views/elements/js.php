<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<!-- <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script> -->
<!-- <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script> -->
<!-- <script src="assets/plugins/simplebar/js/simplebar.min.js"></script> -->
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- upload files -->
<!-- <script src="assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script> -->
<!-- end upload -->
<!-- <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/plugins/jquery-knob/excanvas.js"></script>
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script> -->
<!-- dataTables -->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<!-- select 2 -->
<!-- datetimepicker -->
<!-- <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.date.js"></script> -->
<!-- <script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script> -->
<!-- end datetimepicker -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<!-- jquery confirm -->
<script src="assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>
<!-- tinymce -->
<script src="assets/plugins/tinymce/tinymce.min.js"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="assets/js/index.js"></script>
<!--app JS-->
<script src="assets/js/app.js"></script>
<!-- custom js -->
<script src="assets/custom_js/main.js?time=<?php echo time(); ?>"></script>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#Transaction-History').DataTable({
            lengthMenu: [
                [6, 10, 20, -1],
                [6, 10, 20, 'Todos']
            ]
        });
    });
</script>
<!-- <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> -->
<!-- <script src="assets/js/dashboard-eCommerce.js"></script> -->
<!--app JS-->
<script>
    new PerfectScrollbar('.product-list');
    new PerfectScrollbar('.customers-list');
</script>
<?php if ((isset($_GET['action']) && $_GET['action'] == 'dashboard') || !isset($_GET['action'])) { ?>
    <script>
        var ctx = document.getElementById('chartSiteTraffic')?.getContext('2d');
        if (ctx) {
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    datasets: [{
                        label: 'Visitor',
                        data: <?php echo isset($visitorArr) && is_array($visitorArr) ? '[' . join(',', $visitorArr) . ']' : '[3, 3, 8, 5, 7, 4, 6]'; ?>,
                        backgroundColor: 'rgba(20, 171, 239, 0.35)',
                        borderColor: "transparent",
                        pointRadius: "0",
                        borderWidth: 3
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#585757',
                            boxWidth: 40
                        }
                    },
                    tooltips: {
                        displayColors: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            },
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            },
                        }]
                    }

                }
            });
        }

        <?php 
        $pending = isset($pending) && !empty($pending) ? $pending['order_status_count'] : 0;
        $completed = isset($completed) && !empty($completed) ? $completed['order_status_count'] : 0;
        $unfinished = isset($unfinished) && !empty($unfinished) ? $unfinished['order_status_count'] : 0;
        ?>

        var ctx = document.getElementById("chartOrderStatus")?.getContext('2d');
        if (ctx) {
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Completed", "Pending", "Unfinished"],
                    datasets: [{
                        backgroundColor: [
                            "#17a00e",
                            "#f41127",
                            "#fba540"
                        ],
                        data: [<?php echo $completed;?>, <?php echo $pending;?>, <?php echo $unfinished;?>],
                        borderWidth: [0, 0, 0]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutoutPercentage: 60,
                    legend: {
                        position: "bottom",
                        display: false,
                        labels: {
                            fontColor: '#ddd',
                            boxWidth: 15
                        }
                    }
                    ,
                    tooltips: {
                        displayColors: false
                    }
                }
            });
        }
    </script>
<?php } ?>