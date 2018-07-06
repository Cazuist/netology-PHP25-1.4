<?php
    {$animals = [
        'Antarctica' => ['Leptonychotes weddellii', 'Hydrurga leptonyx', 'Aptenodytes forsteri'],
        'Africa' => ['Giraffa camelopardalis', 'Hippopotamus amphibius', 'Panthera leo'],
        'Australia' => ['Vombatus ursinus', 'Zaglossus', 'Phascolarctos cinereus'],
        'North_America' => ['Alligator mississippiensis', 'Ursus arctos middendorffi', 'Mephitis mephitis'],
        'South_America' => ['Lama glama', 'Puma concolor', 'Choloepus didactylus'],
        'Eurasia' => ['Ursus', 'Elephas maximus', 'Pongo pygmaeus', 'Canis lupus', 'Camelus bactrianus']
    ];

    $firstWord = [];
    $secondWord = [];
    $fantasyAnimals = [];
    $resultList = [];

    foreach ($animals as $continent => $animalList) {
        $resultList[$continent] = [];
        foreach ($animalList as $animal) {
            if (count(explode(' ', $animal)) === 2) {
                $firstWord[] = $continent.' '.explode(' ', $animal)[0];
                $secondWord[] = explode(' ', $animal)[1];
            }
        }
    }    
    
    shuffle($secondWord);
    
    for ($i = 0; $i < count($firstWord); $i++) {
        $fantasyAnimals[] = $firstWord[$i].' '.$secondWord[$i];
    }
    
    foreach ($resultList as $continent => $animals) {
        foreach ($fantasyAnimals as $animal) {
            if (explode(' ', $animal)[0] === $continent) {
                $resultList[$continent][] = explode(' ', $animal)[1].' '. explode(' ', $animal)[2];
            }
        }
    }}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Animals monstruosus</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>    
    <h1>Сон разума рождает чудовищ...</h1>
    <ol>

        <?
        foreach ($resultList as $continent => $animals) {
            ?>        
                <li class="<?= $continent ?>">                
                    <h2><?= $continent ?></h2>
                    <span><?= implode(', ', $animals) ?></span>                
                </li>                    
            <?
        }?>
    
    </ol>

</body>
</html>