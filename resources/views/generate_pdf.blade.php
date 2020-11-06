
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
    <p><h3><h3> <center>LIST OF ALLOCATED STUDENTS WITH THEIR ROOMS</center> </h3></p>
   

<table id="customers">
<thead>
  <tr>
    <th>ID</th>
    <th>Student Name</th>
    <th class="text-center">Student Gender</th>
    <th class="text-center">Year</th>
    <th class="text-center">Hostel</th>
    <th class="text-center">Block</th>
    <th class="text-center">Room</th>
    <th class="text-center">Mattress Number</th>
  </tr>

</thead>
  
<tbody>
    @foreach ($allocations as  $key => $all )
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $all->student->user->name }}</td>
      <td class="text-center">{{ $all->student->gender->short_name}}</td>
      <td class="text-center">{{ $all->year->name}}</td>
      <td class="text-center">{{ $all->room->block->hostel->name }}</td>
      <td class="text-center">{{ $all->room->block->number }}{{ $all->room->block->name }}</td>
      <td class="text-center">{{ $all->room->number }}</td>
      <td class="text-center">{{ $all->bed->number }}</td>
    </tr>
    @endforeach
<tbody>
</table>

</body>
</html>