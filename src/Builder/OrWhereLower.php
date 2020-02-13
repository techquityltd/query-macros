<?php

namespace Techquity\QueryMacros\Builder;

/**
 * Add an "or where" clause to the query that is lower-cased.
 *
 * @param  \Closure|string|array  $column
 * @param  mixed  $operator
 * @param  mixed  $value
 *
 * @mixin \Illuminate\Database\Query\Builder
 * @mixin \Techquity\QueryMacros\Builder\WhereLower
 *
 * @return \Illuminate\Database\Query\Builder
 *
 * @method \Illuminate\Database\Query\Builder orWhereLower($column, $operator = null, $value = null)
 */
class OrWhereLower
{
    public function __invoke(): callable
    {
        return function ($column, $operator = null, $value = null) {
            [$value, $operator] = $this->prepareValueAndOperator(
                $value, $operator, func_num_args() === 2
            );

            return $this->whereLower($column, $operator, $value, 'or');
        };
    }
}
