<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualização de Usuários') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="">
                            
                            <legend>
                                <b>Visualizar Usuário</b>
                            @if($user->photo!= NULL)
                                <b>Foto de perfil: </b>
                                <br>
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de {{ $user->name }}" width="150" height="150">
                            @endif
                            </legend>
                            <b>Nome:</b>
                            <br>
                           <p>{{$user->name}}</p>
                           <b>Email:</b>
                           <br>
                          <p>{{$user->email}}</p> 
                          <b>Endereço:</b>
                          <br>
                         <p>{{$user->endereço}}</p>
                         <b>Telefone:</b>
                          <br>
                         <p>{{$user->telefone}}</p>
                         <b>CPF:</b>
                          <br>
                         <p>{{$user->cpf}}</p>
                         <b>Nascimento:</b>
                          <br>
                         <p>{{ \Carbon\Carbon::parse($user->nascimento)->format('d/m/Y') }}</p>
                         
                         
                            
                
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>