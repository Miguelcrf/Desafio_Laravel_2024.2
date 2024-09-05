<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="">
                            
                                <legend>
                                    <b>Editar um Cliente</b>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
