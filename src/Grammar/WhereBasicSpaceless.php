<?php

namespace Techquity\QueryMacros\Grammar;

use Illuminate\Database\Query\Builder;

/**
 * Compile a basic where clause but without spaces.
 *
 * @param \Illuminate\Database\Query\Builder $query
 * @param array $where
 *
 * @mixin \Illuminate\Database\Query\Grammars\Grammar
 *
 * @return string
 */
class WhereBasicSpaceless
{
    public function __invoke(): callable
    {
        return function (Builder $query, array $where) {
            $value = $this->parameter($where['value']);

            return "replace(lower({$this->wrap($where['column'])}), ' ', '') {$where['operator']} {$value}";
        };
    }
}
