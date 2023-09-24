<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product management system</title>
  </head>
  <body>

  <div class="container">
    <div class="row">
        <div class="col-md-12 mt-5" style="padding-top: 10px;">
            <div class="card">
                <div class="card-header">
                    <h4>Product Management System
                    <a href="#" class="btn btn-primary btn-sn float-end"  data-bs-toggle="modal" data-bs-target="#productModal">Add Product</a></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                  </tbody>
                    </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Add Product</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addProductForm" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <ul class = "alert alert-danger d-none" id="save_errorList"></ul>
        <div class="form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name">
        </div>
        <div class="form-group mb-3">
            <label for="name">Product Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter Product Description"></textarea>
            </div>
        <div class="form-group mb-3">
            <label for="name">Product Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Enter Product Image">
        </div>
        <!-- size -->
        <div class="form-group mb-3">
            <label for="name">Product Size</label>
            <select name="size_id" id="size_id" class="form-control">
                <option value="">Select Size</option>
                <?php //$size = array('S', 'M', 'L', 'XL', 'XXL', 'XXXL'); ?>
                @foreach($sizes as $size)
                <option value="{{$size->size}}">{{$size->size}}</option>
                @endforeach
            </select>
        </div>
        <!-- color -->
        <div class="form-group mb-3">
            <label for="name">Product Color</label>
            <select name="color_id" id="color_id" class="form-control">
                <?php //$colors = array('Red', 'Blue', 'Green', 'Yellow', 'Black', 'White'); ?>
                <option value="">Select Color</option>
                @foreach($colours as $color)
                <option value="{{$color->colour}}">{{$color->colour}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="name">Product Price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price">
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="modal fade" id="EditProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Update Product</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateProductForm" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="prodiuct_id" id="prodiuct_id">
        <ul class = "alert alert-warning d-none" id="update_errorList"></ul>
        <div class="form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="edit_name" class="form-control" placeholder="Enter Product Name">
        </div>
        <div class="form-group mb-3">
            <label for="name">Product Description</label>
            <textarea name="description" id="edit_description" class="form-control" placeholder="Enter Product Description"></textarea>
            </div>
        <div class="form-group mb-3">
            <label for="name">Product Image</label>
            <input type="file" name="image" id="edit_image" class="form-control" placeholder="Enter Product Image">
        </div>
        <!-- size -->
        <div class="form-group mb-3">
            <label for="name">Product Size</label>
            <select name="size_id" id="edit_size_id" class="form-control">
                <option value="">Select Size</option>
                @foreach($sizes as $size)
                <option value="{{$size->size}}">{{$size->size}}</option>
                @endforeach
            </select>
        </div>
        <!-- color -->
        <div class="form-group mb-3">
            <label for="name">Product Color</label>
            <select name="color_id" id="edit_color_id" class="form-control">
                <option value="">Select Color</option>
                @foreach($colours as $color)
                <option value="{{$color->colour}}">{{$color->colour}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="name">Product Price</label>
            <input type="text" name="price" id="edit_price" class="form-control" placeholder="Enter Product Price">
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
  </div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        fetchproduct();
        function fetchproduct(){
            $.ajax({
                type: 'GET',
                url: "/fetch-product",
                dataType: 'json',
                success: function(response){
                    // console.log(response.products);
                    $('tbody').html("");
                    $.each(response.products,function($key, item){
                        $('tbody').append('<tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.product_name+'</td>\
                        <td>'+item.description+'</td>\
                        <td><img src="uploads/products/'+item.image+'" width="50px;" height="50px;" alt="Image"></td>\
                        <td>'+item.size+'</td>\
                        <td>'+item.color+'</td>\
                        <td>'+item.price+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_btn btn btn-success btn-sm">Edit</button></td>\
                        <td><button type="button" value="'+item.id+'" class="delete_btn btn btn-danger btn-sm">Delete</button></td>\
                        </tr>');


                    });
                },
        });
        }
        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            var prodiuct_id = $(this).val();
            $('#EditProduct').modal('show');
            $.ajax({
                type: 'GET',
                url: "/edit-product/"+prodiuct_id,
                success: function(response){
                    if(response.status == 404){
                        alert(response.message);
                        $('#EditProduct').modal('hide');
                    }else{
                        $('#prodiuct_id').val(response.product.id);
                        $('#edit_name').val(response.product.product_name);
                        $('#edit_description').val(response.product.description);
                        $('#edit_size_id').val(response.product.size);
                        $('#edit_color_id').val(response.product.color);
                        $('#edit_price').val(response.product.price);
                    }

                },
        });
        });
        $(document).on('submit', '#updateProductForm', function(e) {
            e.preventDefault();
            let formData =  new FormData($('#updateProductForm')[0]);
            $.ajax({
                type: 'POST',
                url: "/update-product",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 400){
                        $('#update_errorList').html("");
                        $('#update_errorList').removeClass('d-none');
                        $.each(response.errors, function(key, err_values){
                            $('#update_errorList').append('<li>'+err_values+'</li>');
                        });
                }else if(response.status == 200){
                    $('#update_errorList').html("");
                    $('#update_errorList').addClass('d-none');
                   $('#EditProduct').modal('hide');
                   fetchproduct();
                    alert(response.message);
                }
                },
            });
        });
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var prodiuct_id = $(this).val();
            if(confirm("Are you sure want to delete this product?")){
                $.ajax({
                type: 'GET',
                url: "/delete-product/"+prodiuct_id,
                success: function(response){
                    if(response.status == 404){
                        alert(response.message);
                    }else{
                        fetchproduct();
                        alert(response.message);
                    }

                },
        });}
        });
       $(document).on('submit', '#addProductForm', function(e) {
            e.preventDefault();
            let formData =  new FormData($('#addProductForm')[0]);
            $.ajax({
                type: 'POST',
                url: "/products",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 400){
                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        $.each(response.errors, function(key, err_values){
                            $('#save_errorList').append('<li>'+err_values+'</li>');
                        });
                }else if(response.status == 200){
                    $('#save_errorList').html("");
                    $('#save_errorList').addClass('d-none');
                    $('#addProductForm').find('input').val('');
                   $('#productModal').modal('hide');
                   fetchproduct();
                    alert(response.message);
                }
                },
            });
        })
    });
</script>
</html>
