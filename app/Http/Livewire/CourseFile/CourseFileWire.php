<?php

namespace App\Http\Livewire\CourseFile;

use Livewire\Component;
use App\Models\CourseFile;

class CourseFileWire extends Component
{

    public $id_coursefile;
    public $action;


    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

  
    public function selectItem($modelid , $action)
    {
        $this->id_coursefile = $modelid;
        $this->action = $action;  
    }

    public function delete()
    {
        $coursefile = CourseFile::find($this->id_coursefile);

        $coursefile->delete();

    }

    public function render()
    {
        $coursefiles = CourseFile::all();

        return view('livewire.course-file.course-file-wire')->with(compact('coursefiles'));

        // return view('livewire.course-file.course-file-wire');
    }
}
