<?php

declare(strict_types=1);

namespace Codeat3\BladeVaadinIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeVaadinIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('vaadin-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'vaadin',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-vaadin'),
            ], 'blade-vaadin');
        }
    }
}
