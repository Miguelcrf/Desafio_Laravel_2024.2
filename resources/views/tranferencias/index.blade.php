<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferência Bancária</title>
    <link rel="stylesheet" href="{{ asset('css/apps.css') }}">
</head>
<body>
    <div class="container">
        <h1>Transferência Bancária</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('transferencia.processo') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_destinatario">Nome do Destinatário:</label>
                <input type="text" id="nome_destinatario" name="nome_destinatario" class="form-control" value="{{ old('nome_destinatario') }}" required>
                @error('nome_destinatario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="conta_destinatario">Número da Conta:</label>
                <input type="text" id="conta_destinatario" name="conta_destinatario" class="form-control" value="{{ old('conta_destinatario') }}" required>
                @error('conta_destinatario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="valor">Valor (R$):</label>
                <input type="text" id="valor" name="valor" class="form-control" value="{{ old('valor') }}" required>
                @error('valor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Transferir</button>
        </form>
    </div>
</body>
</html>