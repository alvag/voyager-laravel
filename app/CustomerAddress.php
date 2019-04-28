<?php

namespace App;

use App\Utils\QueryUtils;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class CustomerAddress extends Model
{
    /**
     * @return Builder
     */
    public function newQuery()
    {
        return QueryUtils::addWhereCustomer(parent::newQuery());
    }
}
