$(document).ready(function () {

    $(".content-container, .image_list_container").on('click', '.remove-btn', function () {

        var $data_url = $(this).data("url");

        swal({
            title:'Are you sure?',
            text: "Once deleted, you will not be able to recover this imaginary file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: "No, cancel!"
        }).then(function (result) {
            if (result.value) {

                window.location.href = $data_url;
            }
        });

    })

    $(".content-container, .image_list_container").on('change', '.isActive', function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function (response) {

            });
        }
    })

    $(".image_list_container").on('change', '.isCover', function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();

                $('#datatable').DataTable( {
                    "ordering": false,
                } );

            });
        }
    })

    $(".content-container, .image_list_container").on("sortupdate", '.sortable', function (event, ui) {

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, { data: $data }, function (response) { })
    })

    $(".button_usage_btn").change(function(){

        $(".button-information-container").slideToggle();

    })

    var uploadSection = Dropzone.forElement("#dropzone");
    
    uploadSection.on("complete", function (file) {

        var $data_url = $("#dropzone").data("url");

        $.post($data_url, {}, function (response) {

            $(".image_list_container").html(response);

            $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });

            $(".sortable").sortable();

            $('#basic-datatables').DataTable( {
                "ordering": false,
            } );

        });
    })
  
})