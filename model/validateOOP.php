<?php

class Pattern {
	
	
	
}

class Email {
	
}

class Text {
	
}

class Phone {
	
}



class Field {
	
	private $name;
	private $message = '';
	private $has_error = FALSE;
	
	public function __construct($name, $message, $has_error) {
		
		$this->name = $name;
		$this->message = $message;
		
	}
	
	public function get_name() { return $this->name; }
	public function get_message() { return $this->message };
	public function has_error() { return $this->has_error };
	
	public function set_error_message($message) {
		
		$this->message = $message;
		$this->has_error = TRUE;
		
	} 
	
	public function clear_error_message() {
		
		$this->message = '';
		$this->has_error = FALSE;
		
	}
	
	public function get_html() {
		
		$message = htmlspecialchars($this->message);
		if ($this->has_error()) {
			return '<span class="error">' . $message .'</span>';
		} else {
			return '<span>' .  $message . '</span>'
		}
		
	}
	
}

class Fields {
	
	private $fields = array();
	
	public function addField($name, $message = '') {
		
		$field = new Field($name, $message);
		$this->fields[$field->get_name()] = $field;
		
	}
	
	public function get_field($name) {
		
		return $this->fields[$name];
		
	}
	
	public function has_errors() {
		
		foreach ($this->fields as $field) {
			if ($field->has_error()){
				return TRUE;
			}
		return FALSE;
		}
		
	}
	
}

class Validate {
	
	private $fields;
	
	public function __construct() {
		
		$this->fields = new Fields();
		
	}
	
	public function getFields() {
		
		return $this->fields;
		
	}
	
}


?>