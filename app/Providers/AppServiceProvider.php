<?php

namespace App\Providers;

use BezhanSalleh\PanelSwitch\PanelSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            /** @var \App\Models\User */
            $user = auth()->user();
            $panelSwitch->simple();
            $panelSwitch
                ->visible(fn (): bool =>$user?->hasAnyRole([
                    'super_admin',
                ]));
        });
    }
}
