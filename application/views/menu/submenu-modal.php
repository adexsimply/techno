<!-- Default Size -->
<div class="modal fade" id="addsubmenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="add-submenu">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Role</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="menu_id" hidden="" placeholder="Menu Name">
                                <input type="text" class="form-control" name="menu_child_id" hidden="" placeholder="Menu Name">
                                <input type="text" class="form-control" name="menu_child_name" placeholder="Sub Menu Name">
                                <code style="color: #ff0000;" class="form-control-feedback" data-field="menu_child_name"></code>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" title="add_submenu" onclick="form_routes_addsub('add_submenu')">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>