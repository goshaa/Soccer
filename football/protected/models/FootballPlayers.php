<?php

class FootballPlayers extends BaseFootballPlayers
{
	public function behaviors()
    {
        return array(
            'TimestampBehavior',
            'LogicalDeleteBehavior',
        );
    }
    
    /**
	 * This function gets the age of a player
	 * @return int
	 */
    public function getAge()
    {
        $bdate = new DateTime($this->birth_date);
        $now = new DateTime(date("Y-m-d H:i:s"));

        $diff = $now->diff($bdate);

        return $diff->y;
    }
    
    /**
	 * This function gets the full name of a player
	 * @return string
	 */
    public function getName()
    {
        return $this->first_name.' '.$this->last_name;
    }
}