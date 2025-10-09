@extends('layouts.admin')

@section('title', 'Bar Chart')

@section('content')
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Bar Chart` }">
        @include('admin.partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div x-data="barChart()"
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
            Bar Chart
        </h3>

        <div id="barChart" x-ref="barChart" class="h-96"></div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("barChart", () => ({
                init() {
                    let options = {
                        series: [{
                                name: "Revenue",
                                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                            },
                            {
                                name: "Profit",
                                data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                            },
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

                    let chart = new ApexCharts(this.$refs.barChart, options);
                    chart.render();
                },
            }));
        });
    </script>
@endsection
