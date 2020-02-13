<?php

namespace Techquity\QueryMacros\Builder;

/**
 * Add a basic where clause to the query that is lower-cased.
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
 * @method \Illuminate\Database\Query\Builder whereLower($column, $operator = null, $value = null, $boolean = 'and')
 */
class WhereLower
{
    public function __invoke(): callable
    {
        return function ($column, $operator = null, $value = null, $boolean = 'and') {
            [$value, $operator] = $this->prepareValueAndOperator(
                $value, $operator, func_num_args() === 2
            );

            $value = strtolower($value);

            $query = $this->newQuery()->where($column, $operator, $value, $boolean);

            $query->wheres[0]['type'] = 'BasicLower';

            $this->addNestedWhereQuery($query, $boolean);

            return $this;
        };
    }
}
