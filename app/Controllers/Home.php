<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\AdmissionModel;
use App\Models\ResultModel;
use App\Models\MarksModel;
class Home extends BaseController
{
    public function index(): string
    {
        $data['title']='Verify Marksheet';
        return view('index',$data);
    }
     public function adminlogin(): string
    {
        $data['title']='Verify Marksheet';
        return view('adminlogin',$data);
    }
   
    public function result($id): string
     {
        $data['title']='Result';
        $stumodel = new StudentModel();
        $admissionmodel = new AdmissionModel();
        $resultmodel = new ResultModel();
        $marksmodel=new MarksModel();
        $stu = $stumodel->where('ID', $id)            
            ->first();
        $data['stu']=$stu;
         $admisssion= $admissionmodel
            ->select('admission.*, coursemaster.CName,coursemaster.Duration')
            ->join('coursemaster', 'coursemaster.ID = admission.CourseID', 'left')
            ->where('admission.StuID', $id)
            ->first();
        $data['admission']= $admisssion;

        $resultid = $resultmodel->where('AdmissionID ', $admisssion['ID'])->orderBy('ID', 'DESC')->first();
        $data['result'] = $resultid;  
        $data['marks']= $marksmodel->where('ResultID ', $resultid['ID'])->orderBy('Sequence', 'ASC')->findAll();
        
        //Date Completion
        $startDate = $stu['AdmissionDate'];
        $months = $admisssion['Duration']; 
        $endDate = date('Y-m-d', strtotime("+$months months", strtotime($startDate)));
        $data['EndDate'] = $endDate;

        // Grand Total
        $grandMaxMarks = 0;
        $grandObtainMarks = 0;        
        $resultid = $resultmodel->where('AdmissionID ', $admisssion['ID'])->findAll();
        foreach ($resultid as $row) {
            $totals = $marksmodel
                ->select('SUM(MaxMark + MaxPracMark) as totmaxmarks, SUM(ObtainMark + MaxObtainMark) as totobtainmarks')
                ->where('ResultID', $row['ID'])
                ->first();

            // Add into grand total
            $grandMaxMarks += $totals['totmaxmarks'] ?? 0;
            $grandObtainMarks += $totals['totobtainmarks'] ?? 0;
            
        }
        $data['MaxMarks']= $grandMaxMarks;
        $data['ObtainMarks']= $grandObtainMarks;
        
        return view('resultuser',$data);
    }
    public function getmarksheet() : string
    {
          $data['title']='Result';
        $regno = $this->request->getPost('RegNo');
        $dob   = $this->request->getPost('DOB');

        $model = new StudentModel();
        $admissionmodel=new AdmissionModel();
        $resultmodel=new ResultModel();
        $markstmodel=new MarksModel();
        $student = $model->where('RegNo', $regno)
                        ->where('DOB', $dob)
                        ->first();
                       
        if($student!== null)
        {
            if($student['IsResult']=="1" && $student['IsFeePaid'] == "1") 
            {
            
                $data['stu']=$student;
                $admisssion = $admissionmodel
                ->select('admission.*, coursemaster.CName')
                ->join('coursemaster', 'coursemaster.ID = admission.CourseID', 'left')
                ->where('admission.StuID', $student['ID'])
                ->first();
                if(!empty($admisssion)) 
                {
                    $data['admission']=$admisssion;
                    echo "admission";
                    $resultid= $resultmodel->where('AdmissionID ',$admisssion['ID'])->first();    
                    if($resultid)
                    {
                        $data['result']=$resultid;
                        echo "-result-";
                        $mark=$markstmodel->where('ResultID ',$resultid['ID'])->findAll();     
                        if($mark)
                            {
                            $data['resultstatus'] = 'rfound';
                            }
                    }
                    
                } 
                else
                {
                    $data['resultstatus']= 'rnotfound';
                }
            }
            else{
                if($student['IsResult'] == "0")
                    $data['resultstatus'] = 'rnoteligible';
                else if ($student['IsFeePaid'] == "0")
                    $data['resultstatus'] = 'rfee';
            }    
        }
        else{
            $data['resultstatus'] = 'rinvalidstu';
        }         
        
       

         return view('resultindex',$data);
    }
}