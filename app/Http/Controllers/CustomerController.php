<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Mail\WelcomeNewCustomer;
use Illuminate\Support\Facades\Mail;
use Exception;

class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected CustomerService $customerService;

    /**
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @param CustomerRequest $request
     * @return RedirectResponse
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        try {

            $customer = $this->customerService->store($request);

            Mail::to($customer->email)->send(new WelcomeNewCustomer($customer));

            return redirect()->route('customers.index')->withSuccess('Customer Created Successfully.');
        } catch (Exception $ex) {

            Log::error($ex);
            return redirect()->back()->withError('Something went wrong please try again.');
        }
    }
}
