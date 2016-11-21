<?php
use Phinx\Seed\AbstractSeed;

class Metatags extends AbstractSeed
{
    public function run()
    {
        $table = $this->table('metatags');
        
        $data = [
            'name' => 'title',
            'type' => ''
        ];
        $table->insert($data)->save;

        $data = [
            'name' => 'description',
            'type' => 'textarea'
        ];
        $table->insert($data)->save;

        $data = [
            'name' => 'keywords',
            'type' => 'textarea'
        ];
        $table->insert($data)->save;
    }
}
