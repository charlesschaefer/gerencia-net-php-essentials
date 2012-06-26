<?php

		function __autoload($class) {
		      if (file_exists('includes/' . $class . '.php')) {
		            require_once 'includes/' . $class . '.php';
		      } elseif (file_exists('classes/' . $class . '.php')) {
		            require_once 'classes/' . $class . '.php';
		      } elseif (file_exists('libs/' . $class . '.php')) {
		            require_once 'libs/' . $class . '.php';
		      }
		}
		
		
		
		
		