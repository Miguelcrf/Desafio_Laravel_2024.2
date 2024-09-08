<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Depositos') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                       <form action="">
                        <legend><b>Depositar</b></legend>
                        <br>
                        <b>Informe a Agencia do destinatário: </b>
                        <input type="text" name="agencia" placeholder="agencia">
                        <br>
                        <br>
                        <b>Informe o numero da Conta do destinatário: </b>
                        <input type="text" name="numero" placeholder="numero">
                        <br>
                        <br>
                        <b>Informe o valor a ser depositado: </b>
                        <input type="number" name="valor" id="valor">
                        <br>
                        <br>
                        <b>Informe a senha da conta do destinatário: </b>
                        <input type="text" name="senha" id="senha">
                        <br><br><br><br><br>
                        <b>Digite sua senha de cadastro para finalizar a ação: </b>
                        <input type="password" name="password">
                        <br><br>
                        <button class="p-1.5 bg-red-500 rounded-3" type="submit"> Depositar </button>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>