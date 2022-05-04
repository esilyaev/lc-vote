<x-app-layout>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-2">All ideas (or back to chosen category with filters)</span></a>

    <livewire:idea-show :idea="$idea" :votesCount="$votes" />

    <div class="comments-container relative space-y-6 ml-24 my-8">
        <div class="comment relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <!-- <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4> -->
                    <div class="text-gray-600 mt-3">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-700">User name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                                    <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                                    <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
        <div class="comment comment-admin relative bg-white rounded-xl flex mt-4 border-2 border-blue-500">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none text-center text-blue-500">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl mb-2 ">
                    </a>
                    <span class="uppercase text-xs">Admin</span>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "In Progress"</a>
                    </h4>
                    <div class="text-gray-600 mt-3">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue-500">Admin name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                                    <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                                    <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
        <div class="comment relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <!-- <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4> -->
                    <div class="text-gray-600 mt-3">
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, unde?</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-700">User name</div>
                            <div>&bullet;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                                    <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                                    <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment -->
    </div> <!-- end comments-container -->
</x-app-layout>