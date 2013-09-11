<?php namespace Bootstrap;

Class Base {
	public $instance;

	public static function getInstance () {
		if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
	}

	public static function initialize () {
		Grid::initialize();
		ResponsiveUtilities::initialize();
	}
}