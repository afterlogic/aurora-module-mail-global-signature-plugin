<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Aurora\Modules\MailGlobalSignaturePlugin;

use Aurora\System\SettingsProperty;

/**
 * @property bool $Disabled
 * @property string $Signature
 */

class Settings extends \Aurora\System\Module\Settings
{
    protected function initDefaults()
    {
        $this->aContainer = [
            "Disabled" => new SettingsProperty(
                false,
                "bool",
                null,
                "Setting to true disables the module",
            ),
            "Signature" => new SettingsProperty(
                "",
                "string",
                null,
                "If set, the text will be automatically appended to all mails sent out from this installation",
            ),
        ];
    }
}
