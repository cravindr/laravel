<form enctype="multipart/form-data" action="{{ URL::to('saveform')  }}" method="post">
    @csrf
    <table class="table table-bordered" id="tbl_posts">
        <thead>
        <tr>
            <th>#</th>
            <th>Post Name</th>
            <th>No. of Vacancies</th>
            <th>Age</th>
            <th>Pay Scale</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tbl_posts_body">
        <tr id="rec-1">
            <td><span class="sn">1</span>.</td>
            <td>Sanitary Inspector</td>
            <td>02</td>
            <td>21 to 42 years</td>
            <td>5200-20200/-</td>
            <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <tr id="rec-2">
            <td><span class="sn">2</span>.</td>
            <td>Tax & Revenue Superintendent</td>
            <td>02</td>
            <td>21 to 42 years</td>
            <td>5200-20200/-</td>
            <td><a class="btn btn-xs delete-record" data-id="2"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>

        <tr id="rec-3">
            <td><span class="sn">3</span>.</td>
            <td>Tax & Revenue Inspector</td>
            <td>04</td>
            <td>21 to 42 years</td>
            <td>5200-20200/-</td>
            <td><a class="btn btn-xs delete-record" data-id="3"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        </tbody>
    </table>
    </div>

    <button name="sumit">Submit</button>
</form>
