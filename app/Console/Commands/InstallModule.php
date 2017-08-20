<?php

namespace App\Console\Commands;

use App\Module;
use Illuminate\Console\Command;

class InstallModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:install {slug} {--enable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs a module';

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
        $slug = $this->argument('slug');
        $module = module_from_slug($slug);

        if(is_null($module)){
            $this->error("Module {$slug} not found");
        }else{
            $enable = $this->option('enable') ? true : $this->confirm('Enable module?', false);
            Module::firstOrCreate(['slug' => $slug], ['enabled' => $enable]);
            $this->info("Module {$module->name} installed successfully!");
        }

        return true;
    }
}
