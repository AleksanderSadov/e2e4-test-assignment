<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $timeNow = Cake\I18n\Time::now()->format('Y-m-d H-i-s');
        $password = (new Cake\Auth\DefaultPasswordHasher)->hash('admin');
        
        $data = [
            'username' => 'admin',
            'password' => $password,
            'role' => 'admin',
            'created' => $timeNow,
            'modified' => $timeNow
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
