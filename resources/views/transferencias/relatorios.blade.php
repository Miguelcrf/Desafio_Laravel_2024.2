<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Banco do Miguel </h1>
        <h3>Relatório de Transferências</h3>
        <p>Usuário: {{ $user->name }}</p>
        <p>Data de Emissão: {{ $dataAtual->format('d/m/Y') }}</p>
        <p>Filtro: {{ $filtro }}</p>
    </div>

    <h3>{{ $filtro == 'mes' ? 'Mês Atual' : 'Últimos '. $filtro }}</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Dia</th>
                <th>Remetente</th>
                <th>Destinatário</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transferencias as $transferencia)
            <tr>
                <td>{{ $transferencia->created_at->format('d/m/Y') }}</td>
                <td>{{ $remetente}}</td>
                <td>{{ $destinatario}}</td>
                <td>R$ {{ number_format($transferencia->valor, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>