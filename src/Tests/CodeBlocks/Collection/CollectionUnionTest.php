<?php

namespace Funct\Tests\CodeBlocks\Collection;

use Funct\CodeBlocks as Funct;

/**
 * Class CollectionUnionTest
 *
 * @package Funct\Tests\CodeBlocks\Collection
 * @author  Aurimas Niekis <aurimas.niekis@gmail.com>
 */
class CollectionUnionTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionUnion()
    {
        $out = [];

        $out[] = [
            [
                [1, 2, 3],
                [3, 4, 5],
                [6, 7, 8],
                [1, 2]
            ],
            [1, 2, 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8]
        ];

        $out[] = [
            [
                [1, 2, 3],
                [101, 2, 1, 10],
                [2, 1]
            ],
            [1, 2, 3, 101, 6 => 10]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionUnion
     */
    public function testCollectionUnion($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\CodeBlocks\collection_union', $given));
    }
}
