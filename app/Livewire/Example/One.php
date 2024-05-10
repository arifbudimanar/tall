<?php

namespace App\Livewire\Example;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class One extends Component
{
    use WithFileUploads;

    public string $text = '';

    public ?int $number = null;

    public string $email = '';

    public string $password = '';

    public string $date = '';

    public string $select = '';

    public ?bool $checkbox = null;

    public string $textarea = '';

    public ?string $richtext = '';

    // public string $filepondSingle = '';

    // public array $filepondMultiple = [];

    public function someFunction(): void
    {
        sleep(1);
    }

    public function submitFunction(): void
    {
        $this->validate([
            'text' => 'required|min:5',
            'number' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'date' => 'required|date',
            'select' => 'required|in:Option1,Option2,Option3',
            'checkbox' => 'required|accepted',
            'textarea' => 'required|min:5',
            'richtext' => 'required|min:10',
            // 'filepondSingle' => 'required',
            // 'filepondMultiple' => 'required',
        ]);
        Toaster::success('Submited!');
        Toaster::info('Text: '.$this->text.'');
        Toaster::info('Number: '.$this->number.'');
        Toaster::info('Email: '.$this->email.'');
        Toaster::info('Password: '.$this->password.'');
        Toaster::info('Date: '.$this->date.'');
        Toaster::info('Select: '.$this->select.'');
        Toaster::info('Checkbox: '.$this->checkbox.'');
        Toaster::info('Textarea: '.$this->textarea.'');
        Toaster::info('Richtext: '.$this->richtext.'');
        // Toaster::info('Filepond Single: '.$this->filepondSingle.'');
        // Toaster::info('Filepond Multiple: '.json_encode($this->filepondMultiple).'');
        $this->reset([
            'text',
            'number',
            'email',
            'password',
            'date',
            'select',
            'checkbox',
            'textarea',
            'richtext',
            // 'filepondSingle',
            // 'filepondMultiple',
        ]);
    }

    public function cancelSubmitFunction(): void
    {
        if (
            $this->text !== ''
            || $this->number !== null
            || $this->email !== ''
            || $this->password !== ''
            || $this->date !== ''
            || $this->select !== ''
            || $this->checkbox !== null
            || $this->textarea !== ''
            || $this->richtext !== ''
        ) {
            Toaster::info('Canceled.');
            $this->reset([
                'text', 'email', 'password', 'date', 'select', 'checkbox', 'textarea', 'richtext',
            ]);
            $this->resetErrorBag();
        } else {
            Toaster::info('Nothing changed.');
            $this->resetErrorBag();
        }
    }

    public bool $confirming_open_modal_form = false;

    public bool $confirming_open_modal_action = false;

    public function confirmModalForm(): void
    {
        $this->validateOnly(
            'text',
            ['text' => 'required|min:5'],
        );
        Toaster::success('Confirmed.');
        Toaster::info('Text: '.$this->text.'');
        $this->confirming_open_modal_form = false;
    }

    public function updatedConfirmingOpenModalForm(): void
    {
        $this->reset('text');
        $this->resetErrorBag('text');
    }

    public function confirmModalAction(): void
    {
        Toaster::success('Confirmed.');
        $this->confirming_open_modal_action = false;
    }

    public function dropdownButtonTopLeft(): void
    {
        Toaster::info('Top Left!');
    }

    public function dropdownButtonTopRight(): void
    {
        Toaster::info('Top Right!');
    }

    public function dropdownButtonBottomLeft(): void
    {
        Toaster::info('Bottom Left!');
    }

    public function dropdownButtonBottomRight(): void
    {
        Toaster::info('Bottom Right!');
    }

    public function toasterSuccess(): void
    {
        Toaster::success('Success!');
    }

    public function toasterWarning(): void
    {
        Toaster::warning('Warning!');
    }

    public function toasterError(): void
    {
        Toaster::error('Error!');
    }

    public function toasterInfo(): void
    {
        Toaster::info('Info!');
    }

    #[Layout('layouts.main')]
    #[Title('Example One')]
    public function render()
    {
        return view('livewire.example.one');
    }
}
