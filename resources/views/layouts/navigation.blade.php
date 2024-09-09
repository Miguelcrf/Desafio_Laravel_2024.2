<nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>




                    @if(Auth::guard('admin')->check())
                    <x-nav-link :href="route('admins.users.index')" :active="request()->routeIs('admins.users.index')">
                        {{ __('Usuários') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admins.gerentes.index')" :active="request()->routeIs('admins.gerentes.index')">
                        {{ __('Gerentes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admins.administradores.index')" :active="request()->routeIs('admins.administradores.index')">
                        {{ __('Administradores') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('gerentes.saques.index')" :active="request()->routeIs('gerentes.saques.index')">
                        {{ __('Saques e Depositos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('admins.administradores.index')">
                        {{ __('logout') }}
                    </x-nav-link>
                    @endif

                    




                    @if(Auth::guard('web')->check())
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('Perfil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.transferencia.index')" :active="request()->routeIs('transferencia.index')">
                        {{ __('Transferencias') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('admins.administradores.index')">
                        {{ __('logout') }}
                    </x-nav-link>
                    @endif




                    

                    @if(Auth::guard('gerente')->check())
                    <x-nav-link :href="route('gerentes.index')" :active="request()->routeIs('gerentes.index')">
                        {{ __('Perfil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gerentes.users.index')" :active="request()->routeIs('gerentes.users.index')">
                        {{ __('Usuários') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gerentes.saques.index')" :active="request()->routeIs('gerentes.saques.index')">
                        {{ __('Saques e Depositos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gerentes.transferencia.index')" :active="request()->routeIs('gerentes.transferencia.index')">
                        {{ __('Transferencias') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gerentes.extrato')" :active="request()->routeIs('extrato.index.index')">
                        {{ __('Extratos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('logout.index')">
                        {{ __('logout') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                           @if(Auth::guard('web')->check())
                            <div> Bem vindo(a) {{ Auth::user()->name }}!</div>
                           @elseif (Auth::guard('admin')->check())
                           <div> Bem vindo(a) {{ Auth::guard('admin')->user()->name }}!</div>
                            @elseif(Auth::guard('gerente')->check())
                            <div> Bem vindo(a) {{ Auth::guard('gerente')->user()->name }}!</div>
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @if(Auth::guard('web')->check())
                            <div> Bem vindo(a) {{ Auth::user()->name }}!</div>
                           @elseif (Auth::guard('admin')->check())
                           <div> Bem vindo(a) {{ Auth::guard('admin')->user()->name }}!</div>
                            @elseif(Auth::guard('gerente')->check())
                            <div> Bem vindo(a) {{ Auth::guard('gerente')->user()->name }}!</div>
                            @endif
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>