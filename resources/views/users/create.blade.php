<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="block justify-center items-center w-full h-full">
        <div class="flex flex-col bg-black rounded-lg w-3/5 h-full">
            <h2 class="pt-24 pb-24 pl-32 pr-32 text-2xl text-white">CRIAR USUÁRIO</h2>  
            <form action="{{ route('users.store')}}" method="post" class="flex items-start flex-wrap p-32">
            @csrf
            <label for="text1"> NOME:   
            <input type="text" name="name" placeholder="Nome" id="text1">
            </label> 
            <label for="text2"> EMAIL:   
                <input type="text" name="email" placeholder="Email" id="text2">
                </label> 
                <label for="text3"> SENHA:   
                <input type="password" name="password" placeholder="Senha" id="text3">
                </label> 
                <label for="text4"> ENDEREÇO:   
                <input type="text" name="adress" placeholder="Endereço" id="text4">
                </label> 
                <label for="text5"> CPF:   
                <input type="text" name="cpf" placeholder="CPF" id="text5">
                </label> 
                <label for="text6"> TELEFONE:   
                <input type="text" name="cell" placeholder="Telefone de contato" id="text6">
                </label> 
                <label for="text7"> DATA DE NASCIMENTO:   
                <input type="date" name="born" placeholder="Data de nascimento" id="text7">
                </label> 
                
                <button type="submit">
                CRIAR
                </button>
                
          <button
            type = "button"
          >
          <a href="/usuarios">CANCELAR</a>
            
          </button>
            </form>
        </div>
    </div>
</body>
</html>