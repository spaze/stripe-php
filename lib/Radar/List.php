<?php

namespace Stripe\Radar;

/**
 * Class List
 *
 * @property string $id
 * @property string $object
 * @property string $alias
 * @property int $created
 * @property string $created_by
 * @property string $item_type
 * @property Collection $list_items
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $name
 * @property int $updated
 * @property string $updated_by
 *
 * @package Stripe\Radar
 */
class List extends \Stripe\ApiResource
{
    const OBJECT_NAME = "radar.list";

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
