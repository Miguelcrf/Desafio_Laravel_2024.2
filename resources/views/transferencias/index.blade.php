<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Realizar Transferencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="{{route('transferencia.processo')}}" method="POST">
                            @csrf
                            @if(session('erro'))
                            <div class="text-red-500">{{ session('erro') }}</div>
                        @endif
                            <legend> <b>Transferir</b>
                            </legend>
                            <br>
                            <br>
                            <br><br>
                            <b>Digite a agencia do destinatário: </b>
                            <input type="text" name="agencia">
                            <br><br>
                            <b>Digite o numero da conta do destinatário: </b>
                            <input type="text" name="numero">
                            <br><br>
                            <b>Insira o valor que deseja transferir: </b>
                            <input type="number" name="valor" min="0.01" step="0.01">
                            <br><br>
                            <b>Digite a senha da sua conta: </b>
                            <input type="text" name="senha">
                            <br><br><br><br><br>
                            <button class="p-1.5 bg-red-500 rounded-3 decoration-white">Transferir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
