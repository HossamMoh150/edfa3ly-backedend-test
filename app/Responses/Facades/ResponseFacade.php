<?php


namespace App\Responses\Facades;


use App\Responses\CrudResponse;
use Illuminate\Support\Facades\Facade;

class ResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CrudResponse::class ;
    }
}
