@extends('cms.parent')

@section('title', 'Edit Car')

@section('sub-title', 'Edit Car')


@section('left-title', 'edit-Car')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Car</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name">Name of Car</label>
                    <input type="text" value = "{{ $cars ->name }}"class="form-control" id="name" name="name"placeholder="Enter Car Name">
                </div>
                <div class="form-group">
                    <label for="image">Image of Car</label>
                    <input type="file" value = "{{asset('storage/images/car/'.$cars->image ?? "")}}" name="image" class="form-control" id="image" placeholder="Enter Image">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" value = "{{ $cars ->model }}"class="form-control" id="model" name="model"placeholder="Enter Car Model">
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" value = "{{ $cars ->color }}" class="form-control" id="color" name="color"placeholder="Enter Car color">
                </div>
                <div class="form-group">
                    <label for="status"> Status</label>
                    <select class="form-select form-select-sm" name="status" style="width: 100%;" id="status" value = "{{ $cars ->status }}"
                        aria-label=".form-select-sm example">
                        <option value="active">active</option>
                        <option value="inactive">inactive </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gear_stick_type"> Gear_stick_type</label>
                    <select class="form-select form-select-sm" name="gear_stick_type" style="width: 100%;" value = "{{ $cars ->gear_stick_type }}"
                        id="gear_stick_type" aria-label=".form-select-sm example">
                        <option value="manual">manual</option>
                        <option value="Automatic">Automatic</option>
                    </select>
                </div>
                <div class="form-group" data-select2-id="29">
                    <label for="tank_type">tank_type</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="tank_type" value = "{{ $cars ->tank_type }}"
                        name="tank_type" tabindex="-1" aria-hidden="true">
                        <option value="petrol">petrol</option>
                        <option value="diesel">diesel</option>
                    </select></span>
                </div>
                <div class="form-group">
                    <label for="buy_price">Buy_Price</label>
                    <input type="number" class="form-control" id="buy_price" value = "{{ $cars ->buy_price }}"
                        name="buy_price"placeholder="Enter Car buy_price">
                </div>
                <div class="form-group">
                    <label for="rent_price">Rent_price</label>
                    <input type="number" class="form-control" id="rent_price" value = "{{ $cars ->rent_price }}"
                        name="rent_price"placeholder="Enter Car rent_price">
                </div>
                <div class="form-group">
                    <label>Supplier Name</label>
                    <select class="form-control select2" id="supplier_id" name="supplier_id" style="width: 100%;">
                        @foreach ($suppliers as $supplier)
                        <option @if ($supplier->id == $cars->supplier_id) selected @endif value="{{ $supplier->id }}">{{ $supplier->user->first_name . ' '.$supplier->user->last_name}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-danger" href ="{{ route('cars.index') }}" >Back</a>

        <button type="button"onclick="performUpdate({{ $cars->id }})" class="btn btn-success">Update</button>
    </div>
    </form>
    </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('image', document.getElementById('image').files[0]);
        formData.append('model', document.getElementById('model').value);
        formData.append('color', document.getElementById('color').value);
        formData.append('status', document.getElementById('status').value);
        formData.append('gear_stick_type', document.getElementById('gear_stick_type').value);
        formData.append('tank_type', document.getElementById('tank_type').value);
        formData.append('buy_price', document.getElementById('buy_price').value);
        formData.append('rent_price', document.getElementById('rent_price').value);
        formData.append('supplier_id', document.getElementById('supplier_id').value);
        storeRoute('/cms/admin/cars_update/'+id , formData) ;      

    }
</script>
@endsection
