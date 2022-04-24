<nav class="flex items-center justify-between text-xs text-gray-400">
    <div>
        <ul class="flex uppercase font-semibold space-x-10">
            <li><a wire:click.prevent="SetStatus('all')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-blue-500 hover:text-gray-900 @if($status === 'all') border-blue-500 text-gray-900 @endif">All Items (85)</a></li>
            <li><a wire:click.prevent="SetStatus('open')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-yellow-500 hover:text-gray-900 @if($status === 'open') border-yellow-500 text-gray-900 @endif">Opened (5)</a></li>
            <li><a wire:click.prevent="SetStatus('in_progress')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-lime-500 hover:text-gray-900 first-line:@if($status === 'in_progress') border-lime-500 text-gray-900 @endif">In progress (17)</a></li>
        </ul>
    </div>
    <div>
        <ul class="flex uppercase font-semibold space-x-10 ">
            <li><a wire:click.prevent="SetStatus('answered')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-cyan-500 hover:text-gray-900 @if($status === 'answered') border-cyan-500 text-gray-900 @endif">Answered (85)</a></li>
            <li><a wire:click.prevent="SetStatus('close')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-red-500 hover:text-gray-900 @if($status === 'close') border-red-500 text-gray-900 @endif">Closed (5)</a></li>
        </ul>
    </div>
</nav>