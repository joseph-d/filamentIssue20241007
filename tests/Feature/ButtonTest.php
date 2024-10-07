<?php

use App\Livewire\Button;

use function \Pest\Livewire\livewire;

it('works properly', function () {
    livewire(Button::class)
        ->mountAction('first');
});




