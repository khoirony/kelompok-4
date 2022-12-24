@extends("app")

@section("title", "List Sample")

@section("content_app")
 
<div class="col-lg-12 col-md-10 ml-auto mr-auto">
    <h4><small>Table Actions</small></h4>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Job Position</th>
                    <th>Since</th>
                    <th class="text-left">Salary</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td>Andrew Mike</td>
                    <td>Develop</td>
                    <td>2013</td>
                    <td class="text-left">€ 99,225</td>
                    <td class="td-actions text-center">
                        <button type="button" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                            <i class="material-icons">person</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

</div>

@endsection