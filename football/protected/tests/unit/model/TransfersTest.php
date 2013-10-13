<?php

class TransfersTest extends CDbTestCase
{
    public $fixtures = array(
        'clubs' => 'Clubs',
        'football_players' => 'FootballPlayers',
        'transfers' => 'Transfers',
    );
    
    /**
     * Tests if current model is valid
     * 
     * @return void
     */
    function testModel()
    {
        $transfer = Transfers::model()->findByPk(1);
        $this->assertTrue($transfer->model() instanceof Transfers);
    }
    
    /**
     * Unit test for tableName method
     * 
     * @return void
     */
    function testTableName()
    {
        $transfer = Transfers::model()->findByPk(1);
        $this->assertEquals($transfer->tableName(), 'transfers');
    }
    
    /**
     * Unit test for player relation
     * 
     * @return void
     */
    function testPlayerRelation()
    {   
        $transfer = Transfers::model()->findByPk(1);
        $player = $transfer->player;
        $this->assertEquals(3, $player->player_id);
    }
    
    /**
     * Unit test for fromClub relation
     * 
     * @return void
     */
    function testFromClubRelation()
    {
        $transfer = Transfers::model()->findByPk(1);
        $club = $transfer->fromClub;
        $this->assertEquals(2, $club->club_id);
    }
    
    /**
     * Unit test for toClub relation
     * 
     * @return void
     */
    function testToClubRelation()
    {
        $transfer = Transfers::model()->findByPk(1);
        $club = $transfer->toClub;
        $this->assertEquals(3, $club->club_id);
    }
}