<div class="flex justify-between">
<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
<div class="w-32 flex ">
</div>
@else
<button wire:click="previousPage" id="pagination-mobile-page-previous" class="w-32 flex justify-between items-center relative px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
    <x-icons.arrow-left />
    <span style="font-size: .7rem">
      {{ __('Sebelumnya')}}
    </span>
</button>
@endif


<!-- Next Page pnk -->
@if ($paginator->hasMorePages())
<button wire:click="nextPage" id="pagination-mobile-page-next" class="w-32 flex justify-between items-center relative items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
  <span style="font-size: .7rem">
    {{ __('Selanjutnya')}}
  </span>
    <x-icons.arrow-right />
</button>
@else
<div class="w-32 ">
</div>
@endif
</div>
