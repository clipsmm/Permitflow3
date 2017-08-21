<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['slug', 'enabled', 'settings' , 'prefix'];


    /**
     *gets updated counter for creating application numbers
     */
    public function getUpdatedCounter()
    {
        $this->counter = $this->counter + 1;
        $this->save();
        return $this->counter;
    }

    /**
     * returns an instance of the installed module
     * @return null
     */
    public function getModuleAttribute()
    {
        return module_from_slug($this->slug);
    }
}
