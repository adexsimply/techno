<!-- Add new history Modal -->
<style>
    body {
        counter-reset: Serial;
        /* Set the Serial counter to 0 */
    }

    input[type='radio'] {
        //transform: scale(2);
    }

    .parameterTable td:first-child:before {
        counter-increment: Serial;
        /* Increment the Serial counter */
        content: counter(Serial);
        /* Display the counter */
    }

    .summaryTable td:first-child:before {
        counter-increment: Serial;
        /* Increment the Serial counter */
        content: counter(Serial);
        /* Display the counter */
    }

#lab-test-modal .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#lab-test-modal .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#lab-test-modal thead th, #lab-test-modal tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
#lab-test-modal .form-group {
     margin-bottom: 1px; 
}
#lab-test-modal .form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 1px;
    font-size: 12px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#lab-test-modal select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<div class="col-12" id="lab-test-modal">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-test">
                    <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="docName">Name</label>
                                <input type="text" class="form-control time12" name="name" placeholder="CHLORIDE CL" value="<?php if (isset($lab_test->lab_test_name)) { echo $lab_test->lab_test_name; } ?>">
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="name"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="docName">Measure</label>
                                <input type="text" class="form-control" name="measure" placeholder="mmol/L" value="<?php if (isset($lab_test->measure)){ echo $lab_test->measure; } ?>">
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="measure"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="docEmail">Group</label>
                                <select class="form-control" name="group" id="group">
                                    <option value="">Select Group</option>
                                    <?php foreach ($lab_groups_list as $lab_group) { ?>
                                        <option value="<?php echo $lab_group->id; ?>" <?php if (isset($lab_test->lab_group_id) && $lab_test->lab_group_id == $lab_group->id) { echo "selected"; } ?>><?php echo $lab_group->lab_group_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="group"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="docEmail">Cost</label>
                                <input type="number" name="cost" class="form-control" placeholder="5000" value="<?php if (isset($lab_test->cost)) { echo $lab_test->cost; } ?>">
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="cost"></code>
                        </div>
                    </div>
                <div class="col-lg-12 col-md-12 mb-3 mt-2" id="footer-links">
                    <div class="card">

                        <?php if (isset($lab_test->id)) { ?>
                            <input type="hidden" class="form-control time12" name="id" value="<?php echo $lab_test->id; ?>">
                        <?php  } ?>
                        <div class="">
                            <ul class="nav nav-tabs">
                                <!-- <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#new">Add New</a></li> -->
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#range">Range</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#parameter">Parameters</a></li>
                            </ul>
                            <div class="tab-content">
                              <!--   <div class="tab-pane show active" id="new">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control time12" name="name" placeholder="CHLORIDE CL" value="<?php if (isset($lab_test->lab_test_name)) {
                                                                                                                                                echo $lab_test->lab_test_name;
                                                                                                                                            } ?>">
                                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="name"></code>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Group:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="group" id="group">
                                                    <option value="">Select Group</option>
                                                    <?php foreach ($lab_groups_list as $lab_group) { ?>
                                                        <option value="<?php echo $lab_group->id; ?>" <?php if (isset($lab_test->lab_group_id) && $lab_test->lab_group_id == $lab_group->id) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $lab_group->lab_group_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="group"></code>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Measure:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="measure" placeholder="mmol/L" value="<?php if (isset($lab_test->measure)) {
                                                                                                                                        echo $lab_test->measure;
                                                                                                                                    } ?>">
                                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="measure"></code>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Cost:</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="cost" class="form-control" placeholder="5000" value="<?php if (isset($lab_test->cost)) {
                                                                                                                                    echo $lab_test->cost;
                                                                                                                                } ?>">
                                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="cost"></code>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tab-pane show active" id="range">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="range" class="m-2" onclick="toggleRange(false)" checked>
                                            <span>No Range</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="m-2" name="range" type="radio" onclick="toggleRange(true)" <?php if (isset($lab_test_range) && $lab_test_range != null && $lab_test->has_subgroup=='No') {echo "checked";} ?>>
                                        <label class="form-check-label">
                                            Select Range Tag
                                        </label>
                                    </div>
                                    <div class="body" id="noRange">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Low</th>
                                                        <th>High</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="body" id="valueRange" style="max-height: 150px; overflow: scroll;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable" id="example">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Low</th>
                                                        <th>High</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="range_idd" id="range_idd">
                                                                <option value="">Select Range</option>
                                                                <?php foreach ($range_list as $range) { ?>
                                                                    <option value="<?php echo $range->name; ?>"><?php echo $range->name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td contenteditable="true" class="editlowhigh" style="background-color: #fff; font-size: 20px; font-family: cursive;"></td>
                                                        <td contenteditable="true" class="editlowhigh" style="background-color: #fff; font-size: 20px; font-family: cursive;"></td>
                                                        <td><button type="button" class="btn btn-sm btn-success" onclick="AddLabTest(this, <?php echo $range->id; ?>)">Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="body" id="valueRangeSummary" style="max-height: 200px; overflow: scroll;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable summaryTable" id="summaryTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Low</th>
                                                        <th>High</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    //var_dump($lab_test_range);
                                                    if (isset($lab_test_range) && $lab_test_range != null) {
                                                        $i = 1;
                                                        foreach ($lab_test_range as $range) {
                                                    ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $range->name; ?></td>
                                                                <td><?php echo $range->low; ?></td>
                                                                <td><?php echo $range->high; ?></td>
                                                                <td width='10%'><button type='button' onclick='testDelete(this, <?php echo $range->id; ?>, "edit")' class='btn btn-sm btn-danger'>Remove</button></td>
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="parameter">

                                    <button class="btn btn btn-success" type="button"  data-toggle="modal" data-target="#takeVitals" onclick="parameter_dialog(event)" data-type="black" data-size="l" href="<?php echo base_url('setting/add_parameter/') ?>">Add New</button>
                                    <div class="col-lg-12 col-md-12 mt-2 row">
                                    <!--     <div class="col-3">
                                            <input type="text" class="form-control" name="paramenter_name" id="paramenter_name" placeholder="CHLORIDE CL">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" name="paramenter_measure" id="paramenter_measure" placeholder="mmol/L">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="paramenter_range_value" id="paramenter_range_value" placeholder="Normal:(95 - 105)">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" type="button" onclick="addParameter()">Add</button>
                                        </div> -->
                                        <!-- <label for="inputPassword" class="col-sm-2 col-form-label">Measure:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="measure" placeholder="mmol/L">
                                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="measure"></code>
                                            </div> -->
                                    </div>
                                    <div class="body" style="max-height: 300px; overflow: scroll;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable parameterTable" id="parameterTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Measure</th>
                                                        <th>RangeValue</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($lab_test_parameter) && $lab_test_parameter != null) {
                                                        $i = 1;
                                                        //var_dump($lab_test_parameter);
                                                        foreach ($lab_test_parameter as $parameter) {
                                                            //var_dump($parameter);
                                                    ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $parameter->lab_test_subgroup_name; ?></td>
                                                                <td><?php echo $parameter->Measure; ?></td>
                                                                <td><?php $the_ranges = $this->laboratory_m->get_ranges($parameter->id); 
                                                                foreach ($the_ranges as $range) {
                                                                   echo rtrim($range->name.":".$range->low."-".$range->high.",", ", ");
                                                                }
                                                                 ?></td>
                                                                <td width='10%'><button type='button' onclick='deleteParameter(this, <?php echo $parameter->id; ?>, "edit")' class='btn btn-sm btn-danger'>Remove</button></td>
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="lab_test_list"></div>
                    <div id="parameter_list"></div>
                    <div id="parameter_name_list2"> </div>
                    <div id="parameter_range_list2"> </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-warning" onclick="form_routes_test('add_test')" title="add_test">Save</button>
                </div>
            </form>
            <form id="parameter-range-list">
                <div id="parameter_range_list">
                    
                </div>
            </form>
            <form id="parameter-range-list2">
                <div id="parameter_range_list2">
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script>
     $(".editlowhigh").keypress(function(e) {
    if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
        });

    var _row = null;
    $(document).ready(function() {
            <?php if (isset($lab_test_range) && $lab_test_range != null && $lab_test->has_subgroup=='No') { ?>
                $("#noRange").hide();
                $("#valueRange").show();
                $("#valueRangeSummary").show();
            <?php  } else { ?>
                $("#valueRange").hide();
                $("#valueRangeSummary").hide();
            <?php } ?>

        }

    );

    function toggleRange(statement) {
        var noRange = document.getElementById('noRange')
        var valueRange = document.getElementById('valueRange')
        var valueRangeSummary = document.getElementById('valueRangeSummary')
        if (!statement) {
            noRange.style.display = "block";
            valueRange.style.display = "none";
            valueRangeSummary.style.display = "none";
        } else {
            valueRange.style.display = "block";
            valueRangeSummary.style.display = "block";
            noRange.style.display = "none";
        }
    }


    //Lab Test
    function AddLabTest(ctl, id) {
        _row = $(ctl).parents("tr");
        var create = 'create';
        var cols = _row.children("td");
        var value = $('#range_idd option:selected').text();
        console.log(value);
        //console.log(cols);
        $("#lab_test_list").append("<input type='hidden' name='range_id[]' class='test" + id + "' value='" + value + ',' + $(cols[1]).text() + ',' + $(cols[2]).text() + "' >");
        $("#summaryTable tbody").append("<tr>" +
            "<td></td>" +
            "<td>" + value + "</td>" +
            "<td>" + $(cols[1]).text() + "</td>" +
            "<td>" + $(cols[2]).text() + "</td>" +
            "<td width='10%'><button type='button' onclick='testDelete(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
            "</tr>");

        $("#range_idd").val("");
        $(cols[1]).text("");
        $(cols[2]).text("");
    }

    function testDelete(ctl, id, mode) {
        if (mode == "edit") {
            $.confirm({
                title: 'Remove Range',
                content: 'Are you sure you want to Remove Range?',
                icon: 'fa fa-check-circle',
                type: 'red',
                buttons: {
                    yes: function() {
                        $(".test" + id + "").remove();
                        $(ctl).parents("tr").remove();
                        delete_range_by_id(id)
                    },
                    no: function() {

                    }
                }
            });
        } else {
            $(".test" + id + "").remove();
            $(ctl).parents("tr").remove();
            console.log(mode);

        }


    }

    function delete_range_by_id(id) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url() . 'setting/delete_lab_range_test'; ?>",
            data: {
                id: id
            },
            success: function(response) {

            }
        });
    }


    //Parameter
    function addParameter() {
        var chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        id = Math.floor(Math.random() * chars.length)
        var name = $("#paramenter_name").val();
        var measure = $("#paramenter_measure").val();
        var rangeValue = $("#paramenter_range_value").val();
        console.log(id);
        //console.log(cols);
        $("#parameter_list").append("<input type='hidden' name='parameter_id[]' class='parameter" + id + "' value='" + name + ',' + measure + ',' + rangeValue + "' >");
        $("#parameterTable tbody").append("<tr>" +
            "<td></td>" +
            "<td>" + name + "</td>" +
            "<td>" + measure + "</td>" +
            "<td>" + rangeValue + "</td>" +
            "<td width='10%'><button type='button' onclick='deleteParameter(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
            "</tr>");
        $("#paramenter_name").val("");
        $("#paramenter_measure").val("");
        $("#paramenter_range_value").val("");
    }

    function deleteParameter(ctl, id, mode) {
        if (mode == "edit") {
            $.confirm({
                title: 'Remove Parameter',
                content: 'Are you sure you want to Remove Parameter?',
                icon: 'fa fa-check-circle',
                type: 'red',
                buttons: {
                    yes: function() {
                        $(".parameter" + id + "").remove();
                        $(ctl).parents("tr").remove();
                        delete_parameter_by_id(id)
                    },
                    no: function() {

                    }
                }
            });
        } else {
            $(".parameter" + id + "").remove();
            $(ctl).parents("tr").remove();
            console.log(mode);

        }

    }

    function delete_parameter_by_id(id) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url() . 'setting/delete_lab_parameter_test'; ?>",
            data: {
                id: id
            },
            success: function(response) {

            }
        });
    }
