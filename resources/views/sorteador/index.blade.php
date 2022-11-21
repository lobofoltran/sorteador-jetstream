<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sorteador de Texto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="/sortear">
                @csrf
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <x-jet-validation-errors class="mb-4"/>
                        <div class="mb-6">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade de Palavras a serem Sorteadas:</label>
                            <input type="number" id="number" name="qtde" value="{{ old('qtde') ?? 1 }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div style="margin-bottom: 10px;">Digite o texto a ser sorteado:</div>
                        <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                                <textarea id="texto" name="texto" value="{{ old('texto') }}" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Texto separado por ponto e vírgula (;) ou por quebra de linha." required></textarea>
                            </div>
                            <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                                {{-- <button id="buttonEnviar" onclick="realizaSorteio()" class="py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Enviar
                                </button> --}}
                                <button type="submit" class="py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Enviar
                                </button>
                                <div>
                                    <input id="decrescente" type="checkbox" value="decrescente" name="decrescente" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="decrescente" style="margin-right:5px" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ordem decrescente</label>
                                    <button type="button" class="py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                        Enviar arquivo .csv ou .txt
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
        function realizaSorteio() {
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var urlencoded = new URLSearchParams();
            urlencoded.append("texto", document.getElementById('texto').value);
            urlencoded.append("ordem", document.getElementById('ordem').checked ? 1 : 0);

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
            };

            document.getElementById('buttonEnviar').innerHTML = 
                `<svg role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                    Carregando...`;

            setTimeout(async function() {
                let response = await fetch('/sortear', requestOptions)
                .then(response => response.text())
                .then(function(response) {
                    document.getElementById('resultado').innerHTML = response;
                })
                .catch(error => console.log('error', error));
    
                document.getElementById('buttonEnviar').innerHTML = 'Enviar';
            }, 1000);
                
        }
    </script> --}}
</x-app-layout>
