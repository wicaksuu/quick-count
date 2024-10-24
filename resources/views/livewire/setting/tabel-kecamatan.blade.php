<div>
    <div class="grid grid-cols-1 ">
        <div class="grid items-stretch grid-cols-12">
            <div class="self-center col-span-12 lg:col-span-6">
                <h5 class="text-gray-600 text-15 dark:text-gray-100">
                    Menampilkan User Kecamtan
                </h5>
            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="flex flex-wrap items-center gap-2 mt-5 lg:mt-0 lg:justify-end">

                </div>
            </div>
        </div>
    </div>

    <div class="relative mt-5 overflow-x-auto">
        <table class="w-full">
            <thead class="border-b cursor-pointer border-gray-50 dark:border-zinc-600">
                <tr class="text-gray-700 dark:text-gray-100">

                    <th class="relative p-4 text-start dark:text-gray-100">
                        No.
                    </th>

                    <th class="relative p-4 text-start dark:text-gray-100">
                        Kecamatan
                    </th>

                    <th class="relative p-4 text-start dark:text-gray-100">
                        User Mail
                    </th>
                    <th class="relative p-4 text-start dark:text-gray-100">
                        User Pass
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
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-4 dark:text-zinc-50">

                        </td>
                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->nama }}
                        </td>

                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->user->email }}
                        </td>

                        <td class="p-4 dark:text-zinc-50">
                            {{ $datas->user->password_dumy }}
                        </td>
                        <td>
                            <div class="flex">
                                <div class="m-1">
                                    <button wire:click="ResetPass('{{ $datas->user->id }}')" wire:loading.attr="disabled"
                                        type="button" class="px-3 text-white bg-blue-600 border-0 btn">
                                        <i class="block text-sm mdi mdi-lock-reset">
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


</div>
