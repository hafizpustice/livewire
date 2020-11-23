<div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <h1>hello</h1>
    <form class="needs-validation  " wire:submit.prevent="saveContact">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Student Name</label>
            <input wire:model="name" type="text"
                class="form-control @if($errors->has('name')) is-invalid @elseif(!$firstTime) is-valid @endif"
                id="validationServer01">

            @error('name')
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationServer02">Email</label>

            <input wire:model="email" type="text" class="form-control @if($errors->has('email')) is-invalid  @endif"
                id="validationServer02">

            @error('email')
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>



</div>