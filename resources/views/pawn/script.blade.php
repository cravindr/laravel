<script>
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,

            element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);

        // for select 2 init
        $("#tbl_posts_body tr #item").select2({
            placeholder: "Select a Place",
            allowClear: true
        });
    });

    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        var didConfirm = confirm("Are you sure You want to delete");
        if (didConfirm == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();

            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {

                $(this).find('span.sn').html(index+1);
            });

            /*Assign total  Value in footer*/
            assignvalue();
            return true;
        } else {
            return false;
        }

    });

    jQuery(document).delegate('input.classinp', 'keyup', function(e) {
        e.preventDefault();

        $('#tbl_posts_body tr').each(function (index) {
            var weight = $(this).find('.clsweight').val();
            var deduction = $(this).find('.clsdeduction').val();
            var purity = $(this).find('.clspurity').val();
            if ($.isNumeric(weight) == true && $.isNumeric(deduction) == true) {
                var tot = parseFloat(weight) - parseFloat(deduction);
                $(this).find('.clsnet').val(fnFormat(tot,3));
                $(this).find('.clspure').val(fnPure(tot,purity));
            }
            if ($.isNumeric(weight) == true && $.isNumeric(deduction) == false) {
                $(this).find('.clsnet').val(fnFormat(weight,3));
                $(this).find('.clspure').val(fnPure(weight,purity));
            }

            if ($.isNumeric(weight) == false ) {
                $(this).find('.clsnet').val(0);
            }


        });

     /*Assign total  Value in footer*/
        assignvalue();
    });

    function fnPure(weight,per) {
        var pure=weight*per/100;
        return fnFormat(pure,3);
    }

    function assignvalue() {

        $('#tfooter #toatalcount').text(totalcount());
        $('#tfooter #toatalweight').text(totalweight());
        $('#tfooter #toataldeduct').text(totaldeduct());
        $('#tfooter #toatalnet').text(totalnet());
        $('#tfooter #toatalpure').text(totalpure());
    }

    function totalnet() {
        var sum = 0;
        $('#tbl_posts_body tr .clsnet').each(function () {
            sum += parseFloat($(this).val());
                    });
        return  fnFormat(sum,3);
    }
    function totalweight() {
        var sum = 0;
        $('#tbl_posts_body tr .clsweight').each(function () {
            sum += parseFloat($(this).val());
        });
        return  fnFormat(sum,3);
    }

    function totalcount() {
        var sum = 0;
        $('#tbl_posts_body tr .clscount').each(function () {
            sum += parseFloat($(this).val());
        });
        return  fnFormat(sum,3);
    }

    function totaldeduct() {
        var sum = 0;
        $('#tbl_posts_body tr .clsdeduction').each(function () {
            sum += parseFloat($(this).val());
        });

       return  fnFormat(sum,3);
    }
    function totalpure() {
        var sum = 0;
        $('#tbl_posts_body tr .clspure').each(function () {
            sum += parseFloat($(this).val());
        });

        return  fnFormat(sum,3);
    }


    function fnFormat(sum,num)
    {
        if( isNaN( parseFloat( sum ) ) ) return;
        return  parseFloat(sum).toFixed(num);
    }

$(function () {

    /*insert first row of the table*/
    var content = jQuery('#sample_table tr'),
        size = jQuery('#tbl_posts >tbody >tr').length + 1,
        element = null,

        element = content.clone();
    element.attr('id', 'rec-'+size);
    element.find('.delete-record').attr('data-id', size);
    element.appendTo('#tbl_posts_body');
    element.find('.sn').html(size);

    // for select 2 init
    $("#tbl_posts_body tr #item").select2({
        placeholder: "Select a Place",
        allowClear: true
    });


});

</script>
