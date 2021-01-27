<!-- Default Size -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="add-department">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Department</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="department_id" hidden="" placeholder="Department Name">
                                <input type="text" class="form-control" name="department_name" placeholder="Department Name">
                                <code style="color: #ff0000;" class="form-control-feedback" data-field="department_name"></code>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" title="add_department" onclick="form_routes_add('add_department')">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>