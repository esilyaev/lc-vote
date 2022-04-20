<div x-data @click="
      if(!['button', 'svg', 'path', 'a'].includes($event.target.tagName.toLowerCase())) $event.target.closest('.idea-container').querySelector('.idea-link').click()
    " class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
  <div class="border-r border-gray-100 px-5 py-8">
    <div class="text-center">
      <div class="font-semibold text-2xl @if($idea->voted_by_user) text-blue-500 @endif">{{ $idea->votes_count }}</div>
      <div class="text-gray-500">Votes</div>
      <div class="mt-8">
        @if ($idea->voted_by_user)
        <button class="w-20 text-white bg-blue-500 border border-blue-500 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-blue-700 transition duration-150 ease-in">Voted</button>
        @else
        <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-md uppercase 
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
        <p class="line-clamp-3">{{ $idea-> description }}</p>
      </div>
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
          <div>{{ $idea->created_at->diffForHumans() }}</div>
          <div>&bullet;</div>
          <div>{{ $idea->category->name }}</div>
          <div>&bullet;</div>
          <div class="text-gray-900">Comments 3</div>
        </div>
        <div x-data="{ isOpen:false }" class="flex items-center space-x-2">
          <div class="{{ $idea->GetStatusClasses() }}  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">{{ $idea->status->name }}</div>
          <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
              <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
            </svg>
            <ul x-show="isOpen" class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
              <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
              <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
            </ul>
          </button>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end idea-container -->