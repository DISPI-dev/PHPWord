<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2014 PHPWord
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\Paragraph;

/**
 * Check box element
 */
class CheckBox extends Element
{
    /**
     * Name content
     *
     * @var string
     */
    private $name;

    /**
     * Text content
     *
     * @var string
     */
    private $text;

    /**
     * Text style
     *
     * @var string|Font
     */
    private $fontStyle;

    /**
     * Paragraph style
     *
     * @var string|Paragraph
     */
    private $paragraphStyle;

    /**
     * Create a new Text Element
     *
     * @param string $name
     * @param string $text
     * @param mixed $fontStyle
     * @param mixed $paragraphStyle
     */
    public function __construct($name = null, $text = null, $fontStyle = null, $paragraphStyle = null)
    {
        $this->setName($name);
        $this->setText($text);
        $paragraphStyle = $this->setParagraphStyle($paragraphStyle);
        $this->setFontStyle($fontStyle, $paragraphStyle);

        return $this;
    }

    /**
     * Set Text style
     *
     * @param mixed $style
     * @param mixed $paragraphStyle
     * @return string|Font
     */
    public function setFontStyle($style = null, $paragraphStyle = null)
    {
        if ($style instanceof Font) {
            $this->fontStyle = $style;
            $this->setParagraphStyle($paragraphStyle);
        } elseif (is_array($style)) {
            $this->fontStyle = new Font('text', $paragraphStyle);
            $this->fontStyle->setArrayStyle($style);
        } elseif (null === $style) {
            $this->fontStyle = new Font('text', $paragraphStyle);
        } else {
            $this->fontStyle = $style;
            $this->setParagraphStyle($paragraphStyle);
        }
        return $this->fontStyle;
    }

    /**
     * Get Text style
     *
     * @return string|Font
     */
    public function getFontStyle()
    {
        return $this->fontStyle;
    }

    /**
     * Set Paragraph style
     *
     * @param mixed $style
     * @return string|Paragraph
     */
    public function setParagraphStyle($style = null)
    {
        if (is_array($style)) {
            $this->paragraphStyle = new Paragraph;
            $this->paragraphStyle->setArrayStyle($style);
        } elseif ($style instanceof Paragraph) {
            $this->paragraphStyle = $style;
        } elseif (null === $style) {
            $this->paragraphStyle = new Paragraph;
        } else {
            $this->paragraphStyle = $style;
        }
        return $this->paragraphStyle;
    }

    /**
     * Get Paragraph style
     *
     * @return string|Paragraph
     */
    public function getParagraphStyle()
    {
        return $this->paragraphStyle;
    }

    /**
     * Set name content
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name content
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set text content
     *
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text content
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}