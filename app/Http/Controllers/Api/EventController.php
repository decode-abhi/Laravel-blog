<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::paginate(2);
        return response()->json($event,201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ],[
            'title.required' => 'title is required',
            'title.string' => 'invalid foramat',
            'title.max' => 'exceed maximum length',
            'description.string' => 'invalid foramat',
            
        ]);

        if($validator){
            $event = Event::create($validator);

            return response()->json($event,201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        if(!$event){
            return response()->json(['message' => 'events is not aviable'],404);
        }else{
            return response()->json($event,200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ],[
            'title.required' => 'title is required',
            'title.string' => 'invalid foramat',
            'title.max' => 'exceed maximum length',
            'description.string' => 'invalid foramat',
            
        ]);

        if($validator){
        $event = Event::findOrFail($id);
        $event->update($validator);
        return response()->json($event,201);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        if(!$event){
            return response()->json(['message' => 'events is not aviable'],404);
        }else{
            $event->delete();
            return response()->json(['event' => $event, 'message' => 'the event is deleted'],200);
        }
    }
}
