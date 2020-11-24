<div>
    
    <div class="alert alert-info alert-dismissible fade show @if(!$messageShow) d-none @endif" role="alert">
        {{ $update }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFrom">
        Add Contact
    </button>
  
    <!-- Modal -->
    <div class="modal fade" id="modalFrom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Contact </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body ">
                @livewire('registration-from')
            </div>
        
        </div>
        </div>
    </div>

    <hr>
    {{-- {{ $selectItem }}.{{ $action }} --}}
    <h3>Contract List</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
            <th scope="col">Time</th>
            <th  scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <button wire:click="selectItem({{ $item->id }},'update')" class="btn btn-success">Update</button>
                    <button wire:click="selectItem({{ $item->id }},'delete')" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
          
        </tbody>

      </table>
      {{ $contacts->links() }}

    
    <!-- Modal -->
    <div class="modal fade" id="deleteToastModal" tabindex="-1" aria-labelledby="deleteToastModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteToastModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you delete permanantly ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button wire:click="delete" type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
        </div>
    </div>


</div>
