<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::get();

        $students = Student::all();






    return view('students.index', compact('students'));

    }
    public function  create()
    {
        return view('students.create');

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'nepaliDate' => 'required|string|max:255',
            'calendar' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         $student = new Student();
    $student->name = $validated['name'];
    $student->address = $validated['address'];
    $student->class = $validated['class'];
    $student->nepaliDate = $validated['nepaliDate'];
    $student->calendar = $validated['calendar'];


    if ($request->hasFile('image')) {

        $imagePath = $request->file('image')->store('image', 'public');


        $imageUrl = asset('storage/' . $imagePath);


        $student->image = $imageUrl;
     }


        Student::create($validated);
        return redirect('/');
       // return redirect()->back()->with('success', 'Student registered successfully!');
    }





    public function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));


    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'nepaliDate' => 'required|string|max:255',
            'calendar' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/image', $filename);
            $validated['image'] = $filename;

            // Delete the old image if exists
            if ($student->image) {
                Storage::delete('public/image/' . $student->image);
            }
        }






        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

public function destroy($id){
    $student = Student::findOrFail($id);

    if ($student->image) {
        Storage::delete('public/image/' . $student->image);
    }
    $student->delete();

    return redirect()->route('students.index')->with('success','student deleted successfully.');
}



}
