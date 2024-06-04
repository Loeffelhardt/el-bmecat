<?php

namespace Naugrim\BMEcat\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\DeliveryTimes;
use Naugrim\BMEcat\Nodes\Product\Logistic\CustomsTariffNumber;
use Naugrim\BMEcat\Nodes\Product\Logistic\Dimensions;

/**
 * @implements NodeInterface<self>
 */
#[Serializer\XmlRoot('PRODUCT_LOGISTIC_DETAILS')]
class LogisticDetails implements Contracts\NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    /**
     * @var CustomsTariffNumber[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\BMEcat\Nodes\Product\Logistic\CustomsTariffNumber>')]
    #[Serializer\XmlList(entry: 'CUSTOMS_TARIFF_NUMBER', inline: true)]
    protected array $customsTariffNumbers = [];

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('STATISTICS_FACTOR')]
    #[Serializer\XmlElement(cdata: false)]
    protected ?float $statisticsFactor = null;

    /**
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(entry: 'COUNTRY_OF_ORIGIN', inline: true)]
    protected array $countryOfOrigin = [];

    #[Serializer\Expose]
    #[Serializer\SerializedName('PRODUCT_DIMENSIONS')]
    #[Serializer\Type(Dimensions::class)]
    protected ?Dimensions $dimensions = null;

    /**
     * @var DeliveryTimes[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\BMEcat\Nodes\DeliveryTimes>')]
    #[Serializer\XmlList(entry: 'DELIVERY_TIMES', inline: true)]
    protected array $deliveryTimes = [];
}
