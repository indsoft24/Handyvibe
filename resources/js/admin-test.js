// Test JavaScript functionality
console.log('Admin JavaScript loaded successfully!');

// Test Alpine.js
document.addEventListener('alpine:init', () => {
    console.log('Alpine.js initialized');
});

// Test ApexCharts availability
if (typeof ApexCharts !== 'undefined') {
    console.log('ApexCharts is available');
} else {
    console.error('ApexCharts is not loaded');
}

// Test Flatpickr availability
if (typeof flatpickr !== 'undefined') {
    console.log('Flatpickr is available');
} else {
    console.error('Flatpickr is not loaded');
}

// Test FullCalendar availability
if (typeof FullCalendar !== 'undefined') {
    console.log('FullCalendar is available');
} else {
    console.error('FullCalendar is not loaded');
}

// Test Swiper availability
if (typeof Swiper !== 'undefined') {
    console.log('Swiper is available');
} else {
    console.error('Swiper is not loaded');
}

// Test sidebar toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, testing interactive components...');
    
    // Test sidebar toggle
    const sidebarToggle = document.querySelector('[x-data]');
    if (sidebarToggle) {
        console.log('Sidebar Alpine.js component found');
    }
    
    // Test chart containers
    const chartOne = document.getElementById('chartOne');
    const chartTwo = document.getElementById('chartTwo');
    const chartThree = document.getElementById('chartThree');
    
    if (chartOne) console.log('Chart One container found');
    if (chartTwo) console.log('Chart Two container found');
    if (chartThree) console.log('Chart Three container found');
    
    // Test dropdown functionality
    const dropdowns = document.querySelectorAll('[x-data*="openDropDown"]');
    console.log(`Found ${dropdowns.length} dropdown components`);
    
    // Test dark mode toggle
    const darkModeToggle = document.querySelector('[x-data*="darkMode"]');
    if (darkModeToggle) {
        console.log('Dark mode toggle found');
    }
});

// Test chart initialization
window.testCharts = function() {
    console.log('Testing chart initialization...');
    
    if (typeof window.initChart01 === 'function') {
        console.log('Chart 01 function available');
        try {
            window.initChart01();
            console.log('Chart 01 initialized successfully');
        } catch (error) {
            console.error('Chart 01 initialization failed:', error);
        }
    }
    
    if (typeof window.initChart02 === 'function') {
        console.log('Chart 02 function available');
        try {
            window.initChart02();
            console.log('Chart 02 initialized successfully');
        } catch (error) {
            console.error('Chart 02 initialization failed:', error);
        }
    }
    
    if (typeof window.initChart03 === 'function') {
        console.log('Chart 03 function available');
        try {
            window.initChart03();
            console.log('Chart 03 initialized successfully');
        } catch (error) {
            console.error('Chart 03 initialization failed:', error);
        }
    }
};

// Test date picker initialization
window.testDatePicker = function() {
    console.log('Testing date picker initialization...');
    
    if (typeof window.initDatePicker === 'function') {
        console.log('Date picker function available');
        try {
            window.initDatePicker();
            console.log('Date picker initialized successfully');
        } catch (error) {
            console.error('Date picker initialization failed:', error);
        }
    }
};

// Test calendar initialization
window.testCalendar = function() {
    console.log('Testing calendar initialization...');
    
    if (typeof window.initCalendar === 'function') {
        console.log('Calendar function available');
        try {
            window.initCalendar();
            console.log('Calendar initialized successfully');
        } catch (error) {
            console.error('Calendar initialization failed:', error);
        }
    }
};

// Test swiper initialization
window.testSwiper = function() {
    console.log('Testing swiper initialization...');
    
    if (typeof window.initSwiper === 'function') {
        console.log('Swiper function available');
        try {
            window.initSwiper();
            console.log('Swiper initialized successfully');
        } catch (error) {
            console.error('Swiper initialization failed:', error);
        }
    }
};

// Run all tests
window.runAllTests = function() {
    console.log('=== Running All JavaScript Tests ===');
    window.testCharts();
    window.testDatePicker();
    window.testCalendar();
    window.testSwiper();
    console.log('=== All Tests Completed ===');
};

// Auto-run tests after a short delay
setTimeout(() => {
    window.runAllTests();
}, 1000);
