<?php

namespace Butterfly\Component\Transliterator;

/**
 * @author Yuriy Parshutkin <yura.parshutkin@gmail.com>
 * @author Marat Fakhertdinov <marat.fakhertdinov@gmail.com>
 */
class Transliterator
{
    /**
     * @var array
     */
    protected $map;

    /**
     * @param array $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * @param string $str
     * @param string $delimiter
     * @return string
     */
    public function transliterate($str, $delimiter = '-')
    {
        $str = strtr($str, $this->map);
        $str = mb_strtolower($str, 'UTF-8');
        $str = preg_replace('/[^a-z0-9_]+/u', $delimiter, $str);
        $str = trim($str, $delimiter);

        return $str;
    }
}
 