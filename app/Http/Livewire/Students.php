<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Lesson;
use App\Models\Subject;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class Students extends Component
{
    use LivewireAlert;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public $students,$matricula,$nombre,$apellido,$carrera,$semestre,$id_user,$id_student,$position;
    public $materia1,$materia2,$materia3,$materia4,$materia5,$materia6,$materia7;
    public $status1,$status2,$status3,$status4,$status5,$status6,$status7;
    public $modal = false;
    public $materias;

    //lesson variables
    public $lessons,$id_userLesson,$id_studentLesson,$id_lesson;
    public $modalLesson = false;
    public $delete_idLesson;
    protected $listeners2 = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $this->students = Student::all();
        $this->materias = Subject::all();
        return view('livewire.students');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }

    public function cerrarModal() {
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->matricula = '';
        $this->nombre = '';
        $this->apellido = '';
        $this->carrera = '';
        $this->semestre = '';
        $this->materia1 = '';
        $this->materia2 = '';
        $this->materia3 = '';
        $this->materia4 = '';
        $this->materia5 = '';
        $this->materia6 = '';
        $this->materia7 = '';
    }

    public function editar($id)
    {
        $student = Student::findOrFail($id);
        $this->id_student = $id;
        $this->matricula = $student->matricula;
        $this->nombre = $student->nombre;
        $this->apellido = $student->apellido;
        $this->carrera = $student->carrera;
        $this->semestre = $student->semestre;
        $this->materia1 = $student->materia1;
        $this->materia2 = $student->materia2;
        $this->materia3 = $student->materia3;
        $this->materia4 = $student->materia4;
        $this->materia5 = $student->materia5;
        $this->materia6 = $student->materia6;
        $this->materia7 = $student->materia7;
        $this->id_user = $student->id_user;


        $this->status1 = $student->status1;
        $this->status2 = $student->status2;
        $this->status3 = $student->status3;
        $this->status4 = $student->status4;
        $this->status5 = $student->status5;
        $this->status6 = $student->status6;
        $this->status7 = $student->status7;
        // Storage::url($this->image->store('public/images'));
        $this->abrirModal();
    }

    public function delete(){
        $student = Student::where('id',$this->delete_id)->first();
        $student->delete();

        $this->dispatchBrowserEvent('FileDeleted');
    }

    public function deleteConfirmation($id){
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function guardar()
    {

        // $image=$this->image->store('public/images');
        // $url = Storage::url($image);

        Student::updateOrCreate(['id'=>$this->id_student],
            [
                'matricula' => $this->matricula,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'carrera' => $this->carrera,
                'semestre' => $this->semestre,
                'materia1' => $this->materia1,
                'materia2' => $this->materia2,
                'materia3' => $this->materia3,
                'materia4' => $this->materia4,
                'materia5' => $this->materia5,
                'materia6' => $this->materia6,
                'materia7' => $this->materia7,
                'status1' => $this->status1,
                'status2' => $this->status2,
                'status3' => $this->status3,
                'status4' => $this->status4,
                'status5' => $this->status5,
                'status6' => $this->status6,
                'status7' => $this->status7,
                'id_user' => auth()->id(),
                // 'position' => $position,
                // 'image' => $this->image->store('public/images')
                //Storage::url es para cambiar la ruta a storage, debemos importar: use Illuminate\Support\Facades\Storage;
                // 'image' => Storage::url($this->image->store('public/images'))
            ]);
        //  session()->flash('message',
        //     $this->id_asociacion ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
        $this->alert('success', 'Alta exitosa!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

    ///Lessons
    public function crearLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $this->id_lesson = $id;
        $this->id_userLesson = $lesson->id_user;
        $this->id_studentLesson = $lesson->id_student;
        // $this->limpiarCamposLesson();
        $this->abrirModalLesson();
    }

    public function abrirModalLesson() {
        $this->modalLesson = true;
    }
    public function cerrarModalLesson() {
        $this->modalLesson = false;
    }

    public function limpiarCamposLesson(){
        
    }
    public function editarLesson($id)
    {
        $lesson = Student::findOrFail($id);
        $this->id_student = $id;
        $this->materia1 = $lesson->materia1;
        $this->materia2 = $lesson->materia2;
        $this->materia3 = $lesson->materia3;
        $this->materia4 = $lesson->materia4;
        $this->materia5 = $lesson->materia5;
        $this->materia6 = $lesson->materia6;
        $this->materia7 = $lesson->materia7;

        $this->status1 = $lesson->status1;
        $this->status2 = $lesson->status2;
        $this->status3 = $lesson->status3;
        $this->status4 = $lesson->status4;
        $this->status5 = $lesson->status5;
        $this->status6 = $lesson->status6;
        $this->status7 = $lesson->status7;
        // $this->id_userLesson = $lesson->id_user;
        // $this->id_studentLesson = $lesson->id_student;
        // Storage::url($this->image->store('public/images'));
        $this->abrirModalLesson();
    }

    public function deleteLesson(){
        $lesson = Lesson::where('id',$this->delete_idLesson)->first();
        $lesson->delete();

        $this->dispatchBrowserEvent('FileDeleted');
    }

    public function deleteConfirmationLesson($id){
        $this->delete_idLesson = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function guardarLesson()
    {

        // $image=$this->image->store('public/images');
        // $url = Storage::url($image);

        Lesson::updateOrCreate(['id'=>$this->id_lesson],
            [
                'id_student' => $this->id_student,
                'id_user' => auth()->id(),
            ]);

        //Student Area
        $this->alert('success', 'Alta exitosa!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
         
         $this->cerrarModalLesson();
         $this->limpiarCamposLesson();
    }
}
