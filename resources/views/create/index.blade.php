<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        span.b{
     display: inline-block;
  width: 100px;
  height: 150px;
  margin-top:20px;
  margin-left:90px;
  margin-bottom:20px;
  padding: 5px;
  border: 1px solid blue;    
  background-color: gainsboro;
}
</style>
</head>
<body>
<!-- <head>
    <title>Search Users</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head> -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-5">
            <h1>Search</h1>
            <form class="" style="width:90%" action="{{route('do_search')}}" method="post">
          @csrf
        <input class="form-control me-2" type="search" name="search"  placeholder="Search Name Department  Designation" >
        <button class="btn btn-outline-success" type="submit">Search</button>
    <!-- <input type="text" style="width:85%;"id="name" placeholder="Search by Name Department  Designation">
   
    <button id="search" style="border-radius: 4px;">Search</button>
      -->
    <table border="1">
        <!-- <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Phone Number</th>
            </tr>
        </thead> -->

        <!-- <h1>view</h1>-->
        </tr>
            @foreach($data as $datas)
            <tr>
               
             

<div> <span class="b">{{$datas->name}} <br>
                      {{$datas->department->name}}
                       {{$datas->Designation->name}}</span>

<span class="b">
                      {{$datas->name}} <br>
                      {{$datas->department->name}}
                      {{$datas->Designation->name}}</span>
</span> </div>
        <tbody id="user-table">
            <!-- Results will be appended here -->
        </tbody>
        @endforeach
    </table>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // $(document).ready(function() {
        //     $('#search').on('keyup', function() {
        //         const search = $(this).val();

        //         $.ajax({
        //             url: '/',
        //             type: 'GET',
        //             data: { search },
        //             success: function(data) {
        //                 $('#userTable').html($(data).find('#userTable').html());
        //             }
        //         });
        //     });
        // });


    
        $(document).ready(function() {
            function fetchUsers(query = '') {
                $.ajax({
                    url: "/users",
                    type: "GET",
                    data: { search: query },
                    success: function(data) {
                        let tableBody = '';
                        data.forEach(user => {
                            tableBody += `
                                <tr>
                                    <td>${user.name}</td>
                                    <td>${user.department}</td>
                                    <td>${user.designation}</td>
                                    <td>${user.phone_number}</td>
                                </tr>
                            `;
                        });
                        $('#userTable').html(tableBody);
                    }
                });
            }

            // Initial load
            fetchUsers();

            // On search input
            $('#search').on('keyup', function() {
                const query = $(this).val();
                fetchUsers(query);
            });
        });
    
    </script>

</body>
</html>