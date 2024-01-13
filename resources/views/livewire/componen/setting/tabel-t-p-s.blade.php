<div>
    <div class="grid grid-cols-1 ">
        <div class="grid items-stretch grid-cols-12">
            <div class="self-center col-span-12 lg:col-span-6">
                <h5 class="text-gray-600 text-15 dark:text-gray-100">
                    Total TPS
                    <span class="ml-2 font-normal text-gray-500 dark:text-zinc-100">({{ $total_tps }})</span>
                </h5>
            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="flex flex-wrap items-center gap-2 mt-5 lg:mt-0 lg:justify-end">

                    <div>
                            @if (!empty($query))
                                @if (isset($results->id))
                                    <div wire:click="load({{ $results->id }})" class="p-2 text-sm cursor-pointer">
                                        {{ $results->kota->nama }} | {{ $results->nama }} </div>
                                @endif
                            @endif

                        <input type="text" wire:model.lazy="query" wire:keydown="refresh()"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="Ketik Kecamatan">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative mt-5 overflow-x-auto">
        <table class="w-full">
            <thead class="border-b cursor-pointer border-gray-50 dark:border-zinc-600">
                <tr class="text-gray-700 dark:text-gray-100">

                    <th class="relative p-4 text-start dark:text-gray-100">
                        Kabupaten
                    </th>

                    <th class="relative p-4 text-start dark:text-gray-100">
                        Kecamatan
                    </th>

                    <th class="relative p-4 text-start dark:text-gray-100">
                        Desa
                    </th>

                    <th class="relative p-4 text-start dark:text-gray-100">
                        Total TPS
                    </th>

                    <th class="relative p-4 w-28 text-start dark:text-gray-100">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr class="text-gray-600 border-b border-gray-50 dark:border-zinc-600">
                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->kota->nama }}
                        </td>
                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->kecamatan->nama }}
                        </td>
                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->nama }}
                        </td>
                        <td class="p-4 dark:text-zinc-50">
                            {{ count($datas->tpss) }}
                        </td>
                        <td>
                            <div class="flex">
                                <div class="m-1">
                                    <button wire:click="openModal({{ $datas->id }})" wire:loading.attr="disabled"
                                        type="button" class="px-3 text-white bg-green-600 border-0 btn">
                                        <i class="block text-sm mdi mdi-pencil">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <x-dialog-modal wire:model.live="isOpen">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <div class="space-y-4">
                    <div>
                        <label for="tps"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                            Jumlah TPS
                        </label>
                        <input type="number" wire:model="tps"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="1-100" required>
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="closeModal()" wire:loading.attr="disabled"
                class="text-white bg-yellow-500 border-yellow-500 rounded-full btn hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600">
                Cancel
            </button>
            <button type="button" wire:click="save" wire:loading.attr="disabled"
                class="text-white bg-green-500 border-green-500 rounded-full ms-3 btn hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600">
                {{ $button }}
            </button>
        </x-slot>
    </x-dialog-modal>

</div>
