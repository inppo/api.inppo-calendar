<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	
	/**
     * role_id_option_list Model Action
     * @return array
     */
	function role_id_option_list(Request $request){
		$sqltext = "SELECT role_id as value, role_name as label FROM roles";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	/**
     * check if username value already exist in User
	 * @param string $value
     * @return bool
     */
	function user_username_exist(Request $request, $value){
		$exist = DB::table('user')->where('username', $value)->value('username');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * check if email_address value already exist in User
	 * @param string $value
     * @return bool
     */
	function user_email_address_exist(Request $request, $value){
		$exist = DB::table('user')->where('email_address', $value)->value('email_address');   
		if($exist){
			return "true";
		}
		return "false";
	}
}
