<option>--- Select State ---</option>
@if(!empty($projects))
  @foreach($projects as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif