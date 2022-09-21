@props([
    "type" => "submit",
    'href' => ""
])

<?php $class = 'transition-colors duration-300 bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 text-white rounded-full py-2 px-4 uppercase font-semibold text-xs'; ?>

@if ($type == 'link')
    <a {{ $attributes(['href'=>$href, 'class'=>$class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes(['type'=>$type, 'class' => $class]) }}>
        {{ $slot }}
    </button>
@endif