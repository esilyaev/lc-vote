<div x-data @click="
      if(!['button', 'svg', 'path', 'a'].includes($event.target.tagName.toLowerCase())) $event.target.closest('.idea-container').querySelector('.idea-link').click()
    " class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container rounded-xl hover:shadow-card">
    <div class="px-5 py-8 border-r border-gray-100">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue-500 @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
            <div class="mt-8">
                @if ($hasVoted)
                <button wire:click.prevent="vote" class="w-20 px-4 py-3 font-bold text-white uppercase transition duration-150 ease-in bg-blue-500 border border-blue-500 text-md rounded-xl hover:border-blue-700">Voted</button>
                @else
                <button wire:click.prevent="vote" class="w-20 px-4 py-3 font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 text-md rounded-xl hover:border-gray-400">Vote</button>
                @endif


            </div>
        </div>
    </div>

    <div class="flex w-full px-4 py-6">
        <a href="#" class="flex-none">
            <img src="{{ $idea->user->GetAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="flex flex-col justify-between w-full mx-4">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="mt-3 text-gray-600">
                <p class="line-clamp-3">{{ $idea->description }}</p>
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bullet;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bullet;</div>
                    <div class="text-gray-900">Comments {{ $commentsCount }}</div>
                </div>

            </div>
        </div>
    </div>
</div> <!-- end idea-container -->