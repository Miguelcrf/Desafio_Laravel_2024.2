<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados de seus clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Título da Pendência</th>
                                <th class="border px-4 py-2">Nome do Cliente</th>
                                <th class="border px-4 py-2">Valor do Limite</th>
                                <th class="border px-4 py-2">Valor da Transferência</th>
                                <th class="border px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendencias as $pendencia)
                            <tr>
                                <td class="border px-4 py-2">{{ 'Transação Pendente Id:' . $pendencia->id }}</td>
                                <td class="border px-4 py-2">
                                    <button onclick="openModal({{ $user->id }})" class="bg-blue-500">
                                        {{ $user->name }}
                                    </button>
                                </td>
                                <td class="border px-4 py-2">R$ {{ number_format($, 2, ',', '.') }}</td>
                                <td class="border px-4 py-2">R$ {{ number_format($pendencia->valor, 2, ',', '.') }}</td>
                                <td class="border px-4 py-2 flex">
                                    <form action="{{ route('gerente.aprovar', $pendencia->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white p-1.5 rounded">Aprovar</button>
                                    </form>
                                    <form action="{{ route('gerente.negar', $pendencia->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white p-1.5 rounded">Negar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>