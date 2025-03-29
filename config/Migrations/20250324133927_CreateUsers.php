<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('username', 'char', [
            'default' => null,
            'limit' => 35,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('role_id', 'integer', [
            'default' => 2,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
