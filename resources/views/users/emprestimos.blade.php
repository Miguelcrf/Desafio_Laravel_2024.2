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
                        <form action="{{Route('usuarios.emprestimos.pagar')}}" method="POST">
                            @csrf
                               @if($emprestimoAtivo)
                            <h1><b>Você possui um empréstimo com pagamento pendente! </b></h1>
                            <button typr="submit"> pagar </button>
                               @else
                               @endif
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>