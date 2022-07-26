<?php

namespace App\Service;

class ConvertText
{
    const
        BOLD = '__',
        CURSIVE = '_',
        BOLD_AND_CURSIVE = '___';

    const TAG_TYPES = [
        self::BOLD_AND_CURSIVE => ['<b><i>', '</i></b>'],
        self::BOLD => ['<b>', '</b>'],
        self::CURSIVE => ['<i>', '</i>'],

    ];

    public function convert(string $string): string
    {
        $bold = $cursive = $boldCursive = 0;

        foreach (self::TAG_TYPES as $key => $tagType) {

            $tag = 0;
            $tagsCount = substr_count($string, $key);
            if ($tagsCount === 0) {
                continue;
            }

            for ($i = 0; $i < $tagsCount; $i++) {
                $isReverseTag = in_array($key, [self::CURSIVE, self::BOLD])
                    && ($cursive % 2 !== 0 || $bold % 2 !== 0)
                    && $boldCursive !== 0
                    || ($tagsCount === 1);
                if ($isReverseTag) {
                    $tag = 1;
                }

                switch ($key) {
                    case self::BOLD_AND_CURSIVE:
                        $boldCursive++;
                        $bold++;
                        $cursive++;
                        break;
                    case self::BOLD:
                        $bold++;
                        break;
                    case self::CURSIVE:
                        $cursive++;
                        break;
                }

                $string = $this->str_replace_once($key, $tagType[$tag], $string);
                $tag = $tag === 0 ? 1 : 0;
            }
        }

        return $string;
    }

    /**
     * @param $search
     * @param $replace
     * @param $text
     * @return string
     */
    private function str_replace_once($search, $replace, $text): string
    {
        $pos = strpos($text, $search);
        return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }
}
