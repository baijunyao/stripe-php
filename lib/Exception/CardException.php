<?php

namespace Stripe\Exception;

/**
 * CardException is thrown when a user enters a card that can't be charged for
 * some reason.
 *
 * @package Stripe\Exception
 */
class CardException extends \Exception implements ExceptionInterface
{
    use ExceptionTrait {
        factory as protected traitFactory;
    }

    protected $declineCode;
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
     * @param string|null $declineCode
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
        $declineCode = null,
        $stripeParam = null
    ) {
        $instance = static::traitFactory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setDeclineCode($declineCode);
        $instance->setStripeParam($stripeParam);

        return $instance;
    }

    /**
     * Gets the decline code.
     *
     * @return string|null
     */
    public function getDeclineCode()
    {
        return $this->declineCode;
    }

    /**
     * Sets the decline code.
     *
     * @param string|null $declineCode
     */
    public function setDeclineCode($declineCode)
    {
        $this->declineCode = $declineCode;
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
