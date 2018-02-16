<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HelloWorld implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $hello;
    protected $world;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hello, $world) {
        $this->hello = $hello;
        $this->world = $world;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(\App\Repositories\SettingRepository $s) {
        var_dump($this->hello);
        var_dump($this->world);
    }

}
