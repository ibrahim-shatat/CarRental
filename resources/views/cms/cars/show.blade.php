@extends('cms.parent')

@section('title', 'Show Admin')

@section('sub-title', 'Show Admin')


@section('left-title', 'Show-Admin')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name">Name of Car</label>
                    <input type="text" disabled value = "{{ $cars ->name }}"class="form-control" id="name" name="name"placeholder="Enter Car Name">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" disabled value = "{{ $cars ->model }}"class="form-control" id="model" name="model"placeholder="Enter Car Model">
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" disabled  value = "{{ $cars ->color }}" class="form-control" id="color" name="color"placeholder="Enter Car color">
                </div>
                <div class="form-group">
                    <label for="status"> Status</label>
                    <input type="text" disabled  value = "{{ $cars ->status }}" class="form-control" id="status" name="status"placeholder="Enter Car status">
                </div>
                <div class="form-group">
                    <label for="gear_stick_type"> Gear_stick_type</label>
                    <input type="text" disabled  value = "{{ $cars ->gear_stick_type }}" class="form-control" id="gear_stick_type" name="gear_stick_type"placeholder="Enter Car status">

                </div>
                <div class="form-group" data-select2-id="29">
                    <label for="tank_type">tank_type</label>
                    <input type="text" disabled  value = "{{ $cars ->tank_type }}" class="form-control" id="tank_type" name="tank_type"placeholder="Enter Car status">

                </div>
                <div class="form-group">
                    <label for="buy_price">Buy_Price</label>
                    <input type="number" class="form-control" id="buy_price"disabled value = "{{ $cars ->buy_price }}"
                        name="buy_price"placeholder="Enter Car buy_price">
                </div>
                <div class="form-group">
                    <label for="rent_price">Rent_price</label>
                    <input type="number" class="form-control" id="rent_price"disabled value = "{{ $cars ->rent_price }}"
                        name="rent_price"placeholder="Enter Car rent_price">
                </div>
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cars->supplier->user->first_name . ' ' . $cars->supplier->user->last_name}}" disabled >
                  </div>
            </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-success" href ="{{ route('cars.index') }}" >Back</a>
        <button type="button" onclick="performDestroy({{ $cars->id }}, this) "class="btn btn-danger">Delete</button>

    </div>
    </form>
    </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/admins/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
