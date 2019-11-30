<form enctype="multipart/form-data" action="{{ URL::to('pawn/save')  }}" method="post">
    @csrf
    <table class="table table-bordered" id="tbl_posts" width="100%">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th width="20%">Item</th>
            <th width="10%"  >Count</th>
            <th width="10%">Weight</th>
            <th width="10%">Deduction</th>
            <th width="5%">Purity</th>
            <th width="10%">Net Weight</th>
            <th width="10%">Pure</th>
            <th width="10%">Comments</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tbl_posts_body">

        </tbody>
        <tfoot id="tfooter">
        <tr>
            <th></th>
            <th></th>
            <th><p><i class="fas fa-copyright primary" style="color:green"></i>&nbsp;&nbsp;&nbsp;:&nbsp;<b> <span id="toatalcount" class="pull-right"></span> </b></p></th>
            <th><p><i class="fas fa-text-height" style="color:deepskyblue"></i>&nbsp;&nbsp;&nbsp;:&nbsp;<b> <span id="toatalweight" class="pull-right"></span> </b></p></th>
            <th><p><i class="far fa-minus-square" style="color:red"></i><b>&nbsp;&nbsp;&nbsp;:&nbsp; <span id="toataldeduct" class="pull-right"></span> </b></p></th>
            <th></th>
            <th><p>    <i class="fas fa-balance-scale-right" style="color:green"></i>&nbsp;&nbsp;&nbsp;:&nbsp;<b> <span id="toatalnet" class="pull-right"></span> </b></p></th>
            <th><p><i class="fas fa-percentage" style="color:goldenrod"></i>&nbsp;&nbsp;&nbsp;:&nbsp;<b> <span id="toatalpure" class="pull-right"></span> </b></p></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
    <button name="sumit" class="btn btn-info pull-right"> <i class="far fa-save"></i> Pledge</button>
    </div>





</form>
