<div class="h-64 flex items-center bg-center bg-cover" style="background-image: url('{{ asset($image) }}');">
{{-- @props(['title', 'subtitle']); --}}
{{-- <div class="h-[30vh] flex items-center bg-gray backdrop-blur-lg"> --}}
    <div class="flex flex-col absolute left-20">
        <span class="text-5xl text-white font-bold">{{ $title }}</span>
        <span class="text-md text-white">{{ $subtitle }}</span>
    </div>
</div>
