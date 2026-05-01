<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SubjectModel;
use App\Models\CourseModel;
use App\Models\StudentModel;
use App\Models\AdmissionModel;
use App\Models\ResultModel;
use App\Models\MarksModel;
class Admin extends BaseController
{
     public function index()
    {
        $data['title'] = 'Dashboard';                     
        return view('admin/index',$data);
    }
    public function courseindex()
    {
        $data['title'] = 'Course List';     
        $courseModel = new CourseModel();       
        $data['courses'] = $courseModel->orderBy('ID', 'DESC')->findAll(); 
        return view('admin/courseindex',$data);
    }
    public function courseadd()
    {
        $courseModel = new CourseModel();
        $id = $this->request->getGet('id');
        if ($id) {
            $data['course'] = $courseModel->find($id);
            $data['title'] = 'Edit Course';
        } else {
            $data['course'] = null;
            $data['title'] = 'Course Add 123';
        }       
        return view('admin/courseadd',$data);
    }
    public function coursesave()
    {
        $courseModel = new CourseModel();
        $id = $this->request->getPost('ID');
        // Simple validation
        if (!$this->validate([
            'CCode' => 'required',
            'CName' => 'required',
            'Duration' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Required fields missing');
        }
        // Get POST data
        $data = [            
            'CCode' => $this->request->getPost('CCode'),
            'CName' => $this->request->getPost('CName'),
            'Duration' => $this->request->getPost('Duration'),
            'IsFixSub' => $this->request->getPost('IsFixSub'),
            'RStatus' => $id ? $this->request->getPost('RStatus') : 1,
            'CreatedDate' => date('Y-m-d')
        ];
        if ($id) {
            // UPDATE
            $courseModel->update($id, $data);
            return redirect()->to('/courseindex')->with('success', 'Course updated successfully');
        } else {
            // INSERT 
            $last = $courseModel->selectMax('ID')->first();
            $newID = (!$last || $last['ID'] === null) ? 1 : $last['ID'] + 1;

            $data['ID'] = $newID;
            $data['CreatedDate'] = date('Y-m-d');

            $courseModel->insert($data);

            return redirect()->to('/courseindex')->with('success', 'Course saved successfully');
        }
       
    }
    public function subjectindex()
    {
        $data['title'] = 'Subject Index';     
        $courseModel = new CourseModel();       
        $data['courses'] = $courseModel->where('RStatus', 1)->where('IsFixSub', 1)->orderBy('ID', 'DESC')->findAll(); 
        return view('admin/subjectindex',$data);
    }
    public function subjectadd($id = null)
    {
        $courseModel = new CourseModel();
        $subjectModel = new SubjectModel();
        //$id = $this->request->getGet('id');
        $data['courses'] = $courseModel->where('RStatus', 1)->orderBy('ID', 'DESC')->findAll(); 
        if (isset($id)) {
            $data['subject'] = $subjectModel->find($id);
            $data['title'] = 'Edit Subject';
        } else {
           
            $data['title'] = 'Add Subject  ';
        }       
        return view('admin/subjectadd',$data);
    }

    public function subjectsave()
    {
        $subjectModel = new SubjectModel();

        $id = $this->request->getPost('ID');
        $data = [            
            'CID'      => $this->request->getPost('CID'),
            'SCode'    => $this->request->getPost('SCode'),
            'SName'    => $this->request->getPost('SName'),
            'Sem'    => $this->request->getPost('Sem'),
            'SeqNo'    => $this->request->getPost('SeqNo'),
            'MaxMark'  => $this->request->getPost('MaxMark'),
            'PassMark' => $this->request->getPost('PassMark'),
            'MaxPracMark' => $this->request->getPost('MaxPracMark'),
            'PassPracMark' => $this->request->getPost('PassPracMark'),
            'RStatus' => $this->request->getPost('RStatus')
        ];
        if (!empty($id)) {
//update
            $subjectModel->update($id, $data);

            return redirect()->to('/subjectindex')
                ->with('success', 'Subject updated successfully');
        } else {
            
            $lastRecord = $subjectModel->select('ID')->orderBy('ID', 'DESC')->first();
            $data['ID'] = ($lastRecord) ? $lastRecord['ID'] + 1 : 1;
            $data['RStatus']=1;
            $subjectModel->insert($data);

            return redirect()->to('/subjectindex')
                ->with('success', 'Subject saved successfully');
        }
        
    }
    public function getSubject()
    {
        $cid = $this->request->getPost('cid');

        $model = new SubjectModel();
        $subjects = $model->where('CID', $cid)->orderBy('SeqNo', 'ASC')->findAll();

        return $this->response->setJSON([
            'subjects' => $subjects,
            'token' => csrf_hash() // send new token for next request
        ]);
    }
    
     public function studentindex()
    {
        $data['title'] = 'Student Index';
        $studentModel = new StudentModel();

        $data['students'] = $studentModel
            ->orderBy('ID', 'DESC')
            ->findAll();
        return view('admin/studentindex', $data);
    }
      public function studentadd()
    {
        $data['title'] = 'Student Add';                     
        return view('admin/studentadd',$data);
    }
    public function studentsave()
{
    $studentModel = new StudentModel();
    $newRegNo="";
    $postedId = $this->request->getPost('ID');    
    $isEdit = !empty($postedId);    
    if (!$isEdit) {
        $last = $studentModel
                ->select('ID')
                ->orderBy('ID', 'DESC')
                ->first();
        $id = ($last) ? $last['ID'] + 1 : 1;
        $newRegNo = $studentModel->generateRegNo();
    } else {
        $id = $postedId;
        $newRegNo= $this->request->getPost('RegNo');
    }    
    $data = [
        'ID'          => $id,
        'RegNo'       => $this->request->getPost('RegNo'),
        'Name'        => $this->request->getPost('Name'),
        'FName'       => $this->request->getPost('FName'),
        'MName'       => $this->request->getPost('MName'),
        'Phone'       => $this->request->getPost('Phone'),
        'Whatsapp'    => $this->request->getPost('Whatsapp'),
        'Email'       => $this->request->getPost('Email'),
        'DOB'         => $this->request->getPost('DOB'),
        'Address'     => $this->request->getPost('Address'),
        'AdmissionDate'     => $this->request->getPost('AdmissionDate'),
        'CreatedDate' => $this->request->getPost('CreatedDate')
    ];
        if ($isEdit) {
            $data['IsResult'] = $this->request->getPost('IsResult') ? 1 : 0;
            $data['IsFeePaid'] = $this->request->getPost('IsFeePaid') ? 1 : 0;
        }
    // Photo upload
    $file = $this->request->getFile('Photo');

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $newName = $id . '.jpg';

        $file->move(WRITEPATH . 'upload/', $newName);

        $sourcePath = WRITEPATH . 'upload/' . $newName;
        $targetPath = FCPATH . 'upload/stupic/' . $newName;

        \Config\Services::image()
            ->withFile($sourcePath)
            ->fit(200, 250, 'center')
            ->save($targetPath);

        unlink($sourcePath);

        $data['Photo'] = $newName;
    }

    // Insert or Update
    if ($isEdit) {
        $studentModel->update($id, $data);
        return redirect()->to('/studentindex')
            ->with('success', 'Student Updated successfully');
    } else {
        $studentModel->insert($data);
        return redirect()->to('/studentindex')
            ->with('success', 'Student saved successfully');
    }
}
    public function studentedit($id)
    {
        $studentModel = new StudentModel();
        $data['title'] = 'Edit Student';
        $data['student'] = $studentModel->find($id);

        return view('admin/studentadd', $data); // same form used for add
    }
     public function admissionindex()
    {
        
        $data['title'] = 'Student Admssion';     
        
        return view('admin/admissionindex', $data); 
    }
    public function getsinglestu()
    {
        
        $rid = $this->request->getPost('RegNo');
        $data['RegNo']=$rid;
        $model = new StudentModel();
        $courseModel = new CourseModel();
        $AdmissionModel=new AdmissionModel();
        $student = $model->where('RegNo', $rid)->first();
        $data['student'] = $student;
         $data['title'] = 'Student Admssion';   
         $data['courses'] = $courseModel->findAll();
        //get admission list

        
        $db = \Config\Database::connect();
        $ac= $db->table('admission a')
            ->select('a.CreatedDate as admission_date, c.CName as course_name')
            ->join('coursemaster c', 'c.ID = a.CourseID')
            ->where('a.StuID', $student['ID'])
            ->get()
            ->getResultArray();
        if (!empty($ac)) {            
            $data['admission'] = $ac;
            $data['AdmissionFound']=1;
        } else {            
            $data['admission'] = [];
            $data['AdmissionFound'] = 0;
        }
           
          return view('admin/admissionindex', $data);
    }
    public function deladmission($RegNo)
    {
        $studentModel = new StudentModel();
        $stu= $studentModel->where('RegNo', $RegNo)->First();
        $admmodel = new AdmissionModel();
        $admission= $admmodel->where('StuID',$stu['ID'])->First();
        $resultmodel = new ResultModel();
        $result= $resultmodel->where('AdmissionID', $admission['ID'])->First();
        $markmodel=new MarksModel();
        $markmodel->where('ResultID', $result['ID'])->delete();
        $resultmodel->where('ID',$result['ID'])->delete();
        $admmodel->where('ID', $admission['ID'])->delete();

        return redirect()->to('/admissionindex')->with('success', 'Admission deleted successfully');
    }
    public function saveadmission()
    {
        $studentModel = new StudentModel();    
        $admission = new AdmissionModel();
        $regno = $this->request->getPost('StuID');
        $course_id = $this->request->getPost('CourseID');
        $student = $studentModel->where('RegNo', $regno)->first();
       
        $admission->insert([
            'StuID' => $student['ID'],
            'CourseID' => $course_id,
            'CreatedDate' => date('Y-m-d H:i:s')
        ]);

       return redirect()->to('admissionlist/'.$regno);
    }
    public function admissionlist($RegNo)
    {
        $studentModel = new StudentModel();   
        $builder = new AdmissionModel();
        $builder->select('admission.ID, s.RegNo, s.Name as StudentName, c.CName as CourseName,admission.CreatedDate');

        $builder->join('student s', 's.ID = admission.StuID'); // correct join
        $builder->join('coursemaster c', 'c.ID = admission.CourseID');

        $builder->where('s.RegNo', $RegNo);

        $data['admission']=$builder->findAll();
        $data['student']= $studentModel->where('RegNo', $RegNo)->First();
        $data['title'] = 'Admission List';
        $data['reg']=$RegNo;
        return view('admin/admissionlist', $data);
    }
     public function result()
    {
       
        $result = new ResultModel();

       
        $data['title'] = 'Result';
        return view('admin/result', $data);
    }


    public function resultsave()
    {
      
        $resultModel = new ResultModel();

        $admissionId = $this->request->getPost('AdmissionID');
        $sem         = $this->request->getPost('Sem');
        $Regno  = $this->request->getPost('RegNo');
        // Basic validation
        if ($admissionId=='' || $sem=='') {
            return redirect()->to('/admissionlist/' . $Regno)->with('error', 'All fields required');
        }

        $data = [
            'AdmissionID' => $admissionId,
            'Sem'         =>(int) $sem,
            'CreatedDate' => date('Y-m-d H:i:s')
        ];

        $resultModel->insert($data);

        return redirect()->to('/admissionlist/' . $Regno  )->with('success', 'Result saved successfully');
    }

    public function getResultList($admissionId,$RegNo)
    {
        $resultModel = new ResultModel();

        $results = $resultModel
            ->where('AdmissionID', $admissionId)
            ->orderBy('Sem', 'ASC')
            ->findAll();

        // Build HTML directly
        $html = "";

        if (!empty($results)) {

            $html .= '<table class="table table-bordered mt-3">';
            $html .= '<thead>
                    <tr>
                    <th>Action
                        <th>Semester</th>
                        <th>Created Date</th>
                    </tr>
                  </thead><tbody>';

            foreach ($results as $row) {
                $html .= '<tr>
                        <td>
                        <a href=' .   site_url('marksentry/' . $admissionId . '/' . $row['ID'])  .'><input type=\'button\' value=\'Add Marks\' class=\'btn btn-success\'> </a>
                       
                        </td>
                        <td><b>Sem ' . $row['Sem'] . '</b></td>
                        <td>' . $row['CreatedDate'] . '</td>' .
                        "<td><a href='" . site_url('delmarksentry/' . $row['ID']) . "/" . $RegNo . "' onclick=\"return confirm('Are you sure to delete this result')\" class=\"btn btn-danger\">Del</a></td>" .
                      '</tr>';
            }

            $html .= '</tbody></table>';
        } else {
            $html = '<p class="text-danger">No result found</p>';
        }

        return $html; // directly return HTML
    }
    public function marksentry($admissionId, $resultId)
    {
        $admissionModel = new AdmissionModel();
        $courseModel    = new CourseModel();
        $subjectModel   = new SubjectModel();
        $subjectModel   = new SubjectModel();
        $resultModel   = new ResultModel();
        $marksModel = new MarksModel();
         $oldmarks= $marksModel
                    ->where('ResultID', $resultId)
                    ->orderBy('Sequence','ASC')
                    ->findAll();
      
       
        // Get admission
        $admission = $admissionModel->find($admissionId);
        // Get Result
        $result = $resultModel->find($resultId);
        if (!$admission) {
            return "Admission not found";
        }

        // Get course
        $course = $courseModel->find($admission['CourseID']);

        $data = [
            'title'=>'Mark Entry',
            'admissionId' => $admissionId,
            'resultId'    => $resultId,
            'isFixSub'    => $course['IsFixSub'],
            'subjects'    => [],
            'marks' => $oldmarks
        ];

        // If fixed subject → load subjectmaster
        if ($course['IsFixSub'] == 1) {
            $data['subjects'] = $subjectModel
                ->where('CID', $admission['CourseID'])
                ->where('RStatus', 1)
                ->where('Sem',$result['Sem'])
                ->orderBy('SeqNo', 'ASC')
                ->findAll();
        }

        return view('admin/markentry', $data);
    }
    public function markssave()
    {
        $marksModel = new MarksModel();
        

        $resultId   = $this->request->getPost('ResultID');
        $subjects   = $this->request->getPost('subject');
        $maxmarks   = $this->request->getPost('maxmarks');
        $obtain     = $this->request->getPost('obtainmarks');

        $pracmaxmarks   = $this->request->getPost('pracmaxmarks');
        $pracobtain     = $this->request->getPost('pracobtainmarks');
        $sequence   = $this->request->getPost('sequence');
        $db = \Config\Database::connect();
        $db->transStart();

        // delete old marks
        $marksModel->where('ResultID', $resultId)->delete();
       
        // insert new
        for ($i = 0; $i < count($subjects); $i++) {
            if (empty($subjects[$i])) continue;
 
    
            $marksModel->insert([
                'ResultID'    => $resultId,
                'SubjectName' => $subjects[$i],
                'MaxMark'    => $maxmarks[$i],
                'ObtainMark' => $obtain[$i],
                 'MaxPracMark'    => $pracmaxmarks[$i],
                'MaxObtainMark' => $pracobtain[$i],
                'Sequence'    => $sequence[$i]
            ]);
            
        }

        $db->transComplete();

        return redirect()->back()->with('success', 'Marks saved successfully');
    }
    public function marksedit($resultId)
    {
        $marksModel = new MarksModel();

        $data['marks'] = $marksModel
            ->where('ResultID', $resultId)
            ->findAll();

        $data['resultId'] = $resultId;

        return view('admin/marksentry', $data); // same view used for add
    }
    public function admitcard()
    {
        $marksModel = new MarksModel();

        $data['title'] = "Admit Card";

        return view('admin/admitcard', $data); 
    }
    public function resultprint()
    {
        $marksModel = new MarksModel();

        $data['title'] = "Result Print";

        return view('admin/resultprint', $data); 
    }
    public function searchReg()
    {
        $stumodel = new StudentModel();
        $regNo = $this->request->getPost('RegNo');
        $db = \Config\Database::connect();

        $builder = $db->table('student s');
        $builder->select('r.ID as result_id, r.CreatedDate,,r.Sem, c.CName');
        $builder->join('admission a', 'a.StuID = s.ID');
        $builder->join('coursemaster c', 'c.ID = a.CourseID');
        $builder->join('result r', 'r.AdmissionID = a.ID', 'left');
        $builder->where('s.RegNo', $regNo);

        $query = $builder->get();
        $results  = $query->getResult();

        if ($results && count($results) > 0) {

            $html = '<div class="alert alert-success">';

            foreach ($results as $row) {

                if ($row->result_id) {

                    $url = site_url('marksheetadmin/' . $regNo . '/' .  esc($row->Sem) );

                    $html .= '
                <div style="margin-bottom:15px; padding-bottom:10px; border-bottom:1px solid #ddd;">
                    <p><strong>Course:</strong> ' . esc($row->CName) . '</p>
                    <p><strong>Semester</strong> ' . esc($row->Sem) . '</p>
                    <p><strong>Result Date:</strong> ' . date('d-m-Y', strtotime($row->CreatedDate)) . '</p>
                    
                    <a href="' . $url . '" class="btn btn-primary btn-sm">View Result</a>
                </div>
            ';
                }
            }


            $html .= '</div>';
            $html.= '<a href="' . site_url('diploma/' . $regNo) . '" class="btn btn-danger btn-sm">View Diploma</a>';

            // ⚠️ If no result_id found in any row
            if (strpos($html, 'View Result') === false) {
                $html = '
            <div class="alert alert-danger">
                Result not created
            </div>
        ';
            }
        } else {

            $html = '
        <div class="alert alert-danger">
            Student not found
        </div>
    ';
        }

        return $this->response->setBody($html);
        
    }
    public function getGrade($percentage) // calculate percentage lengend A,B,C etc
    {
        if ($percentage >= 85) {
            return 'S';
        } elseif ($percentage >= 75) {
            return 'A'; // assuming second S was typo → A
        } elseif ($percentage >= 65) {
            return 'B';
        } elseif ($percentage >= 55) {
            return 'C';
        } elseif ($percentage >= 50) {
            return 'D';
        } else {
            return 'Fail';
        }
    }
    public function marksheetadmin($regno,$sem) // show marksheet to Admin
    {
        $data['Sem']=$sem;
        $stumodel = new StudentModel();
        $admissionmodel = new AdmissionModel();
        $resultmodel = new ResultModel();
        $marksmodel = new MarksModel();

        $stu = $stumodel->where('RegNo ', $regno)
            ->first();
        $data['stu']=$stu;

        $admisssion = $admissionmodel
            ->select('admission.*, coursemaster.CName')
            ->join('coursemaster', 'coursemaster.ID = admission.CourseID', 'left')
            ->where('admission.StuID', $stu['ID'])
            ->first();
        $data['admission'] = $admisssion;

        $resultid = $resultmodel->where('AdmissionID ', $admisssion['ID'])->where('Sem',$sem)->orderBy('ID', 'DESC')->first();
        $data['result'] = $resultid;

        $data['marks'] = $marksmodel->where('ResultID ', $resultid['ID'])->orderBy('Sequence', 'ASC')->findAll();
       

        // Get First sem marks detail if result for 2nd sem
        if($sem==2)
            {
                $resultidfirstsem=$resultmodel->where('AdmissionID', $admisssion['ID'])->where('Sem',1)->first();
                //get max total marks of first sem
                 $totalmaxmarks = $marksmodel
                ->select('SUM(COALESCE(MaxMark,0) + COALESCE(MaxPracMark,0)) AS TotalMaxMarks')
                ->where('ResultID', $resultidfirstsem['ID'])
                ->first();
                $data['Sem1MaxMarks']= $totalmaxmarks['TotalMaxMarks'];

                //get max total marks of first sem
                $totalobtainmarks = $marksmodel
                ->select('SUM(COALESCE(ObtainMark,0) + COALESCE(MaxObtainMark,0)) AS TotalObtainMarks')
                ->where('ResultID', $resultidfirstsem['ID'])
                ->first();
                 $data['Sem1ObtainMarks'] = $totalobtainmarks['TotalObtainMarks'];
          
            }
           
        return view('admin/resultadmin', $data);
    }
    public function diploma($regno) // show diploma to Admin
    {
        
        $stumodel = new StudentModel();
        $admissionmodel = new AdmissionModel();
        $resultmodel = new ResultModel();
        $marksmodel = new MarksModel();

        $stu = $stumodel->where('RegNo ', $regno)->first();
        $data['stu'] = $stu;

        $admisssion = $admissionmodel
            ->select('admission.*, coursemaster.CName,coursemaster.CCode,coursemaster.Duration')
            ->join('coursemaster', 'coursemaster.ID = admission.CourseID', 'left')
            ->where('admission.StuID', $stu['ID'])
            ->first();
        $data['admission'] = $admisssion;
        
        // Grand Total
        $grandMaxMarks = 0;
        $grandObtainMarks = 0;
        $createdDate="";
        $resultid = $resultmodel->where('AdmissionID ', $admisssion['ID'])->findAll();
        $LastResultID=0;        
        foreach ($resultid as $row) {
            $totals = $marksmodel
                ->select('SUM(MaxMark + MaxPracMark) as totmaxmarks, SUM(ObtainMark + MaxObtainMark) as totobtainmarks')
                ->where('ResultID', $row['ID'])
                ->first();

            // Add into grand total
            $grandMaxMarks += $totals['totmaxmarks'] ?? 0;
            $grandObtainMarks += $totals['totobtainmarks'] ?? 0;
            $createdDate = $row['CreatedDate'];
            $LastResultID=$row['ID'];
        }

        //  calculate percentage
        $percentage = 0;
        if ($grandMaxMarks > 0) {
            $percentage = ($grandObtainMarks / $grandMaxMarks) * 100;
        }
        $data['Percentage']  = round($percentage, 2);
       $data['Grade']= $this->getGrade($percentage);
        // Get end date
        $startDate = $stu['AdmissionDate'];
        $months = $admisssion['Duration']; // months from DB
        $endDate = date('Y-m-d', strtotime("+ $months months", strtotime($startDate)));
        $data['EndDate']= $endDate;
        $data['CreatedDate']= $createdDate;
        $data['ResultID']= $LastResultID;
        return view('admin/diploma', $data);
    }
    public function delmarksentry($resultid,$regno) // show marksheet to Admin
    {
        $db = \Config\Database::connect();

        // Delete records
        $db->table('markentry')
            ->where('ResultID', $resultid)
            ->delete();

        $resultmodel=new ResultModel();
        $resultmodel->where('ID', $resultid)->delete();

        // Optional: check affected rows
        if ($db->affectedRows() > 0) {
            return redirect()->to(site_url('admissionlist/' . $regno))
                ->with('delsuccess', 'Marks deleted successfully');
        } else {
            return redirect()->to(site_url('admissionlist/' . $regno))
                ->with('error', 'No records found or already deleted');
        }
    }
}

