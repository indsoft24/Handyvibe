<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full lg:translate-x-0'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 duration-300 ease-linear dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="sidebar-header flex items-center gap-2 pb-7 pt-8">
        <a href="{{ route('admin.dashboard') }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="{{ asset('images/logo.jpg') }}" alt="Logo" />
                <img class="hidden dark:block" src="{{ asset('images/logo.jpg') }}" alt="Logo" />
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="{{ asset('images/logo.jpg') }}"
                alt="Logo" />
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav x-data="{ selected: 'Dashboard' }">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="menu-group-icon mx-auto fill-current" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill="" />
                    </svg>
                </h3>

                <ul class="mb-6 flex flex-col gap-4">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-item group {{ request()->routeIs('admin.dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.dashboard') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Dashboard -->

                    <!-- Menu Item Categories -->
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="menu-item group {{ request()->routeIs('admin.categories.*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.categories.*') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Categories
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Categories -->

                    <!-- Menu Item Sub Categories -->
                    <li>
                        <a href="{{ route('admin.sub-categories.index') }}"
                            class="menu-item group {{ request()->routeIs('admin.sub-categories.*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.sub-categories.*') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Sub Categories
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Sub Categories -->

                    <!-- Menu Item Products -->
                    <li>
                        <a href="{{ route('admin.products.index') }}"
                            class="menu-item group {{ request()->routeIs('admin.products.*') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.products.*') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Products
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Products -->

                    <!-- Menu Item Profile -->
                    <li>
                        <a href="{{ route('admin.profile') }}"
                            class="menu-item group {{ request()->routeIs('admin.profile') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.profile') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 9.62499C8.42188 9.62499 6.35938 7.59687 6.35938 5.12187C6.35938 2.64687 8.42188 0.618744 11 0.618744C13.5781 0.618744 15.6406 2.64687 15.6406 5.12187C15.6406 7.59687 13.5781 9.62499 11 9.62499ZM11 2.16562C9.28125 2.16562 7.90625 3.50624 7.90625 5.12187C7.90625 6.73749 9.28125 8.07812 11 8.07812C12.7188 8.07812 14.0938 6.73749 14.0938 5.12187C14.0938 3.50624 12.7188 2.16562 11 2.16562Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.7719 21.4156H4.2281C3.5406 21.4156 2.9906 20.8656 2.9906 20.1781V17.0844C2.9906 13.7156 5.7406 10.9656 9.10935 10.9656H12.925C16.2937 10.9656 19.0437 13.7156 19.0437 17.0844V20.1781C19.0094 20.8312 18.4594 21.4156 17.7719 21.4156ZM4.53748 19.8687H17.4969V17.0844C17.4969 14.575 15.4344 12.5125 12.925 12.5125H9.07498C6.5656 12.5125 4.5031 14.575 4.5031 17.0844V19.8687H4.53748Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Profile
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Profile -->

                    <!-- Menu Item Calendar -->
                    <li>
                        <a href="{{ route('admin.calendar') }}"
                            class="menu-item group {{ request()->routeIs('admin.calendar') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.calendar') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 1.5C8.25 1.08579 7.91421 0.75 7.5 0.75C7.08579 0.75 6.75 1.08579 6.75 1.5V2.25H5.25C3.45507 2.25 2 3.70507 2 5.5V18.75C2 20.5449 3.45507 22 5.25 22H18.75C20.5449 22 22 20.5449 22 18.75V5.5C22 3.70507 20.5449 2.25 18.75 2.25H17.25V1.5C17.25 1.08579 16.9142 0.75 16.5 0.75C16.0858 0.75 15.75 1.08579 15.75 1.5V2.25H8.25V1.5ZM3.5 5.5C3.5 4.5335 4.2835 3.75 5.25 3.75H18.75C19.7165 3.75 20.5 4.5335 20.5 5.5V18.75C20.5 19.7165 19.7165 20.5 18.75 20.5H5.25C4.2835 20.5 3.5 19.7165 3.5 18.75V5.5Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 6.75C6.75 6.33579 7.08579 6 7.5 6C7.91421 6 8.25 6.33579 8.25 6.75V7.5C8.25 7.91421 7.91421 8.25 7.5 8.25C7.08579 8.25 6.75 7.91421 6.75 7.5V6.75ZM10.5 6.75C10.5 6.33579 10.8358 6 11.25 6C11.6642 6 12 6.33579 12 6.75V7.5C12 7.91421 11.6642 8.25 11.25 8.25C10.8358 8.25 10.5 7.91421 10.5 7.5V6.75ZM15 6.75C15 6.33579 15.3358 6 15.75 6C16.1642 6 16.5 6.33579 16.5 6.75V7.5C16.5 7.91421 16.1642 8.25 15.75 8.25C15.3358 8.25 15 7.91421 15 7.5V6.75ZM6.75 10.5C6.75 10.0858 7.08579 9.75 7.5 9.75C7.91421 9.75 8.25 10.0858 8.25 10.5V11.25C8.25 11.6642 7.91421 12 7.5 12C7.08579 12 6.75 11.6642 6.75 11.25V10.5ZM10.5 10.5C10.5 10.0858 10.8358 9.75 11.25 9.75C11.6642 9.75 12 10.0858 12 10.5V11.25C12 11.6642 11.6642 12 11.25 12C10.8358 12 10.5 11.6642 10.5 11.25V10.5ZM15 10.5C15 10.0858 15.3358 9.75 15.75 9.75C16.1642 9.75 16.5 10.0858 16.5 10.5V11.25C16.5 11.6642 16.1642 12 15.75 12C15.3358 12 15 11.6642 15 11.25V10.5ZM6.75 14.25C6.75 13.8358 7.08579 13.5 7.5 13.5C7.91421 13.5 8.25 13.8358 8.25 14.25V15C8.25 15.4142 7.91421 15.75 7.5 15.75C7.08579 15.75 6.75 15.4142 6.75 15V14.25ZM10.5 14.25C10.5 13.8358 10.8358 13.5 11.25 13.5C11.6642 13.5 12 13.8358 12 14.25V15C12 15.4142 11.6642 15.75 11.25 15.75C10.8358 15.75 10.5 15.4142 10.5 15V14.25ZM15 14.25C15 13.8358 15.3358 13.5 15.75 13.5C16.1642 13.5 16.5 13.8358 16.5 14.25V15C16.5 15.4142 16.1642 15.75 15.75 15.75C15.3358 15.75 15 15.4142 15 15V14.25Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Calendar
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Calendar -->

                    <!-- Menu Item Media -->
                    <li>
                        <a href="#" @click.prevent="selected = (selected === 'Media' ? '':'Media')"
                            class="menu-item group"
                            :class="selected === 'Media' ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="selected === 'Media' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 5.25C3 3.45507 4.45507 2 6.25 2H17.75C19.5449 2 21 3.45507 21 5.25V18.75C21 20.5449 19.5449 22 17.75 22H6.25C4.45507 22 3 20.5449 3 18.75V5.25ZM6.25 3.5C5.2835 3.5 4.5 4.2835 4.5 5.25V18.75C4.5 19.7165 5.2835 20.5 6.25 20.5H17.75C18.7165 20.5 19.5 19.7165 19.5 18.75V5.25C19.5 4.2835 18.7165 3.5 17.75 3.5H6.25Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 8.25C8.25 7.00736 9.25736 6 10.5 6H13.5C14.7426 6 15.75 7.00736 15.75 8.25V15.75C15.75 16.9926 14.7426 18 13.5 18H10.5C9.25736 18 8.25 16.9926 8.25 15.75V8.25ZM10.5 7.5C10.0858 7.5 9.75 7.83579 9.75 8.25V15.75C9.75 16.1642 10.0858 16.5 10.5 16.5H13.5C13.9142 16.5 14.25 16.1642 14.25 15.75V8.25C14.25 7.83579 13.9142 7.5 13.5 7.5H10.5Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 9.75C6.75 9.33579 7.08579 9 7.5 9C7.91421 9 8.25 9.33579 8.25 9.75V14.25C8.25 14.6642 7.91421 15 7.5 15C7.08579 15 6.75 14.6642 6.75 14.25V9.75ZM15.75 9.75C15.75 9.33579 16.0858 9 16.5 9C16.9142 9 17.25 9.33579 17.25 9.75V14.25C17.25 14.6642 16.9142 15 16.5 15C16.0858 15 15.75 14.6642 15.75 14.25V9.75Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Media
                            </span>

                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Media') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.50008 14.1666L12.5001 9.16664L7.50008 4.16664" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div x-show="selected === 'Media'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" class="menu-dropdown"
                            :class="sidebarToggle ? 'lg:hidden' : ''">
                            <ul class="mt-4 mb-5.5 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a href="{{ route('admin.images') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.images') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Images
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.videos') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.videos') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Videos
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Menu Item Media -->

                    <!-- Menu Item Tables -->
                    <li>
                        <a href="{{ route('admin.tables') }}"
                            class="menu-item group {{ request()->routeIs('admin.tables') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.tables') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 4.5C3 3.11929 4.11929 2 5.5 2H18.5C19.8807 2 21 3.11929 21 4.5V19.5C21 20.8807 19.8807 22 18.5 22H5.5C4.11929 22 3 20.8807 3 19.5V4.5ZM5.5 3.5C5.22386 3.5 5 3.72386 5 4V19C5 19.2761 5.22386 19.5 5.5 19.5H18.5C18.7761 19.5 19 19.2761 19 19V4C19 3.72386 18.7761 3.5 18.5 3.5H5.5Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 6.5C7 6.22386 7.22386 6 7.5 6H16.5C16.7761 6 17 6.22386 17 6.5C17 6.77614 16.7761 7 16.5 7H7.5C7.22386 7 7 6.77614 7 6.5ZM7 9.5C7 9.22386 7.22386 9 7.5 9H16.5C16.7761 9 17 9.22386 17 9.5C17 9.77614 16.7761 10 16.5 10H7.5C7.22386 10 7 9.77614 7 9.5ZM7 12.5C7 12.2239 7.22386 12 7.5 12H16.5C16.7761 12 17 12.2239 17 12.5C17 12.7761 16.7761 13 16.5 13H7.5C7.22386 13 7 12.7761 7 12.5ZM7 15.5C7 15.2239 7.22386 15 7.5 15H16.5C16.7761 15 17 15.2239 17 15.5C17 15.7761 16.7761 16 16.5 16H7.5C7.22386 16 7 15.7761 7 15.5Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Tables
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Tables -->

                    <!-- Menu Item Charts -->
                    <li>
                        <a href="#" @click.prevent="selected = (selected === 'Charts' ? '':'Charts')"
                            class="menu-item group"
                            :class="selected === 'Charts' ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="selected === 'Charts' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V3ZM5 4V20H19V4H5Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 8C7 7.44772 7.44772 7 8 7H16C16.5523 7 17 7.44772 17 8C17 8.55228 16.5523 9 16 9H8C7.44772 9 7 8.55228 7 8ZM7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12ZM7 16C7 15.4477 7.44772 15 8 15H16C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17H8C7.44772 17 7 16.5523 7 16Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Charts
                            </span>

                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Charts') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.50008 14.1666L12.5001 9.16664L7.50008 4.16664" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div x-show="selected === 'Charts'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" class="menu-dropdown"
                            :class="sidebarToggle ? 'lg:hidden' : ''">
                            <ul class="mt-4 mb-5.5 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a href="{{ route('admin.charts') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.charts') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        All Charts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.charts.bar') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.charts.bar') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Bar Chart
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.charts.line') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.charts.line') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Line Chart
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Menu Item Charts -->

                    <!-- Menu Item Forms -->
                    <li>
                        <a href="{{ route('admin.forms') }}"
                            class="menu-item group {{ request()->routeIs('admin.forms') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            <svg class="{{ request()->routeIs('admin.forms') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 6C3 4.34315 4.34315 3 6 3H18C19.6569 3 21 4.34315 21 6V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V6ZM6 4.5C5.17157 4.5 4.5 5.17157 4.5 6V18C4.5 18.8284 5.17157 19.5 6 19.5H18C18.8284 19.5 19.5 18.8284 19.5 18V6C19.5 5.17157 18.8284 4.5 18 4.5H6Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.5 8.25C7.5 7.83579 7.83579 7.5 8.25 7.5H15.75C16.1642 7.5 16.5 7.83579 16.5 8.25C16.5 8.66421 16.1642 9 15.75 9H8.25C7.83579 9 7.5 8.66421 7.5 8.25ZM7.5 12C7.5 11.5858 7.83579 11.25 8.25 11.25H15.75C16.1642 11.25 16.5 11.5858 16.5 12C16.5 12.4142 16.1642 12.75 15.75 12.75H8.25C7.83579 12.75 7.5 12.4142 7.5 12ZM7.5 15.75C7.5 15.3358 7.83579 15 8.25 15H15.75C16.1642 15 16.5 15.3358 16.5 15.75C16.5 16.1642 16.1642 16.5 15.75 16.5H8.25C7.83579 16.5 7.5 16.1642 7.5 15.75Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Forms
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Forms -->

                    <!-- Menu Item Components -->
                    <li>
                        <a href="#" @click.prevent="selected = (selected === 'Components' ? '':'Components')"
                            class="menu-item group"
                            :class="selected === 'Components' ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="selected === 'Components' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12C3.5 7.30558 7.30558 3.5 12 3.5Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 6.5C9.23858 6.5 7 8.73858 7 11.5C7 14.2614 9.23858 16.5 12 16.5C14.7614 16.5 17 14.2614 17 11.5C17 8.73858 14.7614 6.5 12 6.5ZM12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Components
                            </span>

                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Components') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.50008 14.1666L12.5001 9.16664L7.50008 4.16664" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div x-show="selected === 'Components'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" class="menu-dropdown"
                            :class="sidebarToggle ? 'lg:hidden' : ''">
                            <ul class="mt-4 mb-5.5 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a href="{{ route('admin.components') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.components') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        All Components
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.components.alerts') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.components.alerts') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Alerts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.components.avatars') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.components.avatars') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Avatars
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.components.badges') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.components.badges') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Badges
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.components.buttons') }}"
                                        class="menu-dropdown-item {{ request()->routeIs('admin.components.buttons') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Buttons
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Menu Item Components -->

                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
<!-- ===== Sidebar End ===== -->
