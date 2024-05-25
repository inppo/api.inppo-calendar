<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventAddRequest;
use App\Http\Requests\EventEditRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Exception;
class EventController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Event::query();
		if($request->search){
			$search = trim($request->search);
			Event::search($query, $search);
		}
		$orderby = $request->orderby ?? "event.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Event::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Event::query();
		$record = $query->findOrFail($rec_id, Event::viewFields());
		$this->afterView($rec_id, $record);
		return $this->respond($record);
	}
    /**
     * After view page record
     * @param string $rec_id // record id to be selected
     * @param object $record // selected page record
     */
    private function afterView($rec_id, $record){
        //enter statement here
        $color = $record["color"];
        $record["color"] = $color == "red" ? "Urgent" : 
        ($color == "orange" ? "Important" : "Normal");
    }
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(EventAddRequest $request){
		$modeldata = $request->validated();
		
		//save Event record
		$date = date('Y-m-d 00:00:00',strtotime("+1 day",strtotime($modeldata["start"])));
		$modeldata["start"] = $date;

		$date = date('Y-m-d 23:00:00',strtotime("+1 day",strtotime($modeldata["end"])));
		$modeldata["end"] = $date;

		$record = Event::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(EventEditRequest $request, $rec_id = null){
		$query = Event::query();
		$record = $query->findOrFail($rec_id, Event::editFields());

		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$date = date('Y-m-d 00:00:00', strtotime("+1 day",strtotime($modeldata["start"])));
			$modeldata["start"] = $date;
			
			$date = date('Y-m-d 23:00:00', strtotime($modeldata["end"]));
			
			if ($record["end"] != $date) {
				$date = date('Y-m-d 23:00:00', strtotime("+1 day",strtotime($modeldata["end"])));
				$modeldata["end"] = $date;	
			}

			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Event::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
