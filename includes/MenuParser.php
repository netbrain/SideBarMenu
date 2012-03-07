<?php
class MenuParser {

    public static function isRoot($line)
    {
        return !self::startsWith($line, '*');
    }

    public static function isValidInput($data)
    {
        return !(is_null($data) || strlen($data) == 0);
    }


    public static function getLevel($line)
    {
        return substr_count($line, '*');
    }

    public static function getExpandedParameter($line)
    {
        if (self::startsWith($line, '+')) {
            return true;
        } else {
            return false;
        }
    }

    public static function getTextParameter($line)
    {
        return preg_filter("/\+|\-?\**(.*)/", "$1", $line);
    }


    public static function getMenuTree($data){
        if(self::isValidInput($data)){
            $data = self::cleanupData($data);
            $root = new MenuItem();
            $root->setExpanded(true);
            $arrayData = self::parseDataIntoHierarchicalArray($data);
            self::addChildrenToMenuItemFromArrayData($root,$arrayData);
            return $root;
        }
    }


    public static function getMenuItem($line)
    {
        $line = trim($line);
        if(self::isValidInput($line)){
            $menuItem = new MenuItem();
            $menuItem->setExpanded(self::getExpandedParameter($line));
            $menuItem->setText(self::getTextParameter($line));
            return $menuItem;
        }else{
            throw new InvalidArgumentException();
        }
    }

    public static function parseDataIntoHierarchicalArray($data)
    {
        $rootArray = array();
        $prevArray = &$rootArray;
        $prevLevel = 0;
        $levelArray[0] = &$rootArray;
        foreach(preg_split("/\n/",$data) as $line){
            $level = self::getLevel($line);
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
                throw new InvalidArgumentException();
            }
            $prevLevel = $level;
        }
        return $rootArray;
    }

    public static function addChildrenToMenuItemFromArrayData(&$rootMenuItem,$arrayData)
    {
        foreach ($arrayData as $key => $val) {
            if (is_string($key)) {
                $menuItem = self::getMenuItem($key);
                $rootMenuItem->addChild($menuItem);
                self::addChildrenToMenuItemFromArrayData($menuItem,$val);
            } else {
                $menuItem = self::getMenuItem($val);
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