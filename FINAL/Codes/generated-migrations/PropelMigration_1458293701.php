<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1458293701.
 * Generated on 2016-03-18 09:35:01 by liyingho
 */
class PropelMigration_1458293701
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

ALTER TABLE `hdb`

  DROP PRIMARY KEY,

  CHANGE `block` `block` VARCHAR(255),

  CHANGE `flat_type` `flat_type` VARCHAR(255),

  CHANGE `street` `street` VARCHAR(255),

  CHANGE `flat_model` `flat_model` VARCHAR(255),

  ADD PRIMARY KEY (`id`,`town`);

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

ALTER TABLE `hdb`

  DROP PRIMARY KEY,

  CHANGE `block` `block` VARCHAR(255) NOT NULL,

  CHANGE `flat_type` `flat_type` VARCHAR(255) NOT NULL,

  CHANGE `street` `street` VARCHAR(255) NOT NULL,

  CHANGE `flat_model` `flat_model` VARCHAR(255) NOT NULL,

  ADD PRIMARY KEY (`flat_type`,`town`,`street`,`flat_model`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}