
<script type="text/javascript">
    
    



    function delete_staff_name(rowIndex) {
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
        $.post("<?php echo base_url() . 'staff/delete_staff_name'; ?>", {id : rowIndex}).done(function(data) {
         location.reload();
        });

      }
      });
    }

      ////Function to show form for session editing
          function get_staff_data(idr) {
          $.ajax({
          type: "POST",
          url: '<?php echo base_url('staff/get_staff_details')?>',
          dataType : 'json',
          data: {id: idr},
          success: function(data){

            console.log(data);
                  var staff_title = data[0].staff_title;
                  var firstname = data[0].staff_firstname;
                  var lastname = data[0].staff_lastname;
                  var gender = data[0].staff_gender;
                  var email = data[0].staff_email;
                  var phone = data[0].staff_phone;
                  var dob = data[0].staff_dob;
                  var address = data[0].staff_address;
                  var state = data[0].staff_state;
                  var department = data[0].department_id;
                  var role = data[0].role_id;
                  var username = data[0].username;
                  var password = data[0].password;
                  var cpassword = data[0].password;
                  var can_consult = data[0].can_consult;
                  //var staff_id = data[0].idr;

                  $('[name="staff_id"]').val(idr);
                  $('[name="title"]').val(staff_title);
                  $('[name="firstname"]').val(firstname);
                  $('[name="phone"]').val(phone);
                  $('[name="lastname"]').val(lastname);
                  $('[name="email"]').val(email);
                  $('[name="role"]').val(role);
                  $('[name="dob"]').val(dob);
                  $('[name="address"]').val(address);
                  $('[name="state"]').val(state);
                  $('[name="username"]').val(username);
                  $('[name="password"]').val(password);
                  $('[name="cpassword"]').val(cpassword);
                  $('[name="department"]').val(department);
                  $('[name="gender"]').val(gender);
                  if (can_consult =='1') {
                  //document.getElementById("can_consult").checked = true;
                  }
          }
        });
          }

         ///This clears textbox on modal toggle
          function clear_textbox() {
             $('[name="title"]').val('');
             $('[name="department"]').val('');
             $('[name="role"]').val('');
             $('[name="gender"]').val('');
            $('input[type=date]').each(function() {
                $(this).val('');
            });
            $('input[type=number]').each(function() {
                $(this).val('');
            });
            $('input[type=email]').each(function() {
                $(this).val('');
            });
            $('input[type=text]').each(function() {
                $(this).val('');
            });
          }
///////
$(document).ready(function () {
listStaff(); 
  var table = $('#staffListing').dataTable({     
    "bPaginate": true,
    "bInfo": true,
    "bFilter": true,
    "bLengthChange": true,
    "pageLength": 10   
  }); 


  // list all employee in datatable
  function listStaff(){
    $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('staff/get_staff_details2'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        console.log(response);
        var html = '';
        var i;
        var j=1;
        for(i=0; i<response.length; i++){
               if (response[i].can_consult==1) {
                                   var can_consult = "<input type='checkbox' id='consult"+response[i].s_id+"' onclick='toggle_consult("+response[i].s_id+")' checked>";
                                  }
                                  else {
                                    var can_consult = "<input type='checkbox' id='consult"+response[i].s_id+"' onclick='toggle_consult("+response[i].s_id+")'>";
                                  }

          html += '<tr><td>'+j+
                  '</td> <td>'+response[i].title+
                  '</td> <td>'+response[i].staff_lastname+', '+response[i].staff_firstname+
                  '</td> <td>'+response[i].staff_gender+
                  '</td> <td>'+response[i].staff_phone+
                  '</td> <td>'+response[i].staff_email+
                  '</td> <td>'+response[i].name+
                  '</td> <td style="text-align:center">'+can_consult+
                  '</td> <td><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiEdit(event)" data-type="purple" data-size="s" data-title="Edit '+response[i].staff_lastname+', '+response[i].staff_firstname +'" href="<?php echo base_url('staff/new_staff/'); ?>'+response[i].s_id+'"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button> </td> </tr>';
        j++;
        }
        $('#listStaff').html(html);         
      }

    });
  }
});


function toggle_consult(id) {

          $("#consult"+id).change(function() {
          if(this.checked) {

            $.post("<?php echo base_url() . 'staff/update_consult'; ?>", {id : id,can_consult : "1"}).done(function(data) {

          //console.log(data);
        });
              //console.log(student_id);
          }
          else {

            $.post("<?php echo base_url() . 'staff/update_consult'; ?>", {id : id,can_consult : "0"}).done(function(data) {

          //console.log(data+"OK");
        });
          }
      })
}
</script>