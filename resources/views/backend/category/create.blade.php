
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Category</h1>
                </div>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible">{{ $message }}  <button type="button" class="close" data-dismiss="alert">×</button></div>
    @endif
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
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <input type="text" name="category" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-1" style="margin-top: 31px;">
                                    <button type="submit" class="form-group form-control btn btn-info">
                                        Submit
                                    </button>
                                </div>

                            </div>
                            <div class="row">

                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>



