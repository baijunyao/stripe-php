<?php

namespace Stripe\Exception;

class SignatureVerificationExceptionTest extends \Stripe\TestCase
{
    public function testGetters()
    {
        $e = SignatureVerificationException::factory('message', 'sig_header');
        $this->assertSame('sig_header', $e->getSigHeader());
    }
}
