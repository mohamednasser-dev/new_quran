@foreach($data as $select)
    <option value="{{$select->id}}" >{{$select->name}}</option>
@endforeach
