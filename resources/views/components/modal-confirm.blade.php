<div x-data="{ isOpen: false, messageToDisplay: '' }">

    <div x-cloak x-transition.duration.300ms x-show="isOpen" @keydown.escape.window="isOpen = false" x-init="window.livewire.on('ideaWasUpdated', (message) => { isOpen = true; messageToDisplay = message; setTimeout(() => { isOpen = false}, 5000) })
    window.livewire.on('comment-added', (message) => { isOpen = true; messageToDisplay = message; setTimeout(() => { isOpen = false}, 5000) })
    " class="fixed bottom-0 right-0 z-10 flex justify-between w-full max-w-sm px-6 py-6 mx-6 my-8 bg-white border shadow-lg rounded-xl">
        <div class="flex items-center text-base text-gray-500">
            <svg class="w-6 h-6 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-2 text-sm font-semibold text-gray-500" x-text="messageToDisplay"></div>
        </div>
        <button class="text-gray-500 " @click=" isOpen=false">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>