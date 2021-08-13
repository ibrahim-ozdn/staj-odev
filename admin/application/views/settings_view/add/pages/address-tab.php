<div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" id="editor">
            <?php echo isset($form_error) ? set_value("address") : ""; ?>                        
        </textarea>
    </div>
    <div class="form-group">
        <label>Contact Map iFrame</label>
        <textarea name="maps" class="form-control">
            <?php echo isset($form_error) ? set_value("maps") : ""; ?>                        
        </textarea>
    </div>
</div>