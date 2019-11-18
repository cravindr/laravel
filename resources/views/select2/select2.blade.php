<html lang="en">


<head>
    <title>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>


<body>


<div class="container">


    <h2>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</h2>
    <br/>
    <select class="itemName form-control" style="width:500px;" name="itemName"></select>

    <h2>Group Data</h2>
    <br/>
    <select class="itemName form-control" style="width:500px;" name="groupdata" id="groupdata"></select>


</div>


<script type="text/javascript">


    $('.itemName').select2({
        placeholder: 'Select an item',
        ajax: {
            url: '/select2-autocomplete-ajax',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });




</script>


<script>

    /*var data = [
        {
            "id": 10,
            "text": "Group_One",
            "children": [{"id": 11, "text": "Field_1_Group_One"}, {"id": 12, "text": "Field_2_Group_One"}]
        }, {
            "id": 20,
            "text": "Group_Two",
            "children": [{"id": 21, "text": "Field_1_Group_Two"}, {"id": 22, "text": "Field_2_Group_Two"}]
        }]*/


    $.ajax({
        url: 'select2-groupdata',
        success:function (data) {
            $("#groupdata").select2({
                data: data
            })
        }
    });




</script>

</body>
</html>
