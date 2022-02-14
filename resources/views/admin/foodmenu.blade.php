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
            <form action="{{url('/insertfood')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price">
                  </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <input type="submit" class="btn btn-pill btn-success" value="Insert Record">

            </form>

            <div>
                <table>
                    <tr>
                        <th style="padding: 30px">Name</th>
                        <th  style="padding: 30px">Price</th>
                        <th  style="padding: 50px">Description</th>
                        <th style="padding: 30px">Image</th>
                        <th style="padding: 30px">Actions</th>
                    </tr>
                    @foreach ($data as $item)
                    <tr align="center">
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td><img height="100" width="100" src="/foodimages/{{$item->image}}"></td>
                        <td><a href="{{url('/deletemenu', $item->id)}}">Delete</a></td>
                      </tr>
                    @endforeach

                </table>
            </div>

        </div>

    </div>



        @include("admin.footer")
  </body>
</html>
