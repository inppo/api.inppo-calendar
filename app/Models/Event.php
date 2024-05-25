<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Event extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'event';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["title","description","start","end","docs","color"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				title LIKE ?  OR 
				description LIKE ?  OR 
				color LIKE ?  OR 
				docs LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"start", 
			"end", 
			"title", 
			"description", 
			"color", 
			"docs", 
			"id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"start", 
			"end", 
			"title", 
			"description", 
			"color", 
			"docs", 
			"id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			DB::raw("if (event.start = event.end, date_format(event.start, '%M %d %Y'),
if (month(event.start) = month(event.end), 
CONCAT(date_format(event.start, '%M %d'), ' to ', date_format(event.end, '%d %Y')), 
CONCAT(date_format(event.start, '%M %d %Y'), ' to ', date_format(event.end, '%M %d %Y')))) AS duration"), 
			"title", 
			"description", 
			"color", 
			"docs", 
			"id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			DB::raw("if (event.start = event.end, date_format(event.start, '%M %d %Y'),
if (month(event.start) = month(event.end), 
CONCAT(date_format(event.start, '%M %d'), ' to ', date_format(event.end, '%d %Y')), 
CONCAT(date_format(event.start, '%M %d %Y'), ' to ', date_format(event.end, '%M %d %Y')))) AS duration"), 
			"title", 
			"description", 
			"color", 
			"docs", 
			"id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"title", 
			"description", 
			"start", 
			"end", 
			"docs", 
			"color", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
