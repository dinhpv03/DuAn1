<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <p class="h4 text-center text-danger">BIỂU ĐỒ THỐNG KÊ</p>
                <div class="row">
                    <div class="col-6">
                        <div id="myChart" style="width:100%; max-width:1200px; height:500px;">

                        </div>

                        <script>
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawFirstChart);

                            function drawFirstChart() {
                                const data = google.visualization.arrayToDataTable([
                                    ['Thể loại', 'Số lượng phim'],
                                    <?php
                                    $tongdm = count($listThongKe);
                                    $i=1;
                                    foreach ($listThongKe as $thongke) {
                                        extract($thongke);
                                        if($i == $tongdm) {
                                            $dauphay = "";
                                        } else {
                                            $dauphay = ",";
                                        }
                                        echo "['".$thongke['the_loai']."', ".$thongke['countphim']."]". $dauphay;
                                        $i+=1;
                                    }
                                    ?>
                                ]);

                                const options = {
                                    title: 'Thống kê phim theo thể loại phim'
                                };

                                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>

                    <div class="col-6">
                        <div id="yourChart" style="width:100%; max-width:1200px; height:500px;">

                        </div>
                        <script>
                            google.charts.setOnLoadCallback(drawSecondChart);

                            function drawSecondChart() {
                                const data = google.visualization.arrayToDataTable([
                                    ['Phim', 'Số lượng bình luận'],
                                    <?php
                                    $tong = count($listThongKeBinhLuan);
                                    $i=1;
                                    foreach ($listThongKeBinhLuan as $thonke_binhluan) {
                                        extract($thonke_binhluan);
                                        if($i == $tong) {
                                            $dauphay = "";
                                        } else {
                                            $dauphay = ",";
                                        }
                                        echo "['".$thonke_binhluan['ten_phim']."', ".$thonke_binhluan['countbinhluan']."]". $dauphay;
                                        $i+=1;
                                    }
                                    ?>
                                ]);

                                const options = {
                                    title: 'Thống kê số lượng bình luận theo phim'
                                };

                                const chart = new google.visualization.PieChart(document.getElementById('yourChart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                </div>
            </div>


            <div id="lineChart"></div>
            <p class="h6 text-center text-danger">THỐNG KÊ SỐ VÉ THEO TỪNG PHIM</p>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const chartData = <?php echo $thongke_ve; ?>;

                    const seriesData = chartData.map(item => item.count_ve);
                    const categories = chartData.map(item => item.film_name);

                    const lineChart = new ApexCharts(document.querySelector("#lineChart"), {
                        series: [{
                            name: "Số lượng vé",
                            data: seriesData,
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: categories,
                        }
                    });

                    lineChart.render();
                });
            </script>
        </div>
    </section>
</main>
