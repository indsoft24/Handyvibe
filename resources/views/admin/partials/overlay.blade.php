<!-- ===== Overlay Start ===== -->
<div x-show="sidebarToggle" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarToggle = false"
     class="fixed inset-0 z-9998 bg-black bg-opacity-50 lg:hidden"></div>
<!-- ===== Overlay End ===== -->