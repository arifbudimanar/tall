<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filepond extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = 'file', // name="avatar"
        public bool|int $multiple = false, // multiple
        public bool|int $validate = true, // validate for allowFileTypeValidation
        public bool|int $preview = true, // preview for allowImagePreview
        public bool|int $required = false, // required
        public bool|int $disabled = false, // disabled
        public int $previewMax = 200, // preview-max="200" for imagePreviewMaxHeight
        public array|string $accept = ['image/png', 'image/jpeg', 'image/webp', 'image/avif'], // accept="image/png, image/jpeg" for accept
        public string $size = '2MB', // size="4mb" for maxFileSize
        public int $number = 10, // number="4" for maxFiles
        public string $label = '',
        public string $sizeHuman = '',
        public array|string $acceptHuman = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->multiple) {
            $this->multiple = 0;
        }

        if (! $this->validate) {
            $this->validate = 0;
        }

        if (! $this->preview) {
            $this->preview = 0;
        }

        if (! $this->required) {
            $this->required = 0;
        }

        if (! $this->disabled) {
            $this->disabled = 0;
        }

        if (is_string($this->accept)) {
            $this->accept = explode(',', $this->accept);
        }

        $this->accept = array_map('trim', $this->accept);
        $this->accept = array_filter($this->accept);
        $this->accept = array_unique($this->accept);
        $this->accept = array_values($this->accept);
        $this->accept = array_map('strtolower', $this->accept);
        $fileTypes = $this->accept;
        $this->accept = json_encode($this->accept);

        $this->sizeHuman = $this->size;

        foreach ($fileTypes as $type) {
            $new = explode('/', $type);

            if (array_key_exists(1, $new)) {
                $this->acceptHuman[] = ".{$new[1]}";
            }
        }

        $this->acceptHuman = implode(', ', $this->acceptHuman);

        return view('components.input.filepond');
    }
}
