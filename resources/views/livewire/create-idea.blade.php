<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <form wire:submit.prevent="createIdea" action="#" method="post" class="px-4 py-6 space-y-4">
        <div>
            <input wire:model.defer="title" type="text" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Your idea" />
            @error('title')
            <p class="text-xs text-red-500">Title must be more than 4 characters</p>
            @enderror
        </div>
        <div class="">
            <select wire:model.defer="category" name="" id="" class="w-full px-4 py-2 text-sm bg-gray-100 border-none rounded-xl">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @error('category')
                <p class="text-xs text-red-500">Category must be selected</p>
                @enderror
            </select>
        </div>
        <div>
            <textarea wire:model.defer="description" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" name="idea-description" id="idea-description" cols="30" rows="4" placeholder="Discribe your idea"></textarea>
            @error('description')
            <p class="text-xs text-red-500">Description must be more than 4 characters</p>
            @enderror
        </div>
        <div class="flex items-center justify-between space-x-3">
            <button class="flex items-center w-1/2 px-6 py-3 font-semibold transition duration-150 ease-in bg-gray-100 border border-gray-100 rounded-xl h-11 hover:border-gray-400">
                <svg class="w-5 text-gray-900 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span class="ml-1">Attach</span>
            </button>
            <button class="flex items-center w-1/2 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 rounded-xl h-11 hover:bg-blue-700" type="submit">

                <span class="ml-2">Submit</span>
            </button>
        </div>
        <div>
            @if (session('success_message'))
            <div x-data="{ isVisible:true }" x-init="setTimeout(() => { isVisible = false}, 5000)" x-show.transition.duration.1000ms="isVisible" class="text-green-600 mt4">
                {{ session('success_message') }}
            </div>
            @endif
        </div>
    </form>
</div>