<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emprestimos') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        
                               @if($emprestimoAtivo)
                               <form action="{{route('gerentes.emprestimos.pagar' $emprestimoAtivo->id)}}" method="POST">
                                @csrf
                            <h1><b>Você possui um empréstimo com pagamento pendente! </b></h1>
                            @if(session('erro'))
                        <div class="text-red-500">{{ session('erro') }}</div>
                    @endif
                            <p>Valor do emprestimo: {{$emprestimoAtivo->valor}}</p>
                            <button type="submit" class="p-1.5 bg-red-500 rounded-3"> Pagar </button>
                        </form>  
                            @else
                            <form action="{{route('gerentes.emprestimos.processo')}}" method="POST">
                                @csrf
                                @if(session('erro'))
                                <div class="text-red-500">{{ session('erro') }}</div>
                            @endif
                                <h1><b>Solicitar emprestimo: </b></h1>
                                <br><br>
                                <label for="valor">Valor: </label>
                                <input type="number" name="valor" id="valor">
                            </form>
                               @endif
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>