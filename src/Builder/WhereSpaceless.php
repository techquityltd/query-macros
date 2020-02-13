<?php

namespace Techquity\QueryMacros\Builder;

/**
 * Add a basic where clause to the query that is lower-cased and without spaces.
 *
 * @param  \Closure|string|array  $column
 * @param  mixed  $operator
 * @param  mixed  $value
 * @param  string  $boolean
 *
 * @mixin \Illuminate\Database\Query\Builder
 *
 * @return \Illuminate\Database\Query\Builder
 *
 * @method \Illuminate\Database\Query\Builder whereSpaceless($column, $operator = null, $value = null, $boolean = 'and')
 */
class WhereSpaceless
{
    public function __invoke(): callable
    {
        return function ($column, $operator = null, $value = null, $boolean = 'and') {
            [$value, $operator] = $this->prepareValueAndOperator(
                $value, $operator, func_num_args() === 2
            );

            $value =  str_replace(' ', '', strtolower($value));

            $query = $this->newQuery()->where($column, $operator, $value, $boolean);

            $query->wheres[0]['type'] = 'BasicSpaceless';

            $this->addNestedWhereQuery($query, $boolean);

            return $this;
        };
    }
}
