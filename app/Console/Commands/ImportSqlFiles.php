<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportSqlFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sqlfile {sqlfile}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import SQL files from the android';

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
     * @return mixed
     */
    public function handle()
    {
        \DB::unprepared(file_get_contents($this->argument('sqlfile')));
        // $this->info
        // echo file_get_contents($this->argument('sqlfile'));
    }
}
