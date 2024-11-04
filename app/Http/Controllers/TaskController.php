<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(CreateTaskRequest $request){
        $response = array();
        $validate = $request->validated();
        $createtask = Tasks::create($validate);
        if ($createtask) {
            $response['message'] = "Tasks Created Successfully";
            $response['status']="success";
        } else {
            $response['message'] = "Tasks Cannot be created at the moment";
            $response['status']="failed";
        }
        return new TaskResource($response);
    }

    public function view(){
        $response = array();
        $recordview = Tasks::get();
        if($recordview->isEmpty()){
            $response['message'] = "No Record Available at the moment";
            $response['status']="failed";
        }else{
            $response['message'] = $recordview;
            $response['status']="success";
        }
        return new TaskResource($response);
    } 
    public function Edit($id){
        $response = array();
        $taskRecord = Tasks::where('id', $id)->first();
       // dd($taskRecord);
        if($taskRecord){
            $response['message'] = $taskRecord;
            $response['status'] = "success";
        }else{
            $response['message'] = "Record Not Available at the moment";
            $response['status'] = "failed";
        }
        return new TaskResource($response);
    }
    public function update(CreateTaskRequest $request , $id){
        $response = array();
        $validate = $request->validated();
        $taskRecord = Tasks::where('id', $id)->update([
            'username'=> $validate['username'],
            'name'=> $validate['name'],
            'task_desc'=> $validate['task_desc'],
        ]);

        if( $taskRecord ){
            $response['message'] = $this->view();
            $response['status'] = "success";
        }else{
            $response['message'] = "Record cannot be update at the moment";
            $response['status'] = "failed";
        }
        return new TaskResource($response);
    }


    public function destory($id){
        $response = array();
        
        $record = Tasks::where('id', $id)->delete();

        if(!$record){
            $response['message'] = "Task cannot be deleted at the moment";
            $response['status'] = "failed";
        }else{
            $response['message'] =  $this->view();
            $response['status'] = "success";
        }
        return new TaskResource($response);
    }
}