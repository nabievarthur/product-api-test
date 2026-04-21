<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder,array $filters)
    {
        $className = "\\App\\Filters\\" . class_basename($this) . "Filter";
        if (!class_exists($className)) {
            //Проверка на существование и дальнейшие действия если нет Класса \\ супер крутая логикa
            return $builder;
        }
        return (new $className)->apply($filters, $builder);
    }
}
