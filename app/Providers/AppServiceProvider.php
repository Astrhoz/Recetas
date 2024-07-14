<?php

namespace App\Providers;

use BezhanSalleh\PanelSwitch\PanelSwitch;
use Illuminate\Support\ServiceProvider;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            /** @var \App\Models\User */
            $user = auth()->user();
            $panelSwitch->simple();
            $panelSwitch
                ->visible(fn (): bool =>$user?->hasAnyRole([
                    'super_admin',
                ]));
        });

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Confirme su dirección de correo electrónico')
                ->line('Gracias por unirte a Recetero, tu comunidad de recetas de cocina. Para completar tu registro y empezar a disfrutar de nuestras deliciosas recetas, por favor verifica tu dirección de correo electrónico haciendo clic en el botón de abajo.')
                ->action('Confirmar correo', $url);        
        });
    }
}
