<?php

namespace Sfneal\Address\Models\Traits;

use Sfneal\Helpers\Strings\StringHelpers;

trait CityStateAccessors
{
    /**
     * Retrieve the Subdivision's city state string.
     *
     * @return string
     */
    public function getCityStateAttribute(): string
    {
        return StringHelpers::implodeFiltered(', ', [$this->attributes['city'], $this->attributes['state']]);
    }

    /**
     * Retrieve the Subdivision's city state string.
     *
     * @return string
     */
    public function getCityStateZipAttribute(): string
    {
        return StringHelpers::implodeFiltered(' ', [$this->getCityStateAttribute(), $this->attributes['zip']]);
    }
}
