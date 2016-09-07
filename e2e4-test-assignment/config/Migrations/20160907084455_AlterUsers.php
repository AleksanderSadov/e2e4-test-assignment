<?php
use Migrations\AbstractMigration;

class AlterUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->changeColumn('nickname', 'string', [
                    'default' => null,
                    'limit' => 50,
                    'null' => false
                ])
                ->addColumn('password', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false
                ])
                ->addColumn('role', 'string', [
                    'default' => null,
                    'limit' => 20,
                    'null' => false
                ]);
        $table->update();
        
        $table->renameColumn('nickname', 'username');
        $table->update();
    }
}
