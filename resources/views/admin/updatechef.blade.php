<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        @include("admin.header")
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar")
        <div style="position: relative; top: 60px; right: -60px">
            <form action="{{url('/updatechefrecord', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Chef Name</label>
                    <input type="text" style="color:blue" name="name" value="{{$data->name}}">
                </div>
                <div>
                    <label for="speciality">Speciality</label>
                    <input type="text" style="color:blue" name="speciality" value="{{$data->speciality}}">
                </div>
                <div class="form-group">
                    <label for="image">Current Image</label>
                    <img height="90" width="90" src="/chefimage/{{$data->image}}">
                </div>
                <div class="form-group">
                    <label for="name">Instagram</label>
                    <input type="text" style="color:blue" name="instagram" value="{{$data->instagram}}">
                </div>
                <div class="form-group">
                    <label for="name">New Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-pill btn-warning" value="Update Record">
                </div>
            </form>
        </div>
    </div>
        @include("admin.footer")
  </body>
</html>
