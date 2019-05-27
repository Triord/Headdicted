<div class="modal" id="jsonImport" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import de produit via .JSON</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="import_items" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
            </br>
          </div>
          <div style="text-align: right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Upload">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
