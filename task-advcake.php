<?php
$str = "Привет! Давно не виделись.";
echo $str;
echo "<hr>";
echo RevertString::reve($str);

class RevertString{
    private static $pattern = [',', '.', '?', '!'];

    /**
     * @param string $text
     * @return string
     */
    public static function reve(string $text)
    {
        $words = explode(' ', $text);

        foreach ($words as $key => $word) {

            $reversed = strrev(strtolower($word));
            
            if (in_array($reversed[0], self::$pattern, true)) {
                $reversed = ltrim($reversed, $reversed[0]) . $reversed[0];
            }
            if ($word[0] !== strtolower($word[0])) {
                $reversed = ucfirst($reversed); 
            }

            $words[$key] = $reversed;
        }

        return implode(' ', $words);
    }
}