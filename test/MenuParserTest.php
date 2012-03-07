<?php

class MenuParserTest extends MediaWikiTestCase
{

    public function testValidInputWhenNull(){
        $this->assertFalse(MenuParser::isValidInput(null));
    }

    public function testValidInputWhenEmpty(){
        $this->assertFalse(MenuParser::isValidInput(""));
    }

    public function testValidInput(){
        $this->assertTrue(MenuParser::isValidInput("+MenuItem"));
    }

    public function testGetLevelWhenNull(){
        $this->assertEquals(0,MenuParser::getLevel(null));
    }

    public function testGetLevelWhenEmpty(){
        $this->assertEquals(0,MenuParser::getLevel(""));
    }

    public function testGetLevelWhenValidButNoStars(){
        $this->assertEquals(0,MenuParser::getLevel(""));
    }

    public function testGetLevelWithValid(){
        $this->assertEquals(3,MenuParser::getLevel("***MenuItem"));
    }

    public function testGetExpandedParameterWhenNoneSupplied(){
        //default is false
        $this->assertFalse(MenuParser::getExpandedParameter("MenuItem"));
    }

    public function testGetExpandedParameterWhenNotExpanded(){
        $this->assertFalse(MenuParser::getExpandedParameter("-MenuItem"));
    }

    public function testGetExpandedParameterWhenExpanded(){
        $this->assertTrue(MenuParser::getExpandedParameter("+MenuItem"));
    }

    public function testGetTextParameter(){
        $this->assertEquals("MenuItem",MenuParser::getTextParameter("+***MenuItem"));
        $this->assertEquals("+MenuItem",MenuParser::getTextParameter("+***+MenuItem"));
        $this->assertEquals("MenuItem",MenuParser::getTextParameter("-MenuItem"));
        $this->assertEquals("MenuItem",MenuParser::getTextParameter("-*MenuItem"));
        $this->assertEquals("MenuItem",MenuParser::getTextParameter("MenuItem"));
        $this->assertEquals("+*MenuItem",MenuParser::getTextParameter("+***+*MenuItem"));
    }

    public function testGetMenuItemWhenInputIsNull(){
        $this->setExpectedException('InvalidArgumentException');
        $this->assertNull(MenuParser::getMenuItem(null));
    }

    public function testGetMenuItemWhenInputIsEmpty(){
        $this->setExpectedException('InvalidArgumentException');
        $this->assertNull(MenuParser::getMenuItem(""));
    }

    public function testGetMenuItemWhenInputIsValid(){
        $data = "MenuItem";
        $menuItem = MenuParser::getMenuItem($data);
        $this->assertNotNull($menuItem);
        $this->assertEquals($data,$menuItem->getText());
        $this->assertFalse($menuItem->isExpanded()); //false is default
    }

    public function testGetMenuItemWhenInputIsValidAndExpandIsSet(){
        $text = "MenuItem";
        $data = "+".$text;
        $menuItem = MenuParser::getMenuItem($data);
        $this->assertNotNull($menuItem);
        $this->assertEquals($text,$menuItem->getText());
        $this->assertTrue($menuItem->isExpanded()); //false is default
    }

    public function testParseDataIntoHierarchicalArray(){
        $data = "MenuItem";
        $array = MenuParser::parseDataIntoHierarchicalArray($data);
        $this->assertNotNull($array);
        $this->assertEquals($data,$array[0]);
    }

    public function testParseDataIntoHierarchicalArrayWithSubLevel(){
        $lines = array("MenuItem","*SubMenuItem");
        $data = join("\n",$lines);
        $array = MenuParser::parseDataIntoHierarchicalArray($data);
        $this->assertNotNull($array);
        $this->assertArrayHasKey($lines[0],$array);
        $this->assertEquals(
            array(
                'MenuItem' => array(
                    '*SubMenuItem'
                )
            ),$array
        );
    }

    public function testParseDataIntoHierarchicalArrayWithSeveralSubLevels(){
        $lines = array("MenuItem","*SubMenuItem","*SubMenuItem2","**SubMenuItemOf2");
        $data = join("\n",$lines);
        $array = MenuParser::parseDataIntoHierarchicalArray($data);
        $this->assertNotNull($array);
        $this->assertEquals(
            array(
                'MenuItem' => array(
                    '*SubMenuItem',
                    '*SubMenuItem2' => array(
                        '**SubMenuItemOf2'
                    )
                )
            ),$array
        );
    }

    public function testParseDataIntoHierarchicalArrayWithSubLevelAndBack(){
        $lines = array("MenuItem","*SubMenuItem","MenuItem2");
        $data = join("\n",$lines);
        $array = MenuParser::parseDataIntoHierarchicalArray($data);
        $this->assertNotNull($array);
        $this->assertEquals(
            array(
                'MenuItem' => array(
                    '*SubMenuItem'
                ),
                'MenuItem2'
            ),$array
        );
    }

    public function testParseDataIntoHierarchicalArrayWithSubLevelAndBackSeveralLevels(){
        $lines = array("MenuItem","*SubMenuItem1","**SubMenuItem2","***SubMenuItem3","MenuItem2");
        $data = join("\n",$lines);
        $array = MenuParser::parseDataIntoHierarchicalArray($data);
        $this->assertNotNull($array);
        $this->assertEquals(
            array(
                'MenuItem' => array(
                    '*SubMenuItem1' => array(
                        '**SubMenuItem2' => array(
                            '***SubMenuItem3'
                        )
                    )
                ),
                'MenuItem2'
            ),$array
        );
    }


    public function testGetMenuWithInvalidInput(){
        $this->assertNull(MenuParser::getMenuTree(null));
        $this->assertNull(MenuParser::getMenuTree(""));
    }

    public function testGetMenuWithValidInput(){
        $menu = MenuParser::getMenuTree("MenuItem");
        $this->assertNotNull($menu);
        $this->assertTrue($menu->isRoot());
        $this->assertEquals(1,sizeof($menu->getChildren()));

        $children = $menu->getChildren();
        $this->assertEquals("MenuItem",$children[0]->getText());
    }

    public function testGetMenuWithValidComplexInput(){
        $data = array(
            'MenuItem1',
            '*SubMenuItem1',
            '*SubMenuItem2',
            '*SubMenuItem3',
            '**SubMenuItem1Of1',
            '**SubMenuItem2Of1',
            'MenuItem2',
            '*SubMenuItem1OfMenuItem2'
        );
        $menu = MenuParser::getMenuTree(join("\n",$data));
        $this->assertNotNull($menu);
        $this->assertEquals(2,sizeof($menu->getChildren()));

    }

    public function testGetMenuWithSeveralLineBreaks(){
        $data = array(
            '',
            'MenuItem1',
            '',
            ''
        );
        $menu = MenuParser::getMenuTree(join("\n",$data));
        $this->assertNotNull($menu);
        $this->assertEquals(1,sizeof($menu->getChildren()));

        $children = $menu->getChildren();
        $this->assertEquals("MenuItem1",$children[0]->getText());

    }
}
