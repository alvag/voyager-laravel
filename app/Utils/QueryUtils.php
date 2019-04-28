<?php


namespace App\Utils;

use App\User;
use Illuminate\Database\Eloquent\Builder;


class QueryUtils
{

    /**
     * @param Builder $query
     * @return Builder
     */
    public static function addWhereCustomer(Builder $query) {
        if (auth()->check()) {
            if (auth()->user()->role_id === User::CUSTOMER) {
                if (auth()->user()->customer) {
                    return $query->where('customer_id', auth()->user()->customer->id);
                }
                return $query->where('id', -1);
            }
        }
        return $query;
    }

}
