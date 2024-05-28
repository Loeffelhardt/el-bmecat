<?php

namespace Naugrim\BMEcat\Nodes;

use JMS\Serializer\Annotation as Serializer;


#[Serializer\XmlRoot('DELIVERY_TIMES')]
class DeliveryTimes implements Contracts\NodeInterface
{

    /**
     *
     *
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(inline: true, entry: 'TERRITORY')]
    protected array $territories;

    /**
     *
     *
     * @var TimeSpan[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\BMEcat\Nodes\TimeSpan>')]
    #[Serializer\XmlList(inline: true, entry: 'TIME_SPAN')]
    protected array $timeSpans;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('LEADTIME')]
    #[Serializer\XmlElement(cdata: false)]
    protected float $leadTime = null;
}