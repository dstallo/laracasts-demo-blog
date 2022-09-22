@props(["label"])

<div x-data="{show:false}" {{ $attributes(["class"=>"relative lg:inline-flex flex items-center bg-gray-100 rounded-xl"]) }}>
    <button @click="show = ! show" @click.away="show = false" class="py-2 pl-3 pr-9 w-full text-sm font-semibold text-left">
        {{ $label }}
    </button>
    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
            height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222"
                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
    <div x-show="show" style="display:none" class="absolute rounded-xl bg-gray-100 py-2 w-full top-full text-sm mt-1 z-50 min-w-max">
        {{ $slot }}
    </div>
</div>