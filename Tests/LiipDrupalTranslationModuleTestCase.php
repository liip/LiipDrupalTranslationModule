<?php

namespace Liip\Drupal\Modules\Translation\Tests;


class LiipDrupalTranslationModuleTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Provides a stub for the Common class of the DrupalConnector Module.
     *
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDrupalCommonConnectorMock(array $methods = array())
    {
        return $this->getMockBuilder('\\Liip\\Drupal\\Modules\\DrupalConnector\\Common')
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * Provides a stub for the ConnectorFactory class of the DrupalConnector Module.
     *
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDrupalConnectorFactoryMock(array $methods = array())
    {
        return $this->getMockBuilder('\\Liip\\Drupal\\Modules\\DrupalConnector\\ConnectorFactory')
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * Provides a stub for the Database class of the DrupalConnector Module.
     *
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDrupalDatabaseConnectorMock(array $methods = array())
    {
        return $this->getMockBuilder('\\Liip\\Drupal\\Modules\\DrupalConnector\\Database')
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * Provides a fixture of the Common class of the Drupal Connector
     *
     * @param array $methods
     * @return  \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDrupalCommonConnectorFixture(array $methods = array())
    {
        $methods = array_merge($methods, array('variable_get'));

        $drupalCommonConnector = $this->getDrupalCommonConnectorMock($methods);
        $drupalCommonConnector
            ->expects($this->once())
            ->method('variable_get')
            ->with(
                $this->isType('string'),
                $this->isType('array')
            )
            ->will(
                $this->returnValue(array())
            );

        if (in_array('variable_set', $methods)) {
            $drupalCommonConnector
                ->expects($this->once())
                ->method('variable_set')
                ->with(
                    $this->isType('string')
                );
        }

        if (in_array('t', $methods)) {
            $drupalCommonConnector
                ->expects($this->once())
                ->method('t')
                ->with(
                    $this->isType('string')
                );
        }

        return $drupalCommonConnector;
    }

    /**
     * Provides a stub of the \Assert\Assertion class;
     *
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getAssertionObjectMock(array $methods = array())
    {
        return $this->getMockBuilder('\\Assert\\Assertion')
            ->setMethods($methods)
            ->getMock();
    }
}
