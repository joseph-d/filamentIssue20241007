<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Button extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;
 
    public function firstAction(): Action
    {
        return Action::make('first')
            ->action(function (array $arguments) {
                Log::info('first action');

                $balance = 0;

                if ($balance == 0) {
                    $this->replaceMountedAction('second', $arguments);
                }

                if ($balance > 0) {
                    $this->replaceMountedAction('third', $arguments);
                }
                
            });
    }

    public function secondAction(): Action
    {
        return Action::make('second')
            ->requiresConfirmation()
            ->label('You have zero balance')
            ->modalDescription('Do you want to top up your balance?')
            ->action(function (array $arguments) {
                Log::info('second action');
            });
    }

    public function thirdAction(): Action
    {
        return Action::make('third')
            ->requiresConfirmation()
            ->label('You have credit')
            ->modalDescription('Do you want to spend?')
            ->action(function (array $arguments) {
                Log::info('third action');
            });
    }
}