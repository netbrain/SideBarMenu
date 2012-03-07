<?php
class MenuParser {

    private $expandedByDefault;

    function __construct($expandedByDefault)
    {
        $this->expandedByDefault = $expandedByDefault;
    }


    public function isValidInput($data)
    {
        return !(is_null($data) || strlen($data) == 0);
    }


    public function getLevel($line)
    {
        return substr_count($line, '*');
    }

    public function getExpandedParameter($line)
    {
        if ($this->startsWith($line, '+')) {
            return true;
        } else if($this->startsWith($line, '-')) {
            return false;
        }
        return $this->expandedByDefault;
    }

    public function getTextParameter($line)
    {
        return preg_filter("/\+|\-?\**(.*)/", "$1", $line);
    }


    public function getMenuTree($data){
        if($this->isValidInput($data)){
            $data = $this->cleanupData($data);
            $root = new MenuItem();
            $root->setExpanded(true);
            $arrayData = $this->parseDataIntoHierarchicalArray($data);
            $this->addChildrenToMenuItemFromArrayData($root,$arrayData);
            return $root;
        }
    }


    public function getMenuItem($line)
    {
        $line = trim($line);
        if($this->isValidInput($line)){
            $menuItem = new MenuItem();
            $menuItem->setExpanded($this->getExpandedParameter($line));
            $menuItem->setText($this->getTextParameter($line));
            return $menuItem;
        }else{
            throw new InvalidArgumentException();
        }
    }

    public function parseDataIntoHierarchicalArray($data)
    {
        $rootArray = array();
        $prevArray = &$rootArray;
        $prevLevel = 0;
        $levelArray[0] = &$rootArray;
        foreach(preg_split("/\n/",$data) as $line){
            $level = $this->getLevel($line);
            if($level == $prevLevel){
                $levelArray[$level][] = $line;
            }else if($level-1 == $prevLevel){
                //child of previous line
                $parent = array_pop($levelArray[$level-1]);
                $levelArray[$level-1][$parent][] = $line;
                $levelArray[$level] = &$levelArray[$level-1][$parent];
            }else if($level < $prevLevel){
                //back some levels
                $levelArray[$level][] = $line;
            }else{
                //syntax error
                throw new InvalidArgumentException(wfMsg('parser.syntax-error',$line));
            }
            $prevLevel = $level;
        }
        return $rootArray;
    }

    public function addChildrenToMenuItemFromArrayData(&$rootMenuItem,$arrayData)
    {
        foreach ($arrayData as $key => $val) {
            if (is_string($key)) {
                $menuItem = $this->getMenuItem($key);
                $rootMenuItem->addChild($menuItem);
                $this->addChildrenToMenuItemFromArrayData($menuItem,$val);
            } else {
                $menuItem = $this->getMenuItem($val);
                $rootMenuItem->addChild($menuItem);
            }
        }
    }

    private static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    private static function cleanupData($data){
        for($x = 0; $x < 2; $x++){
            $data = self::removeLineBreaksFromStartOfString($data);
            $data = strrev($data);
        }
        return $data;
    }

    private static function removeLineBreaksFromStartOfString($data)
    {
        while (self::startsWith($data, "\n")) {
            $data = substr($data, 1);
        }
        return $data;
    }

}