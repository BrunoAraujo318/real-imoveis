<?php

namespace RealImoveis\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Initialize an new transaction.
     */
    protected function beginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * Finish transaction with success.
     */
    protected function commit()
    {
        DB::commit();
    }

    /**
     * Undo transaction.
     */
    protected function rollBack()
    {
        DB::rollBack();
    }
}
