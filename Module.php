<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Aurora\Modules\MailGlobalSignaturePlugin;

/**
 * With this plugin enabled and configured, all email messages sent out will have a predefined message appended.
 *
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2023, Afterlogic Corp.
 *
 * @package Modules
 */
class Module extends \Aurora\System\Module\AbstractModule
{
    /**
     * @var \Aurora\Modules\Mail\Module
     */
    protected $oMailModule;

    public function init()
    {
        $this->oMailModule = \Aurora\System\Api::GetModule('Mail');

        $this->subscribeEvent('Mail::SendMessage::before', array($this, 'onBeforeSendMessage'));
    }

    /**
     *
     * @return Module
     */
    public static function Decorator()
    {
        return parent::Decorator();
    }

    /**
     *
     * @param array $aArguments
     * @param mixed $mResult
     */
    public function onBeforeSendMessage(&$aArguments, &$mResult)
    {
        $aArguments["Text"] .= ($aArguments["IsHtml"] ? "<br />" : "\r\n") . $this->getConfig('Signature', '');
    }
}
