<?php

namespace App\Http\Controllers\Teach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TeachController extends Controller
{
    public function registerTeacher(){
		try{
          return view('teach-register');
		}catch (Exception $ex) {
            throw $ex;
        }
	}
        
     public function addTeacher(Request $request){
         
         
          $validate = Validator::make($request->input(), [
                // 'first-name' => 'required|max:255',
                // 'last-name' => 'required|max:255',
           ]);
          if ($validate->fails()){
              return json_encode(array('success'=>false, 'message'=>$validate->errors()->first()));
          }
          $param = $request->input();
          $teachHandler = new \App\Handlers\TeachHandler();
          $teachHandler->storeTeacher($param);
         
        return json_encode(array('success'=>true, 'message'=>'Your Registration is successfully'));
         
     }
     
     public function profile(){
         try{
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
             $data = $teachHandler->getProfile($id);
             return view('profile', compact('data'));
         } catch (Exception $ex) {
            throw $ex;
         }
     }
     
     public function logout(){
         try{
            Auth::logout();
            return redirect('login');
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     public function getCalendar(){
         try{
            return view('calendar'); 
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     public function getStudent(){
         try{
            $teachHandler = new \App\Handlers\TeachHandler();
            $data = $teachHandler->getStudent();
            return view('student', compact('data'));
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     public function getAttendance(){
         try{
            return view('attendance'); 
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     public function getMyPayment(){
         try{
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
            $data = $teachHandler->getPayment($id);
            return view('my-payment', compact('data')); 
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     
     public function addAtendance(Request $request){
         try{
             $validate = Validator::make($request->input(), [
                 'group' => 'required|string|max:10',
                 'class_date' => 'date_format:m/d/y|after:today',
           ]);
          if ($validate->fails()){
              return json_encode(array('success'=>false, 'message'=>$validate->errors()->first()));
          }
          $classDate = $request->input('class-date');
          $groupName = $request->input('group');
          $teachHandler = new \App\Handlers\TeachHandler();
          $data['data'] = $teachHandler->getStudent();
          $data['class_date'] = $classDate;
          $data['group_name'] = $groupName;
          return view('add-attendance', compact('data'));
         } catch (Exception $ex) {
            throw $ex;
         }
     }
     
     public function updateProfile(Request $request){
         try{
             $param = $request->input();
             $teachHandler = new \App\Handlers\TeachHandler();
             $status = $teachHandler->updateProfile($param);
             if($status){
               return json_encode(array('success'=>true, 'message'=>'Successfully updated profile')); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Profile update fail')); 
             }
             
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
      public function uploadProfile(Request $request){
         try{
             $param = $request->input();
             $imagePath = $request->input('image_path');
             $extension = $imagePath->getClientOriginalExtension();
             echo $extension;
             die();
             $destinationPath = public_path('/storage');
             $request->file('image_path')->move($destinationPath, '1.png');
             die('uu');
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
             $status = $teachHandler->uploadProfile($id, $imagePath);
             if($status){
               return json_encode(array('success'=>true, 'message'=>'Successfully updated profile')); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Profile update fail')); 
             }
             
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
     public function addEvent(Request $request){
         try{
             $param = $request->input();
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
             $status = $teachHandler->addEvent($id, $param);
             if($status){
               return json_encode(array('success'=>true, 'message'=>'Successfully added event')); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Event add fail'));
             }
             
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
      public function getEvent(Request $request){
         try{
             $param = $request->input();
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
             $events = $teachHandler->getEvent($id, $param);
             $newEvents = array();
             foreach($events as $event){
                 $newEvents[] = array('id'=>$event['id'], 'name'=>$event['name'], 'date'=>$event['date'], 'type'=>$event['type'], 'everyYear'=>true);
             }
             if($events){
               return json_encode(array('success'=>true, 'data'=>$newEvents)); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Event get fail'));
             }
             
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
      public function getEventList(Request $request){
         try{
             $param = $request->input();
             $user = auth()->user();
             $id = $user->id;
             $teachHandler = new \App\Handlers\TeachHandler();
             $events = $teachHandler->getEvent($id, $param);
             $newEvents = array();
             foreach($events as $event){
                 $newEvents[] = array('id'=>$event['id'], 'name'=>$event['name'], 'date'=>$event['date'], 'type'=>$event['type'], 'everyYear'=>true, 'group_name'=>$event['groups']['name']);
             }
             if($events){
               return json_encode(array('success'=>true, 'data'=>$newEvents)); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Event get fail'));
             }
             
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
     
     public function markAttendance(Request $request){
         try{
             $user = auth()->user();
             $id = $user->id;
             $param = $request->input();
             $teachHandler = new \App\Handlers\TeachHandler();
             $addAtt = $teachHandler->markAttendanceList($param, $id);
             if($addAtt){
               return json_encode(array('success'=>true, 'message'=>'Successfully added attendance')); 
             }else{
                 return json_encode(array('success'=>false, 'message'=>'Attendance add fail'));
             }
         }catch (Exception $ex) {
            throw $ex;
         }
     }
     
     public function viewAttendance(){
         try{
            $user = auth()->user();
            $id = $user->id;
            $teachHandler = new \App\Handlers\TeachHandler();
            $data = $teachHandler->viewAttendanceList($id);
            return view('attendance_viewer',compact('data')); 
         } catch (Exception $ex) {
            throw $ex;
         }
     }
}
