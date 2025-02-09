<x-layout>
    <div class="flex w-full">
        <div class="w-1/4">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" class="rounded-lg shadow-md" alt="">
        </div>
        <div class="w-3/4">
            <p class="text-4xl font-bold font-mono inline">{{ $member['name'] }} </p>
            <p class="text-base font-mono inline">{{ $member['Born'] }}</p>
        </div>
    </div>
</x-layout>
