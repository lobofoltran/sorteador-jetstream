<x-app-layout>
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <div>
            <span class="font-medium"><b>Texto sorteado: </b></span> {{ $sorteado }}
        </div>
        <div>
            <span class="font-medium"><b>Em ordem crescente: </b></span><br>
            @foreach ($response as $r)
                {{ ($loop->index) + 1 }} - {{ $r }}<br>
            @endforeach
        </div>
    </div>
</x-app-layout>
