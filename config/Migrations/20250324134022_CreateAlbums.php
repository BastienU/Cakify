<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAlbums extends BaseMigration
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
        $table = $this->table('albums');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('title', 'char', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('releaseDate', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cover', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('spotifyLink', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
