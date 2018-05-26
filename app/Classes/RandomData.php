<?php
/**
 * Created by PhpStorm.
 * User: sviatoslav
 * Date: 5/8/18
 * Time: 7:52 AM
 */

namespace App\Classes;

class RandomData
{
    public static function getFirstName()
    {
        $first_names = array('Allison', 'Arthur', 'Ana', 'Alex', 'Arlene', 'Alberto', 'Barry', 'Bertha',
            'Bill', 'Bonnie', 'Bret', 'Beryl', 'Chantal', 'Cristobal', 'Claudette', 'Charley', 'Cindy',
            'Chris', 'Dean', 'Dolly', 'Danny', 'Danielle', 'Dennis', 'Debby', 'Erin', 'Edouard',
            'Erika', 'Earl', 'Emily', 'Ernesto', 'Felix', 'Fay', 'Fabian', 'Frances', 'Franklin',
            'Florence', 'Gabielle', 'Gustav', 'Grace', 'Gaston', 'Gert', 'Gordon', 'Humberto', 'Hanna',
            'Henri', 'Hermine', 'Harvey', 'Helene', 'Iris', 'Isidore', 'Isabel', 'Ivan', 'Irene',
            'Isaac', 'Jerry', 'Josephine', 'Juan', 'Jeanne', 'Jose', 'Joyce', 'Karen', 'Kyle',
            'Kate', 'Karl', 'Katrina', 'Kirk', 'Lorenzo', 'Lili', 'Larry', 'Lisa', 'Lee', 'Leslie',
            'Michelle', 'Marco', 'Mindy', 'Maria', 'Michael', 'Noel', 'Nana', 'Nicholas', 'Nicole',
            'Nate', 'Nadine', 'Olga', 'Omar', 'Odette', 'Otto', 'Ophelia', 'Oscar', 'Pablo',
            'Paloma', 'Peter', 'Paula', 'Philippe', 'Patty', 'Rebekah', 'Rene', 'Rose', 'Richard',
            'Rita', 'Rafael', 'Sebastien', 'Sally', 'Sam', 'Shary', 'Stan', 'Sandy', 'Tanya', 'Teddy',
            'Teresa', 'Tomas', 'Tammy', 'Tony', 'Van', 'Vicky', 'Victor', 'Virginie', 'Vince',
            'Valerie', 'Wendy', 'Wilfred', 'Wanda', 'Walter', 'Wilma', 'William', 'Kumiko', 'Aki',
            'Miharu', 'Chiaki', 'Michiyo', 'Itoe', 'Nanaho', 'Reina', 'Emi', 'Yumi', 'Ayumi', 'Kaori',
            'Sayuri', 'Rie', 'Miyuki', 'Hitomi', 'Naoko', 'Miwa', 'Etsuko', 'Akane', 'Kazuko', 'Miyako',
            'Youko', 'Sachiko', 'Mieko', 'Toshie', 'Junko');

        return $first_names[rand(0, count($first_names) - 1)];
    }

