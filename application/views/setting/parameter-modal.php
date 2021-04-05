<!-- Add new history Modal -->
<style>

#parameter-modal .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#parameter-modal .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#parameter-modal thead th, #parameter-modal tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
#parameter-modal .form-group {
     margin-bottom: 1px; 
}
#parameter-modal .form-control {
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
#parameter-modal select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>

<div class="col-12" id="parameter-modal">







        <div class="form-row mt-2">
            <div class="form-group col-md-6">
                <label for="docName">Name</label>
                    <input type="text" class="form-control time12" id="parameter_name" name="parameter_name" placeholder="CHLORIDE CL" value="<?php if (isset($lab_test->lab_test_name)) { echo $lab_test->lab_test_name; } ?>">
                    <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="name"></code>
            </div>
            <div class="form-group col-md-6">
                <label for="docName">Measure</label>
                    <input type="text" class="form-control" name="parameter_measure" id="parameter_measure" placeholder="mmol/L" value="<?php if (isset($lab_test->measure)){ echo $lab_test->measure; } ?>">
                    <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="measure"></code>
            </div>
        </div>







    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" name="range" class="m-2" onclick="toggleRangeP(false)" checked>
            <span>No Range</span>
        </label>
    </div>
    <div class="form-check">
        <input class="m-2" name="range" type="radio" onclick="toggleRangeP(true)" <?php if (isset($lab_test_range) && $lab_test_range != null) {echo "checked";} ?>>
        <label class="form-check-label">
            Select Range Tag
        </label>
    </div>
    <div class="body" id="noRangep">
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

    <div class="body" id="valueRangep" style="max-height: 150px; overflow: scroll;">
        <div class="table-responsive">
            <table class="table table-bordered">
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
                            <select class="form-control" name="range_idp" id="range_idp">
                                <option value="">Select Range</option>
                                <?php foreach ($range_list as $range) { ?>
                                    <option value="<?php echo $range->name; ?>"><?php echo $range->name; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td contenteditable="true" class="editlowhigh" style="background-color: #fff; font-size: 20px; font-family: cursive;"></td>
                        <td contenteditable="true" class="editlowhigh" style="background-color: #fff; font-size: 20px; font-family: cursive;"></td>
                        <td><button type="button" class="btn btn-sm btn-success" onclick="AddLabParam(this, <?php echo $range->id; ?>)">Add</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="body" id="valueRangeSummaryp" style="max-height: 200px; overflow: scroll;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable summaryTable" id="summaryTableP">
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

<script type="text/javascript">

    $(document).ready(function() {
            <?php if (isset($lab_test_range) && $lab_test_range != null) { ?>
                $("#noRangep").hide();
                $("#valueRangep").show();
                $("#valueRangeSummaryp").show();
            <?php  } else { ?>
                $("#valueRangep").hide();
                $("#valueRangeSummaryp").hide();
            <?php } ?>

        }

    );


    function toggleRangeP(statement) {
        ///Adetoye Shina
        var noRange = document.getElementById('noRangep')
        var valueRange = document.getElementById('valueRangep')
        var valueRangeSummary = document.getElementById('valueRangeSummaryp')
        if (!statement) {
            noRangep.style.display = "block";
            valueRangep.style.display = "none";
            valueRangeSummaryp.style.display = "none";
        } else {
            valueRangep.style.display = "block";
            valueRangeSummaryp.style.display = "block";
            noRangep.style.display = "none";
        }
    }

    //Lab Test
    function AddLabParam(ctl, id) {
        _row = $(ctl).parents("tr");
        var create = 'create';
        var cols = _row.children("td");
        var value = $('#range_idp option:selected').text();

        //console.log(value);


                        var name = document.getElementById('parameter_name').value;
                        var measure = document.getElementById('parameter_measure').value;

        //console.log(value);
        //console.log(cols);
        $("#parameter_range_list").append("<input name='parameter_range_id' class='test" + id + "' value='(" + value + ':' + $(cols[1]).text() + '-' + $(cols[2]).text() + ")' >");
        // if (value=='') {

        // $("#parameter_range_list2").append("<input name='parameter_range_without[]' class='test" + id + "' value='" + value + ',' + name + ',' + measure + ',' + $(cols[1]).text() +','+ $(cols[2]).text() + "' >");
        // }
        $("#parameter_range_list2").append("<input name='parameter_range_id2[]' class='test" + id + "' value='" + value + ',' + name + ',' + measure + ',' + $(cols[1]).text() +','+ $(cols[2]).text() + "' >");
        $("#lab_test_list").append("<input name='range_id[]' class='test" + id + "' value='" + value + ',' + $(cols[1]).text() + ',' + $(cols[2]).text() + "' >");
        $("#summaryTableP tbody").append("<tr>" +
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
</script>