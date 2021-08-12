<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\Course;

class CourseWire extends Component
{
    public $course_id;
    public $name;
    public $action;
    
    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function selectItem($modelid , $action)
    {
        $this->course_id = $modelid;
        $this->action = $action;

        if($action == "update")
        {
            $this->emit('getModelId' , $this->course_id);
        }
        else if($action == "manageCourseResources")
        {
            $this->emit('getModelIdDeeper' , $this->course_id);
            $this->dispatchBrowserEvent('openModal_manageCourseResources');
        }
        
    }

    public function delete()
    {
        $course = Course::find($this->course_id);

        $course->delete();

    }

    public function render()
    {

        $courses = Course::all();

        return view('livewire.course.course-wire')->with(compact('courses'));

        // return view('livewire.course.course-wire');
    }
}
