<?php

namespace App\Console\Commands;


use App\Models\Module;
use App\Models\Permission;
use App\Modules\BaseModule;
use Illuminate\Console\Command;

class InstallModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:install {slug}';

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
        $module = BaseModule::instance_from_slug($slug);

        if(is_null($module)){
            $this->error("Module {$slug} not found");
        }else{

            //Insert module permissions
            $permissions = [];
            foreach($module->get_permissions() as $p){
                $permissions[] = Permission::firstOrCreate(['name' => $p['name'], 'guard_name' => $p['guard'], 'owner' => $module->slug]);
            }

            $count = count($permissions);
            $this->info("{$count} permissions inserted");
            $this->info("Module {$module->name} installed successfully!");
        }

        return true;
    }
}
