<div>
    <div class="hidden bg-lime-200 bg-cyan-200 bg-yellow-200 bg-gray-400 bg-gray-200">
        <!-- stupid hack for not deleting dynamic assign classes -->
    </div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="" id="" class="w-full bg-white rounded-xl border-none px-4 py-2">
                <option value="Option 1">Option 1</option>
                <option value="Option 2">Option 2</option>
                <option value="Option 3">Option 3</option>
                <option value="Option 4">Option 4</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="" id="" class="w-full bg-white rounded-xl border-none px-4 py-2">
                <option value="Option 1">Option 1</option>
                <option value="Option 2">Option 2</option>
                <option value="Option 3">Option 3</option>
                <option value="Option 4">Option 4</option>
            </select>
        </div>

        <div class="w-2/3 relative">

            <input type="search" placeholder="Find an idea" class="placeholder-gray-900 bg-white w-full rounded-xl border-none pl-8 px-4 py-2" />
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 h-full text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

            </div>
        </div>
    </div>
    <!-- end filters -->
    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $idea)

        <livewire:idea-index :key="$idea->id" :idea="$idea" />



        @endforeach
    </div> <!-- end ideas container -->
    <div class="my-8">
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>