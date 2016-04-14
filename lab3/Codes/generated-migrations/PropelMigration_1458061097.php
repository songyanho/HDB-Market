<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1458061097.
 * Generated on 2016-03-15 16:58:17 by liyingho
 */
class PropelMigration_1458061097
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'hdb' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `listing`

  ADD `realtor_id` INTEGER NOT NULL AFTER `hdb_id`,

  ADD INDEX `listing_fi_60971a` (`realtor_id`),

  ADD CONSTRAINT `listing_fk_60971a`
    FOREIGN KEY (`realtor_id`)
    REFERENCES `realtor` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'hdb' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `listing`

  DROP FOREIGN KEY `listing_fk_60971a`,

  DROP INDEX `listing_fi_60971a`,

  DROP `realtor_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}