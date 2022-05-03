<div>
    <div class="hidden bg-lime-200 bg-cyan-200 bg-yellow-200 bg-gray-400 bg-gray-200">
        <!-- stupid hack for not deleting dynamic assign classes -->
    </div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full bg-white rounded-xl border-none px-4 py-2">
                <option value="all">All categories</option>
                @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>

                @endforeach

            </select>
        </div>
        <div class="w-1/3">
            <select wire:model="filter" name="filter" id="filter" class="w-full bg-white rounded-xl border-none px-4 py-2">
                <option value="none">No filter</option>
                <option value="top">Top voted</option>
                <option value="my">My ideas</option>
            </select>
        </div>

        <div class="w-2/3 relative">

            <input wire:model="searchFilter" type="search" placeholder="Find an idea" class="placeholder-gray-900 bg-white w-full rounded-xl border-none pl-8 px-4 py-2" />
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 h-full text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

            </div>
        </div>
    </div>
    <!-- end filters -->
    <div class="ideas-container space-y-6 my-6">
        @forelse ($ideas as $idea)

        <livewire:idea-index :key="$idea->id" :idea="$idea" />

        @empty
        <div>No ideas were found ...</div>

        @endforelse
    </div> <!-- end ideas container -->
    <div class="my-8">
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>