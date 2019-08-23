<?php

namespace Stripe\Exception;

/**
 * SignatureVerificationException is thrown when the signature verification for
 * a webhook fails.
 *
 * @package Stripe\Exception
 */
class SignatureVerificationException extends \Exception implements ExceptionInterface
{
    use ExceptionTrait {
        factory as protected traitFactory;
    }

    protected $sigHeader;

    /**
     * Exception factory.
     *
     * @param string $message
     * @param string|null $sigHeader
     * @param string|null $httpBody
     * @return SignatureVerificationException
     */
    public static function factory(
        $message,
        $sigHeader = null,
        $httpBody = null
    ) {
        $instance = static::traitFactory($message, null, $httpBody);
        $instance->setSigHeader($sigHeader);

        return $instance;
    }

    /**
     * Gets the `Stripe-Signature` HTTP header.
     *
     * @return string|null
     */
    public function getSigHeader()
    {
        return $this->sigHeader;
    }

    /**
     * Sets the `Stripe-Signature` HTTP header.
     *
     * @param string|null $sigHeader
     */
    public function setSigHeader($sigHeader)
    {
        $this->sigHeader = $sigHeader;
    }
}
