<div>

    {{-- @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
</div>
@endif --}}

<form class="needs-validation  " wire:submit.prevent="saveContact">
    <div class="col-md-12">
        <label for="validationCustom04">State</label>
        <select wire:model="region_id" class="custom-select" id="validationCustom04" required>
            <option selected disabled value="">Choose...</option>
            @foreach ($regions as $item)
            <option>{{ $item }}</option>
            @endforeach

        </select>
    </div>

    <div class="col-md-12">
        <label for="validationCustom04">District</label>
        <select wire:model="hh" class="custom-select" id="validationCustom04" required>
            <option selected disabled value="">Choose...</option>
            @foreach ($districts as $key=>$item)
            <option>{{ $item }}</option>
            @endforeach

        </select>
    </div>


    <div class="col-md-12">
        <label for="validationServer01">Student Name</label>
        <input wire:model="name" type="text"
            class="form-control @if($errors->has('name')) is-invalid @elseif(!$firstTime) is-valid @endif"
            id="validationServer01">

        @error('name')
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="validationServer02">Email</label>

        <input wire:model="email" type="text" class="form-control @if($errors->has('email')) is-invalid  @endif"
            id="validationServer02">

        @error('email')
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @enderror
    </div>
    <button class="btn btn-primary mt-3" type="submit">Submit form</button>
</form>



</div>