<?php

namespace App;

use App\Product;
use App\Scopes\AvailableScopes;

class PanelProduct extends Product
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
//        static::addGlobalScope(new AvailableScopes);
    }
}
