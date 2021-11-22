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
            <table class="table">
                <thead>
                    <tr class="">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    @if ($item->user_type == '0')
                        <td><a href="{{url('/delete', $item->id)}}">Delete</a></td>
                    @else
                        <td></td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>

        @include("admin.footer")
  </body>
</html>
