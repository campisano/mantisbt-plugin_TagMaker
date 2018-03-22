<?php

auth_reauthenticate();
access_ensure_global_level(config_get("manage_plugin_threshold"));

html_page_top1(plugin_lang_get("title"));
html_page_top2();

print_manage_menu();

?>



<br/>

<form action="<?php echo plugin_page( "config_update" )?>" method="post">

<?php echo form_security_field("plugin_TagMarker_manage_config") ?>

<table align="center" class="width50" cellspacing="1">

<tr>
    <td class="form-title" colspan="3">
    </td>
</tr>

<tr <?php echo helper_alternate_class()?>>
    <td class="category" width="60%">
        <label><?php echo plugin_lang_get("tag_char")?>: <input style="text-align: center;" type="text" size="2" maxlength="1" name="form_var_tag_char" value="<?php echo plugin_config_get("TagMarker_tag_char") ?>"/></label>
    </td>
    <td class="center" width="20%">
        <label><input type="radio" name="form_var_tag_enabled" value="1" <?php echo(ON == plugin_config_get("TagMarker_tag_enabled") ) ? "checked=\"checked\"" : ""?>/>
            <?php echo plugin_lang_get("enable")?></label>
    </td>
    <td class="center" width="20%">
        <label><input type="radio" name="form_var_tag_enabled" value="0" <?php echo(ON != plugin_config_get("TagMarker_tag_enabled") ) ? "checked=\"checked\"" : ""?>/>
            <?php echo plugin_lang_get("disable")?></label>
    </td>
</tr>

<tr>
    <td class="center" colspan="3">
        <input type="submit" class="button" value="<?php echo lang_get("change_configuration")?>" />
    </td>
</tr>

</table>
<form>

<?php
html_page_bottom1();
