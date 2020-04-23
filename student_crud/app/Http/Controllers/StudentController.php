<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allStudents = Student::all()->toArray();

        return view('student.index', compact('allStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**This method can be called as default on invoking this controller class. (If, No method mentioned at Route)
         * Renders create (create.blade.php) from student folder in views.
         * resources/views/student/create.blade.php
         */

        return view('student.create'); // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // Giving validation to the fields in th form(form that calls this method)
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required'
        ]);
        
        // Creating a model object (Student, imported) 
        $studentObj = new Student([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName')
        ]);

        // similar to the repository.save() : Saves object into the Database.table 
        $studentObj->save();

        return redirect()
                        ->route('student.index')                  // Redirecting to a template (can be different from calling template)
                        ->with('success', 'Data Added successfully'); // like model interface, carrying key-value
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
        //
        $studentWithId = Student::find($id);

        return view('student.edit', compact('studentWithId', 'id'));
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
        // Giving validation to the fields in th form(form that calls this method)
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required'
        ]);
        $studentWithId = Student::find($id);

        $studentWithId['first_name'] = $request->get('firstName');
        $studentWithId['last_name'] = $request->get('lastName');

        $studentWithId->save();

        return redirect()
                        ->route('student.index')
                        ->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student::destroy($id);

        return redirect()
            ->route('student.index')
            ->with('success', 'Deleted successfully');
    }
}
