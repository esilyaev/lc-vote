<div class="idea-and-buttons">
    <div class="flex mt-4 bg-white idea-container rounded-xl">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->GetAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="mt-3 text-gray-600">
                    <p class="">{{ $idea->description }}</p>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div class="font-bold text-gray-700">{{ $idea->user->name }}</div>
                        <div>&bullet;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bullet;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bullet;</div>
                        <div class="text-gray-900">Comments 3</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="{{ $idea->GetStatusClasses() }} text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">{{ $idea->status->name }}</div>
                        @auth
                        <div x-data="{isOpen:false}" class="relative">
                            <button @click=" isOpen=!isOpen" class="relative h-8 px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                            <ul x-cloak x-show="isOpen" @click.away="isOpen=false" class="absolute z-10 py-3 ml-4 font-semibold bg-white w-44 shadow-dialog rounded-xl">
                                <li><a @click="isOpen = false; $dispatch('custom-show-edit-modal')" href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Edit idea</a></li>
                                <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                <li><a @click="isOpen = false; $dispatch('custom-show-delete-modal')" href="#" class="block px-5 py-3 text-red-700 transition duration-150 ease-in hover:bg-gray-100">Delete idea</a></li>
                            </ul>

                        </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="flex items-center justify-between mt-5 ml-6 controls">
        <div class="flex space-x-6 ">
            <div class="relative" x-data="{isOpen:false}">
                <button @click="isOpen=!isOpen" class="flex items-center justify-center h-12 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 rounded-xl w-36 hover:bg-blue-700">

                    <span class="">Reply</span>

                </button>
                <div x-cloak x-show="isOpen" @click.away="isOpen=false" class="absolute top-0 z-10 px-4 py-3 mt-16 font-semibold text-left bg-white shadow-dialog rounded-xl w-104">
                    <textarea name="" id="" cols="30" rows="2" class="w-full text-sm placeholder-gray-700 bg-gray-100 border-none rounded-xl" placeholder="Add an update comment(optional)"></textarea>
                    <div class="flex items-center justify-between mt-2 space-x-3">

                        <button class="flex items-center w-1/2 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 rounded-xl h-11 hover:bg-blue-700">

                            <span class="ml-2">Submit</span>
                        </button>
                        <button class="flex items-center w-1/2 px-6 py-3 font-semibold transition duration-150 ease-in bg-gray-100 border border-gray-100 rounded-xl h-11 hover:border-gray-400">
                            <svg class="w-5 text-gray-900 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            @auth
            @if (auth()->user()->isAdmin())
            <livewire:set-status :idea="$idea" />

            @endif

            @endauth




        </div>
        <div class="flex items-center justify-between space-x-3">
            <div class="h-12 px-3 py-1 font-semibold text-center bg-white rounded-xl">
                <div class="text-xl leading-snug @if($hasVoted) text-blue-500 @endif">{{ $votesCount }}</div>
                <div class="text-xs leading-none text-gray-400">Votes</div>
            </div>
            @if ($hasVoted)
            <button wire:click.prevent="vote" class="flex items-center justify-center h-12 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 rounded-xl w-36 hover:bg-blue-700" type="submit">

                <span class="uppercase font-bol">Voted</span>
            </button>

            @else
            <button wire:click.prevent="vote" class="flex items-center justify-center h-12 px-6 py-3 font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 rounded-xl w-36 hover:border-gray-400">

                <span class="font-bold uppercase">Vote</span>

            </button>

            @endif

        </div>

    </div> <!-- end controls -->
</div> <!-- idea-and-buttons end container -->