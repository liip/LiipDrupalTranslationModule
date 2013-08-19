<?php

use Liip\Drupal\Modules\Translation\Tests\LiipDrupalTranslationModuleTestCase;


class LiipDrupalTranslationModuleTest extends LiipDrupalTranslationModuleTestCase
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

        $this->assertEquals($expected, _drupaltranslationmodule_initFieldset($data));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInitFieldsetExpectingExceptionThrown()
    {
        _drupaltranslationmodule_initFieldset(array());
    }

    /**
     * @dataProvider translationSourceExistsDataprovider
     */
    public function testTranslationSourceExists($expected, $lid)
    {
        $query = $this->getMockBuilder('\\stdClass')
            ->setMethods(array('fetchField'))
            ->getMock();
        $query
            ->expects($this->once())
            ->method('fetchField')
            ->will($this->returnValue($lid));

        $dcdb = $this->getDrupalDatabaseConnectorMock(array('db_query'));
        $dcdb
            ->expects($this->once())
            ->method('db_query')
            ->will($this->returnValue($query));

        $factory = $this->getDrupalConnectorFactoryMock(array('getDatabaseConnector'));
        $factory
            ->staticExpects($this->once())
            ->method('getDatabaseConnector')
            ->will($this->returnValue($dcdb));

        $this->assertEquals($expected, _drupaltranslationmodule_translation_source_exist('Tux', $factory));
    }
    public static function translationSourceExistsDataprovider()
    {
        return array(
            'translation exists (lid > 0)' => array(true, 42),
            'translation exists (lid = 0)' => array(true, 0),
            'translation exists (lid < 0)' => array(true, -42),
            'translation does not exist' => array(false, false),
        );
    }

    public function testAddKey()
    {
        $query = $this->getMockBuilder('\\stdClass')
            ->setMethods(array('fields', 'execute'))
            ->getMock();
        $query
            ->expects($this->once())
            ->method('fields')
            ->with(
                $this->isType('array')
            )
            ->will($this->returnValue($query));
        $query
            ->expects($this->once())
            ->method('execute');

        $dcdb = $this->getDrupalDatabaseConnectorMock(array('db_insert'));
        $dcdb
            ->expects($this->once())
            ->method('db_insert')
            ->will($this->returnValue($query));

        $factory = $this->getDrupalConnectorFactoryMock(array('getDatabaseConnector'));
        $factory
            ->staticExpects($this->once())
            ->method('getDatabaseConnector')
            ->will($this->returnValue($dcdb));

        _drupaltranslationmodule_addKey(array('source' => 'Tux'), $factory);
    }
}
