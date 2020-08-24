


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 7 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('lamp.store') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($lamps as $lamp)
        <tr>
            <td>
                <form action="{{ route('lamp.update',$lamp->id) }}" method="POST">
                  @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">on/off</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


