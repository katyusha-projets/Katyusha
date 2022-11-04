<?php

namespace Katyusha\Drivers\Payment\Drivers\Vipps\Model\Payment;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;

trait PaymentSerializationTrait {
    public static function getSerializer() {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
    }
}
