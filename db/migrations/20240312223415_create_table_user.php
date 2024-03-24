<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableUser extends AbstractMigration
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
    public function up(): void
    {
        $this->execute("CREATE TABLE `users` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        );");
    }

    public function down(): void
    {
        $this->execute("DROP TABLE IF EXISTS `users`;");
    }
}
