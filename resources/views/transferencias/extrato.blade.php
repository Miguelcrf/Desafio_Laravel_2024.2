
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seus Dados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Saldo Atual: R$ {{ number_format($saldoAtual, 2, ',', '.') }}</h3>
                    </div>
    
                    <!-- Exibir tabela de últimas transações -->
                    <table class="table-auto w-full mb-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Data</th>
                                <th class="px-4 py-2">Remetente</th>
                                <th class="px-4 py-2">Destinatário</th>
                                <th class="px-4 py-2">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transferencias as $transferencia)
                            <tr>
                                <td class="border px-4 py-2">{{ $transferencia->created_at->format('d/m/Y') }}</td>
                                <td class="border px-4 py-2">{{ $transferencia->remetente->user->name }}</td>
                                <td class="border px-4 py-2">{{ $transferencia->destinatario->user->name }}</td>
                                <td class="border px-4 py-2">R$ {{ number_format($transferencia->valor, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <!-- Formulário que gerar relatório -->
                    <form action="{{ route('transferencias.gerarRelatorio') }}" method="GET">
                        @csrf
                        <div class="mb-4">
                            <label for="filtro" class="block text-sm font-medium text-gray-700">Escolha o periodo que deseja gera relatorio:</label>
                            <select name="filtro" id="filtro" class="mt-1 block w-full">
                                <option value="mes">Mês Atual</option>
                                <option value="3meses">Últimos 3 Meses</option>
                                <option value="6meses">Últimos 6 Meses</option>
                            </select>
                        </div>
    
                        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gerar Relatório PDF
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



