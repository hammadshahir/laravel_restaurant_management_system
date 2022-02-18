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
            <H1>RESERVATIONS:</H1>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">No. of Guests</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->guest}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->time}}</td>
                        <td>{{$item->message}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        @include("admin.footer")
  </body>
</html>
