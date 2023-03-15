<?php

namespace App\Http\Controllers;

use App\Models\meetings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MeetingController extends Controller
{
    public function add()
    {
        $users = User::where('user_type', 1)->get();
        return view('add', compact('users'));
    }


    // adding new data into the database 
    public function adding_data(Request $request)
    {
        $attendee = new meetings();
        $attendee->attendees_one_id = $request['attendee_one_id'];
        $attendee->attendees_two_id = $request['attendee_two_id'];
        $attendee->meeting_time = $request['datetime'];
        $attendee->save();
        return back();
    }


    // getting all data from the database 

    public function all_data(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $alldata = meetings::where('meeting_time', 'LIKE', "%$search%")->orwhere('location', 'LIKE', "%$search%")->paginate(5);
        } else {
            $alldata = meetings::orderBy('id', 'asc')->paginate(3);
        }

        // $allclasses = SchoolClass::all();
        $data = compact('alldata', 'search');
        return view('all-data')->with($data);
    }


    // deleting data 
    public function delete_data($id)
    {
        $singleData = meetings::find($id);
        $singleData->delete();
        return back();
    }



    // update data 


    public function edit_data($id, Request $request)
    {
        $meeting = meetings::find($id);
        $users = User::where('user_type', 1)->get();
        return view('singledata', compact('users', 'meeting'));
    }

    public function update_data($id, Request $request)
    {
        $attendee = meetings::find($id);

        $attendee->attendees_one_id = $request['attendee_one_id'];
        $attendee->attendees_two_id = $request['attendee_two_id'];
        $attendee->meeting_time = $request['datetime'];
        $attendee->save();
        return redirect('all-data');
    }
}
