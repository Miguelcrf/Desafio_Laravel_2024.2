<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <div class="block justify-center items-center w-full h-full">
        <div class="flex flex-col bg-black rounded-lg w-3/5 h-full">
            <h2 class="pt-24 pb-24 pl-32 pr-32 text-2xl text-white">VISUALIZAR USUÁRIO</h2>  
                <section>
                    <h3>NOME</h3>
                    <p>{{$user->name}}</p>
                </section>
                <section>
                    <h3>EMAIL</h3>
                    <p>{{$user->email}}</p>
                </section>
                <section>
                    <h3>SENHA</h3>
                    <p>{{$user->password}}</p>
                </section>
                <section>
                    <h3>ENDEREÇO</h3>
                    <p>{{$user->endereço}}</p>
                </section>
                <section>
                    <h3>TELEFONE</h3>
                    <p>{{$user->telefone}}</p>
                </section>
                <section>
                    <h3>DATA DE NASCIMENTO</h3>
                    <p>{{$user->nascimento}}</p>
                </section>
                <section>
                    <h3>CPF</h3>
                    <p>{{$user->cpf}}</p>
                </section>
                <button>
                    <a href="/usuarios">VOLTAR</a>
                </button>

        </div>
    </div>
    </div>
</body>
</html>