<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class AbstractFilter
{
    protected array $filters = [];

    public function apply(array $reqFilters, Builder $builder): Builder
    {
        foreach ($this->filters as $filter) {
            if (isset($reqFilters[$filter])){
                $methodName = Str::camel($filter);
                $this->$methodName($builder, $reqFilters[$filter]);
            }
        }
        return $builder;
    }
}
