<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Events;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Events::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('full-calender');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$events = Events::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($events);
    		}

    		if($request->type == 'update')
    		{
    			$events = Events::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($events);
    		}

    		if($request->type == 'delete')
    		{
    			$events = Events::find($request->id)->delete();

    			return response()->json($events);
    		}
    	}
    }
}
?>
