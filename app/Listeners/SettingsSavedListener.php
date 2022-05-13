<?php

namespace App\Listeners;

use App\Jobs\CompileAssets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use A17\Twill\Repositories\SettingRepository;

class SettingsSavedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $hex = app(SettingRepository::class)->byKey('main_color_sdgagasdag');
        // chdir(base_path());
        // $theme = file_get_contents('./theme.js');
        // $theme = preg_replace("/(primary:\s\S*?').*?(')/", "$1$hex$2", $theme);
        // file_put_contents('./theme.js', $theme);
        echo '<pre>';
        echo shell_exec('ls -a 2>&1');
        echo shell_exec('node --version');
        echo shell_exec('npm --version 2>&1');
        echo shell_exec('npm run prod 2>&1');
        dd();
        // CompileAssets::dispatch();
    }
}
