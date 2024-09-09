<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualização de Administradores') }}
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
                                <b>Visualizar Administrador</b>
                                
                            </legend>
                        
                        <b>Foto de Perfil:</b>
                        <br>
                        <img src="{{ asset('storage/' . $admin->photo) }}" alt="Foto de {{ $admin->name }}" width="150" height="150">
                            <b>Nome:</b>
                            <br>
                           <p>{{$admin->name}}</p>
                           <b>Email:</b>
                           <br>
                          <p>{{$admin->email}}</p> 
                          <b>Endereço:</b>
                          <br>
                         <p>{{$admin->endereço}}</p>
                         <b>Telefone:</b>
                          <br>
                         <p>{{$admin->telefone}}</p>
                         <b>CPF:</b>
                          <br>
                         <p>{{$admin->cpf}}</p>
                         <b>Nascimento:</b>
                          <br>
                         <p>{{$admin->nascimento}}</p>
                         
                            
                
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
