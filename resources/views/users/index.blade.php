
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seus Dados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
    <ul class="list-group">
        @foreach($users as $user)   
        @if(Auth::user()->id == $user->id)       
            <li class="list-group-item d-flex ml-6 justify-content-between align-items-center" >
                <span id="nome-user-{{$user->id}}"> {{$user->name}}</span>
                <div class="input-group w-50" hidden id="input-nome-user-{{$user->id}}">
                    <input type="text" class="form-control" value="{{$user->name}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{$user->id}})">
                        <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
           <span class="d-flex">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
            <i class="fas fa-edit"></i>
            </a>

                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="{{ route('users.delete', $user->id) }}"
            onsubmit="return confirm('tem certeza?')">
                @csrf
                
                <button class="btn btn-danger btn-sm ml-1"> 
                <i class="fa-regular fa-trash-can"></i>
                </button> <?php //btn-sm diminui o tamanho do botão?>
            
            </form>
            </span>
            
            </li> 
            
            @endif
        
            
        @endforeach
         </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



