<?php
namespace Cirici\Metatags\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

class PagesControllerTest extends IntegrationTestCase
{
    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->get('/pages/test/');
        $this->assertResponseOk();
        $this->assertResponseContains('title');
        $Pages = TableRegistry::get('Pages');
        $this->assertTrue($Pages->hasBehavior('Metatagable'));

    }
}
