<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados dos usuários') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{Route('admins.usuarios.create')}}" class="btn btn-dark  mb-2">Criar</a> <?php //mb é margin bottom?>
    <ul class="list-group">
        @foreach($users as $user)          
            <li class="list-group-item d-flex ml-6 justify-content-between align-items-center" >
                <span id="nome-user-{{$user->id}}"> {{$user->name}}</span>
                <div class="input-group w-50" hidden id="input-nome-user-{{$user->id}}">
                    <input type="text" class="form-control" value="{{$user->name}}">
                    <div class="input-group-append">
                        @csrf
                    </div>
                </div>
           <span class="d-flex">
                <a href="{{ route('admins.usuarios.edit', $user->id) }}" class="btn btn-info btn-sm">
            <i class="fas fa-edit"></i>
            </a>

                <a href="{{ route('admins.usuarios.show', $user->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="{{Route('admins.usuarios.delete', $user->id)}}"
            onsubmit="return confirm('tem certeza?')">
                @csrf
                
                <button class="btn btn-danger btn-sm ml-1"> 
                <i class="fa-regular fa-trash-can"></i>
                </button> <?php //btn-sm diminui o tamanho do botão?>
            
            </form>
            </span>
            
            </li> 
            
            
        
            
        @endforeach
         </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>