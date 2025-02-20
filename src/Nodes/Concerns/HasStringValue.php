<?php

namespace Naugrim\BMEcat\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasStringValue
{
    /**
     * @Serializer\XmlValue
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $value = '';

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return NodeInterface
     */
    public function setValue(string $value): NodeInterface
    {
        $this->value = $value;
        /** @var NodeInterface $this */
        return $this;
    }
}
