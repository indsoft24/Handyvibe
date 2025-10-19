<!-- ===== Header Start ===== -->
<header x-data="{ dropdownOpen: false, notificationOpen: false, chatOpen: false }"
    class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-gray-dark dark:drop-shadow-none">
    <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
        <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
            <!-- Hamburger Toggle BTN -->
            <button @click="sidebarToggle = !sidebarToggle" aria-controls="sidebar" aria-expanded="false"
                class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden">
                <span class="relative block h-5.5 w-5.5 cursor-pointer">
                    <input type="checkbox" class="peer" />
                    <span
                        class="absolute inset-0 rounded-sm bg-gray-300 transition-all peer-checked:rotate-90 peer-checked:bg-brand-500 dark:bg-gray-800"></span>
                    <span
                        class="absolute inset-0 rounded-sm bg-gray-300 transition-all peer-checked:rotate-90 peer-checked:bg-brand-500 dark:bg-gray-800"></span>
                    <span
                        class="absolute inset-0 rounded-sm bg-gray-300 transition-all peer-checked:rotate-90 peer-checked:bg-brand-500 dark:bg-gray-800"></span>
                </span>
            </button>
            <!-- Hamburger Toggle BTN -->
        </div>

        <div class="hidden sm:block">
            <form action="https://formbold.com/s/unique_form_id" method="POST">
                <div class="relative">
                    <button class="absolute left-0 top-1/2 -translate-y-1/2">
                        <svg class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary"
                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                                fill="" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                                fill="" />
                        </svg>
                    </button>
                    <input type="text" placeholder="Type to search..."
                        class="w-full bg-transparent pl-9 pr-4 font-medium focus:outline-none xl:w-125" />
                </div>
            </form>
        </div>

        <div class="flex items-center gap-3 2xsm:gap-7">
            <ul class="flex items-center gap-2 2xsm:gap-4">
                <!-- Dark Mode Toggle -->
                <li>
                    <button @click="darkMode = !darkMode"
                        class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white">
                        <svg class="fill-current duration-300 ease-in-out" width="22" height="22"
                            viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path
                                    d="M11 10.8125C9.38438 10.8125 8.07812 9.50625 8.07812 7.89062C8.07812 6.275 9.38438 4.96875 11 4.96875C12.6156 4.96875 13.9219 6.275 13.9219 7.89062C13.9219 9.50625 12.6156 10.8125 11 10.8125ZM11 6.09375C10.1281 6.09375 9.32812 6.89375 9.32812 7.76562C9.32812 8.6375 10.1281 9.4375 11 9.4375C11.8719 9.4375 12.6719 8.6375 12.6719 7.76562C12.6719 6.89375 11.8719 6.09375 11 6.09375Z"
                                    fill="" />
                                <path
                                    d="M11 3.21875C8.2375 3.21875 5.875 5.58125 5.875 8.34375C5.875 11.1063 8.2375 13.4688 11 13.4688C13.7625 13.4688 16.125 11.1063 16.125 8.34375C16.125 5.58125 13.7625 3.21875 11 3.21875ZM11 12.2188C8.9375 12.2188 7.25 10.5313 7.25 8.46875C7.25 6.40625 8.9375 4.71875 11 4.71875C13.0625 4.71875 14.75 6.40625 14.75 8.46875C14.75 10.5313 13.0625 12.2188 11 12.2188Z"
                                    fill="" />
                            </g>
                        </svg>
                    </button>
                </li>
                <!-- Dark Mode Toggle -->

                <!-- Notification Menu Area -->
                <li>
                    <div class="relative">
                        <button @click="toggleNotificationDropdown()"
                            class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white">
                            <span class="absolute -top-0.5 -right-0.5 z-1 h-2 w-2 rounded-full bg-brand-500"
                                x-show="notificationCount > 0">
                                <span
                                    class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-brand-500 opacity-75"></span>
                            </span>
                            <svg class="fill-current duration-300 ease-in-out" width="18.22" height="19.5"
                                viewBox="0 0 18.22 19.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.9863 0.5C6.67219 0.5 3.17969 3.9925 3.17969 8.30656V9.93312C3.17969 10.8906 2.90531 11.8156 2.40531 12.6125L1.23719 14.4156C0.751563 15.1875 1.23719 16.25 2.10531 16.25H15.9047C16.7728 16.25 17.2584 15.1875 16.7728 14.4156L15.6047 12.6125C15.1047 11.8156 14.8303 10.8906 14.8303 9.93312V8.30656C14.8303 3.9925 11.3378 0.5 10.9863 0.5ZM16.7728 14.4156L15.6047 12.6125C15.1047 11.8156 14.8303 10.8906 14.8303 9.93312V8.30656C14.8303 5.1625 12.1303 2.4625 10.9863 2.4625C9.84219 2.4625 7.14219 5.1625 7.14219 8.30656V9.93312C7.14219 10.8906 6.86781 11.8156 6.36781 12.6125L5.19969 14.4156H16.7728Z"
                                    fill="" />
                                <path
                                    d="M13.0169 16.5969C12.668 16.3172 12.2038 16.3172 11.8547 16.5969C10.3819 17.925 7.61856 17.925 6.14562 16.5969C5.79656 16.3172 5.33237 16.3172 4.98331 16.5969C4.63437 16.8766 4.63437 17.3406 4.98331 17.6203C6.81562 19.0687 10.1847 19.0687 12.017 17.6203C12.3659 17.3406 12.3659 16.8766 12.0169 16.5969Z"
                                    fill="" />
                            </svg>
                        </button>

                        <!-- Notification Dropdown -->
                        <div x-show="notificationOpen" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.outside="notificationOpen = false"
                            class="absolute right-0 mt-4 w-80 rounded-sm border border-stroke bg-white shadow-xl dark:border-strokedark dark:bg-boxdark">
                            <div class="px-4 py-3 border-b border-stroke dark:border-strokedark">
                                <h3 class="text-sm font-medium text-black dark:text-white">Notifications</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400"
                                    x-text="notificationCount + ' unread'"></span>
                            </div>

                            <!-- Loading State -->
                            <div x-show="notificationsLoading" class="px-4 py-8 text-center">
                                <div class="inline-block animate-spin rounded-full h-6 w-6 border-b-2 border-brand-600">
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Loading notifications...</p>
                            </div>

                            <!-- Notifications List -->
                            <ul class="max-h-80 overflow-y-auto" x-show="!notificationsLoading">
                                <template x-for="notification in notifications" :key="notification.id">
                                    <li class="px-4 py-3 border-b border-stroke dark:border-strokedark hover:bg-gray-50 dark:hover:bg-meta-4 cursor-pointer"
                                        @click="openNotification(notification)">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full flex items-center justify-center"
                                                :class="getNotificationIconBg(notification.priority)">
                                                <svg class="h-4 w-4" :class="notification.icon_color"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" :d="notification.icon"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-black dark:text-white truncate"
                                                    x-text="notification.title"></p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate"
                                                    x-text="notification.message"></p>
                                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                                                    x-text="notification.time"></p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium"
                                                    :class="getPriorityBadgeClass(notification.priority)"
                                                    x-text="notification.priority"></span>
                                            </div>
                                        </div>
                                    </li>
                                </template>

                                <!-- Empty State -->
                                <li x-show="notifications.length === 0" class="px-4 py-8 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-5 5v-5zM9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">No notifications</p>
                                </li>
                            </ul>

                            <div class="px-4 py-3 border-t border-stroke dark:border-strokedark">
                                <a href="{{ route('admin.leads.index') }}"
                                    class="text-sm font-medium text-brand-600 dark:text-brand-400 hover:text-brand-700 dark:hover:text-brand-300">View
                                    all leads</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Notification Menu Area -->
            </ul>

            <!-- User Area -->
            @auth('admin')
                <div class="relative">
                    <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = !dropdownOpen">
                        <span class="h-12 w-12 rounded-full">
                            @if (auth('admin')->user()->avatar)
                                <img src="{{ asset('storage/' . auth('admin')->user()->avatar) }}"
                                    alt="{{ auth('admin')->user()->name }}"
                                    class="w-full h-full object-cover rounded-full" />
                            @else
                                <div
                                    class="w-full h-full bg-primary text-white rounded-full flex items-center justify-center text-lg font-semibold">
                                    {{ strtoupper(substr(auth('admin')->user()->name, 0, 2)) }}
                                </div>
                            @endif
                        </span>
                        <span class="hidden text-left lg:block">
                            <span
                                class="block text-sm font-medium text-black dark:text-white">{{ auth('admin')->user()->name }}</span>
                            <span class="block text-xs">{{ ucfirst(auth('admin')->user()->role) }}</span>
                        </span>
                        <svg class="hidden fill-current text-gray-400 sm:block" width="12" height="8"
                            viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                                fill="" />
                        </svg>
                    </a>

                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        @click.outside="dropdownOpen = false"
                        class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-xl dark:border-strokedark dark:bg-boxdark sm:w-80">
                        <div class="flex items-center gap-3 px-4 py-3">
                            <div class="h-10 w-10 rounded-full">
                                @if (auth('admin')->user()->avatar)
                                    <img src="{{ asset('storage/' . auth('admin')->user()->avatar) }}"
                                        alt="{{ auth('admin')->user()->name }}"
                                        class="w-full h-full object-cover rounded-full" />
                                @else
                                    <div
                                        class="w-full h-full bg-primary text-white rounded-full flex items-center justify-center text-sm font-semibold">
                                        {{ strtoupper(substr(auth('admin')->user()->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('admin.profile') }}"
                                    class="text-sm font-medium text-black dark:text-white">{{ auth('admin')->user()->name }}</a>
                                <p class="text-xs">{{ ucfirst(auth('admin')->user()->role) }}</p>
                            </div>
                        </div>
                        <ul class="flex flex-col overflow-y-auto">
                            <li>
                                <a class="flex items-center gap-4 px-4 py-2 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base"
                                    href="{{ route('admin.profile') }}">
                                    <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 9.62499C8.42188 9.62499 6.35938 7.59687 6.35938 5.12187C6.35938 2.64687 8.42188 0.618744 11 0.618744C13.5781 0.618744 15.6406 2.64687 15.6406 5.12187C15.6406 7.59687 13.5781 9.62499 11 9.62499ZM11 2.16562C9.28125 2.16562 7.90625 3.50624 7.90625 5.12187C7.90625 6.73749 9.28125 8.07812 11 8.07812C12.7188 8.07812 14.0938 6.73749 14.0938 5.12187C14.0938 3.50624 12.7188 2.16562 11 2.16562Z"
                                            fill="" />
                                        <path
                                            d="M17.7719 21.4156H4.2281C3.5406 21.4156 2.9906 20.8656 2.9906 20.1781V17.0844C2.9906 13.7156 5.7406 10.9656 9.10935 10.9656H12.925C16.2937 10.9656 19.0437 13.7156 19.0437 17.0844V20.1781C19.0094 20.8312 18.4594 21.4156 17.7719 21.4156ZM4.53748 19.8687H17.4969V17.0844C17.4969 14.575 15.4344 12.5125 12.925 12.5125H9.07498C6.5656 12.5125 4.5031 14.575 4.5031 17.0844V19.8687H4.53748Z"
                                            fill="" />
                                    </svg>
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-4 px-4 py-2 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base"
                                    href="#">
                                    <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.9833 19.8083C11.8083 19.8083 11.6333 19.7833 11.4583 19.7333C7.81668 18.7167 4.64168 16.3667 2.38335 13.0167C1.92498 12.3833 1.92498 11.6167 2.38335 10.9833C4.63335 7.63333 7.81668 5.28333 11.4583 4.26666C11.6333 4.21666 11.8083 4.19166 11.9833 4.19166C12.1583 4.19166 12.3333 4.21666 12.5083 4.26666C16.15 5.28333 19.325 7.63333 21.5833 10.9833C22.0417 11.6167 22.0417 12.3833 21.5833 13.0167C19.325 16.3667 16.15 18.7167 12.5083 19.7333C12.3333 19.7833 12.1583 19.8083 11.9833 19.8083ZM11.9833 6.14999C8.51668 6.14999 5.38335 8.28333 3.58335 11.3333C5.38335 14.3833 8.51668 16.5167 11.9833 16.5167C15.45 16.5167 18.5833 14.3833 20.3833 11.3333C18.5833 8.28333 15.45 6.14999 11.9833 6.14999Z"
                                            fill="" />
                                        <path
                                            d="M11.9833 14.125C10.8417 14.125 9.90835 13.1917 9.90835 12.05C9.90835 10.9083 10.8417 9.975 11.9833 9.975C13.125 9.975 14.0583 10.9083 14.0583 12.05C14.0583 13.1917 13.125 14.125 11.9833 14.125ZM11.9833 11.475C11.6083 11.475 11.2833 11.8 11.2833 12.175C11.2833 12.55 11.6083 12.875 11.9833 12.875C12.3583 12.875 12.6833 12.55 12.6833 12.175C12.6833 11.8 12.3583 11.475 11.9833 11.475Z"
                                            fill="" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center gap-4 px-4 py-2 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base w-full text-left">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.425C10.0031 5.31874 10.7594 6.07499 11.6531 6.07499H15.5375C16.4312 6.07499 17.1875 5.31874 17.1875 4.425V2.23437C17.1875 1.32187 16.4312 0.618744 15.5375 0.618744ZM15.5375 2.18437C15.5375 2.26874 15.5375 2.26874 15.5375 2.26874H11.6531C11.5687 2.26874 11.5687 2.26874 11.5687 2.18437V2.18437C11.5687 2.1 11.5687 2.1 11.6531 2.1H15.5375C15.6219 2.1 15.6219 2.1 15.5375 2.18437Z"
                                                fill="" />
                                            <path
                                                d="M6.10313 0.618744H2.21875C1.325 0.618744 0.56875 1.37499 0.56875 2.26874V4.425C0.56875 5.31874 1.325 6.07499 2.21875 6.07499H6.10312C6.99687 6.07499 7.75312 5.31874 7.75312 4.425V2.23437C7.75312 1.32187 6.99687 0.618744 6.10313 0.618744ZM6.10313 2.18437C6.10313 2.26874 6.10313 2.26874 6.10313 2.26874H2.21875C2.13437 2.26874 2.13437 2.26874 2.13437 2.18437V2.18437C2.13437 2.1 2.13437 2.1 2.21875 2.1H6.10313C6.1875 2.1 6.1875 2.1 6.10313 2.18437Z"
                                                fill="" />
                                            <path
                                                d="M15.5375 8.29374H11.6531C10.7594 8.29374 10.0031 9.04999 10.0031 9.94374V12.1C10.0031 12.9937 10.7594 13.75 11.6531 13.75H15.5375C16.4312 13.75 17.1875 12.9937 17.1875 12.1V9.94374C17.1875 9.03124 16.4312 8.29374 15.5375 8.29374ZM15.5375 9.85937C15.5375 9.94374 15.5375 9.94374 15.5375 9.94374H11.6531C11.5687 9.94374 11.5687 9.94374 11.5687 9.85937V9.85937C11.5687 9.775 11.5687 9.775 11.6531 9.775H15.5375C15.6219 9.775 15.6219 9.775 15.5375 9.85937Z"
                                                fill="" />
                                            <path
                                                d="M6.10313 8.29374H2.21875C1.325 8.29374 0.56875 9.04999 0.56875 9.94374V12.1C0.56875 12.9937 1.325 13.75 2.21875 13.75H6.10312C6.99687 13.75 7.75312 12.9937 7.75312 12.1V9.94374C7.75312 9.03124 6.99687 8.29374 6.10313 8.29374ZM6.10313 9.85937C6.10313 9.94374 6.10313 9.94374 6.10313 9.94374H2.21875C2.13437 9.94374 2.13437 9.94374 2.13437 9.85937V9.85937C2.13437 9.775 2.13437 9.775 2.21875 9.775H6.10313C6.1875 9.775 6.1875 9.775 6.10313 9.85937Z"
                                                fill="" />
                                            <path
                                                d="M15.5375 15.9687H11.6531C10.7594 15.9687 10.0031 16.725 10.0031 17.6187V19.775C10.0031 20.6687 10.7594 21.425 11.6531 21.425H15.5375C16.4312 21.425 17.1875 20.6687 17.1875 19.775V17.6187C17.1875 16.7062 16.4312 15.9687 15.5375 15.9687ZM15.5375 17.5344C15.5375 17.6187 15.5375 17.6187 15.5375 17.6187H11.6531C11.5687 17.6187 11.5687 17.6187 11.5687 17.5344V17.5344C11.5687 17.45 11.5687 17.45 11.6531 17.45H15.5375C15.6219 17.45 15.6219 17.45 15.5375 17.5344Z"
                                                fill="" />
                                            <path
                                                d="M6.10313 15.9687H2.21875C1.325 15.9687 0.56875 16.725 0.56875 17.6187V19.775C0.56875 20.6687 1.325 21.425 2.21875 21.425H6.10312C6.99687 21.425 7.75312 20.6687 7.75312 19.775V17.6187C7.75312 16.7062 6.99687 15.9687 6.10313 15.9687ZM6.10313 17.5344C6.10313 17.6187 6.10313 17.6187 6.10313 17.6187H2.21875C2.13437 17.6187 2.13437 17.6187 2.13437 17.5344V17.5344C2.13437 17.45 2.13437 17.45 2.21875 17.45H6.10313C6.1875 17.45 6.1875 17.45 6.10313 17.5344Z"
                                                fill="" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown End -->
                </div>
            @endauth
            <!-- User Area -->
        </div>
    </div>
</header>
<!-- ===== Header End ===== -->
