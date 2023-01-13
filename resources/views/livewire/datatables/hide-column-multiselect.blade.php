<div x-data="{ show: false }" class="flex flex-col items-center">
    <div class="flex flex-col items-center relative">
        <button x-on:click="show = !show" class="px-3 py-2 text-xs leading-4 font-medium uppercase tracking-wider show-hide rounded-md">
            <div class="flex items-center h-5">
                {{ __('Tampil/Sembunyikan Kolom')}}
            </div>
        </button>
        <div x-show="show" x-on:click.away="show = false" class="z-50 absolute mt-5 -mr-4shadow-2xl bg-white w-full right-0 rounded max-h-select overflow-y-auto" x-cloak>
            <div class="flex flex-col w-full" style="border: 1px solid grey; border-radius: 10px; overflow:hidden">
                @foreach($this->columns as $index => $column)
                    @if ($column['hideable'] !== false)
                        <div>
                            <div class="@unless($column['hidden']) hidden @endif cursor-pointer w-full border-b bg-red-500 text-red-50 font-semibold hover:text-gray-900 hover:bg-red-50" wire:click="toggle({{$index}})">
                                <div class="relative flex w-full items-center p-2 group">
                                    <div class=" w-full items-center flex">
                                        <div class="mx-2 leading-6">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                                        <x-icons.check-circle class="h-3 w-3 stroke-current text-gray-50" />
                                    </div>
                                </div>
                            </div>
                            <div class="@if($column['hidden']) hidden @endif w-full cursor-pointer border-gray-500 border-b text-red-50 font-semibold hover:text-gray-900 bg-green-500 hover:bg-red-50 hover" wire:click="toggle({{$index}})">
                                <div class="relative flex w-full items-center p-2 group">
                                    <div class=" w-full items-center flex">
                                        <div class="mx-2 leading-6">{{ $column['label'] }}</div>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                                        <x-icons.x-circle class="h-3 w-3 stroke-current text-gray-50" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .top-100 {
        top: 100%
    }

    .bottom-100 {
        bottom: 100%
    }

    .max-h-select {
        max-height: 300px;
    }

</style>
