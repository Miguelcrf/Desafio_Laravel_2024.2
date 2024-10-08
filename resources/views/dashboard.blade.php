<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::guard('admin')->check())
                    {{ __("Você está logado como administrador!") }}
                    @endif
                    @if(Auth::guard('web')->check())
                    {{ __("Você está logado como usuário!") }}
                    @endif
                    @if(Auth::guard('gerente')->check())
                    {{ __("Você está logado como gerente!") }}
                    <form action="">
                        <br><br>
                    <div class=" flex border-2">
                        
                    </div>
                    </form>

                    
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
