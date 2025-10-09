@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div x-data="dashboardCharts()" class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6 xl:col-span-7">
            <!-- Metric Group One -->
            @include('admin.partials.metric-group.metric-group-01')
            <!-- Metric Group One -->

            <!-- ====== Chart One Start -->
            @include('admin.partials.chart.chart-01')
            <!-- ====== Chart One End -->
        </div>
        <div class="col-span-12 xl:col-span-5">
            <!-- ====== Chart Two Start -->
            @include('admin.partials.chart.chart-02')
            <!-- ====== Chart Two End -->
        </div>

        <div class="col-span-12">
            <!-- ====== Chart Three Start -->
            @include('admin.partials.chart.chart-03')
            <!-- ====== Chart Three End -->
        </div>

        <div class="col-span-12 xl:col-span-5">
            <!-- ====== Map One Start -->
            @include('admin.partials.map-01')
            <!-- ====== Map One End -->
        </div>

        <div class="col-span-12 xl:col-span-7">
            <!-- ====== Table One Start -->
            @include('admin.partials.table.table-01')
            <!-- ====== Table One End -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("dashboardCharts", () => ({
                init() {
                    // Wait for DOM to be fully ready
                    this.$nextTick(() => {
                        setTimeout(() => {
                            // Initialize all dashboard charts
                            this.initChartOne();
                            this.initChartTwo();
                            this.initChartThree();
                        }, 100);
                    });
                },

                initChartOne() {
                    const chartOneElement = document.getElementById('chartOne');
                    if (chartOneElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Sales",
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45],
                            }],
                            chart: {
                                type: "area",
                                height: 350,
                                toolbar: {
                                    show: false,
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                width: 2,
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.3,
                                    stops: [0, 90, 100]
                                }
                            },
                            colors: ["#465fff"],
                            xaxis: {
                                categories: [
                                    "Jan",
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "May",
                                    "Jun",
                                    "Jul",
                                    "Aug",
                                    "Sep",
                                    "Oct",
                                    "Nov",
                                    "Dec",
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: "Sales ($)",
                                },
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "$ " + val + " thousands";
                                    },
                                },
                            },
                        };

                        const chart = new ApexCharts(chartOneElement, options);
                        chart.render();
                    }
                },

                initChartTwo() {
                    const chartTwoElement = document.getElementById('chartTwo');
                    if (chartTwoElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                    name: "Revenue",
                                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                                },
                                {
                                    name: "Profit",
                                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                                }
                            ],
                            chart: {
                                type: "bar",
                                height: 350,
                                toolbar: {
                                    show: false,
                                },
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: "55%",
                                    endingShape: "rounded",
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                categories: [
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "May",
                                    "Jun",
                                    "Jul",
                                    "Aug",
                                    "Sep",
                                    "Oct",
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: "$ (thousands)",
                                },
                            },
                            fill: {
                                opacity: 1,
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "$ " + val + " thousands";
                                    },
                                },
                            },
                            colors: ["#465fff", "#12b76a"],
                        };

                        const chart = new ApexCharts(chartTwoElement, options);
                        chart.render();
                    }
                },

                initChartThree() {
                    const chartThreeElement = document.getElementById('chartThree');
                    if (chartThreeElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Sales",
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45],
                            }],
                            chart: {
                                type: "line",
                                height: 350,
                                toolbar: {
                                    show: false,
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                width: 2,
                            },
                            colors: ["#465fff"],
                            xaxis: {
                                categories: [
                                    "Jan",
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "May",
                                    "Jun",
                                    "Jul",
                                    "Aug",
                                    "Sep",
                                    "Oct",
                                    "Nov",
                                    "Dec",
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: "Sales ($)",
                                },
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "$ " + val + " thousands";
                                    },
                                },
                            },
                        };

                        const chart = new ApexCharts(chartThreeElement, options);
                        chart.render();
                    }
                }
            }));
        });
    </script>
@endsection
