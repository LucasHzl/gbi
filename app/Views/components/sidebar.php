<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.6.x/dist/component.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>


<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark }" @resize.window="watchScreen()">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800">
            Loading.....
        </div>

        <!-- Sidebar first column -->
        <!-- Backdrop -->
        <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-indigo-800 lg:hidden" style="opacity: 0.5" aria-hidden="true"></div>

        <aside x-show="isSidebarOpen" x-transition:enter="transition-all transform duration-300 ease-in-out" x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transition-all transform duration-300 ease-in-out" x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="-translate-x-full opacity-0" x-ref="sidebar" @keydown.escape="window.innerWidth <= 1024 ? isSidebarOpen = false : ''" tabindex="-1" class="fixed inset-y-0 z-10 flex-shrink-0 w-64 bg-white border-r lg:static dark:border-indigo-800 dark:bg-darker focus:outline-none">
            <div class="flex flex-col h-full">
                <!-- Sidebar links -->
                <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                    <!-- Dashboards links -->
                    <div x-data="{ isActive: false, open: false}">
                        <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a href="<?= base_url() ?>"  class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600" :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">Accueil</span>
                            <span class="ml-auto" aria-hidden="true">
                            </span>
                        </a>
                    </div>

                    <!-- Components links -->
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600" :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">Bon d'intervention</span>
                            <span aria-hidden="true" class="ml-auto">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Créer un BI
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Tous les BI
                            </a>
                        </div>
                    </div>

                    <!-- Authentication links -->
                    <div x-data="{ isActive: false, open: false}">
                        <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600" :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">Client</span>
                            <span aria-hidden="true" class="ml-auto">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="<?= base_url('/register_customer') ?>" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Inscrire un client
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Tous les clients
                            </a>
                        </div>
                    </div>

                    <!-- Authentication links -->
                    <div x-data="{ isActive: false, open: false}">
                        <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600" :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="#666666" height="19x" width="19px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 383.273 383.273" xml:space="preserve" stroke="#666666" stroke-width="6.2"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.7665460000000001"></g><g id="SVGRepo_iconCarrier"> <path d="M194.223,208.347c-8.752-7.901-20.935-12.938-33.262-13.899c-6.951,11.052-21.072,18.353-36.691,18.353 c-15.618,0-29.737-7.238-36.688-18.287c-20.401,1.608-39.704,14.536-43.356,29.559L20.45,322.035h42.848c4.971,0,9,4.029,9,9 s-4.029,9-9,9H9.1c-0.031,0-0.061-0.163-0.092-0.163c-0.13,0-0.262-0.184-0.392-0.19c-0.197-0.008-0.394-0.014-0.587-0.035 c-0.119-0.013-0.239-0.037-0.359-0.055c-0.223-0.033-0.444-0.071-0.662-0.12c-0.045-0.01-0.089-0.013-0.133-0.024 c-0.087-0.021-0.168-0.052-0.254-0.075c-0.158-0.043-0.315-0.088-0.469-0.139c-0.138-0.046-0.273-0.097-0.407-0.149 c-0.136-0.053-0.271-0.107-0.404-0.166c-0.149-0.066-0.294-0.138-0.438-0.211c-0.11-0.056-0.219-0.113-0.326-0.174 c-0.156-0.088-0.308-0.181-0.457-0.278c-0.09-0.058-0.179-0.117-0.266-0.178c-0.153-0.107-0.302-0.219-0.447-0.334 c-0.08-0.064-0.159-0.128-0.237-0.195c-0.14-0.12-0.276-0.243-0.408-0.371c-0.078-0.075-0.155-0.152-0.231-0.23 c-0.12-0.125-0.236-0.252-0.349-0.384c-0.08-0.093-0.158-0.188-0.235-0.284c-0.097-0.123-0.191-0.249-0.282-0.377 c-0.08-0.113-0.158-0.228-0.233-0.345c-0.077-0.12-0.151-0.242-0.222-0.366c-0.075-0.13-0.147-0.262-0.216-0.396 c-0.062-0.121-0.12-0.243-0.177-0.367c-0.064-0.14-0.125-0.281-0.182-0.425c-0.051-0.129-0.098-0.259-0.143-0.391 c-0.048-0.14-0.093-0.281-0.135-0.424c-0.042-0.147-0.08-0.296-0.115-0.446c-0.03-0.13-0.059-0.259-0.084-0.391 c-0.032-0.17-0.057-0.342-0.079-0.515c-0.015-0.117-0.03-0.234-0.04-0.353c-0.016-0.187-0.024-0.374-0.028-0.563 C0.009,330.848,0,330.775,0,330.701c0-0.043,0.006-0.087,0.007-0.13c0.003-0.172,0.013-0.345,0.026-0.518 c0.01-0.144,0.021-0.291,0.037-0.433c0.016-0.131,0.038-0.269,0.06-0.4c0.03-0.182,0.062-0.376,0.103-0.554 c0.009-0.039,0.013-0.105,0.022-0.144l26.479-108.98c5.917-24.333,34.521-43.506,65.12-43.506h1.238 c3.844,0,7.264,2.526,8.512,6.162c2.12,6.173,10.585,12.506,22.666,12.506c12.082,0,20.548-6.305,22.667-12.478 c1.249-3.636,4.668-6.19,8.512-6.19h1.238c18.075,0,36.616,7.109,49.597,18.828c3.689,3.331,3.98,9.134,0.65,12.825 C203.603,211.376,197.912,211.677,194.223,208.347z M332.712,271.154l-10.039,7.271c0.314,2.71,0.472,5.441,0.472,8.17 c0,2.682-0.153,5.368-0.457,8.034l10.024,7.263c7.511,4.881,7.228,16.431-0.805,30.342c-2.963,5.133-10.914,17.07-20.726,17.071 c-1.803,0-3.566-0.414-5.139-1.201l-11.256-5.03c-4.382,3.273-9.1,6.005-14.106,8.168l-1.268,12.218 c-0.462,8.951-10.607,14.485-26.679,14.485c-16.105,0-26.244-5.542-26.681-14.511l-1.266-12.192 c-5.006-2.162-9.722-4.894-14.104-8.167l-11.288,5.044c-1.565,0.777-3.319,1.187-5.109,1.187c-9.812,0-17.763-11.938-20.726-17.072 c-8.053-13.946-8.323-25.498-0.773-30.36l9.992-7.239c-0.304-2.665-0.457-5.353-0.457-8.038c0-2.729,0.159-5.462,0.473-8.172 l-10.031-7.267c-2.879-1.882-6.794-6.271-4.951-15.819c0.855-4.431,2.896-9.589,5.747-14.526c2.963-5.133,10.915-17.07,20.727-17.07 c1.798,0,3.558,0.412,5.128,1.195l11.39,5.09c4.345-3.23,9.016-5.93,13.968-8.07l1.281-12.343 c0.436-8.971,10.574-14.514,26.681-14.514c16.073,0,26.218,5.534,26.679,14.488l1.283,12.369c4.954,2.142,9.625,4.84,13.969,8.07 l11.377-5.084c1.573-0.788,3.337-1.202,5.14-1.202c9.812,0,17.763,11.938,20.726,17.07 C339.941,254.724,340.225,266.274,332.712,271.154z M307.648,267.085l12.224-8.856c-0.442-1.862-1.5-4.864-3.552-8.417 c-2.05-3.551-4.12-5.969-5.512-7.282l-13.836,6.182c-3.215,1.438-6.974,0.866-9.619-1.462c-5.272-4.641-11.297-8.122-17.909-10.346 c-3.341-1.124-5.719-4.095-6.083-7.602l-1.563-15.069c-1.834-0.548-4.962-1.133-9.064-1.133c-4.101,0-7.229,0.585-9.063,1.133 l-1.563,15.069c-0.364,3.507-2.742,6.479-6.084,7.603c-6.608,2.221-12.633,5.701-17.908,10.345 c-2.644,2.328-6.402,2.898-9.618,1.461l-13.836-6.182c-1.391,1.314-3.462,3.731-5.513,7.283c-2.05,3.551-3.108,6.553-3.551,8.415 l12.225,8.856c2.856,2.068,4.24,5.614,3.542,9.07c-0.691,3.422-1.042,6.936-1.042,10.442c0,3.474,0.343,6.949,1.02,10.331 c0.69,3.451-0.694,6.988-3.545,9.054l-12.2,8.839c0.442,1.862,1.5,4.863,3.551,8.415c2.051,3.553,4.122,5.971,5.513,7.285 l13.728-6.134c3.222-1.441,6.99-0.864,9.635,1.476c5.296,4.686,11.356,8.194,18.012,10.431c3.342,1.123,5.722,4.095,6.085,7.602 l1.549,14.92c1.834,0.548,4.963,1.132,9.064,1.132s7.23-0.585,9.064-1.133l1.548-14.918c0.364-3.508,2.743-6.479,6.086-7.603 c6.658-2.237,12.718-5.747,18.014-10.432c2.646-2.341,6.415-2.916,9.636-1.477l13.726,6.134c1.391-1.314,3.461-3.731,5.512-7.283 c2.051-3.553,3.109-6.556,3.552-8.418l-12.2-8.838c-2.849-2.063-4.234-5.599-3.546-9.049c0.677-3.39,1.02-6.867,1.02-10.334 c0-3.509-0.35-7.021-1.041-10.442C303.408,272.698,304.792,269.153,307.648,267.085z M284.443,286.604 c0,17.483-14.225,31.708-31.708,31.708c-17.484,0-31.709-14.225-31.709-31.708s14.225-31.708,31.709-31.708 C270.219,254.896,284.443,269.12,284.443,286.604z M266.443,286.604c0-7.559-6.149-13.708-13.708-13.708 s-13.709,6.149-13.709,13.708s6.15,13.708,13.709,13.708S266.443,294.162,266.443,286.604z M280.81,159.115l8.197-4.781 c4.293-2.504,5.744-8.015,3.24-12.309c-2.504-4.294-8.016-5.743-12.309-3.24l-31.734,18.508c-0.054,0.031-0.102,0.069-0.155,0.102 c-0.172,0.105-0.342,0.214-0.506,0.331c-0.097,0.068-0.189,0.14-0.283,0.211c-0.133,0.103-0.265,0.207-0.392,0.317 c-0.107,0.092-0.21,0.188-0.313,0.284c-0.105,0.1-0.209,0.201-0.309,0.306c-0.105,0.11-0.206,0.222-0.305,0.336 c-0.091,0.105-0.18,0.212-0.266,0.322c-0.092,0.116-0.18,0.235-0.266,0.355c-0.086,0.121-0.168,0.243-0.248,0.367 c-0.073,0.114-0.142,0.229-0.209,0.345c-0.082,0.142-0.16,0.285-0.234,0.431c-0.054,0.106-0.105,0.212-0.154,0.32 c-0.074,0.161-0.143,0.323-0.207,0.489c-0.04,0.102-0.077,0.205-0.113,0.308c-0.059,0.17-0.113,0.341-0.162,0.515 c-0.031,0.112-0.059,0.224-0.086,0.336c-0.039,0.163-0.075,0.327-0.105,0.494c-0.025,0.137-0.044,0.274-0.063,0.412 c-0.019,0.144-0.037,0.288-0.05,0.434c-0.015,0.171-0.021,0.343-0.026,0.515c-0.002,0.082-0.012,0.161-0.012,0.243 c0,0.039,0.005,0.077,0.006,0.115c0.002,0.189,0.014,0.378,0.029,0.567c0.008,0.111,0.014,0.222,0.026,0.331 c0.02,0.178,0.05,0.354,0.081,0.531c0.021,0.12,0.039,0.241,0.064,0.359c0.033,0.154,0.076,0.306,0.118,0.458 c0.038,0.139,0.073,0.278,0.118,0.415c0.042,0.128,0.092,0.254,0.14,0.381c0.058,0.155,0.116,0.311,0.183,0.462 c0.049,0.112,0.106,0.223,0.161,0.334c0.078,0.158,0.156,0.316,0.243,0.469c0.021,0.037,0.037,0.076,0.059,0.113 c0.03,0.052,0.068,0.095,0.099,0.146c0.147,0.24,0.304,0.472,0.471,0.696c0.064,0.086,0.125,0.173,0.191,0.256 c0.211,0.262,0.433,0.514,0.671,0.75c0.084,0.084,0.175,0.158,0.262,0.238c0.171,0.157,0.346,0.309,0.528,0.452 c0.11,0.086,0.22,0.169,0.334,0.25c0.195,0.139,0.397,0.269,0.603,0.393c0.089,0.053,0.174,0.111,0.264,0.16 c0.298,0.165,0.607,0.313,0.925,0.444c0.072,0.029,0.145,0.052,0.218,0.08c0.256,0.098,0.517,0.185,0.783,0.259 c0.105,0.03,0.211,0.056,0.317,0.082c0.24,0.058,0.483,0.104,0.73,0.142c0.113,0.018,0.226,0.039,0.34,0.052 c0.284,0.033,0.573,0.05,0.864,0.056c0.061,0.001,0.121,0.012,0.181,0.012c0.012,0,0.024-0.002,0.036-0.002 c62.032,0.024,112.49,50.499,112.49,112.537c0,4.971,4.029,9,9,9s9-4.029,9-9C383.273,224.259,339.34,171.993,280.81,159.115z M35.558,75.249c-0.417-4.952,3.261-9.306,8.214-9.723c1.538-0.126,3.017,0.142,4.339,0.717c7.847-34.82,39.004-60.916,76.16-60.916 c37.154,0,68.309,26.091,76.16,60.908c1.323-0.577,2.803-0.842,4.341-0.708c4.953,0.416,8.63,4.77,8.213,9.723l-1.172,13.92 c-0.396,4.696-4.33,8.245-8.958,8.245c-0.253,0-0.508-0.01-0.765-0.032c-0.33-0.028-0.653-0.076-0.971-0.137 c-2.661,14.892-9.584,28.717-20.172,39.885c-14.899,15.715-35.027,24.37-56.676,24.37c-21.657,0-42.528-9.111-57.263-24.998 c-6.392-6.892-11.436-14.775-14.993-23.434c-1.553-3.781-2.814-7.715-3.751-11.692c-0.322-1.366-0.603-2.744-0.85-4.128 c-0.315,0.061-0.635,0.108-0.962,0.135c-0.256,0.021-0.512,0.032-0.765,0.032c-4.629,0-8.563-3.55-8.958-8.246L35.558,75.249z M79.142,87.035h8.756c7.762,0,14.319-5.184,14.319-11.5s-6.557-11.5-14.319-11.5h-8.756c-7.761,0-14.318,5.184-14.318,11.5 S71.381,87.035,79.142,87.035z M180.989,103.173c-3.6,1.273-7.505,1.862-11.589,1.862h-8.757c-14.401,0-26.628-8-30.792-20h-11.16 c-4.164,12-16.391,20-30.792,20h-8.756c-4.081,0-7.984-0.587-11.582-1.859c0.346,0.989,0.709,2.09,1.105,3.056 c2.735,6.657,6.618,12.725,11.54,18.031c11.34,12.227,27.401,19.238,44.065,19.238c16.659,0,32.147-6.66,43.613-18.755 C173.792,118.515,178.218,111.089,180.989,103.173z M169.4,64.035h-8.757c-7.762,0-14.319,5.184-14.319,11.5s6.557,11.5,14.319,11.5 h8.757c7.761,0,14.318-5.184,14.318-11.5S177.161,64.035,169.4,64.035z M77.293,46.052c0.612-0.032,1.228-0.017,1.849-0.017h8.756 c14.402,0,26.63,9,30.793,21h11.158c4.163-12,16.391-21,30.793-21h8.757c0.621,0,1.237-0.015,1.849,0.017 c-5.176-6.488-11.66-11.918-19.056-15.817c-7.912,0.162-15.237,3.407-20.684,9.195c-1.771,1.883-4.161,2.833-6.556,2.833 c-2.212,0-4.428-0.811-6.166-2.445c-3.62-3.406-3.794-9.102-0.388-12.722c1.245-1.323,2.567-2.558,3.946-3.719 C104.127,23.954,87.937,32.708,77.293,46.052z M126.771,114.035h-5.001c-4.971,0-9,4.029-9,9s4.029,9,9,9h5.001c4.971,0,9-4.029,9-9 S131.742,114.035,126.771,114.035z"></path> </g></svg>
                            </span>
                            <span class="ml-2 text-sm">Technicien</span>
                            <span aria-hidden="true" class="ml-auto">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="<?= base_url('/register_user') ?>" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Inscrire un technicien
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Tous les techniciens
                            </a>
                        </div>
                    </div>

                    <!-- Pages links -->
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600" :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm"> Pages </span>
                            <span aria-hidden="true" class="ml-auto">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Blank
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Profile
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Pricing
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Kanban
                            </a>
                            <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                Feed
                            </a>
                        </div>
                    </div>

                    


                </nav>

                <!-- Sidebar footer -->
                <div class="relative flex items-center justify-center flex-shrink-0 px-2 py-4 space-x-4">
                    <!-- Search button -->
                    <button @click="openSearchPanel" class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800">
                        <span class="sr-only">Open search panel</span>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- User avatar button -->
                    <div class="" x-data="{ open: false }">
                        <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                            <span class="sr-only">User menu</span>
                            <svg width="36px" height="36px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#7d75ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#7d75ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </button>

                        <!-- User dropdown menu -->
                        <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="-translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-1/2 opacity-0" @click.away="open = false" @keydown.escape="open = false" class="absolute max-w-xs py-1 bg-white rounded-md shadow-lg min-w-max left-5 right-5 bottom-full ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none" tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                            <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">
                                Mon compte
                            </a>
                            <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">
                                Paramètres
                            </a>
                            <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">
                                Déconnexion
                            </a>
                        </div>
                    </div>

                    <button @click="openSettingsPanel" class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800">
                        <span class="sr-only">Open settings panel</span>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>

                </div>
            </div>
        </aside>

        <!-- Sidebars buttons -->
        <div class="fixed flex items-center space-x-4 top-5 right-10 lg:hidden">
            <button @click="isSidebarOpen = true; $nextTick(() => { $refs.sidebar.focus() })" class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring">
                <span class="sr-only">Toggle main manu</span>
                <span aria-hidden="true">
                    <svg x-show="!isSidebarOpen" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="isSidebarOpen" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </button>

        </div>

        <!-- Main content -->
        <main class="flex-1">
            <h1>Bonjour je suis le contenu main</h1>
        </main>

        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSettingsPanelOpen" @click="isSettingsPanelOpen = false" class="fixed inset-0 z-10 bg-indigo-800" style="opacity: 0.5" aria-hidden="true"></div>
        <!-- Panel -->
        <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" x-ref="settingsPanel" tabindex="-1" x-show="isSettingsPanelOpen" @keydown.escape="isSettingsPanelOpen = false" class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none" aria-labelledby="settinsPanelLabel">
            <div class="absolute left-0 p-2 transform -translate-x-full">
                <!-- Close button -->
                <button @click="isSettingsPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header -->
                <div class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-indigo-700">
                    <span aria-hidden="true" class="text-gray-500 dark:text-indigo-600">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </span>
                    <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Paramètres</h2>
                </div>
                <!-- Content -->
                <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                    <!-- Theme -->
                    <div class="p-4 space-y-4 md:p-8">
                        <h6 class="text-lg font-medium text-gray-400 dark:text-light">Modes</h6>
                        <div class="flex items-center space-x-8">
                            <!-- Light button -->
                            <button @click="setLightTheme" class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-indigo-600 dark:hover:text-indigo-100 dark:hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 dark:focus:ring-indigo-700" :class="{ 'border-gray-900 text-gray-900 dark:border-indigo-500 dark:text-indigo-100': !isDark, 'text-gray-500 dark:text-indigo-500': isDark }">
                                <span>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </span>
                                <span>Clair</span>
                            </button>

                            <!-- Dark button -->
                            <button @click="setDarkTheme" class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-indigo-600 dark:hover:text-indigo-100 dark:hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 dark:focus:ring-indigo-700" :class="{ 'border-gray-900 text-gray-900 dark:border-indigo-500 dark:text-indigo-100': isDark, 'text-gray-500 dark:text-indigo-500': !isDark }">
                                <span>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                </span>
                                <span>Sombre</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search panel -->
        <!-- Backdrop -->
        <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSearchPanelOpen" @click="isSearchPanelOpen = false" class="fixed inset-0 z-10 bg-indigo-800" style="opacity: 0.5" aria-hidden="ture"></div>
        <!-- Panel -->
        <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSearchPanelOpen" @keydown.escape="isSearchPanelOpen = false" class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
            <div class="absolute right-0 p-2 transform translate-x-full">
                <!-- Close button -->
                <button @click="isSearchPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <h2 class="sr-only">Search panel</h2>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header (Search input) -->
                <div class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-indigo-800 dark:focus-within:text-light focus-within:text-gray-700">
                    <span class="absolute inset-y-0 inline-flex items-center px-4">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input x-ref="searchInput" type="text" class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring" placeholder="Rechercher..." />
                </div>

                <!-- Panel content (Search result) -->
                <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
                    <p class="px=4">Résultats</p>
                    <!--  -->
                    <!-- Search content -->
                    <!--  -->
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
            },
            setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
            },
            watchScreen() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                    this.isSecondSidebarOpen = false
                } else if (window.innerWidth >= 1024) {
                    this.isSidebarOpen = true
                    this.isSecondSidebarOpen = true
                }
            },
            isSidebarOpen: window.innerWidth >= 1024 ? true : false,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSecondSidebarOpen: window.innerWidth >= 1024 ? true : false,
            toggleSecondSidbarColumn() {
                this.isSecondSidebarOpen = !this.isSecondSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.settingsPanel.focus()
                })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.searchInput.focus()
                })
            },
        }
    }
</script>