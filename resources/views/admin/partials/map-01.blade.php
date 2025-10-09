<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            World Map
        </h3>

        <div x-data="{ openDropDown: false }" class="relative h-fit">
            <button @click="openDropDown = !openDropDown"
                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                        fill="" />
                </svg>
            </button>
            <div x-show="openDropDown" @click.outside="openDropDown = false"
                class="absolute right-0 z-40 w-40 p-2 space-y-1 bg-white border border-gray-200 top-full rounded-2xl shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark">
                <button
                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                    View More
                </button>
                <button
                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div class="-ml-5 min-w-[650px] pl-2 xl:min-w-full">
            <div id="mapOne" x-data="mapOne()" class="-ml-5 h-96"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("mapOne", () => ({
            init() {
                // Wait for DOM to be fully ready
                this.$nextTick(() => {
                    setTimeout(() => {
                        this.initWorldMap();
                    }, 150);
                });
            },

            initWorldMap() {
                const mapContainer = document.getElementById('mapOne');
                if (mapContainer) {
                    mapContainer.innerHTML = `
          <div class="w-full h-full bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
            <svg viewBox="0 0 1000 500" class="w-full h-full">
              <!-- Simplified World Map -->
              <g fill="#e5e7eb" stroke="#9ca3af" stroke-width="0.5" class="dark:fill-gray-700 dark:stroke-gray-600">
                <!-- North America -->
                <path d="M100,150 L200,120 L250,180 L180,220 L120,200 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="USA" />
                <path d="M50,200 L150,180 L180,250 L80,280 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Canada" />
                
                <!-- South America -->
                <path d="M200,300 L250,280 L280,350 L220,380 L180,320 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Brazil" />
                <path d="M180,350 L220,340 L240,400 L200,420 L160,380 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Argentina" />
                
                <!-- Europe -->
                <path d="M400,120 L480,100 L520,150 L450,180 L420,140 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Germany" />
                <path d="M350,140 L420,130 L440,180 L380,190 L360,160 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="France" />
                <path d="M320,100 L400,90 L420,140 L350,150 L330,120 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="UK" />
                
                <!-- Asia -->
                <path d="M600,100 L750,80 L800,150 L650,180 L620,120 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="China" />
                <path d="M750,200 L850,180 L880,250 L780,280 L760,220 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="India" />
                <path d="M800,80 L900,70 L920,120 L820,140 L810,100 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Japan" />
                
                <!-- Africa -->
                <path d="M450,250 L550,230 L580,320 L480,350 L460,280 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Nigeria" />
                <path d="M500,200 L600,180 L630,280 L530,300 L510,220 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Egypt" />
                
                <!-- Australia -->
                <path d="M700,350 L800,330 L820,400 L720,420 L700,370 Z" class="hover:fill-brand-200 dark:hover:fill-brand-800 cursor-pointer transition-colors" data-country="Australia" />
              </g>
              
              <!-- Map Title -->
              <text x="500" y="30" text-anchor="middle" class="text-lg font-semibold fill-gray-800 dark:fill-gray-200">World Map</text>
              
              <!-- Legend -->
              <g transform="translate(20, 420)">
                <rect x="0" y="0" width="12" height="12" fill="#465fff" class="dark:fill-brand-400" />
                <text x="20" y="10" class="text-xs fill-gray-600 dark:fill-gray-400">Active Regions</text>
              </g>
            </svg>
            
            <!-- Map Stats -->
            <div class="absolute bottom-4 right-4 bg-white dark:bg-gray-800 rounded-lg p-3 shadow-lg">
              <div class="text-sm font-medium text-gray-800 dark:text-white">Global Stats</div>
              <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                <div>Active Users: 1,234</div>
                <div>Countries: 15</div>
                <div>Growth: +12%</div>
              </div>
            </div>
          </div>
        `;

                    // Add click handlers for countries
                    const countries = mapContainer.querySelectorAll('[data-country]');
                    countries.forEach(country => {
                        country.addEventListener('click', (e) => {
                            const countryName = e.target.getAttribute(
                                'data-country');
                            this.showCountryInfo(countryName);
                        });
                    });
                }
            },

            showCountryInfo(countryName) {
                // Simple country info display
                const stats = {
                    'USA': {
                        users: 450,
                        growth: '+8%'
                    },
                    'Canada': {
                        users: 120,
                        growth: '+5%'
                    },
                    'Brazil': {
                        users: 280,
                        growth: '+15%'
                    },
                    'Argentina': {
                        users: 95,
                        growth: '+3%'
                    },
                    'Germany': {
                        users: 180,
                        growth: '+7%'
                    },
                    'France': {
                        users: 150,
                        growth: '+4%'
                    },
                    'UK': {
                        users: 200,
                        growth: '+6%'
                    },
                    'China': {
                        users: 320,
                        growth: '+12%'
                    },
                    'India': {
                        users: 280,
                        growth: '+18%'
                    },
                    'Japan': {
                        users: 160,
                        growth: '+2%'
                    },
                    'Nigeria': {
                        users: 95,
                        growth: '+22%'
                    },
                    'Egypt': {
                        users: 75,
                        growth: '+9%'
                    },
                    'Australia': {
                        users: 110,
                        growth: '+5%'
                    }
                };

                const countryStats = stats[countryName] || {
                    users: 0,
                    growth: '+0%'
                };

                // Create a simple tooltip
                const tooltip = document.createElement('div');
                tooltip.className =
                    'absolute bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-3 shadow-lg z-50';
                tooltip.innerHTML = `
        <div class="text-sm font-medium text-gray-800 dark:text-white">${countryName}</div>
        <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">
          <div>Users: ${countryStats.users}</div>
          <div>Growth: ${countryStats.growth}</div>
        </div>
      `;

                // Position tooltip
                tooltip.style.left = '50%';
                tooltip.style.top = '20px';
                tooltip.style.transform = 'translateX(-50%)';

                // Remove existing tooltips
                document.querySelectorAll('.map-tooltip').forEach(t => t.remove());
                tooltip.classList.add('map-tooltip');

                document.getElementById('mapOne').appendChild(tooltip);

                // Auto remove after 3 seconds
                setTimeout(() => {
                    if (tooltip.parentNode) {
                        tooltip.parentNode.removeChild(tooltip);
                    }
                }, 3000);
            }
        }));
    });
</script>
