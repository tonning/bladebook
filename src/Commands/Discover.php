<?php

namespace Tonning\Bladebook\Commands;

use Tonning\Bladebook\BladebookComponentsFinder;
use Illuminate\Console\Command;

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
