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
            <H1>ORDERS:</H1>
            <table class="table table-dark">
                <thead>
                    <tr align="center">
                        <th style="padding: 30px;">Name</th>
                        <th style="padding: 30px;">Address</th>
                        <th style="padding: 30px;">Phone</th>
                        <th style="padding: 30px;">Food</th>
                        <th style="padding: 30px;">Price</th>
                        <th style="padding: 30px;">Qauntity</th>
                        <th style="padding: 30px;">Amount (Euros)</th>
                    </tr>
                    @foreach($data as $data)
                    <tr align="center">
                    	<td>{{$data->username}}</td>
                    	<td>{{$data->address}}</td>
                    	<td>{{$data->phone}}</td>
                    	<td>{{$data->foodname}}</td>
                    	<td>{{$data->price}}€</td>
                    	<td>{{$data->quantity}}</td>
                    	<td>{{$data->price * $data->quantity}}€</td>
                    </tr>
                    @endforeach
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
        @include("admin.footer")
  </body>
</html>
