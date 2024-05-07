<x-card.form submit="applyLanguage" :title="__('Language')" :description="__('Manage which languages are used to personalize your experience.')">
    <x-slot:form>
        {{-- Language --}}
        <div>
            <x-input.label for="language" :value="__('Select Language')" required />
            <x-input.select wire:model="language" id="language" name="language" class="block w-full mt-1">
                @foreach ($supported_languages as $translation)
                    <option value="{{ $translation['code'] }}">
                        {{ $translation['name'][$current_language] ?? $translation['name'][config('app.fallback_locale')] }}
                    </option>
                @endforeach
            </x-input.select>
            <x-input.error for="language" class="mt-2" />
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-button.primary :title="__('Apply')" loading="applyLanguage">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.primary>
    </x-slot:actions>
</x-card.form>
