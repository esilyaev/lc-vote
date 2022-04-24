<nav class="flex items-center justify-between text-xs text-gray-400">
    <div>
        <ul class="flex uppercase font-semibold space-x-10">
            <li><a wire:click.prevent="SetStatus('all')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-blue-500 hover:text-gray-900 @if($status === 'all') border-blue-500 text-gray-900 @endif">All Items (85)</a></li>
            <li><a wire:click.prevent="SetStatus('Open')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-yellow-500 hover:text-gray-900 @if($status === 'Open') border-yellow-500 text-gray-900 @endif">Opened (5)</a></li>
            <li><a wire:click.prevent="SetStatus('In progress')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-lime-500 hover:text-gray-900 first-line:@if($status === 'In progress') border-lime-500 text-gray-900 @endif">In progress (17)</a></li>
        </ul>
    </div>
    <div>
        <ul class="flex uppercase font-semibold space-x-10 ">
            <li><a wire:click.prevent="SetStatus('Answered')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-cyan-500 hover:text-gray-900 @if($status === 'Answered') border-cyan-500 text-gray-900 @endif">Answered (85)</a></li>
            <li><a wire:click.prevent="SetStatus('Closed')" href="#" class=" transition duration-2 ease-in border-b-4 pb-3 hover:border-gray-700 hover:text-gray-900 @if($status === 'Closed') border-gray-700 text-gray-900 @endif">Closed (5)</a></li>
        </ul>
    </div>
</nav>