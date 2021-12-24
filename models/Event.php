<?php

class Event
{
    // General details
    public int $id;
	public string $title;
	public string $category;
	public DateTime $datetime_begin;
	public DateTime $datetime_end;
	public string $description;
	public string $image_url;
	public string $location;
    public string $status;
    
    // Sponsor details
	public string $sponder;
	public string $email;
	public string $phone;
	public string $open_to;
    
    // Ownership
    public int $organizer_id;
	
	// Timekeeping
	public DateTime $created_at;
	public DateTime $updated_at;
}