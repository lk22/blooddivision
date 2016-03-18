<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Blooddivision\User;
use Carbon\Carbon;

class Event extends Model implements SluggableInterface
{

	/**
	* use the sluggable trait
	*/

	use SluggableTrait;

    /**
    * tell the model wich database table to use	
    *
    * @var $table
    */

        protected $table = 'events';

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
            'event_datetime',       // the event date and time
        	'user_id'				// the specific user that has added the event 
        ];

        protected $guarded = ['user_id'];

    /**
    * set event dates property
    * @var $dates = [] 
    */

        protected $dates = ['event_datetime'];

    /**
    *	Events belongs to relationship on user
    *	@return void
    */
   
        public function user(){
            return $this->belongsTo('Blooddivision\User');
        }

    /**
     * one to many relationship with user
     * @return [type] [description]
     */
    
        public function users(){
            return $this->belongsToMany('Blooddivision\User');
        }

    /**
     * order field by a particullar order
     * @param  [type] $field [description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    
        public function scopeOrderFieldByOrder($field = null, $order, $query){
            return $query->orderBy($field, $order);
        }

    /**
     * get all completed events
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    
        public function scopeCompleted($query){
            return $query->where('completed', 1);
        }

    /**
     * get all archived events
     *
     * @param      <type>  $query  (description)
     *
     * @return     <type>
     */
    
        public function scopeArchived($query){
            return $query->where('archived', 1);
        }


    /**
     * scopeWhereUserIsAuthorized description
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    
        public function scopeWhereUserIsAuthorized($query){
            return $query->where('id', auth()->user()->id);
        }
    
}
