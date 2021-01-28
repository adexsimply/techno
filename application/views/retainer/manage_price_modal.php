<div class="col-12">
	<div class="card box-margin">
        <div class="card-body">
			<form id="add-patient" action="<?php echo base_url('patient/upload_patient'); ?>" method="post" enctype="multipart/form-data">
				
				<div class="col-lg-12 col-md-12">

					<fieldset>

						<div class="form-row mt-2">
							<div class="form-group col-md-12">
							  	<label for="docName">Item Type</label>
								<select onchange="get_item_list()" class="form-control" name="bill_group" id="item_option">
									<option value="">Select</option>
									<option value="A">Drug</option>
									<option value="B">Laboratory</option>
									<option value="C">Service</option>
								</select>
								<span style="color:#ff0000;" class="error bill_group"></span>
							</div>
						</div>
					</fieldset>


					<fieldset>
						<div class="form-row mt-2">

							<div class="form-group col-md-6">
								<label>&nbsp;</label>
								<select class="form-control" size="10" id="item_list">
									
								</select>
							</div>

							<div class="form-group col-md-6">
								<label>General Service Charges Details</label>
								<!-- <select class="form-control" size="10" id="item_list2">
									
								</select> -->
								<div style="max-height: 350px;overflow-x: scroll;font-size: 14px;" id="item_list2">
									
								</div>
							</div>
						</div>
						
					</fieldset>

					
					<div class="d-flex justify-content-end">
						<input type="submit" title="add_patient" class="btn btn-primary px-4 m-2" value="Submit">
					</div>

				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	
  // list all employee in datatable
  function get_item_list(){

  	var item_option = $('#item_option').val();
  	if (item_option=='A') {
  		var url = '<?php echo base_url('drug/get_drug_groups'); ?>';
  	}
  	else if (item_option=='B') {
  		var url ='';
  	}
    $.ajax({
      type  : 'ajax',
      url   : url,
      async : false,
      dataType : 'json',
      success : function(response){
       // console.log(response);
        var html = '';
        var i;
        var j=1;
        for(i=0; i<response.length; i++){

        	html += '<option class="form-control" onclick="get_drug_items('+response[i].id+')" value='+response[i].id+'>'+response[i].drug_group_name+'</option>';

        }
        $('#item_list').html(html);         
      }

    });
  }
  function get_drug_items(id){
  	var retainer = '<?php echo $this->uri->segment(3); ?>';
    $.ajax({
      type  : 'POST',
      url   : '<?php echo base_url('drug/get_drug_items_by_id'); ?>',
      async : false,
      data: {id: id},
      dataType : 'json',
      success : function(response){
        console.log(response);
        var html = '';
        var i;
        var j=1;

        	html +='<table class="table table-bordered" style="border-collapse: collapse;font-size:12px;"><thead><tr><td>Drug</td><td>Default Price</td><td>option</td><td>Price</td></tr>';
        for(i=0; i<response.length; i++){

        	html += '<tr><td>'+response[i].drug_item_name+'</td><td>'+response[i].drug_cost+'</td><td></td><td><button type="button" data-item1="'+id+'" data-item2="'+response[i].id+'" data-retainer="'+retainer+'" data-title="'+response[i].drug_item_name+'" onclick="add_price(event)" class="btn btn-sm btn-icon btn-pure btn-default"><i class="icon-plus" aria-hidden="true"></i></button></td></tr>'

        }
        html +='</table>';
        $('#item_list2').html(html);         
      }

    });
  }

  function add_price(id) {
  	console.log(id) 
  	event.preventDefault();
    /*var element = $(event.target).is('a') ? $(event.target) : $(event.target).parents('a');*/
    var element = $(event.currentTarget);
    var title = element.data('title');
    var retainer_id = element.data('retainer');
    var item_id = element.data('item1');
    var item_type_id = element.data('item2');
  	$.confirm({
    title: title,
    content: '' +
    '<form action="" class="formName">' +
    '<div class="form-group">' +
    '<label>Enter Price Here</label>' +
    '<input type="text" placeholder="Price" class="price form-control" required />' +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var price = this.$content.find('.price').val();
                if(!price){
                    $.alert('provide a valid price');
                    return false;
                }

                $.alert('Your name is ' + price);



    $.ajax({
      type  : 'POST',
      url   : '<?php echo base_url('retainer/submit_price'); ?>',
      async : false,
      data: {retainer_id: retainer_id, price: price, item_id: item_id, item_type_id: item_type_id},
      dataType : 'json',
      success : function(response){
        console.log(response);
        

      }

    });







            }
        },
        cancel: function () {
            //close
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
  }
</script>