<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    public function store(Request $request): Customer
    {
        return $this->save(new Customer, $request);
    }

    public function update(Customer $customer, Request $request): Customer
    {
        return $this->save($customer, $request);
    }

    protected function save(Customer $customer, Request $request): Customer
    {
        $customer->fill([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $customer->save();

        return $customer;
    }

    public function delete(Customer $customer): void
    {
        $customer->delete();
    }
}
