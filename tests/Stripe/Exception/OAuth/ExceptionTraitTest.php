<?php

namespace Stripe\Exception\OAuth;

class ExceptionTraitTest extends \Stripe\TestCase
{
    public function createFixture()
    {
        $mock = $this->getMockForTrait(ExceptionTrait::class);
        $instance = $mock::factory(
            'description',
            200,
            '{"error": "code", "error_description": "description"}',
            ['error' => 'code', 'error_description' => 'description'],
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],
            'code'
        );
        $instance->expects($this->any())
                 ->method('getMessage')
                 ->will($this->returnValue('description'));
        return $instance;
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        $this->assertSame(200, $e->getHttpStatus());
        $this->assertSame('{"error": "code", "error_description": "description"}', $e->getHttpBody());
        $this->assertSame(['error' => 'code', 'error_description' => 'description'], $e->getJsonBody());
        $this->assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        $this->assertSame('req_test', $e->getRequestId());
        $this->assertSame('code', $e->getStripeCode());
        $this->assertNotNull($e->getError());
        $this->assertSame('code', $e->getError()->error);
        $this->assertSame('description', $e->getError()->error_description);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        $this->assertContains("(Request req_test)", (string)$e);
    }
}
