<script type="text/javascript">
	

$(document).ready(function () {


listDefaultPaymentList(); 
listDefaultReceiptList(); 

     var paymentListTable =  $('#paymentListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#paymentListSearch').on( 'keyup', function () {
        paymentListTable.search( this.value ).draw();
    } );

     var receiptListTable =  $('#receiptListTable').DataTable({
        dom: 'Brtip',
        buttons: [
            'copy', 'csv', 'excel'
        ],
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#receiptListSearch').on( 'keyup', function () {
        receiptListTable.search( this.value ).draw();
    } );


function listDefaultPaymentList() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('billing/get_payment_list_default'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(response)
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

          //   $.ajax({
          // type  : 'post',
          // url   : '<?php echo base_url('billing/invoice_total'); ?>',
          // data: {
          //     patient_id: patient_id,
          //     invoice_id: invoice_id
          //   },
          // async : false,
          // dataType : 'json',
          // success : function(response2){
          //   //console.log(response2);

          //   response3 = response2
          //   }

          // });
            //console.log(response3)




            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="payment_dialog(event)" data-type="black" data-size="l" data-title="Receipts" href="<?php echo base_url('billing/cash_payment/'); ?>' + response[i].items_group_id+ '"> <i class="fa fa-pencil"></i></button> '

            html += '<tr><td>' + sn++ +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].amount_total +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#paymentList').html(html);
        }

      });

    }


function listDefaultReceiptList() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('billing/get_receipt_list_default'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        console.log(response)
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

            $.ajax({
          type  : 'post',
          url   : '<?php echo base_url('billing/invoice_total'); ?>',
          data: {
              patient_id: patient_id,
              invoice_id: invoice_id
            },
          async : false,
          dataType : 'json',
          success : function(response2){
            //console.log(response2);

            response3 = response2
            }

          });
            //console.log(response3)




            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="payment_dialog(event)" data-type="black" data-size="l" data-title="Receipts" href="<?php echo base_url('billing/cash_payment/'); ?>' + response[i].invoice_id+ '"> <i class="fa fa-pencil"></i></button> '

            html += '<tr><td>' + sn++ +
              '</td><td>' + response[i].date+
              '</td><td>' + response[i].ReceiptNo +
              '</td><td>' + response[i].HospNo +
              '</td><td>' + response[i].Name +
              '</td><td>' + response[i].TransType +
              '</td><td>' + response[i].Service +
              '</td><td>' + response[i].Total +
              '</td><td>' + response[i].PartPayment +
              '</td><td>' + response[i].Debt +
              '</td><td>' + response[i].DebtPaid +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#receiptList').html(html);
        }

      });

    }


});


  function filter_receipt_list() {
    $('#receiptListTable').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#receiptListTable').dataTable().fnDraw();
    $('#receiptListTable').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
   // var status = document.getElementById('status').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listPayment();

    //$('#filteredPatients').show();
    //var prescriptionTable = $('#prescriptionMasterList').DataTable()    


   var receiptListTable =  $('#receiptListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#receiptListSearch').on( 'keyup', function () {
        receiptListTable.search( this.value ).draw();
    } );


   
function listPayment() {
     
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('billing/get_payment_list_filtered_receipt'); ?>',
      data: {
          //doctor_id: doctor_id,
          date_range_from: date_range_from,
          date_range_to: date_range_to,
          //clinic_id: clinic_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(date_range_from);
        //console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

          
            $.ajax({
          type  : 'post',
          url   : '<?php echo base_url('pharmacy/convert_date'); ?>',
          data: {
              date: response[i].date_added,
            },
          async : false,
          dataType : 'json',
          success : function(response2){
            //console.log(response2);

            response3 = response2
            }

          });


            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="payment_dialog(event)" data-type="black" data-size="l" data-title="Receipts" href="<?php echo base_url('billing/cash_payment/'); ?>' + response[i].invoice_id+ '"> <i class="fa fa-pencil"></i></button> '

            html += '<tr href="<?php echo base_url('billing/get_receipt_details/'); ?>'+response[i].invoice_id+'" data-test="Hallelujah" onclick="get_receipt_details(event)"><td>' + sn++ +
              '</td> <td>' + response3  +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].invoice_id +
              '</td> <td>' + response[i].patient_name +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>0' +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#receiptList').html(html);
        }

      });

    }

  }
