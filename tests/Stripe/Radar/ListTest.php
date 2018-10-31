<?php

namespace Stripe\Radar;

class ListTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'rsl_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/lists'
        );
        $resources = List::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Radar\\List", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/lists/' . self::TEST_RESOURCE_ID
        );
        $resource = List::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Radar\\List", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/lists'
        );
        $resource = List::create([
            "alias" => "alias",
            "name" => "name",
        ]);
        $this->assertInstanceOf("Stripe\\Radar\\List", $resource);
    }

    public function testIsSaveable()
    {
        $resource = List::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/radar/lists/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Radar\\List", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/lists/' . self::TEST_RESOURCE_ID
        );
        $resource = List::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\Radar\\List", $resource);
    }

    public function testIsDeletable()
    {
        $resource = List::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/radar/lists/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\Radar\\List", $resource);
    }
}
