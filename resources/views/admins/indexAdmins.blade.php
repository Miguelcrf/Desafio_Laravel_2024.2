<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados dos Administradores') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="/usuarios/create" class="btn btn-dark  mb-2">Criar</a> <?php //mb é margin bottom?>
    <ul class="list-group">
        @foreach($admins as $admin)          
            <li class="list-group-item d-flex ml-6 justify-content-between align-items-center" >
                <span id="nome-user-{{$admin->id}}"> {{$admin->name}}</span>
                <div class="input-group w-50" hidden id="input-nome-user-{{$admin->id}}">
                    <input type="text" class="form-control" value="{{$admin->name}}">
                    <div class="input-group-append">
                        @csrf
                    </div>
                </div>
           <span class="d-flex">
                <a href="#" class="btn btn-info btn-sm">
            <i class="fas fa-edit"></i>
            </a>

                <a href="#" class="btn btn-info btn-sm">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="#"
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