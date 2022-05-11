<x-app-layout>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-2">All ideas (or back to chosen category with filters)</span></a>

    <x-modal-confirm />

    <livewire:idea-show :idea="$idea" :votesCount="$votes" />
    @can('update', $idea)
    <livewire:edit-idea :idea="$idea" />
    @endcan
    @can('delete', $idea)
    <livewire:delete-idea :idea="$idea" />
    @endcan
    <div class="relative my-8 ml-24 space-y-6 comments-container">
        <div class="relative flex mt-4 bg-white comment rounded-xl">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <!-- <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4> -->
                    <div class="mt-3 text-gray-600">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-700">User name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative h-8 px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="absolute hidden py-3 ml-2 font-semibold bg-white w-44 shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 text-red-700 transition duration-150 ease-in hover:bg-gray-100">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
        <div class="relative flex mt-4 bg-white border-2 border-blue-500 comment comment-admin rounded-xl">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none text-center text-blue-500">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="mb-2 w-14 h-14 rounded-xl ">
                    </a>
                    <span class="text-xs uppercase">Admin</span>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "In Progress"</a>
                    </h4>
                    <div class="mt-3 text-gray-600">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-blue-500">Admin name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative h-8 px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="absolute hidden py-3 ml-2 font-semibold bg-white w-44 shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 text-red-700 transition duration-150 ease-in hover:bg-gray-100">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
        <div class="relative flex mt-4 bg-white comment rounded-xl">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <!-- <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4> -->
                    <div class="mt-3 text-gray-600">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-700">User name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative h-8 px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="absolute hidden py-3 ml-2 font-semibold bg-white w-44 shadow-dialog rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 text-red-700 transition duration-150 ease-in hover:bg-gray-100">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
    </div> <!-- end comments-container -->
</x-app-layout>