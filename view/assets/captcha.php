<?php
    spl_autoload_register(static function (string $path) {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
        require_once($path);
    });
    session_name('Main');
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\Constant.php');
    class Captcha
    {
        const PERMITTED_CHARS = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
        const STRING_LENGTH = 5;
        private string $value;

        function __construct()
        {
            $this->value = $this->generate_string(self::PERMITTED_CHARS, self::STRING_LENGTH);
            $image = $this->imageCreate();
            $this->textFill($image);
            header('Content-type: image/png');
            imagepng($image);
            imagedestroy($image);
        }

        function getValue(): string
        {
            return $this->value;
        }

        /**
         * @param String $input Chaine contenant l'ensemble des caractères permis
         * @param int $strength Longueur de la chaine de captcha à réaliser
         * @return string Chaine de captcha aléatoire généré
         */
        function generate_string(string $input, int $strength): string
        {
            $input_length = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
        }


        /**
         * Création de l'image
         */
        function imageCreate(): GdImage|bool
        {
            $image = imagecreatetruecolor(150, 150);
            imageantialias($image, true);
            return $image;
        }


        /**
         * Prend une image puis génère une série de couleurs aléatoire pour celle ci
         * @param GdImage $image Image à remplir avec les couleurs données
         * @return array Tableau avec les couleurs généré
         */
        function colorGenerate(GdImage $image): array
        {
            $colors = [];
            $red = rand(125, 175);
            $green = rand(125, 175);
            $blue = rand(125, 175);
            for ($i = 0; $i < 5; $i++) {
                $colors[] = imagecolorallocate($image, $red - 20 * $i, $green - 20 * $i, $blue - 20 * $i);
            }
            return $colors;
        }

        /**
         * Dessine des rectangles dans l'image donnée
         * @param GdImage $image Image donnée
         */
        function rectangleDraw(GdImage $image): void
        {
            $colors = $this->colorGenerate($image);
            imagefill($image, 0, 0, $colors[0]);

            for ($i = 0; $i < 10; $i++) {
                imagesetthickness($image, rand(2, 10));
                $line_color = $colors[rand(1, 4)];
                imagerectangle($image, rand(-10, 190), rand(-40, 40), rand(-10, 190), rand(100, 150), $line_color);
            }
        }

        function textColor(GdImage $image): array
        {
            $this->rectangleDraw($image);
            $black = imagecolorallocate($image, 0, 0, 0);
            $white = imagecolorallocate($image, 255, 255, 255);
            return [$black, $white];
        }

        function textFill(GdImage $image): void
        {
            $textcolors = $this->textColor($image);
            $fonts = [dirname(__FILE__) . '\fonts\Ubuntu.ttf',
                dirname(__FILE__) . '\fonts\Merriweather.ttf',
                dirname(__FILE__) . '\fonts\PlayfairDisplay.ttf'];


            for ($i = 0; $i < self::STRING_LENGTH; $i++) {
                $letter_space = intval(150 / self::STRING_LENGTH);
                $initial = 2;
                imagettftext($image, 24, rand(-15, 15), $initial + $i * $letter_space, rand(70, 80),
                    $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $this->value[$i]);
            }
        }


    }

   $_SESSION['captcha'] = (new Captcha())->getValue();
    echo $_SESSION['captcha'];