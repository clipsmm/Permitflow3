<?php

namespace App\Models;

use Dust\Dust;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Output extends Model
{
    /**
     * @var string
     */
    protected $table = 'outputs';

    /**
     * @var array
     */
    protected $fillable = [ 'module_slug','code', 'template', 'name', 'status'];

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }

    public function application_outputs()
    {
        return $this->hasMany(ApplicationOutput::class, 'code','code');
    }

    /**
     * @param $module_slug
     * @param $name
     * @param $template
     * @param string $status
     * @return Output
     */
    public static function create_output($module_slug, $name, $code, $template, $status  =  'active')
    {
        $output  = new self;
        $output->fill([
            'module_slug'  => $module_slug,
            'name' => $name,
            'code' => $code,
            'template' => $template,
            'status' => $status
        ])->save();

        return $output;
    }

    /**
     * @param $query
     * @param $module
     * @return mixed
     */
    public function scopeModule($query, $module)
    {
        return $query->whereModuleSlug($module);
    }

    /**
     * @param Output $output
     * @param array $data
     * @return string
     */
    public static function render_output(self $output, array $data)
    {
        $dust =  new Dust();
        $template  = $dust->compile($output->template);
        $compiled  =  $dust->renderTemplate($template, $data);

        return $compiled;
    }
}
