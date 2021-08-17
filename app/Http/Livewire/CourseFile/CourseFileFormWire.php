<?php

namespace App\Http\Livewire\CourseFile;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseFile;
use Livewire\WithFileUploads;

class CourseFileFormWire extends Component
{
    use WithFileUploads;

    public $id_coursefile;
    public $name;
    public $file_path;
    public $file_name;
    public $id_course;
    public $file_type;


    public function store()
    {
            $this->validate([
                'file_name' => 'required',
            ]);

            $add = New CourseFile;
            $add->name = $this->file_name;
            $add->id_course = $this->id_course;

            // Handle File Upload
            if ($this->file_path) {
                // Get filename with the extension
                $filenameWithExt = $this->file_path->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
          
                     $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
             
                // Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $this->file_path->storeAs('public' . DIRECTORY_SEPARATOR . 'coursefile', $fileNameToStore);
            } else {
                $fileNameToStore = 'nofile_' . $this->id_course . '_' . time() . '.png';
                
                $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'coursefile' . DIRECTORY_SEPARATOR . 'nofile_' . $this->id_course . '_' . time() . '.png';
               
                copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
            }

            //path
            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'coursefile' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            
            $add->file_type = $this->file_type;
            $add->file_name = $fileNameToStore;
            $add->file_path = $path;
            $add->save();
    
            session()->flash('message', 'New resources successfully added into course');
        
       
        $this->emit('refreshParent');

    }

    
    public function render()
    {
        $courses = Course::all();

        return view('livewire.course-file.course-file-form-wire')->with(compact('courses'));

        // return view('livewire.course-file.course-file-form-wire');
    }
}
