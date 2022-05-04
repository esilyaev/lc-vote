<div class="relative" x-data="{ isOpen:false }">
    <button x-cloak @click="isOpen=!isOpen" class="flex justify-center items-center bg-gray-200 rounded-xl border border-gray-200 px-6 py-3 w-44 h-12 font-semibold
              hover:border-gray-400 transition duration-150 ease-in">

        <span class="mr-2">Set status</span>
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-show="isOpen" @click.away="isOpen=false" class="absolute bg-white shadow-dialog rounded-xl py-3 px-4 w-76 text-left font-semibold top-0 mt-16 z-10">
        <form wire:submit.prevent="setStatus" action="#" method="post">
            <div class="space-y-2">
                <div class="">
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio bg-gray-200 text-yellow-200 border-none" type="radio" checked="" name="radio-direct" value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio bg-gray-200 text-lime-200 border-none" type="radio" name="radio-direct" value="2">
                        <span class="ml-2">In progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio bg-gray-200 text-blue-200 border-none" type="radio" name="radio-direct" value="3">
                        <span class="ml-2">Answered</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio bg-gray-200 text-red-200 border-none" type="radio" name="radio-direct" value="4">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>

            <textarea name="" id="" cols="30" rows="3" class="w-full mt-2 bg-gray-100 rounded-xl border-none placeholder-gray-700 text-sm" placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
            <div class="flex items-center justify-between space-x-3 mt-2">

                <button @click="isOpen=false" class="flex items-center text-white bg-blue-500 rounded-xl border border-blue-500 px-6 py-3 w-1/2 h-11 font-semibold
              hover:bg-blue-700 transition duration-150 ease-in">

                    <span class="ml-2">Submit</span>
                </button>
                <button class="flex items-center bg-gray-100 rounded-xl border border-gray-100 px-6 py-3 w-1/2 h-11 font-semibold
              hover:border-gray-400 transition duration-150 ease-in">
                    <svg class="w-5 text-gray-900 -rotate-45 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1">Attach</span>
                </button>
            </div>

            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="
                          rounded
                          border-gray-300
                          text-blue-500
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-offset-0
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        " checked="">
                    <span class="ml-2">Notify all voted</span>
                </label>
            </div>

        </form>
    </div>
</div>