<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\isNull;
use \Carbon\Carbon;

class todoController extends Controller
{

    public function showTaskPage()
    {
        return view('add-task-page');
    }
    public function addNewTask(Request $request)
    {
        $validatedData = $request->validate([
            'taskTitle'=> 'required|max:100',
            'taskDescription'=>'nullable',
            'startDate'=>'required|date',
            'endDate'=> 'required|date|after_or_equal:startDate',
        ]);
        $task = new Todo();
        $task->title = $validatedData['taskTitle'];
        $task->description =$validatedData['taskDescription'];
        $task->startDate=$validatedData['startDate'];
        $task->endDate=$validatedData['endDate'];
        $daysRemaining = Carbon::parse($task->end_date)->diffInDays(Carbon::now());

    if ($daysRemaining <= 3) {
        $task->status = 'Ending Soon';
    } else {
        $task->status = 'Active';
    }
        $task->save();

        return redirect('/newtask')->with('success','Task has created successfully');
    
    }
    public function viewAllTask()
    {
        $task = Todo::all();
        $data = compact('task');
        return view('view-task-page')->with($data);
    }

    public function showEditPage($id)
    {
        $task = Todo::findOrFail($id);
        return view('edit-task-page', ['task'=>$task]);
    }

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'taskTitle'=> 'required|max:100',
            'taskDescription'=>'nullable',
            'startDate'=>'required|date',
            'endDate'=> 'required|date|after_or_equal:startDate',
        ]);
        $task = Todo::findOrFail($id);
        $task->title = $validatedData['taskTitle'];
        $task->description =$validatedData['taskDescription'];
        $task->startDate=$validatedData['startDate'];
        $task->endDate=$validatedData['endDate'];
        $daysRemaining = Carbon::parse($task->end_date)->diffInDays(Carbon::now());

        if ($daysRemaining <= 3) {
        $task->status = 'Ending Soon';
        } else {
        $task->status = 'Active';
        }
        $task->update();

        return redirect('/alltask')->with('Success','Data Updated Successfully');

    }
    public function deleteTask($id)
    {
        $task = Todo::find($id);
        if(!is_null($task))
        {
            $task->delete();
        }
        return redirect('/alltask')->with('success', 'Task has been deleted successfully');
    }
}