function get_receipt_details(event){
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var test = element.data('test');
    console.log(url);
    var title = "Receipt Details"


   var a = $.confirm({
        title: 'Receipt Details',
        columnClass:"m",
        content: function () {
                  var self = this;
                  return $.ajax({
                      url: url,
                      method: 'get',
                  }).done(function (data) {
                      self.setContent(data);
                      //self.setTitle(title);
                  }).fail(function(){
                      self.setContent('Something went wrong');
                  });
              },
        buttons: {

            Close: { 
                btnClass: "btn-purple",
                action: function () {

                }

            }
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {

                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
  //end of dialog if..else

}

function filter_payment_list() {
    $('#paymentListTable').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#paymentListTable').dataTable().fnDraw();
    $('#paymentListTable').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
    var status = document.getElementById('status').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listPayment();

    //$('#filteredPatients').show();
    //var prescriptionTable = $('#prescriptionMasterList').DataTable()    


   var paymentListTable =  $('#paymentListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#paymentListSearch').on( 'keyup', function () {
        paymentListTable.search( this.value ).draw();
    } );


   
function listPayment() {
     
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('billing/get_payment_list_filtered'); ?>',
      data: {
          status: status,
          //doctor_id: doctor_id,
          date_range_from: date_range_from,
          date_range_to: date_range_to,
          //clinic_id: clinic_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(date_range_from);
       // console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

            //   $.ajax({
            // type  : 'post',
            // url   : '<?php echo base_url('billing/invoice_total'); ?>',
            // data: {
            //     patient_id: patient_id,
            //     invoice_id: invoice_id
            //   },
            // async : false,
            // dataType : 'json',
            // success : function(response2){
            //   //console.log(response2);

            //   response3 = response2
            //   }

            // });
            //console.log(response3)


            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="payment_dialog(event)" data-type="black" data-size="l" data-title="Receipts" href="<?php echo base_url('billing/cash_payment/'); ?>' + response[i].items_group_id+ '"> <i class="fa fa-pencil"></i></button> '

            html += '<tr><td>' + sn++ +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_id_num +
              // '</td> <td>' + response[i].invoice_id +
              '</td> <td>' + response[i].amount_total +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#paymentList').html(html);
        }

      });

    }

  }

        function printDiv() {
            var divContents = document.getElementById("invoiceList").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
function payment_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var status = element.data('status');
    var size = element.data('size');
    //console.log(url);
    var btn_text = "Save"
    var btn_color = "btn-purple"

   var a = $.confirm({
        title: 'Prompt!',
        columnClass:size,
        content: function () {
                  var self = this;
                  return $.ajax({
                      url: url,
                      method: 'get',
                  }).done(function (data) {
                      self.setContent(data);
                      self.setTitle(title);
                  }).fail(function(){
                      self.setContent('Something went wrong');
                  });
              },
        buttons: {

            paymentSubmit: {
                text: btn_text,
                btnClass: btn_color,
                action: function () {

                  var confirmsir = "No"
                  	//return false;
                          ////
                            var formData = $('#add-payment').serialize();
                            //var amount = $("#main_amount").val()
                            console.log(formData);

                            // if (amount != '') {
                                $.confirm({
                                    title: 'Save Payment',
                                    content: 'Are you sure you want to Save Payment?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                    buttons: {
                                        yes: function() {
                                            $.post("<?php echo base_url() .  'billing/save_payment'; ?>", formData).done(function(data) {
                                            });


                            // if (amount != '') {
                                $.confirm({
                                    title: 'Print Receipt',
                                    content: 'Are you sure you want to Print?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                    buttons: {
                                        yes: function() {

                                            printDiv()
                                            ///Close Big Dialog
                                            location.reload()
                                            a.close();
                                            ///Refresh Prescription Table
                                        //filter_prescriptions()
                                        },
                                        no: function() {

                                        }
                                    }
                                });



                                            ///Close Big Dialog
                                            // location.reload()
                                            // a.close();
                                            ///Refresh Prescription Table
                                        //filter_prescriptions()
                                        },
                                        no: function() {

                                        }
                                    }
                                });
                            // } else {
                            //    // $("#amt_error").text('Total must greater than zero (0)')

                            //     return false
                            // }

                        //console.log(confirmsir);
                  if (confirmsir=='No') {
                    return false;
                  }
                  else {
                    return true;
                  }


                }
            },
            Close: function () {
                //close
                //return false;
            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {

                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
  //end of dialog if..else

}
</script>