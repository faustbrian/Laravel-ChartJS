<?php

/*
 * This file is part of Laravel ChartJS.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel ChartJS.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ChartJS;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class ChartJSServiceProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishViews();

        $this->loadViews();
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();

        $this->app->singleton('chartjs', function ($app) {
            return new Builder();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return array_merge(parent::provides(), ['chartjs']);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'chartjs';
    }
}
