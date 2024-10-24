<div>
    <input type="text" wire:model='suara' wire:keyup.debounce.1000ms="input" wire:model.defer="inputSuara.{{ $desa->id }}.{{ $calon->id }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm">
</div>
