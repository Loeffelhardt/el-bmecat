<?php

namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("SPECIAL_TREATMENT_CLASS")
 */
class SpecialTreatmentClassNode implements Contracts\NodeInterface
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    private $type = '';

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlValue
     *
     * @var string
     */
    protected $value = '';

    /**
     * @param string $type
     * @return SpecialTreatmentClassNode
     */
    public function setType($type) : SpecialTreatmentClassNode
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return SpecialTreatmentClassNode
     */
    public function setValue(string $value): SpecialTreatmentClassNode
    {
        $this->value = $value;
        return $this;
    }
}
