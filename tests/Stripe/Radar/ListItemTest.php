<?php

namespace Stripe\Radar;

class ListItemTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'rsli_123';

    public function testIsListItemable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/list_items'
        );
        $resources = ListItem::all([
            "list" => "rsl_123",
        ]);
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Radar\\ListItem", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/list_items/' . self::TEST_RESOURCE_ID
        );
        $resource = ListItem::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Radar\\ListItem", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/list_items'
        );
        $resource = ListItem::create([
            "list" => "rsl_123",
            "value" => "value",
        ]);
        $this->assertInstanceOf("Stripe\\Radar\\ListItem", $resource);
    }

    public function testIsDeletable()
    {
        $resource = ListItem::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/radar/list_items/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\Radar\\ListItem", $resource);
    }
}
