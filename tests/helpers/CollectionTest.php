<?php


class CollectionTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new kingston\icarus\helpers\Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new kingston\icarus\helpers\Collection;

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new kingston\icarus\helpers\Collection([
            "one", "two"
        ]);

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(2, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new kingston\icarus\helpers\Collection([
            "one", "two", "three"
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function conditional_count_is_correct_for_items_passed_in()
    {

        $item1 = new Item(1);
        $item2 = new Item(1);
        $item3 = new Item(0);


        $collection = new kingston\icarus\helpers\Collection([
            $item1, $item2, $item3
        ]);

        $this->assertEquals(2, $collection->countIf('property', 1));
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new kingston\icarus\helpers\Collection([
            [
                'first_name' => 'Molly',
            ],
            [
                'first_name' => 'Billy',
            ]
        ]);

        $this->assertIsString('string', $collection->toJson());
        $this->assertEquals('[{"first_name":"Molly"},{"first_name":"Billy"}]', $collection->toJson());
    }
}


class Item
{
    public int $property;

    public function __construct($property)
    {
        $this->property = $property;
    }
}
