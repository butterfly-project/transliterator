<?php

namespace Butterfly\Component\Transliterator;

/**
 * @author Marat Fakhertdinov <marat.fakhertdinov@gmail.com>
 */
class TransliteratorTwigExtension extends \Twig_Extension
{
    /**
     * @var Transliterator
     */
    protected $transliterator;

    /**
     * @param Transliterator $transliterator
     */
    public function __construct(Transliterator $transliterator)
    {
        $this->transliterator = $transliterator;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('translit', [$this, 'translitirate']),
            new \Twig_SimpleFilter('trs', [$this, 'translitirate']),
        ];
    }

    /**
     * @param string $str
     * @param string $delimiter
     * @return string
     */
    public function translitirate($str, $delimiter = '-')
    {
        return $this->transliterator->transliterate($str, $delimiter);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'transliterator.extension';
    }
}
