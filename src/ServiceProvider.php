<?php

namespace Techquity\QueryMacros;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Techquity\QueryMacros\Builder\OrWhereLower;
use Techquity\QueryMacros\Builder\OrWhereSpaceless;
use Techquity\QueryMacros\Builder\WhereLower;
use Techquity\QueryMacros\Builder\WhereSpaceless;
use Techquity\QueryMacros\Grammar\WhereBasicLower;
use Techquity\QueryMacros\Grammar\WhereBasicSpaceless;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        Grammar::macro('whereBasicLower', (new WhereBasicLower)());
        Grammar::macro('whereBasicSpaceless', (new WhereBasicSpaceless)());
        Builder::macro('whereLower', (new WhereLower)());
        Builder::macro('orWhereLower', (new OrWhereLower)());
        Builder::macro('whereSpaceless', (new WhereSpaceless)());
        Builder::macro('orWhereSpaceless', (new OrWhereSpaceless)());
    }
}
