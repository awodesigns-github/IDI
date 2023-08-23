<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;

    public bool $status;

    protected  $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->status = (bool) $this->model->getAttribute($this->field);
    }
    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }
}
