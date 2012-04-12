<?php

class MenuItem {
	private $expanded = false;
	private $children = array();
	private $parent = null;
	private $text;
	private $customCSSStyle;
	private $customCSSClasses;


	public function setExpanded($expanded) {
		if (is_null($expanded)) {
			throw new InvalidArgumentException(wfMsg('sidebarmenu-parser-menuitem-expanded-null'));
		} else {
			$this->expanded = $expanded;
		}
	}

	public function isExpanded() {
		return $this->expanded;
	}

	public function setText($link) {
		$this->text = $link;
	}

	public function getText() {
		return $this->text;
	}

	public function addChild(MenuItem $child) {
		if (!in_array($child, $this->children)) {
			$this->children[] = $child;
			$child->setParent($this);
		}
	}

	public function getChildren() {
		return $this->children;
	}

	public function hasChildren() {
		return sizeof($this->children) > 0;
	}

	public function setParent(MenuItem $parent) {
		if ($this->parent !== $parent) {
			$this->parent = $parent;
			$parent->addChild($this);
		}
	}

	public function getParent() {
		return $this->parent;
	}

	public function isRoot() {
		return is_null($this->parent);
	}

	public function getLevel() {
		if ($this->isRoot()) {
			return 0;
		} else {
			return 1 + $this->getParent()->getLevel();
		}
	}

	public function toHTML() {
		$output = "";
		if ($this->isRoot()) {
			$output .= $this->childrenToHTML();
		} else {
			$itemClasses[] = 'sidebar-menu-item';
			$itemClasses[] = 'sidebar-menu-item-' . $this->getLevel();

			if ($this->hasChildren()) {
				$itemClasses[] = $this->isExpanded() ? 'sidebar-menu-item-expanded' : 'sidebar-menu-item-collapsed';
			}

			if($this->hasCustomCSSClasses()){
				$itemClasses[] = $this->getCustomCSSClasses();
			}

			$textClasses[] = 'sidebar-menu-item-text';
			$textClasses[] = 'sidebar-menu-item-text-' . $this->getLevel();

			$output .= "<li class=\"" . join(' ', $itemClasses) . "\"".($this->hasCustomCSSStyle() ? " style=\"{$this->getCustomCSSStyle()}\"" : '').">";
			$output .= "<div class=\"sidebar-menu-item-text-container\">";
			$output .= "<span class=\"" . join(' ', $textClasses) . "\">" . $this->getText() . "</span>";

			if ($this->hasChildren()) {
				$output .= "<span class=\"sidebar-menu-item-controls\"></span>";
			}

			$output .= "</div>";
			$output .= $this->childrenToHTML();
			$output .= "</li>";
		}

		return $output;
	}

	private function childrenToHTML() {
		if ($this->hasChildren()) {
			$menuClasses[] = 'sidebar-menu';
			$menuClasses[] = 'sidebar-menu-' . $this->getLevel();

			$output = "<ul class=\"" . join(' ', $menuClasses) . "\">";
			foreach ($this->getChildren() as $child) {
				$output .= $child->toHTML();
			}
			$output .= "</ul>";
			return $output;
		}
	}

	public function getCustomCSSStyle() {
		return $this->customCSSStyle;
	}

	public function setCustomCSSStyle($style) {
		$this->customCSSStyle = $style;
	}

	public function hasCustomCSSStyle(){
		return isset($this->customCSSStyle) && $this->customCSSStyle !== '';
	}

	public function getCustomCSSClasses() {
		return $this->customCSSClasses;
	}

	public function setCustomCSSClasses($class) {
		$this->customCSSClasses = $class;
	}

	public function hasCustomCSSClasses(){
		return isset($this->customCSSClasses) && $this->customCSSClasses !== '';
	}

}
