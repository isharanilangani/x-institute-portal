<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\UserInfoWidget;

class Dashboard extends BaseDashboard
{
    protected static string $view = 'filament-panels::pages.dashboard';

    public function getWidgets(): array
    {
        return [
            UserInfoWidget::class,
        ];
    }

}
