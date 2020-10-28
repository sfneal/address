<?php

namespace Sfneal\Address\Models;

use Illuminate\Database\Eloquent\Builder;
use Sfneal\Address\Builders\AddressBuilder;
use Sfneal\Models\AbstractModel;
use Sfneal\Models\Traits\CityStateAccessors;

class Address extends AbstractModel
{
    use CityStateAccessors;

    protected $table = 'address';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'address_id',
        'type',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'addressable_id',
        'addressable_type',
    ];

    /**
     * Query Builder.
     *
     * @param $query
     *
     * @return AddressBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new AddressBuilder($query);
    }

    /**
     * @return AddressBuilder|Builder
     */
    public static function query(): AddressBuilder
    {
        return parent::query();
    }

    /**
     * Get the owning addressable model.
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve an html block to display an address.
     *
     * @return string
     */
    public function show()
    {
        $string = '';
        if ($this->type) {
            $string .= '<small><b>'.ucfirst($this->type).' Address:</b></small><br>';
        }
        if ($this->address_1) {
            $string .= "{$this->address_1}<br>";
        }
        if ($this->address_2) {
            $string .= "{$this->address_2}<br>";
        }
        if ($this->city) {
            $string .= "{$this->city_state_zip}<br>";
        }

        return $string;
    }

    /**
     * Set the 'address_1' attribute.
     *
     * @param $value
     */
    public function setAddress1Attribute($value)
    {
        $this->attributes['address_1'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }

    /**
     * Set the 'address_2' attribute.
     *
     * @param $value
     */
    public function setAddress2Attribute($value)
    {
        $this->attributes['address_2'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }

    /**
     * Parse city attribute into city and state values.
     *
     * @param $value
     */
    public function setCityAttribute($value)
    {
        if (isset($value) && inString($value, ',')) {
            [$city, $state] = explode(',', $value);
            $this->attributes['city'] = ucfirst(trim($city));
            $this->setStateAttribute($state);
        } else {
            $this->attributes['city'] = ucfirst(trim($value));
        }
    }

    /**
     * Set the 'state' attribute value.
     *
     * @param $value
     */
    public function setStateAttribute($value)
    {
        // Check to see if a zip value was accidentally given
        if (arrayValuesEqual(
            collect(str_split($value))
            ->take(2)
            ->map(function ($char) {
                return is_int($char);
            })
            ->toArray(),
            true
        )) {
            $attribute = 'zip';
        } else {
            $attribute = 'state';
        }

        // Only allow 2 chars, cast to uppercase, trim whitespace
        $this->attributes[$attribute] = (strlen(trim($value)) > 0) ? strtoupper(trim($value)) : null;
    }

    /**
     * Set the 'zip' attribute.
     *
     * @param $value
     */
    public function setZipAttribute($value)
    {
        $this->attributes['zip'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }
}
