@extends('layouts.admin')

@section('title', 'Bar Chart')

@section('content')
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bar Chart</h3>
        </div>
        <div id="barChart" class="h-96"></div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("barChartData", () => ({
                init() {
                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.initBarChart();
                        }, 100);
                    });
                },

                initBarChart() {
                    const chartElement = document.getElementById('barChart');
                    if (chartElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Revenue",
                                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                            }],
                            chart: {
                                type: "bar",
                                height: 400,
                                toolbar: {
                                    show: false
                                },
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: "55%",
                                    endingShape: "rounded"
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"]
                            },
                            xaxis: {
                                categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                    "Oct"
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: "$ (thousands)"
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "$ " + val + " thousands";
                                    }
                                }
                            },
                            colors: ["#465fff"],
                        };
                        new ApexCharts(chartElement, options).render();
                    }
                }
            }));
        });
    </script>
@endsection
