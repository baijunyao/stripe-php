<?php

namespace Stripe\Exception;

/**
 * ApiException is a generic exception that may be thrown in cases where none
 * of the other named errors cover the problem. It could also be raised in the
 * case that a new error has been introduced in the API, but this version of
 * the PHP SDK doesn't know how to handle it.
 *
 * @package Stripe\Exception
 */
class ApiException extends \Exception implements ExceptionInterface
{
    use ExceptionTrait;
}
