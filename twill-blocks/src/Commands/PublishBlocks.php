<?php

namespace Placement\TwillBlocks\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishBlocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pl-twill-blocks:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Placement Twill block editor blocks';

    public $composer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // Copy admin blocks (editors)
        File::copyDirectory(base_path("twill-blocks/admin"), resource_path("views/admin"));
        $this->info("Copied <fg=yellow>admin</> blocks");
        File::copyDirectory(base_path("twill-blocks/site/blocks"), resource_path("views/site/blocks"));
        $this->info("Copied <fg=yellow>site</> blocks");

        return Command::SUCCESS;
    }
}
