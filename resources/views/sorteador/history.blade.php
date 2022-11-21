<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Histórico de Sorteios
        </h2>
    </x-slot>

    <div id="orders" style="padding: 15px 50px">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            DATA DE INCLUSÃO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SORTEIO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            ORDEM
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sorteio as $s)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Carbon\Carbon::parse($sorteio[$loop->index]['tms_created_at'])->format('d/m/Y H:i') }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('history.show', $loop->index) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $sorteio[$loop->index]['ordem'] ? 'Decrescente' : 'Crescente' }}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>