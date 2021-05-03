<?php
namespace GDO\BBCode;

/**
 * BBDecoder. Using third party library named <insert_name_here>.
 * @author livinskull
 * @version 6.10.1
 * @since 6.10.1
 */
final class BBDecoder
{
    /**
     * @todo implement
     * @param string $text
     * @return string
     */
    public function decode($text)
    {
        return html($text);
    }
    
    public function escapeBB($text)
    {
        return $text; # @todo implement
    }
    
}
