<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Event extends Model implements SluggableInterface
{

	/**
	* use the sluggable trait
	*/

	use SluggableTrait;

    /**
    *   use the SoftDeletes trait
    */

    use SoftDeletes;

    /**
    * tell the model wich database table to use	
    *
    * @var $table
    */

    protected $table = ['events'];

    protected $sluggable = [
        'build_from' => 'event_name',
        'save_to'    => 'slug',
    ];

    /**
    * tell the model wich data fields can contain data
    *
    * @var $fillable
    * @return array
    */

    protected $fillable = [
    	'event_name',			// the event name
    	'event_game',			// the event game
    	'event_description',	// the event description
        'event_datetime',
    	'user_id'				// the specific user that has added the event 
    ];

    /**
    * set event dates property
    * @var $dates = [] 
    */

    protected $dates = ['event_date' ];

    /**
    *	Events belongs to relationship on users
    *
    *	@return void
    */

    public function user(){
    	return $this->belongsTo(User::class);
    }

    /**
    *   format the event date to the current day
    *   @return void
    */

    public function setEventDateAttribute($date){
        //$this->attributes['event_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function setCreatedAtAttribute($date){
        // $this->attributes['creeated_at'] = Carbon::createFromFormat('d-m-Y', $date);
    }

    /**
    *   Format the event time to the setted time of the event to start
    *   @return void
    */

    public function setEventStartTimeAttribute($date){
        // $this->attributes['event_start_time'] = Carbon::createFromFormat('H-m-s', $date);
    }

    public function setEventEndTimeAttribute($date){
        // $this->attributes['event_end_time'] = Carbon::createFromFormat("H-m-s", $date);
    }
}
