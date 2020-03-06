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
        return EventResource::collection($events);
    }


   public function erase()
   {
       $event = Event::all();
       if( $event->each->delete())
       {
           return (new EventResource())
           ->response()
           ->setStatusCode(200);
       }
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $events = Event::where('user_id',$actor_id)->orderBy('id', 'asc')->paginate(20);
        if( !$event ){
            return response()->json(['message' => 'Not found'], 404 );
        }else{

            return (EventResource::collection($events))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}







// $resource = new UserResource($user);
// return $resource->response()->setStatusCode(200);
