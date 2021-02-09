
<script type="text/javascript">
  function assign_menu_to_role(id) {

            var role_id = document.getElementById('role_id').value;
            console.log(role_id);

       
            if ($('#menu_child_id'+id).is(":checked"))
            {
              console.log('checked');
            //var row = datagrid.getRowData(rowIndex);
            $.post("<?php echo base_url() . 'menu/assign_menu_to_role'; ?>", {role_id : role_id,menu_child_id : id,status : 1}).done(function(data) {
             //window.location = "<?php echo base_url().'students/manage'; ?>";
            });
            }
            else {
            //var row = datagrid.getRowData(rowIndex);
             console.log('unchecked');
            $.post("<?php echo base_url() . 'menu/assign_menu_to_role'; ?>", {role_id : role_id,menu_child_id : id,status : 0}).done(function(data) {
             //window.location = "<?php echo base_url().'students/manage'; ?>";
            });
            }

  }
    function get_url() {


      var role = document.getElementById('role').value;
      var role2 = $('#role option:selected').text();
      if (role !='') {

      document.getElementById("select_btn").removeAttribute("disabled");
      document.getElementById("select_btn").setAttribute("href","<?php echo base_url('menu/assign2/'); ?>"+role);
      document.getElementById("select_btn").setAttribute("data-title","Assign Roles for "+role2);
      }
      else {
        document.getElementById("select_btn").setAttribute("disabled","");
      }

      console.log(role);
    }
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-menu').disable([".action"]);
        $("button[title='add_menu']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'menu/validate_menu_name'; ?>", async: false, type: 'POST', data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-menu').enable([".action"]);
        $("button[title='add_menu']").html("Save changes");
        if (returnData != 'success') {
            $('#add-menu').enable([".action"]);
            $("button[title='add_menu']").html("Save changes");
            $('.form-control-feedback').html('');
            $('.form-control-feedback').each(function() {
                for (var key in returnData) {
                    if ($(this).attr('data-field') == key) {
                        $(this).html(returnData[key]);
                    }
                }
            });
        } else {
            return 'success';   
        }
        console.log(returnData);
    }

    function save_menu_name(formData) {
        $("button[title='add_menu']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'menu/add_menu_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('menu'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_menu') {
            var formData = $('#add-menu').serialize();
            if (validate(formData) == 'success') {
                swal({   
                    title: "Please check your data",   
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    cancelButtonText: "Cancel",
                    confirmButtonText: "Save",
                    closeOnConfirm: true 
                },
                function (isConfirm) {
                if (isConfirm) {
                    save_menu_name(formData);

                  }
                }
                ); 
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends    

    /////Add Session form begins
    function validate_submenu(formData) {
        var returnData;
        $('#add-submenu').disable([".action"]);
        $("button[title='add_submenu']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'menu/validate_submenu_name'; ?>", async: false, type: 'POST', data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-submenu').enable([".action"]);
        $("button[title='add_submenu']").html("Save changes");
        if (returnData != 'success') {
            $('#add-submenu').enable([".action"]);
            $("button[title='add_submenu']").html("Save changes");
            $('.form-control-feedback').html('');
            $('.form-control-feedback').each(function() {
                for (var key in returnData) {
                    if ($(this).attr('data-field') == key) {
                        $(this).html(returnData[key]);
                    }
                }
            });
        } else {
            return 'success';   
        }
        console.log(returnData);
    }

    function save_submenu_name(formData) {
        $("button[title='add_submenu']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'menu/add_submenu_name'; ?>", formData).done(function(data) {

            location.reload()
        });
    }

    function form_routes_addsub(action) {
        if (action == 'add_submenu') {
            var formData = $('#add-submenu').serialize();
            if (validate_submenu(formData) == 'success') {
                swal({   
                    title: "Please check your data",   
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    cancelButtonText: "Cancel",
                    confirmButtonText: "Save",
                    closeOnConfirm: true 
                },
                function (isConfirm) {
                if (isConfirm) {
                    save_submenu_name(formData);

                  }
                }
                ); 
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends



    function delete_menu_name(rowIndex) {
      swal({   
        title: "Are you sure want to delete this data?",   
        text: "Deleted data can not be restored!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancel",
        confirmButtonText: "Proceed",
        closeOnConfirm: true 
      },
                function (isConfirm) {
                if (isConfirm) {
        $.post("<?php echo base_url() . 'menu/delete_menu_name'; ?>", {id : rowIndex}).done(function(data) {
         location.reload();
        });

      }
      });
    }


    function delete_menu_child_name(rowIndex) {
      swal({   
        title: "Are you sure want to delete this data?",   
        text: "Deleted data can not be restored!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancel",
        confirmButtonText: "Proceed",
        closeOnConfirm: true 
      },
                function (isConfirm) {
                if (isConfirm) {
        $.post("<?php echo base_url() . 'menu/delete_submenu_name'; ?>", {id : rowIndex}).done(function(data) {
         location.reload();
        });

      }
      });
    }

      ////Function to show form for session editing
          function get_menu_data(idr) {
          $.ajax({
          type: "POST",
          url: '<?php echo base_url('menu/get_menu_details')?>',
          dataType : 'json',
          data: {id: idr},
          success: function(data){

                  var menu_parnet_name = data[0].menu_parent_name;
                 // var class_id = data[0].id;
                  $('[name="menu_parent_name"]').val(menu_parent_name);
                  $('[name="menu_id"]').val(idr);
          }
        });
          }

      ////Function to show form for session editing
          function get_submenu_data(idr) {
          $.ajax({
          type: "POST",
          url: '<?php echo base_url('menu/get_submenu_details')?>',
          dataType : 'json',
          data: {id: idr},
          success: function(data){

                  var sub_menu_name = data[0].menu_child_name;
                 // var class_id = data[0].id;
                  $('[name="menu_child_name"]').val(menu_child_name);
                  $('[name="menu_child_id"]').val(idr);
          }
        });
          }

         ///This clears textbox on modal toggle
          function clear_textbox() {
            $('input[type=text]').each(function() {
                $(this).val('');
            });
          }
          function get_menu_id(m_id) {

              $('[name="menu_id"]').val(m_id);
          }

</script>