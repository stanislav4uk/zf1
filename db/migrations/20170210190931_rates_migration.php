<?php

use Phinx\Migration\AbstractMigration;

class RatesMigration extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $exists = $this->hasTable('rates');
        if (!$exists) {
            $table = $this->table('rates');
            $table->addColumn("currency", "string", ["length" => 3]);
            $table->addColumn("rate", "decimal", ["precision" => 10, "scale" => 4]);
            $table->addColumn("base", "string", ["length" => 3]);
            $table->save();
        }
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('rates');
    }
}
