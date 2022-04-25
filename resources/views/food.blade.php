<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of sanwiches with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($data as $item)
                <form action = "{{url('/addcart', $item->id)}}" method="POST">
                    @csrf
                    <div class="item">
                        <div style="background-image: url('/foodimages/{{$item->image}}');" class='card'>
                            <div class="price"><h6>€{{$item->price}}</h6></div>
                            <div class='info'>
                                <h1 class='title'>{{$item->title}}</h1>
                                <p class='description'>{{$item->description}}</p>
                                <input  class="form-control-sm" type="number" min="1" value="1" name="quantity" style="width: 80px">
                                <input type="submit" class="btn btn-success" value="Add to Cart">
                            </div>

                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->
