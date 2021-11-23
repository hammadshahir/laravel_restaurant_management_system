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

                <input type="submit" class="btn btn-pill btn-success" value="Insert">

            </form>
        </div>
    </div>

        @include("admin.footer")
  </body>
</html>
