<?php declare(strict_types=1);

namespace PosLifestyle\CollapsibleSidebar;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class ToolServiceProvider extends ServiceProvider
{
    protected const JS_FILE = __DIR__ . '/../dist/js/collapsible-sidebar.js';
    protected const CSS_FILE = __DIR__ . '/../dist/css/collapsible-sidebar.css';

    public function boot(): void
    {
        Nova::serving(static function () {
            Nova::script('collapsible-sidebar', self::JS_FILE);
            Nova::style('collapsible-sidebar', self::CSS_FILE);
        });
    }
}
