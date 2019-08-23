<?php

namespace Stripe\Exception;

/**
 * InvalidRequestException is thrown when a request is initiated with invalid
 * parameters.
 *
 * @package Stripe\Exception
 */
class InvalidRequestException extends \Exception implements ExceptionInterface
{
    use ExceptionTrait {
        factory as protected traitFactory;
    }

    protected $stripeParam;

    /**
     * Exception factory.
     *
     * @param string $message
     * @param int|null $httpStatus
     * @param string|null $httpBody
     * @param array|null $jsonBody
     * @param array|\Stripe\Util\CaseInsensitiveArray|null $httpHeaders
     * @param string|null $stripeCode
     * @param string|null $stripeParam
     * @return ExceptionTrait
     */
    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null,
        $stripeParam = null
    ) {
        $instance = static::traitFactory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setStripeParam($stripeParam);

        return $instance;
    }

    /**
     * Gets the parameter related to the error.
     *
     * @return string|null
     */
    public function getStripeParam()
    {
        return $this->stripeParam;
    }

    /**
     * Sets the parameter related to the error.
     *
     * @param string|null $stripeParam
     */
    public function setStripeParam($stripeParam)
    {
        $this->stripeParam = $stripeParam;
    }
}
