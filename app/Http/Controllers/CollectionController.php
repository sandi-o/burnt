<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();

        if(isset(request()->per_page) && isset(request()->sort_by) && isset(request()->sort_desc)) {
            $perPage = request()->per_page ??10;
            $sortBy = request()->sort_by ?? 'created_at';
            $sortDesc = request()->sort_desc =='true' ? 'desc':'asc';
    
            $collections = Collection::orderBy($sortBy,$sortDesc)->paginate($perPage);
        }       

        return response()->json($collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|min:1|max:190']);

        $attributes['name'] = $request->name;
        $attributes['created_by'] = auth()->id();

        $collection = Collection::create($attributes);

        if($collection && !empty($request->items)) {
            foreach(json_decode($request->items) as $item){                
                $collection->addItem(['restaurant_id'=>$item]);
            }
        }

        return response()->json(['result' =>$collection,'message'=>'Collection successfully CREATED with name: '. $collection->name],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Collection $collection, Request $request)
    {
        $attributes['name'] = $request->name;
               
        $result = $collection->update($attributes);

        return response()->json(['result'=> $result, 'message'=>'Collection successfully updated with name #: '.$collection->name], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {       
        $result = $collection->delete();
        return response()->json(['result'=> $result,'message'=>'Collection  successfully DELETED with name #: '.$collection->name], 200);
    }
}
