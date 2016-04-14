<?php

class AuthRouteTest extends PHPUnit_Framework_TestCase
{
    public function testGuestAuthRoute(){
        $ar = new AuthRoute(HdbCore::ROLE_GUEST.'#public@landingPage');
        $this->assertEquals(HdbCore::ROLE_GUEST.'#public@landingPage', $ar->getName());
        $this->assertEquals([0], $ar->getRoles());
        $this->assertEquals(true, $ar->isAllowed(0));
        $this->assertEquals(false, $ar->isAllowed(1));
        $this->assertEquals('public', $ar->getGroup());
        $this->assertEquals('landingPage', $ar->getAction());
        $this->assertEquals('landingPage', $ar->getSecondGroup());
    }
    
    public function testNormalUserAuthRoute(){
        $ar = new AuthRoute(HdbCore::ROLE_NORMAL_USER.'#property@view.addToWatchlist');
        $this->assertEquals(HdbCore::ROLE_NORMAL_USER.'#property@view.addToWatchlist', $ar->getName());
        $this->assertEquals([5], $ar->getRoles());
        $this->assertEquals(false, $ar->isAllowed(7));
        $this->assertEquals(true, $ar->isAllowed(5));
        $this->assertEquals('property', $ar->getGroup());
        $this->assertEquals('view.addToWatchlist', $ar->getAction());
        $this->assertEquals('view', $ar->getSecondGroup());
    }
    
    public function testRealtorAuthRoute(){
        $ar = new AuthRoute(HdbCore::ROLE_REALTOR.'#property@manager.list');
        $this->assertEquals(HdbCore::ROLE_REALTOR.'#property@manager.list', $ar->getName());
        $this->assertEquals([7], $ar->getRoles());
        $this->assertEquals(false, $ar->isAllowed(5));
        $this->assertEquals(true, $ar->isAllowed(7));
        $this->assertEquals('property', $ar->getGroup());
        $this->assertEquals('manager.list', $ar->getAction());
        $this->assertEquals('manager', $ar->getSecondGroup());
    }
}