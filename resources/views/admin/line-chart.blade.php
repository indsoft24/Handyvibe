@extends('layouts.admin')

@section('title', 'Line Chart')

@section('content')
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Line Chart` }">
        @include('admin.partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div x-data="lineChart()"
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
            Line Chart
        </h3>

        <div id="lineChart" x-ref="lineChart" class="h-96"></div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("lineChart", () => ({
                init() {
                    let options = {
                        series: [{
                            name: "Sales",
                            data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45],
                        }, ],
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

                    let chart = new ApexCharts(this.$refs.lineChart, options);
                    chart.render();
                },
            }));
        });
    </script>
@endsection
