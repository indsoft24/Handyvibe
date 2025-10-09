// Admin Panel JavaScript
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import ApexCharts from "apexcharts";
import flatpickr from "flatpickr";

// Initialize Alpine.js with persist plugin
Alpine.plugin(persist);
window.Alpine = Alpine;

// Chart configurations
window.initChart01 = function () {
    const chartOneOptions = {
        series: [
            {
                name: "Sales",
                data: [
                    168, 385, 201, 298, 187, 195, 291, 110, 215, 390, 280, 112,
                ],
            },
        ],
        colors: ["#465fff"],
        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "bar",
            height: 180,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "39%",
                borderRadius: 5,
                borderRadiusApplication: "end",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 4,
            colors: ["transparent"],
        },
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
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Outfit",
            markers: {
                radius: 99,
            },
        },
        yaxis: {
            title: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            x: {
                show: false,
            },
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };

    const chartSelector = document.querySelector("#chartOne");
    if (chartSelector) {
        const chart = new ApexCharts(chartSelector, chartOneOptions);
        chart.render();
    }
};

window.initChart02 = function () {
    const chartTwoOptions = {
        series: [75.55],
        colors: ["#465FFF"],
        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "radialBar",
            height: 330,
            sparkline: {
                enabled: true,
            },
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                hollow: {
                    size: "80%",
                },
                track: {
                    background: "#E4E7EC",
                    strokeWidth: "100%",
                    margin: 5,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: "36px",
                        fontWeight: "600",
                        offsetY: 60,
                        color: "#1D2939",
                        formatter: function (val) {
                            return val + "%";
                        },
                    },
                },
            },
        },
        fill: {
            type: "solid",
            colors: ["#465FFF"],
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"],
    };

    const chartSelector = document.querySelector("#chartTwo");
    if (chartSelector) {
        const chart = new ApexCharts(chartSelector, chartTwoOptions);
        chart.render();
    }
};

window.initChart03 = function () {
    const chartThreeOptions = {
        series: [
            {
                name: "Sales",
                data: [
                    168, 385, 201, 298, 187, 195, 291, 110, 215, 390, 280, 112,
                ],
            },
            {
                name: "Revenue",
                data: [
                    200, 300, 250, 350, 220, 280, 320, 150, 250, 400, 300, 150,
                ],
            },
        ],
        colors: ["#465fff", "#12b76a"],
        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "line",
            height: 300,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            curve: "smooth",
            width: 3,
        },
        dataLabels: {
            enabled: false,
        },
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
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Outfit",
        },
        yaxis: {
            title: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#465fff", "#12b76a"],
                inverseColors: false,
                opacityFrom: 0.8,
                opacityTo: 0.1,
                stops: [0, 100],
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };

    const chartSelector = document.querySelector("#chartThree");
    if (chartSelector) {
        const chart = new ApexCharts(chartSelector, chartThreeOptions);
        chart.render();
    }
};

// Initialize Flatpickr
window.initDatePicker = function () {
    flatpickr(".datepicker", {
        mode: "range",
        static: true,
        monthSelectorType: "static",
        dateFormat: "M j, Y",
        defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
        prevArrow:
            '<svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.25 6L9 12.25L15.25 18.5" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        nextArrow:
            '<svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.75 19L15 12.75L8.75 6.5" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        onReady: (selectedDates, dateStr, instance) => {
            instance.element.value = dateStr.replace("to", "-");
            const customClass = instance.element.getAttribute("data-class");
            if (customClass) {
                instance.calendarContainer.classList.add(customClass);
            }
        },
        onChange: (selectedDates, dateStr, instance) => {
            instance.element.value = dateStr.replace("to", "-");
        },
    });
};

// Initialize FullCalendar
window.initCalendar = function () {
    if (typeof FullCalendar !== "undefined") {
        const calendarEl = document.getElementById("calendar");
        if (calendarEl) {
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                events: [
                    {
                        title: "Meeting",
                        start: "2024-01-15",
                        className: "bg-brand-500 text-white",
                    },
                    {
                        title: "Conference",
                        start: "2024-01-20",
                        end: "2024-01-22",
                        className: "bg-success-500 text-white",
                    },
                ],
            });
            calendar.render();
        }
    }
};

// Initialize Swiper
window.initSwiper = function () {
    if (typeof Swiper !== "undefined") {
        const swiperElements = document.querySelectorAll(".swiper");
        swiperElements.forEach((element) => {
            new Swiper(element, {
                slidesPerView: 1,
                spaceBetween: 30,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    }
};

// Initialize all components when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    // Initialize charts
    window.initChart01();
    window.initChart02();
    window.initChart03();

    // Initialize date picker
    window.initDatePicker();

    // Initialize calendar
    window.initCalendar();

    // Initialize swiper
    window.initSwiper();
});

// Initialize Alpine.js
Alpine.start();
