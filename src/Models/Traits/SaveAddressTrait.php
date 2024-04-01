<?php

namespace Sfneal\Address\Models\Traits;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Sfneal\Address\Models\Address;

trait SaveAddressTrait
{
    // todo: add use in actions

    /**
     * Create a new Address related to the Model.
     *
     * @param  string  $key  Request key
     * @return EloquentModel|false
     */
    private function createAddress(string $key = 'address')
    {
        return $this->model->address()->save(new Address($this->request->input($key)));
    }

    /**
     * Update an existing Address relationship.
     *
     * @param  string  $key
     * @return mixed
     */
    private function updateAddress(string $key = 'address')
    {
        return $this->model->address->update($this->request->input($key));
    }

    /**
     * Create or update an Address model depending on if the relationship already exists.
     *
     * @param  string  $key
     * @return bool|false|EloquentModel|mixed
     */
    private function createOrUpdateAddress(string $key = 'address')
    {
        // Confirm address data has passed to the request
        if ($this->request->has("{$key}.city") && $this->request->input("{$key}.city")) {
            // Update Address if it exists
            if ($this->model->address) {
                return $this->updateAddress($key);
            }

            // Create the Address if it doesn't exist
            else {
                return $this->createAddress($key);
            }
        }

        return false;
    }
}
