<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('livewire.update')
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Room Status</h4>
                        <p class="card-category">Use the search to locate the data</p>
                        <div class="row mb-4">
                            <div class="col form-inline">
                                Per Page: &nbsp;
                                <select wire:model="perPage" class="form-control">
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                            <div class="col">
                                <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search Room...">
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th wire:click="sortBy('room_number')" style="cursor: pointer">
                                    Room
                                    @include('partials._sort-icon', ['field' => 'room_number'])
                                </th>
                                <th wire:click="sortBy('room_code')" style="cursor: pointer">
                                    Code
                                    @include('partials._sort-icon', ['field' => 'room_code'])
                                </th>
                                <th wire:click="sortBy('room_name')" style="cursor: pointer">
                                    Type
                                    @include('partials._sort-icon', ['field' => 'room_name'])
                                </th>
                                <th wire:click="sortBy('status_id')" style="cursor: pointer">
                                    Status
                                    @include('partials._sort-icon', ['field' => 'status_id'])
                                </th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $room->room_number }}</td>
                                    <td>{{ $room->room_name }}</td>
                                    <td>{{ $room->room_code }}</td>
                                    <td class="
                                    @if ($room->status->status_code == "VCI")
                                        text-white bg-success
                                    @elseif ($room->status->status_code == "VC")
                                        text-white bg-primary
                                    @elseif ($room->status->status_code == "VD")
                                        text-white bg-info
                                    @elseif ($room->status->status_code == "OD")
                                        text-white bg-dark
                                    @elseif ($room->status->status_code == "OC")
                                        text-white bg-dark
                                    @elseif ($room->status->status_code == "OS")
                                        text-white bg-warning
                                    @elseif ($room->status->status_code == "OO")
                                        text-white bg-danger
                                    @else
                                    @endif
                                    ">{{ $room->status->status_code }}</td>
                                    <td>
                                        <button wire:click="edit({{ $room->id }})" data-toggle="modal" data-target="#updateStatus" class="btn btn-danger">Update</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-info">Showing {{ $rooms->firstItem() }} to {{ $rooms->lastItem() }} of {{ $rooms->total() }} entries</p>
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
