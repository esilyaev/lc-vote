<div class="relative" x-data="{isOpen:false}" x-init="$wire.on('comment-added', () => isOpen=false)">
    <button @click="isOpen=!isOpen" class="flex items-center justify-center h-12 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 rounded-xl w-36 hover:bg-blue-700">

        <span class="">Reply</span>

    </button>
    <div x-cloak x-show="isOpen" @click.away="isOpen=false" class="absolute top-0 z-10 px-4 py-3 mt-16 font-semibold text-left bg-white shadow-dialog rounded-xl w-104">
        <textarea wire:model="body" name="" id="" cols="30" rows="2" class="w-full text-sm placeholder-gray-700 bg-gray-100 border-none rounded-xl" placeholder="Add an update comment(optional)"></textarea>
        <div class="flex items-center justify-between mt-2 space-x-3">

            <button wire:click.prevent="createComment" class="flex items-center w-1/2 px-6 py-3 font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 rounded-xl h-11 hover:bg-blue-700">

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