/////

function parameter_dialog() {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = 'Parameter';
    var id = element.data('id');

      var parameter =  $.confirm({
            title: title,
            columnClass:'l',
            content:  function () {
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
                formAdjust: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {


                        var chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                        id = Math.floor(Math.random() * chars.length)

                        var okkk = '';

                        var name = document.getElementById('parameter_name').value;
                        var measure = document.getElementById('parameter_measure').value;

                        formData = $('#parameter-range-list').serializeArray();
                        len = formData.length,
                        dataObj = {};

                        for (i=0; i<len; i++) {
                          dataObj[formData[i].name] = formData[i].value;
                          okkk += dataObj['parameter_range_id'];
                        }

                      // console.log(okkk);

                        


                    $("#parameter_name_list2").append("<input name='parameter_name2[]' hidden class='test" + id + "' value='" + name + "'>");
                    $("#parameter_name_list2").append("<input name='parameter_measure2' hidden class='test" + id + "' value='" + measure + "'>");

                    $("#parameterTable tbody").append("<tr>" +
                        "<td></td>"+
                        "<td>" + name + "</td>" +
                        "<td>" + measure + "</td>" +
                        "<td>" + okkk+ "</td>" +
                        "<td width='10%'><button type='button' onclick='deleteParameter(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                        "</tr>");
                        $("input[name='parameter_range_id']").val('');

                        parameter.close();

                        return false;
                    }
                },
                cancel: function() {
                    //close
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formAdjust.trigger('click'); // reference the button and click it
                });
            }
        });
}
</script>
<?php $this->load->view('setting/script'); ?>