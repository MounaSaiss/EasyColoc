<nav x-data="{ open: false }" class="bg-[#0a0a0a] border-b border-white/5 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-[#059669] rounded-lg flex items-center justify-center shadow-[0_0_15px_rgba(5,150,105,0.3)]">
                            <span class="text-white font-black text-xs">EC</span>
                        </div>
                        <span class="text-white font-black tracking-tighter text-lg hidden md:block uppercase">
                            Easy<span class="text-[#059669]">Coloc</span>
                        </span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')" 
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-xs font-bold uppercase tracking-widest leading-5 transition duration-150 ease-in-out {{ request()->routeIs('user.dashboard') ? 'border-[#059669] text-white' : 'border-transparent text-zinc-500 hover:text-zinc-300 hover:border-zinc-700' }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-white/5 text-xs leading-4 font-bold rounded-xl text-zinc-400 bg-zinc-900/50 hover:text-white hover:bg-zinc-800 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-[#059669]/20 text-[#059669] flex items-center justify-center text-[10px]">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#111111] border border-white/10 rounded-lg overflow-hidden">
                            <x-dropdown-link :href="route('profile.edit')" class="text-zinc-400 hover:text-white hover:bg-[#059669]/10 text-xs font-bold uppercase tracking-wider">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="text-red-400 hover:text-red-500 hover:bg-red-500/10 text-xs font-bold uppercase tracking-wider"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-zinc-500 hover:text-white hover:bg-zinc-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0a0a] border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')"
                class="block w-full ps-3 pe-4 py-2 border-l-4 text-xs font-bold uppercase tracking-widest transition duration-150 ease-in-out {{ request()->routeIs('user.dashboard') ? 'border-[#059669] text-[#059669] bg-[#059669]/5' : 'border-transparent text-zinc-500 hover:text-zinc-300 hover:bg-zinc-900' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-white/5">
            <div class="px-4 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#059669] flex items-center justify-center text-white font-bold text-xs">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-sm text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-[10px] text-zinc-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-zinc-400 hover:text-white text-xs font-bold uppercase tracking-widest">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-400 hover:text-red-500 text-xs font-bold uppercase tracking-widest"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>