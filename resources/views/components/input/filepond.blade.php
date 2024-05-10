<div class="relative" wire:ignore x-data="{
    model: @entangle($attributes->whereStartsWith('wire:model')->first()),
    isMultiple: {{ $multiple ? 'true' : 'false' }},
    current: undefined,
    currentList: [],

    async URLtoFile(path) {
        let url = `${window.appUrlStorage}/${path}`;
        let name = url.split('/').pop();
        const response = await fetch(url);
        const data = await response.blob();
        const metadata = {
            name: name,
            size: data.size,
            type: data.type
        };
        let file = new File([data], name, metadata);
        return {
            source: file,
            options: {
                type: 'local',
                metadata: {
                    name: name,
                    size: file.size,
                    type: file.type
                }
            }
        }
    }
}" x-cloak x-init="async () => {
    let picture = model
    let files = []
    let exists = []
    if (model) {
        if (isMultiple) {
            currentList = model.map((picture) => `${window.appUrlStorage}/${picture}`);
            await Promise.all(model.map(async (picture) => exists.push(await URLtoFile(picture))))
        } else {
            if (picture) {
                exists.push(await URLtoFile(picture))
            }
        }
    }
    files = exists
    let modelName = '{{ $attributes->whereStartsWith('wire:model')->first() }}'

    // const notify = () => {
    //     new Notification()
    //         .title('File uploaded')
    //         .body(`You can save changes!`)
    //         .success()
    //         .seconds(1.5)
    //         .send()
    // }

    const pond = FilePond.create($refs.{{ $attributes->get('ref') ?? 'input' }});
    pond.setOptions({
        allowMultiple: {{ $multiple ? 'true' : 'false' }},
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload(modelName, file, load, error, progress)
            },
            revert: (filename, file, load) => {
                @this.removeUpload(modelName, filename, load)
                @this.removeFile(modelName, filename.name)
            },
            remove: (filename, file, load) => {
                @this.removeFile(modelName, filename.name)
                load();
            },
        },
        allowImagePreview: {{ $preview ? 'true' : 'false' }},
        imagePreviewMaxHeight: {{ $previewMax ? $previewMax : '256' }},
        allowFileTypeValidation: {{ $validate ? 'true' : 'false' }},
        acceptedFileTypes: {{ $accept ? $accept : 'null' }},
        allowFileSizeValidation: {{ $validate ? 'true' : 'false' }},
        maxFileSize: {!! $size ? "'" . $size . "'" : 'null' !!},
        maxFiles: {{ $number ? $number : 'null' }},
        required: {{ $required ? 'true' : 'false' }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        onprocessfile: () => notify()
    });
    pond.addFiles(files)

    {{-- pond.on('addfile', (error, file) => {
        if (error) {
            console.log('Oh no');
            return;
        }
    }); --}}
}">
    <div class="flex items-center justify-between">
        @if ($label)
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300" for="{{ $name }}">
                {{ $label }}
                @if ($required)
                    <span class="text-red-500" title="Required">*</span>
                @endif
            </label>
        @endif
        <div class="text-xs text-gray-400">
            Size max: {{ $sizeHuman }}
        </div>
    </div>
    <div class="flex items-center justify-between text-xs text-gray-400">
        <div>
            Formats: {{ $acceptHuman }}
        </div>
        <div>
            {{ $multiple ? 'Multiple' : 'Single' }}
            @if ($multiple)
                <span>({{ $number }} files max)</span>
            @endif
        </div>
    </div>
    <div class="mt-2">
        <input type="file" x-ref="{{ $attributes->get('ref') ?? 'input' }}" />
    </div>
    {{-- @error('image')
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror --}}
</div>
