<?php

auth_reauthenticate();
access_ensure_global_level(config_get("manage_plugin_threshold"));

?>



<?php

form_security_validate("plugin_TagMarker_manage_config");

$form_var_tag_enabled = gpc_get_string("form_var_tag_enabled");
$form_var_tag_char = gpc_get_string("form_var_tag_char");

if ($form_var_tag_enabled == ON && strlen($form_var_tag_char) == 1)
{
    plugin_config_set("TagMarker_tag_enabled", $form_var_tag_enabled);
    plugin_config_set("TagMarker_tag_char", $form_var_tag_char);
}
else
{
    plugin_config_delete("TagMarker_tag_enabled");
    plugin_config_delete("TagMarker_tag_char");
}

form_security_purge("plugin_TagMarker_manage_config");



print_successful_redirect( plugin_page("config_page", true));
