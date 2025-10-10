@extends('layouts.admin')

@section('title', 'Line Chart')

@section('content')
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Line Chart</h3>
        </div>
        <div id="lineChart" class="h-96"></div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("lineChartData", () => ({
                init() {
                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.initLineChart();
                        }, 100);
                    });
                },

                initLineChart() {
                    const chartElement = document.getElementById('lineChart');
                    if (chartElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Sales",
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45],
                            }],
                            chart: {
                                type: "line",
                                height: 400,
                                toolbar: {
                                    show: false
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                width: 2
                            },
                            colors: ["#465fff"],
                            xaxis: {
                                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                                    "Sep", "Oct", "Nov", "Dec"
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: "Sales ($)"
                                }
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "$ " + val + " thousands";
                                    }
                                }
                            },
                        };
                        new ApexCharts(chartElement, options).render();
                    }
                }
            }));
        });
    </script>
@endsection
