<?php

namespace Stripe\Exception\OAuth;

/**
 * UnsupportedGrantTypeException is thrown when an unuspported grant type
 * parameter is specified.
 *
 * @package Stripe\Exception\OAuth
 */
class UnsupportedGrantTypeException extends \Exception implements ExceptionInterface
{
    use ExceptionTrait;
}
