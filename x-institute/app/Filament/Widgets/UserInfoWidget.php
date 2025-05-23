<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserInfoWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        return [
            Stat::make('Account details', $user->name)
                ->icon('heroicon-o-user')
                ->description(
                    $user->role === 'Admin'
                        ? 'You are an Admin user.'
                        : 'You are a ' . $user->role . ' user.'
                )
                ->descriptionIcon('heroicon-o-information-circle'),
        ];
    }
}
