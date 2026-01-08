@extends ("backend.layouts.master")

@section("head")

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/assets/images/favicon.png">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{url('')}}/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{url('')}}https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="{{url('')}}https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

@endsection

@section("scripts")

<!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{url('')}}/dist/js/app.min.js"></script>
    <script src="{{url('')}}/dist/js/app.init.dark.js"></script>
    <script src="{{url('')}}/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{url('')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('')}}/dist/js/custom.min.js"></script>


@endsection

@section("content")

<div class="col-lg-12  m-b-30">
    <h4 class="m-b-20">Product Entry</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        
    @endforeach
    </div>
        
    @endif
        
        <!-- Contact -->
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" class="form-control" value="{{ old ('product_name')}}" name="product_name" id="exampleInputname1" placeholder="Enter Product name"> 
            </div>
            <div class="form-group">
                <label>Product Deatils:</label><br>
                <textarea name="details" value="{{old ('details')}}" id="exampleInputname1" cols="150" rows="2" placeholder=""></textarea>
            </div>
            <div class="form-group">
                <label>Product SKU:</label>
                <input type="text" class="form-control"  value="{{old ('product_sku')}}" name="product_sku" id="exampleInputname1" placeholder=""> 
            </div>
            <div class="form-group">
                <label>Product Stock:</label>
                <input type="number" class="form-control" value="{{ old ('product_stock')}}" name="product_stock" id="exampleInputname1" placeholder=""> 
            </div>
            <div class="form-group">
                <label>Product Price:</label>
                <input type="number" class="form-control" value="{{ old ('price')}}" name="price" id="exampleInputname1" placeholder=""> 
            </div>
            <div class="form-group">
                <label>Photo:</label>
                <input type="file" class="form-control" value="" name="photo" id="exampleInputname1" placeholder=""> 
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category" id="" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($data as $item)
                        
                    
                    <option value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
</div>

@endsection