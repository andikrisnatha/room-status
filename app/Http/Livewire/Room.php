<?php

namespace App\Http\Livewire;

use App\Models\Room as ModelsRoom;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Room extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 20;
    public $sortBy = 'room_number';
    public $sortDirection = 'ASC';
    
    public $room_number;
    public $room_code;
    public $status_id;
    public $room_id;
    
    public function render()
    {
        $rooms = ModelsRoom::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        
        return view('livewire.room',[
            'rooms' => $rooms
        ]);
    }
    
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        return $this->sortBy = $field;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function edit($id)
    {
        $room = ModelsRoom::findorFail($id);
        $this->room_number = $room->room_number;
        $this->room_code = $room->room_code;
        $this->status_id = $room->status_id;
        $this->room_name = $room->room_name;
        $this->updated_by = $room->updated_by;
        $this->room_id = $id;
        
    }
    
    
    public function update()
    {
        $this->validate([
            'status_id' => 'required',
        ]);
        
        $room = ModelsRoom::findorFail($this->room_id);
        $room->update([
            'status_id' => $this->status_id,
            'room_number' => $this->room_number,
            'room_code' => $this->room_code,
            'room_name' => $this->room_name,
            'updated_by' => Auth::user()->id,   
        ]);
        session()->flash('message', 'status updated');

        // $this->dispatchBrowserEvent('swal:confirm',[
        //     'status' => 'success',
        //     'message' => 'Yakin bro?',
        //     'type' => 'warning',
        // ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'status' => 'Horayyy!',
            'message' => 'Room status updated!',
            'type' => 'success',
        ]);

        $this->emit('statusUpdated');
    }
    
    
    
    public function getStatusesProperty()
    {
        return Status::all();
    }
}