<?php

class Event
{
    // General details
    public $id;
	public $title;
	public $category;
    public $department;
	public $datetime;
	public $short_desc;
	public $long_desc;
	public $image_url;
	public $location;
    public $status;
    
    // Sponsor details
	public $email;
	public $phone;
	public $open_to;
    
    // Ownership
    public $organizer_id;
	
	// Timekeeping
	public $created_at;
	public $updated_at;
}