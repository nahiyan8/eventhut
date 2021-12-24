<?php

class Event extends RedBean_SimpleModel
{
    // General details
    // public int $id;
	// public string $title;
	// public string $category;
	// public DateTime $datetime_begin;
	// public DateTime $datetime_end;
	// public string $description;
	// public string $image_url;
	// public string $location;
    // public string $status;
	// public string $open_to;
    
    // Sponsor details
	// public string $sponsor_name;
	// public string $sponsor_email;
	// public string $sponsor_phone;
    
    // Ownership
    // public int $organizer_id;
	
	// Timekeeping
	// public DateTime $created_at;
	// public DateTime $updated_at;
	
	public function __construct(int $id, string $title, string $category, DateTime $datetime_begin, DateTime $datetime_end, 
							    string $sponsor_name, string $sponsor_email, string $sponsor_phone) {
		$this->id = $id;
		$this->title = $title;
		$this->category = $category;
		$this->datetime_begin = $datetime_begin;
		$this->datetime_end = $datetime_end;
		$this->sponsor_name = $sponsor_name;
		$this->sponsor_email = $sponsor_email;
		$this->sponsor_phone = $sponsor_phone;
	}

}