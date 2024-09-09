<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Envio de Emails') }}
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center w-full h-full">
                        <form action="{{Route('contact.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <legend>
                                    <b>Enviar Email</b>
                                </legend>
                                <h3>conteudo: </h3>
                                <br>
                                <textarea name="content" id="content" cols="30" rows="10" required>

                                </textarea>
                                <label for="destinatario">Selecione o grupo de alvos do seu email: </label>
                                <select name="destinatario" id="destinatario" multiple required>
                                    <option value="gerentes">gerentes</option>
                                    <option value="usuarios">usuarios</option>
                                    <option value="administradores">administradores</option>
                                </select>
                                <button type="submit" class="p-1.5 bg-red-500 rounded">
                                    Enviar
                                </button>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
