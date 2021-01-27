<!-- Default Size -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="add-role">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Role</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="role_id" hidden="" placeholder="Role Name">
                                <input type="text" class="form-control" name="role_name" placeholder="Role Name">
                                <code style="color: #ff0000;" class="form-control-feedback" data-field="role_name"></code>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" title="add_department" onclick="form_routes_add('add_role')">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>