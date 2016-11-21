<?php
use Phinx\Migration\AbstractMigration;

class TablesCreation extends AbstractMigration
{
    public function change()
    {
        $this->table('metatags')
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'limit' => 45,
                'null' => true,
            ])
            ->create()
        ;

        $this->table('metataggeds')
            ->addColumn('model', 'string', [
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer')
            ->addColumn('metatag_id', 'integer')
            ->addColumn('language', 'string', [
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('value', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex(['model', 'foreing_key'])
            ->addIndex('metatag_id')
            ->create()
        ;
    }
}

