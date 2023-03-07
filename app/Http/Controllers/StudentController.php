<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;
class StudentController extends Controller
{

    public function index()
    {
        return view('students');
    }
    

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'product-action')
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $student  = Student::where($where)->first();

        return Response()->json($student);
    }

    public function store(Request $request)
    {
        $productId = $request->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'dob' => 'required'
        ]);

        $product = Student::updateOrCreate(
            [
                'id' => $productId
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'dob' => $request->dob
            ]
        );

        return Response()->json($product);
    }

    public function destroy(Request $request)
    {
        $product = Student::where('id', $request->id)->delete();

        return Response()->json($product);
        //echo json_encode(['status' => 'success', 'message' => 'Data Inserted Successfully!']);
    }

    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

}