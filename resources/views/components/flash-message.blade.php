<?php $wrapper = false; ?>
@foreach(["success", "info", "error"] as $type)
    @if (session()->has($type))
        @if (! $wrapper)
            <div class="fixed top-2 left-1/2 transform -translate-x-1/2">
        @endif
        <div 
            x-data="{show: true}" 
            x-show="show"
            x-init="setTimeout(()=> show=false, 5000)"
        @if ($type == 'success')
            class="bg-green-50 border border-green-600 px-3 py-2 rounded-xl text-green-600 text-sm mt-2"
        @elseif ($type == 'error')
            class="bg-red-100 text-red-500 border-red-500 border px-3 py-2 rounded-xl text-sm mt-2"
        @else
            class="bg-blue-500 text-white border border-blue-500 px-3 py-2 rounded-xl text-sm mt-2"
        @endif
        >
            <p>{{ session($type) }}</p>
        </div>
        @if (! $wrapper)
            <?php $wrapper = true; ?>
            </div>
        @endif
    @endif
@endforeach