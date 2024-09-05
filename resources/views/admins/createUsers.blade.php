<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <div class="flex justify-center items-center w-full h-full">
        <form action="">
            
                <legend>
                    <b>Criar um Cliente</b>
                </legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="name" id="name" class="inputUser" required>
                    <label for="name">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="password" id="password" class="inputUser" required>
                    <label for="password">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereço" id="endereço" class="inputUser" placeholder="Rua xxx, numero xxxx" required>
                    <label for="endereço">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="cpf" placeholder="xxx.xxx.xxx-xx" required>
                    <label for="cpf">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="nascimento" id="nascimento" class="inputUser" required>
                    
                </div>
                <br><br>
                <button type="submit">
                enviar
            </button>
            
        </form>
    </div>

</body>
</html>