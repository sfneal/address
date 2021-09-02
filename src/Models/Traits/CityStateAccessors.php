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
    public function getCityStateAttribute()
    {
        return StringHelpers::implodeFiltered(', ', [$this->city, $this->state]);
    }

    /**
     * Retrieve the Subdivision's city state string.
     *
     * @return string
     */
    public function getCityStateZipAttribute()
    {
        return StringHelpers::implodeFiltered(' ', [$this->city_state, $this->zip]);
    }
}
