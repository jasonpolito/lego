<?php

namespace App\Jobs;

use A17\Twill\Repositories\SettingRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompileAssets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hex = app(SettingRepository::class)->byKey('main_color_sdgagasdag');
        chdir(base_path());
        $theme = file_get_contents('./theme.js');
        $theme = preg_replace("/(primary:\s\S*?').*?(')/", "$1$hex$2", $theme);
        file_put_contents('./theme.js', $theme);
        exec('npm run prod', $result);
        dd($result);
    }
}
