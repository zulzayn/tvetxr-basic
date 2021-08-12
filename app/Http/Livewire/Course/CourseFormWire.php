<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;


class CourseFormWire extends Component
{
    public $name;
    public $id_lecturer;
    public $model_id;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $course = Course::find($model_id);

        $this->model_id = $course->id;
        $this->name = $course->name;
        $this->id_lecturer = $course->id_lecturer;

    }

    public function store()
    {
        

        if($this->model_id)
        {
            $this->validate([
                'name' => 'required|string|max:255',
            ]);
            
            $update = Course::find($this->model_id);
            $update->name = $this->name;
            $update->id_lecturer = $this->id_lecturer;
            $update->save();
    
            session()->flash('message', 'Course successfully updated');
        }
        else
        {
            $this->validate([
                'name' => 'required|string|max:255',
                'id_lecturer' => 'required',
            ]);

            $add = New Course;
            $add->name = $this->name;
            $add->id_lecturer = $this->id_lecturer;
            $add->save();
    
            session()->flash('message', 'New course successfully added');
        }
       
        $this->emit('refreshParent');


    }

    public function render()
    {
        $lecturers = User::all();
        return view('livewire.course.course-form-wire')->with(compact('lecturers'));

        // return view('livewire.course.course-form-wire');
    }
}
