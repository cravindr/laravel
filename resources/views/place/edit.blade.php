<!-- The Modal -->
<div class="modal" id="placeedit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{URL::to('updateplace')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Short Code</label>
                        <input type="text" name="short_code" id="short_code" class="form-control" placeholder="Please Enter Short Code eg. PER">
                    </div>
                    <div class="form-group">
                        <label>Place Name</label>
                        <input type="text"  name="name" id="name" class="form-control" placeholder="Please Enter Place Name eg. Perumagalru">
                    </div>
                    <div class="form-group">
                        <button name="save" class="btn btn-primary">Update</button>

                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
