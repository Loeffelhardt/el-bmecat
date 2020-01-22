<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use SE\Component\BMEcat\Node\ProductFeatureNode;
use SE\Component\BMEcat\Node\ProductFeaturesNode;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class ProductFeaturesNodeTest extends TestCase
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    public function setUp() : void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     *
     * @test
     */
    public function Add_Get_Feature()
    {
        $features = [
            new ProductFeatureNode(),
            new ProductFeatureNode(),
            new ProductFeatureNode(),
        ];

        $node = new ProductFeaturesNode();
        $this->assertEmpty($node->getFeatures());
        $node->nullFeatures();
        $this->assertEquals([], $node->getFeatures());

        foreach ($features as $feature) {
            $node->addFeature($feature);
        }

        $this->assertSame($features, $node->getFeatures());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Reference_Feature_System_Name()
    {
        $node = new ProductFeaturesNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getReferenceFeatureSystemName());
        $node->setReferenceFeatureSystemName($value);
        $this->assertEquals($value, $node->getReferenceFeatureSystemName());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Reference_Feature_Group_Name()
    {
        $node = new ProductFeaturesNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getReferenceFeatureGroupName());
        $node->setReferenceFeatureGroupName($value);
        $this->assertEquals($value, $node->getReferenceFeatureGroupName());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Reference_Feature_Group_Id()
    {
        $node = new ProductFeaturesNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getReferenceFeatureGroupId());
        $node->setReferenceFeatureGroupId($value);
        $this->assertEquals($value, $node->getReferenceFeatureGroupId());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new ProductFeaturesNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_product_features_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new ProductFeaturesNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_product_features_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
