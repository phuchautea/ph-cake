<?php

namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class CustomerService
{
    public function add($customer)
    {
        try {
            $newCustomer = Customer::create([
                'name' => $customer['name'],
                'phoneNumber' => $customer['phoneNumber'],
                'address' => $customer['address'],
            ]);
            return $newCustomer->id;
        } catch (\Exception $ex) {
            return 0;
        }
    }
}