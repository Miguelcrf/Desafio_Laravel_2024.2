<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saques') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                       
                       <form action="{{route('saque.store')}}" method="POST">
                        
                        @csrf
                        @if(session('erro'))
                        <div class="text-red-500">{{ session('erro') }}</div>
                    @endif
                        <legend><b>Sacar</b></legend>
                        <br>
                        @if(Auth::guard('gerente')->check())
                        <b>Informe a Agencia da conta que deseja sacar: </b>
                        @endif
                        @if(Auth::guard('web')->check())
                        <b>Informe sua Agencia: </b>
                        @endif
                        <input type="text" name="agencia" placeholder="agencia">
                        @error('agencia')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
                        <br>
                        <br>
                        @if(Auth::guard('gerente')->check())
                        <b>Informe o numero da Conta que deseja sacar: </b>
                        @endif
                        @if(Auth::guard('web')->check())
                        <b>Informe o numero da sua Conta: </b>
                        @endif

                        <input type="text" name="numero" placeholder="numero">
                        <br>
                        <br>
                        @if(Auth::guard('gerente')->check())
                        <b>Informe o valor a ser sacado: </b>
                        @endif
                        @if(Auth::guard('web')->check())
                        <b>Informe o valor a ser sacado: </b>
                        @endif
                        <input type="number" name="valor" id="valor"  min="0.01" step="0.01">
                        <br>
                        <br>
                        @if(Auth::guard('gerente')->check())
                        <b>Informe a senha da conta que será sacada: </b>
                        @endif
                        @if(Auth::guard('web')->check())
                        <b>Informe a senha da sua conta: </b>
                        @endif
                        <input type="text" name="senha" id="senha">
                        <br><br><br><br><br>
                        <b>Digite sua senha de cadastro para finalizar a ação: </b>
                        <input type="password" name="password">
                        @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                        <br><br>
                        <button class="p-1.5 bg-red-500 rounded-3" type="submit"> Depositar </button>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>