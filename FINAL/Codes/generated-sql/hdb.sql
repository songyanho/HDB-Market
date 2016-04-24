
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `descendant_class` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- realtor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `realtor`;

CREATE TABLE `realtor`
(
    `full_name` VARCHAR(255) NOT NULL,
    `nric` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `id` INTEGER NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    CONSTRAINT `realtor_fk_ffc53a`
        FOREIGN KEY (`id`)
        REFERENCES `user` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- normal_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `normal_user`;

CREATE TABLE `normal_user`
(
    `id` INTEGER NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    CONSTRAINT `normal_user_fk_ffc53a`
        FOREIGN KEY (`id`)
        REFERENCES `user` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_session`;

CREATE TABLE `login_session`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_type` VARCHAR(255) NOT NULL,
    `user_id` INTEGER NOT NULL,
    `session_id` VARCHAR(255) NOT NULL,
    `session_key` VARCHAR(255) NOT NULL,
    `disabled` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hdb
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hdb`;

CREATE TABLE `hdb`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `block` VARCHAR(255) NOT NULL,
    `flat_type` VARCHAR(255) NOT NULL,
    `town` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `flat_model` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`flat_type`,`town`,`street`,`flat_model`),
    UNIQUE INDEX `hdb_u_db2f7c` (`id`),
    INDEX `hdb_i_db2f7c` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- listing
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `listing`;

CREATE TABLE `listing`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `size` DOUBLE NOT NULL,
    `unit_number` VARCHAR(10) NOT NULL,
    `price` DOUBLE NOT NULL,
    `hdb_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `listing_fi_104684` (`hdb_id`),
    CONSTRAINT `listing_fk_104684`
        FOREIGN KEY (`hdb_id`)
        REFERENCES `hdb` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- watchlist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `watchlist`;

CREATE TABLE `watchlist`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `listing_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `watchlist_fi_29554a` (`user_id`),
    INDEX `watchlist_fi_53b603` (`listing_id`),
    CONSTRAINT `watchlist_fk_29554a`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `watchlist_fk_53b603`
        FOREIGN KEY (`listing_id`)
        REFERENCES `listing` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
