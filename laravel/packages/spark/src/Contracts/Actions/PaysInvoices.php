<?php

namespace Spark\Contracts\Actions;

use Laravel\Cashier\Invoice;

interface PaysInvoices
{
    /**
     * Pay the given invoice.
     *
     * @param  \Spark\Billable  $billable
     * @param  \Laravel\Cashier\Invoice  $invoice
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Laravel\Cashier\Exceptions\IncompletePayment
     */
    public function pay($billable, Invoice $invoice);
}
