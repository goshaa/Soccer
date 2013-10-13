<?php

class m131012_150646_add_default_club extends CDbMigration
{
	public function up()
	{
        $this->insert('clubs', array(
            'club_id' => 1, 
            'name' => 'Szabadúszó', 
            'year_of_foundation' => 0,
            'deleted' => 0,
            'date_created' => date("Y-m-d H:i:s"),
            'date_updated' => date("Y-m-d H:i:s"),
        ));
	}

	public function down()
	{
		$this->delete('clubs', 'club_id = 1');
	}
}