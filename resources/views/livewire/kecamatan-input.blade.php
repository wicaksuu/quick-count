<div class="overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">
                    Nama Desa
                </th>
                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b border-gray-200">
                    {{ $calons['1']->nama }}
                </th>
                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b border-gray-200">
                    {{ $calons['2']->nama }}
                </th>
                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b border-gray-200">
                    {{ $calons['3']->nama }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($desas as $desa)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-200">
                        {{ $desa->nama }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-200">
                        <livewire:kec-input-suara :desa="$desa" :calon="$calons['1']" :key="$calons['1']->id">
                    </td>
                    <td class="px-4 py-2 border-b border-gray-200">
                        <livewire:kec-input-suara :desa="$desa" :calon="$calons['2']" :key="$calons['2']->id">
                    </td>
                    <td class="px-4 py-2 border-b border-gray-200">
                        <livewire:kec-input-suara :desa="$desa" :calon="$calons['3']" :key="$calons['3']->id">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
