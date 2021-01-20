
<input type="text" name="Name", value="{{old('name') ?? $customer->name}}">
{{$errors->first('Name')}}
<input type="text" name="email" value="{{old('name') ?? $customer->email}}">
{{$errors->first('email')}}
<select name="active" id="active">
    <option value="" disabled>Select Customer Status</option>
    <option value="1" {{ $customer->active == '1' ? 'selected' : '' }}>Active</option>
    <option value="0"{{ $customer->active == '0' ? 'selected' : '' }} >Inactive</option>
</select>
<select name="company_id" id="company_id">
@foreach($companies as $company)
    <option value="{{ $company->id }}" {{$company->id == $customer->company_id ? 'selected': ""}}>{{ $company->name }}</option>
@endforeach
</select>

<div class="form-group d-flex flex-column">
            <label for="image">Profile Pic</label>
            <input type="file" name="image">
        </div>
@csrf