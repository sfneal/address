<?php

namespace Sfneal\Address\Models\Traits;

trait AddressAccessors
{
    /**
     * Retrieve the User's 'address1' attribute.
     *
     * @return mixed
     */
    public function getAddress1Attribute()
    {
        return $this->address->address_1 ?? null;
    }

    /**
     * Retrieve the User's 'address2' attribute.
     *
     * @return mixed
     */
    public function getAddress2Attribute()
    {
        return $this->address->address_2 ?? null;
    }

    /**
     * Retrieve the User's 'city' attribute.
     *
     * @return mixed
     */
    public function getCityAttribute()
    {
        return $this->address->city ?? null;
    }

    /**
     * Retrieve the User's 'state' attribute.
     *
     * @return mixed
     */
    public function getStateAttribute()
    {
        return $this->address->state ?? null;
    }

    /**
     * Retrieve the User's 'zip' attribute.
     *
     * @return mixed
     */
    public function getZipAttribute()
    {
        return $this->address->zip ?? null;
    }
}
