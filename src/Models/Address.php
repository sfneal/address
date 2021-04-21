<?php

namespace Sfneal\Address\Models;

use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Sfneal\Address\Builders\AddressBuilder;
use Sfneal\Helpers\Arrays\ArrayHelpers;
use Sfneal\Helpers\Strings\StringHelpers;
use Sfneal\Models\Model;
use Sfneal\Models\Traits\CityStateAccessors;

class Address extends Model
{
    use CityStateAccessors;
    use HasFactory;

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
     * Model Factory.
     *
     * @return AddressFactory
     */
    protected static function newFactory(): AddressFactory
    {
        return new AddressFactory();
    }

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
     *
     * @return MorphTo
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Retrieve an html block to display an address.
     *
     * @param bool $withType include the address type
     * @return string
     */
    public function show(bool $withType = true): string
    {
        $string = '';
        if ($withType && $this->type) {
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
     * Retrieve the 'address_full' attribute.
     *
     *  - returns a full address string that includes address, city, state & zip
     *
     * @return string
     */
    public function getAddressFullAttribute(): string
    {
        // Include the second line address if set
        $address = "{$this->address_1}, ".(isset($this->address_2) ? "{$this->address_2}, " : '');

        return $address."{$this->city}, {$this->state} {$this->zip}";
    }

    /**
     * Set the 'address_1' attribute.
     *
     * @param $value
     * @return void
     */
    public function setAddress1Attribute($value): void
    {
        $this->attributes['address_1'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }

    /**
     * Set the 'address_2' attribute.
     *
     * @param $value
     * @return void
     */
    public function setAddress2Attribute($value): void
    {
        $this->attributes['address_2'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }

    /**
     * Parse city attribute into city and state values.
     *
     * @param $value
     * @return void
     */
    public function setCityAttribute($value): void
    {
        if (isset($value) && (new StringHelpers($value))->inString(',')) {
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
     * @return void
     */
    public function setStateAttribute($value): void
    {
        // Check to see if a zip value was accidentally given
        if ((new ArrayHelpers(
            collect(str_split($value))
                ->take(2)
                ->map(function ($char) {
                    return is_int($char);
                })
                ->toArray()
        ))->arrayValuesEqual(true)) {
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
     * @return void
     */
    public function setZipAttribute($value): void
    {
        $this->attributes['zip'] = (strlen(trim($value)) > 0) ? trim($value) : null;
    }
}
