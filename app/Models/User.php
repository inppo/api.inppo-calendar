<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'user';
	

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
	protected $fillable = ["username","password","contact_number","email_address","full_name","user_role_id","profile_photo"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				username LIKE ?  OR 
				contact_number LIKE ?  OR 
				email_address LIKE ?  OR 
				full_name LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"full_name", 
			"user_role_id", 
			"profile_photo" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"email_address", 
			"full_name", 
			"user_role_id", 
			"email_verified_at", 
			"profile_photo" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id", 
			"username", 
			"contact_number", 
			"full_name", 
			"user_role_id", 
			"profile_photo" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
