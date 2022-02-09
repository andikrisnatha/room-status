<div wire:ignore.self class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form>
                        <div class="col">
                            <div class="row">
                                <label for="room_number">Room</label>
                                <input wire:model='room_number' type="text" class="form-control" disabled>
                            </div>
                            <div class="row">
                                <label for="room_code">Code</label>
                                <input wire:model='room_code' type="text" class="form-control" disabled>
                            </div>
                            <div class="row">
                                <label for="room_name">Type</label>
                                <input wire:model='room_name' type="text" class="form-control" disabled>
                            </div>
                            <div class="row">
                                <label for="updated_by">Updated By</label>
                                <input wire:model='updated_by' type="text" class="form-control text-white" disabled>
                            </div>
                            <div class="row">
                                <label for="status_id">Status</label>
                                <select wire:model='status_id' type="text" class="form-control">
                                    @foreach ($this->statuses as $stat)
                                    <option value="{{$stat->id}}">{{$stat->status_code}} - {{ $stat->status_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button wire:click.prevent='update()' type="button" class="btn btn-primary close-modal" onclick="return confirm('are you sure?')">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
