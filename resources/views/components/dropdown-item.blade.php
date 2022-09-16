@props(["active"=>false])

<?php
$class = 'block px-2 leading-6 text-left w-full hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';
if ($active)
    $class .= " bg-blue-500 text-white";
?>

<a {{ $attributes->merge(["class" => $class]) }}>{{ $slot }}</a>