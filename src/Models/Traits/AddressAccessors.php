<?php

namespace Sfneal\Address\Models\Traits;

trait AddressAccessors
{
    /**
     * Get the 'city_state' attribute.
     *
     * @return null|string
     */
    public function getCityStateAttribute(): ?string
    {
        return $this->address->city_state ?? null;
    }

    /**
     * Retrieve the User's 'address1' attribute.
     *
     * @return null|string
     */
    public function getAddress1Attribute(): ?string
    {
        return $this->address->address_1 ?? null;
    }

    /**
     * Retrieve the User's 'address2' attribute.
     *
     * @return null|string
     */
    public function getAddress2Attribute(): ?string
    {
        return $this->address->address_2 ?? null;
    }

    /**
     * Retrieve the User's 'city' attribute.
     *
     * @return null|string
     */
    public function getCityAttribute(): ?string
    {
        return $this->address->city ?? null;
    }

    /**
     * Retrieve the User's 'state' attribute.
     *
     * @return null|string
     */
    public function getStateAttribute(): ?string
    {
        return $this->address->state ?? null;
    }

    /**
     * Retrieve the User's 'zip' attribute.
     *
     * @return null|string
     */
    public function getZipAttribute(): ?string
    {
        return $this->address->zip ?? null;
    }
}
