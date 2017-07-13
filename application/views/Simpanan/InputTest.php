        <?php echo form_open('SimpananCont/searchTest') ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <table>
                <tr>
                    <td><input id="provider-json" /></td>
                    <td><input id="data-holder"/></td>
                </tr>
            </table>            
        </div>
    </div>
    <style type="text/css">
    /**
    * Override feedback icon position
    * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
    */
    #eventForm .form-control-feedback {
        top: 0;
        right: -15px;
    }
    </style>


    <script type="text/javascript">
        var options = {
            //url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>datos/getdatos",
            
            getValue: "ciudad",
            
            theme:"blue-light",

            // template: {
            //  type: "description",
            //  fields: {
            //      description: "cantHabit"
            //  }
            // },

            template: {
             type: "custom",
             method: function(value, item) {
                 return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
             }
            },

            // template: {
            //     type: "iconLeft",
            //     fields: {
            //         iconSrc: "img"
            //     }
            // },

            list: {
                maxNumberOfElements: 5,
                match: {
                    enabled: true
                },
                // onClickEvent: function(value, item) {
                //  alert('seleccionado');
                // },
                onClickEvent: function() {
                    var value = $("#provider-json").getSelectedItemData().idCiudad;

                    $("#data-holder").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#provider-json").getSelectedItemData().idCiudad;

                    $("#data-holder").val(value).trigger("change");
                }
            }
        };

        $("#provider-json").easyAutocomplete(options);
    </script>

</body>

</html>

<?php echo form_close();?>