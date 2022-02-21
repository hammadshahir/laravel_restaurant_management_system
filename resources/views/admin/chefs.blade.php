<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
    <head>
        @include("admin.header")
    </head>
    <body>
        <div class="container-scroller">

            @include("admin.navbar")
            <div style="position: relative; top: 60px; right: -60px">
                <form action="{{url('/insertchef')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Full Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <input type="text" class="form-control" name="speciality">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram Link</label>
                        <input type="text" class="form-control" name="instagram">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <input type="submit" class="btn btn-pill btn-success" value="Insert Record">
                </form>
            <div>
            <div style="position: relative; top: 60px; right: -60px">
                <H1>CHEFS:</H1>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th styple = "padding: 30px" scope = "col">Name</th>
                            <th styple = "padding: 30px" scope = "col">Speciality</th>
                            <th styple = "padding: 60px" scope = "col">Image</th>
                            <th styple = "padding: 30px" scope = "col">Instagram</th>
                            <th styple = "padding: 60px" scope = "col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr align="center">
                            <td>{{$item->name}}</td>
                            <td>{{$item->speciality}}</td>
                            <td><img height="120" width="120" src="/chefimage/{{$item->image}}"></td>
                            <td>{{$item->instagram}}</td>
                            <td><a href = "{{url('/updatechef', $item->id)}}">Update</td>
                            <td><a href = "{{url('/deletechef', $item->id)}}">Delete</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include("admin.footer")
    </body>
</html>
