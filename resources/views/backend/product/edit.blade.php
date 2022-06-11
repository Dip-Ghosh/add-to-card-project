<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="card text-white" style="background-color: #183757;">
                @if ($errors->any())
                    <div class="alert alert-dismissible fade show" style="color: black; background-color: #d4edda"
                         role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <br>
                <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Product</label>
                                    <input type="text" name="name" value="{{isset($product->name)?$product->name:''}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option @if($category->id == $product->category_id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input  value="{{isset($product->price)?$product->price:''}}" type="text" name="price" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">

                                <div class="custom-file" style="margin-top:31px" >
                                    <label class="custom-file-label" for="">Choose file</label>
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                           value="{{(isset($product->image) && !empty($product->image))? $product->image : null}}"  name="image">

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">
                                        {{isset($product->description)?$product->description:''}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class=" btn btn-info float-right">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="application/javascript">
    $(document).ready(function(){

        $fileName = "{{ $product->image }}"
        $('.custom-file-label').html($fileName);
    })
    $('input[type="file"]').change(function(e){
        var fileName =  e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