    public static function getLastName()
    {
        $last_names = array(
            'Abbott', 'Acevedo', 'Acosta', 'Adams', 'Adkins',
            'Aguilar', 'Aguirre', 'Albert', 'Alexander', 'Alford',
            'Allen', 'Ayers', 'Bailey', 'Baird', 'Baker',
            'Baldwin', 'Ball', 'Ballard', 'Banks', 'Barber',
            'Barker', 'Barlow', 'Barnes', 'Barnett', 'Cabrera',
            'Cain', 'Calderon', 'Caldwell', 'Calhoun', 'Callahan',
            'Camacho', 'Cameron', 'Campbell', 'Curry', 'Curtis',
            'Dale', 'Dalton', 'Daniel', 'Daniels', 'Duran',
            'Durham', 'Dyer', 'Eaton', 'Edwards', 'Elliott',
            'Estrada', 'Evans', 'Everett', 'Ewing', 'Farley',
            'Farmer', 'Farrell', 'Fuentes', 'Fuller', 'Fulton',
            'Gaines', 'Gallagher', 'Gallegos', 'Gutierrez', 'Guy',
            'Guzman', 'Hahn', 'Hale', 'Haley', 'Hall',
            'Hamilton', 'Hammond', 'Hampton', 'Hancock', 'Haney',
            'Hansen', 'Hanson', 'Hardin', 'Harding', 'Hardy',
            'Harmon', 'Harper', 'Hutchinson', 'Hyde', 'Ingram',
            'Irwin', 'Jackson', 'Jacobs', 'Joyner', 'Juarez',
            'Justice', 'Kane', 'Kaufman', 'Keith', 'Keller',
            'Kelley', 'Kirby', 'Kirk', 'Kirkland', 'Klein',
            'Kline', 'Knapp', 'Knight', 'Knowles', 'Knox',
            'Koch', 'Kramer', 'Lamb', 'Lambert', 'Lancaster',
            'Lucas', 'Luna', 'Lynch', 'Lynn', 'Lyons',
            'Macdonald', 'Macias', 'Mack', 'Madden', 'Maddox',
            'Maldonado', 'Munoz', 'Murphy', 'Murray', 'Myers',
            'Nash', 'Navarro', 'Neal', 'Nelson', 'Nixon',
            'Noble', 'Noel', 'Nolan', 'Norman', 'Norris',
            'Norton', 'Nunez', 'Obrien', 'Ochoa', 'Ortega',
            'Ortiz', 'Osborn', 'Osborne', 'Owen', 'Owens',
            'Pace', 'Pacheco', 'Padilla', 'Page', 'Palmer',
            'Park', 'Parker', 'Parks', 'Parrish', 'Parsons',
            'Pate', 'Patel', 'Patrick', 'Price', 'Prince',
            'Pruitt', 'Puckett', 'Pugh', 'Quinn', 'Ramirez',
            'Ramos', 'Ramsey', 'Randall', 'Randolph', 'Rasmussen',
            'Ratliff', 'Ray', 'Raymond', 'Reed', 'Reese',
            'Reeves', 'Salas', 'Salazar', 'Salinas', 'Scott',
            'Sears', 'Sellers', 'Serrano', 'Suarez', 'Sullivan',
            'Summers', 'Sutton', 'Swanson', 'Sweeney', 'Sweet',
            'Sykes', 'Talley', 'Tanner', 'Tate', 'Taylor',
            'Tucker', 'Turner', 'Tyler', 'Tyson', 'Underwood',
            'Valdez', 'Valencia', 'Valentine', 'Valenzuela', 'Vance',
            'Vang', 'Vargas', 'Vasquez', 'Vaughan', 'Vaughn',
            'Vazquez', 'Vega', 'Velasquez', 'Velazquez', 'Velez',
            'Villarreal', 'Vincent', 'Vinson', 'Wade', 'Wagner',
            'Walters', 'Walton', 'Ward', 'Ware', 'Wise',
            'Witt', 'Wolf', 'Wolfe', 'Wong', 'Wood',
            'Woodard', 'Wright', 'Wyatt', 'Wynn', 'Yang',
            'Yates', 'York', 'Young', 'Zamora', 'Zimmerman');

        return $last_names[rand(0, count($last_names) - 1)];
    }

