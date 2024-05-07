<div class="mt-1 rounded-md" x-data="{
    value: @entangle($attributes->wire('model')),
    isFocused() { return document.activeElement !== this.$refs.trix },
    setValue() {
        if (this.$refs.trix && this.$refs.trix.editor) {
            this.$refs.trix.editor.loadHTML(this.value);
        }
    },

}" x-init="setValue();
$watch('value', () => isFocused() && setValue())" x-on:trix-initialize="setValue()"
    x-on:trix-change="value = $event.target.value" x-on:trix-focus="setValue()"
    {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input id="x" type="hidden">
    <trix-editor x-ref="trix" input="x"
        class="max-w-full prose border rounded-md dark:prose-invert prose-indigo prose-p:text-sm prose-p:text-zinc-600 prose-p:dark:text-zinc-400 prose-blockquote:bg-white prose-blockquote:dark:bg-zinc-900 prose-pre:bg-white prose-pre:text-zinc-900 prose-pre:dark:bg-zinc-900 prose-pre:dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-950 text-zinc-700 dark:text-zinc-300 focus:border-indigo-200 dark:focus:border-indigo-800 focus:ring-0 focus:outline-none"></trix-editor>
</div>
