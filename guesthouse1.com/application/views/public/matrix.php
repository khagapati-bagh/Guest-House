<link rel="stylesheet" href="<?php echo base_url();?>assets/extra/demo/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/extra/bower_components/Font-Awesome/css/font-awesome.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/extra/demo/build.css"/>
<style>
.whatever{
    background-color: red;
    display: inline-block;
    width: 100px;
    height: 100px;
}

#checkboxes input[type=checkbox]{
    display: none;
}

#checkboxes input[type=checkbox]:checked + .whatever{
    background-color: green;
}
</style>
<form method="post" action="<?php echo base_url();?>matrix">
<div id="checkboxes">
    <input type="checkbox" name="rGroup[]" value="1" id="r1" checked="checked" />
    <label class="whatever" for="r1"></label>
    <input type="checkbox" name="rGroup[]" value="2" id="r2" />
    <label class="whatever" for="r2"></label>
    <input type="checkbox" name="rGroup[]" value="3" id="r3" />
    <label class="whatever" for="r3"></label>
</div>
<input type="submit" name="submit">
</form>