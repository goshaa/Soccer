<?php

class ClubsTest extends CDbTestCase
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
        $club = Clubs::model()->findByPk(2);
        $this->assertTrue($club->model() instanceof Clubs);
    }
    
    /**
     * Unit test for tableName method
     * 
     * @return void
     */
    function testTableName()
    {
        $club = Clubs::model()->findByPk(2);
        $this->assertEquals($club->tableName(), 'clubs');
    }
    
    /**
     * Unit test for players relation
     * 
     * @return void
     */
    function testPlayersRelation()
    {   
        $club = Clubs::model()->findByPk(3);
        $players = $club->footballPlayers;
        $this->assertEquals(2, count($players));
        $this->assertEquals(1, $players[0]->player_id);
    }
    
    /**
     * Unit test for transfers relation
     * 
     * @return void
     */
    function testTransfersRelation()
    {
        $club = Clubs::model()->findByPk(2);
        $transfers = $club->transfers_from;
        $this->assertEquals(2, count($transfers));
        $this->assertEquals(1, $transfers[0]->transfer_id);
        $transfers = $club->transfers_to;
        $this->assertEquals(1, count($transfers));
        $this->assertEquals(3, $transfers[0]->transfer_id);
    }
}