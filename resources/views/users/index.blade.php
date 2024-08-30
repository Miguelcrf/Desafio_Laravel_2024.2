@extends('layout1')
 <?php // o extends é uma função do blade, NAO do php ?>
@section ('cabecalho')
Usuários Cadastrados
@endsection

@section ('conteudo')
        <a href="/usuarios/create" class="btn btn-dark  mb-2">Criar</a> <?php //mb é margin bottom?>
    <ul class="list-group">
        @foreach($users as $user)          
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
            <button class="btn btn-info btn-sm" onclick="tuggleinput(
                document.getElementById(input-nome-user-${user->id}) .remoteAtributte('hidden');
                document.getElementById(nome-user-${user->id}); .hidden=true;
)"> 
                <i class="fas fa-edit"></i>
</button>
                <a href="#" class="btn btn-info btn-sm">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="/usuarios/remover/{{$user->id}}"
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
@endsection