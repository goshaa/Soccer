<?php

class FootballPlayersTest extends CDbTestCase
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
        $player = FootballPlayers::model()->findByPk(1);
        $this->assertTrue($player->model() instanceof FootballPlayers);
    }
    
    /**
     * Unit test for tableName method
     * 
     * @return void
     */
    function testTableName()
    {
        $player = FootballPlayers::model()->findByPk(1);
        $this->assertEquals($player->tableName(), 'football_players');
    }
    
    /**
     * Unit test for clubs relation
     * 
     * @return void
     */
    function testClubsRelation()
    {   
        $player = FootballPlayers::model()->findByPk(1);
        $club = $player->club;
        $this->assertEquals(3, $club->club_id);
    }
    
    /**
     * Unit test for transfers relation
     * 
     * @return void
     */
    function testTransfersRelation()
    {
        $player = FootballPlayers::model()->findByPk(1);
        $transfers = $player->transfers;
        $this->assertEquals(1, count($transfers));
        $this->assertEquals(2, $transfers[0]->transfer_id);
    }
    
    /**
     * Unit test for getAge()
     * This test is valid just for one year because the age is always changing!!!
     * 
     * @return void
     */
    function testGetAge()
    {
        $player = FootballPlayers::model()->findByPk(2);
        $this->assertEquals(30, $player->getAge());
    }
    
     /* Unit test for getName
     * 
     * @return void
     */
    function testGetName()
    {
        $player = FootballPlayers::model()->findByPk(2);
        $this->assertEquals('Teszt Béla', $player->getName());
    }
    
    
}