<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
    .inventorySystemBody {
        display: flex;
        height: 100vh !important;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        justify-content: center;
    }
    </style>
</head>

<body class="inventorySystemBody h-100 ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 mx-auto card p-5">
                <form class="row g-3" id="ajax-formData" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Description</label>
                        <input name="product_description" type="text" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Price</label>
                        <input name="product_price" type="text" class="form-control" id="inputAddress"
                            placeholder="Enter price">
                    </div>
                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">Color</label>
                        <input name="product_color" type="text" class="form-control" id="inputAddress2"
                            placeholder="Add Color Varent">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Discount</label>
                        <input name="product_discount" type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Product SKU</label>
                        <input name="product_sku" type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Product Category</label>
                        <select name="product_category" id="inputState" class="form-select">
                            <option selected>Electronic</option>
                            <option>Clothing</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <label class="form-check-label" for="gridCheck">
                                this product is available
                            </label>
                            <input class="form-check-input" name="product_availablity" type="checkbox" id="gridCheck">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload product image</label>
                            <input name="product_image" class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-success btn-submit" onclick="getMessage()">Submit</button>
                        <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-7 mx-auto d-flex">
                <?php $product_count = 0;?>

                @foreach($data as $item)
                @if( $product_count < 2 ) <?php $product_count++;?> <div class=" card p-2 w-100">
                    <div>
                        <div>
                            <img src="{{url('/images/'.$item->product_image)}}" class="w-100" alt="" title="" />
                        </div>
                        <div class="">
                            <p><b>Name:</b> {{ $item->product_name }}</p>
                        </div>
                    </div>
                    <div>
                        <p><b>Description:</b> {{ $item->product_description }}</p>
                    </div>
                    <span class="discount"><b>Discount:</b> {{ $item->product_discount }}</span>
                    <span class="discount"><b>Discount:</b> {{ $item->product_image }}</span>
            </div>
            @endif
            @endforeach


            <!-- @if(!empty($data)):
                    @foreach($data as $item)
                    {{ $item->product_name }}
                    @endforeach
                    @endif -->
        </div>
    </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function getMessage() {
    alert();
    var form = new FormData($('#ajax-formData')[0]);
    $.ajax({
        type: 'POST',
        url: '/add_product_info_ajax',
        data: form,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data2) {
            alert(data2.message);
        },
        fail: function(xhr, textStatus, errorThrown) {
            alert('request failed');
        }
    });
}
</script>

</html>