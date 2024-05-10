<x-card.form submit="submitFunction" formWidth="full" :title="__('Form Card Title')" :description="__('Form card description.')">
    <x-slot:form>
        <div>
            <p>{{ __('4 maxWidth variant: full, 7xl (default), 3xl, xl') }}</p>
            <p>{{ __('4 formWidth variant: full, 7xl, 3xl, lg (default)') }}</p>
        </div>
        <ol class="font-semibold">
            <li>title : props / slot - nullable</li>
            <li>description : props / slot - nullable</li>
            <li>maxWidth : props (default = 7xl) - nullable</li>
            <li>formWidth : props (default = lg) - nullable</li>
            <li>submit : props - required</li>
            <li>form : slot - required</li>
            <li>content : slot - required</li>
        </ol>

        <x-input.errors />

        {{-- Text input --}}
        <div class="max-w-lg">
            <x-input.label for="text" :value="__('Text')" required />
            <x-input.text id="text" type="text" class="block w-full mt-1" wire:model="text" autofocus
                autocomplete="text" placeholder="{{ __('Text Input') }}" required />
            <x-input.error for="text" class="mt-2" />
        </div>

        {{-- Number input --}}
        <div class="max-w-lg">
            <x-input.label for="number" :value="__('Number')" required />
            <x-input.text id="number" type="number" class="block w-full mt-1" wire:model="number" autofocus
                autocomplete="number" placeholder="{{ __('Number Input') }}" required />
            <x-input.error for="number" class="mt-2" />
        </div>

        {{-- Email input --}}
        <div class="max-w-lg">
            <x-input.label for="email" :value="__('Email')" required />
            <x-input.text id="email" type="email" class="block w-full mt-1" wire:model="email"
                autocomplete="email" placeholder="{{ __('user@mail.com') }}" required />
            <x-input.error for="email" class="mt-2" />
        </div>

        {{-- Password input --}}
        <div class="max-w-lg">
            <x-input.label for="password" :value="__('Password')" required />
            <x-input.text id="password" type="password" class="block w-full mt-1" wire:model="password"
                autocomplete="password" placeholder="••••••••" required />
            <x-input.error for="password" class="mt-2" />
        </div>

        {{-- Date input --}}
        <div class="max-w-lg">
            <x-input.label for="date" :value="__('Date')" required />
            <x-input.text id="date" type="date" class="block w-full mt-1 dark:[color-scheme:dark]"
                wire:model="date" required />
            <x-input.error for="date" class="mt-2" />
        </div>

        {{-- Select input --}}
        <div class="max-w-lg">
            <x-input.label for="select" :value="__('Select')" required />
            <x-input.select id="select" class="block w-full mt-1" wire:model="select" required>
                <option value="">{{ __('Select Option') }}</option>
                <option value="Option1">{{ __('Option 1') }}</option>
                <option value="Option2">{{ __('Option 2') }}</option>
                <option value="Option3">{{ __('Option 3') }}</option>
            </x-input.select>
            <x-input.error for="select" class="mt-2" />
        </div>

        {{-- Checkbox input --}}
        <div class="max-w-lg">
            <x-input.label for="checkbox" :value="__('Checkbox')" required />
            <div class="flex items-center mt-1">
                <x-input.checkbox id="checkbox" name="checkbox" wire:model="checkbox" required />
                <x-input.label for="checkbox" class="ml-2" :value="__('Accept')" />
            </div>
            <x-input.error for="checkbox" class="mt-2" />
        </div>

        {{-- Textarea input --}}
        <div class="max-w-lg">
            <x-input.label for="textarea" :value="__('Textarea')" required />
            <x-input.textarea id="textarea" class="block w-full mt-1" wire:model="textarea"
                placeholder="{{ __('Textarea') }}" required />
            <x-input.error for="textarea" class="mt-2" />
        </div>

        {{-- Filepond Single --}}
        {{-- <div class="max-w-lg">
            <x-input.filepond name="filepondSingle" :label="__('Filepond Single')" wire:model="filepondSingle" validate required
                accept="image/png, image/jpeg" size="4mb" />
            <x-input.error for="filepondSingle" class="mt-2" />
        </div> --}}

        {{-- Filepond Multiple --}}
        {{-- <div class="max-w-lg">
            <x-input.filepond name="filepondMultiple" :label="__('Filepond Multiple')" wire:model="filepondMultiple" multiple validate
                preview preview-max="200" accept="image/png, image/jpeg" size="4mb" number="4" />
            <x-input.error for="filepondMultiple" class="mt-2" />
        </div> --}}

        {{-- Rich text --}}
        <div>
            <x-input.label for="richtext" :value="__('Rich Text')" required />
            <x-input.richtext wire:model="richtext" required />
            <x-input.error for="richtext" class="mt-2" />
            <p>{{ __('* Attachment isn\'t working yet. Still WIP.') }}</p>
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-button.primary :title="__('Submit')" loading="submitFunction">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.primary>

        <x-button.muted :title="__('Cancel')" loading="cancelSubmitFunction" wire:click="cancelSubmitFunction" />
    </x-slot:actions>
</x-card.form>
