<div style="display:none;">
    <table class="table" id="sample_table">
        <tr>
            <td><span class="sn"></span>.</td>

            <td >
                <select name="item[]" id="item" class="form-control" placeholder="Select Item">
                    @foreach($items as $item )
                    <option value="{{$item->id}}|{{$item->description}}">{{$item->description}}</option>
                        @endforeach
                </select>
            </td>


            <td><input type="text" name="count[]" class=" form-control clscount " ></td>
            <td><input type="text" name="weight[]" class=" form-control classinp clsweight"></td>
            <td><input type="text" name="deduction[]" class=" form-control classinp clsdeduction"></td>
            <td><input type="text" name="purity[]" class=" form-control classinp clspurity"></td>
            <td><input type="text" name="netweight[] " class=" form-control classinp clsnet" readonly></td>
            <td><input type="text" name="pure[] " class=" form-control classinp clspure" readonly></td>
            <td><input type="text" name="comments[]" class=" form-control"> </td>
            <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash" style="color:red"></i></a></td>
        </tr>
    </table>
</div>

{{--
<table class="table table-bordered" id="testtbl">
    <tbody id="testbody">
    </tbody>
</table>
--}}

<script>
/*
    $('.add-record').click(function () {
        var html = body();
        $('#testtbl #testbody').append(html);
    });

    $('#testtbl #testbody').on('click','#btndel',function () {
        $(this).closest('tr').remove();
    });



    function body() {
        var html = '<tr>';
        html += '<td> <select name="item[]" id="item" class="form-control" placeholder="Select Item">\n' +
            '                    @foreach($items as $item )\n' +
            '                    <option value="{{$item->id}}">{{$item->description}}</option>\n' +
            '                        @endforeach\n' +
            '                </select></td>';
        html += '<td><input type="text" name="weight[]" id="weight"></td>';
        html += '<td><input type="text" name="count[]" ></td>';
        html += '<td><button id="btndel">delete</button></td>';
        html += '</tr>';

        return html;
    }*/
</script>

