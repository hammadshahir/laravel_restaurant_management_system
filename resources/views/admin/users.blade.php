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
            <H1>LIST OF USERS:</H1>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        @if ($item->user_type == '0')
                            <td><a href="{{url('/delete', $item->id)}}">Delete</a></td>
                        @else
                            <td>Adminstrator</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        @include("admin.footer")
  </body>
</html>