    public static function getPosition($id)
    {
        $pos = array('accountant', 'actor', 'administrator', 'air steward', 'architect', 'artist',
            'assistant', 'auditor', 'personal assistant', 'shop assistant', 'author', 'baker',
            'Bank teller', 'banker', 'barman', 'bricklayer', 'builder', 'businessman',
            'butcher', 'carpenter', 'chef', 'civil servant', 'clerk', 'сloakroom attendant',
            'computer operator', 'software engineering', 'controller', 'cook', 'cosmonaut', 'dancer',
            'decorator', 'dentist', 'designer', 'director', 'company director', 'film director',
            'doctor', 'driver bus', 'garbageman', 'economist', 'editor', 'electrician',
            'makeup artist', 'engineer', 'farmer', 'fisherman', 'fishmonger', 'flight attendant',
            'guard', 'hairdresser', 'head teacher', 'ironworker', 'interpreter', 'jeweler',
            'job', 'journalist', 'judge', 'laborer', 'landscaper', 'lawyer',
            'lecturer', 'librarian', 'loading workman', 'manager', 'merchandiser', 'miner',
            'musician', 'news reader', 'notary public', 'nurse', 'obstetrician', 'oculist',
            'painter', 'photographer', 'pilot', 'plasterer', 'plumber', 'police officer',
            'politician', 'porter', 'prison officer', 'professor', 'prosecutor', 'receptionist',
            'roofer', 'sailor', 'salesman', 'scientist', 'secretary', 'singer',
            'soldier', 'surgeon', 'superviser', 'tailor', 'teacher', 'tiler',
            'telephonist', 'travel agent', 'TV cameraman', 'TV presenter', 'vet', 'yardman',
            'waiter', 'welder', 'work superintendent', 'writer');

        if ($id < count($pos) - 1) {
            return $pos[$id];
        } else {
            return 'Error';
        }
    }

    public static function getWord()
    {
        $words = array('carbon', 'tension', 'destruction', 'recovery', 'knot',
            'average', 'boy', 'band', 'flesh', 'development',
            'doctor', 'relevance', 'stroke', 'hobby', 'pasture',
            'whip', 'staircase', 'supply', 'jelly', 'fashion',
            'shell', 'rub', 'microphone', 'burial', 'provincial',
            'digital', 'chaos', 'uncertainty', 'index', 'deteriorate',
            'cower', 'norm', 'patrol', 'night', 'balance',
            'wrong', 'plane', 'ant', 'telephone', 'load',
            'reference', 'thread', 'corpse', 'nap', 'classify',
            'infinite', 'applied', 'railcar', 'density', 'chip',
            'bird', 'ballet', 'equation', 'physical', 'work out',
            'spine', 'occupation', 'effort', 'character', 'detective',
            'theft', 'restrain', 'mug', 'circulation', 'law',
            'mistreat', 'mislead', 'rescue', 'ghostwriter', 'joint',
            'cheek', 'exaggerate', 'eyebrow', 'write', 'protect',
            'panic', 'apology', 'system', 'overview', 'comfortable',
            'brink', 'sell', 'essential', 'pitch', 'undermine',
            'registration', 'split', 'inhabitant', 'perfect', 'multimedia',
            'home', 'climate', 'photocopy', 'launch', 'progress',
            'improvement', 'reproduce', 'criticism', 'consideration', 'young',
            'momentum', 'harsh', 'incident', 'survival', 'manufacturer',
            'transparent', 'litigation', 'decline', 'belt', 'charm',
            'road', 'attractive', 'artificial', 'embrace', 'fever',
            'find', 'deficiency', 'march', 'swim', 'cheat',
            'product', 'inject', 'flag', 'shortage', 'safety',
            'eat', 'presentation', 'intention', 'representative', 'extraterrestrial',
            'fisherman', 'waste', 'iron', 'TRUE', 'response',
            'gloom', 'push', 'linger', 'scan', 'cheese',
            'coffee', 'trade', 'ranch', 'tolerate', 'anger',
            'directory', 'dark', 'reptile', 'include', 'lounge',
            'suspicion', 'royalty', 'singer', 'distort', 'allowance',
            'coin', 'relationship', 'clinic', 'cow', 'annual',
            'mechanical', 'profession', 'crystal', 'stop', 'threshold',
            'belly', 'cylinder', 'disposition', 'stain', 'mobile',
            'bleed', 'earthflax', 'compose', 'zero', 'remember',
            'contrast', 'respect', 'sticky', 'slide', 'sex',
            'jam', 'delay', 'concentrate', 'pay', 'white',
            'sunrise', 'try', 'beautiful', 'sum', 'floor',
            'empire', 'bargain', 'dome', 'flood', 'suit',
            'perform', 'game', 'wagon', 'buy', 'hurl');

        return $words[rand(0, count($words) - 1)];
    }

    public static function getRandomComment(){
        $r = "";

        for($i=0; $i < 5; $i++){
            $r .= self::getWord() . ' ';
        }

        return $r;
    }
}
