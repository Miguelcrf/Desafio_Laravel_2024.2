<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Gerentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="{{route('admins.gerentes.update', $gerente->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <legend>
                                    <b>Editar Gerente</b>
                                </legend>
                                <br>
                                <div class="inputBox">
                                    <br>
                                    <label for="name">Nome Completo</label>
                                    <input type="text" name="name" id="name" class="inputUser" value="{{$gerente->name}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="inputUser" value="{{$gerente->email}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" id="password" class="inputUser" value="{{$gerente->password}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="endereço">Endereço</label>
                                    <input type="text" name="endereço" id="endereço" class="inputUser" value="{{$gerente->endereço}}" >
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="cpf" value="{{$gerente->cpf}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="{{$gerente->telefone}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                                    <input type="date" name="nascimento" id="nascimento" class="inputUser" value="{{$gerente->nascimento}}" required>
                                    
                                </div>
                                <br><br>
                                <button type="submit">
                                enviar
                            </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>