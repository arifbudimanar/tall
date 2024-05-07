<div class="mt-4 overflow-x-auto border rounded-md border-zinc-200 dark:border-zinc-800">
    <table class="w-full text-left text-zinc-600 dark:text-zinc-400">
        <thead class="uppercase border-b bg-zinc-100 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800">
            <tr>
                {{ $head }}
            </tr>
        </thead>
        <tbody wire:loading.class="opacity-65" class="divide-y divide-zinc-200 dark:divide-zinc-800">
            {{ $body }}
        </tbody>
    </table>
</div>
