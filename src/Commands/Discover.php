<?php

namespace Tonning\Bladebook\Commands;

use Illuminate\Console\Command;
use Tonning\Bladebook\BladebookComponentsFinder;

class Discover extends Command
{
    protected $signature = 'bladebook:discover';

    protected $description = 'Discover Bladebook componement';

    public function handle()
    {
        app(BladebookComponentsFinder::class)->build();

        $this->info('Bladebook auto-discovery manifest rebuilt');
    }
}
