
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Product</h1>
                </div>
            </div>
        </div>
    </div>

    <a href="{{route('products.create')}}" class="btn btn-primary btn-xs ">Add New Product</a>
    <section class="content">
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
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Logo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @if(isset($products) && !empty($products))
                        @foreach($products as $datum)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$datum->name}}</td>
                                <td>{{$datum->category_name}}</td>
                                <td>{{$datum->description}}</td>
                                <td>{{$datum->price}}</td>
                                <td>

                                    <img src="{{(isset($datum->image) && !empty($datum->image))?asset('uploads/'. $datum->image) : asset('uploads/close.png')}}"
                                         width="60px" height="50px" alt="">
                                </td>

                                <td>
                                    <form action="{{ route('products.destroy',$datum->id)}}" method="POST">
                                        @CSRF
                                        @method('DELETE')
                                        <a href="{{route('products.edit',$datum->id)}}" class="btn btn-sm btn-success">Edit</a>

                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure to delete?')">Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" align="center">No Record Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>

        </div>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

