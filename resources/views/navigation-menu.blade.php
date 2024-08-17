
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="font-bold text-xl text-blue-600 hover:text-blue-800 transition duration-300">
                        EDUVAULT
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex flex-wrap space-x-8 sm:-my-px sm:ms-10">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="flex items-center">
                        <i class="bi bi-house-door w-5 h-5 mr-2"></i>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('courses.index') }}" :active="request()->routeIs('courses.create')" class="flex items-center">
                        <i class="bi bi-book w-5 h-5 mr-2"></i>
                        {{ __('Courses') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('country.index') }}" :active="request()->routeIs('country.index')" class="flex items-center">
                        <i class="bi bi-globe w-5 h-5 mr-2"></i>
                        {{ __('Countries') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('school.index') }}" :active="request()->routeIs('school.index')" class="flex items-center">
                        <i class="bi bi-building w-5 h-5 mr-2"></i>
                        {{ __('Schools') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('documents.index') }}" :active="request()->routeIs('documents.index')" class="flex items-center">
                        <i class="bi bi-file-earmark w-5 h-5 mr-2"></i>
                        {{ __('Documents') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('professions.index') }}" :active="request()->routeIs('professions.index')" class="flex items-center">
                        <i class="bi bi-briefcase w-5 h-5 mr-2"></i>
                        {{ __('Professions') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('grades.index') }}" :active="request()->routeIs('grades.index')" class="flex items-center">
                        <i class="bi bi-mortarboard w-5 h-5 mr-2"></i>
                        {{ __('Grades') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('periods.index') }}" :active="request()->routeIs('periods.index')" class="flex items-center">
                        <i class="bi bi-calendar w-5 h-5 mr-2"></i>
                        {{ __('Periods') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('chronos.index') }}" :active="request()->routeIs('chronos.index')" class="flex items-center">
                        <i class="bi bi-clock-history w-5 h-5 mr-2"></i>
                        {{ __('chronos') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                            {{ Auth::user()->currentTeam->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                        </button>
                    </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                                 @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Menu mobile amélioré -->
    <div :class="{'block': open, 'hidden': !open}" class="md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="flex items-center">
                <i class="bi bi-house-door w-5 h-5 mr-2"></i>
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('courses.create') }}" :active="request()->routeIs('courses.create')" class="flex items-center">
                <i class="bi bi-book w-5 h-5 mr-2"></i>
                {{ __('Courses') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('country.index') }}" :active="request()->routeIs('country.index')" class="flex items-center">
                <i class="bi bi-globe w-5 h-5 mr-2"></i>
                {{ __('Countries') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('school.index') }}" :active="request()->routeIs('school.index')" class="flex items-center">
                <i class="bi bi-building w-5 h-5 mr-2"></i>
                {{ __('Schools') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('documents.index') }}" :active="request()->routeIs('documents.index')" class="flex items-center">
                <i class="bi bi-file-earmark w-5 h-5 mr-2"></i>
                {{ __('Documents') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('professions.index') }}" :active="request()->routeIs('professions.index')" class="flex items-center">
                <i class="bi bi-briefcase w-5 h-5 mr-2"></i>
                {{ __('Professions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('grades.index') }}" :active="request()->routeIs('grades.index')" class="flex items-center">
                <i class="bi bi-mortarboard w-5 h-5 mr-2"></i>
                {{ __('Grades') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('periods.index') }}" :active="request()->routeIs('periods.index')" class="flex items-center">
                <i class="bi bi-calendar w-5 h-5 mr-2"></i>
                {{ __('Periods') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('chronos.index') }}" :active="request()->routeIs('chronos.index')" class="flex items-center">
                <i class="bi bi-clock-history w-5 h-5 mr-2"></i>
                {{ __('chronos') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
