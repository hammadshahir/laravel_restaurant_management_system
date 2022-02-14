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
            <form action="{{url('/updatefood', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" value="{{$data->title}}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$data->price}}">
                  </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" rows="3">{{$data->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                   <img height="200" width="200" src="/foodimages/{{ $data->image}}">
                </div>
                <div class="form-group">
                    <label for="image">Choose New Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <input type="submit" class="btn btn-pill btn-warning" value="Update Record">

            </form>

            <div>
    </div>
        @include("admin.footer")
  </body>
</html>
