<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Awesome Bootstrap Checkbox Demo</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extra/demo/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extra/bower_components/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extra/demo/build.css"/>
</head>
<body>
<div class="container">
    <h2>Checkboxes</h2>
    <form role="form">
        <div class="row">
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Basic
                    </legend>
                    <p>
                        Supports bootstrap brand colors: <code>.checkbox-primary</code>, <code>.checkbox-info</code> etc.
                    </p>
                    <div class="checkbox">
                        <input id="checkbox1" class="styled" type="checkbox">
                        <label for="checkbox1">
                            Default
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2" class="styled" type="checkbox" checked>
                        <label for="checkbox2">
                            Primary
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox3" class="styled" type="checkbox">
                        <label for="checkbox3">
                            Success
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox4" class="styled" type="checkbox">
                        <label for="checkbox4">
                            Info
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning">
                        <input id="checkbox5" type="checkbox" class="styled" checked>
                        <label for="checkbox5">
                            Warning
                        </label>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" class="styled" checked>
                        <label for="checkbox6">
                            Check me out
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Disabled
                    </legend>
                    <p>
                        Disabled state also supported.
                    </p>
                    <div class="checkbox">
                        <input class="styled" id="checkbox9" type="checkbox" disabled>
                        <label for="checkbox9">
                            Can't check this
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input class="styled styled" id="checkbox10" type="checkbox" disabled checked>
                        <label for="checkbox10">
                            This too
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning checkbox-circle">
                        <input class="styled" id="checkbox11" type="checkbox" disabled checked>
                        <label for="checkbox11">
                            And this
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    function changeState(el) {
        if (el.readOnly) el.checked=el.readOnly=false;
        else if (!el.checked) el.readOnly=el.indeterminate=true;
    }
</script>
</body>
</html>
