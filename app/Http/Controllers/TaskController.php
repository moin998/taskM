<?php

namespace App\Http\Controllers;

use App\Enums\StatusType;
use App\Models\Category;
use App\Models\Task;
use BenSampo\Enum\Rules\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tasks']= Task::where('created_by',Auth::id())->get();
        return view('tasks.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::where('created_by',Auth::id())->get();
        $status_list= StatusType::asSelectArray();
        return view('tasks.create',compact('categories','status_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'category_id'=>'required',
            'status'=> 'required',
            'deadline'=>'date|nullable'
        ]);
        $task = new Task();
        $task->title=$request->title;
        $task->description= $request->description;
        $task->category_id=$request->category_id;
        $task->created_by=Auth::id();
        $task->deadline=$request->deadline;
        $task->save();
        return redirect('/tasks');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['task']= Task::where('created_by',Auth::id())->find($id);
        $data['categories']= Category::where('created_by',Auth::id())->get();
        $data['status_list']= StatusType::asSelectArray();
        return view('tasks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'category_id'=>'required',
            'status'=> 'required',
            'deadline'=>'date|nullable'
        ]);
        $task = Task::find($id);
        $task->title=$request->title;
        $task->description= $request->description;
        $task->category_id=$request->category_id;
        $task->status= $request->status;
        $task->deadline=$request->deadline;
        $task->save();
        return redirect('/tasks');

   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::where('created_by',Auth::id())->find($id);
        $task->delete();
        return redirect('/tasks');
    }
}
