<?php

class m131011_112459_add_basic_tables extends CDbMigration
{
	 /**
     * Applies migration
     * 
     * @return void
     */
    public function up()
    {
        $sql = '
            SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
            SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

            -- -----------------------------------------------------
            -- Table `clubs`
            -- -----------------------------------------------------
            CREATE  TABLE IF NOT EXISTS `clubs` (
              `club_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
              `name` VARCHAR(45) NOT NULL ,
              `year_of_foundation` INT(4) UNSIGNED NOT NULL,
              `deleted` INT(1) NOT NULL,
              `date_created` DATETIME NOT NULL ,
              `date_updated` DATETIME NOT NULL ,
              PRIMARY KEY (`club_id`) )
            ENGINE = InnoDB;
            
            -- -----------------------------------------------------
            -- Table `football_players`
            -- -----------------------------------------------------
            CREATE  TABLE IF NOT EXISTS `football_players` (
              `player_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
              `first_name` VARCHAR(45) NOT NULL ,
              `last_name` VARCHAR(45) NOT NULL ,
              `nationality` VARCHAR(45) NOT NULL ,
              `club_id` INT UNSIGNED NOT NULL DEFAULT 0 ,
              `birth_date` DATE NOT NULL,
              `deleted` INT(1) NOT NULL,
              `date_created` DATETIME NOT NULL ,
              `date_updated` DATETIME NOT NULL ,
              PRIMARY KEY (`player_id`) ,
              INDEX `fk_football_players_club1` (`club_id` ASC) ,
              CONSTRAINT `fk_football_players_club1`
                FOREIGN KEY (`club_id` )
                REFERENCES `clubs` (`club_id` )
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB;

            -- -----------------------------------------------------
            -- Table `transfers`
            -- -----------------------------------------------------
            CREATE  TABLE IF NOT EXISTS `transfers` (
              `transfer_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
              `player_id` INT UNSIGNED NOT NULL ,
              `from_club_id` INT UNSIGNED NOT NULL ,
              `to_club_id` INT UNSIGNED NOT NULL ,
              `transfer_date` DATE NOT NULL,
              `payment` INT UNSIGNED NOT NULL ,
              `date_created` DATETIME NOT NULL ,
              `date_updated` DATETIME NOT NULL ,
              PRIMARY KEY (`transfer_id`) ,
              INDEX `fk_transfers_player1` (`player_id` ASC) ,
              INDEX `fk_transfers_club1` (`from_club_id` ASC) ,
              INDEX `fk_transfers_club2` (`to_club_id` ASC) ,
              CONSTRAINT `fk_transfers_player1`
                FOREIGN KEY (`player_id` )
                REFERENCES `football_players` (`player_id` )
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_transfers_club1`
                FOREIGN KEY (`from_club_id` )
                REFERENCES `clubs` (`club_id` )
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_transfers_club2`
                FOREIGN KEY (`to_club_id` )
                REFERENCES `clubs` (`club_id` )
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB;

            SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
            SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
            ';
        
        $connection = $this->getDbConnection();
        $command = $connection->createCommand($sql);
        $command->execute();
    }

    /**
     * Removes migration
     * 
     * @return void
     */
    public function down()
    {
        $this->dropTable('transfers');
        $this->dropTable('football_players');
        $this->dropTable('clubs');
    }
}