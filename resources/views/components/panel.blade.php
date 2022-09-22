@props(["heading"=>null])

<div {{ $attributes(['class'=>'border border-gray-200 rounded-xl p-6']) }}>
@if ($heading)
    <h1 class="uppercase block text-center font-semibold mb-4">{{ $heading }}</h1>
@endif
    {{ $slot }}
</div>