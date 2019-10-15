<?php

namespace Spatie\Test;

use function spatie\array_rand_value;
use PHPUnit\Framework\TestCase;

class ArrayRandValueTest extends TestCase
{
    protected $testArray = [
        'one' => 'a',
        'two' => 'b',
        'three' => 'c',
    ];

    /**
     * @test
     */
    public function it_can_handle_an_empty_array()
    {
        $this->assertIsArray(array_rand_value([]));
        $this->assertCount(0, array_rand_value([]));
    }

    /**
     * @test
     */
    public function it_can_get_a_random_value()
    {
        $testArrayValues = array_values($this->testArray);
        $randomArrayValue = array_rand_value($this->testArray)[0];

        $this->assertContains($randomArrayValue, $testArrayValues);
    }

    /**
     * @test
     */
    public function it_can_get_multiple_random_values()
    {
        $testArrayValues = array_values($this->testArray);
        $randomArrayValues = array_rand_value($this->testArray, 2);

        $this->assertCount(2, $randomArrayValues);

        foreach ($randomArrayValues as $randomArrayValue) {
            $this->assertContains($randomArrayValue, $testArrayValues);
        }
    }
}
