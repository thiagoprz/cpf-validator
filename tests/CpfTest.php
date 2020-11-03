<?php
namespace Thiagoprz\CpfValidator\Test;

use Thiagoprz\CpfValidator\Cpf;

class CpfTest extends TestCase
{

    /**
     * @var Cpf
     */
    protected $rule;


    /**
     * @var array Valid identifiers
     */
    protected $valid_identifiers = [
        '374.138.774-65',
        '48392276671',
        '846.174.923-56',
    ];

    /**
     * Test setup
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->rule = new Cpf();
    }

    /**
     * Valid identifier passing test
     *
     * @return void
     */
    public function testCpfPass()
    {
        foreach ($this->valid_identifiers as $identifier) {
            $this->assertTrue($this->rule->passes('identifier', $identifier));
        }
        $this->assertTrue($this->rule->passes('identifier', '', ['nullable' => true]));
    }

    /**
     * Invalid identifiers test (fails)
     */
    public function testCpfFail()
    {
        $this->assertFalse($this->rule->passes('identifier', '055.885.423-11'));
        $this->assertFalse($this->rule->passes('identifier', '1111111111111'));
        $this->assertFalse($this->rule->passes('identifier', 'a'));
    }
}
