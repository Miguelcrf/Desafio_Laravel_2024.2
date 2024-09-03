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
            <form action="" method="get" class="flex items-start flex-wrap p-32">
            @method('POST');
            @csrf
            <label for="text1"> NOME:   
            <input type="text" name="name" value="{{$user->name}}" id="text1">
            </label> 
            <label for="text2"> EMAIL:   
                <input type="text" name="email" value="{{$user->email}}" id="text2">
                </label> 
                <label for="text3"> SENHA:   
                <input type="password" name="password" value="Senha" id="text3">
                </label> 
                <label for="text4"> ENDEREÇO:   
                <input type="text" name="adress" value="Endereço" id="text4">
                </label> 
                <label for="text5"> CPF:   
                <input type="text" name="cpf" value="CPF" id="text5">
                </label> 
                <label for="text6"> TELEFONE:   
                <input type="text" name="cell" value="Telefone de contato" id="text6">
                </label> 
                <label for="text7"> DATA DE NASCIMENTO:   
                <input type="date" name="born" value="Data de nascimento" id="text7">
                </label> 
                <button
            type = "submit"
          >
            ALTERAR
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