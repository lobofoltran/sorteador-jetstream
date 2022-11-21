<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resultado do Sorteio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h5 class="text-xl font-bold dark:text-white mb-2">Quantidade de palavras sorteadas: {{ sizeof($sorteio) }} - (Ordem {{ $ordem ?? 'crescente' }})</h5>
                    <div class="mt-2">
                        @foreach ($sorteio as $r)
                            {{ ($loop->index) + 1 }} - {{ $r }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mb-4 mt-4">
                    <a href="{{ route('sorteador.index') }}">
                        <button type="button" class="py-2.5 px-4 text-md font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
