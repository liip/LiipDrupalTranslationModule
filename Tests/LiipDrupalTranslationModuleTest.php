<?php

class LiipDrupalTranslationModuleTest extends PHPUnit_Framework_TestCase
{
    public function testInitFieldset()
    {
        $expected = array(
            'location' => null,
            'textgroup' => 'default',
            'source' => 'tux',
            'context' => '',
            'version' => 'none',
        );

        $data = array(
            'source' => 'tux',
        );

        $this->assertEquals($expected, _LiipDrupalTranslationModule_initFieldset($data));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInitFieldsetExpectingExceptionThrown()
    {
        _LiipDrupalTranslationModule_initFieldset(array());
    }


    public function testStoreTranslationSource()
    {

    }
}
