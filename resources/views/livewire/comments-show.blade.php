<div class="relative my-8 ml-24 space-y-6 comments-container">
    @forelse ($comments as $comment)

    <div class="relative flex mt-4 bg-white comment rounded-xl">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $comment->user->GetAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <!-- <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4> -->
                <div class="mt-3 text-gray-600">
                    <p class="">{{ $comment->body }}</p>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div class="font-bold text-gray-700">{{ $comment->user->name }}</div>
                        <div>&bullet;</div>
                        <div>{{ $comment->created_at->diffForHumans() }}</div>

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

    @empty

    <div>No comments were found ...</div>

    @endforelse

    <div class="my-8">
        {{ $comments->links() }}

    </div>


</div> <!-- end comments-container -->