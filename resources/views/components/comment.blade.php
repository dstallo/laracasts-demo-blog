@props(['comment'])

<x-panel class="bg-gray-100 flex space-x-4">
    <div class="flex-shrink-0">
        <img src="/images/lary-avatar.svg" alt="" width="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold text-sm">{{ $comment->author->name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time></p>
        </header>
        <div class="space-y-2 text-sm">
            {!! $comment->body !!}
        </div>
    </div>
</x-panel>