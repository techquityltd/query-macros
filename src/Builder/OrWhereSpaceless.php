<?php

namespace Techquity\QueryMacros\Builder;

/**
 * Add an "or where" clause to the query that is lower-cased and without spaces.
 *
 * @param  \Closure|string|array  $column
 * @param  mixed  $operator
 * @param  mixed  $value
 *
 * @mixin \Illuminate\Database\Query\Builder
 * @mixin \Techquity\QueryMacros\Builder\WhereSpaceless
 *
 * @return \Illuminate\Database\Query\Builder
 *
 * @method \Illuminate\Database\Query\Builder orWhereSpaceless($column, $operator = null, $value = null)
 */
class OrWhereSpaceless
{
    public function __invoke(): callable
    {
        return function ($column, $operator = null, $value = null) {
            [$value, $operator] = $this->prepareValueAndOperator(
                $value, $operator, func_num_args() === 2
            );

            return $this->whereSpaceless($column, $operator, $value, 'or');
        };
    }
}
