<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use TomatoPHP\FilamentLanguageSwitcher\FilamentLanguageSwitcherPlugin;
use TomatoPHP\FilamentSaasPanel\FilamentSaasPanelPlugin;
use TomatoPHP\FilamentSimpleTheme\FilamentSimpleThemePlugin;

class UsersPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel
            ->id('users')
            ->path('users')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Users/Resources'), for: 'App\\Filament\\Users\\Resources')
            ->discoverPages(in: app_path('Filament/Users/Pages'), for: 'App\\Filament\\Users\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Users/Widgets'), for: 'App\\Filament\\Users\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ]);

        $panel->plugin(
            FilamentSaasPanelPlugin::make()
                ->registration()
                ->editTeam()
                ->editProfile()
                ->allowTenants()
                ->deleteTeam()
                ->teamInvitation()
                ->showTeamMembers()
                ->browserSessionManager()
                ->checkAccountStatusInLogin()
                ->APITokenManager()
                ->deleteAccount()
        );

        $panel->plugin(FilamentSimpleThemePlugin::make());

        $panel->plugin(
            FilamentLanguageSwitcherPlugin::make()
        );

        $panel->middleware([
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ])
            ->authMiddleware([
                Authenticate::class,
            ]);

        return $panel;
    }
}
