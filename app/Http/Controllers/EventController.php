<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventCollection as EventResource;
use App\Http\Resources\Event as EventResource1;

class EventController extends Controller
{

    public function index()
    {

        $events = Event::orderBy('id', 'asc')->paginate(20);
        // return EventResource1::collection($events);
        return new  EventResource($events);
    }


   public function erase()
   {
       $events = Event::all();
        foreach( $events as $event)
        {
            $event->delete();
        }
        return response()->json(null, 200);
   }


    public function store(Request $request)
    {
        $this->validate($request,[
            'type' =>'required|string',
            'user_id' => 'required',
            'repo_id' => 'required',
        ]);

        /** to check if request id already exist in db */
        $eventsId = Event::all();
        foreach( $eventsId as $eventid)
        {
            if( $eventid->id == $request->id)
            {
                return response()->json(['error' => 'This id aleady exist in database'], 400 );
            }
        }
        /** end of check */

        $event = new Event;
        $event->type = $request->type;
        $event->user_id = $request->user_id;
        $event->repo_id = $request->repo_id;

        if( $event->save() )
        {
            return (new EventResource1($event))
            ->response()
           ->setStatusCode(201);
        }

    }

    public function actor($actor_id)
    {
        $events = Event::where('user_id',$actor_id)->orderBy('id', 'asc')->get();//paginate(20);

        if ( isset($events) ){
            return (EventResource1::collection($events))
                ->response()
                ->setStatusCode(201);
        }
        else{
            return response()->json(['message' => 'Not found'], 404 );
            //  return response()->json(['error' => 'Not found'], 404);
        }
    }






    public function update(Request $request, Event $event)
    {
        $this->validate($request,[
            'type' =>'required|string',
            'user_id' => 'required',
            'repo_id' => 'required',
        ]);

        if( $request->user()->id !== $event->id)
        {
            return response()->json(['error' => 'You can only edit your own events'], 403);
        }

        $event->update( $request->only(['type', 'user_id', 'repo_id']));

        return new EventResource1($event);
    }

    public function destroy(Event $event)
    {
        //
    }
}






