<div x-data @click="
      if(!['button', 'svg', 'path', 'a'].includes($event.target.tagName.toLowerCase())) $event.target.closest('.idea-container').querySelector('.idea-link').click()
    " class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
    <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue-500 @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
            <div class="mt-8">
                @if ($hasVoted)
                <button wire:click.prevent="vote" class="w-20 text-white bg-blue-500 border border-blue-500 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-blue-700 transition duration-150 ease-in">Voted</button>
                @else
                <button wire:click.prevent="vote" class="w-20 bg-gray-200 border border-gray-200 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-gray-400 transition duration-150 ease-in">Vote</button>
                @endif


            </div>
        </div>
    </div>

    <div class="flex px-4 py-6 w-full">
        <a href="#" class="flex-none">
            <img src="{{ $idea->user->GetAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="mx-4 flex flex-col justify-between w-full">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3">
                <p class="line-clamp-3">{{ $idea->description }}</p>
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bullet;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bullet;</div>
                    <div class="text-gray-900">Comments 3</div>
                </div>

            </div>
        </div>
    </div>
</div> <!-- end idea-container -->