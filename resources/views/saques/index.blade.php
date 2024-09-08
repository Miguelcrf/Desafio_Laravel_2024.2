<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saques e Depositos') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="">
                        <b>Escolha a opção que deseja seguir: </b>
                        <br>
                        <br>
                        <button class="bg-red-500 p-1.5 rounded-3 no-underline"><a href="{{route('saque.index')}}">saque</a></button>
                        <br>
                        <br>
                        <button class="bg-red-500 p-1.5 rounded-3 no-underline"><a href="{{route('deposito.index')}}">deposito</a></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>