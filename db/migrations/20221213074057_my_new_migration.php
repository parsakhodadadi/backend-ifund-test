<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class  MyNewMigration extends AbstractMigration
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

    public function down() : void
    {
        $this->table('products')->drop()->save();
        $this->table('user_logins')->drop()->save();
    }

    public function up()
    {
        $table = $this->table('user_logins');

        $table->addColumn('user_id', 'integer')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addColumn('is_visible', 'boolean')
            ->create();

        if ($this->isMigratingUp()) {
            $table->insert([
                ['user_id' => 1, 'created_at' => '2020-01-19 03:14:07'],
                ['user_id' => 2, 'created_at' => '2020-01-19 03:14:07'],
            ])
                ->save();
        }
    }

}
