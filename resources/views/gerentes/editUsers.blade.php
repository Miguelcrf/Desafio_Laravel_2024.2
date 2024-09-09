<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="{{Route('gerentes.usuarios.update', $user->id)}}" >
                            @csrf
                                <legend>
                                    <b>Editar Usuário</b>
                                </legend>
                                <br>
                                <div class="inputBox">
                                    <br>
                                    <label for="name">Nome Completo</label>
                                    <input type="text" name="name" id="name" class="inputUser" value="{{$user->name}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="inputUser" value="{{$user->email}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" id="password" class="inputUser" value="{{$user->password}}"required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="endereço">Endereço</label>
                                    <input type="text" name="endereço" id="endereço" class="inputUser" value="{{$user->endereço}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="cpf" value="{{$user->cpf}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="{{$user->telefone}}" required>
                                    
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                                    <input type="date" name="nascimento" id="nascimento" class="inputUser" value="{{$user->nascimento}}" required>
                                    
                                </div>
                                <br><br>
                                <label for="gerente_id"> <b>Gerente Responsável</b></label>
                                <select name="gerente_id" id="gerente_id" required>
                                    @foreach($gerentes as $gerente)
                                    <option value="{{$gerente->id}}"> {{$gerente->name}}</option>
                                    @endforeach
                                </select>
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