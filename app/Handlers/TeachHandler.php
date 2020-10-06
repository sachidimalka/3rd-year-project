<?php

namespace App\Handlers;

//use Illuminate\Support\Facades\Config;
//use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\View;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\MessageCenter;
//use Carbon\Carbon;
//use Exception;
//use Log;
//use Illuminate\Support\Facades\Storage;
use Hash;

class TeachHandler {

    public function storeTeacher($data) {
        try {

            $user = new \App\Model\Users();
            $user->name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->address = $data['address'];
            $user->gender = $data['gender'];
            $user->state = $data['state'];
            $user->city = $data['city'];
            $user->birth_date = $data['birth_date'];
            $user->course = $data['course'];
            $user->contact_number = $data['contact_number'];
            $user->experience_period = $data['period'];
            $user->organization_address = $data['organization_address'];
            $user->designation = $data['designation'];
            $user->personal_achievements = $data['personal_achievements'];
            $user->description = $data['description'];
            $user->document = isset($data['document']) ? $data['document'] : Null;
            if ($user->save()) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getProfile($id) {
        try {
            $user = \App\Model\Users::where([['id', $id]])->first();
            $userData = $user->toArray();
            return $userData;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getStudent() {
        try {
            $students = \App\Model\Student::with('groups')->get();
            return $students->toArray();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function updateProfile($data) {
        try {
            $user = \App\Model\Users::where([['id', $data['hidden_id']]])->first();
            if ($user) {
                $user->name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->email = $data['email'];
                $user->address = $data['address'];
                // $user->gender = $data['gender'];
                $user->state = $data['state'];
                $user->city = $data['city'];
                $user->birth_date = $data['birth_date'];
                //$user->course = $data['course'];
                $user->contact_number = $data['contact_number'];
                $user->experience_period = $data['experience_period'];
                $user->organization_address = $data['organization_address'];
                $user->designation = $data['designation'];
                //$user->personal_achievements = $data['personal_achievements'];
                $user->designation = $data['designation'];
                if ($user->save()) {
                    return true;
                }
            }
            return false;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getPayment($id) {
        try {
            $students = \App\Model\Payment::where('teacher_id', $id)->get();
            return $students->toArray();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function uploadProfile($id, $imagePath) {
        try {
                $image = $imagePath;
               // $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage');
                copy($image, $destinationPath);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function addEvent($id, $param){
        try{
           $event = new \App\Model\Event();
            $event->id = uniqid();
            $event->name = $param['event-name'];
            $event->type = $param['event-type'];
            $event->date = $param['event-date'];
            $event->student_group = $param['group'];
            $event->teacher_id = $id;
            if ($event->save()) {
                return true;
            }
            return false; 
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function getEvent($id, $param){
        try{
           $events = \App\Model\Event::where('teacher_id', $id)->with('groups')->get();
           return $events->toArray();
        } catch (Exception $ex) {
          throw $ex;
        }
    }
    
    public function markAttendanceList($param, $id){
        try{
            $date = $param['date'];
            $group = $param['group'];
            $existsCount = \App\Model\Attendance::where([['date', $date], ['group_id', $group]])->count();
            if($existsCount == 0){
            unset($param['date']);
            unset($param['group']);
            unset($param['_token']);
            unset($param['emp_list_length']);
            
            foreach($param as $studentId=>$attendance){
                $att = new \App\Model\Attendance();
                $att->id = uniqid();
                $att->student_id = $studentId;
                $att->group_id = $group;
                $att->teacher_id = $id;
                $att->date = $date;
                $att->attendance = $attendance;
                 if (!$att->save()) {
                     return false;
                 }else{
                     echo $studentId."\n";
                 }
                 
            }
            return true; 
          }else{
              return false;
          }
        }catch (Exception $ex) {
          throw $ex;
        }
    }
    
    public function viewAttendanceList($id){
        try{
           $attendance = \App\Model\Attendance::where('teacher_id', $id)->with('student')->get(); 
           $dataArray = $attendance->toArray();
           $result = array();
           foreach($dataArray as $data){
               $result[$data['date']][] = $data;
           }
           $column = array('Name');
           $nameResult = array();
           ksort($result);
           foreach($result as $date=>$values){
               $column[] = $date;
              // $names = array_column($value, 'student_id');
               foreach($values as $value){
                   $nameResult[$value['student']['first_name'].' '.$value['student']['last_name']][] = $value;
               }
               
           }
           $finalData = array($column);
           foreach($nameResult as $name=>$dateData){
              $studentDates = array_column($dateData, 'date');
              $studentAttendance= array_column($dateData, 'attendance');
              $studentData = array_combine ($studentDates , $studentAttendance);
              $row =  array('Name'=>$name);
              foreach($column as $key => $columnData){
                  if($key != 0){
                      if(isset($studentData[$columnData])){
                       $row[$columnData]= $studentData[$columnData];
                      }else{
                         $row[$columnData] = 'Absence'; 
                      }
                  } 
              }
              $finalData[] = array_values($row);
           }
           return $finalData;
           
        }catch (Exception $ex) {
          throw $ex;
        }
    }

}
