<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Product extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function down(): void
    {
        $this->table('products')->drop()->save();
    }

    public function up(): void
    {
        $table = $this->table('products');
        $table->addColumn('name', 'string')
            ->addColumn('user_id', 'integer', ["signed" => false])
            ->addForeignKey('user_id', 'user_logins', 'id',
                array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->create();

        $this->table('products')
            ->addColumn('description','string')
            ->addColumn('test','string')
            ->update();
    }
}
