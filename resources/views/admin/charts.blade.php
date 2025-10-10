@extends('layouts.admin')

@section('title', 'Charts')

@section('content')
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sales Chart</h3>
            </div>
            <div id="salesChart" class="h-80"></div>
        </div>

        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Chart</h3>
            </div>
            <div id="revenueChart" class="h-80"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("chartsData", () => ({
                init() {
                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.initSalesChart();
                            this.initRevenueChart();
                        }, 100);
                    });
                },

                initSalesChart() {
                    const chartElement = document.getElementById('salesChart');
                    if (chartElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Sales",
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45],
                            }],
                            chart: {
                                type: "area",
                                height: 350,
                                toolbar: {
                                    show: false
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                width: 2
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
                },

                initRevenueChart() {
                    const chartElement = document.getElementById('revenueChart');
                    if (chartElement && typeof ApexCharts !== 'undefined') {
                        const options = {
                            series: [{
                                name: "Revenue",
                                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                            }],
                            chart: {
                                type: "bar",
                                height: 350,
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
                            colors: ["#12b76a"],
                        };
                        new ApexCharts(chartElement, options).render();
                    }
                }
            }));
        });
    </script>
@endsection
