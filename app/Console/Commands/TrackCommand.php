<?php

namespace App\Console\Commands;

use App\Http\Controllers\TrackController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;


class TrackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track {provider} {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track container number';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(TrackController $track_controller, Request $request)
    {

        $request->post();
        $track_controller->track()
        return 0;
    }
}
