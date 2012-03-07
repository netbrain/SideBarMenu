<?php

class MenuItemTest extends MediaWikiTestCase
{
    private $menuItem;

    protected function setUp()
    {
        $this->menuItem = new MenuItem();
    }

    public function testIsRoot(){
        $this->assertTrue($this->menuItem->isRoot());
    }

    public function testIsNotRoot(){
        $this->menuItem->setParent(new MenuItem());
        $this->assertFalse($this->menuItem->isRoot());
    }

    public function testGetLevelWhenRoot(){
        $this->assertEquals(0,$this->menuItem->getLevel());
    }

    public function testGetLevelWhenChild(){
        $this->menuItem->setParent(new MenuItem());
        $this->assertEquals(1,$this->menuItem->getLevel());
    }

    public function testGetLevelWhenSeveralChildren(){
        $prev = $this->menuItem;
        for($x = 0; $x < 10; $x++){
            $child = new MenuItem();
            $child->setParent($prev);
            $prev = $child;

        }
        $this->assertEquals(10,$prev->getLevel());
    }

    public function testAddChildAlsoAddsParent(){
        $child = new MenuItem();
        $this->menuItem->addChild($child);
        $this->assertContains($child,$this->menuItem->getChildren());
        $this->assertEquals($child->getParent(),$this->menuItem);
    }

    public function testAddSameChildSeveralTimes(){
        $child = new MenuItem();
        for($x = 0; $x < 3; $x++){
            $this->menuItem->addChild($child);
        }
        $this->assertEquals(1,sizeof($this->menuItem->getChildren()));
    }

    public function testAddParentAlsoAddsChild(){
        $parent = new MenuItem();
        $this->menuItem->setParent($parent);
        $this->assertContains($this->menuItem,$parent->getChildren());
    }

    public function testToHTMLOnRootMenuItem(){
        $html = $this->menuItem->toHTML();
        $this->assertEquals("",$html);
    }

    public function testToHTMLOnProperMenuItem(){
        $menuItemChild = new MenuItem();
        $menuItemChild->setText("MenuItem1");
        $this->menuItem->addChild($menuItemChild);
        $html = $this->menuItem->toHTML();
        $this->assertEquals('<ul class="sidebar-menu sidebar-menu-0"><li class="sidebar-menu-item sidebar-menu-item-1"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-1">MenuItem1</span></div></li></ul>',$html);
    }

    public function testToHTMLOnSeveralMenuItems(){
        $menuItemChild1 = new MenuItem();
        $menuItemChild1->setText("MenuItem1");
        $menuItemChild2 = new MenuItem();
        $menuItemChild2->setText("MenuItem2");

        $this->menuItem->addChild($menuItemChild1);
        $this->menuItem->addChild($menuItemChild2);

        $html = $this->menuItem->toHTML();
        $this->assertEquals('<ul class="sidebar-menu sidebar-menu-0"><li class="sidebar-menu-item sidebar-menu-item-1"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-1">MenuItem1</span></div></li><li class="sidebar-menu-item sidebar-menu-item-1"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-1">MenuItem2</span></div></li></ul>',$html);
    }

    public function testToHTMLOnSeveralMenuItemsWithSublevels(){
        $menuItemChild1 = new MenuItem();
        $menuItemChild1->setText("MenuItem1");
        $menuItemChild2 = new MenuItem();
        $menuItemChild2->setText("MenuItem2");

        $this->menuItem->addChild($menuItemChild1);
        $this->menuItem->addChild($menuItemChild2);

        $subLevel1 = new MenuItem();
        $subLevel1->setText("SubMenuItem1");
        $subLevel1->setParent($menuItemChild2);

        $html = $this->menuItem->toHTML();
        $this->assertEquals('<ul class="sidebar-menu sidebar-menu-0"><li class="sidebar-menu-item sidebar-menu-item-1"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-1">MenuItem1</span></div></li><li class="sidebar-menu-item sidebar-menu-item-1 sidebar-menu-item-collapsed"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-1">MenuItem2</span><span class="sidebar-menu-item-controls"></span></div><ul class="sidebar-menu sidebar-menu-1"><li class="sidebar-menu-item sidebar-menu-item-2"><div class="sidebar-menu-item-text-container"><span class="sidebar-menu-item-text sidebar-menu-item-text-2">SubMenuItem1</span></div></li></ul></li></ul>',$html);
    }
}
