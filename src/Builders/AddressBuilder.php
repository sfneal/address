<?php

namespace Sfneal\Address\Builders;

use Sfneal\Builders\QueryBuilder;

class AddressBuilder extends QueryBuilder
{
    // todo: add tests
    /**
     * Scope query results to Address's associated with a particular model.
     *
     * @param string $addressableType
     * @param string $operator
     * @param string $boolean
     *
     * @return $this
     */
    public function whereType(string $addressableType, string $operator = '=', string $boolean = 'and'): self
    {
        $this->where('addressable_type', $operator, $addressableType, $boolean);

        return $this;
    }

    /**
     * Use a 'wildcard' like search to several attributes for a match.
     *
     * @param string $search
     *
     * @return $this
     */
    public function whereAddressLike(string $search): self
    {
        $this->where(function (self $builder) use ($search) {
            $builder->whereLike('address_1', $search);
            $builder->orWhereLike('address_2', $search);
            $builder->orWhereLike('city', $search);
            $builder->orWhereLike('state', $search);
            $builder->orWhereLike('zip', $search);
        });

        return $this;
    }
}
