<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Total registered accounts')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Pending Approval', User::where('status', 'pending')->count())
                ->description('Users waiting for admin approval')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Approved Users', User::where('status', 'approved')->count())
                ->description('Active and verified users')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
