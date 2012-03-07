<?php

class MenuItem
{
    private $expanded;
    private $children = array();
    private $parent = null;
    private $text;

    public function setExpanded($expanded)
    {
        $this->expanded = $expanded;
    }

    public function isExpanded()
    {
        return $this->expanded;
    }

    public function setText($link)
    {
        $this->text = $link;
    }

    public function getText()
    {
        return $this->text;
    }

    public function addChild(MenuItem $child)
    {
        if(!in_array($child,$this->children)){
            $this->children[] = $child;
            $child->setParent($this);
        }
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function hasChildren()
    {
        return sizeof($this->children) > 0;
    }

    public function setParent(MenuItem $parent)
    {
        if($this->parent !== $parent){
            $this->parent = $parent;
            $parent->addChild($this);
        }
    }

    public function getParent()
    {
        return $this->parent;
    }
    
    public function isRoot(){
        return  is_null($this->parent);
    }

    public function getLevel(){
        if($this->isRoot()){
            return 0;
        }else{
            return 1+$this->getParent()->getLevel();
        }
    }

    public function toHTML()
    {
        $output = "";
        if($this->isRoot()){
            $output .= $this->childrenToHTML();
        }else{
            $output .= "<li class=\"sidebar-menu-item sidebar-menu-item-".$this->getLevel().' '.($this->isExpanded() ? 'sidebar-menu-item-expanded' : 'sidebar-menu-item-collapsed')."\"><div class=\"sidebar-menu-item-text sidebar-menu-item-text-".$this->getLevel()."\">".$this->getText()."</div>";
            $output .= $this->childrenToHTML();
            $output .= "</li>";
        }

        return $output;
    }

    private function childrenToHTML()
    {
        if($this->hasChildren()){
            $output = "<ul class=\"sidebar-menu sidebar-menu-".$this->getLevel()."\">";
            foreach ($this->getChildren() as $child) {
                $output .= $child->toHTML();
            }
            $output .= "</ul>";
            return $output;
        }
    }

}
