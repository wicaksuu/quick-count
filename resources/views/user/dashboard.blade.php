<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Input Suara') }} {{ $tps->nama }} ({{ $kecamatan->nama }},{{ $desa->nama }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-3 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('desa.input-suara-user')

            </div>
        </div>
    </div>
</x-app-layout>
