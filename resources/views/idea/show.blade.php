<x-app-layout>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-2">All ideas (or back to chosen category with filters)</span></a>

    <x-modal-confirm />

    <livewire:idea-show :idea="$idea" :votesCount="$votes" :commentsCount="$comments" />
    @can('update', $idea)
    <livewire:edit-idea :idea="$idea" />
    @endcan
    @can('delete', $idea)
    <livewire:delete-idea :idea="$idea" />
    @endcan

    <!-- End Modals -->
    <livewire:comments-show :idea="$idea" />
</x-app-layout>