<?php
namespace GDO\BBCode;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Message;
use GDO\User\GDO_User;

/**
 * BBCode message provider.
 * @author livinskull
 * @version 6.10.1
 * @since 6.10.1
 */
final class Module_BBCode extends GDO_Module
{
    public $module_priority = 15;
    
    ############
    ### Init ###
    ############
    public function onInit()
    {
        GDT_Message::$DECODER = [$this, 'decodeMessage'];
        GDT_Message::$QUOTER = [$this, 'quoteMessage'];
    }
    
    ###############
    ### Message ###
    ###############
    private $bbdecoder;

    /**
     * Get the global bbdecoder.
     * @return \GDO\BBCode\BBDecoder
     */
    public function bbdecoder()
    {
        if (!$this->bbdecoder)
        {
            $this->bbdecoder = new BBDecoder();
        }
        return $this->bbdecoder;
    }
    
    /**
     * Decode a bbcode message to html.
     * @param string $text
     * @return string
     */
    public function decodeMessage($text)
    {
        return $this->bbdecoder()->decode($text);
    }
    
    /**
     * Create a quote message in the language of a message provider.
     * @param GDO_User $user - the author of the text
     * @param string $date - date in db format
     * @param string $text - the text message
     * @return string bbcode for a quoted message
     */
    public function quoteMessage(GDO_User $user, $date, $text)
    {
        $text = $this->bbdecoder()->escapeBB($text);
        return "[quote by={$user->displayNameLabel()} at={$date}]{$text}[/quote]";
    }
    
}
