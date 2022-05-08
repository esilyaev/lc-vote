<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen">
            <!--            Modal panel, show/hide based on modal state.

            Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="modal relative  bg-white rounded-t-xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full pt-4">
                <div class="absolute top-0 right-0 pt-4 pr-4 ">
                    <button class="text-gray-400 hover:text-gray-900 text-lg h-6 w-6"><svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg></button>
                </div>
                <div class=" bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-center text-lg font-medium text-gray-900">Edit idea</h3>
                    <p class="text-xs text-center text-gray-500 mt-4 leading-3 px-6">You have one hour to edit you idea from time you created it.</p>
                    <div class="sm:flex sm:items-start">
                        <form action="#" method="post" class="space-y-4 px-4 pt-6 w-full">
                            <div>
                                <input wire:model.defer="title" type="text" class="w-full text-sm border-none bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your idea" />
                                @error('title')
                                <p class="text-red-500 text-xs">Title must be more than 4 characters</p>
                                @enderror
                            </div>
                            <div class="">
                                <select wire:model.defer="category" name="" id="" class="w-full text-sm bg-gray-100 rounded-xl border-none px-4 py-2">

                                    <option value=""></option>

                                    @error('category')
                                    <p class="text-red-500 text-xs">Category must be selected</p>
                                    @enderror
                                </select>
                            </div>
                            <div>
                                <textarea wire:model.defer="description" class="w-full text-sm rounded-xl bg-gray-100 border-none placeholder-gray-900 px-4 py-2" name="idea-description" id="idea-description" cols="30" rows="4" placeholder="Discribe your idea"></textarea>
                                @error('description')
                                <p class="text-red-500 text-xs">Description must be more than 4 characters</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between space-x-3">
                                <button class="flex items-center bg-gray-100 rounded-xl border border-gray-100 px-6 py-3 w-1/2 h-11 font-semibold
              hover:border-gray-400 transition duration-150 ease-in">
                                    <svg class="w-5 text-gray-900 -rotate-45 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                                <button class="flex items-center text-white bg-blue-500 rounded-xl border border-blue-500 px-6 py-3 w-1/2 h-11 font-semibold
              hover:bg-blue-700 transition duration-150 ease-in" type="submit">

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
                </div>

            </div>
        </div>
    </div>
</div>