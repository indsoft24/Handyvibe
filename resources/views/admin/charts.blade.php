@extends('layouts.admin')

@section('title', 'Charts')

@section('content')
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Charts' }">
        @include('admin.partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div x-data="chartsPage()" class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Chart Navigation -->
        <div class="col-span-12">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
                    Chart Gallery
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Bar Chart Card -->
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="font-medium text-gray-800 dark:text-white mb-2">Bar Chart</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Revenue and profit comparison</p>
                        <a href="{{ route('admin.charts.bar') }}"
                            class="inline-flex items-center px-4 py-2 bg-brand-500 text-white rounded-lg hover:bg-brand-600">
                            View Chart
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <!-- Line Chart Card -->
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="font-medium text-gray-800 dark:text-white mb-2">Line Chart</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Sales trend over time</p>
                        <a href="{{ route('admin.charts.line') }}"
                            class="inline-flex items-center px-4 py-2 bg-brand-500 text-white rounded-lg hover:bg-brand-600">
                            View Chart
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <!-- Dashboard Charts Card -->
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="font-medium text-gray-800 dark:text-white mb-2">Dashboard Charts</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">All dashboard chart components</p>
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center px-4 py-2 bg-brand-500 text-white rounded-lg hover:bg-brand-600">
                            View Dashboard
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sample Charts Preview -->
        <div class="col-span-12">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
                    Chart Preview
                </h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Sample Bar Chart -->
                    <div>
                        <h4 class="font-medium text-gray-800 dark:text-white mb-4">Sample Bar Chart</h4>
                        <div id="sampleBarChart" class="h-64"></div>
                    </div>

                    <!-- Sample Line Chart -->
                    <div>
                        <h4 class="font-medium text-gray-800 dark:text-white mb-4">Sample Line Chart</h4>
                        <div id="sampleLineChart" class="h-64"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("chartsPage", () => ({
                init() {
                    // Initialize sample bar chart
                    this.initSampleBarChart();
                    // Initialize sample line chart
                    this.initSampleLineChart();
                },

                initSampleBarChart() {
                    const options = {
                        series: [{
                            name: "Sales",
                            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                        }],
                        chart: {
                            type: "bar",
                            height: 250,
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ["#465fff"],
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
                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                                "Sep"
                            ]
                        },
                        yaxis: {
                            title: {
                                text: "Sales ($)"
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
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#sampleBarChart"), options);
                    chart.render();
                },

                initSampleLineChart() {
                    const options = {
                        series: [{
                            name: "Revenue",
                            data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45]
                        }],
                        chart: {
                            type: "line",
                            height: 250,
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ["#12b76a"],
                        stroke: {
                            curve: "smooth",
                            width: 2
                        },
                        xaxis: {
                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                                "Sep", "Oct", "Nov", "Dec"
                            ]
                        },
                        yaxis: {
                            title: {
                                text: "Revenue ($)"
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "$ " + val + " thousands";
                                }
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#sampleLineChart"), options);
                    chart.render();
                }
            }));
        });
    </script>
@endsection
