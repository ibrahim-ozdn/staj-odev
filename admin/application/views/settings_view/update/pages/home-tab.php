<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="form-group">
        <label>Company Name</label>
        <input type="text" 
            class="form-control" 
            name="company_name"
            placeholder="Enter Company Name"
            value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name; ?>">
            <?php if(isset($form_error)){ ?>
                <small class="form-text text-muted text-danger"><?php echo form_error("company_name"); ?></small>
            <?php } ?>
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="text" 
            class="form-control" 
            name="email"
            placeholder="Enter Email Address"
            value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
            <?php if(isset($form_error)){ ?>
                <small class="form-text text-muted text-danger"><?php echo form_error("email"); ?></small>
            <?php } ?>
    </div>
    <div class="form-group">
        <label>View Website</label>
        <input type="text" 
            class="form-control" 
            name="view_website"
            placeholder="Enter View Website"
            value="<?php echo isset($form_error) ? set_value("view_website") : $item->view_website; ?>">
            <?php if(isset($form_error)){ ?>
                <small class="form-text text-muted text-danger"><?php echo form_error("view_website"); ?></small>
            <?php } ?>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label>Phone 1</label>
                <input type="text" 
                    class="form-control" 
                    name="phone_1"
                    placeholder="Enter Phone 1"
                    value="<?php echo isset($form_error) ? set_value("phone_1") : $item->phone_1; ?>">
            </div>
            <div class="col">
                <label>Phone 1</label>
                <input type="text" 
                    class="form-control" 
                    name="phone_2"
                    placeholder="Enter Phone 2"
                    value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2; ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label>Fax 1</label>
                <input type="text" 
                    class="form-control" 
                    name="fax_1"
                    placeholder="Enter Fax 1"
                    value="<?php echo isset($form_error) ? set_value("fax_1") : $item->fax_1; ?>">
            </div>
            <div class="col">
                <label>Fax 2</label>
                <input type="text" 
                    class="form-control" 
                    name="fax_2"
                    placeholder="Enter Fax 2"
                    value="<?php echo isset($form_error) ? set_value("fax_2") : $item->fax_2; ?>">
            </div>
        </div>
    </div>
</div>