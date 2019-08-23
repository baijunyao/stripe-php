<?php

namespace Stripe\Exception\OAuth;

trait ExceptionTrait
{
    use \Stripe\Exception\ExceptionTrait;

    protected function constructErrorObject()
    {
        if (is_null($this->jsonBody)) {
            return null;
        }

        return \Stripe\OAuthErrorObject::constructFrom($this->jsonBody);
    }
}
